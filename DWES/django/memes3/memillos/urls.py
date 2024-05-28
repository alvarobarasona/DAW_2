from django.urls import path
from . import views

app_name = 'memillos'
urlpatterns = [
    path('', views.ListaMemesView.as_view(), name='index'),
    path('<int:pk>/', views.MemeDetalleView.as_view(), name='detalle'),
    path('formulario/<int:meme>', views.FormularioComentariosView.as_view(), name='formulario'),
]