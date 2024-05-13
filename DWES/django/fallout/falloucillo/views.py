from django.views import generic
from .models import Personaje
from django.shortcuts import get_object_or_404

# Create your views here.

class IndexView(generic.ListView):
    model = Personaje
    context_object_name = 'personajes'
    template_name = 'falloucillo/index.html'

class PersonajeDetailView(generic.DetailView):
    model = Personaje
    context_object_name = 'personaje'
    template_name = 'falloucillo/detalle.html'

    def get_object(self):
        slug = self.kwargs.get('slug')
        return get_object_or_404(Personaje, slug=slug)