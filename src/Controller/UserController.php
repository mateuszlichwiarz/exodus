<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

use App\Form\Type\UserType;

use Doctrine\Persistence\ManagerRegistry;

use App\Entity\User;


class UserController extends AbstractController
{
    /**
     * @Route("user", name="index")
     */
    public function index(): Response
    {
        return $this->render('user/index.html.twig', [
            
        ]);
    }

    /**
     * @Route("user/new", name="user_new_data_input")
     */
    public function createUser(Request $request, ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();

        $user = new User();
        $form_0 = $this->createForm(UserType::class, $user);


        $form_0->handleRequest($request);
        //$form_1->handleRequest($request);

        if($form_0->isSubmitted() && $form_0->isValid())
        {
            $user = $form_0->getData();
            
            $entityManager->persist($user);
            $entityManager->flush();

            return $this->redirectToRoute();
        }

        return $this->renderForm('user/user_new.html.twig', [
            'form_0'  => $form_0,
        ]);
    }

    /**
     * @Route("user/new/as", name="user_new_data_process")
     */
    public function newUseDataProcess(): Response
    {

        

        return new Response('Hello User '.'!, <br><br>Your name is '.' and you loged by '.' password. Im not wrong?');

    }

}
