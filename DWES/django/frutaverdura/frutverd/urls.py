from django.urls import path
from . import views

app_name = 'frutverd'
urlpatterns = [
    path('', views.IndexView.as_view(), name='index'),
    path('<int:mes>/', views.ProductView.as_view(), name='products')
]