from django.urls import path
from . import views

app_name = 'frutaverdura'
urlpatterns = [
    path('', views.IndexView.as_view(), name='index'),
    path('<int:mes>/', views.productos, name='productos'),
]