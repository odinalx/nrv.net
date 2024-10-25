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

    /**
     * Récupère les billets en attente d'un panier
     * 
     * @param string $panierid L'identifiant du panier
     * @throws ServiceBilletNotFoundException
     * @return BilletPanierDTO[] un tableau de billets en attente
     */
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

    /**
     * Ajoute un billet à un panier
     * 
     * @param string $panierId L'identifiant du panier
     * @param string $soireeId L'identifiant de la soirée
     * @param int $quantite La quantité de billets
     * @param float $prix Le prix du billet
     * @throws ServiceBilletNotFoundException
     * @throws ServiceBilletInvalidDataException
     * @return string L'identifiant du billet ajouté
     */
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

    /**
     * Supprime un billet d'un panier
     * 
     * @param string $billetId L'identifiant du billet
     * @throws ServiceBilletNotFoundException
     * @return BilletPanierDTO Le billet supprimé
     */
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

    /**
     * Récupère les billets générés d'un utilisateur
     * 
     * @param string $userId L'identifiant de l'utilisateur
     * @throws ServiceBilletNotFoundException
     * @return BilletDTO[] Un tableau de billets générés
     */
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
