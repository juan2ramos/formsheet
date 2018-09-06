
export default function(el)
{
    let today = new Date(),
        dd = today.getDate(),
        mm = today.getMonth() + 1,
        yy = today.getFullYear();
    if (dd < 10) {
        dd = '0' + dd
    }
    if (mm < 10) {
        mm = '0' + mm
    }
    today = yy + '-' + mm + '-' + dd;
    el.setAttribute("min", today);
}
