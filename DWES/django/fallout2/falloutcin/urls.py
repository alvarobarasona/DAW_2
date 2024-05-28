from django.urls import path
from . import views

app_name = 'falloutcin'
urlpatterns = [
    path('', views.ListaPersonajesView.as_view(), name='personajes'),
    path('<slug:slug>/', views.DetallePersonajeView.as_view(), name='personaje'),
]