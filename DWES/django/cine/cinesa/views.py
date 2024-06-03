from django.views.generic import ListView, DetailView
from django.views.generic.edit import FormView
from django.urls import reverse_lazy
from .models import Director, Pelicula
from .form import FormularioDirector, FormularioPelicula
from rest_framework import viewsets
from .serializers import DirectorSerializer, PeliculaSerializer
# Create your views here.

class ListaDirectoresView(ListView):
    model = Director
    template_name = 'cinesa/listadirectores.html'
    context_object_name = 'directores'
    paginate_by = 2

class DetalleDirectorView(DetailView):
    model = Director
    template_name = 'cinesa/detalledirector.html'
    context_object_name = 'director'

    def get_context_data(self, **kwargs):
        context = super().get_context_data(**kwargs)
        context["peliculas"] = self.object.pelicula_set.all()
        return context
    
class DetallePeliculaView(DetailView):
    model = Pelicula
    template_name = 'cinesa/detallepelicula.html'
    context_object_name = 'pelicula'

class FormularioDirectorView(FormView):
    form_class = FormularioDirector
    template_name = 'cinesa/formulariodirector.html'
    success_url = reverse_lazy('cinesa:listadirectores')

    def form_valid(self, form):
        form.save()
        return super().form_valid(form)
    
class FormularioPeliculaView(FormView):
    form_class = FormularioPelicula
    template_name = 'cinesa/formulariopelicula.html'
    success_url = reverse_lazy('cinesa:listadirectores')

    def get_context_data(self, **kwargs):
        pk_director = self.kwargs['pk']
        context = super().get_context_data(**kwargs)
        context["pk"] = pk_director
        return context
    

    def form_valid(self, form):
        pk_director = self.kwargs['pk']
        director = Director.objects.get(pk=pk_director)
        form.instance.director = director
        form.save()
        return super().form_valid(form)
    
class DirectorApiView(viewsets.ModelViewSet):
    queryset = Director.objects.all()
    serializer_class = DirectorSerializer

class PeliculaApiView(viewsets.ModelViewSet):
    queryset = Pelicula.objects.all()
    serializer_class = PeliculaSerializer