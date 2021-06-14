<?php

namespace App\Controller\User\Settings;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ModifyPasswordController extends AbstractController
{
    /**
     * @Route("/user/settings/modify/password", name="user_settings_modify_password")
     */
    public function index(): Response
    {
        return $this->render('user/settings/modify_password/index.html.twig', [
            'controller_name' => 'ModifyPasswordController',
        ]);
    }
}
