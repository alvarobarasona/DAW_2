from django.views.generic import ListView, DetailView
from django.views.generic.edit import FormView
from django.urls import reverse_lazy, reverse
from rest_framework import viewsets
from .serializers import AutorSerializer, LibroSerializer
from .models import Autor, Libro
from .forms import FormularioAutor, FormularioLibro

# Create your views here.

class ListaAutoresView(ListView):
    model = Autor
    template_name = 'autorines/autoreslista.html'
    context_object_name = 'autores'
    paginate_by = 2

class FormularioAutorView(FormView):
    form_class = FormularioAutor
    template_name = 'autorines/formularioautor.html'
    success_url = reverse_lazy('autorines:autoreslista')

    def form_valid(self, form):
        form.save()
        return super().form_valid(form)
    
class DetalleAutorView(DetailView):
    model = Autor
    template_name = 'autorines/detalleautor.html'
    context_object_name = 'autor'

    def get_context_data(self, **kwargs):
        context = super().get_context_data(**kwargs)
        context["libros"] = self.object.libro_set.all()
        return context
    
class FormularioLibroView(FormView):
    form_class = FormularioLibro
    template_name = 'autorines/formulariolibro.html'

    def get_context_data(self, **kwargs):
        slug_autor = self.kwargs['text']
        context = super().get_context_data(**kwargs)
        context["slug_autor"] = slug_autor
        return context
    
    def form_valid(self, form):
        slug_autor = self.kwargs['text']
        autor = Autor.objects.get(slug=slug_autor)
        form.instance.autor = autor
        form.save()
        return super().form_valid(form)
    
    def get_success_url(self) -> str:
        return reverse('autorines:detalleautor', kwargs={'slug': self.kwargs['text']})
    
class DetalleLibroView(DetailView):
    model = Libro
    template_name = 'autorines/detallelibro.html'
    context_object_name = 'libro'

class AutorApiView(viewsets.ModelViewSet):
    queryset = Autor.objects.all()
    serializer_class = AutorSerializer

class LibroApiView(viewsets.ModelViewSet):
    queryset = Libro.objects.all()
    serializer_class = LibroSerializer