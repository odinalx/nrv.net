<?php
namespace nrv\core\dto;

use nrv\core\domain\entities\billet\Billet;
use nrv\core\dto\DTO;

class BilletDTO extends DTO
{
    protected string $billet_id;
    protected string $commande_id;
    protected string $soiree_id;

    public function __construct(Billet $billet)
    {
        $this->billet_id = $billet->getID();
        $this->commande_id = $billet->getCommandeId();
        $this->soiree_id = $billet->getSoireeId();
    }

    public function toEntity(): Billet
    {
        return new Billet($this->commande_id, $this->soiree_id);
    }
}