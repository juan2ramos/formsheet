import ajax from 'axios';
import axios from "axios/index";
import swal from "sweetalert";
import serialize from 'form-serialize';


const carEl = document.getElementById('car'),
    typeEl = document.getElementsByName('typeTransfer'),
    loadWrap = document.getElementById('loadWrap'),
    site = document.getElementById('body').dataset.site;

export default class Transfer {

    constructor(elForm) {
        this.calculate();
        this.form = elForm;
        elForm.addEventListener('submit', this.getInfoFormPrincipal.bind(this));
    }

    getInfoFormPrincipal(ev) {
        ev.preventDefault(ev);
        ev.preventDefault();
        if (Transfer.validationFormDataPerson()) {
            loadWrap.classList.add('show');
            axios.post(site + '/transferSubmit', serialize(this.form))
                .then(Transfer.submitForm.bind(this));
        } else {
            swal("Revise los campos en rojo", "Gracias por contactarnos", "error");
        }

    }

    static submitForm(response) {
        loadWrap.classList.remove('show');
        console.log(response.data)
    }

    static validationFormDataPerson() {
        // Mike
        return true;
    }

    calculate() {
        self = this;
        carEl.addEventListener('change', this.SendCalculate);
        typeEl.forEach(function (el) {
            el.addEventListener('click', self.SendCalculate)
        });
    }
    ;

    SendCalculate() {
        const data = {
            car: carEl.value,
            type: document.querySelector('input[name="typeTransfer"]:checked').value
        };
        loadWrap.classList.add('show');
        ajax.post(site + '/transferCalculate', data)
            .then(Transfer.responseCalculate.bind(this));

    }

    static responseCalculate(response) {
        loadWrap.classList.remove('show');
        document.getElementById('infoBox').innerText = response.data.price;
    }

}
