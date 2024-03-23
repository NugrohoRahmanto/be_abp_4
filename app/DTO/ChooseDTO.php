<?php

namespace App\DTO;
class ChooseDTO{
    public function __construct(
        public ?int $idMenu,
        public ?int $idCategory,
    ){}

    public function getIdMenu(): ?int
    {
        return $this->idMenu;
    }

    public function getIdCategory(): ?int
    {
        return $this->idCategory;
    }

    public function setIdMenu(?int $idMenu): void
    {
        $this->idMenu = $idMenu;
    }

    public function setIdCategory(?int $idCategory): void
    {
        $this->idCategory = $idCategory;
    }

}

?>
