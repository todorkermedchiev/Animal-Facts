<?php

// src/Controller/FactControllerFactory.php

namespace App\Controller;

use App\View\View;
use App\Controller\FactController;
use App\Repository\FactRepository;
use GuzzleHttp\ClientInterface;

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
        return new FactController(/*?????????????????????????????????,*/ $view);
    }
}
