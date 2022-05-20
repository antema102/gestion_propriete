<?php

namespace App\Controller;

use App\Entity\Ad;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AdController extends AbstractController
{
    //#[Route('/ad', name: 'app_ad')]
    /**
     *@Route("/ads",name="ads")
     *
     */
    public function index(ManagerRegistry $doctrine): Response
    {
        $repo=$doctrine->getRepository(Ad::class);
        $ads=$repo->findAll();
        
        return $this->render('ad/index.html.twig', [
            'ads'=> $ads,
        ]);
    }
}
