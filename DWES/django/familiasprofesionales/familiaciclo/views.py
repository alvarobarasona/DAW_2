from django.shortcuts import render
from django.views import generic
from .models import Familia, Ciclo

# Create your views here.

class IndexView(generic.ListView):
    model = Familia
    context_object_name = 'familias'
    template_name = 'familiaciclo/index.html'

class DetailView(generic.DetailView):
    model = Familia
    context_object_name = 'familia'
    template_name = 'familiaciclo/detail.html'