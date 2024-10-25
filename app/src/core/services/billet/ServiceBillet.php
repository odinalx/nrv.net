<?php

namespace nrv\core\services\billet;

use nrv\core\repositoryInterfaces\BilletRepositoryInterface;
use nrv\core\services\billet\ServiceBilletInterface;
use nrv\core\dto\BilletDTO;
use nrv\core\dto\BilletPanierDTO;
use nrv\core\repositoryInterfaces\PanierRepositoryInterface;
use nrv\core\repositoryInterfaces\RepositoryEntityNotFoundException;

class ServiceBillet implements ServiceBilletInterface {
    
    private BilletRepositoryInterface $billetRepository;
    private PanierRepositoryInterface $panierRepository;

    public function __construct(BilletRepositoryInterface $billetRepository, PanierRepositoryInterface $panierRepository) {
        $this->billetRepository = $billetRepository;
        $this->panierRepository = $panierRepository;
    }


    public function getBilletsPanier(string $panierid): array
    {
        //ToDo Try catch
        $billets = $this->billetRepository->getBilletsPanier($panierid);
        $billetsDTO = [];
        foreach ($billets as $billet) {
            $billetsDTO[] = $billet->toDTO();
        }
        return $billetsDTO;
    }

    public function ajouterBillet(string $panierId, string $soireeId, int $quantite, float $prix): string
    {
        try {
            // $soiree = $this->soireeRepository->getSoireeById($soireeId);
        
        if (!$this->panierRepository->issetPanier($panierId)) {
            throw new ServiceBilletNotFoundException("Le panier n'existe pas.");
        }

        return $this->billetRepository->ajouterBillet($panierId, $soireeId, $quantite, $prix);
        } catch (RepositoryEntityNotFoundException $e) {
            throw new ServiceBilletNotFoundException("La soirée n'existe pas.");
        }
    }

    public function supprimerBillet(string $billetId): BilletPanierDTO
    {
        //ToDo Try catch
        return $this->billetRepository->supprimerBillet($billetId)->toDTO();
    }

    public function getBilletsByUserId(string $userId): array
    {
        //ToDo Try catch
        $billets = $this->billetRepository->getBilletsByUserId($userId);
        $billetsDTO = [];
        foreach ($billets as $billet) {
            $billetsDTO[] = $billet->toDTO();
        }
        return $billetsDTO;
    }

    
}
