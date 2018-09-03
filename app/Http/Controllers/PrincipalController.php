<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;

class PrincipalController
{
    use FormTrait;
    private $sheet;

    public function __construct()
    {
        $this->sheet = 'Tarifas';
    }

    function principalMail(Request $request)
    {

        return $request->all();
    }

    function index()
    {
        $cities = $this->getCities();

        return view('principalForm', compact('cities'));
    }

    function calculate(Request $request)
    {

        $request->validate([
            'origin' => 'required',
            'destiny' => 'required',
            'init' => 'required',
            'end' => 'required',
        ]);
        $input = $request->all();
        $travel = $this->getTravel($input);
        $travelValue = $this->getCalculate($input, $travel);

        //return ['input' => $input];
        return ['travelValue' => $travelValue, 'travel' => $travel];
    }

    private function getTravel($dataPost)
    {
        return $this->sheet($this->sheet)->where('0', $dataPost['origin'])->where('1', $dataPost['destiny'])->first();
    }

    /**
     * @param $dataPost
     * @param $travel
     * @return null
     */
    private function getCalculate($dataPost, $travel)
    {

        switch ($dataPost['travel']) {
            case 1:
                return $travel[$dataPost['car']];
                break;
            case 2:
                return $this->formatValue($travel[$dataPost['car']]) * 1.9;
                break;
            case 3:
                return $this->with($dataPost, $travel, 'Base!C6');
                break;
            case 4:
                return $this->with($dataPost, $travel, 'Base!C7');
                break;
        }
        return null;
    }

    private function with($dataPost, $travel, $base)
    {

        $init = new Carbon($dataPost['init']);
        $end = new Carbon($dataPost['end']);
        $days = $init->diffInDays($end);
        $base = $this->sheet($base)->first();

        return $this->formatValue($travel[$dataPost['car']]) + (intval($days) * $this->formatValue($base[0]));
    }

    private function getCities()
    {

        return $this->sheet('Destinos!A2:A2000')->implode('0', ', ');
    }

    private function formatValue($value)
    {

        return intval(str_replace(".", "", str_replace("$", "", $value)));
    }
}
