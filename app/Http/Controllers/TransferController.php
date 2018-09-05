<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TransferController extends Controller
{
    use formTrait;
    private $sheet = 'Traslados Urbanos';

    public function index()
    {
        return view('transfer', ['price' => $this->getTravel(['type' => '1', 'car' => '2'])]);
    }

    public function calculate(Request $request)
    {
        return ['price' => $travel = $this->getTravel($request->all())];
    }

    public function submit(Request $request){
        return $request;
    }

    private function getTravel($dataPost)
    {
        $travel = $this->sheet($this->sheet)->where('0', $dataPost['type'])->first();
        return $travel[$dataPost['car']];
    }
}

