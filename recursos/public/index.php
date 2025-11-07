<?php

declare(strict_types=1);
ini_set('display_errors','1'); error_reporting(E_ALL);

// Autoload (un nivel arriba de /public → /vendor/autoload.php)
$autoload = dirname(__DIR__) . '/vendor/autoload.php';
if (!file_exists($autoload)) { die("Falta autoload: $autoload"); }
require $autoload;

use App\Controllers\VehiculoController;

session_start();


$ctrl = new VehiculoController();

// GET ?id=#
if ($_SERVER['REQUEST_METHOD']==='GET' && isset($_GET['id'])) {
  $ctrl->getById((int)$_GET['id']); exit;
}

// POST json
if ($_SERVER['REQUEST_METHOD']==='POST' && isset($_POST['jsonPost'])) {
  $data = json_decode($_POST['jsonPost'], true);
  if (is_array($data)) { $ctrl->store($data); $ctrl->listar(); }
  else { echo "<p>JSON no válido</p>"; }
  exit;
}

// Sin parámetros → interfaz
readfile(__DIR__ . '/index.html');
