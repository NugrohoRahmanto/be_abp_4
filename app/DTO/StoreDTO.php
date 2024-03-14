<?php

namespace App\DTO;
class StoreDTO {
    public function __construct(
        public ?int $id,
        public ?string $namaToko = null,
        public ?string $nomorToko = null,
        public ?int $user_id = null
    )
    {}

    public function getId(): ?int {
        return $this->id;
    }

    public function setId(int $id): void {
        $this->id = $id;
    }

    public function getNamaToko(): ?string {
        return $this->namaToko;
    }

    public function setNamaToko(string $namaToko): void {
        $this->namaToko = $namaToko;
    }

    public function getNomorToko(): ?string {
        return $this->nomorToko;
    }

    public function setNomorToko(string $nomorToko): void {
        $this->nomorToko = $nomorToko;
    }

    public function getUserId(): ?int {
        return $this->user_id;
    }

    public function setUserId(int $user_id): void {
        $this->user_id = $user_id;
    }
}

?>