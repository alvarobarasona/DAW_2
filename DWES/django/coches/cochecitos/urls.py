from django.urls import path
from . import views
from .models import Coche

app_name = 'cochecitos'
urlpatterns = [
    path('', views.IndexView.as_view(), name='index'),
]