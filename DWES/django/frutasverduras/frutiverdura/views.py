from typing import Any
from django.shortcuts import render
from django.views import generic
from django.db.models import Q
from .models import Producto

# Create your views here.

class IndexView(generic.ListView):
    model = Producto
    template_name = 'frutiverdura/index.html'

    def get_context_data(self, **kwargs):
        meses = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre']
        context = super().get_context_data(**kwargs)
        context['meses'] = meses
        return context
    
def productos(request, mes):
    productos = Producto.objects.filter(
        Q(fecha_inicio__month__lte=mes,
        fecha_final__month__gte=mes) |
        Q(disponible=True)
    )
    return render(request, 'frutiverdura/detail.html', {'productos': productos})