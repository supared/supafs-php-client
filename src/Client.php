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

    /**
     * Retrieve the current user's details from the web service.
     */
    public function accountInfo()
    {
        
    }

    /**
     * Retrieve all containers for this account.
     */
    public function containers()
    {
        
    }

    /**
     * Crete a new container.
     * @param string $name The container to create.
     */
    public function createContainer($name)
    {
        
    }

    /**
     * The container to delete.
     * @param string $cuuid The container UUID
     */
    public function deleteContainer($cuuid)
    {
        
    }

    /**
     * Retrieve all objects stored in a given container.
     * @param string $cuuid The container UUID to list the objects from.
     */
    public function objects($cuuid)
    {
        
    }

    /**
     * Store a file/object in a SupaFS container.
     * @param string $data Raw file data (or @file_path).
     * @param string $filename The filename to store the object as.
     * @param type $cuuid
     * @param type $overwrite
     */
    public function put($data, $filename, $cuuid, $overwrite = false)
    {
        
    }

    /**
     * Retrieve a file/object from SupaFS
     * @param string $uuid The file UUID to retrieve.
     * @param int $revision (Default '0', the lastest.)
     */
    public function retrieve($uuid, $revision = 0)
    {
        
    }
}
