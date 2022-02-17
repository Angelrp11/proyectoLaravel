<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reserva;

class reservasController extends Controller
{
    public function create()
    {
        $fechaPedida = strtotime($_REQUEST['dia']);
        $fecha = date('Y-m-d',$fechaPedida);
         
        $reserva = new Reserva;
        $reserva->dia = $fecha;
        $reserva->hora = $_REQUEST['hora'];
        $reserva->estado = 'ocupada';
        $reserva->correo_usu = $_REQUEST['email'];
        $reserva->pista = 'Pista '.$_REQUEST['pista'];

        $reserva->save();

        return view('dashboard');
    }
}
