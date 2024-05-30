from django.contrib import admin
from .models import Edificio, Tecnico, Mantenimiento

# Register your models here.

admin.site.register(Edificio)
admin.site.register(Tecnico)
admin.site.register(Mantenimiento)