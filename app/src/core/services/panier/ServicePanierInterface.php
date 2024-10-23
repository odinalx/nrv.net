<?php

namespace nrv\core\services\panier;

use nrv\core\dto\PanierDTO;

interface ServicePanierInterface {

    public function getPanierByUserId(string $userId): PanierDTO;
    public function createPanier(string $userId): PanierDTO;
      
    public function createCommande(string $userid, string $panierid, float $prixtotal, string $status): bool;
    public function getUserByPanier(string $panierId): string;
    public function prixTotal(string $panierId): float;
    public function validerPanier(string $panierId): bool;
}
