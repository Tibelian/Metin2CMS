<?php

namespace App\Controller\User;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/{_locale}/user")
 */
class DonateController extends AbstractController
{
    /**
     * @Route("/user/donate", name="user_donate")
     */
    public function index(): Response
    {
        return $this->render('user/donate/index.html.twig', [
            'controller_name' => 'DonateController',
        ]);
    }
}
