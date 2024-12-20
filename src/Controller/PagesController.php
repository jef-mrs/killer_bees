<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Services\StarterService;
use Symfony\Component\HttpFoundation\JsonResponse;

class PagesController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function index(StarterService $starter): Response
    {
        $queen = $starter->queen();
        $workers = $starter->workers(5);
        $scouts = $starter->scouts(8);

        $bees =[$queen, ...$workers, ...$scouts]; 

        return $this->render('pages/index.html.twig', [
            'bees' => $bees,
        ]);
    }

    #[Route('/hit', name: 'hit_bees')]
    public function hitBeez(): JsonResponse {
        // Implement logic to hit bees here
        
        return $this->json(['message' => 'Bees have been hit!'], 200);
    }
}
