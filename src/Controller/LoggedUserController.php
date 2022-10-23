<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

use App\Form\Type\UserType;
use App\login_observer\Login;
use App\User\User;

use App\DataController\Writer\TXT\Processor;

use App\Security\Security;

use App\DataController\Writer\TXT\TxtManager;
use App\DataController\Writer\TXT\TxtUserEncoder;

class LoggedUserController extends AbstractController
{
    /**
     * @Route("user/logged", name="user_logged")
     */
    public function index()
    {

        //$data = new DataController;
        //$name = $data->getDataById($name);
        //$decode = new TxtManager();
        //$value = $decode->getDecoder()->decode();

        $encoder = new TxtUserEncoder();
        //$value = $encoder->test();

        $finder = new Processor();
        $files = $finder->findFile('martyna');

        foreach($files as $file)
        {
            print_r($file);
            echo '<br><br>';
        }


        echo '<br><br><br>';

        $hashed = new Security();
        echo $hash = $hashed->save();

        return new Response();
    }
}