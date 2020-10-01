<?php

namespace App\Controller;

use FOS\RestBundle\Controller\AbstractFOSRestController;
use Symfony\Component\HttpFoundation\Response;

class ExceptionController extends AbstractFOSRestController
{
    public function __invoke($exception): Response
    {
        return $this->handleView($this->view(["error" => $exception]));
    }
}
