<?php

namespace App\DTO;
class InvoiceDTO {
    public function __construct(
        public ?string $metodePembayaran,
        public ?int $id,
    )
    {}
    public function getMetodePembayaran(): ?string {
        return $this->metodePembayaran;
    }

    public function setMetodePembayaran(string $metodePembayaran): void {
        $this->metodePembayaran = $metodePembayaran;
    }

    public function getId(): ?int {
        return $this->id;
    }

    public function setId(int $id): void {
        $this->id = $id;
    }
}

?>