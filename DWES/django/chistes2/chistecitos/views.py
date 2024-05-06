from django.views import generic

from .models import Chiste

# Create your views here.

class IndexView(generic.ListView):
    model = Chiste
    template_name = 'chistecitos/index.html'
    context_object_name = 'chistes'