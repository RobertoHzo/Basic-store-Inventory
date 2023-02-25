<?php

namespace App\Services;

use App\Models\Producto;
use PayPal\Api\Item;
use PayPal\Api\Payer;
use Mockery\Exception;
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Payment;
use PayPal\Api\ItemList;
use PayPal\Api\Transaction;
use PayPal\Rest\ApiContext;
use PayPal\Api\RedirectUrls;
use PayPal\Api\PaymentExecution;

use PayPal\Auth\OAuthTokenCredential;
use PayPal\Exception\PayPalConnectionException;


class PayPalService
{
    protected $payPal;

    public function __construct()
    {
        if (config('settings.paypal_client_id') == '' || config('settings.paypal_secret_id') == '') {
            return redirect()->back()->with('error', 'No PayPal settings found.');
        }

        $this->payPal = new ApiContext(
            new OAuthTokenCredential(
                config('settings.paypal_client_id'),
                config('settings.paypal_secret_id')
            )
        );

        // To use PayPal in live mode you have to add
        // the below, I prefer to use the sandbox mode only.

        //$this->payPal->setConfig(
        //    array('mode'  =>  'live')
        //);
    }

    public function processPayment($pedido)
    {
        // Add shipping amount if you want to charge for shipping
        // $shipping = sprintf('%0.2f', 0);
        // Add any tax amount if you want to apply any tax rule
        // $tax = sprintf('%0.2f', 0);

        // Create a new instance of Payer class
        $payer = new Payer();
        $payer->setPaymentMethod("paypal");

        // Adding items to the list
        // $items = array();
        // foreach ($pedido->items as $item) {
        //     $orderItems[$item->id] = new Item();
        //     $orderItems[$item->id]->setName($item->producto_id)
        //         ->setCurrency("MXN")
        //         ->setQuantity($item->cantidad)
        //         ->setPrice($item->precio);

        //     array_push($items, $orderItems[$item->id]);
        // }

        // $itemList = new ItemList();
        // $itemList->setItems($items);

        // Setting Shipping Details
        // $details = new Details();
        // $details
        // ->setShipping($shipping)
        //     ->setTax($tax)
        // ->setSubtotal(sprintf('%0.2f', $pedido->total));

        // Create chargeable amount
        $amount = new Amount();
        $amount->setCurrency(config('MXN'))
            ->setTotal(sprintf('%0.2f', $pedido->total));
        // ->setDetails($details);

        // Creating a transaction
        $transaction = new Transaction();
        $transaction->setAmount($amount)
            // ->setItemList($itemList)
            ->setDescription($pedido->user->name)
            ->setInvoiceNumber($pedido->order_number);

        // Setting up redirection urls
        $redirectUrls = new RedirectUrls();
        $redirectUrls->setReturnUrl(route('checkout.payment.complete'))
            ->setCancelUrl(route('checkout.index'));

        // Creating payment instance
        $payment = new Payment();
        $payment->setIntent("sale")
            ->setPayer($payer)
            ->setRedirectUrls($redirectUrls)
            ->setTransactions(array($transaction));

        try {

            $payment->create($this->payPal);
        } catch (PayPalConnectionException $exception) {
            echo $exception->getCode(); // Prints the Error Code
            echo $exception->getData(); // Prints the detailed error message
            exit(1);
        } catch (Exception $e) {
            echo $e->getMessage();
            exit(1);
        }

        $approvalUrl = $payment->getApprovalLink();

        header("Location: {$approvalUrl}");
        exit;
    }

    public function completePayment($paymentId, $payerId)
    {
        $payment = Payment::get($paymentId, $this->payPal);
        $execute = new PaymentExecution();
        $execute->setPayerId($payerId);

        try {
            $result = $payment->execute($execute, $this->payPal);
        } catch (PayPalConnectionException $exception) {
            $data = json_decode($exception->getData());
            $_SESSION['message'] = 'Error, ' . $data->message;
            // implement your own logic here to show errors from paypal
            exit;
        }

        if ($result->state === 'approved') {
            $transactions = $result->getTransactions();
            $transaction = $transactions[0];
            $invoiceId = $transaction->invoice_number;

            $relatedResources = $transactions[0]->getRelatedResources();
            $sale = $relatedResources[0]->getSale();
            $saleId = $sale->getId();

            $transactionData = ['salesId' => $saleId, 'invoiceId' => $invoiceId];

            return $transactionData;
        } else {
            echo "<h3>" . $result->state . "</h3>";
            var_dump($result);
            exit(1);
        }
    }
}
