<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TransportDoorController extends Controller
{
  public function index()
  {
      return view('transportDoor');
  }
}
