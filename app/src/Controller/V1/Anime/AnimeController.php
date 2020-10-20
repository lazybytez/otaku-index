<?php

namespace App\Controller\V1\Anime;

use App\Entity\Anime;
use App\Entity\AnimeTitle;
use App\Form\AnimeTitleType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;

class AnimeController extends AbstractFOSRestController
{
    /**
     * Lists all Anime.
     * @Rest\Get("/v1/anime", name="api_v1_anime")
     *
     * @return Response
     */
    public function getAnimeIdsAction(): Response
    {
        /** @var AnimeRepository $repository */
        $repository = $this->getDoctrine()->getRepository(Anime::class);
        $anime = $repository->findAllAnimeIds();

        if (isset($_GET['q'])) {
            $id = explode(",", $_GET['q']);
            $anime = $repository->findBy(array("id" => $id));
        }

        return $this->handleView($this->view($anime));
    }

    /**
     * Lists all Anime.
     * @Rest\Get("/v1/anime/{id}")
     *
     * @return Response
     */
    public function getAnimeInfoAction($id): Response
    {
        $repository = $this->getDoctrine()->getRepository(Anime::class);
        $anime = $repository->findOneBy(array("id" => $id));

        // TODO: If anime.animeinfo is null get data from anidb: http://api.anidb.net:9001/httpapi?request=anime&client=otakuindex&clientver=1&protover=1&aid=1

        if (isset($anime[0])) {
            return $this->handleView($this->view($anime[0]));
        }

        return $this->handleView($this->view(["error" => "Anime with id ".$id." not found"]));
    }

    // /**
    //  * Add an Anime.
    //  * @Rest\Post("/v1/addanime", name="api_v1_addanime")
    //  *
    //  * @return Response
    //  */
    // public function postAnimeAction(Request $request)
    // {
    //     $animeTitle = new AnimeTitle();
    //     $form = $this->createForm(AnimeTitleType::class, $animeTitle);
    //     $data = json_decode($request->getContent(), true);
    //     $form->submit($data);
    //     if ($form->isSubmitted() && $form->isValid()) {
    //         $em = $this->getDoctrine()->getManager();
    //         $em->persist($animeTitle);
    //         $em->flush();
    //     return $this->handleView($this->view(["status" => "ok"], Response::HTTP_CREATED));
    //   }
    //   return $this->handleView($this->view($form->getErrors()));
    // }
}
