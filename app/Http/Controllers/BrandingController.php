<?php

namespace App\Http\Controllers;

use App\Models\branding;
use Illuminate\Http\Request;
use DB;
use PDF;

class BrandingController extends Controller
{
    protected $marca;

    public function __construct(Branding $marca) {
        $this->marca = $marca;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("branding.index");
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
        $marca = new branding;
        $marca->empresa = $request->empresa;
        $marca->naming = $request->naming;
        $marca->categoria = $request->categoria;
        $marca->diferencia = $request->diferencia;
        $marca->servicios_productos = $request->servicios_productos;
        $marca->eleccion_empresa = $request->eleccion_empresa;
        $marca->años = $request->años;
        $marca->fortalezas_debilidades = $request->fortalezas_debilidades;
        $marca->vision = $request->vision;
        $marca->competidores_principales = $request->competidores_principales;
        $marca->motivo = $request->motivo;
        $marca->descripcion = $request->descripcion;
        $marca->valores = $request->valores;
        $marca->asociacion = $request->asociacion;
        $marca->descripcion_unapalabra = $request->descripcion_unapalabra;
        $marca->logotipo = $request->logotipo;
        $marca->elementos_logotipo = $request->elementos_logotipo;
        $marca->rediseño_logo = $request->rediseño_logo;
        $marca->años_logo = $request->años_logo;
        $marca->mision = $request->mision;
        $marca->slogan = $request->slogan;
        $marca->reconocimiento = $request->reconocimiento;
        $marca->reconocimiento_logotipo = $request->reconocimiento_logotipo;
        $marca->uso_colores = $request->uso_colores;
        $marca->paletas = $request->paletas;
        $marca->uso_logotipo = $request->uso_logotipo;
        $marca->adicion_logo = $request->adicion_logo;
        $marca->definicion_logotipo = $request->definicion_logotipo;
        $marca->preferencias_iconos = $request->preferencias_iconos;
        $marca->gustos_logo = $request->gustos_logo;
        $marca->restricciones_logo = $request->restricciones_logo;
        $marca->aplicaciones_logo = $request->aplicaciones_logo;
        $marca->referencias_logos = $request->referencias_logos;
        $marca->publico_objetivo = $request->publico_objetivo;
        $marca->utilizacion_producto = $request->utilizacion_producto;
        $marca->concentracion_publico = $request->concentracion_publico;
        $marca->formas_publicidad = $request->formas_publicidad;
        $marca->conocer_empresa = $request->conocer_empresa;
        $marca->ingresos_promedio_publico = $request->ingresos_promedio_publico;

        // dd($_POST);
        $marca->save();
        return redirect('briefbranding')->with('mensaje', 'El brief fue registrado con éxito y enviado a la agencia.');
    }

    /**
     * Display the specified resource.
     */
    public function show(branding $branding)
    {
        //
    }

    public function generatePDF() {
        
        $array = DB::table('brandings')->latest('created_at')->first();
        $arreglo = json_decode(json_encode($array), true);
        $elArray = [
            'data' => $arreglo
        ];
        $fecha = $elArray['data']['created_at'];
        $pdf = PDF::loadView('branding/briefPDF', $elArray);
        return $pdf->download('Brief_Creación_Marca [' . $elArray['data']['empresa'] . '] ' . $fecha . '.pdf');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(branding $branding)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, branding $branding)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(branding $branding)
    {
        //
    }
}
