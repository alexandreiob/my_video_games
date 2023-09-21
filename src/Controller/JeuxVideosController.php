<?php

namespace App\Controller;

use App\Entity\JeuxVideos;
use App\Form\JeuxVideosType;
use App\Repository\JeuxVideosRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/jeux/videos')]
class JeuxVideosController extends AbstractController
{
    #[Route('/', name: 'app_jeux_videos_index', methods: ['GET'])]
    public function index(JeuxVideosRepository $jeuxVideosRepository): Response
    {
        return $this->render('jeux_videos/index.html.twig', [
            'jeux_videos' => $jeuxVideosRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_jeux_videos_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $jeuxVideo = new JeuxVideos();
        $form = $this->createForm(JeuxVideosType::class, $jeuxVideo);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($jeuxVideo);
            $entityManager->flush();

            return $this->redirectToRoute('app_jeux_videos_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('jeux_videos/new.html.twig', [
            'jeux_video' => $jeuxVideo,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_jeux_videos_show', methods: ['GET'])]
    public function show(JeuxVideos $jeuxVideo): Response
    {
        return $this->render('jeux_videos/show.html.twig', [
            'jeux_video' => $jeuxVideo,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_jeux_videos_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, JeuxVideos $jeuxVideo, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(JeuxVideosType::class, $jeuxVideo);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_jeux_videos_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('jeux_videos/edit.html.twig', [
            'jeux_video' => $jeuxVideo,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_jeux_videos_delete', methods: ['POST'])]
    public function delete(Request $request, JeuxVideos $jeuxVideo, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$jeuxVideo->getId(), $request->request->get('_token'))) {
            $entityManager->remove($jeuxVideo);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_jeux_videos_index', [], Response::HTTP_SEE_OTHER);
    }
}
