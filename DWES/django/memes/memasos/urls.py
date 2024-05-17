from django.urls import path
from . import views

app_name = 'memasos'
urlpatterns = [
    path('', views.MemesView.as_view(), name='index'),
    path('<int:pk>/', views.MemeView.as_view(), name='detail'),
]