from django.urls import path
from . import views

app_name = 'mantenido'
urlpatterns = [
    path('', views.ListaMantenimientosView.as_view(), name='lista'),
    path('<slug:slug>/', views.DetalleMantenimientoView.as_view(), name='detalle'),
]
