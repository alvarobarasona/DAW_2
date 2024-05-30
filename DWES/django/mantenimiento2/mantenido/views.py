#IMPORTANTE: PARA QUE FUNCIONE TIENES QUE AÑADIR rest_framework  A LA LISTA INSTALLED_APPS DEL ARCHIVO settings.py

from django.views.generic import ListView, DetailView
from rest_framework import viewsets
from .serializers import MantenimientoSerializer, EdificioSerializer, TecnicoSerializer
from .models import Mantenimiento, Edificio, Tecnico

# Create your views here.

class ListaMantenimientosView(ListView):
    model = Mantenimiento
    template_name = 'mantenido/lista.html'
    context_object_name = 'mantenimientos'
    paginate_by = 1

class DetalleMantenimientoView(DetailView):
    model = Mantenimiento
    template_name = 'mantenido/detalle.html'
    context_object_name = 'mantenimiento'

class MantenimientoApiView(viewsets.ModelViewSet):
    queryset = Mantenimiento.objects.all()
    serializer_class = MantenimientoSerializer

class EdificioApiView(viewsets.ModelViewSet):
    queryset = Edificio.objects.all()
    serializer_class = EdificioSerializer

class TecnicoApiView(viewsets.ModelViewSet):
    queryset = Tecnico.objects.all()
    serializer_class = TecnicoSerializer