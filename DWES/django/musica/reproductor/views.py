from django.shortcuts import redirect, render
from django.core.paginator import Paginator
from .models import Cancion
from .forms import FormCancion

# Create your views here.

PAGINACION_CANCIONES = 4
NUMERO_PAGINA_INICIAL = 1
DIFFERENCE = 1

def IndexView(request):
    listado_canciones = Cancion.objects.all()
    paginator = Paginator(listado_canciones, 4)
    pagina_actual = request.GET.get("pagina") or 1
    canciones_paginadas = paginator.get_page(pagina_actual)

    numero_paginas = range(NUMERO_PAGINA_INICIAL, canciones_paginadas.paginator.num_pages + 1)
    return render(request, 'reproductor/index.html', {'canciones': canciones_paginadas, 'paginas': numero_paginas})

def obtenerCancion(request):
    if request.method == 'POST':
        form = FormCancion(request.POST, request.FILES)
        if form.is_valid() :
            form.save()
            return redirect('reproductor:index')
    else:
        form = FormCancion()

    return render(request, 'reproductor/index.html', {'form': form})