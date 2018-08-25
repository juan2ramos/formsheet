import axios from "axios/index";
import anime from "animejs";
import serialize from "form-serialize";
import swal from "sweetalert";

const submitQuotation = document.getElementById('submitQuotation'),
  quotationForm = document.getElementById('quotationForm'),
  site = document.getElementById('body').dataset.site,
  scrollCoords = {
    y: window.pageYOffset
  };

export default class Business {
  constructor(business) {
    this.business = business;
    const self = this
    quotationForm.addEventListener('submit', this.getInfoFormBusiness.bind(this));
    submitQuotation.addEventListener('click', function (ev) {
      ev.preventDefault();
      if(self.validationForm()){
        axios.post(site + '/quotation', serialize(quotationForm))
          .then(Business.quotationSendMail);
      }else {
        swal("Reciba los campos en rojo", "Gracias por contactarnos", "error");
      }
    });
  }
  validationForm(){
    let returnValidation = true
    const radio = quotationForm.haveService;
    const errorService = document.getElementById('haveService');

    console.log(radio[1].checked);
      if ( !(radio[0].checked || radio[1].checked) ) {
        errorService.classList.remove("hidden");
        returnValidation = false;
      } else{
        errorService.classList.add("hidden");
      }
      return returnValidation;
    }

  getInfoFormBusiness(ev) {
    ev.preventDefault();
    this.business.setAttribute('disabled', true);
    let data = {
      origin: document.querySelector('input[name=origin]:checked').value,
      days: document.querySelector('input[name=days]:checked').value,
      car: document.querySelector('#car').value,
      _token: document.querySelector('input[name=_token]').value,
    };
    axios.post(site + '/ruta-empresarial', data)
      .then(this.quotationSend.bind(this));
  }

  quotationSend(response) {
    this.business.removeAttribute('disabled');
    document.querySelector('#price').value = response.data;
    document.querySelector('#priceDisabled').value = response.data;
    document.querySelector('#UserData').classList.remove('is-hidden');
    anime({
      targets: scrollCoords,
      y: 800,
      duration: 350,
      easing: 'easeInOutCubic',
      update: () => window.scroll(0, scrollCoords.y)
    });

  }

  static quotationSendMail(response) {
    console.log(response);
    swal("Mensaje Enviado", "Gracias por contactarnos", "success");
    quotationForm.reset();
  }
}
