from django.utils.text import slugify
from django.db import models

# Create your models here.

class Cliente(models.Model):
    nombre = models.CharField(max_length=80)
    apellido = models.CharField(max_length=80)
    direccion = models.CharField(max_length=150)
    fecha_nacimiento = models.DateField()
    foto = models.FileField(upload_to='clientes/')
    slug = models.SlugField(blank=True, null=True)

    def __str__(self):
        return self.nombre
    
    def save(self, *args, **kwargs):
        if not self.slug:
            self.slug = slugify(f'{self.nombre}-{self.apellido}')
        return super().save(*args, **kwargs)
    
class Videojuego(models.Model):
    cliente = models.ForeignKey(Cliente, on_delete=models.CASCADE)
    titulo = models.CharField(max_length=80)
    precio = models.DecimalField(max_digits=10, decimal_places=2)
    slug = models.SlugField(blank=True, null=True)

    def __str__(self):
        return self.titulo
    
    def save(self, *args, **kwargs):
        if not self.slug:
            self.slug = slugify(self.titulo)
        return super().save(*args, **kwargs)