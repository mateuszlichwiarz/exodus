<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

use Symfony\Component\Routing\Annotation\Route;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

use App\Entity\User;
use Doctrine\Persistence\ManagerRegistry;

use App\Form\Type\Sign\SignEmailType;
use App\Form\Type\Sign\SignPasswordType;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

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
     * @Route("sign/sign_in/email", methods = "GET", name="sign_email")
     */
    public function signInEmail(Request $request, ManagerRegistry $doctrine): Response
    {
        $user = new User();
        $formEmail = $this->createForm(SignEmailType::class, $user, [
            'action' => $this->generateUrl('sign_password'),
            'method' => 'POST',
        ]);
        $formEmail->handleRequest($request);
        if($formEmail->isSubmitted() && $formEmail->isValid())
        {
            $user = $formEmail->getData();
            
            //return $this->redirectToRoute('sign_password');
        }

        return $this->renderForm('sign/signEmail.html.twig', [
            'formEmail' => $formEmail,
        ]);
    }

    /**
     * @Route("sign/sign_in/password", methods = "POST", name="sign_password")
     */
    public function signInPassword(Request $request, UserPasswordHasherInterface $passwordHasher): Response
    {
        $user = new User();
        $formPassword = $this->createForm(SignPasswordType::class, $user, [
            'action' => $this->generateUrl('index'),
            'method' => 'POST',
        ]);
        $formPassword->handleRequest($request);
        if($formPassword->isSubmitted() && $formPassword->isValid())
        {
            $password = $formPassword->GetData();
            $hashedPassword = $passwordHasher->hashPassword(
                $user,
                $password
            );


        }
        return $this->renderForm('sign/signPassword.html.twig', [
            'formPassword' => $formPassword,
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