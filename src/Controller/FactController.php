<?php

// src/Controller/FactController.php

namespace App\Controller;

use App\Repository\FactRepository;
use App\View\View;

/**
 * FactController
 *
 * @author user
 */
class FactController
{
    protected FactRepository $repository;
    
    protected View $view;
    
    /**
     * Creates new FactController object
     * 
     * @param FactRepository $repository The fact repository object
     * @param View $view The view component
     * @return mixed
     */
    public function __construct(FactRepository $repository, View $view): mixed
    {
        $this->repository = $repository;
        $this->view = $view;
    }
    
    /**
     * Renders list with facts
     * 
     * Loads the list from the repository and pass it to the view component for rendering
     * 
     * @param int $amount Amount of items in the list
     * @param string $type The fact type
     * @return string The rendered list (HTML)
     */
    public function list(int $amount, string $type): string
    {
        //...
    }
    
    /**
     * Loads and renders a single fact
     * 
     * Loads the fact from the repository and pass it to the view component for rendering
     * 
     * @param string $id The fact identifier
     * @return string The rendered fact (HTML)
     */
    public function single(string $id): string
    {
        //...
    }
}
