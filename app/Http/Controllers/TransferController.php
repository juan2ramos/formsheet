<?php

namespace App\Http\Controllers;
use App\Notifications\Transfer;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

class TransferController extends Controller
{
    use FormTrait;
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
        $user = new User(['name' => 'Juan ', 'email' => 'juan2ramos@gmail.com']);
        Notification::send($user, new Transfer($request->all()));
        return $request;
    }

    private function getTravel($dataPost)
    {
        $travel = $this->sheet($this->sheet)->where('0', $dataPost['type'])->first();
        return $travel[$dataPost['car']];
    }
}

