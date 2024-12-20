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
    public function queen() {
        $queen = new Bee();
        $queen->setType('Queen');
        $queen->setPoint(100);

        return $queen;
    }

    /**
     * Creat Workers bee
     *  
     * @param int $number
     * @return array
     */

     public function workers($number) {
        $workers = [];
        for ($i = 0; $i < $number; $i++) {
            $worker = new Bee();
            $worker->setType('Worker');
            $worker->setPoint(50);
            $workers[] = $worker;
        }

        return $workers;
 
        
    }

    /**
     * Creat Scout bee
     *  
     * @param int $number
     * @return array
     */
    public function scouts($number) {
        $scouts = [];
        for ($i = 0; $i < $number; $i++) {
            $scout = new Bee();
            $scout->setType('Scout');
            $scout->setPoint(30);
            $scouts[] = $scout;
        }

        return $scouts;
    }

}



?>