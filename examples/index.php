<?php
require_once '../vendor/autoload.php';
use Supared\SupaFS\ClientFactory as SupaClient;

// Set optional Guzzle configuration.
$config = [
    //'proxy' => '',
    //'debug' => true,
];

$supafs = SupaClient::create('ballen', '9eNUcatvATwYYPoFY0CTT7rFMBLmRnQC', $config);
var_export($supafs->accountInfo());
