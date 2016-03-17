<?php

namespace ApidaeBundle\Twig\Extension;

 use ApidaeBundle\Entity\Langue;
 use ApidaeBundle\Entity\ObjetApidae;
 use Twig_Extension;
 use Twig_SimpleFunction;

 class Fonctions extends  Twig_Extension {
     private $SIT_LANGUE = 'Fr';

     /**
      * Returns the name of the extension.
      *
      * @return string The extension name
      */
     public function getName()
     {
         return 'fonctions_extension';
     }

     public function getFilters() {
         return array(new \Twig_SimpleFilter('langueLib', array($this, 'getLangueLib')),
             new \Twig_SimpleFilter('typeApidae', array($this, 'getTypeApidae')));
     }

     public function getFunctions() {
         return array(new Twig_SimpleFunction('tradLangue', array($this, 'getTradLangue')));
     }

     function getLangueLib($str, $locale='') {
         if (empty ($locale)) {
             $locale = $this->SIT_LANGUE;
         }
         $debut = strpos($str, '@' . $locale . ':');
         if ($debut === false) {
             return $str;
         }
         $debut += strlen('@' . $locale . ':');
         $fin = strpos($str, '@', $debut);
         return substr($str, $debut, $fin - $debut);
     }

     function getTypeApidae($str) {
         $chaineExplode = explode("_", $str);
         return $chaineExplode[0];
     }

     function getTradLangue(ObjetApidae $objet, Langue $langue) {
         foreach($objet->getTraductions() as $value) {
             if($value->getLangue() == $langue) {
                 return $value;
             }
         }
         return null;
     }
 }