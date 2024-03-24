<?php

namespace App\DTO;

class BookingDTO{
    public function __construct(
        public ?int $idMenu,
        public ?string $namaPemesan = null,
        public ?int $nomorMeja = null,
        public ?int $telpPemesan = null,
        public ?string $jamAmbil = null,
        public ?string $statusAmbil = null,
        public ?int $shop_id = null,
    ){}

    public function getIdMenu(): ?int
    {
        return $this->idMenu;
    }

    public function getNamaPemesan(): ?string
    {
        return $this->namaPemesan;
    }

    public function getNomorMeja(): ?int
    {
        return $this->nomorMeja;
    }

    public function getTelpPemesan(): ?int
    {
        return $this->telpPemesan;
    }

    public function getJamAmbil(): ?string
    {
        return $this->jamAmbil;
    }

    public function getStatusAmbil(): ?string
    {
        return $this->statusAmbil;
    }

    public function getShopId(): ?int
    {
        return $this->shop_id;
    }

    public function setIdMenu(?int $idMenu): void
    {
        $this->idMenu = $idMenu;
    }

    public function setNamaPemesan(?string $namaPemesan): void
    {
        $this->namaPemesan = $namaPemesan;
    }

    public function setNomorMeja(?int $nomorMeja): void
    {
        $this->nomorMeja = $nomorMeja;
    }

    public function setTelpPemesan(?int $telpPemesan): void
    {
        $this->telpPemesan = $telpPemesan;
    }

    public function setJamAmbil(?string $jamAmbil): void
    {
        $this->jamAmbil = $jamAmbil;
    }

    public function setStatusAmbil(?string $statusAmbil): void
    {
        $this->statusAmbil = $statusAmbil;
    }

    public function setShopId(?int $shop_id): void
    {
        $this->shop_id = $shop_id;
    }
}

?>
