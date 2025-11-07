<?php
namespace App\Models;

class Coche extends Vehiculo {
  public int $puertas;
  public function __construct(int $id, string $marca, string $modelo, int $anio, int $puertas) {
    parent::__construct($id,'coche',$marca,$modelo,$anio);
    $this->puertas=$puertas;
  }
  public function getInfoExtra(): string { return "Puertas: {$this->puertas}"; }
}
