@extends('layout')
@section('content')
<section class="container">
  <h2>Cotización Rápida</h2>
  <p class="is-text-center">Selecciona el tipo de servicio que deseas cotizar.</p>
  <a class="botones-home is-full-width m-t-20" href="{{route('business')}}">
    <div class="row align-center justify-around">
      <div class="col-16 col-m-4 col-l-4 icon-service">
          <img src="{{asset('images/iconoRutaEmpresarial.png')}}" alt="">
      </div>
      <div class="col-16 col-m-10 col-l-10">
          <h3>Ruta Empresarial</h3>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis dignissim, massa sed efficitur mattis, leo orci luctus diam, sed auctor </p>
      </div>
    </div>
  </a>
  <a class="botones-home is-full-width m-t-28" href="{{route('calculate')}}">
    <div class="row align-center justify-around">
      <div class="col-16 col-m-4 col-l-4 icon-service">
          <img src="{{asset('images/iconoViajeFuera.png')}}" alt="">
      </div>
      <div class="col-16 col-m-10 col-l-10">
          <h3>Viaje fuera de la ciudad</h3>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis dignissim, massa sed efficitur mattis, leo orci luctus diam, sed auctor </p>
      </div>
    </div>
  </a>
  <a class="botones-home is-full-width m-t-28" href="">
    <div class="row align-center justify-around">
      <div class="col-16 col-m-4 col-l-4 icon-service">
          <img src="{{asset('images/iconTraslado.png')}}" alt="">
      </div>
      <div class="col-16 col-m-10 col-l-10">
          <h3>Traslado dentro de la ciudad</h3>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis dignissim, massa sed efficitur mattis, leo orci luctus diam, sed auctor </p>
      </div>
    </div>
  </a>
  <a class="botones-home is-full-width m-t-28" href="">
    <div class="row align-center justify-around">
      <div class="col-16 col-m-4 col-l-4 icon-service">
          <img src="{{asset('images/iconoPuertaPuerta.png')}}" alt="">
      </div>
      <div class="col-16 col-m-10 col-l-10">
          <h3>Transporte puerta a puerta</h3>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis dignissim, massa sed efficitur mattis, leo orci luctus diam, sed auctor </p>
      </div>
    </div>
  </a>
</section>

@endsection
