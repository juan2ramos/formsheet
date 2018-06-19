import PrincipalForm from './FormPrincipal';
import Business from './FormBusiness';

const principal = document.getElementById('formPrincipal');
if (principal) {
  new PrincipalForm(principal);
}
const quotation = document.getElementById('quotation');
if (quotation) {
  new Business(quotation);
}