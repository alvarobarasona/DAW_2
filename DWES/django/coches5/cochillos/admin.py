from django.contrib import admin
from .models import Coche

# Register your models here.

class AdimSite(admin.ModelAdmin):
    #Agrupa en distintos grupos en el formulario para añadir el coche. En este caso hay 3 grupos
    fieldsets = [
        (None, {"fields": ["fabricante", "modelo"]}),
        ("caracteristicas del coche", {"fields": ["estado", "combustible", "precio"]}),
        ("Datos extra", {"fields": ["foto", "slug"]}),
    ]

    # Muestra los coches de la BBDD y cada elemento especificado es una columna
    list_display = ["fabricante", "modelo", "estado"]

    # Para filtrar atributos de coches que tengan varias opciones
    list_filter = ["combustible", "estado"]

    # Te permite hacer una búsqueda por los campos que le indiques.
    search_fields = ["fabricante", "modelo"]

admin.site.register(Coche, AdimSite)