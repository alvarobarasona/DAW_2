from django.views import generic
from .models import Chiste

# Create your views here.

class IndexView(generic.ListView):
    model = Chiste
    context_object_name = 'chistes'
    template_name = 'chistacos/index.html'