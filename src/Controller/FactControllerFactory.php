<?php

// src/Controller/FactControllerFactory.php

namespace App\Controller;

use App\View\View;
use App\Controller\FactController;
use App\Repository\FactRepositoryFactory;

/**
 * Factory for FactController objects
 *
 * @author user
 */
class FactControllerFactory
{
    /**
     * Creates FactController objects
     * 
     * @param View $view The view component
     * @return FactController
     */
    public static function create(View $view): FactController
    {
        $factory = new FactRepositoryFactory();
        $repository = $factory->create(); 
        $factController = new FactController($repository, $view);
        return $factController;
    }
}
