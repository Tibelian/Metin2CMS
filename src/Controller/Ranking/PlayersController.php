<?php

namespace App\Controller\Ranking;

use App\Entity\Player\Player;
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
        // return the "player" db entity manager
        $em = $this->getDoctrine()->getManager('player');

        // return all the players
        $players = $em->getRepository(Player::class)->findAll();

        return $this->render('ranking/players/index.html.twig', [
            'controller_name' => 'PlayersController',
            'players' => $players
        ]);
    }
}
