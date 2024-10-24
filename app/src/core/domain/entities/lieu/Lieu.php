<?php

namespace nrv\core\domain\entities\lieu;

use nrv\core\domain\entities\Entity;
use nrv\core\dto\LieuDTO;

class Lieu extends Entity
{
    protected string $nom;
    protected string $adresse;
    protected float $nb_place_assise;
    protected float $nb_place_debout;

    public function __construct(string $nom, string $adresse, float $nb_place_assise, float $nb_place_debout)
    {
        $this->nom = $nom;
        $this->adresse = $adresse;
        $this->nb_place_assise = $nb_place_assise;
        $this->nb_place_debout = $nb_place_debout;
    }

    // Getters
    public function getNom() {
        return $this->nom;
    }

    public function getAdresse() {
        return $this->adresse;
    }

    public function getNbPlaceAssise() {
        return $this->nb_place_assise;
    }

    public function getNbPlaceDebout() {
        return $this->nb_place_debout;
    }

    public function toDTO() : LieuDTO {
        return new LieuDTO($this);
    }
}
