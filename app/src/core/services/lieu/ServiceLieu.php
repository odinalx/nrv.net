<?php

namespace nrv\core\services\lieu;

use nrv\core\dto\LieuDTO;
use nrv\core\repositoryInterfaces\LieuRepositoryInterface;

class ServiceLieu implements ServiceLieuInterface {
    
    private LieuRepositoryInterface $lieuRepository;

    public function __construct(LieuRepositoryInterface $lieuRepository)
    {
        $this->lieuRepository = $lieuRepository;
        
    }

    public function getLieuById(string $id): LieuDTO
    { 
        return $this->lieuRepository->getLieuById($id)->toDTO();
    }
    
}
