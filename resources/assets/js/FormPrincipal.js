import axios from 'axios';
import serialize from 'form-serialize';

const site = document.getElementById('body').dataset.site,
    infoTravel = document.getElementById('infoTravel');

export default class Principal {
    constructor(principal) {
        this.principal = principal;
        principal.addEventListener('submit', this.getInfoFormPrincipal.bind(this));
    }

    getInfoFormPrincipal(ev) {
        ev.preventDefault();
        axios.post(site + '/principal', serialize(this.principal))
            .then(Principal.setInfoForm);
    }

    static setInfoForm(response) {
        const car = document.getElementById('car').text,
            init = document.getElementById('init').value,
            end = document.getElementById('init').value;

        let data = response.data,
            html = `<li> <b>Origen: </b> ${data.travel[0]}</li>`;

        document.getElementById('price').innerHTML = data.travelValue;

        html += `<li> <b>Destino:  </b> ${data.travel[1]}</li>`;
        html += `<li> <b>Tipo de vehiculo: </b> ${car}</li>`;
        html += `<li> <b>Distancia total: </b> ${data.travel[3]}</li>`;
        html += `<li> <b>Desde el: </b> ${init}</li>`;
        html += `<li> <b>Hasta el: </b> ${end}</li>`;

        infoTravel.innerHTML = html;

    }
}
