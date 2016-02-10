<?php

namespace ApidaeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DefaultController extends Controller
{
    private $em;

    /**
     * @Route("/test")
     */
    public function indexAction()
    {

        //récupération des données :
        $apiKey = '4oqV1oVV';
        $projetId = '1464';
        $objId = '123457';
        $requete = array();
        $requete['apiKey'] = $apiKey;
        $requete['projetId'] = $projetId;
        $url = 'http://api.sitra-tourisme.com/api/v002/objet-touristique/get-by-id/';
        $url .= $objId;
        $url .= '?';
        $url .= 'apiKey='.urlencode($apiKey);
        $url .= '&projetId='.urlencode($projetId);
        //$url .= 'query='.urlencode(json_encode($requete));

        $content = file_get_contents($url);
        $data = json_decode($content);

        return $this->render('ApidaeBundle:Default:donnees.html.twig', array('url' => $url, 'data' => $data));
    }

    /**
     * @Route("/offre")
     */
    public function offreAction()
    {
        //Test objetLie
        $this->em = $this->getDoctrine()->getManager();
        $objetApidae = $this->em->getRepository(ObjetApidae::class)->findOneByIdObj(119889);
        $trad = null;
        if($objetApidae != null) {
            $traductions = $objetApidae->getTraductions();
            foreach($traductions as $value) {
                if($value->getLangue()->getLanLibelle() == "Français") {
                    $trad = $value;
                }
            }
            return $this->render('ApidaeBundle:Default:index.html.twig', array('objet' => $objetApidae, 'trad' => $trad));
        } else {
            return $this->render('ApidaeBundle:Default:index.html.twig');
        }
    }

}
