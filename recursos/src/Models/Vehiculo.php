<?php
namespace App\Models;

abstract class Vehiculo {
  public int $id;
  public string $tipo;
  public string $marca;
  public string $modelo;
  public int $anio;

  public function __construct(int $id, string $tipo, string $marca, string $modelo, int $anio) {
    $this->id=$id; $this->tipo=$tipo; $this->marca=$marca; $this->modelo=$modelo; $this->anio=$anio;
  }
  abstract public function getInfoExtra(): string;
}
