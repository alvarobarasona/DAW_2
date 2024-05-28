from django.db import models
from django.utils.text import slugify

# Create your models here.

class Personaje(models.Model):
    nombre = models.CharField(max_length=100)
    slug = models.SlugField()
    descripcion = models.TextField()
    foto_portada = models.FileField(upload_to='portadas/')
    foto_detalle = models.FileField(upload_to='detalles/')

    def __str__(self):
        return self.nombre
    
    def save(self, *args, **kwargs):
        if not self.slug:
            #slugify remplaza espacios en blanco
            self.slug = slugify(self.nombre)
        super().save(*args, **kwargs)