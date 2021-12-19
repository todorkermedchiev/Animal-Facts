<?php

// src/Controller/FactController.php

namespace App\Controller;

use App\Repository\FactRepository;
use App\Repository\FactRepositoryFactory;
use App\View\View;

/**
 * FactController
 *
 * @author user
 */
class FactController
{
    /**
     * The FactRepository object
     * 
     * @var FactRepository
     */
    protected FactRepository $repository;
    
    /**
     * The view component
     * 
     * @var View
     */
    protected View $view;
    
    /**
     * Creates new FactController object
     * 
     * @param FactRepository $repository The fact repository object
     * @param View $view The view component
     */
    
    public function __construct(FactRepository $repository, View $view)
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
        try {
            $list = $this->repository->getRandomList($amount, $type);
            $viewModel = $list->getArrayCopy();
            $view = new View('views');
            return $view->render('fact/list', $viewModel);       
        } catch (Exception $ex) {
            throw new InvalidCollectionObjectException($ex);
        }
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
        try {
            $fact = $this->repository->getFact($id);
            $view = new View('views');
            return $view->render('fact\single', ['fact' => $fact]);
        } catch (Exception $ex) {
            throw new InvalidFactTypeException($ex);
        }
    }
}
