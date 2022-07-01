<?php

namespace App\Controller;

use App\Repository\WorkSpaceRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;

#[Security("is_granted('ROLE_ADMIN')")]
class HomeController extends AbstractController
{
    #[Route('/dashboard', name: 'dashboard')]
    public function dashboard(WorkSpaceRepository $workSpaceRepository): Response
    {
        $workspaces = $workSpaceRepository->findAll();
        return $this->render('/dashboard/dashboard.html.twig', [
            'workspaces' => $workspaces,
        ]);
    }
}
