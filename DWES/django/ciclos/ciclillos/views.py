from django.views import generic

from .models import Familia

# Create your views here.

class IndexView(generic.ListView):
    model = Familia
    template_name = 'ciclillos/index.html'
    context_object_name = 'familias'

class DetailsView(generic.DetailView):
    model = Familia
    template_name = 'ciclillos/detail.html'
    context_object_name = 'familia'