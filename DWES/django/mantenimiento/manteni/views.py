from django.views.generic import ListView, DetailView
from rest_framework import viewsets
from .serializers import MantenimientoSerializer
from .models import Mantenimiento

# Create your views here.

class MantenimientosView(ListView):
    model = Mantenimiento
    context_object_name = 'mantenimientos'
    template_name = 'manteni/index.html'

class MantenimientoDetail(DetailView):
    model = Mantenimiento
    context_object_name = 'mantenimiento'
    template_name = 'manteni/detail.html'

class ApiMantenimientoViewSet(viewsets.ModelViewSet):
    queryset = Mantenimiento.objects.all()
    serializer_class = MantenimientoSerializer