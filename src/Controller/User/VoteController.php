<?php

namespace App\Controller\User;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/{_locale}/user")
 */
class VoteController extends AbstractController
{
    /**
     * @Route("/user/vote", name="user_vote")
     */
    public function index(): Response
    {
        return $this->render('user/vote/index.html.twig', [
            'controller_name' => 'VoteController',
        ]);
    }
}
