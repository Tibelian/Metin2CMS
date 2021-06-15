<?php

namespace App\Controller\User;

use App\Entity\Account;
use App\Entity\User;
use App\Form\RegistrationFormType;
use App\Security\EmailVerifier;
use DateTime;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mime\Address;
use Symfony\Component\Routing\Annotation\Route;
use SymfonyCasts\Bundle\VerifyEmail\Exception\VerifyEmailExceptionInterface;

/**
 * @Route("/{_locale}/user")
 */
class RegistrationController extends AbstractController
{
    private $emailVerifier;

    public function __construct(EmailVerifier $emailVerifier)
    {
        $this->emailVerifier = $emailVerifier;
    }

    /**
     * @Route("/register", name="app_register")
     */
    public function register(Request $request): Response
    {

        // the new user object
        $user = new User();

        // register form is prepared
        $form = $this->createForm(RegistrationFormType::class, $user);
        $form->handleRequest($request);

        // if the form is submitted and the data is valid
        // then saves the new account
        if ($form->isSubmitted() && $form->isValid()) {

            // database manager
            $entityManager = $this->getDoctrine()->getManager();

            // encode the plain password
            $user->setPassword(
                $this->encodePassword(
                    $form->get('plainPassword')->getData(),
                    $entityManager
                )
            );

            // account info
            $account = new Account();
            $account->setEmail($user->getEmail());
            $account->setLogin($user->getUsername());
            $account->setPassword($user->getPassword());
            $account->setWebIp($request->getClientIp());
            $account->setSocialId($form->get('socialId')->getData());
            $account->setCreateTime(new DateTime());
            $user->setAccount($account);
            //dd($user);

            // account is saved into the db
            $entityManager->persist($account);
            $entityManager->flush();
            $user->setId($account->getId());

            // generate a signed url and email it to the user
            $this->emailVerifier->sendEmailConfirmation('app_verify_email', $user,
                (new TemplatedEmail())
                    ->from(new Address($_ENV['MAILER_EMAIL'], $_ENV['MAILER_NAME'],))
                    ->to($user->getEmail())
                    ->subject('Please Confirm your Email')
                    ->htmlTemplate('user/registration/confirmation_email.html.twig')
            );
            
            // after the registration the user is loggedin
            // and redirects him to the profile
            return $this->redirectToRoute('user_profile');

        }

        // show the view
        return $this->render('user/registration/register.html.twig', [
            'registrationForm' => $form->createView(),
        ]);

    }

    /**
     * @Route("/verify/email", name="app_verify_email")
     */
    public function verifyUserEmail(Request $request): Response
    {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');

        // validate email confirmation link, sets User::isVerified=true and persists
        try {
            $this->emailVerifier->handleEmailConfirmation($request, $this->getUser());
        } catch (VerifyEmailExceptionInterface $exception) {
            $this->addFlash('verify_email_error', $exception->getReason());

            return $this->redirectToRoute('app_register');
        }

        // @TODO Change the redirect on success and handle or remove the flash message in your templates
        $this->addFlash('success', 'Your email address has been verified.');

        return $this->redirectToRoute('app_register');
    }

    /**
     * 
     */
    private function encodePassword(string $plainPassword, EntityManagerInterface $entityManager): string {

        $conn = $entityManager->getConnection();
        $sql = 'SELECT PASSWORD(:plainPassword) as encrypted';
        $stmt = $conn->prepare($sql);
        $resultStmt = $stmt->executeQuery(['plainPassword' => $plainPassword]);
        $result = $resultStmt->fetchAllAssociative();

        return $result[0]['encrypted'];

    }
}
