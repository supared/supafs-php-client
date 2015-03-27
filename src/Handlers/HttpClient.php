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
    //const SFS_API_URL = "https://fs.supared.com/api/v1.1/";
    const SFS_API_URL = "http://localhost:8000/api/v1.1/";

    /**
     * The SupaFS client version.
     */
    const SFS_CLIENT_VERSION = "1.0";

    /**
     * Initiates the HTTP Client.
     * @param string $token
     * @param array $options
     */
    public function __construct($token, $options = [])
    {
        $this->token = $token;
        
        $defaults = [
            'headers' => [
                'User-agent' => 'SupaFS PHP Client/' . self::SFS_CLIENT_VERSION,
                'X-Token-Auth' => $token,
                'Accept' => 'application/json',
            ]
        ];

        $this->guzzle = new GuzzleClient([
            'base_url' => [self::SFS_API_URL, []],
            'defaults' => array_merge($defaults, $options),
        ]);
    }

    /**
     * Perform a HTTP GET request to the API
     * @param string $endpoint
     * @param array $options
     * @return type
     */
    public function get($endpoint, $options = [])
    {
        // Cast this as an entitie object.
        return $this->guzzle->get($endpoint, $options);
    }

    public function post($endpoint, $options = [])
    {
        // Cast this as an entitie object.
        return $this->guzzle->post($endpoint, $options);
    }

    public function put($endpoint, $options = [])
    {
        // Cast this as an entitie object.
        return $this->guzzle->put($endpoint, $options);
    }

    public function delete($endpoint, $options = [])
    {
        // Cast this as an entitie object.
        return $this->delete($endpoint, $options);
    }
}
