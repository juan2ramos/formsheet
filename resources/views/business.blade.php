@extends('layout')
@section('content')
    <section class="container form-ruta-empresarial">
        <h2>Cotización Rápida</h2>
        <div class="row align-center justify-around descrip-service">
            <div class="col-16 col-m-4 col-l-4 icon-service">
                <img src="{{asset('images/iconoRutaEmpresarial.png')}}" alt="">
            </div>
            <div class="col-16 col-m-10 col-l-10">
                <h3>Ruta Empresarial</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis dignissim, massa sed efficitur mattis,
                    leo orci luctus diam, sed auctor </p>
            </div>
        </div>
        <div class="row justify-center">
            <button type="button" name="button" class="btn-regresar">Regresar</button>
        </div>
        <form action="" method="post" id="quotationForm">
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
            <div class="row justify-center item">
                <div class="col-16 numberItem">
                    <p><span>2</span> Selecciona los días laborales </p>
                </div>
                <div class="col-4">
                    <input id="lunVier" class="rectangle" checked type="radio" name="days" value="LUNES A VIERNES">
                    <label for="lunVier">Lunes a Viernes</label>
                </div>
                <div class="col-4">
                    <input id="lunSab" class="rectangle" type="radio" name="days" value="LUNES A SÁBADO">
                    <label for="lunSab">Lunes a Sábado</label>
                </div>
                <div class="col-4">
                    <input id="lunDom" class="rectangle" type="radio" name="days" value="LUNES A DOMINGO">
                    <label for="lunDom">Lunes a Domingo</label>
                </div>

            </div>

            <div class="row justify-center item">
                <div class="col-16 numberItem item3">
                    <p><span>3</span> Selecciona el tipo de vehículo </p>
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
            <div class="row justify-center item">
                <div class="col-16">
                    <p class="is-text-center m-b-0">Valor Estimado</p>
                </div>
                <div class="col-8">
                    <input disabled type="text" value=" $0" id="priceDisabled">
										<input type="hidden" name="price" value=" $0" id="price">
                </div>
                <div class="col-16 span">
                    <span>*Precio mes basado en ruta de ida y vuelta sin peajes, máximo 50 km diarios.</span>
                </div>
                <div class="row justify-center">
                    <button type="submit" id="quotation" name="button" class="solCot">SOLICITAR COTIZACIÓN</button>
                </div>
            </div>
            <div id="UserData" class="is-hidden">
                <div class="row justify-center item">
                    <div class="col-16 numberItem">
                        <p><span>4</span> Selecciona el horario </p>
                    </div>
                    <div class="row col-8 hours justify-evenly">
                        <p>Hora de ingreso:</p>
                        <input type="time" name="hourInit" value="">
                    </div>
                    <div class="row col-8 hours justify-evenly">
                        <p>Hora de salida:</p>
                        <input type="time" name="hourEnd" value="">
                    </div>
                </div>
                <div class="row justify-evenly item">
                    <div class="col-16 numberItem">
                        <p><span>5</span></p>
                    </div>
                    <div class="col-6">
                        <label for="inicio">Fecha estimada de inicio</label>
                        <input type="date" id="inicio" name="init" value="{{old('init')}}" placeholder="Inicio">
                    </div>
                    <div class="col-6">
                        <label for="fin">Duración del contrato</label>
                        <input type="text" id="duracionContrato" name="contractTime" value="" placeholder="">
                    </div>
                </div>
                <div class="row justify-evenly item">
                    <div class="col-16 numberItem">
                        <p><span>6</span></p>
                    </div>
                    <div class="col-6">
                        <p>¿Ya cuenta con el servicio de transporte?</p>

                        <input type="radio" id="yes" class="circle" name="haveService" value="SI" placeholder="">
                        <label for="yes">SI</label>
                        <input type="radio" id="no" class="circle" name="haveService" value="NO" placeholder="">
                        <label for="no">NO</label>

                        <p>¿Desea agendar una reunión informativa con Estárter?</p>

                        <input type="radio" id="yes2" class="circle" name="dateMeeting" value="SI" placeholder="">
                        <label for="yes2">SI</label>
                        <input type="radio" id="no2" class="circle" name="dateMeeting" value="NO" placeholder="">
                        <label for="no2">NO</label>

                    </div>
                    <div class="col-6">
                        <p>¿Cuales son sus principales preocupaciones en transporte?</p>
                        <textarea name="name" rows="5" cols="80"></textarea>
                    </div>
                </div>
                <div class="row justify-evenly">
                    <div class="col-16 numberItem">
                        <p><span>7</span>Datos personales.</p>
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
                    <button type="submit" name="button" id="submitQuotation" class="solCot">SOLICITAR COTIZACIÓN</button>
                </div>

            </div>
						
        </form>
    </section>
@endsection
