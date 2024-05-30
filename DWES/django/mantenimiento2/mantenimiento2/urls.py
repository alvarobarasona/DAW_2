"""
URL configuration for mantenimiento2 project.

The `urlpatterns` list routes URLs to views. For more information please see:
    https://docs.djangoproject.com/en/5.0/topics/http/urls/
Examples:
Function views
    1. Add an import:  from my_app import views
    2. Add a URL to urlpatterns:  path('', views.home, name='home')
Class-based views
    1. Add an import:  from other_app.views import Home
    2. Add a URL to urlpatterns:  path('', Home.as_view(), name='home')
Including another URLconf
    1. Import the include() function: from django.urls import include, path
    2. Add a URL to urlpatterns:  path('blog/', include('blog.urls'))
"""
from django.contrib import admin
from django.urls import path, include

from rest_framework import routers
from mantenido.views import MantenimientoApiView, EdificioApiView, TecnicoApiView

router = routers.DefaultRouter()
#r'mantenimientos' es el nombre con el que se va a buscar en la url
router.register(r'mantenimientos', MantenimientoApiView)
router.register(r'edificios', EdificioApiView)
router.register(r'tecnicos', TecnicoApiView)

urlpatterns = [
    path('api/', include(router.urls)),
    path('admin/', admin.site.urls),
    path('mantenimiento/', include('mantenido.urls')),
]
