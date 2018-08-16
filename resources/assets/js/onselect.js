export default function(){
  const carro = document.getElementById('car');
  const imgCar = document.getElementById('imgCar');
  if (carro) {
    const url = carro.dataset.url;
    carro.addEventListener('change' , function(){
      const name = this.options[this.selectedIndex].dataset.name;
      imgCar.src = url + "/images/" + name + ".jpg";
    })
  }
}
