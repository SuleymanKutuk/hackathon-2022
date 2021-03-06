<?php

namespace App\Controller;

use App\Form\TaskType;
use App\Entity\User;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * @SuppressWarnings(PHPMD)
 */
class SecurityController extends AbstractController
{
    #[Route(path: '/login', name: 'app_login')]
    public function login(AuthenticationUtils $authenticationUtils): Response
    {
        /*if ($this->getUser()) {
            return $this->render('dashboard/dashboard.html.twig', /*[
                'user' => $this->getUser(),
            ];*/

        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();

        // last username entered by the user
        $user = $authenticationUtils->getLastUsername();



        return $this->render(
            'security/login.html.twig',
            ['user' => $user, 'error' => $error]
        );
    }

    #[Route(path: '/logout', name: 'app_logout')]
    public function logout(): void
    {
        throw
        new \LogicException('This method can be blank - it will be intercepted by the logout key on your firewall.');
    }
}
