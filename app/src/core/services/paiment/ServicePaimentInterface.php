<?php

namespace nrv\core\services\Paiment;

use nrv\core\dto\PaimentDTO;

interface ServicePaimentInterface
{

    public function payerCommande(string $commandeId, string $cardNumber, string $expirationDate, string $cvv): bool;

    public function verifierCarte(string $cardNumber, string $expirationDate, string $cvv): bool;
 
    public function annulerPaiement(string $paiementId): bool;

}
