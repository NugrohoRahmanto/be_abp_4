<?php

namespace App\DTO;
class InvoiceDTO {
    public function __construct(
        public ?int $id,
    )
    {}

    public function getId(): ?int {
        return $this->id;
    }

    public function setId(int $id): void {
        $this->id = $id;
    }
}

?>