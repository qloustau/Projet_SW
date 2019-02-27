<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="accueil")
     */
    public function accueil()
    {
        return $this->render('default/index.html.twig', [
            'controller_name' => 'DefaultController',
        ]);
    }

    /**
     * @Route("/runage", name="runage")
     */
    public function runage()
    {
        return $this->render('default/runage.html.twig', [
            'controller_name' => 'DefaultController',
        ]);
    }

    /**
     * @Route("/collection", name="collection")
     */
    public function collection()
    {
        return $this->render('default/collection.html.twig', [
            'controller_name' => 'DefaultController',
        ]);
    }

    /**
     * @Route("/utilite", name="utilite")
     */
    public function utilite()
    {
        return $this->render('default/utilite.html.twig', [
            'controller_name' => 'DefaultController',
        ]);
    }

    /**
     * @Route("/gvg", name="gvg")
     */
    public function gvg()
    {
        return $this->render('default/gvg.html.twig', [
            'controller_name' => 'DefaultController',
        ]);
    }

    /**
     * @Route("/historique", name="historique")
     */
    public function historique()
    {
        return $this->render('default/historique.html.twig', [
            'controller_name' => 'DefaultController',
        ]);
    }

    /**
     * @Route("/aide_teams", name="aide_teams")
     */
    public function aide_teams()
    {
        return $this->render('default/aide_teams.html.twig', [
            'controller_name' => 'DefaultController',
        ]);
    }

    /**
     * @Route("/stats_defenses", name="stats_defenses")
     */
    public function stats_defenses()
    {
        return $this->render('default/stats_defenses.html.twig', [
            'controller_name' => 'DefaultController',
        ]);
    }

    /**
     * @Route("/recensement", name="recensement")
     */
    public function recensement()
    {
        return $this->render('default/recensement.html.twig', [
            'controller_name' => 'DefaultController',
        ]);
    }

    /**
     * @Route("/faq", name="faq")
     */
    public function faq()
    {
        return $this->render('default/faq.html.twig', [
            'controller_name' => 'DefaultController',
        ]);
    }

    /**
     * @Route("/cgu", name="cgu")
     */
    public function cgu()
    {
        return $this->render('default/cgu.html.twig', [
            'controller_name' => 'DefaultController',
        ]);
    }

}
