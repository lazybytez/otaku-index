<?php

namespace App\Controller\V1;

use Symfony\Component\Routing\Annotation\Route;
use FOS\RestBundle\Controller\AbstractFOSRestController;

class VersionController extends AbstractFOSRestController
{
    /**
     * @Route("/v1", name="api_v1")
     */
    public function index()
    {
        /** @var Router $router */
        $router = $this->get('router');
        $routes = $router->getRouteCollection();

        $routeArray = [];

        foreach ($routes as $routeName => $route) {
            if (strpos($routeName, "api_v1_") !== false) {
                //return $this->handleView($this->view($route));
                $routeArray[] = [
                    "name" => $route->getPath(),
                    "method" => $route->getMethods()
                ];
            }
        }

        return $this->render("version1/index.html.twig", [
            "routes" => $routeArray,
        ]);
    }
}
