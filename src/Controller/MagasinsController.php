<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class MagasinsController extends AbstractController
{
    #[Route('/magasins/magasin1')]
    #[Route('/magasins/magasin2')]
    public function index(): Response
    {
        return $this->render(view: 'magasins/index.html.twig', parameters: [
            'controller_name' => 'MagasinsController',
        ]);
    }
    public function magasin1(): Response
    {
        $texte = 'Hello les amis';
        return $this->render(view: 'magasins/magasin1.html.twig', parameters: [
            'texte' => $texte,
        ]);
    }
}
