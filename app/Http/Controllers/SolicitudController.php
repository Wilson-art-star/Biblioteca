<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Solicitud;
use App\DetalleSolicitud;

class SolicitudController extends Controller
{
    //
    public function index(Request $request)
    {
        $buscar=$request->buscar;
        

        if ($buscar=='') {
            $solicitud= Solicitud::orderBy('id_persona','asc')->paginate(12);
        }else{
            $solicitud= Solicitud::where('nomCom','like', '%'.$buscar .'%')-orderBy('nomCom','asc')->paginate(4);
        }

        
        return [

            'pagination'=>[
                'total'=> $solicitud->total(),
                'current_page'=>$solicitud->currentPage(),
                'per_page'=>$solicitud->perPage(),
                'last_page'=>$solicitud->lastPage(),
                'from'=>$solicitud->firstItem(),
                'to'=>$solicitud->lastItem(),
            ],
                
            
            'solicitud'=>$solicitud
        ];
    }

    public function store(Request $request){
        try {
            DB::beginTransaction();

            $solicitud= new Solicitud();
            $solicitud->fecha_entrega = $request->fecE;
            $solicitud->id_persona = $request->idPerso;
            $solicitud->save();

            $detalles=$request->data;

            foreach ($detalles as $key => $det) {
               $detalle= new DetalleSolicitud();
               $detalle->id_solicitud= $solicitud->id;
               $detalle->id_libro= $det['cod'];
               $detalle->cant= $det['cant'];
               $detalle->save();
            }
            DB::commit();


        } catch (Exception $e) {
            DB::rollBack();
            concole.log('Error', $e);
        }

    }
}
