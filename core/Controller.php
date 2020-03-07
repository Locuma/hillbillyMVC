<?php


namespace App;


class Controller
{
    public $layout = 'default';
    public $data = [];
    public $controllerName = '';
    public $defaultLanguage = 'ru';


    public function __construct()
    {
        $reflect = new \ReflectionClass($this);
        $this->controllerName = $reflect->getShortName();
        if (!isset($_SESSION['language'])) {
            session_start();
            $_SESSION['language'] = $this->defaultLanguage;
            session_write_close();
        }
    }


    public function render($filename, $data = [])
    {
        $this->data = $data;
        $cssPath = '';
        $jsPath = '';
        $controllerPrefix = strtolower(str_replace('Controller', '', $this->controllerName));


        $viewPath = __DIR__ . "/views/{$controllerPrefix}/{$filename}.php";
        if (file_exists(__DIR__ . "/css/{$controllerPrefix}/{$filename}.css")) {
            $cssPath = "core/css/{$controllerPrefix}/{$filename}.css";
        }
        if (file_exists(__DIR__ . "/js/{$controllerPrefix}/{$filename}.js")) {
            $jsPath = "core/js/{$controllerPrefix}/{$filename}.js";
        }

        $viewRender = $this->renderFile($viewPath, $data);

        $layoutPath = __DIR__ . "/views/layouts/{$this->layout}.php";
        echo $this->renderFile($layoutPath , [
            'content' => $viewRender,
            'cssPath' => $cssPath,
            'jsPath' => $jsPath]);
    }

    public function renderFile($filename, $data = []) {
       ob_start();
       $this->data = $data;
       include_once ($filename);
       $fileContent = ob_get_contents();
       ob_end_clean();
       return $fileContent;
    }
}