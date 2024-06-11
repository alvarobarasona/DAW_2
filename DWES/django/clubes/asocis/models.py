from django.utils.text import slugify
from django.db import models

# Create your models here.

class Club(models.Model):
    nombre = models.CharField(max_length=60)
    direccion = models.CharField(max_length=100)
    numero_socios = models.IntegerField(blank=True, null=True)
    fecha_apertura = models.DateField()
    slug = models.SlugField(blank=True, null=True)

    def __str__(self):
        return self.nombre
    
    def save(self, *args, **kwargs):
        if not self.slug:
            self.slug = slugify(self.nombre)
        return super().save(*args, **kwargs)
    
class Producto(models.Model):
    club = models.ForeignKey(Club, on_delete=models.CASCADE)
    variedad = models.CharField(max_length=70)

    TIPOS = (
        ('WEED', 'Weed'),
        ('HASH', 'Hash'),
        ('EXTRACCION', 'Extraccion'),
    )

    tipo = models.CharField(max_length=10, choices=TIPOS)
    concentracion = models.DecimalField(max_digits=4, decimal_places=2)
    precio = models.IntegerField()
    foto = models.FileField(upload_to='productos/')
    slug = models.SlugField(blank=True, null=True)

    def __str__(self):
        return f'{self.club.nombre} {self.variedad}'
    
    def save(self, *args, **kwargs):
        if not self.slug:
            self.slug = slugify(f'{self.club.nombre}-{self.variedad}')
        return super().save(*args, **kwargs)