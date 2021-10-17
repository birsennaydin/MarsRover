<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use App\Traits\Position;
use App\Traits\Direction;
use App\Traits\Plateau;

class ApiRoverController extends Controller
{
    use Position, Direction, Plateau;

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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function createRover(Request $request)
    {
        // return response(['result' => "test"]);
        $validated = Validator::make($request->all(), [
            'rover_name' => 'required|string|max:30|min:4',
            'coordinate' => 'required|string|max:7|min:5',
            // 'direction' => 'required|string|min:1'
        ]);

        if ($validated->fails()) {
            return response(['result' => 'failed', 'message' => $validated->errors()->all()], 422);
        }

        $result = $this->setRover($request["rover_name"], $request["coordinate"]);

        if ($result == false) {
            return response(['result' => 'failed', 'message' => 'Could not create be rover.']);
        }

        return response(["result" => "success", "message" => "Created rover. Rover's validity is 60 seconds.", "coordinate" => $result]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function sendCommands(Request $request)
    {

        $validated = Validator::make($request->all(), [
            'plateau_name' => 'required|string|max:30|min:4',
            'rover_name' => 'required|string|max:30|min:4',
            'commands' => 'required|string|max:200|min:1',
            // 'direction' => 'required|string|min:1'
        ]);

        if ($validated->fails()) {
            return response(['result' => 'failed', 'message' => $validated->errors()->all()]);
        }

        $plateau_result = $this->getPlateau($request["plateau_name"]);

        if ($plateau_result == false) {
            return response(['result' => 'failed', 'message' => 'Could not find be plateau.']);
        }


        $rover_coordinate = $this->getRover($request["rover_name"]);

        if ($rover_coordinate == false) {
            return response(['result' => 'failed', 'message' => 'Could not find be rover.']);
        }

        $result = $this->commands($rover_coordinate, $request["commands"], $plateau_result);
        return response(["result" => "success", "message" => "Discovery is complete.", "coordinate" => $result]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
