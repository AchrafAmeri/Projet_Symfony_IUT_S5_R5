<?php 
namespace App\Controller; // répertoire de tous nos contrôleurs

use Symfony\Component\HttpFoundation\Response; // cette classe permet de faire des Response
use Symfony\Component\Routing\Attribute\Route; // cette classe permet d'utiliser les attributs pour définir les routes
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController; // super-classe des Contrôleurs

class DefaultController extends AbstractController
{
    #[Route('/hello')] // on définit la route /hello pour cette fonction hello
    public function hello(): Response {
        return new Response('<html><body>Hello Ameri !</body></html>'); // on ne fait qu'afficher son nom de famille
    }   
}