<?php

namespace App\DTO;
class DiscountDTO {
    public function __construct(
        public ?int $id,
        public ?string $kodeDiskon = null,
        public ?int $persentaseDiskon = null,
        public ?int $quantityDiskon = null,
        public ?string $deskripsiDiskon = null,
        public ?int $shop_id = null,
    )
    {}

    public function getId(): ?int {
        return $this->id;
    }

    public function setId(int $id): void {
        $this->id = $id;
    }

    public function getKodeDiskon(): ?string {
        return $this->kodeDiskon;
    }

    public function setKodeDiskon(string $kodeDiskon): void {
        $this->kodeDiskon = $kodeDiskon;
    }

    public function getPersentaseDiskon(): ?int {
        return $this->persentaseDiskon;
    }

    public function setPersentaseDiskon(int $persentaseDiskon): void {
        $this->persentaseDiskon = $persentaseDiskon;
    }

    public function getQuantityDiskon(): ?int {
        return $this->quantityDiskon;
    }

    public function setQuantityDiskon(int $quantityDiskon): void {
        $this->quantityDiskon = $quantityDiskon;
    }

    public function getDeskripsiDiskon(): ?string {
        return $this->deskripsiDiskon;
    }

    public function setDeskripsiDiskon(string $deskripsiDiskon): void {
        $this->deskripsiDiskon = $deskripsiDiskon;
    }

    public function getTokoId(): ?int {
        return $this->shop_id;
    }

    public function setTokoId(int $toko_id): void {
        $this->shop_id = $toko_id;
    }
}

?>