from django.views.generic import ListView, DetailView
from django.views.generic.edit import FormView
from django.urls import reverse_lazy
from rest_framework import viewsets
from .serializers import PersonaSerializer, CocheSerializer
from .models import Persona, Coche
from .form import FormularioPersona, FormularioCoche

# Create your views here.

class ListaPersonasView(ListView):
    model = Persona
    template_name = 'concesi/listapersonas.html'
    context_object_name = 'personas'
    paginate_by = 2

class FormularioPersonaView(FormView):
    form_class = FormularioPersona
    template_name = 'concesi/formulariopersona.html'
    success_url = reverse_lazy('concesi:listapersonas')

    def form_valid(self, form):
        form.save()
        return super().form_valid(form)
    
class DetallePersonaView(DetailView):
    model = Persona
    template_name = 'concesi/detallepersona.html'
    context_object_name = 'persona'

    def get_context_data(self, **kwargs):
        context = super().get_context_data(**kwargs)
        context["coches"] = self.object.coche_set.all()
        return context
    
class FormularioCocheView(FormView):
    form_class = FormularioCoche
    template_name = 'concesi/formulariocoche.html'
    success_url = reverse_lazy('concesi:listapersonas')

    def get_context_data(self, **kwargs):
        pk_persona = self.kwargs['pk']
        context = super().get_context_data(**kwargs)
        context["pk_persona"] = pk_persona
        return context
    
    def form_valid(self, form):
        pk_persona = self.kwargs['pk']
        persona = Persona.objects.get(pk=pk_persona)
        form.instance.persona = persona
        form.save()
        return super().form_valid(form)
    
class DetalleCocheView(DetailView):
    model = Coche
    template_name = 'concesi/detallecoche.html'
    context_object_name = 'coche'

class PersonaApiView(viewsets.ModelViewSet):
    queryset = Persona.objects.all()
    serializer_class = PersonaSerializer

class CocheApiView(viewsets.ModelViewSet):
    queryset = Coche.objects.all()
    serializer_class = CocheSerializer