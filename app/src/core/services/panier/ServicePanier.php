<?php

namespace nrv\core\services\panier;

use nrv\core\dto\PanierDTO;
use nrv\core\services\panier\ServicePanierInterface;
use nrv\core\repositoryInterfaces\PanierRepositoryInterface;
use nrv\core\repositoryInterfaces\BilletRepositoryInterface;
use nrv\core\repositoryInterfaces\SoireeRepositoryInterface;
use nrv\core\repositoryInterfaces\RepositoryEntityNotFoundException;

class ServicePanier implements ServicePanierInterface {
    
    private PanierRepositoryInterface $panierRepository;
    private BilletRepositoryInterface $billetRepository;
    private SoireeRepositoryInterface $soireeRepository;

    public function __construct(PanierRepositoryInterface $panierRepository, BilletRepositoryInterface $billetRepository, SoireeRepositoryInterface $soireeRepository) {
        $this->panierRepository = $panierRepository;
        $this->billetRepository = $billetRepository;
        $this->soireeRepository = $soireeRepository;
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

    public function validerPanier(string $panierId): PanierDTO
    {
        try {
        
            $panier = $this->panierRepository->getPanierById($panierId); 
        
            if ($panier->getValidated()) {
                return $panier->toDTO();
            }

            $panierValidé = $this->panierRepository->validerPanier($panierId);
            $userId = $this->getUserByPanier($panierId);
            
            if ($panierValidé) {
                $billets = $this->billetRepository->getBilletsPanier($panierId);            

                $prixTotal = $this->prixTotal($panierId);
                $commandeId = $this->createCommande($userId, $panierId, $prixTotal,'en attente');

                
                foreach ($billets as $billetData) { // billets différents dans le panier
                    //nombre de bilets de même type
                    $this->billetRepository->createBillet($commandeId, $billetData->getSoireeId(), $billetData->getQuantite());
                    //
                    $this->soireeRepository->decrementPlaces($billetData->getSoireeId(), $billetData->getQuantite());
                }

                $panier->setValidated(true);

                return $panier->toDTO(); 
            }            
            return $panier->toDTO(); 

        } catch (RepositoryEntityNotFoundException $e) {
            throw new ServicePanierNotFoundException($e->getMessage());
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }    

    } 

    public function prixTotal(string $panierId): float
    {
        //ToDo Try catch
        return $this->panierRepository->prixTotal($panierId);
    } 
    
    private function createCommande(string $userid, string $panierid, float $prixtotal, string $status): string
    {
        //ToDo Try catch
        return $this->panierRepository->createCommande($userid, $panierid, $prixtotal, $status);
    }

    private function getUserByPanier(string $panierId): string
    {
        //ToDo Try catch
        return $this->panierRepository->getUserByPanier($panierId);
    }

       
    
}
