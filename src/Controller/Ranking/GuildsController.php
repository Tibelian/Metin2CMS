<?php

namespace App\Controller\Ranking;

use App\Entity\Guild;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/{_locale}/ranking")
 */
class GuildsController extends AbstractController
{
    /**
     * @Route("/guilds", name="ranking_guilds")
     */
    public function index(): Response
    {
        // return the "player" db entity manager
        $em = $this->getDoctrine()->getManager('player');

        // return all the guilds
        $guilds = $em->getRepository(Guild::class)->findAll();

        return $this->render('ranking/guilds/index.html.twig', [
            'controller_name' => 'GuildsController',
            'guilds' => $guilds
        ]);
    }
}
