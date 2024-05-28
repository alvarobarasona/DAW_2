from django.urls import path
from . import views

app_name = 'manteni'
urlpatterns = [
    path('', views.MantenimientosView.as_view(), name='index'),
    path('<int:pk>/', views.MantenimientoDetail.as_view(), name='detail'),
]