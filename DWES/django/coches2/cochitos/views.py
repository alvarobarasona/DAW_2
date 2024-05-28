from django.views.generic import ListView
from django.views.generic.edit import FormView
from django.urls import reverse_lazy
from django.shortcuts import render
from .models import Coche
from .forms import FormularioSueldo

# Create your views here.

class ListaCochesView(ListView):
    model = Coche
    template_name = 'cochitos/index.html'
    context_object_name = 'coches'

class FormularioView(FormView):
    model = Coche
    form_class = FormularioSueldo
    success_url = reverse_lazy('cochitos:formulario')
    template_name = 'cochitos/formulario.html'

    def form_valid(self, form):
        sueldo = form.cleaned_data['sueldo']
        alquiler = form.cleaned_data['alquiler']
        gastos = form.cleaned_data['gastos']
        
        coches = Coche.objects.all()

        for coche in coches:
            dinero = 0
            meses = 0
            anios = 0
            while dinero < coche.precio:
                dinero += sueldo - (alquiler + gastos)
                meses += 1
                if meses == 12:
                    anios += 1
                    meses = 0

            coche.anios = anios
            coche.meses = meses
            coche.save()

        return render(self.request, 'cochitos/formulario.html', {'coches': coches})