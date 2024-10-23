<?php
namespace nrv\core\dto;

use nrv\core\domain\entities\billet\BilletPanier;
use nrv\core\dto\DTO;

class BilletPanierDTO extends DTO
{
    protected string $billetpanier_id;
    protected string $panier_id;
    protected string $soiree_id;
    protected int $quantite;
    protected float $prix;

    public function __construct(BilletPanier $billet)
    {
        $this->billetpanier_id = $billet->getID();
        $this->panier_id = $billet->getPanierId();
        $this->soiree_id = $billet->getSoireeId();
        $this->quantite = $billet->getQuantite();
        $this->prix = $billet->getPrix();
    }

    public function toEntity(): BilletPanier
    {
        return new BilletPanier($this->panier_id, $this->soiree_id, $this->quantite, $this->prix);
    }
}