<?php

namespace App\Http\Controllers;

use App\Models\planning_new;
use Illuminate\Http\Request;
use Mail;
use App\Mail\NuevoFormularioEnviado;
use DB;
use PDF;

class PlanningNewController extends Controller
{
    protected $planning_new;
    /**
     * Display a listing of the resource.
     */
    public function __construct(planning_new $planning_new)
    {
        $this->planning_new = $planning_new;
    }
    
    public function index()
    {
        return view('planning_new.index');
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
        $planning_new = new planning_new;
        $planning_new->empresa = $request->empresa;
        $planning_new->categoria = $request->categoria;
        $planning_new->marca = $request->marca;
        $planning_new->sitio_web = $request->sitio_web;
        $planning_new->facebook = $request->facebook;
        $planning_new->instagram = $request->instagram;
        $planning_new->tiktok = $request->tiktok;
        $planning_new->linkedin = $request->linkedin;
        $planning_new->nombre_completo = $request->nombre_completo;
        $planning_new->correo = $request->correo;
        $planning_new->telefono = $request->telefono;
        $planning_new->cargo_cliente = $request->cargo_cliente;
        $planning_new->descripcion_empresa = $request->descripcion_empresa;
        $planning_new->competidores_directos = $request->competidores_directos;
        $planning_new->competidores_indirectos = $request->competidores_indirectos;
        $planning_new->ventajas_competitivas = $request->ventajas_competitivas;
        $planning_new->desventajas_competitivas = $request->desventajas_competitivas;
        $planning_new->productos_servicios = $request->productos_servicios;
        $planning_new->comunicacion_servicios = $request->comunicacion_servicios;
        $planning_new->comercializacion_servicios = $request->comercializacion_servicios;
        $planning_new->diferenciadores = $request->diferenciadores;
        $planning_new->precio_promedio = $request->precio_promedio;
        $planning_new->tipos_clientes = $request->tipos_clientes;
        $planning_new->necesidades_publico = $request->necesidades_publico;
        $planning_new->zonas_geograficas = $request->zonas_geograficas;
        $planning_new->habito_compra = $request->habito_compra;
        $planning_new->frecuencia_promedio_compra = $request->frecuencia_promedio_compra;
        $planning_new->objetivo_principal = $request->objetivo_principal;
        $planning_new->objetivo_secundario = $request->objetivo_secundario;
        $planning_new->duracion_estimada = $request->duracion_estimada;
        $planning_new->mensajes_clave = $request->mensajes_clave;
        $planning_new->preferencia_formatos = $request->preferencia_formatos;
        $planning_new->metricas_clave = $request->metricas_clave;
        $planning_new->objetivos_cuantitativos = $request->objetivos_cuantitativos;
        $planning_new->presupuesto_total = $request->presupuesto_total;
        $planning_new->temporalidad = $request->temporalidad;
        $planning_new->canales = $request->canales;
        $planning_new->restriccion = $request->restriccion;
        $planning_new->basedatos_clientes = $request->basedatos_clientes;
        $planning_new->info_adicional = $request->info_adicional;

        $planning_new->save();

        //Envía el correo electrónico como notificación
        // Mail::to("nquiroga@dosisagency.com")->send(new NuevoFormularioEnviado($request->empresa, 'Brief de Planning Digital (Nuevo cliente)'));

        return redirect('brief_planning_new')->with('mensaje', 'El brief fue registrado con éxito y enviado a la agencia');
    }

    /**
     * Display the specified resource.
     */
    public function show(planning_new $planning_new)
    {
        //
    }

    public function generatePDF() {
        
        $array = DB::table('planning_news')->latest('created_at')->first();
        $arreglo = json_decode(json_encode($array), true);
        $elArray = [
            'data' => $arreglo
        ];
        $fecha = $elArray['data']['created_at'];
        $pdf = PDF::loadView('planning_new/briefPDF', $elArray);
        return $pdf->download('brief_planning [' . $elArray['data']['empresa'] . '] ' . $fecha . '.pdf');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(planning_new $planning_new)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, planning_new $planning_new)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(planning_new $planning_new)
    {
        //
    }
}
