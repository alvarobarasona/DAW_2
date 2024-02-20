function getNameOfMonth(numberMonth) {
    let monthName = "";
    switch (numberMonth) {
        case 1:
            monthName = "Enero";
            break;
        case 2:
            monthName = "Febrero";
            break;
        case 3:
            monthName = "Marzo";
            break;
        case 4:
            monthName = "Abril";
            break;
        case 5:
            monthName = "Mayo";
            break;
        case 6:
            monthName = "Junio";
            break;
        case 7:
            monthName = "Julio";
            break;
        case 8:
            monthName = "Agosto";
            break;
        case 9:
            monthName = "Septiembre";
            break;
        case 10:
            monthName = "Octubre";
            break;
        case 11:
            monthName = "Noviembre";
            break;
        case 12:
            monthName = "Diciembre";
        default:
            break;
    }
    return monthName;
}

function calculateDays() {
    let numberMonth = parseInt(document.getElementById("mes").value);
    if(numberMonth >= 1 && numberMonth <= 12) {
        let actualYear = new Date().getFullYear();
        let numberDaysOfMonth = new Date(actualYear, numberMonth, 0).getDate();
        let container = document.getElementById("resultado");
        container.innerHTML = `<p>Nombre del mes: ${getNameOfMonth(numberMonth)} | Número de días: ${numberDaysOfMonth}</p>`;
    }
}