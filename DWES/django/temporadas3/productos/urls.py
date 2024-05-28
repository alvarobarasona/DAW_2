from django.urls import path
from . import views

app_name = 'productos'
urlpatterns = [
    path('', views.MesesView.as_view(), name='index'),
    path('<int:mes>/', views.ProductosView.as_view(), name='detail'),
]