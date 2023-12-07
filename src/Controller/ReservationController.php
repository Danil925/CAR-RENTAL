<?php

namespace Src\Controller;

use Laminas\Diactoros\ServerRequest;
use Src\Service\ReservationService;

class ReservationController
{
    public function create(ServerRequest $request, ReservationService $ReservationService): void
    {
        $body = $request->getParsedBody();

        $ReservationService->createReservation($body);
    }
}