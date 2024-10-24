<?php

namespace nrv\core\services\billet;


interface ServiceBilletInterface {

    public function getBilletsPanier(string $panierid): array;
    public function ajouterBillet(string $panierId, string $soireeId, int $quantite, float $prix): string;
}
