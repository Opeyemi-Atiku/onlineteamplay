<?php 
return [ 
    // 'client_id' => env('PAYPAL_CLIENT_ID',''),
    'client_id' => "AcO-xxpvhhTVRzuGaeqnWduTqCK-9C5FMZO_F9q2j9G02_qSCsVR-tdTszNxMQagFaQmAwZ7WJu4--Bt",
    'secret' => "EJ3JtQkGVZTLYnjnvRPuKjMWDrFd4c1AwI9xJ1aTd63kHnVso35BD3zg5VrHTysWtBktfLuCLw3kMLde",
    // 'secret' => env('PAYPAL_SECRET',''),
    'settings' => array(
        // 'mode' => env('PAYPAL_MODE','sandbox'),
        'mode' => 'sandbox',
        'http.ConnectionTimeOut' => 60,
        'log.LogEnabled' => true,
        'log.FileName' => storage_path() . '/logs/paypal.log',
        'log.LogLevel' => 'DEBUG'
    ),
];