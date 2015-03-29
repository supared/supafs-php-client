<?php
require_once '../vendor/autoload.php';
use Supared\SupaFS\ClientFactory as SupaClient;

// Set optional Guzzle configuration.
$config = [
    //'proxy' => '',
    //'debug' => true,
];

$supafs = SupaClient::create('ballen', '3UyHhA9zQd9bg9keuQLkG8HzUME3eBPf', $config);
var_export($supafs->accountInfo());
