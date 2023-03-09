<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\BrowserKit\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FirstController extends AbstractController
{
    #[Route('/first', name: 'first')]
    public function index(): Response
    {
        // return new Response ()    ;
        //die('je suis la requete /first');
        return $this->render('first/index.html.twig',[
            'lastname'=> 'JLASSI',
            'firstname' =>'Sahbi',
            'occupation'=>'dev'
        ]);
    }
     #[Route('/hello/{name}/{firstname}', name: 'hello')]
     public function hello(\Symfony\Component\HttpFoundation\Request $request, $name,$firstname): Response
     {
        /* $rand = rand(0,10);
         var_dump($rand);
         echo $rand;
         if($rand == 10)
         {
             return $this->redirectToRoute('first');
         }

         return $this->forward('App\Controller\FirstController::index');
        */
          dd($request);
         return  $this->render('first/hello.html.twig',[
             'nom'=>$name,
             'firstname'=> $firstname
         ]);
     }

}

