<?php
// src/Controller/VinyleController.php

namespace App\Controller;

use App\Entity\Vinyl;
use App\Repository\VinylRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class VinyleController extends AbstractController
{
    private VinylRepository $vinylRepository;
    private EntityManagerInterface $entityManager;

    public function __construct(VinylRepository $vinylRepository, EntityManagerInterface $entityManager)
    {
        $this->vinylRepository = $vinylRepository;
        $this->entityManager = $entityManager;
    }

    #[Route('/api/vinyles', name: 'api_vinyles_index', methods: ['GET'])]
    public function index(): Response
    {
        $vinyles = $this->vinylRepository->findAll();
        return $this->json($vinyles);
    }

    #[Route('/api/vinyles', name: 'api_vinyles_create', methods: ['POST'])]
    public function create(Request $request): Response
    {
        $data = json_decode($request->getContent(), true);

        $vinyl = new Vinyl();
        $vinyl->setArtistName($data['artistName']);
        $vinyl->setAlbumTitle($data['albumTitle']);
        $vinyl->setLabel($data['label']);
        $vinyl->setReleaseDate(new \DateTime($data['releaseDate']));
        $vinyl->setNumberOfVinyls($data['numberOfVinyls']);
        $vinyl->setCategory($data['category']);
        $vinyl->setVinylCondition($data['vinylCondition']);

        $this->entityManager->persist($vinyl);
        $this->entityManager->flush();

        return $this->json($vinyl, Response::HTTP_CREATED);
    }

    #[Route('/api/vinyles/{id}', name: 'api_vinyles_update', methods: ['PUT'])]
    public function update(Request $request, $id): Response
    {
        $data = json_decode($request->getContent(), true);
        $vinyl = $this->vinylRepository->find($id);

        if (!$vinyl) {
            return $this->json(['message' => 'Vinyl not found'], Response::HTTP_NOT_FOUND);
        }

        $vinyl->setArtistName($data['artistName']);
        $vinyl->setAlbumTitle($data['albumTitle']);
        $vinyl->setLabel($data['label']);
        $vinyl->setReleaseDate(new \DateTime($data['releaseDate']));
        $vinyl->setNumberOfVinyls($data['numberOfVinyls']);
        $vinyl->setCategory($data['category']);
        $vinyl->setVinylCondition($data['vinylCondition']);

        $this->entityManager->flush();

        return $this->json($vinyl);
    }

    #[Route('/api/vinyles/{id}', name: 'api_vinyles_delete', methods: ['DELETE'])]
    public function delete($id): Response
    {
        $vinyl = $this->vinylRepository->find($id);

        if (!$vinyl) {
            return $this->json(['message' => 'Vinyl not found'], Response::HTTP_NOT_FOUND);
        }

        $this->entityManager->remove($vinyl);
        $this->entityManager->flush();

        return $this->json(['message' => 'Vinyl deleted'], Response::HTTP_NO_CONTENT);
    }
}
