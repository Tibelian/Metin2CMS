<?php

namespace App\Controller\User\Settings;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DeleteAccountController extends AbstractController
{
    /**
     * @Route("/user/settings/delete/account", name="user_settings_delete_account")
     */
    public function index(): Response
    {
        return $this->render('user/settings/delete_account/index.html.twig', [
            'controller_name' => 'DeleteAccountController',
        ]);
    }
}
