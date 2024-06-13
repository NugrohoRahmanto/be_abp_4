<?php

namespace App\Services\Menu;

use Exception;
use App\DTO\MenuDTO;
use Illuminate\Http\Request;

use App\Repositories\Menu\GetAllPaidedMenuByInvoiceRepository;

class GetAllPaidedMenuByInvoiceService {
    public function __construct(
        private GetAllPaidedMenuByInvoiceRepository $menuRepository
    ) {}

    /**
     * Get all Menu
     * @return array
     */
    public function getAllPaidedMenuByInvoice(Request $request) {
        try {
            request()->validate([
                'id' => 'required|exists:invoices,id'
            ]);

            $menuDTO = new MenuDTO(
                id: $request->id
            );

            return $this->menuRepository->getAllPaidedMenuByInvoice($menuDTO);

        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>
