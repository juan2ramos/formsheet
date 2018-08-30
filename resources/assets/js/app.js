import PrincipalForm from './FormPrincipal';
import Business from './FormBusiness';
import onclick from './onclick';
import onselect from './onselect';
import futureDate from './futureDate'


const principal = document.getElementById('formPrincipal');
if (principal) {
    new PrincipalForm(principal);
}
const quotation = document.getElementById('quotation');
if (quotation) {
    new Business(quotation);
}

document.querySelectorAll('[type=date]').forEach(function (el) {
    futureDate(el)
});

onclick()
onselect()
