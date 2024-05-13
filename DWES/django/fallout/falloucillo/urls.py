from django.urls import path
from . import views

app_name = 'falloucillo'
urlpatterns = [
    path('', views.IndexView.as_view(), name='index'),
    path('<slug:slug>/', views.PersonajeDetailView.as_view(), name='personaje'),
]