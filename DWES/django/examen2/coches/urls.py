from django.urls import path
from . import views

app_name = 'coches'
urlpatterns = [
    path('', views.CarsView.as_view(), name='index'),
    path('general/', views.GeneralView.as_view(), name='general'),
]