<?php

namespace App\Controller\User\Settings;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/{_locale}/user/settings")
 */
class ModifyEmailController extends AbstractController
{
    /**
     * @Route("/modify/email", name="user_settings_modify_email")
     */
    public function index(): Response
    {
        return $this->render('user/settings/modify_email/index.html.twig', [
            'controller_name' => 'ModifyEmailController',
        ]);
    }
}
