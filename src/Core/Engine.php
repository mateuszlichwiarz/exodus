<?php

namespace App\Core;

class Engine
{
    public static function getIp($ip2long = true)
    {
        if($_SERVER['HTTP_CLIENT_IP'])
        {
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        }
        elseif($_SERVER['HTTP_X_FORWARDED_FOR'])
        {
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        }
        else
        {
            $ip = $_SERVER['REMOTE_ADDR'];
        }


        if($ip2long)
        {
            $ip = ip2long($ip);
        }

        return $ip;
    }

    /*
    public static function getParams()
    {
        $repository   = $doctrine->getRepository(Users::class);
        $user         = $repository->findOneBy(['user' => $userName]);
        $repoUserName = $user->getUserName();
        $repoPassword = $user->getPassword();

        return $params = ['userName' => $repoUserName,
                        'password' => $repoPassword,
                    ];
    }
    */
}