from django.urls import path
from . import views

app_name = 'tareillas'
urlpatterns = [
    path('', views.ListaTareasView.as_view(), name='lista'),
    path('<int:pk>/', views.DetalleTareaView.as_view(), name='detalle'),
    path('add/', views.CrearTareaView.as_view(), name='add'),
    path('update/<int:pk>', views.ActualizarTareaView.as_view(), name='update'),
    path('delete/<int:pk>', views.BorrarTareaView.as_view(), name='delete'),
]