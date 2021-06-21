<?php

namespace App\Controller\Ranking;

use App\Entity\Player;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Knp\Component\Pager\PaginatorInterface;

/**
 * @Route("/{_locale}/ranking")
 */
class PlayersController extends AbstractController
{
    /**
     * @Route("/players", name="ranking_players")
     */
    public function index(PaginatorInterface $paginator, Request $request): Response
    {
        // return the "player" db entity manager
        $em = $this->getDoctrine()->getManager('player');

        // return all the players
        $players = $em->getRepository(Player::class)->findAll();

        // list players in different pages  
        $pagination = $paginator->paginate(
            $players, /* query NOT result */
            $request->query->getInt('page', 1), /*page number*/
            20 /*limit per page*/
        );

        return $this->render('ranking/players/index.html.twig', [
            'controller_name' => 'PlayersController',
            'players' => $pagination
        ]);
    }
}
