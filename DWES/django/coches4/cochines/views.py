from django.urls import reverse_lazy
from django.views.generic import DetailView, ListView
from django.views.generic.edit import FormView
from django.shortcuts import render
from .models import Coche
from .form import FormularioCoches, FormularioDinero

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
    
class FormularioDineroView(FormView):
    form_class = FormularioDinero
    template_name = 'cochines/formulario_dinero.html'
    
    def form_valid(self, form):
        salario = form.cleaned_data['salario']
        alquiler = form.cleaned_data['alquiler']
        gastos = form.cleaned_data['gastos']

        coches = Coche.objects.all()

        for coche in coches:
            dinero = 0
            anos = 0
            meses = 0
            while dinero < coche.precio:
                dinero += salario - (alquiler + gastos)
                meses += 1

                if meses == 12:
                    anos += 1
                    meses = 0

            coche.meses = meses
            coche.anos = anos

        return render(self.request, 'cochines/formulario_dinero.html', {'coches': coches, 'form': form})
    
    