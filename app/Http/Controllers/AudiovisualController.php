<?php

namespace App\Http\Controllers;

use App\Models\audiovisual;
use Illuminate\Http\Request;
use Mail;
use App\Mail\NuevoFormularioEnviado;
use DB;
use PDF;

class AudiovisualController extends Controller
{
    protected $audiovisual;

    public function __construct(Audiovisual $audiovisual) {
        $this->audiovisual = $audiovisual;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('audiovisual.index');
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
        $audiovisual = new audiovisual;
        $audiovisual->empresa = $request->empresa;
        $audiovisual->categoria = $request->categoria;
        $audiovisual->marca = $request->marca;
        $audiovisual->sitio_web = $request->sitio_web;
        $audiovisual->facebook = $request->facebook;
        $audiovisual->instagram = $request->instagram;
        $audiovisual->tiktok = $request->tiktok;
        $audiovisual->linkedin = $request->linkedin;
        $audiovisual->nombre_completo = $request->nombre_completo;
        $audiovisual->correo = $request->correo;
        $audiovisual->telefono = $request->telefono;
        $audiovisual->cargo_cliente = $request->cargo_cliente;
        $audiovisual->objetivo_principal = $request->objetivo_principal;
        $audiovisual->objetivo_secundario = $request->objetivo_secundario;
        $audiovisual->publico = $request->publico;
        $audiovisual->tipo_video = $request->tipo_video;
        $tono_deseado = implode(", ", $request->input('tono_deseado'));
        $audiovisual->tono_deseado = $tono_deseado;
        if ($audiovisual->tono_deseado === "") {
            $audiovisual->tono_deseado = null;
        }
        $audiovisual->pilares = $request->pilares;
        $audiovisual->cantidad_videos = $request->cantidad_videos;
        $audiovisual->duracion_videos = $request->duracion_videos;
        $audiovisual->locaciones = $request->locaciones;
        $audiovisual->referencias_visuales = $request->referencias_visuales;
        $canales = implode(", ", $request->input('canales'));
        $audiovisual->canales = $canales;
        if ($audiovisual->canales === "") {
            $audiovisual->canales = null;
        }
        $dimesiones = implode(", ", $request->input('dimensiones'));
        $audiovisual->dimensiones = $dimesiones;
        if ($audiovisual->dimensiones === "") {
            $audiovisual->dimensiones = null;
        }
        $audiovisual->presupuesto_estimado = $request->presupuesto_estimado;
        $audiovisual->fecha_tentativa = $request->fecha_tentativa;
        $audiovisual->fecha_materiales = $request->fecha_materiales;
        $audiovisual->dias_horarios = $request->dias_horarios;
        $formatos = implode(", ", $request->input('formatos'));
        $audiovisual->formatos = $formatos;
        if ($audiovisual->formatos === "") {
            $audiovisual->formatos = null;
        }
        $audiovisual->voz_off = $request->voz_off;
        $audiovisual->genero_musical = $request->genero_musical;
        $audiovisual->actores = $request->actores;
        $audiovisual->perfiles_requeridos = $request->perfiles_requeridos;
        $audiovisual->tomas_aereas = $request->tomas_aereas;
        $audiovisual->elementos_visuales = $request->elementos_visuales;
        $audiovisual->subtitulos = $request->subtitulos;
        $audiovisual->restricciones_legales = $request->restricciones_legales;
        $audiovisual->info_adicional = $request->info_adicional;

        // echo '<pre>';
        // print_r($request->all());
        // echo '</pre>';
        $audiovisual->save();

        //Envía el correo electrónico como notificación
        Mail::to("nquiroga@dosisagency.com")->send(new NuevoFormularioEnviado($request->empresa, 'Brief de Producción Audiovisual'));
        
        return redirect('brief_audiovisual')->with('mensaje', 'El brief fue registrado con éxito y enviado a la agencia.');
    }

    /**
     * Display the specified resource.
     */
    public function show(audiovisual $audiovisual)
    {
        //
    }

    public function generatePDF() {
        
        $array = DB::table('audiovisuals')->latest('created_at')->first();
        $arreglo = json_decode(json_encode($array), true);
        $elArray = [
            'data' => $arreglo
        ];
        $fecha = $elArray['data']['created_at'];
        $pdf = PDF::loadView('audiovisual/briefPDF', $elArray);
        return $pdf->download('brief_audiovisual [' . $elArray['data']['empresa'] . '] ' . $fecha . '.pdf');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(audiovisual $audiovisual)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, audiovisual $audiovisual)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(audiovisual $audiovisual)
    {
        //
    }
}
