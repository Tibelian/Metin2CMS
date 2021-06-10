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

        // cambia el idioma en la sesión
        // y después el event suscriber se ocupa del resto
        $request->getSession()->set('_locale', $locale);

        // redirecciona a la página de inicio
        return $this->redirectToRoute('base');

    }

}
