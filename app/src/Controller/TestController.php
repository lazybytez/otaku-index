<?php

namespace App\Controller;

use App\Entity\Anime;
use App\Entity\AnimeTitle;
use App\Form\AnimeTitleType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;

class TestController extends AbstractFOSRestController
{
    /**
     * List all Warframes.
     * @Rest\Get("/v1/wfs", name="api_v1_wfs")
     *
     * @return Response
     */
    public function getWarframesAction(): Response
    {
        $endpoint = "warframes-wiki";
        $response = $this->callWarframeApi($endpoint);

        $output = [];

        foreach ($response["data"]["Warframes"] as $key => $value) {
            array_push($output, $key);
        }

        return $this->handleView($this->view($output));
    }

    /**
     * List all Warframe Weapons.
     * @Rest\Get("/v1/wfweapons", name="api_v1_wfweapons")
     *
     * @return Response
     */
    public function getWarframeWeaponNamesAction(): Response
    {
        $endpoint = "weapons-wiki";
        $response = $this->callWarframeApi($endpoint);

        $output = [];

        foreach ($response["data"]["Weapons"] as $key => $value) {
            if (isset($value['Class']) && $value['Class'] !== 'Exalted Weapon') {
                $output[] = $key;
            }
        }

        return $this->handleView($this->view($output));
    }

    public function callWarframeApi($endpoint) {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://wf.snekw.com/".$endpoint);
        curl_setopt_array($ch, array(CURLOPT_RETURNTRANSFER => true));
        $response = json_decode(curl_exec($ch), true);
        curl_close($ch);

        return $response;
    }
}
