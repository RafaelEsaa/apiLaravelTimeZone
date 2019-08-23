<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Time extends Model
{
    protected $table = 'times';

    protected $fillable = ['hora', 'utc'];

    public function register($data){

        $time = new Time();
        $time->hora = $data['hora'];
        $time->utc = $data['utc'];
        $time->save();
        
        if($time->save()){
            if($data['utc'] > 0){
                $result = Carbon::parse($data['hora'])->addHours($data['utc'])->format('H:i:s');
                return response()->json([
                    'response' => [
                                    'time' => $result,
                                    'timezone' => 'utc'
                                ],
                ]);
            }else{
                $utc = str_replace('-', '', $data['utc']);
                $result = Carbon::parse($data['hora'])->subHours($utc)->format('H:i:s');
                return response()->json([
                    'response' => [
                                    'time' => $result,
                                    'timezone' => 'utc'
                                ],
                ]);
            }
        }else{
            return response()->json(['response' => 'Something is wrong'], 400);
        }
    }
}