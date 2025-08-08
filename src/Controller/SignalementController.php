<?php

namespace App\Controller;

use App\Entity\Signalement;
use App\Form\SignalerType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class SignalementController extends AbstractController
{
    #[Route('/signalement', name: 'app_signalement', methods: ['GET', 'POST'])]
    public function index(Request $request, EntityManagerInterface $entityManager): Response
    {
        $signalement = new Signalement();
        $formSignalement = $this->createForm(SignalerType::class, $signalement);
        $formSignalement->handleRequest($request);

        if ($formSignalement->isSubmitted() && $formSignalement->isValid()) {
            // Aucun appel à setCreatedAt() nécessaire ici !
            $entityManager->persist($signalement);
            $entityManager->flush();

            $this->addFlash('success', 'Votre signalement a été enregistré avec succès.');
            return $this->redirectToRoute('app_accueil');
        }

        return $this->render('signalement/index.html.twig', [
            'form' => $formSignalement->createView(),
        ]);
    }

    #[Route('/signalement/{id}', name: 'show_signalement', methods: ['GET'])]
    public function show(Signalement $signalement): Response
    {
        return $this->render('signalement/show.html.twig', [
            'signalement' => $signalement,
        ]);
    }
}
