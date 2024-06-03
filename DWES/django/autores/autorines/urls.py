from django.urls import path
from . import views

app_name = 'autorines'
urlpatterns = [
     path('', views.ListaAutoresView.as_view(), name='autoreslista'),
     path('formularioautor/', views.FormularioAutorView.as_view(), name='formularioautor'),
     path('formulariolibro/<text>/', views.FormularioLibroView.as_view(), name='formulariolibro'),
     path('detalleautor/<slug:slug>/', views.DetalleAutorView.as_view(), name='detalleautor'),
     path('detallelibro/<slug:slug>/', views.DetalleLibroView.as_view(), name='detallelibro'),
]
