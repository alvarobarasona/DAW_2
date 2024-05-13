from django.db import models
from django.utils.text import slugify

# Create your models here.

class Personaje(models.Model):
    nombre = models.CharField(max_length=200)
    slug = models.SlugField(unique=True, max_length=200, null=True, blank=True)
    descripcion = models.TextField()
    foto_portada = models.ImageField(upload_to='falloucillo/media/portadas/')
    foto_detalle = models.ImageField(upload_to='falloucillo/media/detalles/')

    def save(self, *args, **kwargs):  # new
        if not self.slug:
            self.slug = slugify(self.nombre)
        super().save(*args, **kwargs)

    def __str__(self):
        return self.nombre