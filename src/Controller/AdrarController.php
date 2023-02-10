<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

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
    public function bidule(): Response {
        return $this->render('adrar/formations.html.twig', [
            'controller_name' => 'AdrarController2',
        ]);
    }

    #[Route('/cours', name: 'app_cours')]
    public function index2(): Response
    {
        return $this->render('cours/index.html.twig', [
            'controller_name' => 'AdrarController',
        ]);
    }
}