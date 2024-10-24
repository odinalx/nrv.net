<?php

namespace nrv\core\repositoryInterfaces;

use nrv\core\domain\entities\billet\Billet;

interface BilletRepositoryInterface
{
    public function createBillet(string $commandeid, string $soiree_id, int $quantite): array;
    public function getBilletsPanier(string $panierid): array;
    public function ajouterBillet(string $panierId, string $soireeId, int $quantite, float $prix): string;
}
