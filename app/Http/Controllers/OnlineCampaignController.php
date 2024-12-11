<?php

namespace App\Http\Controllers;

use App\Models\online_campaign;
use Illuminate\Http\Request;
use Mail;
use App\Mail\NuevoFormularioEnviado;
use DB;
use PDF;

class OnlineCampaignController extends Controller
{
    protected $online_campaign;
    /**
     * Display a listing of the resource.
     */

    public function __construct(online_campaign $online_campaign)
    {
        $this->online_campaign = $online_campaign;
    }

    public function index()
    {
        return view('online.index');
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
        $online_campaign = new online_campaign;
        $online_campaign->empresa = $request->empresa;
        $online_campaign->responsable_empresa = $request->responsable_empresa;
        $online_campaign->nombre_campaña = $request->nombre_campaña;
        $online_campaign->email = $request->email;
        $online_campaign->telefono = $request->telefono;
        $online_campaign->objetivo_campaña = $request->objetivo_campaña;
        $online_campaign->sitio_web = $request->sitio_web;
        $online_campaign->destino = $request->destino;
        $online_campaign->facebook = $request->facebook;
        $online_campaign->youtube = $request->youtube;
        $online_campaign->twitter = $request->twitter;
        $online_campaign->linkedin = $request->linkedin;
        $online_campaign->instagram = $request->instagram;
        $online_campaign->app = $request->app;
        $online_campaign->competencia_directa = $request->competencia_directa;
        $online_campaign->recursos_graficos = $request->recursos_graficos;
        $online_campaign->recursos_audiovisuales = $request->recursos_audiovisuales;
        $online_campaign->fecha_inicio = $request->fecha_inicio;
        $online_campaign->fecha_fin = $request->fecha_fin;
        $online_campaign->presupuesto_campaña = $request->presupuesto_campaña;
        $online_campaign->moneda = $request->moneda;
        $online_campaign->pais = $request->pais;
        $online_campaign->ciudades = $request->ciudades;
        $online_campaign->edades = $request->edades;
        $online_campaign->generos = $request->generos;
        $online_campaign->descripcion_publico = $request->descripcion_publico;
        $online_campaign->plataformas = $request->plataformas;
        $online_campaign->funnel_stage = $request->funnel_stage;
        $online_campaign->info_adicional = $request->info_adicional;

        $online_campaign->save();

        //Envía el correo electrónico como notificación
        Mail::to('nquiroga@dosisagency.com')->send(new NuevoFormularioEnviado($request->empresa, 'Brief de Campaña Online'));

        return redirect('brief_campaña_online')->with('mensaje', 'El brief fue registrado con éxito y enviado a la agencia.');
    }

    /**
     * Display the specified resource.
     */
    public function show(online_campaign $online_campaign)
    {
        //
    }

    public function generatePDF() {
        $array = DB::table('online_campaigns')->latest('created_at')->first();
        $arreglo = json_decode(json_encode($array), true);
        $elArray = [
            'data' => $arreglo
        ];
        $fecha = $elArray['data']['created_at'];
        $pdf = PDF::loadView('online/briefPDF', $elArray);
        return $pdf->download('brief_online_campaign [' . $elArray['data']['empresa'] . '] ' . $fecha . '.pdf');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(online_campaign $online_campaign)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, online_campaign $online_campaign)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(online_campaign $online_campaign)
    {
        //
    }
}
