<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use App\Traits\Plateau;

class ApiPlateauController extends Controller
{
    use Plateau;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function plateau(Request $request)
    {
         //return response(['result' => $request["plateau_name"]]);
        $validated = Validator::make($request->all(), [
            'plateau_name' => 'required|string|max:30|min:4'
        ]);

        if ($validated->fails())
        {
            return response(['result' => 'failed', 'message' => $validated->errors()->all()]);
        }

        $result = $this->getPlateau($request["plateau_name"]);

        if($result == false){
            return response(['result' => 'failed', 'message' => 'Could not find be plateau.']);
        }

        return response(["result" => "success", "message" => "Plato information received.", "matrix" => $result]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function createPlateau(Request $request)
    {
        // return response(['result' => "test"]);
        $validated = Validator::make($request->all(), [
            'plateau_name' => 'required|string|max:30|min:4',
            'matrix' => 'required|string|max:6|min:2',
            // 'direction' => 'required|string|min:1'
        ]);

        if ($validated->fails())
        {
            return response(['result' => 'failed', 'message' => $validated->errors()->all()]);
        }

        $result = $this->setPlateau($request["plateau_name"], $request["matrix"]);

        if($result == false){
            return response(['result' => 'failed', 'message' => 'Could not create be plateau.']);
        }

        return response(["result" => "success", "message" => "Created plateau. Plateau's validity is 300 seconds.", "matrix" => $result]);
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
