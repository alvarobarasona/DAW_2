from django.views.generic import ListView, DetailView
from django.views.generic.edit import FormView
from django.urls import reverse_lazy, reverse
from .models import Club, Producto
from .forms import FormularioClub, FormularioProducto
from rest_framework import viewsets
from .serializers import ClubSerializer, ProductoSerializer

# Create your views here.

class ListaClubesView(ListView):
    model = Club
    template_name = 'asocis/listaclubes.html'
    context_object_name = 'clubes'

class FormularioClubView(FormView):
    form_class = FormularioClub
    template_name = 'asocis/formularioclub.html'
    success_url = reverse_lazy('asocis:listaclubes')

    def form_valid(self, form):
        form.save()
        return super().form_valid(form)
    
class DetalleClubView(DetailView):
    model = Club
    template_name = 'asocis/detalleclub.html'
    context_object_name = 'club'

    def get_context_data(self, **kwargs):
        context = super().get_context_data(**kwargs)
        context["productos"] = self.object.producto_set.all()
        return context
    
class FormularioProductoView(FormView):
    form_class = FormularioProducto
    template_name = 'asocis/formularioproducto.html'

    def get_context_data(self, **kwargs):
        slug_club = self.kwargs['text']  
        context = super().get_context_data(**kwargs)
        context["slug_club"] = slug_club
        return context
    
    def form_valid(self, form):
        slug_club = self.kwargs['text']
        club = Club.objects.get(slug=slug_club)
        form.instance.club = club
        form.save()
        return super().form_valid(form)
    

    def get_success_url(self) -> str:
        return reverse('asocis:detalleclub', kwargs={'slug': self.kwargs['text']})
    
class DetalleProductoView(DetailView):
    model = Producto
    template_name = 'asocis/detalleproducto.html'
    context_object_name = 'producto'

class ClubApiView(viewsets.ModelViewSet):
    queryset = Club.objects.all()
    serializer_class = ClubSerializer

class ProductoApiView(viewsets.ModelViewSet):
    queryset = Producto.objects.all()
    serializer_class = ProductoSerializer