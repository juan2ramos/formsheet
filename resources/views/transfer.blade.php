@extends('layout')
@section('content')
<section class="container form-ruta-empresarial">
	<h2>Cotización Rápida</h2>
	<div class="row align-center justify-around descrip-service">
			<div class="col-16 col-m-4 col-l-4 icon-service">
					<img src="{{asset('images/iconTraslado.png')}}" alt="">
			</div>
			<div class="col-16 col-m-10 col-l-10">
					<h3>Traslado dentro de la ciudad</h3>
					<p>Si estás en Bogotá, Villavicencio, Cali o Medellín y necesitas un vehículo de 4 a 42 pasajeros. Cotizalo aquí.</p>
			</div>
	</div>
  <div class="row justify-center">
		<a href="/"><button type="button" name="button" class="btn-regresar">Regresar</button></a>
	</div>
  <form action="" method="post" id="">
      {{ csrf_field() }}
      <div class="row justify-center item">
          <div class="col-16 numberItem">
              <p><span>1</span> Selecciona tu ciudad de origen </p>
          </div>
          <div class="col-16 col-m-4 col-l-4 m-t-8">
              <input id="cityBogota" class="rectangle" type="radio" checked name="origin" value="Bogotá">
              <label for="cityBogota">Bogotá</label>
          </div>
          <div class="col-16 col-m-4 col-l-4 m-t-8">
              <input id="cityVill" class="rectangle" type="radio" name="origin" value="Villavicencio">
              <label for="cityVill">Villavicencio</label>
          </div>
          <div class="col-16 col-m-4 col-l-4 m-t-8">
              <input id="cityCali" class="rectangle" type="radio" name="origin" value="Calí">
              <label for="cityCali">Calí</label>
          </div>
          <div class="col-16 col-m-4 col-l-4 m-t-8">
              <input id="cityMede" class="rectangle" type="radio" name="origin" value="Medellín">
              <label for="cityMede">Medellín</label>
          </div>
      </div>

      <div class="row justify-evenly item">
          <div class="col-16 numberItem">
              <p><span>2</span></p>
          </div>
          <div class="col-16 col-m-6 col-l-6 is-text-center">
              <p>Direccion de origen</p>
              <input type="text" name="originAddress" value="">
          </div>
          <div class="col-16 col-m-6 col-l-6 is-text-center">
              <p>Direccion de destino</p>
              <input type="text" name="destinyAddress" value="">
          </div>
      </div>

      <div class="row justify-evenly item">
          <div class="col-16 numberItem">
              <p><span>3</span></p>
          </div>
          <div class="col-16 col-m-6 col-l-6 is-text-center">
              <p>Fecha de inicio de traslado</p>
              <input type="date" id="init" name="init" value="{{old('init')}}" placeholder="Inicio">
          </div>
          <div class="col-16 col-m-6 col-l-6 is-text-center">
              <p>Fecha de finalizacion</p>
              <input type="date" id="end" name="end" value="{{old('end')}}" placeholder="Final">
          </div>
      </div>

      <div class="row justify-center item">
          <div class="col-16 numberItem item3">
              <p><span>4</span> Selecciona el tipo de vehículo </p>
          </div>
          <div class="col-6">
							<select id="car" name="car" data-url="{{env('APP_URL')}}">
									<option value="">Selecciona el tipo de vehículo</option>
									<option value="1" data-name="minivan">Camioneta/Minivan</option>
									<option value="2" data-name="minibus11">Microbus 11</option>
									<option value="3" data-name="microbus15">Microbus 15</option>
									<option value="4" selected data-name="microbus18">Microbus 18</option>
									<option value="5" data-name="buseta25">Buseta 25</option>
									<option value="6" data-name="buseton30">Buseton 30</option>
									<option value="7" data-name="buseton30">Buseton</option>
									<option value="8" data-name="bus">Bus</option>
							</select>
					</div>
					<div class="col-10 typeCar">
							<img id="imgCar" src="{{asset('images/microbus18.jpg')}}" alt="">
					</div>
      </div>

      <div class="row justify-between item">

  			<div class="col-16 numberItem">
  				<p> <span>5</span> ¿Que tipo de traslado solicitas? </p>
  			</div>

  			<div class="col-10 m-t-8">

  				<input type="radio" id="recorrido" class="circle tipo-viaje" name="typeTransfer" value="1" placeholder="">
  				<label for="recorrido" class="moreInfo" data-content="Máximo 1 hora y 30 Km dentro del perimetro urbano." >1 recorrido <span ><img src="{{asset('images/iconincog.png')}}" alt=""></span> </label>

  				<input type="radio" id="airport" class="circle tipo-viaje" name="typeTransfer" value="2" placeholder="">
  				<label for="airport" class="moreInfo" data-content="Te llevamos o te recogemos hacia o desde el aeropuerto.">Aeropuerto <span  ><img src="{{asset('images/iconincog.png')}}" alt=""></span></label>

  				<input type="radio" id="i-v" class="circle tipo-viaje" name="typeTransfer" value="3" placeholder="">
  				<label for="i-v" class="moreInfo" data-content="Máximo 2 horas de recorrido. 3 horas de espera. Hasta 50 kilometros.">Ida y vuelta <span  ><img src="{{asset('images/iconincog.png')}}" alt=""></span></label>

  				<input type="radio" id="d-d" class="circle tipo-viaje" name="typeTransfer" value="4" placeholder="">
  				<label for="d-d" class="moreInfo" data-content="8 horas. Hasta 100 km.">Disponibilidad día. <span><img src="{{asset('images/iconincog.png')}}" alt=""></span></label>

  		  </div>

  			<div class="col-6 m-t-8">
  				<div class="infoBox infoBoxTransfer" id="infoBox">

  				</div>
  			</div>

  		</div>

      <div class="row justify-evenly">
          <div class="col-16 numberItem">
              <p><span>6</span>Datos personales.</p>
          </div>
          <div class="col-6 datos-personales">
              <input type="text" name="name" value="" placeholder="Nombre y Apellidos">
              <input type="text" name="phone" value="" placeholder="Télefono o celular">
          </div>
          <div class="col-6 datos-personales">
              <input type="text" name="email" value="" placeholder="Correo electronico">
              <input id="politicas" type="checkbox" name="policies" value="Aceptó">
              <label for="politicas">Acepto el tratamiento de datos personales y las politicas de
                  privacidad.</label>
          </div>
      </div>
      <div class="row justify-center">
          <button type="submit" name="button" id="submitQuotation" class="solCot">RESERVAR</button>
      </div>

  </form>
</section>
@endsection
