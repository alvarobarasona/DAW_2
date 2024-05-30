from django.views.generic import ListView, DetailView
from .models import Obra
from rest_framework import viewsets
from .serializers import ObraSerializer

# Create your views here.

class ListaObrasView(ListView):
    model = Obra
    context_object_name = 'obras'
    template_name = 'obras/lista.html'

class DetalleObraView(DetailView):
    model = Obra
    context_object_name = 'obra'
    template_name = 'obras/detalle.html'

class ObraApiView(viewsets.ModelViewSet):
    queryset = Obra.objects.all()
    serializer_class = ObraSerializer