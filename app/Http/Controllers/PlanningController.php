<?php

namespace App\Http\Controllers;

use App\Models\planning;
use Illuminate\Http\Request;
use Mail;
use App\Mail\NuevoFormularioEnviado;
use DB;
use PDF;


class PlanningController extends Controller
{
    protected $planning;
    /**
     * Display a listing of the resource.
     */
    public function __construct(planning $planning)
    {
        $this->planning = $planning;
    }

    public function index()
    {
        return view('planning.index');
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
        $planning = new planning;
        $planning->empresa = $request->empresa;
        $planning->categoria = $request->categoria;
        $planning->marca = $request->marca;
        $planning->sitio_web = $request->sitio_web;
        $planning->facebook = $request->facebook;
        $planning->instagram = $request->instagram;
        $planning->tiktok = $request->tiktok;
        $planning->linkedin = $request->linkedin;
        $planning->nombre_completo = $request->nombre_completo;
        $planning->correo = $request->correo;
        $planning->telefono = $request->telefono;
        $planning->cargo_cliente = $request->cargo_cliente;
        $planning->productos_servicios = $request->productos_servicios;
        $planning->diferenciadores = $request->diferenciadores;
        $planning->precio_promedio = $request->precio_promedio;
        $planning->tipos_clientes = $request->tipos_clientes;
        $planning->necesidades_publico = $request->necesidades_publico;
        $planning->zonas_geograficas = $request->zonas_geograficas;
        $planning->habito_compra = $request->habito_compra;
        $planning->frecuencia_promedio_compra = $request->frecuencia_promedio_compra;
        $planning->objetivo_principal = $request->objetivo_principal;
        $planning->objetivo_secundario = $request->objetivo_secundario;
        $planning->duracion_estimada = $request->duracion_estimada;
        $planning->mensajes_clave = $request->mensajes_clave;
        $planning->preferencia_formatos = $request->preferencia_formatos;
        $planning->metricas_clave = $request->metricas_clave;
        $planning->objetivos_cuantitativos = $request->objetivos_cuantitativos;
        $planning->presupuesto_total = $request->presupuesto_total;
        $planning->temporalidad = $request->temporalidad;
        $planning->canales = $request->canales;
        $planning->restriccion = $request->restriccion;
        $planning->basedatos_clientes = $request->basedatos_clientes;
        $planning->info_adicional = $request->info_adicional;

        $planning->save();

        //Envía el correo electrónico como notificación
        Mail::to("nquiroga@dosisagency.com")->send(new NuevoFormularioEnviado($request->empresa, 'Brief de Planning Digital'));

        return redirect('brief_planning')->with('mensaje', 'El brief fue registrado con éxito y enviado a la agencia');
    }

    /**
     * Display the specified resource.
     */
    public function show(planning $planning)
    {
        //
    }

    public function generatePDF() {
        
        $array = DB::table('plannings')->latest('created_at')->first();
        $arreglo = json_decode(json_encode($array), true);
        $elArray = [
            'data' => $arreglo
        ];
        $fecha = $elArray['data']['created_at'];
        $pdf = PDF::loadView('planning/briefPDF', $elArray);
        return $pdf->download('brief_planning [' . $elArray['data']['empresa'] . '] ' . $fecha . '.pdf');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(planning $planning)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, planning $planning)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(planning $planning)
    {
        //
    }
}
