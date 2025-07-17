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
}
