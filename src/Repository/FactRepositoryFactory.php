<?php

// src/Repository/FactRepositoryFactory.php

namespace App\Repository;

use App\Repository\FactRepository;
use GuzzleHttp\Client;

/**
 * Creates FactRepository objects
 *
 * @author user
 */
class FactRepositoryFactory
{
    /**
     * Creates FactRepository objects
     * 
     * @return FactRepository
     */
    public function create(): FactRepository
    {
        $httpClient = new Client();
        $factRepository = new FactRepository($httpClient, 'https://cat-fact.herokuapp.com');
        return $factRepository;
    }
}
