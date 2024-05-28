from django.views.generic import ListView, DetailView
from django.views.generic.edit import FormView
from django.urls import reverse
from .forms import FormularioComentarios
from .models import Meme

# Create your views here.

class MemesListView(ListView):
    model = Meme
    template_name = 'memitos/index.html'
    context_object_name = 'memes'

class MemeDetailView(DetailView):
    model = Meme
    template_name = 'memitos/detail.html'
    context_object_name = 'meme'

    def get_context_data(self, **kwargs):
        context = super().get_context_data(**kwargs)
        context['comentarios'] = self.object.comentario_set.all()
        context['form'] = FormularioComentarios()
        return context
    
class FormularioView(FormView):
    form_class = FormularioComentarios
    template_name = 'memitos/detail.html'
    
    def form_valid(self, form):
        slug_meme = self.kwargs['slug']
        meme = Meme.objects.get(slug=slug_meme)
        #Guarda el comentario en el meme
        form.instance.meme = meme
        form.save()
        return super().form_valid(form)
    
    def get_success_url(self):
        slug_meme = self.kwargs['slug']
        return reverse('memitos:detail', kwargs={'slug': slug_meme})

