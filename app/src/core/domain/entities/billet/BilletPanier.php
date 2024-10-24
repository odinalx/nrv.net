<?php

namespace nrv\core\domain\entities\billet;

use nrv\core\domain\entities\Entity;
use nrv\core\dto\BilletPanierDTO;

class BilletPanier extends Entity
{
    protected string $panier_id;
    protected string $soiree_id;
    protected int $quantite;
    protected float $prix;

    public function __construct(string $panier_id, string $soiree_id, int $quantite, float $prix) {
        $this->panier_id = $panier_id;
        $this->soiree_id = $soiree_id;
        $this->quantite = $quantite;
        $this->prix = $prix;
    }   

    // Getters
    public function getPanierId(): string {
        return $this->panier_id;
    }

    public function getSoireeId(): string {
        return $this->soiree_id;
    }

    public function getQuantite(): int {
        return $this->quantite;
    }

    public function getPrix(): float {
        return $this->prix;
    }

    public function toDTO(): BilletPanierDTO {
        return new BilletPanierDTO($this);
    }

}
