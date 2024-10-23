<?php

namespace nrv\core\services\panier;

use nrv\core\dto\PanierDTO;
use nrv\core\services\panier\ServicePanierInterface;
use nrv\core\repositoryInterfaces\PanierRepositoryInterface;
use nrv\core\repositoryInterfaces\BilletRepositoryInterface;

class ServicePanier implements ServicePanierInterface {
    
    private PanierRepositoryInterface $panierRepository;
    private BilletRepositoryInterface $billetRepository;

    public function __construct(PanierRepositoryInterface $panierRepository, BilletRepositoryInterface $billetRepository) {
        $this->panierRepository = $panierRepository;
        $this->billetRepository = $billetRepository;
    }

    public function getPanierByUserId(string $userId) :PanierDTO {
        //ToDo Try catch
        return $this->panierRepository->getPanierByUserId($userId)->toDTO();
    }

    public function createPanier(string $userId): PanierDTO
    {
        //ToDo Try catch
        $panierExistant = $this->panierRepository->panierExistant($userId);

        if ($panierExistant) {
            return $panierExistant->toDTO();
        }
    
        return $this->panierRepository->createPanier($userId)->toDTO();
    }   

    public function createCommande(string $userid, string $panierid, float $prixtotal, string $status): bool
    {
        //ToDo Try catch
        return $this->panierRepository->createCommande($userid, $panierid, $prixtotal, $status);
    }

    public function getUserByPanier(string $panierId): string
    {
        //ToDo Try catch
        return $this->panierRepository->getUserByPanier($panierId);
    }

    public function prixTotal(string $panierId): float
    {
        //ToDo Try catch
        return $this->panierRepository->prixTotal($panierId);
    }

    public function validerPanier(string $panierId): bool
    {
        //ToDo Try catch
        $panierValidé = $this->panierRepository->validerPanier($panierId);
        
        if ($panierValidé) {
            $billets = $this->billetRepository->getBilletsPanier($panierId); // Récupérer les billets du panier
            $userId = $this->getUserByPanier($panierId);

            $prixTotal = $this->prixTotal($panierId);
            $commandeId = $this->createCommande($userId, $panierId, $prixTotal,'en attente'); // Créer une commande

            
            foreach ($billets as $billetData) {
                $this->billetRepository->createBillet($commandeId, $billetData['soiree_id'], $billetData['quantite']);
            }

            return true;
        }

        return false;

    }  
    
    
}
