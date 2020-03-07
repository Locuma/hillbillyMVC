<?php

namespace App;


class Router
{

    private $routes;

    public function __construct()
    {
        $routesPath = __DIR__ . "/config/routes.php";
        $this->routes = include $routesPath;
    }


    public function run()
    {

        $fullUriArray = parse_url($this->getFullUri());
        $cleanUrl = trim($fullUriArray['path'], '/');

        foreach ($this->routes as $routeAliase => $path) {
            if (preg_match("~$routeAliase~", $cleanUrl)) {
                $innerPath = preg_replace("~$routeAliase~", $path, $cleanUrl);
                list($controller, $action, $userId, $postId) = explode('/', $innerPath);
                $controllerName = ucfirst($controller . "Controller");
                $actionName = "action" . ucfirst($action);
                $foundController = "\\App\\controllers\\{$controllerName}";
                if (method_exists($foundController, $actionName)) {
                    $currentController = new $foundController();
                    return $currentController->$actionName($userId, $postId);
                } else {
                    echo "fail<br>";
                    echo "$cleanUrl";

                }
            }
        }
        return true;
    }

    /**
     * return full request string
     * @return string
     */

    private function getFullUri()
    {
        $fullUriArray = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" :
                "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        return trim($fullUriArray);
    }

}