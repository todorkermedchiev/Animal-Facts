<?php

// src/Viev/View.php

namespace App\View;

/**
 * Renders view files from specified base view directory
 *
 * @author user
 */
class View
{
    /**
     * Directory with views
     * 
     * @var string
     */
    protected string $viewDirectory;
    
    /**
     * Create new view object
     * 
     * @param string $viewDirectory Path to view directory
     * @return mixed
     */
    public function __construct(string $viewDirectory)
    {
        $this->viewDirectory = $viewDirectory;
    }
    
    /**
     * Render a template with a view model
     * 
     * @param string $viewName View name
     * @param array $viewModel View model
     * @return string
     */
    public function render(string $viewName, array $viewModel): string
    {
        $viewFile = sprintf('%s/%s.php', $this->viewDirectory, $viewName);

        if (!file_exists($viewFile)){
            $this->render('error/no_view', $viewModel);
        }
        $list = $viewModel;
        extract($viewModel, EXTR_OVERWRITE);
        ob_start();
        require $viewFile;
        $content = ob_get_clean();
        return $content;
    }
}
