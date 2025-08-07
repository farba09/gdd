<?php

namespace App\Controller;

use App\Form\SignalerType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class SignalementController extends AbstractController
{
    #[Route('/signalement', name: 'app_signalement')]
    public function index(Request $request): Response
    {
        // Création du formulaire
        $formSignalement = $this->createForm(SignalerType::class);

        // Gestion de la requête
        $formSignalement->handleRequest($request);

        // Traitement de la soumission
        if ($formSignalement->isSubmitted() && $formSignalement->isValid()) {
            // Récupération des données
            $data = $formSignalement->getData();

            // Ici vous pourriez :
            // 1. Envoyer un email
            // 2. Sauvegarder dans un fichier
            // 3. Traiter les données autrement
            // Exemple temporaire :
            dump($data);

            // Redirection après succès (exemple)
            // $this->addFlash('success', 'Signalement envoyé !');
            // return $this->redirectToRoute('app_success_page');
        }

        // Affichage du formulaire
        return $this->render('signalement/index.html.twig', [
            'form' => $formSignalement->createView(),
        ]);
    }

    #[Route('/signalement/{id}', name: 'show_signalement')]
    public function show(Request $request, string $id): Response
    {
        $signalement = [
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
        ];

        // Affichage du formulaire
        return $this->render('signalement/show.html.twig', [
            'signalement' => $signalement,
        ]);
    }
}
