from django.views.generic import ListView, DetailView
from django.views.generic.edit import FormView
from django.urls import reverse_lazy
from django.shortcuts import render
from .models import Coche
from .forms import FormularioCoche, FormularioRenta
from rest_framework import viewsets
from .serializers import CocheSerializer

# Create your views here.

class ListaCochesView(ListView):
    model = Coche
    template_name = 'cochillos/listacoches.html'
    context_object_name = 'coches'
    paginate_by = 3

class FormularioCocheView(FormView):
    form_class = FormularioCoche
    template_name = 'cochillos/formulariocoche.html'
    success_url = reverse_lazy('cochillos:listacoches')

    def form_valid(self, form):
        form.save()
        return super().form_valid(form)
    
class DetalleCocheView(DetailView):
    model = Coche
    template_name = 'cochillos/detallecoche.html'
    context_object_name = 'coche'

class FormularioRentaView(FormView):
    form_class = FormularioRenta
    template_name = 'cochillos/formulariorenta.html'
    
    def form_valid(self, form):
        salario = form.cleaned_data['salario']
        gastos = form.cleaned_data['gastos']
        alquiler = form.cleaned_data['alquiler']

        ganancia_mensual = salario - (gastos + alquiler)

        coches = Coche.objects.all()

        for coche in coches:
            anios = 0
            meses = 0
            dinero = 0
            while dinero < coche.precio:
                dinero += ganancia_mensual
                meses += 1
                if meses == 12:
                    anios += 1
                    meses = 0
            
            coche.anios = anios
            coche.meses = meses
        
        return render(self.request, 'cochillos/formulariorenta.html', {'coches': coches, 'form': form})

class CocheApiView(viewsets.ModelViewSet):
    queryset = Coche.objects.all()
    serializer_class = CocheSerializer