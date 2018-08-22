export default function(){
  const validator = document.getElementById('submitQuotation');
  const form = document.getElementById('quotationForm');

  validator.addEventListener('click', function(){

    var radio = form.haveService;

    if (radio[1].checked == false) {
      alert("mike te amo");
      return false;
    }
  })
    /*const carro = document.getElementById('car');
  const imgCar = document.getElementById('imgCar');
  if (carro) {
    const url = carro.dataset.url;
    carro.addEventListener('change' , function(){
      const name = this.options[this.selectedIndex].dataset.name;
      imgCar.src = url + "/images/" + name + ".jpg";
    })
  }*/

}
