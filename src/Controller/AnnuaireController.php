<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Repository\ContactRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class AnnuaireController extends AbstractController
{
    private ContactRepository $contactRepository;

    public function __construct(ContactRepository $contactRepository)
    {
        $this->contactRepository = $contactRepository;
    }

    #[Route('/', name: 'app_annuaire')]
    public function index(): Response
    {
        $contacts = $this->contactRepository->findAll();

        return $this->render('annuaire/index.html.twig', [
            'contacts' => $contacts,
        ]);
    }

}
