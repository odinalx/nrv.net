<?php

namespace nrv\core\repositoryInterfaces;

use nrv\core\domain\entities\panier\Panier;

interface PanierRepositoryInterface
{   
    public function getPanierById($panierId): Panier;
    public function getPanierByUserId(string $userid): Panier;
    public function createPanier(string $userid): Panier;
    public function panierExistant(string $userId): ?Panier;
    public function createCommande(string $userid, string $panierid, float $prixtotal, string $status): string;
    public function getUserByPanier(string $panierId): string;
    public function prixTotal(string $panierId): float;
    public function validerPanier(string $panierId): bool;
    public function issetPanier(string $panierId): bool;
}
