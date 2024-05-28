from django.views.generic import ListView, DetailView
from .models import Personaje
# Create your views here.

class ListaPersonajesView(ListView):
    model = Personaje
    template_name = 'falloutcin/personajes.html'
    context_object_name = 'personajes'

class DetallePersonajeView(DetailView):
    model = Personaje
    template_name = 'falloutcin/personaje.html'
    context_object_name = 'personaje'