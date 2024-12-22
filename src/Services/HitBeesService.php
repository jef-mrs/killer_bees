<?php 

namespace App\Services;

class HitBeesService {
    
    /**
     * Logic to hit bees
     * 
     * @param $bee
     */
    public function hitBee($bee) {
        // Implement logic to hit bees here

        switch ($bee->getType()){
            case 'Queen':
                $bee->setPoint($bee->getPoint() - 15);
                break;
            case 'Worker':
                $bee->setPoint($bee->getPoint() - 20);
                break;
            case 'Scout':
                $bee->setPoint($bee->getPoint() - 15);
                break;
        }

        $bee = $this->dyingBee($bee);

        return $bee;
    }

    /**
     * 
     * Function to choose the bee who be hit
     * 
     */
    public function chooseBee($bees){
        $key = array_rand($bees);
        while($bees[$key]->getPoint()<= 0){
            $key = array_rand($bees);
        }
        return $bees[$key];
    }

    /**
     * 
     * Function to check if all bees are dead
     * 
     */
    public function isOneBeeAlive($bees) {
        foreach($bees as $bee){
            if($bee->getPoint() > 0){
                return true;
            }
        }
        return false;
    }

    /**
     * 
     * Function to make a bee die
     * 
     */
    private function dyingBee($bee){
        if($bee->getPoint() < 0){
            $bee->setPoint(0);
        }

        return $bee;
    }

}

?>