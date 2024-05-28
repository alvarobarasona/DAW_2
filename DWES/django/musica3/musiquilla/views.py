from django.views.generic import ListView
from django.views.generic.edit import FormView, FormMixin
from django.urls import reverse_lazy
from .models import Cancion
from .form import FormularioCanciones

# Create your views here.

class ListaCancionesView(FormMixin, ListView):
    model = Cancion
    template_name = 'musiquilla/index.html'
    context_object_name = 'canciones'
    form_class = FormularioCanciones
    paginate_by = 3

class FormularioCancionesView(FormView):
    form_class = FormularioCanciones
    template_name = 'musiquilla/index.html'
    success_url = reverse_lazy('musiquilla:index')

    def form_valid(self, form):
        form.save()
        return super().form_valid(form)
    