import PrincipalForm from './FormPrincipal';
import axios from "axios/index";
import serialize from "form-serialize";
import anime from 'animejs';
import swal from 'sweetalert';
import autoComplete from './AutoComplete';


const inputAuto = document.querySelector('#destiny');
if (inputAuto) {
    inputAuto.addEventListener('click', function () {
        this.value = "";
    });
    new autoComplete({
        selector: '#destiny', minChars: 2,
        source: function (term, suggest) {
            term = term.toLowerCase();
            let choices = ['ActionScript', 'AppleScript', 'Asp'];
            let matches = [];
            for (let i = 0; i < choices.length; i++)
                if (~choices[i].toLowerCase().indexOf(term)) matches.push(choices[i]);
            suggest(matches);
        }
    });
}


const principal = document.getElementById('formPrincipal');
const site = document.getElementById('body').dataset.site;
if (principal) {
    new PrincipalForm(principal);
}
const quotation = document.getElementById('quotation');

if (quotation) {
    quotation.addEventListener('click', function (ev) {
        ev.preventDefault();
        this.setAttribute('disabled', true);
        let data = {
            origin: document.querySelector('input[name=origin]:checked').value,
            days: document.querySelector('input[name=days]:checked').value,
            car: document.querySelector('#car').value,
            _token: document.querySelector('input[name=_token]').value,
        };
        axios.post(site + '/ruta-empresarial', data)
            .then(quotationSend);
    })
}

function quotationSend(response) {
    quotation.removeAttribute('disabled');
    document.querySelector('#price').value = response.data;
    document.querySelector('#priceDisabled').value = response.data;
    document.querySelector('#UserData').classList.remove('is-hidden');
    const scrollCoords = {
        y: window.pageYOffset
    };
    anime({
        targets: scrollCoords,
        y: 800,
        duration: 350,
        easing: 'easeInOutCubic',
        update: () => window.scroll(0, scrollCoords.y)
    });

}

const submitQuotation = document.getElementById('submitQuotation');
const quotationForm = document.getElementById('quotationForm');
if (quotationForm) {
    submitQuotation.addEventListener('click', function (ev) {
        ev.preventDefault();
        axios.post(site + '/quotation', serialize(quotationForm))
            .then(quotationSendMail);
    });
}

function quotationSendMail(response) {
    console.log(response)
    swal("Mensaje Enviado", "Gracias por contactarnos", "success");
    quotationForm.reset();
}
