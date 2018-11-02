import ajax from 'axios';
import axios from "axios/index";
import swal from "sweetalert";
import serialize from 'form-serialize';
import anime from "animejs";
import Principal from "./FormPrincipal";

const availability = document.getElementById('availability'),
    loadWrap = document.getElementById('loadWrap'),
    site = document.getElementById('body').dataset.site,
    tables = document.getElementById('tables'),
    IdDoorForm = document.getElementById('IdDoorForm'),
    scrollCoords = {
        y: window.pageYOffset
    };

export default class DoorForm {

    constructor(elForm) {
        this.elForm = elForm;
        availability.addEventListener('click', this.getTravels.bind(this));
        elForm.addEventListener('submit', this.submit.bind(this));
    }

    submit(ev) {
        ev.preventDefault();
        if (DoorForm.validationFormDataPerson()) {
            loadWrap.classList.add('show');
            axios.post(site + '/getTravelsDoorSend', serialize(this.elForm))
                .then(DoorForm.principalSendMail.bind(this));
        } else {
            swal("Revise los campos en rojo", "Gracias por contactarnos", "error");
        }
    }
    static principalSendMail(response) {
        loadWrap.classList.remove('show');
        console.log(response.data);
        swal("Mensaje Enviado", "Gracias por contactarnos", "success");
        this.elForm.reset();
    }

    getTravels() {

        if (DoorForm.validationFormDataPerson()) {
            loadWrap.classList.add('show');
            axios.post(site + '/getTravelsDoor', serialize(this.elForm))
                .then(DoorForm.submitForm).catch(DoorForm.error);
        } else {
            swal("Revise los campos en rojo", "Gracias por contactarnos", "error");
        }

    }

    static validationFormDataPerson() {
        // Mike
        return true;
    }

    static submitForm(response) {

        loadWrap.classList.remove('show');
        const travelsObject = Object.keys(response.data.travels);
      console.log(response.data.travels)
        if (travelsObject.length) {
            document.querySelector('#UserData').classList.remove('is-hidden');
            anime({
                targets: scrollCoords,
                y: 800,
                duration: 350,
                easing: 'easeInOutCubic',
                update: () => window.scroll(0, scrollCoords.y)
            });

            let html = "";
            for (let i = 0; i < travelsObject.length; i++) {
                html += "<div class=\"col-16 col-m-16  m-t-8\">" +
                    "                        <table class=\"is-text-center\">" +
                    "                            <thead>" +
                    "                            <tr>" +
                    "                                <th></th>" +
                    "                                <th>Horarios</th>" +
                    "                                <th>Puestos</th>" +
                    "                            </tr>" +
                    "                            </thead>" +
                    "                            <tbody>" +
                    "                            <tr>" +
                    "                                <td>" +
                    "                                    <input id='politicas" + i + "' type=\"radio\" name=\"hour\" value=\"\">" +
                    "                                    <label for='politicas" + i + "'></label>" +
                    "                                </td>\n" +
                    "                                <td>" + response.data.travels[travelsObject[i]][2] + "</td>" +
                    "                                <td>" + response.data.travels[travelsObject[i]][3] + "</td>" +
                    "                            </tr>" +
                    "                            </tbody>" +
                    "                        </table>" +
                    "                    </div>"
            }
            tables.innerHTML = html;

        } else {
            document.querySelector('#UserData').classList.add('is-hidden');
            swal("0 viajes disponibles", "Busca con otra fecha ", "warning");
        }

    }

    static error(response) {
        loadWrap.classList.remove('show');
        swal("¡upss!", "Algo ha salido mal, recarga la página y vuelve a intentarlo", "error");
    }

}
