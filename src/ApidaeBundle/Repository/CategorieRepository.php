<?php

namespace ApidaeBundle\Repository;
use ApidaeBundle\Entity\Categorie;

/**
 * CategorieRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class CategorieRepository extends \Doctrine\ORM\EntityRepository {

    //------Hébergements
    //Get Hotel et Hotel-Restaurant
    public function getHotels() {
        $em = $this->getEntityManager();
        $qb = $em->createQueryBuilder();
        $qb->select('c')
            ->from('ApidaeBundle:Categorie', 'c')
            ->where('c.catId = ?1')
            ->orWhere('c.catId = ?2')
            ->setParameters(array(1 => '2734', 2 => '2736'));
        $query = $qb->getQuery();
        return $query->getResult();
    }

    //Get Gîtes/Meublés et Gîtes d'étapes/Séjour
    public function getGites() {
        $em = $this->getEntityManager();
        $qb = $em->createQueryBuilder();
        $qb->select('c')
            ->from('ApidaeBundle:Categorie', 'c')
            ->where('c.catId = ?1')
            ->orWhere('c.catId = ?2')
            ->setParameters(array(1 => '2620', 2 => '2647'));
        $query = $qb->getQuery();
        return $query->getResult();
    }

    //Get les hébergements plein air
    public function getCampings() {
        $em = $this->getEntityManager();
        $qb = $em->createQueryBuilder();
        $qb->select('c')
            ->from('ApidaeBundle:Categorie', 'c')
            ->where('c.catId = ?1')
            ->orWhere('c.catId = ?2')
            ->setParameters(array(1 => '2418', 2 => '2410'));
        $query = $qb->getQuery();
        return $query->getResult();
    }

    public function getHebergementsAutres() {
        $em = $this->getEntityManager();
        $qb = $em->createQueryBuilder();
        $qb->select('c')
            ->from('ApidaeBundle:Categorie', 'c')
            ->where('c.catId = ?1')
            ->orWhere('c.catId = ?2')
            ->orWhere('c.catId = ?3')
            ->setParameters(array(1 => '2646', 2 => '2650', 3 => '2649'));
        $query = $qb->getQuery();
        return $query->getResult();
    }

    //------Restaurants
    //Get Bars et Pubs
    public function getBars() {
        $em = $this->getEntityManager();
        $qb = $em->createQueryBuilder();
        $qb->select('c')
            ->from('ApidaeBundle:Categorie', 'c')
            ->where('c.catId = ?1')
            ->orWhere('c.catId = ?2')
            ->setParameters(array(1 => '3404', 2 => '3215'));
        $query = $qb->getQuery();
        return $query->getResult();
    }

    //------ Activités
    //get Musées Patrimoines et Galeries
    public function getMusees() {
        $em = $this->getEntityManager();
        $qb = $em->createQueryBuilder();
        $qb->select('c')
            ->from('ApidaeBundle:Categorie', 'c')
            ->where('c.catId = ?1')
            ->orWhere('c.catId = ?2')
            ->orWhere('c.catId = ?3')
            ->setParameters(array(1 => '3203', 2 => '3347', 3 => '3201'));
        $query = $qb->getQuery();
        return $query->getResult();
    }

    //get itinieraires et parcours
    public function getItineraires() {
        $em = $this->getEntityManager();
        $qb = $em->createQueryBuilder();
        $qb->select('c')
            ->from('ApidaeBundle:Categorie', 'c')
            ->where('c.catId = ?1')
            ->orWhere('c.catId = ?2')
            ->orWhere('c.catId = ?3')
            ->orWhere('c.catId = ?4')
            ->setParameters(array(1 => '3283', 2 => '3333', 3 => '3331', 4 => '3330'));
        $query = $qb->getQuery();
        return $query->getResult();
    }



    //---- Requetes ancien menu

    public function getCategoriesHebergements() {
        $em = $this->getEntityManager();
        $qb = $em->createQueryBuilder();
        $qb->select('c')
            ->from('ApidaeBundle:Categorie', 'c')
            ->where('c.catRefType = ?1')
            ->orWhere('c.catRefType = ?2')
            ->orWhere('c.catRefType = ?3')
            ->orWhere('c.catRefType = ?4')
            ->setParameters(array(1 => 'HebergementCollectifType', 2 => 'HebergementLocatifType',
                3 => 'HotelleriePleinAirType', 4 => 'HotellerieType'));
        $query = $qb->getQuery();
        return $query->getResult();
    }

    public function getCategoriesRestaurants() {
        $em = $this->getEntityManager();
        $qb = $em->createQueryBuilder();
        $qb->select('c')
            ->from('ApidaeBundle:Categorie', 'c')
            ->where('c.catRefType = ?1')
            ->setParameter(1,'RestaurationCategorie' );
        $query = $qb->getQuery();
        return $query->getResult();
    }

    public function getCategoriesActivites() {
        $em = $this->getEntityManager();
        $qb = $em->createQueryBuilder();
        $qb->select('c')
            ->from('ApidaeBundle:Categorie', 'c')
            ->where('c.catRefType = ?1')
            ->orWhere('c.catRefType = ?2')
            ->orWhere('c.catRefType = ?3')
            ->setParameters(array(1 => 'PatrimoineCulturelType', 2 => 'ActiviteCategorie',
                3 => 'ActiviteType'));
        $query = $qb->getQuery();
        return $query->getResult();
    }

    public function getCategoriesEvenements() {
        $em = $this->getEntityManager();
        $qb = $em->createQueryBuilder();
        $qb->select('c')
            ->from('ApidaeBundle:Categorie', 'c')
            ->where('c.catRefType = ?1')
            ->setParameter(1,'FeteEtManifestationType' );
        $query = $qb->getQuery();
        return $query->getResult();
    }


}
