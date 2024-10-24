<?php

namespace nrv\core\domain\entities\panier;

use nrv\core\domain\entities\Entity;
use nrv\core\dto\PanierDTO;

class Panier extends Entity
{
    protected string $user_id;
    protected bool $is_validated;

    public function __construct(string $user_id)
    {
        $this->user_id = $user_id;
        $this->is_validated = false;
    }

    // Getters
    public function getUserId() {
        return $this->user_id;
    }
    
    public function getValidated() {
        return $this->is_validated;
    }

    public function setValidated(bool $is_validated) {
        $this->is_validated = $is_validated;
    }

    public function toDTO() : PanierDTO {
        return new PanierDTO($this);
    }

}
