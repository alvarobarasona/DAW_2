from django.views.generic import ListView, DetailView
from django.views.generic.edit import FormView
from django.urls import reverse_lazy, reverse
from .models import Cliente, Videojuego
from .forms import FormularioCliente, FormularioVideojuego
from rest_framework import viewsets
from .serializers import ClienteSerializer, VideojuegoSerializer

# Create your views here.

class ListaClientesView(ListView):
    model = Cliente
    template_name = 'jueguitos/listaclientes.html'
    context_object_name = 'clientes'
    paginate_by = 2

class FormularioClienteView(FormView):
    form_class = FormularioCliente
    template_name = 'jueguitos/formulariocliente.html'
    success_url = reverse_lazy('jueguitos:listaclientes')

    def form_valid(self, form):
        form.save()
        return super().form_valid(form)

class DetalleClienteView(DetailView):
    model = Cliente
    template_name = 'jueguitos/detallecliente.html'
    context_object_name = 'cliente'

    def get_context_data(self, **kwargs):
        context = super().get_context_data(**kwargs)
        context["videojuegos"] = self.object.videojuego_set.all()
        return context
    
class FormularioVideojuegoView(FormView):
    form_class = FormularioVideojuego
    template_name = 'jueguitos/formulariovideojuego.html'

    def get_context_data(self, **kwargs):
        slug_cliente = self.kwargs['text']      
        context = super().get_context_data(**kwargs)
        context["slug_cliente"] = slug_cliente
        return context
    
    def form_valid(self, form):
        slug_cliente = self.kwargs['text']
        cliente = Cliente.objects.get(slug=slug_cliente)
        form.instance.cliente = cliente
        form.save()
        return super().form_valid(form)
    
    def get_success_url(self) -> str:
        return reverse('jueguitos:detallecliente', kwargs={'slug': self.kwargs['text']})
    
class DetalleVideojuegoView(DetailView):
    model = Videojuego
    template_name = 'jueguitos/detallevideojuego.html'
    context_object_name = 'videojuego'

class ClienteApiView(viewsets.ModelViewSet):
    queryset = Cliente.objects.all()
    serializer_class = ClienteSerializer

class VideojuegoApiView(viewsets.ModelViewSet):
    queryset = Videojuego.objects.all()
    serializer_class = VideojuegoSerializer