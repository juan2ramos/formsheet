import swal from "sweetalert";

const initDate = document.querySelector('#init');
const endDate = document.querySelector('#end');

export default function () {

    if (endDate) {
        initDate.addEventListener('change', validate);
        endDate.addEventListener('change', validate);
    }
}

function validate() {
    const init = new Date(initDate.value.replace('-', ",")),
        end = new Date(endDate.value.replace('-', ","));

    if ((init > end) || !initDate.value) {
        endDate.value = '';
        swal("¡upss!", 'La fecha final debe ser igual o mayor a la fecha final', 'error')
    }
    console.log(initDate.value)
}