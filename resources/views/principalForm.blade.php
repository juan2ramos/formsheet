@extends('layout')
@section('content')
	<section class="container form-ruta-empresarial">
		<h2>Cotización Rápida</h2>
		<div class="row align-center justify-around descrip-service">
			<div class="col-16 col-m-4 col-l-4 icon-service">
				<img src="{{asset('images/iconoViajeFuera.png')}}" alt="">
			</div>
			<div class="col-16 col-m-10 col-l-10">
				<h3>Viaje fuera de la ciudad</h3>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis dignissim, massa sed efficitur mattis,
					leo orci luctus diam, sed auctor </p>
			</div>
		</div>
		<div class="row justify-center">
			<button type="button" name="button" class="btn-regresar">Regresar</button>
		</div>
		<form id="formPrincipal" action="{{route('calculate')}}" method="post">
			{{ csrf_field() }}
			<div class="row justify-center item">
				<div class="col-16 numberItem">
					<p><span>1</span> Selecciona tu ciudad de origen </p>
				</div>
				<div class="col-16 col-m-4 col-l-4 m-t-8">
					<input id="cityBogo" class="rectangle" type="radio" name="origin" value="BOGOTA">
					<label for="cityBogo">Bogotá</label>
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

			<div class="row justify-center item">
				<div class="col-16 numberItem">
					<p><span>2</span> ¿A donde viajas? </p>
				</div>
				<div class="col-16 col-m-4 col-l-4 m-t-8">
					<input data-cities="{{$cities}}" id="destiny" class="" type="text" name="destiny" value="">
				</div>
			</div>
			<div class="row justify-between item">

				<div class="col-16 numberItem">
					<p><span>3</span> ¿Que tipo de viaje solicitas? </p>
				</div>

				<div class="col-10 m-t-8">

					<input type="radio" id="i-v-m-d" class="circle tipo-viaje" name="travel" value="1" placeholder="">
					<label for="i-v-m-d">Ida y vuelta el mismo día <span class="moreInfo" data-content="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis dignissim, massa sed efficitur
						mattis,uno" ><img src="{{asset('images/iconincog.png')}}" alt=""></span> </label>

					<input type="radio" id="i-v-d-d" class="circle tipo-viaje" name="travel" value="2" placeholder="">
					<label for="i-v-d-d">Ida y vuelta en días diferentes <span class="moreInfo" data-content="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis dignissim, massa sed efficitur
						mattis,dos"><img src="{{asset('images/iconincog.png')}}" alt=""></span> </label>

					<input type="radio" id="i-v-s-d" class="circle tipo-viaje" name="travel" value="3" placeholder="">
					<label for="i-v-s-d">Ida y vuelta sin disponibilidad <span class="moreInfo" data-content="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis dignissim, massa sed efficitur
						mattis,tres" ><img src="{{asset('images/iconincog.png')}}" alt=""></span> </label>

					<input type="radio" id="i-v-c-d" class="circle tipo-viaje" name="travel" value="4" placeholder="">
					<label for="i-v-c-d">Ida y vuelta con disponibilidad <span class="moreInfo" data-content="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis dignissim, massa sed efficitur
						mattis,cuatro" ><img src="{{asset('images/iconincog.png')}}" alt=""></span> </label>

				</div>

				<div class="col-6 m-t-8">
					<div class="infoBox" id="infoBox">
						
					</div>
				</div>

			</div>

			<!--div>
				<h2>3. Selecciona tu tipo de viaje</h2>
				<select name="travel" id="">
					<option value="">Selecciona tu tipo de viaje</option>
					<option value="1">Ida y vuelta en el mismo día (8 horas)</option>
					<option value="2">Ida y vuelta en días diferentes (2 viajes)
					</option>
					<option value="3">Ida y vuelta sin disponibilidad</option>
					<option value="4">Ida y vuelta con disponibilidad</option>
				</select>
			</div-->
			<div class="row justify-evenly item">
				<div class="col-16 numberItem">
					<p><span>4</span></p>
				</div>
				<div class="col-6">
					<label for="inicio">Fecha de inicio del viaje</label>
					<input type="date" id="init" name="init" value="{{old('init')}}" placeholder="Inicio">
				</div>
				<div class="col-6">
					<label for="fin">Fecha de finalización</label>
					<input type="date" id="end" name="end" value="{{old('end')}}" placeholder="Final">
				</div>
			</div>
		<!--div>
			<h2>4. Selecciona la fecha de tu viaje</h2>
			<label for="inicio" >inicio</label>
			<input type="date" id="init" name="init" value="{{old('init')}}" placeholder="Inicio">
			<label for="fin">fin</label>
			<input type="date" id="end" name="end" value="{{old('end')}}" placeholder="Final">
		</div-->
			<div class="row justify-center item">
				<div class="col-16 numberItem item3">
					<p><span>5</span> Selecciona el tipo de vehículo </p>
				</div>
				<div class="col-6">
					<select name="car" id="car">
						<option value="">Selecciona el tipo de vehículo</option>
						<option value="9">Camioneta/Minivan</option>
						<option value="10">Doble cabina</option>
						<option value="11">Microbus 11</option>
						<option value="12">Microbus 19</option>
						<option value="13">Buseta 23</option>
						<option value="14">Buseton 30</option>
						<option value="15">Buseton 40</option>
						<option value="16">Bus 42</option>
					</select>
				</div>
				<div class="col-10 typeCar">
					<img src="{{asset('images/microbus.png')}}" alt="">
				</div>
			</div>
			<!--div>
				<h2>5. Tipo de vehículo</h2>
				<select name="car" id="car">
					<option value="">Selecciona tipo de vehículo</option>
					<option value="9">Camioneta/Minivan</option>
					<option value="10">Doble cabina</option>
					<option value="11">Microbus 11</option>
					<option value="12">Microbus 19</option>
					<option value="13">Buseta 23</option>
					<option value="14">Buseton 30</option>
					<option value="15">Buseton 40</option>
					<option value="16">Bus 42</option>
				</select>
			</div-->
			<div class="row justify-center item">
				<div class="row justify-center">
					<button type="submit" name="button" class="solCot">CONTINUAR</button>
				</div>
			</div>
			<!-- segunda pantalla-->
			<div class="is-hidden" id="UserData">
				<div class="row justify-center item">
					<div class="col-16 col-m-8 col-l-8 img-car">
						<img src="{{asset('images/microbus.png')}}" alt="">
					</div>
					<div class="col-16 col-m-8 col-l-8">
						<p>Valor estimado</p>
						<input type="text" disabled name="" value=" $0" id="priceDisabled">
						<input type="hidden" name="price" value=" $0" id="price">
					</div>
					<div class="col-16 col-m-8 col-l-8">
						<div class="">
							<ul id="infoTravel"></ul>
						</div>
					</div>
					<div class="col-16 col-m-1 col-l-8">
						<div class="">
							<ul id="infoTravel"></ul>
						</div>
					</div>
					<div class="col-16">
						<p>Valor Km adicional: $1000 Valor hora adicional: $ 30.000 Valor día adicional: $300.000</p>
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
						<input type="email" name="email" value="" placeholder="Correo electronico">
						<input id="politicas" type="checkbox" name="policies" value="YES">
						<label for="politicas">Acepto el tratamiento de datos personales y las politicas de
							privacidad.</label>
					</div>
				</div>
				<div class="row justify-center">
					<button type="submit" id="submitPrincipal" name="button" class="solCot">RESERVAR</button>
				</div>
			</div>
		</form>
	</section>
@endsection
