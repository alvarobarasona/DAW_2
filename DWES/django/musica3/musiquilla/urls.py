from django.urls import path
from . import views

app_name = 'musiquilla'
urlpatterns = [
    path('', views.ListaCancionesView.as_view(), name='index'),
    path('formulario/', views.FormularioCancionesView.as_view(), name='formulario'),
]
