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
        return $bee;
    }

    


}

?>