<?php

namespace App\DTO;

class BookingDTO{
    public function __construct(
        public ?int $id = null,
        public ?int $nomorMeja = null,
        public ?string $jamAmbil = null,
        public ?int $totalHarga = null,
        public ?string $statusAmbil = null,
        public ?int $user_id = null,
    ){}

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(?int $id): void
    {
        $this->id = $id;
    }

    public function getNomorMeja(): ?int
    {
        return $this->nomorMeja;
    }

    public function getJamAmbil(): ?string
    {
        return $this->jamAmbil;
    }

    public function getTotalHarga(): ?int
    {
        return $this->totalHarga;
    }

    public function getStatusAmbil(): ?string
    {
        return $this->statusAmbil;
    }

    public function getUserId(): ?int
    {
        return $this->user_id;
    }

    public function setNomorMeja(?int $nomorMeja): void
    {
        $this->nomorMeja = $nomorMeja;
    }

    public function setTotalHarga(?int $totalHarga): void
    {
        $this->totalHarga = $totalHarga;
    }

    public function setJamAmbil(?string $jamAmbil): void
    {
        $this->jamAmbil = $jamAmbil;
    }

    public function setStatusAmbil(?string $statusAmbil): void
    {
        $this->statusAmbil = $statusAmbil;
    }

    public function setUserId(?int $user_id): void
    {
        $this->user_id = $user_id;
    }
}

?>
