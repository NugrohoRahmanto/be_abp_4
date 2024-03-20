<?php

namespace App\DTO;
class MenuDTO {
    public function __construct(
        public ?int $id,
        public ?string $namaMenu = null,
        public ?int $hargaMenu = null,
        public ?string $deskripsiMenu = null,
        public ?int $shop_id = null,
    )
    {}

    public function getId(): ?int {
        return $this->id;
    }

    public function setId(int $id): void {
        $this->id = $id;
    }

    public function getNamaMenu(): ?string {
        return $this->namaMenu;
    }

    public function setNamaMenu(string $namaMenu): void {
        $this->namaMenu = $namaMenu;
    }

    public function getHargaMenu(): ?int {
        return $this->hargaMenu;
    }

    public function setHargaMenu(int $hargaMenu): void {
        $this->hargaMenu = $hargaMenu;
    }

    public function getDeskripsiMenu(): ?string {
        return $this->deskripsiMenu;
    }

    public function setDeskripsiMenu(string $deskripsiMenu): void {
        $this->deskripsiMenu = $deskripsiMenu;
    }

    public function getShopId(): ?int {
        return $this->shop_id;
    }

    public function setShopId(int $shop_id): void {
        $this->shop_id = $shop_id;
    }
}

?>