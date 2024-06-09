from django.urls import path
from . import views

app_name = 'cochillos'
urlpatterns = [
    path('', views.ListaCochesView.as_view(), name='listacoches'),
    path('formulariocoche/', views.FormularioCocheView.as_view(), name='formulariocoche'),
    path('formulariorenta/', views.FormularioRentaView.as_view(), name='formulariorenta'),
    path('detallecoche/<slug:slug>', views.DetalleCocheView.as_view(), name='detallecoche'),
]
