from django.utils.text import slugify
from django.db import models

# Create your models here.

class Obra(models.Model):
    titulo = models.CharField(max_length=200)
    artista = models.CharField(max_length=100)
    descripcion = models.TextField()
    fecha_creacion = models.DateField()
    precio = models.DecimalField(max_digits=10, decimal_places=2)
    en_venta = models.BooleanField(default=True)
    imagen = models.FileField(upload_to='obras/')
    slug = models.SlugField(blank=True)

    def __str__(self):
        return self.titulo
    
    def save(self, *args, **kwargs):
        if not self.slug:
            self.slug = slugify(self.titulo)
        return super().save(*args, **kwargs)