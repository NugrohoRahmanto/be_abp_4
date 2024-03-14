<?php

namespace App\DTO;
class MenuCategoryDTO {
    public function __construct(
        public ?int $id,
        public ?string $namaMenuKategori = null,
    )
    {}

    public function getId(): ?int {
        return $this->id;
    }

    public function setId(int $id): void {
        $this->id = $id;
    }

    public function getnamaMenuKategori(): ?string {
        return $this->namaMenuKategori;
    }

    public function setnamaMenuKategori(string $namaMenuKategori): void {
        $this->namaMenuKategori = $namaMenuKategori;
    }
}

?>