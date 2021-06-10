<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class LocaleController extends AbstractController {

    /**
     * @Route("/change-locale/{locale}", methods={"POST"}, name="change-locale")
     */
    public function changeLocale($locale, Request $request): Response {

        // save the language into the session
        // and after that the event suscriber
        // overrides the changes
        $request->getSession()->set('_locale', $locale);

        // redirect to home
        return $this->redirectToRoute('base');

    }

}
