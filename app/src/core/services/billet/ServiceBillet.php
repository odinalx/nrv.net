<?php

namespace nrv\core\services\billet;

use nrv\core\repositoryInterfaces\BilletRepositoryInterface;
use nrv\core\services\billet\ServiceBilletInterface;
use nrv\core\dto\BilletDTO;
use nrv\core\repositoryInterfaces\PanierRepositoryInterface;

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
        //ToDo Try catch
        if (!$this->panierRepository->issetPanier($panierId)) {
            throw new ServiceBilletNotFoundException("Le panier n'existe pas.");
        }

        return $this->billetRepository->ajouterBillet($panierId, $soireeId, $quantite, $prix);
    }

    
}
