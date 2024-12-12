<?php

namespace App\Http\Controllers;

use App\Models\pautas;
use Illuminate\Http\Request;
use Mail;
use App\Mail\NuevoFormularioEnviado;
use DB;
use PDF;

class PautasController extends Controller
{
    protected $pautas;
    /**
     * Display a listing of the resource.
     */
    public function __construct(pautas $pautas) {
        $this->pautas = $pautas;
    }

    public function index()
    {
        return view('pautas.index');
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
        $pautas = new pautas;
        $pautas->empresa = $request->empresa;
        $pautas->marca = $request->marca;
        $pautas->industria = $request->industria;
        $pautas->servicios = $request->servicios;
        $pautas->presencia_actual = $request->presencia_actual;
        $pautas->competidores = $request->competidores;
        $pautas->nombre_contacto = $request->nombre_contacto;
        $pautas->puesto_contacto = $request->puesto_contacto;
        $pautas->telefono_contacto = $request->telefono_contacto;
        $pautas->correo_contacto = $request->correo_contacto;
        $pautas->objetivo_general = $request->objetivo_general;
        $pautas->objetivos_especificos = $request->objetivos_especificos;
        $edades = implode(", ", $request->input('edades'));
        $pautas->edades = $edades;
        if ($pautas->edades === "") {
            $pautas->edades = null;
        }
        $genero = implode(", ", $request->input('genero'));
        $pautas->genero = $genero;
        if ($pautas->genero === "") {
            $pautas->genero = null;
        }
        $ubicacion = implode(", ", $request->input('ubicacion'));
        $pautas->ubicacion = $ubicacion;
        if ($pautas->ubicacion === "") {
            $pautas->ubicacion = null;
        }
        $nivel_socioeconomico = implode(", ", $request->input('nivel_socioeconomico'));
        $pautas->nivel_socioeconomico = $nivel_socioeconomico;
        if ($pautas->nivel_socioeconomico === "") {
            $pautas->nivel_socioeconomico = null;
        }
        $pautas->intereses_especificos = $request->intereses_especificos;
        $pautas->comportamiento_compra = $request->comportamiento_compra;
        $pautas->habitos_digitales = $request->habitos_digitales;
        $pautas->bases_datos = $request->bases_datos;
        $plataformas = implode(", ", $request->input('plataformas'));
        $pautas->plataformas = $plataformas;
        if ($pautas->plataformas === "") {
            $pautas->plataformas = null;
        }
        $pautas->pauta_digital = $request->pauta_digital;
        $mejores_plataformas = implode(", ", $request->input('mejores_plataformas'));
        $pautas->mejores_plataformas = $mejores_plataformas;
        if ($pautas->mejores_plataformas === "") {
            $pautas->mejores_plataformas = null;
        }
        $pautas->ciclo_compra = $request->ciclo_compra;
        $pautas->habito_compra = $request->habito_compra;
        $pautas->cambios_recientes = $request->cambios_recientes;
        $pautas->competidores_directos = $request->competidores_directos;
        $pautas->competidores_indirectos = $request->competidores_indirectos;
        $pautas->alta_baja_competencia = $request->alta_baja_competencia;
        $pautas->temporada_clave = $request->temporada_clave;
        $pautas->presupuesto_disponible = $request->presupuesto_disponible;
        $pautas->moneda = $request->moneda;
        $pautas->fecha_inicio = $request->fecha_inicio;
        $pautas->fecha_fin = $request->fecha_fin;
        $pautas->distribucion_presupuesto = $request->distribucion_presupuesto;
        $pautas->recursos_creativos = $request->recursos_creativos;
        $pautas->desarrollar_materiales = $request->desarrollar_materiales;
        $formatos_campaña = implode(", ", $request->input('formatos_campaña'));
        $pautas->formatos_campaña = $formatos_campaña;
        if ($pautas->formatos_campaña === "") {
            $pautas->formatos_campaña = null;
        }
        $pautas->restricciones = $request->restricciones;
        $pautas->vinculacion_campaña = $request->vinculacion_campaña;
        $pautas->condiciones_externas = $request->condiciones_externas;
        $pautas->producto_unico = $request->producto_unico;
        $pautas->mensaje_principal = $request->mensaje_principal;
        $pautas->tono_preferido = $request->tono_preferido;
        $pautas->indicadores_kpis = $request->indicadores_kpis;
        $pautas->resultados_concretos = $request->resultados_concretos;
        $pautas->info_adicional = $request->info_adicional;

        $pautas->save();

        //Envía el correo electrónico como notificación
        Mail::to('nquiroga@dosisagency.com')->send(new NuevoFormularioEnviado($request->empresa, 'Brief Publicitario'));

        return redirect('brief_pauta_cerrada')->with('mensaje', 'El brief fue registrado con éxito y enviado a la agencia.');
    }

    /**
     * Display the specified resource.
     */
    public function show(pautas $pautas)
    {
        //
    }

    public function generatePDF() {
        $array = DB::table('pautas')->latest('created_at')->first();
        $arreglo = json_decode(json_encode($array), true);
        $elArray = [
            'data' => $arreglo
        ];
        $fecha = $elArray['data']['created_at'];
        $pdf = PDF::loadView('pautas/briefPDF', $elArray);
        return $pdf->download('brief_pautas [' . $elArray['data']['empresa'] . '] ' . $fecha . '.pdf');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(pautas $pautas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, pautas $pautas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(pautas $pautas)
    {
        //
    }
}
