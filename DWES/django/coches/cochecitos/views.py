from typing import Any
from django.db.models.query import QuerySet
from django.shortcuts import render, redirect
from django.views.generic.edit import FormMixin
from django.views.generic import ListView
from .forms import Formulario
from .models import Coche

# Create your views here.

class IndexView(FormMixin, ListView):
    model = Coche
    context_object_name = 'coches'
    template_name = 'cochecitos/index.html'
    form_class = Formulario
    
    def get_context_data(self, **kwargs):
        context = super().get_context_data(**kwargs)
        context['form'] = self.get_form()
        return context

    def post(self, request, *args, **kwargs):
        form = self.get_form()
        if form.is_valid():
            sueldo = form.cleaned_data['salario']
            gastos = form.cleaned_data['gastos']
            alquiler = form.cleaned_data['alquiler']

            coches = self.get_queryset()
            self.object_list = coches
            context = self.get_context_data()

            for coche in coches:
                meses = 0
                anos = 0
                dinero = 0
                while dinero < coche.precio:
                    dinero += sueldo - (gastos + alquiler)
                    meses += 1
                    if meses == 12:
                        anos += 1
                        meses = 0
                    coche.anos = anos
                    coche.meses = meses
                    coche.save()

            return self.render_to_response(context)
        else:
            context = self.get_context_data(form=form)
            context['object_list'] = self.object_list
            return self.render_to_response(context)

        return render(request, 'cochecitos:index', {'form': form})