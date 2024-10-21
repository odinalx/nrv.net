<?php

namespace nrv\core\dto;

use nrv\core\domain\entities\lieu\Lieu;
use nrv\core\dto\DTO;

class LieuDTO extends DTO
{
    protected int $id_lieu;
    protected string $name;
    protected string $address;
    protected int $seated_capacity;
    protected int $standing_capacity;
    protected ?string $images;

    public function __construct(Lieu $lieu)
    {
        $this->id_lieu = $lieu->id_lieu;
        $this->name = $lieu->name;
        $this->address = $lieu->address;
        $this->seated_capacity = $lieu->seated_capacity;
        $this->standing_capacity = $lieu->standing_capacity;
        $this->images = $lieu->images;
    }
}
