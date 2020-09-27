<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use FOS\RestBundle\Controller\AbstractFOSRestController;

class IndexController extends AbstractFOSRestController
{
    /**
     * @Route("/", name="index")
     */
    public function index()
    {
        $array = [
            "v1"
        ];
        return $this->handleView($this->view($array));
    }
}
