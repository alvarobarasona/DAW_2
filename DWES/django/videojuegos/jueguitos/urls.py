from django.urls import path
from . import views

app_name = 'jueguitos'
urlpatterns = [
    path('', views.ListaClientesView.as_view(), name='listaclientes'),
    path('formulariocliente/', views.FormularioClienteView.as_view(), name='formulariocliente'),
    path('formulariovideojuego/<text>/', views.FormularioVideojuegoView.as_view(), name='formulariovideojuego'),
    path('detallevideojuego/<slug:slug>/', views.DetalleVideojuegoView.as_view(), name='detallevideojuego'),
    path('detallecliente/<slug:slug>/', views.DetalleClienteView.as_view(), name='detallecliente'),
]