from django.views import generic
from .models import Familia

# Create your views here.

class IndexView(generic.ListView):
    model = Familia
    context_object_name = 'familias'
    template_name = 'ciclillos/index.html'

class CiclosView(generic.DetailView):
    model = Familia
    context_object_name = 'familia'
    template_name = 'ciclillos/ciclos.html'