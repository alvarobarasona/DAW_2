from django.urls import path
from . import views

app_name = 'concesi'
urlpatterns = [
    path('', views.ListaPersonasView.as_view(), name='listapersonas'),
    path('formulariopersona/', views.FormularioPersonaView.as_view(), name='formulariopersona'),
    path('formulariocoche/<int:pk>/', views.FormularioCocheView.as_view(), name='formulariocoche'),
    path('<slug:slug>/', views.DetallePersonaView.as_view(), name='detallepersona'),
    path('detallecoche/<slug:slug>/', views.DetalleCocheView.as_view(), name='detallecoche'),
]
