<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/")
 */

class DefaultController extends AbstractController
{
    /**
     * @Route("/", name="app_home")
     */
    public function index()
    {
        return $this->render('default/index.html.twig', [
            'controller_name' => 'DefaultController',
        ]);
    }

    /**
     * @Route("/user", name="default_user")
     */
    public function user() {
        $first_name = "Thomas";
        $last_name = "Lecacheux";

        return $this->render('default/user.html.twig', [  //     render() = revoie a la page ('page') les info suivante : $first_name et $last_name
            'first_name' => $first_name,
            'last_name' => $last_name,
        ]);

    }

}
