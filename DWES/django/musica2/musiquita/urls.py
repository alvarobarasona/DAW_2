from django.urls import path
from . import views

app_name = 'musiquita'
urlpatterns = [
    path('', views.Formulario.as_view(), name='formulario'),
    path('canciones/', views.ListaCanciones.as_view(), name='canciones'),
]