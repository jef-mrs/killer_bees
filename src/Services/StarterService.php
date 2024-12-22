<?php 

namespace App\Services;

use App\Entity\Bee;

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
        }
    }

    public function resetPoint($bees, $em){

        foreach ($bees as $bee){
            
            switch ($bee->getType())
            {
                case 'queen';  
                    $bee->setPoint(100);
                    $em->persist();
                    break;
                case 'worker';
                    $bee->setPoint(50);
                    $em->persist();
                    break;
                case 'scout';
                    $bee->setPoint(30);
                    $em->persist();
                    break;
            }
        }
;  // Flush the database to persist the bees.  This is a good practice, especially when working with Doctrine ORM.  It ensures that the changes are persisted to the database.  It also allows for more complex database operations.  In this case, we're just adding entities to the database.  If we were updating or deleting entities, we would use a different approach.
    }

}



?>