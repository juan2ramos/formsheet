<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;

class TransportDoorController extends Controller
{
    use FormTrait;
    private $sheet = 'Puerta a puerta';

    public function index()
    {
        return view('transportDoor');
    }

    public function availability(Request $request)
    {
        return ['travels' => $this->getTravels($request->all())];
    }

    /**
     * @param $data
     * @return array
     */
    private function getTravels($data)
    {
        $date = new Carbon($data['init']);

        return $this->sheet($this->sheet)
            ->where('0', $data['origin'])
            ->where('1', $date->format('d/m/Y'))
            ->filter(function ($value) use ($data) {
                if ($value[3] >= $data['passenger']) {
                    return true;
                }
            })->all();
    }
    public function send(Request $request){
        return $request;
    }

}
