<?php

namespace mvc;

class BaseController {

    protected $view;

    public function __construct(View $view = null) {
        $this->view = $view ?: new View();
    }

    public function render ($filePath, array $variables = []) {
        return $this->view->render($filePath, $variables);
    }
}