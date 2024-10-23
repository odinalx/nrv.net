<?php
namespace nrv\core\dto;

use nrv\core\domain\entities\panier\Panier;
use nrv\core\dto\DTO;

class PanierDTO extends DTO
{
    protected string $panier_id;
    protected string $user_id;
    protected bool $is_validated;

    public function __construct(Panier $panier)
    {
        $this->panier_id = $panier->getId();
        $this->user_id = $panier->getUserId();
        $this->is_validated = $panier->getValidated();
    }
    public function toEntity(): Panier
    {
        return new Panier($this->user_id);
    }
}