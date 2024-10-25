<?php

namespace nrv\core\services\lieu;

use nrv\core\dto\LieuDTO;
use nrv\core\repositoryInterfaces\LieuRepositoryInterface;
use nrv\core\repositoryInterfaces\RepositoryEntityNotFoundException;

class ServiceLieu implements ServiceLieuInterface {
    
    private LieuRepositoryInterface $lieuRepository;

    public function __construct(LieuRepositoryInterface $lieuRepository)
    {
        $this->lieuRepository = $lieuRepository;
        
    }

    public function getLieuById(string $id): LieuDTO
    {   
        try{
            return $this->lieuRepository->getLieuById($id)->toDTO();
        } catch (RepositoryEntityNotFoundException $e) {
            throw new ServiceLieuNotFoundException($e->getMessage());
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
        
    }
    
}
