<?php

namespace App\Controller;

use App\Form\MobFilterType;
use PhpParser\Node\Name;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Mob;
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
    public function collection(Request $request)
    {
        $entityManager = $this
            ->getDoctrine()
            ->getManager()
        ;

        $form = $this->createForm(MobFilterType::class, [
            'method' => 'GET',
        ]);

        $form->handleRequest($request);

        //verifications
        if($form->isSubmitted() && $form->isValid()) {

            $name = $form->get('Name')->getData();
            $family = $form->get('Family')->getData();
            $nbclass = $form->get('Class')->getData();
            $gradenat = $form->get('GradeNat')->getData();
            $tabAttrOfNb = $form->get('Attribute')->getData();
            $tabAttOfNbInv = array_flip($tabAttrOfNb);

            $tabAtt = $entityManager->getRepository(Mob::class)->getAttribute();
            $tabAttInv = array_flip($tabAtt);

            $tabIntersect = array_intersect_key($tabAttInv, $tabAttOfNbInv);

            $tabClass = $entityManager->getRepository(Mob::class)->getClass();

            if ($nbclass === 'Tous'){
                $class = '';
            }
            else{
                $class = array_flip($tabClass)[$nbclass];
            }

            dump($tabIntersect);

            if (!$tabIntersect){
                $mobs['Feu'] = $entityManager->getRepository(Mob::class)->getMobsByAttribute($name, $family, $class, (int)$gradenat, 'Feu');
                $mobs['Eau'] = $entityManager->getRepository(Mob::class)->getMobsByAttribute($name, $family, $class, (int)$gradenat, 'Eau');
                $mobs['Vent'] = $entityManager->getRepository(Mob::class)->getMobsByAttribute($name, $family, $class, (int)$gradenat, 'Vent');
                $mobs['Light'] = $entityManager->getRepository(Mob::class)->getMobsByAttribute($name, $family, $class, (int)$gradenat, 'Light');
                $mobs['Dark'] = $entityManager->getRepository(Mob::class)->getMobsByAttribute($name, $family, $class, (int)$gradenat, 'Dark');
            }else{
                foreach ($tabIntersect as $v) {
                    $mobs[$v] = $entityManager->getRepository(Mob::class)->getMobsByAttribute($name, $family, $class, (int)$gradenat, $v);
                }
            }

//            //$test[$tabIntersect[0]] = 'test ele';
//            //$test[$tabIntersect[1]] = 'test ele2';
//            //dump($test);
//            $test = null;
//
//            foreach ($tabIntersect as $v) {
//                $test[$v] = 'test ele';
//            }
//
//            if (!$test){
//                  dump('yop');
//            }else{
//                dump($test);
//            }
//
//
//
//
//
//            $mobs['feu'] = $entityManager->getRepository(Mob::class)->getMobsByAttribute($name, $family, $class, (int)$gradenat, 'Feu');
//            $mobs['eau'] = $entityManager->getRepository(Mob::class)->getMobsByAttribute($name, $family, $class, (int)$gradenat, 'Eau');
//            $mobs['vent'] = $entityManager->getRepository(Mob::class)->getMobsByAttribute($name, $family, $class, (int)$gradenat, 'Vent');
//            $mobs['light'] = $entityManager->getRepository(Mob::class)->getMobsByAttribute($name, $family, $class, (int)$gradenat, 'Light');
//            $mobs['dark'] = $entityManager->getRepository(Mob::class)->getMobsByAttribute($name, $family, $class, (int)$gradenat, 'Dark');

            dump($mobs);

            //die('cc');
        }
        else {
            $mobs['Feu'] = $entityManager->getRepository(Mob::class)->getMobsByAttribute2('', '', '', 0, 2);
            $mobs['Eau'] = $entityManager->getRepository(Mob::class)->getMobsByAttribute('', '', '', 0, 'Eau');
            $mobs['Vent'] = $entityManager->getRepository(Mob::class)->getMobsByAttribute('', '', '', 0, 'Vent');
            $mobs['Light'] = $entityManager->getRepository(Mob::class)->getMobsByAttribute('', '', '', 0, 'Light');
            $mobs['Dark'] = $entityManager->getRepository(Mob::class)->getMobsByAttribute('', '', '', 0, 'Dark');
            dump($mobs);


        }

        return $this->render('default/collection.html.twig', [
            'mobs' => $mobs,
            'form' => $form->createView(),
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
