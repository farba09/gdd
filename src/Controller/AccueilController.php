<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class AccueilController extends AbstractController
{
    #[Route('/', name: 'app_accueil')]
    public function index(): Response
    {
        $signalements = [
            [
                'prenom' => 'Farba',
                'nom' => 'KANE',
                'email' => 'farba@kane.com',
                'message' => 'je suis un message de farba',
                'signalAdresse' => [
                    'rue' => '83 rue de la ville',
                    'codePostal' => '75001',
                    'ville' => 'Paris',
                    'picture' => 'https://randomcity.net/wp-content/uploads/2024/06/4095_juizdefora_Brazil-1024x768.jpg'
                ]
            ],
            [
                'prenom' => 'Maymuna',
                'nom' => 'GAMBONI',
                'email' => 'maymuna@gamboni.com',
                'message' => 'je suis un message de maymuna',
                'signalAdresse' => [
                    'rue' => '83 rue de la ville',
                    'codePostal' => '69001',
                    'ville' => 'Lyon',
                    'picture' => 'https://randomcity.net/wp-content/uploads/2024/06/4095_juizdefora_Brazil-1024x768.jpg'
                ]
            ]
        ];

        return $this->render('accueil/index.html.twig', [
            'signalement' => $signalements
        ]);
    }
}
