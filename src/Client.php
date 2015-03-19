<?php namespace Supared\SupaFS;

class Client
{

    /**
     * The base URL for the SupaFS API.
     */
    const SUPAFS_API_URL = "https://fs.supared.com/api/1/";

    /**
     * The username to use to access the service with.
     * @var string
     */
    private $user = null;

    /**
     * The API key to use to access the service with.
     * @var string 
     */
    private $key = null;

    /**
     * The generated API token.
     * @var string
     */
    private $token;

    public function __construct($user = null, $key = null)
    {
        $this->user = $user;
        $this->key = $key;
        $this->generateApiToken();
    }

    /**
     * Set the username of which to use to access the API.
     * @param type $username
     */
    public function setUser($username)
    {
        $this->user = $username;
        $this->generateApiToken();
    }

    /**
     * Set the API key of which to use to access the API.
     * @param type $key
     */
    public function setKey($key)
    {
        $this->key = $key;
        $this->generateApiToken();
    }

    /**
     * Generates the API token.
     */
    private function generateApiToken()
    {
        $this->token = base64_encode($this->user . '|' . $this->key);
    }
}
