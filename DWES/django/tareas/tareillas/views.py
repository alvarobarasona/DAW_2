from django.views.generic import ListView, DetailView
from django.views.generic.edit import CreateView, UpdateView, DeleteView
from django.urls import reverse_lazy
from .forms import FormularioTarea
from .models import Tarea

# Create your views here.

class ListaTareasView(ListView):
    model = Tarea
    context_object_name = 'tareas'
    template_name = 'tareillas/lista.html'

class DetalleTareaView(DetailView):
    model = Tarea
    context_object_name = 'tarea'
    template_name = 'tareillas/detalle.html'

class CrearTareaView(CreateView):
    model = Tarea
    form_class = FormularioTarea
    #Si no se define el form_class hay que indicarle a las clases del paquete edit los campos con el fields
    """
    fields = ['titulo', 'descripcion', 'fecha_vencimiento', 'prioridad', 'estado']
    """
    #El comportamiento por defecto es que el nombre del template sea tarea_form.html(nombre de la clase en minúsculas concatenado con _form) si no se le indica template_name_suffix, en cuyo caso el nombre del template será el que se le indique

class ActualizarTareaView(UpdateView):
    model = Tarea 
    form_class = FormularioTarea

class BorrarTareaView(DeleteView):
    model = Tarea
    success_url = reverse_lazy('tareillas:lista')