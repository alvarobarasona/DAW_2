from django.views import generic
from .models import Familia, Ciclo

# Create your views here.

class ViewFamilia(generic.ListView):
    model = Familia
    context_object_name = 'familias'
    template_name = 'ciclotes/index.html'

class ViewCiclo(generic.DetailView):
    model = Familia
    context_object_name = 'ciclos'
    template_name = 'ciclotes/ciclos.html'