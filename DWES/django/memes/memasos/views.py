from django.shortcuts import render, redirect
from django.views import generic
from .models import Meme
from .forms import FormComentario

# Create your views here.

class MemesView(generic.ListView):
    model = Meme
    context_object_name = 'memes'
    template_name = 'memasos/index.html'

class MemeView(generic.DetailView):
    model = Meme
    context_object_name = 'meme'
    template_name = 'memasos/detail.html'

    def post(self, request, *args, **kwargs):
        meme = self.get_object()
        form = FormComentario(request.POST)
        if form.is_valid():
            comentario = form.save(commit=False)
            comentario.fk_comentario = meme
            comentario.save()
            return redirect('memasos:detail', pk=meme.pk)
