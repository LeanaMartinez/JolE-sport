<?php

namespace App\Controller;

use App\Entity\Team;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ProfileController extends Controller
{
    /**
     * @Route("/profile", name="profile")
     */
    public function profile()
    {
        return $this->render('Content/profile.html.twig', [
            'controller_name' => 'GameController',
        ]);
    }

    /**
     * @Route("/favteam/{id}", name="add_fav_team")
     * @param Request $request
     * @param Team $team
     * @param ObjectManager $manager
     * @return int|string
     */
    public function addFavTeamAction(Request $request, Team $team, ObjectManager $manager) {

        $user = $this->getUser();
        $user->addFavTeam($team);
        $manager->persist($user);
        $manager->flush();


        return $this->render('Content/profile.html.twig', [
            'controller_name' => 'GameController',
        ]);
       }

    /**
     * @Route("/deleteFavTeam/{id}", name="remove_fav_team")
     * @param Request $request
     * @param Team $team
     * @param ObjectManager $manager
     * @return int|string
     */
    public function removeFavTeamAction(Request $request, Team $team, ObjectManager $manager) {

            $user = $this->getUser();
            $user->removeFavTeam($team);
            $manager->flush();

        return $this->render('Content/profile.html.twig', [
            'controller_name' => 'GameController',
        ]);
    }


}