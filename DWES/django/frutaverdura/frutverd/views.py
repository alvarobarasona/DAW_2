from typing import Any
from django.db.models.query import QuerySet
from django.shortcuts import render
from django.views import generic
from django.db.models import Q
from .models import Producto

# Create your views here.

class IndexView(generic.ListView):
    #model = Producto
    template_name = 'frutverd/index.html'
    #context_object_name = 'productos'
    context_object_name = 'meses'
    """
    def get_context_data(self, **kwargs):
        meses = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre']
        context = super().get_context_data(**kwargs)
        context['meses'] = meses
        return context
    """

    def get_queryset(self):
        month = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre']
        return month

    
class ProductView(generic.ListView):
    template_name = 'frutverd/detail.html'
    context_object_name = 'productos'

    def get_queryset(self):
        mes = self.kwargs['mes']
        return Producto.objects.filter(
            Q(fecha_inicio__month__lte=mes,
            fecha_final__month__gte=mes) |
            Q(disponible=True)
        )