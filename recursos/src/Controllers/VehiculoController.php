<?php
namespace App\Controllers;

use App\Models\{VehiculoRepository, Coche, Moto};

class VehiculoController {
  private VehiculoRepository $repo;
  public function __construct(){ $this->repo=new VehiculoRepository(); }

  public function getById(int $id): void {
    $vehiculo = $this->repo->getById($id);
    require __DIR__ . '/../Views/vehiculo_get.html';
  }

  public function store(array $d): void {
    $id=(int)($d['id']??0);
    $tipo=strtolower(trim($d['tipo']??''));
    $marca=trim($d['marca']??'');
    $modelo=trim($d['modelo']??'');
    $anio=(int)($d['anio']??0);

    if($tipo==='coche'){
      $puertas=(int)($d['puertas']??3);
      $obj=new Coche($id,$marca,$modelo,$anio,$puertas);
    } elseif($tipo==='moto'){
      $cc=(int)($d['cilindrada']??125);
      $obj=new Moto($id,$marca,$modelo,$anio,$cc);
    } else { $obj=null; }

    if($obj){ $this->repo->save($obj); }
  }

  public function listar(): void {
    $vehiculos = $this->repo->all();
    require __DIR__ . '/../Views/vehiculo_post.html';
  }
}
