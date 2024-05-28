from django.urls import path
from . import views

app_name = 'cochines'
urlpatterns = [
    path('', views.ListaCochesView.as_view(), name='lista'),
    path('formulario/', views.FormularioCochesView.as_view(), name='formulario'),
    path('<slug:slug>/', views.CocheDetalleView.as_view(), name='detalle'),
]
