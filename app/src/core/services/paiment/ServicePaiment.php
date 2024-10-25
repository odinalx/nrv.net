<?php
namespace nrv\core\services\paiement;

use nrv\core\repositoryInterfaces\PaimentRepositoryInterface;
use nrv\core\dto\PaimentDTO;
use Exception;
use nrv\core\services\Paiment\ServicePaimentInterface;

class PaiementService implements ServicePaimentInterface
{
    private PaimentRepositoryInterface $paimentRepository;

    public function __construct(PaimentRepositoryInterface $paimentRepository)
    {
        $this->paimentRepository = $paimentRepository;
    }

    public function payerCommande(PaiementDTO $paiementDTO): bool
{
    // Verificar la validez de la tarjeta utilizando datos del DTO
    if (!$this->verifierCarte($paiementDTO->getCardNumber(), $paiementDTO->getExpirationDate(), $paiementDTO->getCvv())) {
        return false; // La tarjeta no es válida
    }

    // Crear un nuevo Paiement usando los datos del DTO
    $paiement = new Paiement($paiementDTO->getCommandeId(), $paiementDTO->getCardNumber(), $paiementDTO->getExpirationDate(), $paiementDTO->getCvv());

    // Persistir el paiement usando el repositorio
    return $this->paimentRepository->createPaiement($paiement);
}


    public function verifierCarte(string $cardNumber, string $expirationDate, string $cvv): bool
    {
        
        if (strlen($cardNumber) !== 16 || !ctype_digit($cardNumber)) {
            return false;
        }

        
        $currentDate = new \DateTime();
        $expiration = \DateTime::createFromFormat('m/y', $expirationDate);
        if ($expiration < $currentDate) {
            return false;
        }

        
        if (strlen($cvv) !== 3 || !ctype_digit($cvv)) {
            return false;
        }

        return true;
    }

    public function annulerPaiement(string $paiementId): bool
    {
        
        return $this->paimentRepository->annulerPaiement($paiementId);
    }
}
