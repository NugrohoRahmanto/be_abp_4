<?php

namespace App\DTO;
class ShopOrderDTO {
    public function __construct(
        public ?int $id = null,
        public ?int $booking_id = null,
        public ?int $shop_id = null,
        public ?int $menu_id = null,
        public ?int $banyakPesanan = null,
        public ?string $statusMasak = null,
    )
    {}

    public function getId(): ?int {
        return $this->id;
    }

    public function setId(int $id): void {
        $this->id = $id;
    }

    public function getBookingId(): ?int {
        return $this->booking_id;
    }

    public function setBookingId(int $booking_id): void {
        $this->booking_id = $booking_id;
    }

    public function getShopId(): ?int {
        return $this->shop_id;
    }

    public function setShopId(int $shop_id): void {
        $this->shop_id = $shop_id;
    }

    public function getBanyakPesanan(): ?int {
        return $this->banyakPesanan;
    }

    public function setBanyakPesanan(int $banyakPesanan): void {
        $this->banyakPesanan = $banyakPesanan;
    }

    public function getStatusMasak(): ?string {
        return $this->statusMasak;
    }

    public function setStatusMasak(string $statusMasak): void {
        $this->statusMasak = $statusMasak;
    }

    public function getMenuId(): ?int {
        return $this->menu_id;
    }

    public function setMenuId(int $menu_id): void {
        $this->menu_id = $menu_id;
    }
}

?>