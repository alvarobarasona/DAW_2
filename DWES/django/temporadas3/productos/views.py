from django.views.generic import ListView, TemplateView
from django.db.models import Q
from .models import Producto
# Create your views here.

class MesesView(TemplateView):
    template_name = 'productos/index.html'

    def get_context_data(self, **kwargs):
        context = super().get_context_data(**kwargs)
        context['meses'] = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre']
        return context

class ProductosView(ListView):
    template_name = 'productos/detail.html'
    context_object_name = 'productos'

    def get_queryset(self):
        mes = int(self.kwargs.get('mes'))
                
        return Producto.objects.filter(
            Q(fecha_inicio__month__lte=mes,
            fecha_final__month__gte=mes) |
            Q(disponible=True)
        )

"""
def ProductosView(request, mes):
    productos = Producto.objects.filter(
        Q(fecha_inicio__month__lte=mes,
        fecha_final__month__gte=mes) |
        Q(disponible=True)
    )
    return render(request, 'productos/detail.html', {'productos': productos})
"""