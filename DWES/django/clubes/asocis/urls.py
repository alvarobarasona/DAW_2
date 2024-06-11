from django.urls import path
from . import views

app_name = 'asocis'

urlpatterns = [
    path('', views.ListaClubesView.as_view(), name='listaclubes'),
    path('formularioclub/', views.FormularioClubView.as_view(), name='formularioclub'),
    path('formularioproducto/<text>', views.FormularioProductoView.as_view(), name='formularioproducto'),
    path('detalleproducto/<slug:slug>/', views.DetalleProductoView.as_view(), name='detalleproducto'),
    path('detalleclub/<slug:slug>/', views.DetalleClubView.as_view(), name='detalleclub'),
]
