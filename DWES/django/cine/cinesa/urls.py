from django.urls import path
from . import views

app_name = 'cinesa'
urlpatterns = [
    path('', views.ListaDirectoresView.as_view(), name='listadirectores'),
    path('formulariodirector/', views.FormularioDirectorView.as_view(), name='formulariodirector'),
    path('formulariopelicula/<int:pk>/', views.FormularioPeliculaView.as_view(), name='formulariopelicula'),
    path('<slug:slug>/', views.DetalleDirectorView.as_view(), name='detalledirector'),
    path('pelicula/<slug:slug>/', views.DetallePeliculaView.as_view(), name='detallepelicula'),
]