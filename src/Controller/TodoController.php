<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use function mysql_xdevapi\getSession;

class TodoController extends AbstractController
{
    #[Route('/todo', name: 'todo')]
    public function index(Request $request): Response
    {
        $session = $request->getSession();
         // Afficher notre tableau de todo
        if (!$session->has('todo'))
        {
            $todos=[
                'achat'=>'Acheter un clé USB',
                'cours'=>'Finaliser mon cours',
                'correction'=>'Corriger mes examens'

            ];
            $session->set('todo',$todos);
            $this->addFlash('info',"La liste des todos viens d'étre initialisée");
        }
        return $this->render('todo/index.html.twig');
    }
   #[Route ('/todo/add/{name}/{content}',name: 'todo.add')]
    public function addTodo(Request $request,$name,$content)
       {
        $session = $request->getSession();
        //var_dump($session);
        if ($session->has('todos')){
            $todos =$session->get('todos');
            if(isset($todos[$name])){
                $this->addFlash('error', "Le todo d'id $name existe déja dans la liste");
            }else{
                $todos[$name]=$content;
                $this->addFlash('success', "Le todo d'id $name  a été ajouté");
                $session->set('todos',$todos);
            }
        }else{
            $this->addFlash('error', "La liste n'est pas encore initialisée");
        }
        return $this->redirectToRoute('todo');
       }
}
