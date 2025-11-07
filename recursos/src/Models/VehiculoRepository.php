<?php
namespace App\Models;

class VehiculoRepository {
  private const KEY='vehiculos';
  public function __construct(){
    if(!isset($_SESSION[self::KEY])){
      $_SESSION[self::KEY]=[];
      $_SESSION[self::KEY][1]=new Coche(1,'Seat','Ibiza',2019,5);
      $_SESSION[self::KEY][2]=new Moto(2,'Yamaha','MT-07',2021,689);
    }
  }
  public function getById(int $id): ?Vehiculo { return $_SESSION[self::KEY][$id] ?? null; }
  public function save(Vehiculo $v): void { $_SESSION[self::KEY][$v->id]=$v; }
  /** @return Vehiculo[] */ public function all(): array { return array_values($_SESSION[self::KEY]); }
}
