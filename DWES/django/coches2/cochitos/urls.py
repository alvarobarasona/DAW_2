from django.urls import path
from . import views

app_name = 'cochitos'
urlpatterns = [
    path('', views.ListaCochesView.as_view(), name='lista'),
    path('formulario/', views.FormularioView.as_view(), name='formulario'),
]