from django.urls import path
from . import views

app_name = 'reproductor'

urlpatterns = [
    path('', views.IndexView, name='index'),
    path('cancion/', views.obtenerCancion, name='cancion')
]