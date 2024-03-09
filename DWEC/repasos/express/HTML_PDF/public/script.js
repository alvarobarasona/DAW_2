document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('descargarPDF').addEventListener('click', function () {
        const elemento = document.getElementById('contenidoParaConvertir');
        html2pdf().from(elemento).save();
    });
});

