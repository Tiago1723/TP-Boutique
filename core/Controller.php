<?php

class Controller {

    protected function view($view, $data = [])
    {
        extract($data, EXTR_SKIP);

        $head = __DIR__ . '/../views/layouts/head.php';
        $header = __DIR__ . '/../views/layouts/header.php';
        $viewFile = __DIR__ . '/../views/' . $view . '.php';
        

        if (!file_exists($viewFile)) {
            http_response_code(500);
            echo "Error: View '$view' not found.";
            return;
        }

        require $head;
        require $header;
        require $viewFile;
    }

}