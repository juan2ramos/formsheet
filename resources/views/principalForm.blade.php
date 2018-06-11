@extends('layout')
@section('content')
	<form action="{{route('calculate')}}" method="post">
		{{ csrf_field() }}
		<div>
			<h2>1. Selecciona tu ciudad de origen</h2>
			<select name="origin" id="">
				<option value="">Seleccione Ciudad origen</option>
				<option value="BOGOTA">BOGOTÁ</option>
				<option value="">VILLAVICENCIO</option>
				<option value="">CALI</option>
				<option value="">MEDELLÍN</option>
			</select>
		</div>
		<div>
			<h2>2. ¿A donde viajas?</h2>
			<select name="destiny" id="">
				<option value="">Seleccione Ciudad destino</option>
				@foreach($cities as $city)
					<option value="{{$city[0]}}">{{$city[0]}}</option>
				@endforeach
			</select>
		</div>
		<div>
			<h2>3. Selecciona tu tipo de viaje</h2>
			<select name="travel" id="">
				<option value="">Selecciona tu tipo de viaje</option>
				<option value="1">Ida y vuelta en el mismo día (8 horas)</option>
				<option value="2">Ida y vuelta en días diferentes (2 viajes)
				</option>
				<option value="3">Ida y vuelta sin disponibilidad</option>
				<option value="4">Ida y vuelta con disponibilidad</option>
			</select>
		</div>
		<div>
			<h2>4. Selecciona la fecha de tu viaje</h2>
			<label for="inicio">inicio</label>
			<input type="date" id="inicio" name="init" value="{{old('init')}}" placeholder="Inicio">
			<label for="fin">fin</label>
			<input type="date" id="fin" name="end" value="{{old('end')}}" placeholder="Final">
		</div>
		<div>
			<h2>5. Tipo de vehículo</h2>
			<select name="car" id="">
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
		</div>
		<div style="margin-top: 40px">
			<button type="submit">Calcular</button>
		</div>
	</form>


	@if(!empty($travelValue))
		{{$travelValue}}
		<ul>
			<li>Origen: {{$travel[0]}}</li>
			<li>	Destino: {{$travel[1]}}</li>
			<li>Distancia total: {{$travel[2]}}KM</li>
			<li>	Tiempo total: {{$travel[4]}}Horas</li>
			<li>	Desde el {{$input['init']}}</li>
			<li>	Hasta el {{$input['end']}}</li>
		</ul>
	@endif
@endsection