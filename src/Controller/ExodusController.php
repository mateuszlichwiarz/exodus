<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ExodusController extends AbstractController
{
    /**
     * @Route("/mainpage", name="mainpage")
     */
    public function index()
    {
        return $this->render('exodus/index.html.twig');
    }