from django.shortcuts import render
from django.views import generic
from .models import Chiste

# Create your views here.

class IndexView(generic.ListView):
    model = Chiste
    context_object_name = 'chistes'
    template_name = 'chistitos/index.html'
    paginate_by = 3

class DetailView(generic.DetailView):
    model = Chiste
    context_object_name = 'chiste'
    template_name = 'chistitos/detail.html'