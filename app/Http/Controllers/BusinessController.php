<?php

namespace App\Http\Controllers;

use App\Notifications\BusinessRoute;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

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

    /**
     * @param Request $request
     * @return array
     */
    public function quotationMail(Request $request)
    {
        $user = new User(['name' => 'Estarter.co ', 'email' => 'cotizaciones@estarter.co']);
        Notification::send($user, new BusinessRoute($request->all()));
        return $request->all();
    }
}
