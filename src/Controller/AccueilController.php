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
        $signalement = [
            [
                'id' => '1',
                'title' => 'titre du signalement',
                'auteur' => [
                    'prenom' => 'Farba',
                    'nom' => 'KANE',
                ],
                'adresse' => '83 rue de la ville',
                'coordonnees' => [
                    'longitude' => 2.34578,
                    'latitude' => 3.45536,
                ],
                'commentaire' => 'je suis un commentaire de farba',
                'picture' => 'https://randomcity.net/wp-content/uploads/2024/06/4095_juizdefora_Brazil-1024x768.jpg',
            ],
            [
                'id' => '2',
                'title' => 'titre du signalement',
                'auteur' => [
                    'prenom' => 'Farba',
                    'nom' => 'KANE',
                ],
                'adresse' => '83 rue de la ville',
                'coordonnees' => [
                    'longitude' => 2.34578,
                    'latitude' => 3.45536,
                ],
                'commentaire' => 'je suis un commentaire de maymuna',
                'picture' => 'https://randomcity.net/wp-content/uploads/2024/06/4095_juizdefora_Brazil-1024x768.jpg',
            ]
        ];

        return $this->render('accueil/index.html.twig', [
            'signalements' => $signalement

        ]);

    }
}
