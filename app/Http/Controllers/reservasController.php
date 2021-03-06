<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reserva;
use Illuminate\Support\Facades\Auth;

class reservasController extends Controller
{

    public function byDia($dia, $pista)
    {
        $fechaReserva = date('Y-m-d', strtotime($dia));
        return Reserva::where('dia', $fechaReserva)->where('pista', $pista)->orderBy('hora')->select('hora')->distinct()->get();
    }



        
    


    public function create()
    {
        $fechaPedida = strtotime($_REQUEST['dia']);
        $fecha = date('Y-m-d',$fechaPedida);
         
        $reserva = new Reserva;
        $reserva->dia = $fecha;
        $reserva->hora = $_REQUEST['hora'];
        $reserva->correo_usu = $_REQUEST['email'];
        $reserva->pista =$_REQUEST['pista'];

        $reserva->save();
        return view('dashboard');
    }

    public function show()
    {
        $reservas = Reserva::where('correo_usu', Auth::user()->email)->orderBy('dia', 'DESC')->orderBy('hora', 'DESC')->Paginate(5);
        $numeroReservas = Reserva::where('correo_usu', Auth::user()->email)->orderBy('dia', 'DESC')->orderBy('hora', 'DESC')->count();

        return view('miperfil')->with(compact('reservas'))->with(compact('numeroReservas'));
    }

    public function destroy($id)
    {
        $reserva = Reserva::where('id',$id)->delete();

        return back();
    }
}
