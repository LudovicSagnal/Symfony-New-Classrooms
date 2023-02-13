<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\DBAL\Types\Types;
use App\Entity\Cours;
use App\Form\CoursType;
use App\Repository\CoursRepository;
use App\Entity\Chapitre;
use App\Form\ChapitreType;
use App\Repository\ChapitreRepository;

// #[Route('/admin')]
class AdrarController extends AbstractController
{

    #[Route('/accueil', name: 'app_accueil')]
    public function index(): Response {
        return $this->render('adrar/index.html.twig', [
            'controller_name' => 'AdrarController',
        ]);
    }

    #[Route('/formations', name: 'app_formations')]
    public function bidule(CoursRepository $coursRepository): Response {
        return $this->render('adrar/formations.html.twig', [
            'controller_name' => 'AdrarController2',
            'cours' => $coursRepository->findAll(),
        ]);
    }

    #[Route('/cours', name: 'app_cours')]
    public function index2(Request $request, CoursRepository $coursRepository, ChapitreRepository $chapitreRepository): Response
    {
        return $this->render('cours/index.html.twig', [
            'controller_name' => 'AdrarController',
            'cour' => $coursRepository->find(1),
            'chapitre' => $chapitreRepository->find(1),
        ]);
    }

    #[Route('/chapitre', name: 'app_chapitre')]
    public function index3(ChapitreRepository $chapitreRepository): Response
    {
        return $this->render('chapitre/index.html.twig', [
            'controller_name' => 'AdrarController',
            // 'cour' => $coursRepository->find(1),
            'chapitres' => $chapitreRepository->find(1),
        ]);
    }
}