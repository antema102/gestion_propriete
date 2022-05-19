<?php 
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController{

/**
 * @Route("/",name="Homepage")
 */
public function Home(){
    return $this->render('home.html.twig',[
        'Titre_du_texte'=>"Bienvenu sur mon site Web"
    ]
        );
    }

}