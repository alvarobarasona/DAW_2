from django.views.generic import ListView, DetailView
from django.views.generic.edit import FormView, FormMixin
from django.urls import reverse
from .models import Meme
from .form import FormularioComentario

# Create your views here.

class ListaMemesView(ListView):
    model = Meme
    template_name = 'memillos/lista.html'
    context_object_name = 'memes'

class MemeDetalleView(FormMixin, DetailView):
    model = Meme
    template_name = 'memillos/detalle.html'
    context_object_name = 'meme'
    form_class = FormularioComentario

    def get_context_data(self, **kwargs):
        context = super().get_context_data(**kwargs)
        context['comentarios'] = self.object.comentario_set.all()
        return context
    

class FormularioComentariosView(FormView):
    form_class = FormularioComentario

    def form_valid(self, form):
        pk_meme = self.kwargs['meme']
        meme = Meme.objects.get(pk=pk_meme)
        form.instance.meme = meme
        form.save()
        return super().form_valid(form)

    def get_success_url(self) -> str:
        return reverse('memillos:detalle', kwargs={'pk': self.kwargs['meme']})
