<?php

namespace App\Core;

class Controller
{
    public function view(string $view, array $data = [])
    {
        extract($data);

        ob_start();

        // Renderiza a view correta
        require __DIR__ . '/../../views/' . $view . '.php';

        $content = ob_get_clean();

        // Carrega o layout principal
        require __DIR__ . '/../../views/layout/layout.php';
    }
}
