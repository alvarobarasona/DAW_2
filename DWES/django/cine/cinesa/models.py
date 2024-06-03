from django.utils.text import slugify
from django.db import models

# Create your models here.

class Director(models.Model):
    nombre = models.CharField(max_length=50)
    fecha_nacimiento = models.DateField()
    biografia = models.TextField()
    foto = models.FileField(upload_to='directores/')
    slug = models.SlugField(blank=True, null=True)

    def __str__(self):
        return self.nombre
    
    def save(self, *args, **kwargs):
        if not self.slug:
            self.slug = slugify(self.nombre)
        return super().save(*args, **kwargs)

class Pelicula(models.Model):
    director = models.ForeignKey(Director, on_delete=models.CASCADE)
    titulo = models.CharField(max_length=80)
    sinapsis = models.TextField()
    fecha_rodaje = models.DateField()
    fecha_estreno = models.DateField()
    imagen = models.FileField(upload_to='peliculas/')
    slug = models.SlugField(blank=True, null=True)

    def __str__(self):
        return self.titulo
    
    def save(self, *args, **kwargs):
        if not self.slug:
            self.slug = slugify(self.titulo)
        return super().save(*args, **kwargs)