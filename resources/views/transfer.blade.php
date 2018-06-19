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
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis dignissim, massa sed efficitur mattis, leo orci luctus diam, sed auctor </p>
			</div>
	</div>
  <div class="row justify-center">
		<button type="button" name="button" class="btn-regresar">Regresar</button>
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
              <select id="car" name="car">
                  <option value="">Selecciona el tipo de vehículo</option>
                  <option value="1">Camioneta/Minivan</option>
                  <option value="2">Microbus 11</option>
                  <option value="3">Microbus 15</option>
                  <option value="4">Microbus 18</option>
                  <option value="5">Buseta 25</option>
                  <option value="6">Buseton 30</option>
                  <option value="7">Buseton</option>
                  <option value="8">Bus</option>
              </select>
          </div>
          <div class="col-10 typeCar">
              <img src="{{asset('images/microbus.png')}}" alt="">
          </div>
      </div>

      <div class="row justify-between item">

  			<div class="col-16 numberItem">
  				<p> <span>5</span> ¿Que tipo de traslado solicitas? </p>
  			</div>

  			<div class="col-10 m-t-8">

  				<input type="radio" id="recorrido" class="circle tipo-viaje" name="typeTransfer" value="1" placeholder="">
  				<label for="recorrido">1 Recorrido (máx 1 hr - 30 km)</label>

  				<input type="radio" id="airport" class="circle tipo-viaje" name="typeTransfer" value="2" placeholder="">
  				<label for="airport">Aeropuerto</label>

  				<input type="radio" id="i-v" class="circle tipo-viaje" name="typeTransfer" value="3" placeholder="">
  				<label for="i-v">Ida y vuelta</label>

  				<input type="radio" id="d-d" class="circle tipo-viaje" name="typeTransfer" value="4" placeholder="">
  				<label for="d-d">Disponibilidad día.</label>

  		  </div>

  			<div class="col-6 m-t-8">
  				<div class="infoBox infoBoxTransfer">
  					<p>Máx 1 hora - 30 Kilometros</p>
            <span>$ 50.000</span>
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
