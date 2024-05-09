from django.urls import path
from . import views

app_name = 'ciclillos'
urlpatterns = [
    path('', views.IndexView.as_view(), name='index'),
    path('<int:pk>/', views.CiclosView.as_view(), name='ciclos'),
]