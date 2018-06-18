<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BusinessController extends Controller
{
    use FormTrait;

    public function index()
    {
        return view('business');
    }

    public function quotation(Request $request)
    {
        $request->validate([
            'origin' => 'required',
            'days' => 'required',
            'car' => 'required',
        ]);
        $dataPost = $request->all();
        $row = $this->sheet($dataPost['origin'])->where('0', $dataPost['days'])->first();
        return $row[$dataPost['car']];
    }

    public function quotationMail(Request $request)
    {
        return $request->all();
    }
}
