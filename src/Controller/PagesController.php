<?php

namespace App\Controller;

use App\Entity\Bee;
use App\Repository\BeeRepository;
use Doctrine\ORM\EntityManagerInterface;
use App\Services\HitBeesService;
use App\Services\StarterService;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class PagesController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function index(StarterService $starter, EntityManagerInterface $em, BeeRepository $beeRepository): Response{
    
        foreach ($beeRepository->findAll() as $bee){
            $em->remove($bee);
        }

        // Create bees using StarterService and persist them to the database

        $starter->queen($em);
        $starter->workers(5, $em);
        $starter->scouts(8, $em);
        
        $bees = $beeRepository->findAll();
        $key = array_rand($bees);
        $id = $bees[$key]->getId();


        return $this->render('pages/index.html.twig', [
            'bees' => $bees,
            'id' => $id, 
        ]);
    }

    #[Route('bee/{id}/hit', name: 'hit_bees')]
    public function hitBeez(Bee $bee, HitBeesService $hitBee, EntityManagerInterface $em, BeeRepository $beeRepository): JsonResponse {
        
        $bee = $hitBee->hitBee($bee);
        $em->persist($bee);  // Persist the updated bee to the database.  The database will then update the point of the bee.  This is a better practice than using Doctrine's automatic update feature.  It ensures consistency and prevents race conditions.  It also allows for more complex database operations.  In this case, we're just updating a single field.  If we were updating multiple fields, we would use a different approach.
        $em->flush();

        $bees = $beeRepository->findAll();
        $key = array_rand($bees);
        $randId = $bees[$key]->getId();
        return $this->json(['point' => $bee->getPoint(),
                            'id' => $bee->getId(),
                            'type' => $bee->getType(),
                            'randId' => $randId], 200);
    }
}
