<?php

namespace App\Http\Controllers;

use App\Models\development;
use Illuminate\Http\Request;
use DB;
use PDF;

class DevelopmentController extends Controller
{
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(development $development)
    {
        //
    }

    public function generatePDF() {
        
        $array = DB::table('development')->latest('created_at')->first();
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
