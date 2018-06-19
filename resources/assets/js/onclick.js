export default function(){
  const moreInfo = document.querySelectorAll('.moreInfo'),
  infoBox = document.getElementById('infoBox');
  if (moreInfo) {
    moreInfo.forEach(function(el){
      el.addEventListener('click', function(){
        const textInfo = this.dataset.content;
        infoBox.innerText = textInfo;
        console.log(textInfo);
      })
    })
    console.log(moreInfo);
  }
}
