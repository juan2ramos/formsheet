import axios from 'axios';
import serialize from 'form-serialize';
import numeral from "numeral";
import anime from 'animejs';
import autoComplete from './AutoComplete';
import swal from "sweetalert";

const site = document.getElementById('body').dataset.site,
    infoTravel = document.getElementById('infoTravel'),
    infoTravelCol2 = document.getElementById('infoTravelCol2'),
    inputAuto = document.querySelector('#destiny'),
    loadWrap = document.getElementById('loadWrap'),
    submitPrincipal = document.querySelector('#submitPrincipal'),

    scrollCoords = {
        y: window.pageYOffset
    };
export default class Principal {
    constructor(principal) {
        this.principal = principal;

        principal.addEventListener('submit', this.getInfoFormPrincipal.bind(this));
        this.autoCompleteInput();
        inputAuto.addEventListener('click', this.resetInputComplete());
        submitPrincipal.addEventListener('click', this.submit.bind(this));
    }

    submit(ev) {
        ev.preventDefault();
        const self = this
        ev.preventDefault();
        if (self.validationFormDataPerson()) {
            loadWrap.classList.add('show');
            axios.post(site + '/principalMail', serialize(this.principal))
                .then(Principal.principalSendMail.bind(this));
        } else {
            swal("Revise los campos en rojo", "Gracias por contactarnos", "error");
        }
    }

    validationFormDataPerson() {
        let returnValidation = true

        const inputName = document.getElementById('name').value;
        const inputPhone = document.getElementById('phone').value;
        const inputEmail = document.getElementById('email').value;
        const errorDataPerson = document.getElementById('errorDataPerson');

        if (inputName == "" || inputPhone == "" || inputEmail == "") {
            errorDataPerson.classList.remove("hidden");
            document.getElementById('name').classList.add("errorInput");
            document.getElementById('phone').classList.add("errorInput");
            document.getElementById('email').classList.add("errorInput");
            returnValidation = false;
        } else {
            errorDataPerson.classList.add("hidden");
            document.getElementById('name').classList.remove("errorInput");
            document.getElementById('phone').classList.remove("errorInput");
            document.getElementById('email').classList.remove("errorInput");
        }


        return returnValidation;

    }


    static principalSendMail(response) {
        loadWrap.classList.remove('show');
        swal("Mensaje Enviado", "Gracias por contactarnos", "success");
        this.principal.reset();
    }

    resetInputComplete() {
        this.value = "";
    }

    autoCompleteInput() {
        const city = document.querySelectorAll('[name=origin]'),
            normal = {
                'BOGOTA': 0,
                'Villavicencio': 1,
                'Medellín': '2',
                'Calí': 3,
            },
            citiesData = JSON.parse(inputAuto.dataset.cities);
        let cityValue = 'BOGOTA';
        city.forEach(function (el) {
            el.addEventListener('change', function () {
                inputAuto.value = "";
                inputAuto.disabled = false
                cityValue = this.value;

                new autoComplete({
                    selector: '#destiny', minChars: 2,
                    source: function (term, suggest) {
                        term = term.toLowerCase();
                        let choices = citiesData[normal[cityValue]];
                        let matches = [];
                        for (let i = 0; i < choices.length; i++)
                            if (~choices[i].toLowerCase().indexOf(term)) matches.push(choices[i]);
                        suggest(matches);
                    }
                });
            });
        });
    }


    getInfoFormPrincipal(ev) {
        ev.preventDefault();
        const self = this
        ev.preventDefault();
        if (self.validationForm()) {
            loadWrap.classList.add('show');
            axios.post(site + '/principal', serialize(this.principal))
                .then(Principal.setInfoForm);
        } else {
            swal("Revise los campos en rojo", "Gracias por contactarnos", "error");
        }

    }

    validationForm() {
        let returnValidation = true
        const quotationForm = document.getElementById('formPrincipal');
        const intDate = document.getElementById('init').value;
        const endDate = document.getElementById('end').value;
        const errorDate = document.getElementById('errorDate');

        const destiny = document.getElementById('destiny').value;
        const errorDestiny = document.getElementById('errorDestiny');

        if (destiny === "" || destiny == null) {
            errorDestiny.classList.remove("hidden");
            document.getElementById('destiny').classList.add("errorInput");
            returnValidation = false;
        } else {
            errorDestiny.classList.add("hidden");
            document.getElementById('destiny').classList.remove("errorInput");
        }

        if (intDate === "" || intDate == null) {
            errorDate.classList.remove("hidden");
            document.getElementById('init').classList.add("errorInput");
            returnValidation = false;
        } else {
            errorDate.classList.add("hidden");
            document.getElementById('init').classList.remove("errorInput");
        }




        const radiotravel = quotationForm.travel;
        const errorTravel = document.getElementById('errorTravel');

        if (!(radiotravel[0].checked || radiotravel[1].checked || radiotravel[2].checked || radiotravel[3].checked)) {
            errorTravel.classList.remove("hidden");
            returnValidation = false;
        } else {
            errorTravel.classList.add("hidden");
        }


        return returnValidation;

    }

    static setInfoForm(response) {
        loadWrap.classList.remove('show');
        console.log(response.data);
        const car = document.getElementById('car'),
            carText = car.options[car.selectedIndex].text,
            init = document.getElementById('init').value,
            end = document.getElementById('init').value;
        document.querySelector('#UserData').classList.remove('is-hidden');
        anime({
            targets: scrollCoords,
            y: 1350,
            duration: 700,
            easing: 'easeInOutCubic',
            update: () => window.scroll(0, scrollCoords.y)
        });

        let data = response.data,
            html = `<li> <b>Origen: </b> <br> ${data.travel[0]}</li>`;

        document.getElementById('price').value = numeral(data.travelValue).format('$0,0');
        document.getElementById('priceDisabled').value = numeral(data.travelValue).format('$0,0');

        html += `<li> <b>Destino:  </b> <br> ${data.travel[1]}</li>`;
        html += `<li> <b>Tipo de vehiculo: </b> <br> ${carText}</li>`;


        infoTravel.innerHTML = html;

        let dataCol2 = response.data,
            html2 = `<li> <b>Distancia total: </b> <br>${data.travel[3]} Km</li>`;
        html2 += `<li> <b>Desde el: </b> <br>${init}</li>`;
        html2 += `<li> <b>Hasta el: </b> <br>${end}</li>`;

        infoTravelCol2.innerHTML = html2;
    }


}
