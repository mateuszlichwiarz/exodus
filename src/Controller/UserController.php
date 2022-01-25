<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UserController
{
    /**
     * @Route("user")
     */
    public function index(): Response
    {
        return new Response('
        ---Create User---<br>
        ---Login---
        ');
    }
    public function createUser(): Response
    {
        return new Response('You create new user');
    }

}
