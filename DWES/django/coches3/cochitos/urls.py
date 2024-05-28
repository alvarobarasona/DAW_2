from django.urls import path
from . import views

app_name = 'cochitos'
urlpatterns = [
    path('', views.ListaCochesView.as_view(), name='index'),
    path('formulario/', views.FormularioCochesView.as_view(), name='formulario'),
]