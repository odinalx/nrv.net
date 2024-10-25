<?php

namespace nrv\core\services\billet;

use nrv\core\repositoryInterfaces\BilletRepositoryInterface;
use nrv\core\services\billet\ServiceBilletInterface;
use nrv\core\dto\BilletDTO;
use nrv\core\dto\BilletPanierDTO;
use nrv\core\repositoryInterfaces\PanierRepositoryInterface;
use nrv\core\repositoryInterfaces\RepositoryEntityNotFoundException;
use nrv\core\repositoryInterfaces\RepositoryEntityInvalidDataException;
use nrv\core\repositoryInterfaces\SoireeRepositoryInterface;

class ServiceBillet implements ServiceBilletInterface {
    
    private BilletRepositoryInterface $billetRepository;
    private PanierRepositoryInterface $panierRepository;
    private SoireeRepositoryInterface $soireeRepository;

    public function __construct(BilletRepositoryInterface $billetRepository, PanierRepositoryInterface $panierRepository, SoireeRepositoryInterface $soireeRepository) {
        $this->billetRepository = $billetRepository;
        $this->panierRepository = $panierRepository;
        $this->soireeRepository = $soireeRepository;
    }


    public function getBilletsPanier(string $panierid): array
    {
        try {
            $billets = $this->billetRepository->getBilletsPanier($panierid);
            $billetsDTO = [];
            foreach ($billets as $billet) {
                $billetsDTO[] = $billet->toDTO();
            }
            return $billetsDTO;
        } catch (RepositoryEntityNotFoundException $e) {
            throw new ServiceBilletNotFoundException($e->getMessage());
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }

    public function ajouterBillet(string $panierId, string $soireeId, int $quantite, float $prix): string
    {
        try {     
            $soiree = $this->soireeRepository->getSoireeById($soireeId);
            
            if (!$this->panierRepository->issetPanier($panierId)) {
                throw new ServiceBilletNotFoundException("Le panier n'existe pas.");
            }

            return $this->billetRepository->ajouterBillet($panierId, $soireeId, $quantite, $prix);

        } catch (RepositoryEntityInvalidDataException $e) {
            throw new ServiceBilletInvalidDataException($e->getMessage());
        } catch (RepositoryEntityNotFoundException $e) {
            throw new ServiceBilletNotFoundException($e->getMessage());
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }

    public function supprimerBillet(string $billetId): BilletPanierDTO
    {
        try {
            return $this->billetRepository->supprimerBillet($billetId)->toDTO();
        } catch (RepositoryEntityNotFoundException $e) {
            throw new ServiceBilletNotFoundException($e->getMessage());
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }    
    }

    public function getBilletsByUserId(string $userId): array
    {
        try {
        $billets = $this->billetRepository->getBilletsByUserId($userId);
        $billetsDTO = [];
        foreach ($billets as $billet) {
            $billetsDTO[] = $billet->toDTO();
        }
        return $billetsDTO;
        } catch (RepositoryEntityNotFoundException $e) {
            throw new ServiceBilletNotFoundException($e->getMessage());
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }

    
}
