from django.views.generic import ListView, DetailView
from django.views.generic.edit import FormView
from django.urls import reverse_lazy, reverse
from .form import FormularioPreguntas, FormularioRespuestas
from .models import Pregunta

# Create your views here.

class FormularioPreguntasView(FormView):
    form_class = FormularioPreguntas
    template_name = 'encuestillas/formulario_pregunta.html'
    success_url = reverse_lazy('encuestillas:listapreguntas')
    
    def form_valid(self, form):
        form.save()
        return super().form_valid(form)

class ListaPreguntasView(ListView):
    model = Pregunta
    template_name = 'encuestillas/lista_preguntas.html'
    context_object_name = 'preguntas'

class DetallePreguntaView(DetailView):
    model = Pregunta
    template_name = 'encuestillas/pregunta_detalle.html'
    context_object_name = 'pregunta'

    def post(self, request, *args, **kwargs):
        
        

class FormularioRespuestasView(FormView):
    form_class = FormularioRespuestas
    template_name = 'encuestillas/formulario_respuesta.html'

    def get_context_data(self, **kwargs):
        pk_pregunta = self.kwargs['pk']
        context = super().get_context_data(**kwargs)
        context["pk"] = pk_pregunta
        return context

    def form_valid(self, form):
        pk_pregunta = self.kwargs['pk']
        pregunta = Pregunta.objects.get(pk=pk_pregunta)
        form.instance.pregunta = pregunta
        form.save()
        return super().form_valid(form)
    
    def get_success_url(self) -> str:
        return reverse('encuestillas:detallepregunta', kwargs={'pk': self.kwargs['pk']})
    