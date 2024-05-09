from django.urls import path
from . import views

app_name = 'ciclotes'
urlpatterns = [
    path('', views.ViewFamilia.as_view(), name='index'),
    path('<int:pk>/', views.ViewCiclo.as_view(), name='ciclos'),
]