<?php
require_once '../vendor/autoload.php';
use Supared\SupaFS\ClientFactory as SupaClient;

// Set optional Guzzle configuration.
$config = [
    //'proxy' => '',
    //'debug' => true,
];

$supafs = SupaClient::create('ballen', '3UyHhA9zQd9bg9keuQLkG8HzUME3eBPf', $config);

/**
 * Return the current user account information.
 */
//var_export($supafs->accountInfo());


/**
 * Return all object storage containers for the current user.
 */
//var_export($supafs->containers());


/**
 * Create a new storage container
 */
//var_export($supafs->createContainer('Bobbys work'));

/**
 * Deletes a container
 */
//var_export($supafs->deleteContainer('cf69c234-006b-4d92-97f0-2f678c5d'));

/**
 * Display all object for a given container
 */
//var_dump($supafs->objects('d4b1c462-13b6-40ed-9427-1967b185'));

/**
 * Upload some data to the web service.
 */
//$file_to_upload = 'My example file.txt';
//var_export($supafs->put(file_get_contents('files/' . $file_to_upload), $file_to_upload, 'eca26cf4-d0c3-4c40-9c96-e9b6a3b3'));
//$photo_to_upload = 'random_car_parts.JPG';
//var_export($supafs->put(
//        file_get_contents('files/' . $photo_to_upload), $photo_to_upload, 'eca26cf4-d0c3-4c40-9c96-e9b6a3b3', true)
//);

/**
 * Get the file data and output it to the screen:
 */
//echo $supafs->retrieve('a16197d9-778b-4ab1-82ad-5d9de6b8');

/**
 * Write the file to the local disk...
 */
//file_put_contents('myexample.txt', $supafs->retrieve('a16197d9-778b-4ab1-82ad-5d9de6b8'));

/**
 * Upload an image from the internet
 */
$container = $supafs->createContainer('My Avatars');
$uploaded = $supafs->put(
    file_get_contents('https://secure.gravatar.com/avatar/01b2031440311b2c5da591ca00709ec9?s=60&d=mm'), 'My Gravatar_60px.png', $container['data']['uuid'], 'image/jpeg', true
);
var_dump($uploaded);

/**
 * Download and store the image in the above example to your server...
 * 
 */