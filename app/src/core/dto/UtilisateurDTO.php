<?php

namespace nrv\core\dto;

use nrv\core\domain\entities\utilisateur\utilisateur;
use nrv\core\dto\DTO;

class UtilisateurPDO extends DTO
{
    protected string $nom;
    protected string $prenom;
    protected string $adresse;
    protected string $tel;
    protected string $email;
    protected string $pass;
    protected int $role;
    
    public function __construct(string $nom, string $prenom, string $adresse, string $tel, string $email, string $pass, int $role)
    {
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->adresse = $adresse;
        $this->tel = $tel;
        $this->email = $email;
        $this->pass = $pass;
        $this->role = $role;
    }




    public function getNom(): string{
        return $this->nom;
    }

    public function getPrenom(): string{
        return $this->prenom;
    }

    public function getAdresse(): string{
        return $this->adresse;
    }
    public function getTel(): string{
        return $this->tel;
    }
    public function getEmail(): string{
        return $this->email;
    }

    public function getPass(): string{
        return $this->pass;
    }

    public function getRole(): int{
        return $this->role;
    }



}