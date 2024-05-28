from django.views.generic import ListView, DetailView, FormView
from django.urls import reverse_lazy
from .models import Receta
from .forms import FormularioReceta

# Create your views here.

class ListaRecetasView(ListView):
    model = Receta
    template_name = 'recetillas/lista.html'
    context_object_name = 'recetas'

class DetailRecetaView(DetailView):
    model = Receta
    template_name = 'recetillas/detail.html'
    context_object_name = 'receta'

class FormularioView(FormView):
    form_class = FormularioReceta
    template_name = 'recetillas/formulario.html'
    success_url = reverse_lazy('recetillas:index')

    def form_valid(self, form):
        form.save()
        return super().form_valid(form)

        

        