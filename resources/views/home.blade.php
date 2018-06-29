@extends('layout')
@section('content')
<section class="container">
  <h2>Cotización Rápida</h2>
  <p class="is-text-center">Selecciona el tipo de servicio que deseas cotizar.</p>
  <a class="row align-center justify-around botones-home is-full-width m-t-20" href="{{route('business')}}">

      <div class="col-16 col-m-4 col-l-4 icon-service">
          <img src="{{asset('images/iconoRutaEmpresarial.png')}}" alt="">
      </div>
      <div class="col-16 col-m-10 col-l-10">
          <h3>Ruta Empresarial</h3>
          <p>¿Tu empresa necesita transporte diario para sus empleados? Obten un estimado del valor mensual.</p>
      </div>

  </a>
  <a class="row align-center justify-around botones-home is-full-width m-t-28" href="{{route('calculate')}}">
      <div class="col-16 col-m-4 col-l-4 icon-service">
          <img src="{{asset('images/iconoViajeFuera.png')}}" alt="">
      </div>
      <div class="col-16 col-m-10 col-l-10">
          <h3>Viaje fuera de la ciudad</h3>
          <p>Viajamos a toda Colombia en vehículos desde 4 hasta 42 pasajeros. Obtén el precio exacto de tu servicio y las condiciones. </p>
      </div>
  </a>
  <a class="row align-center justify-around botones-home is-full-width m-t-28" href="{{route('transfer')}}">

      <div class="col-16 col-m-4 col-l-4 icon-service">
          <img src="{{asset('images/iconTraslado.png')}}" alt="">
      </div>
      <div class="col-16 col-m-10 col-l-10">
          <h3>Traslado dentro de la ciudad</h3>
          <p>Si estás en Bogotá, Villavicencio, Cali o Medellín y necesitas un vehículo de 4 a 42 pasajeros. Cotizalo aquí.</p>
      </div>

  </a>
<a class="row align-center justify-around botones-home is-full-width m-t-28" href="{{route('transportDoor')}}">

      <div class="col-16 col-m-4 col-l-4 icon-service">
          <img src="{{asset('images/iconoPuertaPuerta.png')}}" alt="">
      </div>
      <div class="col-16 col-m-10 col-l-10">
          <h3>Transporte puerta a puerta</h3>
          <p>Servicio disponible únicamente entre Bogotá y Villavicencio. Te recogemos en tu casa y te llevamos hasta donde necesites.</p>
      </div>
  </a>
</section>

@endsection
