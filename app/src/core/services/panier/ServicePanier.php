<?php

namespace nrv\core\services\panier;

use nrv\core\dto\PanierDTO;
use nrv\core\services\panier\ServicePanierInterface;
use nrv\core\repositoryInterfaces\PanierRepositoryInterface;
use nrv\core\repositoryInterfaces\BilletRepositoryInterface;
use nrv\core\repositoryInterfaces\RepositoryEntityInvalidDataException;
use nrv\core\repositoryInterfaces\SoireeRepositoryInterface;
use nrv\core\repositoryInterfaces\RepositoryEntityNotFoundException;
use nrv\core\services\billet\ServiceBilletNotFoundException;

class ServicePanier implements ServicePanierInterface {
    
    private PanierRepositoryInterface $panierRepository;
    private BilletRepositoryInterface $billetRepository;
    private SoireeRepositoryInterface $soireeRepository;

    public function __construct(PanierRepositoryInterface $panierRepository, BilletRepositoryInterface $billetRepository, SoireeRepositoryInterface $soireeRepository) {
        $this->panierRepository = $panierRepository;
        $this->billetRepository = $billetRepository;
        $this->soireeRepository = $soireeRepository;
    }
    /**
     * Récupère un panier par l'identifiant de l'utilisateur
     * 
     * @param string $userId l'identifiant de l'utilisateur
     * @throws ServicePanierNotFoundException
     * @return PanierDTO le panier
     */
    public function getPanierByUserId(string $userId) :PanierDTO {
        try {
            return $this->panierRepository->getPanierByUserId($userId)->toDTO();
        } catch (RepositoryEntityNotFoundException $e) {
            throw new ServicePanierNotFoundException($e->getMessage());
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }

    /**
     * Création d'un panier pour un utilisateur
     * 
     * @param string $userId l'identifiant de l'utilisateur
     * @throws ServicePanierInvalidDataException
     * @return PanierDTO le panier créé
     */
    public function createPanier(string $userId): PanierDTO
    {
        try{
        $panierExistant = $this->panierRepository->panierExistant($userId);

        if ($panierExistant) {
            return $panierExistant->toDTO();
        }
    
        return $this->panierRepository->createPanier($userId)->toDTO();
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }   

    /**
     * Validation d'un panier
     * 
     * @param string $panierId l'identifiant du panier
     * @throws ServicePanierNotFoundException
     * @throws ServicePanierInvalidDataException
     * @return PanierDTO le panier validé
     */
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
        } catch (RepositoryEntityInvalidDataException $e) {
            throw new ServicePanierInvalidDataException($e->getMessage());
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }    

    } 

    /**
     * Calcul du prix total d'un panier
     * 
     * @param string $panierId l'identifiant du panier
     * @throws ServicePanierNotFoundException
     * @return float le prix total
     */
    public function prixTotal(string $panierId): float
    {
        try {
            return $this->panierRepository->prixTotal($panierId);
        } catch (RepositoryEntityNotFoundException $e) {
            throw new ServicePanierNotFoundException($e->getMessage());
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    } 
    
    /**
     * Création d'une commande
     * 
     * @param string $userid l'identifiant de l'utilisateur
     * @param string $panierid l'identifiant du panier
     * @param float $prixtotal le prix total
     * @param string $status le status de la commande
     * @throws ServicePanierInvalidDataException
     * @return string l'identifiant de la commande
     */
    private function createCommande(string $userid, string $panierid, float $prixtotal, string $status): string
    {
        try {
            return $this->panierRepository->createCommande($userid, $panierid, $prixtotal, $status);
        } catch(RepositoryEntityInvalidDataException $e) {
            throw new ServicePanierInvalidDataException($e->getMessage());
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }

    /**
     * Récupère l'utilisateur d'un panier
     * 
     * @param string $panierId l'identifiant du panier
     * @throws ServicePanierNotFoundException
     * @return string l'identifiant de l'utilisateur
     */
    private function getUserByPanier(string $panierId): string
    {
        try {
            return $this->panierRepository->getUserByPanier($panierId);
        } catch (RepositoryEntityNotFoundException $e) {
            throw new ServicePanierNotFoundException($e->getMessage());
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }

       
    
}
