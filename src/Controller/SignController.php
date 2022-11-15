<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Form\Type\UserType;
use App\Entity\User;

use Symfony\Component\Routing\Annotation\Route;

class SignController extends AbstractController
{
    /**
     * @Route("sign/", methods="GET", name="sign_index")
     */
    public function index(): Response
    {
        return $this->render('sign/index.html.twig', []);
    }

    /**
     * @Route("sign/sign_in/", methods = "GET", name="sign_email")
     */
    public function signInEmail(Request $request): Response
    {
        $user = new User();
        $form_0 = $this->createForm(UserType::class, $user);
        $form_0->handleRequest($request);
        return $this->renderForm('sign/sign_email.html.twig', [
            
        ]);
    }

    /**
     * @Route("sign/sign_in/password", methods = "GET", name="sign_password")
     */
    public function signInPassword(): Response
    {
        return $this->renderForm('sign/sign_password.html.twig', [
            
        ]);
    }

    /**
     * @Route("sign/sign_up", methods = "POST", name="sign_up")
     */
    public function signUp(): Response
    {
        return $this->renderForm('sign/sign_up.html.twig', [
            
        ]);
    }

}