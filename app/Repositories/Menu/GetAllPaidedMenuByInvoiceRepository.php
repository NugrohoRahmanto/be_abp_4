<?php

namespace App\Repositories\Menu;

use App\DTO\MenuDTO;
use Exception;

use App\Models\Menu;

class GetAllPaidedMenuByInvoiceRepository
{
    public function getAllPaidedMenuByInvoice(MenuDTO $menuDTO)
    {
        try{
            $menus = Menu::join('shop_orders', 'menus.id', '=', 'shop_orders.menu_id')
                ->join('invoices', 'shop_orders.booking_id', '=', 'invoices.booking_id')
                ->where('invoices.id', $menuDTO->getId())
                ->select('menus.*', 'shop_orders.statusMasak', 'shop_orders.banyakPesanan')
                ->get();

            $menuDTO = [];

            foreach ($menus as $menu) {
                $menuDTO[] = [
                    'id' => $menu->id,
                    'namaMenu' => $menu->namaMenu,
                    'harga' => $menu->hargaMenu,
                    'stok' => $menu->stokMenu,
                    'deskripsi' => $menu->deskripsiMenu,
                    'shop_id' => $menu->shop_id,
                    'image' => $menu->gambar,
                    'statusMasak' => $menu->statusMasak,
                    'banyakPesanan' => $menu->banyakPesanan
                ];
            }

            return $menuDTO;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}
