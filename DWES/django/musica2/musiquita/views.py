from django.views.generic import ListView
from django.views.generic.edit import FormView
from django.urls import reverse_lazy

from .models import Cancion
from .forms import FormCanciones

# Create your views here.

class Formulario(FormView):
    template_name = 'musiquita/form.html'
    form_class = FormCanciones
    success_url = reverse_lazy('musiquita:canciones')

    def form_valid(self, form):
        form.save()
        return super().form_valid(form)

class ListaCanciones(ListView):
    model = Cancion
    template_name = 'musiquita/canciones.html'
    context_object_name = 'canciones'
    paginate_by = 3