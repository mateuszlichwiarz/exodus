<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CharacterController extends AbstractController
{
    /**
     * @Route("/character", name="mainpage")
     */
    public function index()
    {
        return $this->render('character/index.html.twig');
    }

    /**
     * @Route("/character/create")
     */
    public function create()
    {
        return $this->render('character/create.html.twig');
    }
}