from django.views import generic
from django.shortcuts import render
from django.db.models import Q

from .models import Producto

# Create your views here.

class IndexView(generic.ListView):
    model = Producto
    context_object_name = 'meses'
    template_name = 'frutaverdura/index.html'

def productos(request, mes):
    productos = Producto.objects.filter(
        Q(fecha_inicio__month__lte=mes,
        fecha_final__month__gte=mes) |
        Q(disponible=True)
    )

    return render(request, 'frutaverdura/productos.html', {'productos': productos})