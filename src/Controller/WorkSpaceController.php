<?php

namespace App\Controller;

use App\Entity\WorkSpace;
use App\Form\WorkSpaceType;
use App\Repository\ProjectRepository;
use App\Repository\WorkSpaceRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/work/space')]
class WorkSpaceController extends AbstractController
{
    #[Route('/', name: 'app_work_space_index', methods: ['GET'])]
    public function index(WorkSpaceRepository $workSpaceRepository): Response
    {
        return $this->render('work_space/index.html.twig', [
            'work_spaces' => $workSpaceRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_work_space_new', methods: ['GET', 'POST'])]
    public function new(Request $request, WorkSpaceRepository $workSpaceRepository): Response
    {
        $workSpace = new WorkSpace();
        $form = $this->createForm(WorkSpaceType::class, $workSpace);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $workSpaceRepository->add($workSpace, true);

            return $this->redirectToRoute('app_work_space_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('work_space/new.html.twig', [
            'work_space' => $workSpace,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_work_space_show', methods: ['GET'])]
    public function show(WorkSpace $workSpace, ProjectRepository $projectRepository): Response
    {
        $projects = $projectRepository->findAll();
        return $this->render('work_space/show.html.twig', [
            'work_space' => $workSpace,
            'projects' => $projects,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_work_space_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, WorkSpace $workSpace, WorkSpaceRepository $workSpaceRepository): Response
    {
        $form = $this->createForm(WorkSpaceType::class, $workSpace);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $workSpaceRepository->add($workSpace, true);

            return $this->redirectToRoute('app_work_space_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('work_space/edit.html.twig', [
            'work_space' => $workSpace,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_work_space_delete', methods: ['POST'])]
    public function delete(Request $request, WorkSpace $workSpace, WorkSpaceRepository $workSpaceRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$workSpace->getId(), $request->request->get('_token'))) {
            $workSpaceRepository->remove($workSpace, true);
        }

        return $this->redirectToRoute('app_work_space_index', [], Response::HTTP_SEE_OTHER);
    }
}
