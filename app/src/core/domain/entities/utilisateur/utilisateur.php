<?php

namespace nrv\core\domain\entities\utilisateur;
use nrv\core\domain\entities\Entity;

class Utilisateur extends Entity
{
    protected string $nom;
    protected string $prenom;
    protected string $adresse;
    protected string $tel;
    protected string $email;
    protected string $pass;
    protected int $role;

    public function __construct(string $nom, string $prenom, string $adresse, string $tel, string $email, string $pass)
    {
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->adresse = $adresse;
        $this->tel = $tel;
        $this->email = $email;
        $this->pass = $pass;
        $this->role = 1;
    }

    // Getters
    public function getNom(): string
    {
        return $this->nom;
    }

    public function getPrenom(): string
    {
        return $this->prenom;
    }

    public function getAdresse(): string
    {
        return $this->adresse;
    }

    public function getTel(): string
    {
        return $this->tel;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getRole() {
        return $this->role;
    }

    public function getPass(){
        return $this->pass;
    }

    // Setters

        public function setNom(string $nom): void
    {
        $this->nom = $nom;
    }

    public function setPrenom(string $prenom): void
    {
        $this->prenom = $prenom;
    }

    public function setAdresse(string $adresse): void
    {
        $this->adresse = $adresse;
    }

    public function setTel(string $tel): void
    {
        $this->tel = $tel;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function setPassword(string $pass): void
    {
        $this->pass = $pass;
    }

    public function setRole(int $role): void
    {
        $this->role = $role;
    }


    }
