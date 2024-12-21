<?php 

namespace App\Services;

use App\Entity\Bee;
use Doctrine\ORM\EntityManager;

/**
 * Create bees to begin the game
 * 
 */
class StarterService {

    /**
     * create Queen bee
     *
     * @return Bee::class

     */
    public function queen($em) {
        $queen = new Bee();
        $queen->setType('Queen');
        $queen->setPoint(100);
        $em->persist($queen);
        $em->flush();

    }

    /**
     * Creat Workers bee
     *  
     * @param int $number
     * @return array
     */

     public function workers($number, $em) {
        for ($i = 0; $i < $number; $i++) {
            $worker = new Bee();
            $worker->setType('Worker');
            $worker->setPoint(50);
            $em->persist($worker);
            $em->flush();
        }

 
        
    }

    /**
     * Creat Scout bee
     *  
     * @param int $number
     * @return array
     */
    public function scouts($number, $em) {
        $scouts = [];
        for ($i = 0; $i < $number; $i++) {
            $scout = new Bee();
            $scout->setType('Scout');
            $scout->setPoint(30);
            $em->persist($scout);
            $em->flush();
        }
    }

}



?>