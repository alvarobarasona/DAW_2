from django.urls import reverse_lazy
from django.views.generic import DetailView, ListView
from django.views.generic.edit import FormView
from .models import Coche
from .form import FormularioCoches

# Create your views here.

class ListaCochesView(ListView):
    model = Coche
    context_object_name = 'coches'
    template_name = 'cochines/lista.html'
    paginate_by = 3
    
class CocheDetalleView(DetailView):
    model = Coche
    template_name = 'cochines/detalle.html'
    context_object_name = 'coche'

class FormularioCochesView(FormView):
    form_class = FormularioCoches
    template_name = 'cochines/form.html'
    success_url = reverse_lazy('cochines:lista')

    def form_valid(self, form):
        form.save()
        return super().form_valid(form)
    