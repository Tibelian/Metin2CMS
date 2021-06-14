<?php

namespace App\Controller\User;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SettingsController extends AbstractController
{
    /**
     * @Route("/user/settings", name="user_settings")
     */
    public function index(): Response
    {
        return $this->render('user/settings/index.html.twig', [
            'controller_name' => 'SettingsController',
        ]);
    }
}
