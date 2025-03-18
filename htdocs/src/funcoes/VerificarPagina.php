<?php 
namespace HTDOCS\funcoes;

class VerificarPagina {
    public function __construct($local = null) {
        if (isset($_GET['page'])) {
            $page = filter_input(INPUT_GET, 'page', FILTER_SANITIZE_SPECIAL_CHARS);
            $filePath = __DIR__ . "/../../public/$local/pages/{$page}.php";

            if (!empty($page) && file_exists($filePath)) {
                require_once $filePath;
            } else {
                require_once __DIR__ . "/../../public/404.php";
            }
        } else {
            require_once __DIR__ . "/../../public/$local/pages/home.php";
        }
    }
}