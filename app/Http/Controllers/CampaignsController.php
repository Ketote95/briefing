<?php

namespace App\Http\Controllers;

use App\Models\campaigns;
use Illuminate\Http\Request;
use DB;
use PDF;

class CampaignsController extends Controller
{
    protected $campaign;

    public function __construct(Campaigns $campaign) {
        $this->campaign = $campaign;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view ('campaigns.index');
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
        $campaign = new campaigns;
        $campaign->empresa = $request->empresa;
        $campaign->categoria = $request->categoria;
        $campaign->marca = $request->marca;
        $campaign->sub_marca = $request->sub_marca;
        $campaign->plazo = $request->plazo;
        $campaign->duracion = $request->duracion;
        $campaign->presupuesto = $request->presupuesto;
        $campaign->antecedentes = $request->antecedentes;
        $campaign->justificacion = $request->justificacion;
        $campaign->descripcion_servicio = $request->descripcion_servicio;
        $campaign->publico = $request->publico;
        $campaign->promesa = $request->promesa;
        $campaign->objetivos = $request->objetivos;
        $campaign->linea_comunicacional = $request->linea_comunicacional;
        $campaign->competidores = $request->competidores;
        $campaign->servicios_competidores = $request->servicios_competidores;
        $campaign->atributos = $request->atributos;
        $campaign->medios = $request->medios;
        $campaign->entregables = $request->entregables;
        $campaign->plazos = $request->plazos;
        $campaign->voz = $request->voz;
        $campaign->condicionantes = $request->condicionantes;
        $campaign->info_adicional = $request->info_adicional;

        $campaign->save();
        return redirect('BriefCreativo')->with('mensaje', 'El brief fue registrado con éxito y enviado a la agencia.');
    }

    /**
     * Display the specified resource.
     */
    public function show(campaigns $campaigns)
    {
        //
    }

    public function generatePDF() {
        
        $array = DB::table('campaigns')->latest('created_at')->first();
        // $data = campaigns::findOrFail($id);
        $arreglo = json_decode(json_encode($array), true);
        $elArray = [
            'data' => $arreglo
        ];
        $fecha = $elArray['data']['created_at'];
        $pdf = PDF::loadView('campaigns/briefPDF', $elArray);
        return $pdf->download('BriefComunicación [' . $elArray['data']['empresa'] . '] ' . $fecha . '.pdf');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(campaigns $campaigns)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, campaigns $campaigns)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(campaigns $campaigns)
    {
        //
    }
}
