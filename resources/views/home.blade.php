@extends('layout')
@section('content')
<section class="container">
  <h2>Cotización Rápida</h2>
  <p>Selecciona el tipo de servicio que deseas cotizar.</p>
  <a href="{{route('business')}}">
  <div class="row align-center justify-evenly botones-home">
    <div class="col-6 icon-service">
        <img src="{{asset('images/iconoRutaEmpresarial.png')}}" alt="">
        <hr class="line">
    </div>
    <div class="col-10">
        <h3>Ruta Empresarial</h3>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis dignissim, massa sed efficitur mattis, leo orci luctus diam, sed auctor </p>
    </div>

  </div>
  </a>
</section>

@endsection
