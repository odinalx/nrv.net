<?php

namespace nrv\core\services\billet;

use nrv\core\dto\BilletPanierDTO;


interface ServiceBilletInterface {

    public function getBilletsPanier(string $panierid): array;
    public function ajouterBillet(string $panierId, string $soireeId, int $quantite, float $prix): string;
    public function supprimerBillet(string $billetId): BilletPanierDTO;
    public function getBilletsByUserId(string $userId): array;  
}
