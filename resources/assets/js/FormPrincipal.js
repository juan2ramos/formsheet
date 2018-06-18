import axios from 'axios';
import serialize from 'form-serialize';

const site = document.getElementById('body').dataset.site;

export default class Principal{
  constructor(principal) {
    this.principal = principal;
    principal.addEventListener('submit', this.getInfoFormPrincipal);
  }
  getInfoFormPrincipal(ev) {
    ev.preventDefault();
    console.log(this);
    axios.post(site + '/principal', serialize(this.principal))
      .then(setInfoForm);
  }
}

function setInfoForm(response) {
  console.log(response.data);
}