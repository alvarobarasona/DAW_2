from django.utils.text import slugify
from django.db import models

# Create your models here.

class Edificio(models.Model):
    nombre = models.CharField(max_length=50)
    direccion = models.CharField(max_length=100)
    mail = models.CharField(max_length=100)

    def __str__(self):
        return self.nombre
    
class Tecnico(models.Model):
    nombre = models.CharField(max_length=50)
    especialidad = models.CharField(max_length=50)
    telefono = models.CharField(max_length=9)

    def __str__(self):
        return self.nombre
    
class Mantenimiento(models.Model):
    fecha = models.DateField()
    descripcion = models.TextField()
    edificio = models.ForeignKey(Edificio, on_delete=models.CASCADE)
    tecnico = models.ForeignKey(Tecnico, on_delete=models.CASCADE)
    slug = models.SlugField(blank=True)

    def __str__(self):
        return self.descripcion
    
    def save(self, *args, **kwargs):
        if not self.slug:
            self.slug = slugify(self.edificio.nombre)
        return super().save(*args, **kwargs)