<?php

namespace nrv\core\services\panier;

use nrv\core\dto\PanierDTO;

interface ServicePanierInterface {

    public function getPanierByUserId(string $userId): PanierDTO;
    public function createPanier(string $userId): PanierDTO;
    public function validerPanier(string $panierId): PanierDTO;
    public function prixTotal(string $panierId): float;
}
