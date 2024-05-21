<?php

namespace App\Http\Controllers;

use App\Models\fotografia;
use Illuminate\Http\Request;
use Mail;
use App\Mail\NuevoFormularioEnviado;
use DB;
use PDF;

class FotografiaController extends Controller
{
    protected $fotografia;

    public function __construct(Fotografia $fotografia) {
        $this->fotografia = $fotografia;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('photo.index');
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
        $fotografia = new fotografia;
        $fotografia->empresa = $request->empresa;
        $fotografia->categoria = $request->categoria;
        $fotografia->marca = $request->marca;
        $fotografia->sitio_web = $request->sitio_web;
        $fotografia->facebook = $request->facebook;
        $fotografia->instagram = $request->instagram;
        $fotografia->tiktok = $request->tiktok;
        $fotografia->linkedin = $request->linkedin;
        $fotografia->nombre_completo = $request->nombre_completo;
        $fotografia->correo = $request->correo;
        $fotografia->telefono = $request->telefono;
        $fotografia->cargo_cliente = $request->cargo_cliente;
        $fotografia->objetivo_principal = $request->objetivo_principal;
        $tipos_fotografias = implode(", ", $request->input('tipos_fotografias'));
        $fotografia->tipos_fotografias = $tipos_fotografias;
        if ($fotografia->tipos_fotografias === "") {
            $fotografia->tipos_fotografias = null;
        }
        $fotografia->concepto_referencia = $request->concepto_referencia;
        $fotografia->fecha_tentativa = $request->fecha_tentativa;
        $fotografia->locaciones = $request->locaciones;
        $fotografia->referencias_visuales = $request->referencias_visuales;
        $formatos = implode(", ", $request->input('formatos'));
        $fotografia->formatos = $formatos;
        if ($fotografia->formatos === "") {
            $fotografia->formatos = null;
        }
        $canales = implode(", ", $request->input('canales'));
        $fotografia->canales = $canales;
        if ($fotografia->canales === "") {
            $fotografia->canales = null;
        }
        $actores = implode(", ", $request->input('actores'));
        $fotografia->actores = $actores;
        if ($fotografia->actores === "") {
            $fotografia->actores = null;
        }
        $fotografia->perfiles_requeridos = $request->perfiles_requeridos;
        $fotografia->fecha_limite = $request->fecha_limite;

        // echo '<pre>';
        // print_r($request->all());
        // echo '</pre>';
        $fotografia->save();

        //Envía el correo electrónico como notificación
        Mail::to("nquiroga@dosisagency.com")->send(new NuevoFormularioEnviado($request->empresa, 'Brief de Producción Fotográfica'));
        
        return redirect('brief_fotografia')->with('mensaje', 'El brief fue registrado con éxito y enviado a la agencia.');
    }

    /**
     * Display the specified resource.
     */
    public function show(fotografia $fotografia)
    {
        //
    }

    public function generatePDF() {
        
        $array = DB::table('fotografias')->latest('created_at')->first();
        $arreglo = json_decode(json_encode($array), true);
        $elArray = [
            'data' => $arreglo
        ];
        $fecha = $elArray['data']['created_at'];
        $pdf = PDF::loadView('photo/briefPDF', $elArray);
        return $pdf->download('brief_fotografia [' . $elArray['data']['empresa'] . '] ' . $fecha . '.pdf');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(fotografia $fotografia)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, fotografia $fotografia)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(fotografia $fotografia)
    {
        //
    }
}
