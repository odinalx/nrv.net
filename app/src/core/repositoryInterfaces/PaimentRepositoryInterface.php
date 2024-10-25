<?php

namespace nrv\core\repositoryInterfaces;

use nrv\core\domain\entities\paiment\Paiment;

interface PaimentRepositoryInterface{

public function getPaimentByID(string $paimentId): Paiment;

public function getPaimentByPanier(string $panierId): Paiment;
public function validerPaiment(string $paimentId): bool;
public function getPanierbyPaiment(string $paimentId): Paiment;
public function annulerPaiement(string $paiementId): bool;
}