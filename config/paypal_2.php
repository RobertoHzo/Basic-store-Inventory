<?php
return [
    'client_id' => 'AVMtN4OTZbmwcMPfdRp0OFV9mPz8KNeS9lNyBR4f_Zi2F_VIUHYt1GTH8xrUwNm1xsOWjlQe7fZkvyLj',
	'secret' => 'EMTzrGSAAxSPOKU9G5nDIEglC8lwivMD4gmHr8xio1Sqc-RS3zURA6opaHioagqEVkSwZyiZKLwK_KpD',
    'settings' => array(
        'mode' => 'sandbox',
        'http.ConnectionTimeOut' => 1000,
        'log.LogEnabled' => true,
        'log.FileName' => storage_path() . '/logs/paypal.log',
        'log.LogLevel' => 'FINE'
    ),
];
