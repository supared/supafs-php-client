<?php
require_once '../vendor/autoload.php';
use Supared\SupaFS\ClientFactory as SupaClient;

$supafs = SupaClient::create('username', 'asdasdadsad');
var_export($supafs->accountInfo());
