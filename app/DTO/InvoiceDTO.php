<?php

namespace App\DTO;
class InvoiceDTO {
    public function __construct(
        public ?int $id = null,
        public ?string $metodePembayaran = null,
        public ?int $booking_id = null,
        public ?string $statusLengkap = null,
        public ?int $user_id = null
    )
    {}
    public function getId(): ?int {
        return $this->id;
    }

    public function setId(int $id): void {
        $this->id = $id;
    }

    public function getMetodePembayaran(): ?string {
        return $this->metodePembayaran;
    }

    public function setMetodePembayaran(string $metodePembayaran): void {
        $this->metodePembayaran = $metodePembayaran;
    }

    public function getBookingId(): ?int {
        return $this->booking_id;
    }

    public function setBookingId(int $booking_id): void {
        $this->booking_id = $booking_id;
    }

    public function getStatusLengkap(): ?string {
        return $this->statusLengkap;
    }

    public function setStatusLengkap(string $statusLengkap): void {
        $this->statusLengkap = $statusLengkap;
    }

    public function getUserId(): ?int {
        return $this->user_id;
    }

    public function setUserId(int $user_id): void {
        $this->user_id = $user_id;
    }
}

?>