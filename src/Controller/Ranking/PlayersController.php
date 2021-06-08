<?php

namespace App\Controller\Ranking;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PlayersController extends AbstractController
{
    /**
     * @Route("/ranking/players", name="ranking_players")
     */
    public function index(): Response
    {
        return $this->render('ranking/players/index.html.twig', [
            'controller_name' => 'PlayersController',
        ]);
    }
}
