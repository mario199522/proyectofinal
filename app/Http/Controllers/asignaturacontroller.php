<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\asignatura;
class asignaturacontroller extends Controller
{


     /**
     * @SWG\Swagger(
     *   basePath="/api/v0",
     *   @SWG\Info(
     *     title="Customer rate calculator API",
     *     version="1.0.0"
     *   )
     * )
     */
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    /**
     * @SWG\Get(
     *   path="/asignatura",
     *   tags={"Asignatura"},
     *   summary="Lista de Asignaturas",
     *   operationId="getCustomerRates",
     *   @SWG\Response(response=200, description="registro encontrados"),
     *   @SWG\Response(response=404, description="not found"),)
     * )
     *
     */
    public function index()
    {
         $asignatura= asignatura::all();
        return response()->json(['asignatura'=>$asignatura, 'code'=>'200']) ;
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
     *   path="/asignatura",
     *   tags={"Asignatura"},
     *   summary="Crear Asignatura",
     *   operationId="getCustomerRates",
     *   @SWG\Parameter(
     *     name="descripcion",
     *     in="formData",
     *     description="ingrese Asignatura",
     *     required=true,
     *     type="string"
     *   ),
     *   @SWG\Response(response=201, description="Asignatura creada exitosa"),
      *   @SWG\Response(response=404, description="no found"),
     * )
     *
     */
    public function store(Request $request)
    {
        if(empty($request->descripcion)){

            return response()->json(['message'=>'Todos los campos son requeridos', 'code'=>'406']);
        }

        $asignatura = new asignatura();
        $asignatura->descripcion=$request->descripcion;
        $asignatura->save();
        return response()->json(['message'=>'Asignatura  creada correctamente', 'code'=>'201']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     /**
     * @SWG\Get(
     *   path="/asignatura/{id}",
     *   tags={"Asignatura"},
     *   summary="ver asignatura con id",
     *   operationId="getRed",
     *   @SWG\Parameter(
     *     name="id",
     *     in="path",
     *     description="ingresar id de la asignatura",
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
         $asignatura= asignatura::find($id);
       if((empty($asignatura))){
        return response()->json(['message'=>'asignatura  no encontrado', 'code'=>'404']) ;
       }

       return response()->json(['Asignatura'=>$asignatura, 'code'=>'200']) ;
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
     *   path="/asignatura/{id}",
     *   tags={"Asignatura"},
     *   summary="Actualizar Asignatura",
     *   operationId="Actulizar_Asignatura",
     *   @SWG\Parameter(
     *     name="id",
     *     in="path",
     *     description="ingrese id  ",
     *     required=true,
     *     type="integer"
     *   ),
     *       @SWG\Parameter(
     *     name="descripcion",
     *     in="formData",
     *     description="ingrese nueva Asignatura",
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


        $asignatura=asignatura::find($id);
        if(empty($asignatura)){

                return response()->json(['message'=>'Asignatura no encontrada', 'code'=>'404']);
        }
        
        $asignatura->descripcion=$request->descripcion;
        $asignatura->save();
        return response()->json(['message'=>'Asignatura actualizada', 'code'=>'200']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    /**
     * @SWG\Delete(
     *   path="/asignatura/{id}",
     *   tags={"Asignatura"},
     *   summary="eliminar Asignatura",
     *   operationId="EliminarAsignatura",
     *   @SWG\Parameter(
     *     name="id",
     *     in="path",
     *     description="ingresar id de la Asignatura",
     *     required=true,
     *     type="integer"
     *   ),
     *   @SWG\Response(response=204, description="asignatura eliminada"),
     *   @SWG\Response(response=404, description="not found"),
     * )
     *
     */
    public function destroy($id)
    {
        if(empty($id)) {

            return response()->json(['message'=>'el id es obligatorio', 'code'=>'406']);
        }


        $asignatura=asignatura::find($id);
        if(empty($asignatura)){

                return response()->json(['message'=>'Asignatura no encontrada', 'code'=>'404']);
        }
        
        $asignatura->delete();

        return response()->json(['message'=>'Asignatura Eliminada', 'code'=>'200']);
    }
}
