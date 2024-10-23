<?php

namespace nrv\core\services\billet;

use nrv\core\dto\BilletDTO;

interface ServiceBilletInterface {

    public function createBillet(string $commandeid, string $soiree_id): BilletDTO;
    public function getBilletsPanier(string $panierid): array;
    public function ajouterBillet(string $panierId, string $soireeId, int $quantite, float $prix): string;
}
