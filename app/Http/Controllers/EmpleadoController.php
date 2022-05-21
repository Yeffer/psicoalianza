<?php

namespace App\Http\Controllers;

use App\Cargos;
use App\Paises;
use App\Ciudades;
use App\Empleados;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmpleadoController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
       
        $empleados = Empleados::select('Empleados.id','Empleados.nombres','Empleados.apellidos','Empleados.identificacion','Empleados.telefono','CA.nombre AS cargo','PA.pais','CI.ciudad')        
                ->join('paises AS PA', 'Empleados.pais_id', '=', 'PA.id')
                ->join('ciudades AS CI', 'Empleados.ciudad_id', '=', 'CI.id')
                ->join('empl_cargo AS EC', 'Empleados.id', '=', 'EC.empleado_id')
                ->join('cargos AS CA', 'EC.cargo_id', '=', 'CA.id')                
                ->get();

        
        return view('home', compact('empleados'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $cargos = Cargos::select('cargos.id','cargos.nombre')->get();
        $paises = Paises::select('paises.id','paises.codigo','paises.pais')->get();
        $ciudades = Ciudades::select('ciudades.id','ciudades.codigo','ciudades.ciudad')->get();
        

        return view('crear', compact('cargos', 'paises', 'ciudades'));
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        request()->validate([
            'nombres' => 'required',
            'apellidos' => 'required',
            'identificacion' => 'required',
            'telefono' => 'required',
            'pais' => 'required',            
            'ciudad' => 'required',
            'cargo' => 'required',
        ]);
        
        Empleados::create([
            'nombres' => request('nombres'),
            'apellidos' => request('apellidos'),            
            'identificacion' => request('identificacion'),
            'telefono' => request('telefono'),
            'pais_id' =>  request('pais'),
            'ciudad_id' =>  request('ciudad'),
        ]);
       
        $idEmpleado = Empleados::latest('id')->first();
       
        foreach ($request->cargo as $cargoRow) {

            $idCargo = $cargoRow;

            DB::table('empl_cargo')->insert(
                ['empleado_id' => $idEmpleado->id, 'cargo_id' => $idCargo]
            );   
        }
        
        return redirect()->route('home');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
