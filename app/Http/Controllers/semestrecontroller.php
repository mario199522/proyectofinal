<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\asignatura;
use App\semestre;
class semestrecontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    /**
     * @SWG\Get(
     *   path="/semestre",
     *   tags={"Semestre"},
     *   summary="Semestre",
     *   operationId="obtenersemestre",
     *   @SWG\Response(response=200, description="registro obtenido"),
     *   @SWG\Response(response=404, description="not found"),)
     * )
     *
     */
    public function index()
    {
         $semestre = semestre::all();
        return response()->json(['Semestre'=>$semestre, 'code'=>'200']) ;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    
    /**
     * @SWG\Post(
     *   path="/semestre",
     *   tags={"Semestre"},
     *   summary="Crear Semestre",
     *   operationId="getCustomerRates",
     *   @SWG\Parameter(
     *     name="descripcion",
     *     in="formData",
     *     description="Ingresar Semestre",
     *     required=true,
     *     type="string"
     *   ),
     *   @SWG\Parameter(
     *     name="asignaturaid",
     *     in="formData",
     *     description="ingrese id ",
     *     required=true,
     *     type="string"
     *   ),
     *   @SWG\Response(response=201, description="semestre creado"),
     *   @SWG\Response(response=404, description="no existe semestre"),
     *   @SWG\Response(response=422, description="unprocessable entity"),
     * )
     *
     */
    public function store(Request $request)
    {
        if(empty($request->descripcion)){

            return response()->json(['message'=>'Todos los campos son requeridos', 'code'=>'406']);
        }

        $semestre = new semestre();
        $semestre->descripcion=$request->descripcion;
        $semestre->asignaturaid=$request->asignaturaid;
        $semestre->save();
        return response()->json(['message'=>'Semestre  creado correctamente', 'code'=>'201']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     /**
     * @SWG\Get(
     *   path="/semestre/{semestreid}",
     *   tags={"Semestre"},
     *   summary="ver Semestre con su Asignatura",
     *   operationId="getRed",
     *   @SWG\Parameter(
     *     name="semestreid",
     *     in="path",
     *     description="ingresar id del semestre",
     *     required=true,
     *     type="integer"
     *   ),
     *   @SWG\Response(response=200, description=" operacion exitosa"),
     *   @SWG\Response(response=404, description="not found"),
     * )
     *
     */
    public function show($id)
    {
         $semestre= semestre::find($id);
       if((empty($semestre))){
        return response()->json(['message'=>'Semestre  no encontrado', 'code'=>'404']) ;
       }

       return response()->json(['Semestre'=>$semestre, 'code'=>'200']) ;
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
    
    /**
     * @SWG\Put(
     *   path="/semestre/{semestreid}",
     *   tags={"Semestre"},
     *   summary="Actualizar Semestre ",
     *   operationId="shareRed",
     *   @SWG\Parameter(
     *     name="semestreid",
     *     in="path",
     *     description="ingrese id ",
     *     required=true,
     *     type="integer"
     *   ),
     *     @SWG\Parameter(
     *     name="descripcion",
     *     in="formData",
     *     description="ingrese nuevo Semestre",
     *     required=true,
     *     type="string"
     *   ),
      *   @SWG\Response(response=200, description="Actualizacion correcta"),
     *   @SWG\Response(response=400, description="identification exist"),
     *   @SWG\Response(response=404, description="not found"),
     *   @SWG\Response(response=422, description="unprocessable entity"),
     * )
     *
     */
    public function update(Request $request, $id)
    {
        if (empty($request->descripcion))  {

            return response()->json(['message'=>'Todos los campos son requeridos', 'code'=>'406']);
        }


        $semestre=semestre::find($id);
        if(empty($semestre)){

                return response()->json(['message'=>'Semestre no encontrado', 'code'=>'404']);
        }
        
        $semestre->descripcion=$request->descripcion;
        $semestre->save();
        return response()->json(['message'=>'Semestre actualizado', 'code'=>'200']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    /**
     * @SWG\Delete(
     *   path="/semestre/{id}",
     *   tags={"Semestre"},
     *   summary="eliminar Semestre",
     *   operationId="EliminarAsignatura",
     *   @SWG\Parameter(
     *     name="id",
     *     in="path",
     *     description="ingresar id del Semestre",
     *     required=true,
     *     type="integer"
     *   ),
     *   @SWG\Response(response=204, description="Semestre eliminada"),
     *   @SWG\Response(response=404, description="not found"),
     * )
     *
     */
    public function destroy($id)
    {
        if(empty($id)) {

            return response()->json(['message'=>'el id es obligatorio', 'code'=>'406']);
        }


        $semestre=semestre::find($id);
        if(empty($semestre)){

                return response()->json(['message'=>'Semestre no encontrado', 'code'=>'404']);
        }
        
        $semestre->delete();

        return response()->json(['message'=>'Semestre Eliminado', 'code'=>'200']);
    }
}
