<?php

namespace App\Controller;

use App\Entity\Account;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomepageController extends AbstractController
{
    
    /**
     * @Route("/", name="base")
     */
    public function base(): Response
    {
        return $this->redirectToRoute('homepage');
    }

    /**
     * @Route(
     *     "/{_locale}/home",
     *     name="homepage",
     *     requirements={
     *         "_locale": "es|en|ro",
     *     }
     * )
     */
    public function index($_locale): Response
    {
        // return the "account" db entity manager
        $em = $this->getDoctrine()->getManager('account');

        // return all the acounts
        $accounts = $em->getRepository(Account::class)->findAll();

        return $this->render('homepage/index.html.twig', [
            'controller_name' => 'HomepageController',
            'accounts' => $accounts
        ]);
    }
}
