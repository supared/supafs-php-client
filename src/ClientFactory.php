<?php namespace Supared\SupaFS;

use Supared\SupaFS\Client as SupaFSClient;

class ClientFactory
{

    /**
     * Create a new SupaFS client instance
     * @param string $user The SupaFS username
     * @param string $key The SupaFS API key.
     * @param array $options Optional configuration items for the client.
     * @return Supared\SupaFS\Client
     */
    public static function create($user, $key, $options = [])
    {
        $supafs_client = new SupaFSClient($user, $key, $options);
        return $supafs_client;
    }
}
