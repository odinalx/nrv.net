<?php

namespace nrv\core\dto;

use nrv\core\domain\entities\lieu\Lieu;
use nrv\core\dto\DTO;

class LieuDTO extends DTO
{
    protected string $lieu_id;
    protected string $nom;
    protected string $adresse;
    protected float $nb_place_assise;
    protected float $nb_place_debout;

    public function __construct(Lieu $lieu)
    {
        $this->lieu_id = $lieu->getId();
        $this->nom = $lieu->getNom();
        $this->adresse = $lieu->getAdresse();
        $this->nb_place_assise = $lieu->getNbPlaceAssise();
        $this->nb_place_debout = $lieu->getNbPlaceDebout();
    }

    public function toEntity() : Lieu
    {
        $lieu = new Lieu(
            $this->nom,
            $this->adresse,
            $this->nb_place_assise,
            $this->nb_place_debout
        );
        return $lieu;
    }
}
