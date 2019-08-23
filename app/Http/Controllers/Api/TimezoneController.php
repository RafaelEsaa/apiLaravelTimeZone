<?php

namespace App\Http\Controllers\Api;

use App\Time;
use Validator;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Requests\Times;
use App\Http\Controllers\Controller;

class TimezoneController extends Controller
{

    public function __construct(Time $time)
    {
        $this->time = $time;
    }

    public function register(Request $request){

        $data = $request->all();

        $validator = Validator::make($data, [
            'hora' => 'required',
            'utc' => 'required|numeric|between:-11,11',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        return $this->time->register($data);
    }
}
