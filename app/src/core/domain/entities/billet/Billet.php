<?php

namespace nrv\core\domain\entities\billet;

use nrv\core\domain\entities\Entity;
use nrv\core\dto\BilletDTO;

class Billet extends Entity
{
    protected string $commande_id;
    protected string $soiree_id;

    public function __construct(string $commande_id, string $soiree_id)
    {
        $this->commande_id = $commande_id;
        $this->soiree_id = $soiree_id;
    }   

    // Getters
    public function getCommandeId() {
        return $this->commande_id;
    }

    public function getSoireeId() {
        return $this->soiree_id;
    }

    public function toDTO() : BilletDTO {
        return new BilletDTO($this);
    }

}
