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
                <p>Viajamos a toda Colombia en vehículos desde 4 hasta 42 pasajeros. Obtén el precio exacto de tu
                    servicio y las condiciones.</p>
            </div>
        </div>
        <div class="row justify-center">
            <a href="/">
                <button type="button" name="button" class="btn-regresar">Regresar</button>
            </a>
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
                    <input id="cityMede" class="rectangle" type="radio" name="origin" value="Medellín">
                    <label for="cityMede">Medellín</label>
                </div>
                <div class="col-16 col-m-4 col-l-4 m-t-8">
                    <input id="cityCali" class="rectangle" type="radio" name="origin" value="Calí">
                    <label for="cityCali">Calí</label>
                </div>
            </div>

            <div class="row justify-center item">
                <div class="col-16 numberItem">
                    <p><span>2</span> ¿A donde viajas? </p>
                    <span id="errorDestiny" class="error hidden"> *Complete este campo </span>
                </div>
                <div class="col-8 col-m-8 col-l-8 m-t-8">
                    <input disabled data-cities="{{$cities}}" id="destiny" class="" type="text" name="destiny" value="">
                </div>
            </div>
            <div class="row justify-between item">

                <div class="col-16 numberItem">
                    <p><span>3</span> ¿Que tipo de viaje solicitas? </p>
                    <span id="errorTravel" class="error hidden"> *Por Favor seleccione una opción </span>
                </div>

                <div class="col-16 m-t-8 ">

                    <input type="radio" id="i-v-m-d" class="circle tipo-viaje" checked name="travel" value="1" placeholder="">
                    <label for="i-v-m-d" class="moreInfo"
                           data-content="Ida y vuelta el mismo día Cuando vas hacia otra ciudad y vuelves el mismo día o no planeas volver en nuestro servicio">
                        Ida y vuelta el mismo día <span><img src="{{asset('images/iconincog.png')}}" alt=""></span>
                    </label>

                    <input type="radio" id="i-v-d-d" class="circle tipo-viaje" name="travel" value="2" placeholder="">
                    <label for="i-v-d-d" class="moreInfo"
                           data-content="Ida y vuelta en días diferentes Viajas a una ciudad cercana, nuestro vehículo te deja y vuelve a recogerte en tu fecha de regreso.">Ida
                        y vuelta en días diferentes <span><img src="{{asset('images/iconincog.png')}}" alt=""></span>
                    </label>

                    <input type="radio" id="i-v-s-d" class="circle tipo-viaje" name="travel" value="3" placeholder="">
                    <label for="i-v-s-d" class="moreInfo" data-content="Ida y vuelta sin disponibilidad	Viajas a una ciudad lejana y nuestro vehículo te espera en la ciudad los días necesarios mientras regresas. No puedes hacer uso del vehículo durante estos días.">Ida y vuelta sin disponibilidad <span><img src="{{asset('images/iconincog.png')}}"
                                                                                alt=""></span> </label>

                    <input type="radio" id="i-v-c-d" class="circle tipo-viaje" name="travel" value="4" placeholder="">
                    <label for="i-v-c-d" class="moreInfo" data-content="Ida y vuelta con disponibilidad	Viajas a otra ciudad durante varios días y quieres utilizar nuestro vehículo durante tu estadía.">Ida y vuelta con disponibilidad <span><img
                                    src="{{asset('images/iconincog.png')}}" alt=""></span> </label>

                </div>

                <div class="col-10 m-t-8 m-a">
                    <div class="infoBox m-t-24" id="infoBox">
                        Ida y vuelta el mismo día Cuando vas hacia otra ciudad y vuelves el mismo día o no planeas volver en nuestro servicio
                    </div>
                </div>

            </div>

            <div class="row justify-evenly item">
                <div class="col-16 numberItem">
                    <p><span>4</span></p>
                </div>
                <div class="col-16 row justify-center">
                    <span id="errorDate" class="error hidden"> *Complete este campo </span></div>
                <div class="col-6">
                    <label for="inicio">Fecha de inicio del viaje</label>

                    <input type="date" id="init" class="inputDate" name="init" value="{{old('init')}}"
                           placeholder="Inicio">
                </div>
            <div class="col-6 hidden" id="DateEnd">
                    <label for="fin">Fecha de finalización</label>
                    <input type="date" id="end" class="inputDate" name="end" value="{{old('end')}}" placeholder="Final">
                </div>
            </div>

            <div class="row justify-center item">
                <div class="col-16 numberItem item3">
                    <p><span>5</span> Selecciona el tipo de vehículo </p>
                </div>
                <div class="col-6">
                    <select id="car" name="car" data-url="{{env('APP_URL')}}">
                        <option value="10" data-name="001">4 Pasajeros</option>
                        <option value="11" data-name="002">4 Pasajeros pickup</option>
                        <option value="12" data-name="minivan">6 Pasajeros</option>
                        <option value="13" data-name="minibus11">11 Pasajeros</option>
                        <option value="14" data-name="microbus15">15 Pasajeros</option>
                        <option value="15" selected data-name="microbus18">19 Pasajeros</option>
                        <option value="16" data-name="buseta25">23 Pasajeros</option>
                        <option value="17" data-name="buseton30">30 Pasajeros	</option>
                        <option value="18" data-name="buseton30">40 Pasajeros</option>
                        <option value="19" data-name="bus">42 Pasajeros</option>
                    </select>
                </div>
                <div class="col-10 typeCar">
                    <img id="imgCar" src="{{asset('images/microbus18.jpg')}}" alt="">
                </div>
            </div>

            <div class="row justify-center item">
                <div class="row justify-center">
                    <button type="submit" name="button" class="solCot is-text-uppercase">Ver Valor Estimado</button>
                </div>
            </div>
            <!-- segunda pantalla-->
            <div class="is-hidden" id="UserData">
                <div class="row justify-center item">

                    <div class="col-16 m-b-16">
                        <p>Valor estimado</p>
                        <input type="text" disabled name="" value=" $0" id="priceDisabled">
                        <input type="hidden" name="price" value=" $0" id="price">
                    </div>
                    <div class="col-16 col-m-8 col-l-8">
                        <div class="infoTravel">
                            <ul id="infoTravel" class="is-list-less"></ul>
                        </div>
                    </div>
                    <div class="col-16 col-m-8 col-l-8">
                        <div class="infoTravel">
                            <ul id="infoTravelCol2" class="is-list-less"></ul>
                        </div>
                    </div>
                    <div class="col-16">
                        <p class="valueAd">Valor Km adicional: $1000 Valor hora adicional: $ 30.000 Valor día adicional:
                            $300.000</p>
                    </div>
                </div>
                <div class="row justify-evenly">
                    <div class="col-16 numberItem">
                        <p><span>6</span>Datos personales.</p>
                        <span id="errorDataPerson" class="error hidden"> *Complete los campos </span>
                    </div>
                    <div class="col-6 datos-personales">
                        <input type="text" id="name" name="name" value="" placeholder="Nombre y Apellidos">
                        <input type="text" id="phone" name="phone" value="" placeholder="Télefono o celular">
                    </div>
                    <div class="col-6 datos-personales">
                        <input type="email" class="datos-personalesEmail m-t-8" id="email" name="email" value="" placeholder="Correo electronico">
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
    <div class="load-wrap" id="loadWrap">

        <div class="loader">

            <div class="line"></div>
            <div class="line"></div>
            <div class="line"></div>
            <div class="line"></div>
            <div class="line"></div>
            <div class="line"></div>
            <div class="subline"></div>
            <div class="subline"></div>
            <div class="subline"></div>
            <div class="subline"></div>
            <div class="subline"></div>
            <div class="loader-circle-1">
                <div class="loader-circle-2"></div>
            </div>
            <div class="needle"></div>
            <div><i>Calculando...</i></div>
            <div class="loading"><img
                        src="data:image/png;base64,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">
            </div>
        </div>
    </div>
@endsection
