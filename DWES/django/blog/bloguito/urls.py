from django.urls import path
from . import views

app_name = 'bloguito'
urlpatterns = [
    path('', views.ListaBlogView.as_view(), name='lista'),
    path('<int:pk>/', views.DetailBlogView.as_view(), name='detail'),
]