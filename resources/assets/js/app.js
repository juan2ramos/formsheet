import PrincipalForm from './FormPrincipal';
import Business from './FormBusiness';
import onclick from './onclick';
import onselect from './onselect';

import TinyDatePicker from 'tiny-date-picker';

const principal = document.getElementById('formPrincipal');
if (principal) {
  new PrincipalForm(principal);
}
const quotation = document.getElementById('quotation');
if (quotation) {
  new Business(quotation);
}
onclick()
onselect()


TinyDatePicker(document.querySelector('.inputDate'));
