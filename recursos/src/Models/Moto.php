<?php
namespace App\Models;

class Moto extends Vehiculo {
  public int $cilindrada;
  public function __construct(int $id, string $marca, string $modelo, int $anio, int $cilindrada) {
    parent::__construct($id,'moto',$marca,$modelo,$anio);
    $this->cilindrada=$cilindrada;
  }
  public function getInfoExtra(): string { return "Cilindrada: {$this->cilindrada} cc"; }
}
