<?php

namespace App\Controller;

use App\Entity\Account;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomepageController extends AbstractController
{
    /**
     * @Route("/homepage", name="homepage")
     */
    public function index(): Response
    {
        // return the "account" db entity manager
        $em = $this->getDoctrine()->getManager('account');

        // return all the players
        $accounts = $em->getRepository(Account::class)->findAll();

        return $this->render('homepage/index.html.twig', [
            'controller_name' => 'HomepageController',
            'accounts' => $accounts
        ]);
    }
}
