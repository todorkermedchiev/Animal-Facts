<?php

// src/Repository/FactRepositoryFactory.php

namespace App\Repository;

use App\Repository\FactRepository;

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
        return new FactRepository(/*?????????*/);
    }
}
