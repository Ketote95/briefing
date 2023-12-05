<?php

namespace App\Http\Controllers;

use App\Models\naming;
use Illuminate\Http\Request;
use DB;
use PDF;

class NamingController extends Controller
{
    protected $naming;

    public function __construct(Naming $naming) {
        $this->naming = $naming;
    }


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('naming.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $naming = new naming;
        $naming->empresa = $request->empresa;
        $naming->rubro = $request->rubro;
        $naming->productos_servicios = $request->productos_servicios;
        $naming->historia = $request->historia;
        $naming->mensaje_global = $request->mensaje_global;
        $naming->principales_atributos = $request->principales_atributos;
        $naming->nombre_asociado = $request->nombre_asociado;
        $naming->valores_asociacion = $request->valores_asociacion;
        $naming->mision = $request->mision;
        $naming->vision = $request->vision;
        $naming->publico_objetivo = $request->publico_objetivo;
        $naming->caracteristicas = $request->caracteristicas;
        $naming->consideraciones = $request->consideraciones;
        $naming->preferencia_elementos = $request->preferencia_elementos;
        $naming->restriccion_elementos = $request->restriccion_elementos;
        $naming->lista_competidores = $request->lista_competidores;
        $naming->nombres_empresas_agrado = $request->nombres_empresas_agrado;
        $naming->nombres_empresas_desagrado = $request->nombres_empresas_desagrado;
        $naming->referencias_naming = implode(' - ', $request->input('referencias_naming'));
        $naming->informacion_importante = $request->informacion_importante;
        
        // dd($request->post());
        $naming->save();
        return redirect('briefnaming')->with('mensaje', 'El brief fue registrado con éxito y enviado a la agencia.');
    }

    /**
     * Display the specified resource.
     */
    public function show(naming $naming)
    {
        //
    }

    public function generatePDF() {
        $array = DB::table('namings')->latest('created_at')->first();
        $arreglo = json_decode(json_encode($array), true);
        $elArray = [
            'data' => $arreglo
        ];
        $fecha = $elArray['data']['created_at'];
        $pdf = PDF::loadView('naming/briefPDF', $elArray);
        return $pdf->download('brief_naming [' . $elArray['data']['empresa'] . '] ' . $fecha . '.pdf');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(naming $naming)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, naming $naming)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(naming $naming)
    {
        //
    }
}
