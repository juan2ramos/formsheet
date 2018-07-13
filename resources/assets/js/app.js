import PrincipalForm from './FormPrincipal';
import Business from './FormBusiness';
import onclick from './onclick';
import onselect from './onselect';

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
