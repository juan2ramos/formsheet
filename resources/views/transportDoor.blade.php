@extends('layout')
@section('content')
<section class="container form-ruta-empresarial">
	<h2>Cotización Rápida</h2>
	<div class="row align-center justify-around descrip-service">
			<div class="col-16 col-m-4 col-l-4 icon-service">
					<img src="{{asset('images/iconoPuertaPuerta.png')}}" alt="">
			</div>
			<div class="col-16 col-m-10 col-l-10">
					<h3>Transporte puerta a puerta</h3>
					<p>Servicio disponible únicamente entre Bogotá y Villavicencio. Te recogemos en tu casa y te llevamos hasta donde necesites.</p>
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
          <div class="col-16 col-m-7 col-l-7 m-t-8">
              <input id="cityBogota" class="rectangle" type="radio" checked name="origin" value="Bogotá">
              <label for="cityBogota">Bogotá</label>
          </div>
          <div class="col-16 col-m-7 col-l-7 m-t-8">
              <input id="cityVill" class="rectangle" type="radio" name="origin" value="Villavicencio">
              <label for="cityVill">Villavicencio</label>
          </div>
      </div>

      <div class="row justify-center item">
          <div class="col-16 numberItem">
              <p><span>2</span> ¿Cuantos puestos necesitas? </p>
          </div>
          <div class="col-1 col-m-1 col-l-1 m-t-8">
              <input id="1" class="rectangle" type="radio" checked name="passenger" value="1">
              <label for="1">1</label>
          </div>
          <div class="col-1 col-m-1 col-l-1 m-t-8">
              <input id="2" class="rectangle" type="radio" name="passenger" value="2">
              <label for="2">2</label>
          </div>
          <div class="col-1 col-m-1 col-l-1 m-t-8">
              <input id="3" class="rectangle" type="radio" name="passenger" value="3">
              <label for="3">3</label>
          </div>
          <div class="col-1 col-m-1 col-l-1 m-t-8">
              <input id="4" class="rectangle" type="radio" name="passenger" value="4">
              <label for="4">4</label>
          </div>
      </div>

      <div class="row justify-evenly item">
          <div class="col-16 numberItem">
              <p><span>3</span></p>
          </div>
          <div class="col-16 col-m-6 col-l-6 is-text-center">
              <p>Fecha de viaje</p>
              <input type="date" id="init" name="init" value="{{old('init')}}" placeholder="Inicio">
          </div>
          <div class="row justify-center">
              <button type="submit" name="button" id="submitQuotation" class="solCot">VER DISPONIBILIDAD</button>
          </div>
      </div>

      <div class="row justify-evenly item">
          <div class="col-16 numberItem">
              <p><span>4</span>Vehículos disponibles</p>
          </div>
          <div class="col-16 col-m-6 col-l-6 is-text-center">
              <p>Fecha de viaje</p>
              <input type="date" id="init" name="init" value="{{old('init')}}" placeholder="Inicio">
          </div>
      </div>
      <div class="row justify-evenly item">
          <div class="col-16 col-m-7 col-l-7">
            <table class="is-text-center">
              <thead>
              <tr>
                  <th>Horarios</th>
                  <th>Puestos</th>
              </tr>
              </thead>
              <tbody>
              <tr>
                  <td>9:00am</td>
                  <td>4</td>
              </tr>
              </tbody>
          </table>
          </div>
          <div class="col-16 col-m-7 col-l-7">
            <table class="is-text-center">
              <thead>
              <tr>
                  <th>Horarios</th>
                  <th>Puestos</th>
              </tr>
              </thead>
              <tbody>
              <tr>
                  <td>9:00am</td>
                  <td>4</td>
              </tr>
              </tbody>
          </table>
          </div>
          <div class="col-16 col-m-7 col-l-7 m-t-8">
            <table class="is-text-center">
              <thead>
              <tr>
                  <th>Horarios</th>
                  <th>Puestos</th>
              </tr>
              </thead>
              <tbody>
              <tr>
                  <td>9:00am</td>
                  <td>4</td>
              </tr>
              </tbody>
          </table>
          </div>
      </div>

      <div class="row justify-evenly">
          <div class="col-16 numberItem">
              <p><span>5</span>Datos personales.</p>
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
