from django.urls import path
from . import views

app_name = 'encuestillas'
urlpatterns = [
    path('formulariopreguntas/', views.FormularioPreguntasView.as_view(), name='formulariopreguntas'),
    path('listapreguntas/', views.ListaPreguntasView.as_view(), name='listapreguntas'),
    path('detallepregunta/<int:pk>/', views.DetallePreguntaView.as_view(), name='detallepregunta'),
    path('formulariorespuestas/<int:pk>/', views.FormularioRespuestasView.as_view(), name='formulariorespuestas'),
]