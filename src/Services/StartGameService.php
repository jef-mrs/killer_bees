<?php 

namespace APP\Services;

use App\Entity\Bee;

/**
 * Create bees to begin the game
 * 
 */
class Starter {

    /**
     * create Queen bee
     *
     * @return void
     */
    public function queen() {
        $queen = new Bee();
        $queen->setType('Queen');
        $queen->setPoint(100);

        return $queen;
    }

    /**
     * create Worker bees
     *
     * @param int $number
     * @return void
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
     * @return void
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