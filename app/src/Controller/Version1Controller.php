<?php

namespace App\Controller;

use App\Entity\Anime;
use App\Entity\AnimeTitle;
use App\Form\AnimeTitleType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;

class Version1Controller extends AbstractFOSRestController
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

    /**
     * Lists all Anime.
     * @Rest\Get("/v1/anime", name="api_v1_anime")
     *
     * @return Response
     */
    public function getAnimeAction()
    {
        /** @var AnimeRepository $repository */
        $repository = $this->getDoctrine()->getRepository(Anime::class);
        $animeTitle = $repository->findAllAnimeIds();
        return $this->handleView($this->view($animeTitle));
    }

    /**
     * Lists all Anime.
     * @Rest\Get("/v1/anime/{id}")
     *
     * @return Response
     */
    public function getAnimeInfoAction($id)
    {
        $repository = $this->getDoctrine()->getRepository(Anime::class);
        $animeInfo = $repository->findBy(array("id" => $id));

        if (isset($animeInfo[0])) {
            return $this->handleView($this->view($animeInfo[0]));
        }

        return $this->handleView($this->view(["error" => "Anime with id ".$id." not found"]));
    }

    /**
     * Add an Anime.
     * @Rest\Post("/v1/addanime", name="api_v1_addanime")
     *
     * @return Response
     */
    public function postAnimeAction(Request $request)
    {
        $animeTitle = new AnimeTitle();
        $form = $this->createForm(AnimeTitleType::class, $animeTitle);
        $data = json_decode($request->getContent(), true);
        $form->submit($data);
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($animeTitle);
            $em->flush();
        return $this->handleView($this->view(["status" => "ok"], Response::HTTP_CREATED));
      }
      return $this->handleView($this->view($form->getErrors()));
    }
}
