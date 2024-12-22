<?php

namespace App\Controller;

use App\Repository\BeeRepository;
use Doctrine\ORM\EntityManagerInterface;
use App\Services\HitBeesService;
use App\Services\StarterService;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class PagesController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function index(StarterService $starter, EntityManagerInterface $em, BeeRepository $beeRepository): Response{
    
        if ($beeRepository->findAll() > 0){
            // Reset bee points to their original values if they were modified during a previous game.
            $starter->resetPoint($beeRepository->findAll(), $em);
            $em->flush();
            // Retrieve bees from the database to display on the homepage.
            return $this->render('pages/index.html.twig', [
               
                'bees' => ($beeRepository->findAll()) 
            ]);
        }

        // Create bees using StarterService and persist them to the database

        $starter->queen($em);
        $starter->workers(5, $em);
        $starter->scouts(8, $em);

        $em->flush();  // Flush the database to persist the bees.  This is a good practice, especially when working with Doctrine ORM.  It ensures that the changes are persisted to the database.  It also allows for more complex database operations.  In this case, we're just adding entities to the database.  If we were updating or deleting entities, we would use a different approach.
        $bees = $beeRepository->findAll();

        return $this->render('pages/index.html.twig', [
            'bees' => $bees 
        ]);
    }

    #[Route('/hit', name: 'hit_bees')]
    public function hitBeez(HitBeesService $hitBee, EntityManagerInterface $em, BeeRepository $beeRepository): JsonResponse {
        
        
        $bees = $beeRepository->findAll();
        $bee = $hitBee->hitBee($hitBee->chooseBee($bees));
        $em->persist($bee); 
        $em->flush();

        $message=null;
        if(!$hitBee->isOneBeeAlive($bees)){
            $message = 'You win all bees are been killed !!! ';
        }

        return $this->json(['point' => $bee->getPoint(),
                            'id' => $bee->getId(),
                            'type' => $bee->getType(),
                            'message' => $message], 200);
                            

    
    }
}
