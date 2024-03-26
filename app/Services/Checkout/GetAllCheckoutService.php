<?php

namespace App\Services\Checkout;

use Exception;
use App\Repositories\Checkout\GetAllCheckoutRepository;

class GetAllCheckoutService
{
    public function __construct(
        private GetAllCheckoutRepository $checkoutRepository,
    ) {}

    public function getAllCheckout($bookingId)
    {
        try {
            $result = $this->checkoutRepository->getAllCheckout($bookingId);

            return $result;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}
