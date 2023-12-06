<?php

namespace App\Http\Controllers;

use App\Models\development;
use Illuminate\Http\Request;
use DB;
use PDF;

class DevelopmentController extends Controller
{
    protected $desarrollo;

    public function __construct(Development $desarrollo) {
        $this->desarrollo = $desarrollo;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('development.index');
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
        $desarrollo = new development;
        $desarrollo->empresa = $request->empresa;
        $desarrollo->tamaño = $request->tamaño;
        $desarrollo->presencia = $request->presencia;
        $desarrollo->inicio_desarrollo = $request->inicio_desarrollo;
        $desarrollo->tipo_desarrollo = $request->tipo_desarrollo;
        $desarrollo->año_diseño = $request->año_diseño;
        $desarrollo->aspectos_positivos = $request->aspectos_positivos;
        $desarrollo->aspectos_negativos = $request->aspectos_negativos;
        $desarrollo->manual_identidad = $request->manual_identidad;
        $desarrollo->competidores = $request->competidores;
        $desarrollo->sitios_inspiracion = $request->sitios_inspiracion;
        $desarrollo->estilo_sitio_web = $request->estilo_sitio_web;
        $desarrollo->fotos = $request->fotos;
        $desarrollo->plan_fotos = $request->plan_fotos;
        $desarrollo->sesion_fotos = $request->sesion_fotos;
        $desarrollo->imagenes_referenciales = $request->imagenes_referenciales;
        $desarrollo->videos = $request->videos;
        $desarrollo->videos_stock = $request->videos_stock;
        $desarrollo->plan_videos = $request->plan_videos;
        $desarrollo->cambios_logo = $request->cambios_logo;
        $desarrollo->archivo_logo = $request->archivo_logo;
        $desarrollo->tipografia = $request->tipografia;
        $desarrollo->archivos_tipografia = $request->archivos_tipografia;
        $desarrollo->paleta_colores = $request->paleta_colores;
        $desarrollo->contenido_web = $request->contenido_web;
        $desarrollo->agencia_contenido = $request->agencia_contenido;
        $desarrollo->herramientas_web = $request->herramientas_web;
        $desarrollo->sistemas_terceros = $request->sistemas_terceros;
        $desarrollo->info_sistemas = $request->info_sistemas;
        $desarrollo->redes_sociales = $request->redes_sociales;
        $desarrollo->estructura_web = $request->estructura_web;
        $desarrollo->campos_formulario = $request->campos_formulario;
        $desarrollo->correo_formularios = $request->correo_formularios;
        $desarrollo->dominio_web = $request->dominio_web;
        $desarrollo->compra_dominio = $request->compra_dominio;
        $desarrollo->credenciales_dominio = $request->credenciales_dominio;

        // dd($_POST);
        $desarrollo->save();

        //Envía el correo electrónico como notificación
        Mail::to("nquiroga@dosisagency.com")->send(new NuevoFormularioEnviado($request->empresa, 'Brief de Desarrollo Web'));
        
        return redirect('briefdesarrollo')->with('mensaje', 'El brief fue registrado con éxito y enviado a la agencia.');
    }

    /**
     * Display the specified resource.
     */
    public function show(development $development)
    {
        //
    }

    public function generatePDF() {
        
        $array = DB::table('developments')->latest('created_at')->first();
        $arreglo = json_decode(json_encode($array), true);
        $elArray = [
            'data' => $arreglo
        ];
        $fecha = $elArray['data']['created_at'];
        $pdf = PDF::loadView('development/briefPDF', $elArray);
        return $pdf->download('brief_desarrollo_web [' . $elArray['data']['empresa'] . '] ' . $fecha . '.pdf');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(development $development)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, development $development)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(development $development)
    {
        //
    }
}
