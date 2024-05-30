from django.urls import path
from . import views

app_name = 'obras'
urlpatterns = [
    path('', views.ListaObrasView.as_view(), name='lista'),
    path('<slug:slug>/', views.DetalleObraView.as_view(), name='detalle'),
]
