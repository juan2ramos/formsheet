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

    quotationForm.addEventListener('submit', this.getInfoFormBusiness.bind(this));
    submitQuotation.addEventListener('click', function (ev) {
      ev.preventDefault();
      axios.post(site + '/quotation', serialize(quotationForm))
        .then(Business.quotationSendMail);
    });
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
