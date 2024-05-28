from django.views.generic import ListView, DetailView
from .models import Blog

# Create your views here.

class ListaBlogView(ListView):
    model = Blog
    template_name = 'bloguito/lista.html'
    context_object_name = 'blogs'

class DetailBlogView(DetailView):
    model = Blog
    template_name = 'bloguito/detail.html'
    context_object_name = 'blog'