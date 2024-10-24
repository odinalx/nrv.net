<?php
namespace app\providers;
use nrv\core\dto\CredentialsDTO;
use nrv\core\dto\AuthDTO;
use app\providers\Token;

interface AuthProviderInterface {
    public function signin(CredentialsDTO $credentials): AuthDTO;
    public function refresh(Token $token): AuthDTO;
    public function getSignedInUser(Token $token): AuthDTO;
}