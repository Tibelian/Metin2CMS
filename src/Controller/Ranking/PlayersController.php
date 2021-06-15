<?php

namespace App\Controller\Ranking;

use App\Entity\Player;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/{_locale}/ranking")
 */
class PlayersController extends AbstractController
{
    /**
     * @Route("/players", name="ranking_players")
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
