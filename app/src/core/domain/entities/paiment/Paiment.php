<?php

namespace nrv\core\domain\entities\paiment;

use nrv\core\domain\entities\Entity;
use nrv\core\dto\PaimentDTO;

class Paiment extends Entity
{
    protected string $commande_id;
    protected string $card_number;
    protected string $expiration_date;
    protected string $cvv;
    protected bool $is_validated;

    public function __construct(string $commande_id, string $card_number, string $expiration_date, string $cvv, bool $is_validated = false) 
    {
        $this->commande_id = $commande_id;
        $this->card_number = $card_number;
        $this->expiration_date = $expiration_date;
        $this->cvv = $cvv;
        $this->is_validated = $is_validated;
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

    // Setters

    public function setCommandeId(string $commande_id): void
    {
        $this->commande_id = $commande_id;
    }

    public function setCardNumber(string $card_number): void
    {
        $this->card_number = $card_number;
    }

    public function setExpirationDate(string $expiration_date): void
    {
        $this->expiration_date = $expiration_date;
    }

    public function setCvv(string $cvv): void
    {
        $this->cvv = $cvv;
    }

    public function setValidated(bool $is_validated): void
    {
        $this->is_validated = $is_validated;
    }
    public function toDTO() :PaimentDTO  {
        return new PaimentDTO ($this);
    }
}
