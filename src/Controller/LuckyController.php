<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LuckyController
{
    /**
     * @Route("lucky/number")
     */
    public function number(): Response
    {
        $random = rand(0,1000);
        return new Response(
            $random
        );
    }

}
