from django.shortcuts import render
from django.views import generic
from .models import Familia

# Create your views here.

class IndexView(generic.ListView):
    model = Familia
    context_object_name = 'familias'
    template_name = 'familias/index.html'
    paginate_by = 2

class DetailView(generic.DetailView):
    model = Familia
    context_object_name = 'familia'
    template_name = 'familias/detail.html'