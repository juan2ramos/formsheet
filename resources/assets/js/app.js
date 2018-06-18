<<<<<<< HEAD
import numeral from "numeral";

var myNumeral = numeral(1000).format('$0,0.00');
console.log(myNumeral);
=======
import PrincipalForm from './FormPrincipal';

const principal = document.getElementById('formPrincipal');
if(principal){
  new PrincipalForm(principal);
}
>>>>>>> 2dfb625e619808f7f975bc0073552bbe1346923b
