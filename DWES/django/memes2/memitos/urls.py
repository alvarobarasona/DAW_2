from django.urls import path
from .views import MemesListView, MemeDetailView, FormularioView

app_name = 'memitos'
urlpatterns = [
    path('', MemesListView.as_view(), name='index'),
    path('detail/<slug:slug>/', MemeDetailView.as_view(), name='detail'),
    path('detail/<slug:slug>/comentario/', FormularioView.as_view(), name='comentario'),
]