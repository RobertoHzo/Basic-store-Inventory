<?php

namespace App\Contracts;

interface PedidoContract
{
    public function storeOrderDetails($params);

    // public function listPedidos(string $order = 'id', string $sort = 'desc', array $columns = ['*']);

    // public function findOrderByNumber($orderNumber);
}
