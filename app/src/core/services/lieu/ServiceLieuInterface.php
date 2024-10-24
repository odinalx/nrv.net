<?php

namespace nrv\core\services\lieu;

use nrv\core\dto\LieuDTO;


interface ServiceLieuInterface {

    public function getLieuById(string $id): LieuDTO;

}
