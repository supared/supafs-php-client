<?php namespace Supared\SupaFS\Handlers;

use \GuzzleHttp\Client as GuzzleClient;

// Basically a wrapper for Guzzle and bootstrapping the default headers for each request etc.

class HttpClient
{

    private $token;
    private $guzzle;

    /**
     * The base URL for the SupaFS API.
     */
    const SFS_API_URL = "https://fs.supared.com/api/v1.1/";
    const SFS_CLIENT_VERSION = "1.0";

    public function __construct($token, $options = [])
    {
        $this->token = $token;
        $this->guzzle = new GuzzleClient([
            'base_url' => [self::SUPAFS_API_URL],
            'defaults' => [
                'headers' => [
                    'User-agent' => 'SupaFS PHP Client/' . self::SFS_CLIENT_VERSION,
                    'X-Token-Auth' => $token,
                    'Accept' => 'application/json',
                ],
            ]
        ]);
    }

    public function get($endpoint, $options = [])
    {
        return $this->guzzle->get($endpoint, $options);
    }

    public function post($endpoint, $options = [])
    {
        return $this->guzzle->post($endpoint, $options);
    }

    public function put($endpoint, $options = [])
    {
        return $this->guzzle->put($endpoint, $options);
    }

    public function delete($endpoint, $options = [])
    {
        return $this->delete($endpoint, $options);
    }
}