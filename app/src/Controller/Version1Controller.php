<?php

namespace App\Controller;

use App\Entity\AnimeTitles;
use App\Form\AnimeTitlesType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;

class Version1Controller extends AbstractFOSRestController
{
    /**
     * @Route("/v1", name="v1")
     */
    public function index()
    {
        $routes = [
            "/v1/anime [l]",
            "/v1/user [l]"
        ];
        return $this->render("version1/index.html.twig", [
            "routes" => $routes
        ]);
    }

    /**
     * Lists all Anime.
     * @Rest\Get("/v1/anime")
     *
     * @return Response
     */
    public function getAnimeAction()
    {
        $repository = $this->getDoctrine()->getRepository(AnimeTitles::class);
        $animeTitles = $repository->findall();
        return $this->handleView($this->view($animeTitles));
    }

    /**
     * Add an Anime.
     * @Rest\Post("/v1/addanime")
     *
     * @return Response
     */
    public function postAnimeAction(Request $request)
    {
        $animeTitles = new AnimeTitles();
        $form = $this->createForm(AnimeTitlesType::class, $animeTitles);
        $data = json_decode($request->getContent(), true);
        $form->submit($data);
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($animeTitles);
            $em->flush();
        return $this->handleView($this->view(["status" => "ok"], Response::HTTP_CREATED));
      }
      return $this->handleView($this->view($form->getErrors()));
    }
}
