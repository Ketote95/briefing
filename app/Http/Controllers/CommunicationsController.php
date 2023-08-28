<?php

namespace App\Http\Controllers;

use App\Models\communications;
use Illuminate\Http\Request;
use Carbon\Carbon;
use DB;
use PDF;

class CommunicationsController extends Controller
{
    protected $comunicacion;

    public function __construct(Communications $comunicacion) {
        $this->comunicacion = $comunicacion;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('communications.index');
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
        $comunicacion = new communications;
        $comunicacion->empresa = $request->empresa;
        $comunicacion->categoria = $request->categoria;
        $comunicacion->marca = $request->marca;
        $comunicacion->sitio_web = $request->sitio_web;
        $comunicacion->facebook = $request->facebook;
        $comunicacion->instagram = $request->instagram;
        $comunicacion->tiktok = $request->tiktok;
        $comunicacion->linkedin = $request->linkedin;
        $comunicacion->nombre_completo = $request->nombre_completo;
        $comunicacion->correo = $request->correo;
        $comunicacion->telefono = $request->telefono;

        $comunicacion->descripcion_empresa = $request->descripcion_empresa;
        $comunicacion->valores_marca = $request->valores_marca;
        $comunicacion->situacion_empresa = $request->situacion_empresa;
        $comunicacion->objetivos_marketing = $request->objetivos_marketing;
        $comunicacion->objetivos_comerciales = $request->objetivos_comerciales;
        $comunicacion->barreras_comerciales = $request->barreras_comerciales;
        $comunicacion->barreras_marketing = $request->barreras_marketing;
        $comunicacion->comunicar_servicios = $request->comunicar_servicios;
        $comunicacion->comercializar_servicios = $request->comercializar_servicios;
        $comunicacion->presencia_online = $request->presencia_online;
        $comunicacion->retos_digitalizacion = $request->retos_digitalizacion;
        $comunicacion->servicios_principales = $request->servicios_principales;
        $comunicacion->publico_objetivo = $request->publico_objetivo;
        $comunicacion->necesidades_servicios = $request->necesidades_servicios;
        $comunicacion->perfil_cliente = $request->perfil_cliente;
        $comunicacion->competidores_principales = $request->competidores_principales;
        $comunicacion->aspectos_competidores = $request->aspectos_competidores;
        $comunicacion->contra_competidores = $request->contra_competidores;
        $comunicacion->ventajas_competitivas = $request->ventajas_competitivas;
        $comunicacion->desventajas_competitivas = $request->desventajas_competitivas;
        $comunicacion->principales_diferenciadores = $request->principales_diferenciadores;
        $comunicacion->estrategias_comunicacion = $request->estrategias_comunicacion;
        $comunicacion->trabajo_con_agencia = $request->trabajo_con_agencia;
        $comunicacion->nueva_agencia = $request->nueva_agencia;
        $comunicacion->personalidad_marca = $request->personalidad_marca;
        $comunicacion->lenguaje_marca = $request->lenguaje_marca;
        $comunicacion->presupuesto_anuncios = $request->presupuesto_anuncios;
        $comunicacion->incrementar_presupuesto = $request->incrementar_presupuesto;
        $comunicacion->google_ads = $request->google_ads;
        $comunicacion->conformidad_sitio = $request->conformidad_sitio;
        $comunicacion->database = $request->database;
        $comunicacion->info_importante = $request->info_importante;

        // dd($_POST);
        $comunicacion->save();
        return redirect('BriefComunicación')->with('mensaje', 'El brief fue registrado con éxito y enviado a la agencia');
    }

    /**
     * Display the specified resource.
     */
    public function show(communications $communications)
    {
        
    }

    public function generatePDF() {
        
        $array = DB::table('communications')->latest('created_at')->first();
        // $data = communications::findOrFail($id);
        $arreglo = json_decode(json_encode($array), true);
        $elArray = [
            'data' => $arreglo
        ];
        $fecha = $elArray['data']['created_at'];
        $pdf = PDF::loadView('communications/briefPDF', $elArray);
        return $pdf->download('BriefComunicación [' . $elArray['data']['empresa'] . '] ' . $fecha . '.pdf');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(communications $communications)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, communications $communications)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(communications $communications)
    {
        //
    }
}
