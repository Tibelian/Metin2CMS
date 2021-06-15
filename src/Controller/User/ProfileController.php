<?php

namespace App\Controller\User;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/{_locale}/user")
 */
class ProfileController extends AbstractController
{
    /**
     * @Route("/profile", name="user_profile")
     */
    public function index(): Response
    {
        return $this->render('user/profile/index.html.twig', [
            'controller_name' => 'ProfileController',
        ]);
    }
}
