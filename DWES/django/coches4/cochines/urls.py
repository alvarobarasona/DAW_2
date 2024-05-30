from django.urls import path
from . import views

app_name = 'cochines'
urlpatterns = [
    path('', views.ListaCochesView.as_view(), name='lista'),
    path('formulario/', views.FormularioCochesView.as_view(), name='formulario'),
    path('form_dinero/', views.FormularioDineroView.as_view(), name='formdinero'),
    path('<slug:slug>/', views.CocheDetalleView.as_view(), name='detalle'),
]
