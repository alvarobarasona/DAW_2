from django.urls import path
from . import views

app_name = 'recetillas'
urlpatterns = [
    path('', views.ListaRecetasView.as_view(), name='index'),
    path('<int:pk>/', views.DetailRecetaView.as_view(), name='detail'),
    path('formulario/', views.FormularioView.as_view(), name='formulario'),
]