from django.utils.text import slugify
from django.db import models

# Create your models here.

class Persona(models.Model):
    nombre = models.CharField(max_length=70)
    apellido = models.CharField(max_length=70)
    fecha_nacimiento = models.DateField()
    foto = models.FileField(upload_to='personas/')
    slug = models.SlugField(null=True, blank=True)

    def __str__(self):
        return self.nombre
    
    def save(self, *args, **kwargs):
        if not self.slug:
            self.slug = slugify(self.nombre)
        return super().save(*args, **kwargs)
    
class Coche(models.Model):
    persona = models.ForeignKey(Persona, on_delete=models.CASCADE)
    fabricante = models.CharField(max_length=80)
    modelo = models.CharField(max_length=80)
    precio = models.DecimalField(max_digits=7, decimal_places=2)
    imagen = models.FileField(upload_to='coches/')
    slug = models.SlugField(null=True, blank=True)

    def __str__(self):
        return f'{self.fabricante} {self.modelo}'
    
    def save(self, *args, **kwargs):
        if not self.slug:
            self.slug = slugify(f'{self.fabricante}-{self.modelo}')
        return super().save(*args, **kwargs)