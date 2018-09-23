import PrincipalForm from './FormPrincipal';
import Business from './FormBusiness';
import onclick from './onclick';
import onselect from './onselect';
import futureDate from './futureDate'
import Transfer from './Transfer'
import DoorForm from './DoorForm'
import Date from './DateValidation'


const principal = document.getElementById('formPrincipal');
if (principal) {
    new PrincipalForm(principal);
}
const quotation = document.getElementById('quotation');
if (quotation) {
    new Business(quotation);
}

const transferForm = document.getElementById('transferForm');
if (transferForm) {
    new Transfer(transferForm);
}

const Door = document.getElementById('DoorForm');
if (Door) {
    new DoorForm(Door);
}

document.querySelectorAll('[type=date]').forEach(function (el) {
    futureDate(el)
});

document.querySelectorAll('[name=travel]').forEach(function (el) {
    const DateEnd = document.querySelector('#DateEnd');
    el.addEventListener('change', function () {
        if (el.value === "1") {
            DateEnd.classList.add('hidden')
        } else {
            DateEnd.classList.remove('hidden')
        }
    })
});

onclick();
onselect();
Date();
