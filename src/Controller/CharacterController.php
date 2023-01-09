<?php

namespace App\Controller;

use App\Entity\User;
use App\Entity\Character;
use App\Entity\Weapon;
use App\Entity\Armor;

use App\Form\Character\CreateCharacterFormType;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CharacterController extends AbstractController
{
    /**
     * @Route("/character", name="character_index")
     */
    public function index(ManagerRegistry $doctrine, Request $request)
    {
        /** @var \App\Entity\User $user */
        $user = $this->getUser();
        $playerCharacter = $user->getPlayerCharacter();

        $strUpd = $request->query->get('str');
        $spUpd  = $request->query->get('sp');
        echo $strUpd.'<br>';
        echo $spUpd.'<br>';
        
        if(empty($playerCharacter))
        {
            echo 'you dont have any character<br>';
        }else
        {
            $playerCharacter = $user->getPlayerCharacter();

            $name = $playerCharacter->getName();
            $lvl  = $playerCharacter->getLvl();
            $exp  = $playerCharacter->getExp();
            $str  = $playerCharacter->getStr();
            $sp   = $playerCharacter->getSkillPoints();
            
            $weaponObject = $playerCharacter->getWeapon();
            $armorObject  = $playerCharacter->getArmor();

            $weaponName = $weaponObject->getName();
            $weaponDmg  = $weaponObject->getDmg();
            $weaponType = $weaponObject->getType();

            $armorName = $armorObject->getName();
            $armorDef  = $armorObject->getDef();

            return $this->render('character/character.html.twig',[
                'name' => $name,
                'lvl'  => $lvl,
                'exp'  => $exp,
                'str'  => $str,
                'sp'   => $sp,
                'weaponName' => $weaponName,
                'weaponDmg'  => $weaponDmg,
                'weaponType' => $weaponType,
                'armorName'  => $armorName,
                'armorDef'   => $armorDef,
            ]);
        }

        return $this->render('character/index.html.twig');
    }

    /**
     * @Route("/character/creator", name="character_creator")
     */
    public function create(ManagerRegistry $doctrine ,Request $request): Response
    {

        $character = new Character();

        /** @var \App\Entity\User $user */
        $user = $this->getUser();

        $form = $this->createForm(CreateCharacterFormType::class, $character);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid())
        {
            $weapon = $doctrine->getRepository(Weapon::class)->find(1);
            $armor  = $doctrine->getRepository(Armor::class)->find(1);

            if(empty($weapon) && empty($armor))
            {
                echo 'Not Found equipment! Please return to mainpage and retry later';
            }else
            {
                $character->setWeapon($weapon);
                $character->setArmor($armor);

                $character->setLvl(1);
                $character->setArmor($armor);
                $character->setExp(0);
                $character->setSkillPoints(5);

                $character = $form->getData();
                $user->setPlayerCharacter($character);

                $entityManager = $this->getDoctrine()->getManager();
                $entityManager->persist($character,$user);
                $entityManager->flush();

                return $this->redirectToRoute('character_index');
                }
        }

        return $this->render('character/create.html.twig', [
            'form' => $form->createView()
            
        ]);
    }

    /**
     * @Route("/character/update_stats", name="character_update_stats")
     */
    public function updateStats(Request $request)
    {
        /** @var \App\Entity\User $user */
        $user = $this->getUser();
        $playerCharacter = $user->getPlayerCharacter();
        
        $spDatabase = $playerCharacter->getSkillPoints();

        $strPost = $request->request->get('str');
        $spPost  = $request->request->get('sp');
        
        echo 'database: '.$spDatabase;
        echo '<br> post: '.$spPost.'<br>';

        if(($spDatabase < $spPost) || ($spDatabase == $spPost) || $spDatabase == 0)
        {
            $error_message = "Don't. Just DON'T.";
            return new Response($error_message);
        }else
        {
            $playerCharacter->setStr($strPost);
            $playerCharacter->setSkillPoints($spPost);

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($playerCharacter,$user);
            $entityManager->flush();

            return $this->redirectToRoute('character_index');
        }
        
        

        //return $this->redirectToRoute('character_index');      
    }

    /**
     * @Route("/character/inventory", name="character_inventory")
     */
    public function inventory()
    {
        
        return new Response('Inventory');
    }
}