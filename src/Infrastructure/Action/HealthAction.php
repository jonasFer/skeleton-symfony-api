<?php

namespace App\Infrastructure\Action;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;

class HealthAction
{
    #[Route('/health', methods: ['GET'])]
    public function __invoke()
    {
        return new JsonResponse('OK');
    }
}
