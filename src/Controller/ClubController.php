<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

final class ClubController extends AbstractController
{
    #[Route('/club', name: 'app_club')]
    public function index(): Response
    {
        return $this->render('club/index.html.twig', [
            'controller_name' => 'ClubController',
        ]);
    }

    #[Route(
        '/club/test/{id}/{nom}',
        name: 'club_testparam',
        requirements: [
            'id' => '\d{2,6}',
            'nom' => '[A-Za-z ]{3,25}'
        ]
    )]
    public function testparam(int $id, string $nom): Response
    {
        return $this->render('club/testparam.html.twig', [
            'id' => $id,
            'nom' => $nom,
        ]);
    }

    #[Route(
        '/club/bissextile/{valeur}',
        name: 'club_bissextile',
        requirements: ['valeur' => '\d{1,2}']
    )]
    public function bissextile(int $valeur): Response
    {
        // Année actuelle
        $anneeActuelle = (int) date('Y');

        // Année résultante
        $anneeResultat = $valeur + $anneeActuelle;

        // Vérifier si l’année résultante est bissextile
        $estBissextile = (bool) date('L', mktime(0, 0, 0, 1, 1, $anneeResultat));

        // Rendre la vue Twig
        return $this->render('club/bissextile.html.twig', [
            'valeur' => $valeur,
            'anneeActuelle' => $anneeActuelle,
            'anneeResultat' => $anneeResultat,
            'estBissextile' => $estBissextile,
        ]);
    }
}
