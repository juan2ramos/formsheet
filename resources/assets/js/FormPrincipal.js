import axios from 'axios';
import serialize from 'form-serialize';
import numeral from "numeral";
import anime from 'animejs';
import autoComplete from './AutoComplete';
import swal from "sweetalert";

const site = document.getElementById('body').dataset.site,
    infoTravel = document.getElementById('infoTravel'),
    inputAuto = document.querySelector('#destiny'),
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
        console.log(ev);
        const self = this
        ev.preventDefault();
        if (self.validationForm()) {
            axios.post(site + '/principalMail', serialize(this.principal))
                .then(Principal.principalSendMail.bind(this));
        } else {
            swal("Revise los campos en rojo", "Gracias por contactarnos", "error");
        }


    }

    validationForm() {
        let returnValidation = true
        const destiny = document.getElementById('destiny').value;
        const errorDestiny = document.getElementById('errorDestiny');

        if (destiny == "" || destiny == null) {
            errorDestiny.classList.remove("hidden");
            document.getElementById('destiny').classList.add("errorInput");
            returnValidation = false;
        } else {
            errorDestiny.classList.add("hidden");
            document.getElementById('destiny').classList.remove("errorInput");
        }

        return returnValidation;

    }


    static principalSendMail(response) {
        console.log(response.data);
        swal("Mensaje Enviado", "Gracias por contactarnos", "success");
        this.principal.reset();
    }

    resetInputComplete() {
        this.value = "";
    }

    autoCompleteInput() {
        new autoComplete({
            selector: '#destiny', minChars: 2,
            source: function (term, suggest) {
                term = term.toLowerCase();
                let choices = inputAuto.dataset.cities.split(', ');
                let matches = [];
                for (let i = 0; i < choices.length; i++)
                    if (~choices[i].toLowerCase().indexOf(term)) matches.push(choices[i]);
                suggest(matches);
            }
        });
    }

    getInfoFormPrincipal(ev) {
        ev.preventDefault();
        console.log(ev);
        const self = this
        ev.preventDefault();
        if (self.validationForm()) {
            axios.post(site + '/principal', serialize(this.principal))
                .then(Principal.setInfoForm);
        } else {
            swal("Revise los campos en rojo", "Gracias por contactarnos", "error");
        }

    }

    static setInfoForm(response) {
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
            html = `<li> <b>Origen: </b> ${data.travel[0]}</li>`;

        document.getElementById('price').value = data.travelValue;
        document.getElementById('priceDisabled').value = data.travelValue;

        html += `<li> <b>Destino:  </b> ${data.travel[1]}</li>`;
        html += `<li> <b>Tipo de vehiculo: </b> ${carText}</li>`;
        html += `<li> <b>Distancia total: </b> ${data.travel[3]}</li>`;
        html += `<li> <b>Desde el: </b> ${init}</li>`;
        html += `<li> <b>Hasta el: </b> ${end}</li>`;

        infoTravel.innerHTML = html;
    }


}
