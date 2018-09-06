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
        // Mike tan lindo te amo
        let returnValidation = true

        const inputOrigin= document.getElementById('originAddress').value;
        const inputDestiny= document.getElementById('destinyAddress').value;
        const inputName = document.getElementById('name').value;
        const inputPhone = document.getElementById('phone').value;
        const inputEmail = document.getElementById('email').value;
        const errorDataPerson = document.getElementById('errorDataPerson');

        if (inputOrigin == "" || inputDestiny == "" || inputName == "" || inputPhone == "" || inputEmail == "") {
            errorDataPerson.classList.remove("hidden");
            document.getElementById('originAddress').classList.add("errorInput");
            document.getElementById('destinyAddress').classList.add("errorInput");
            document.getElementById('name').classList.add("errorInput");
            document.getElementById('phone').classList.add("errorInput");
            document.getElementById('email').classList.add("errorInput");
            returnValidation = false;
        } else {
            errorDataPerson.classList.add("hidden");
            document.getElementById('originAddress').classList.remove("errorInput");
            document.getElementById('destinyAddress').classList.remove("errorInput");
            document.getElementById('name').classList.remove("errorInput");
            document.getElementById('phone').classList.remove("errorInput");
            document.getElementById('email').classList.remove("errorInput");
        }

        return returnValidation;

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
