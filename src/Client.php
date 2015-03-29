<?php namespace Supared\SupaFS;

use Supared\SupaFS\Handlers\HttpClient;

class Client
{

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

    /**
     * The HTTP wrapper for the web service.
     * @var type 
     */
    private $service;

    /**
     * Creates a new instance of the Client
     * @param string $user The SupaFS useranme
     * @param string $key The SupaFS API key
     * @param array $options Optional request settings (for Guzzle)
     */
    public function __construct($user = null, $key = null, $options = [])
    {
        // Set the username and API key for the user.
        $this->user = $user;
        $this->key = $key;
        // Generate the authentication token.
        $this->generateApiToken();
        // Create a new instance of the HTTP handler.
        $this->service = new HttpClient($this->token, $options);
    }

    /**
     * Generate the API token
     * @return void
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
        return $this->service->get('user')->json();
    }

    /**
     * Retrieve all containers for this account.
     */
    public function containers()
    {
        return $this->service->get('container')->json();
    }

    /**
     * Crete a new container.
     * @param string $name The container to create.
     */
    public function createContainer($name)
    {
        return $this->service->post('container', [
                'body' => [
                    'name' => $name,
                ]
            ])->json();
    }

    /**
     * The container to delete.
     * @param string $cuuid The container UUID
     */
    public function deleteContainer($cuuid)
    {
        return $this->service->delete('/container/' . $cuuid)->json();
    }

    /**
     * Retrieve all objects stored in a given container.
     * @param string $cuuid The container UUID to list the objects from.
     */
    public function objects($cuuid)
    {
        return $this->service->get('container/' . $cuuid . '/?include=objects')->json();
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
        return $this->service->put('object/' . $cuuid, [
                'headers' => [
                    'sfs-filename' => $filename,
                    'sfs-filesize' => strlen($data),
                ],
                'body' => $data,
        ]);
    }

    /**
     * Retrieve a file/object from SupaFS
     * @param string $ouuid The object UUID to retrieve.
     * @param int $revision (Default '0', the lastest.)
     */
    public function retrieve($ouuid, $revision = 0)
    {
        
    }
}
