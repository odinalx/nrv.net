<?php
namespace nrv\core\dto;

use nrv\core\domain\entities\paiment\Paiment;
use nrv\core\dto\DTO;

class PaimentDTO  extends DTO
{
    protected string $paiment_id;
    protected string $commande_id;
    protected string $card_number;
    protected string $expiration_date;
    protected string $cvv;
    protected bool $is_validated;

    public function __construct(Paiment $paiment)
    {
        $this->paiment_id = $paiment->getPaimentId();
        $this->commande_id = $paiment->getCommandeId();
        $this->card_number = $paiment->getCardNumber();
        $this->expiration_date = $paiment->getExpirationDate();
        $this->cvv = $paiment->getCvv();
        $this->is_validated = $paiment->isValidated();
    }

    // Getters
    public function getPaimentId(): string
    {
        return $this->paiment_id;
    }

    public function getCommandeId(): string
    {
        return $this->commande_id;
    }

    public function getCardNumber(): string
    {
        return $this->card_number;
    }

    public function getExpirationDate(): string
    {
        return $this->expiration_date;
    }

    public function getCvv(): string
    {
        return $this->cvv;
    }

    public function isValidated(): bool
    {
        return $this->is_validated;
    }

    public function toEntity(): Paiment
    {
        return new Paiment(
            $this->commande_id,
            $this->card_number,
            $this->expiration_date,
            $this->cvv,
            $this->is_validated
    );
    }
}
