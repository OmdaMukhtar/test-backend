<?php

namespace App\Http\Controllers\API;

use App\ClassModel;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreClassRequest;
use App\Http\Resources\ClassCollection;
use Illuminate\Http\Request;

class ClassApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $classes = ClassModel::paginate();
        return new ClassCollection($classes);
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
    public function store(StoreClassRequest $request)
    {

        try {

            ClassModel::create([
                'max_students'  =>$request->max_students,
                'code'          =>$request->code,
                'name'          =>$request->name,
                'status'        =>$request->status,
                'description'   => $request->description,
            ]);


            return response()->json([
                'status' => true,
                'message' => 'Class created Successfully'
            ], 200);

        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 200);
        }

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
    public function update(Request $request, ClassModel $classe)
    {


        try {
            $classe->fill([$request->all()]);
            $classe->save();

            return response()->json([
                'status' => true,
                'message' => 'Class updated Successfully'
            ], 200);

        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 200);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(ClassModel $class_model)
    {
        try {

            if(! is_null($class_model)){
                $class_model->delete();


                return response()->json([
                    'status' => true,
                    'message' => 'record is deleted successfully'
                ], 200);
            }

        } catch (\Throwable $th) {

            return response()->json([
                'status' => false,
                'message' => 'record is not deleted'
            ], 200);
        }
    }
}
