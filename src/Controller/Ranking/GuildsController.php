<?php

namespace App\Controller\Ranking;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class GuildsController extends AbstractController
{
    /**
     * @Route("/ranking/guilds", name="ranking_guilds")
     */
    public function index(): Response
    {
        return $this->render('ranking/guilds/index.html.twig', [
            'controller_name' => 'GuildsController',
        ]);
    }
}
