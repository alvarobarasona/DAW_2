from django.db import models

# Create your models here.

class Coche(models.Model):
    fabricante = models.CharField(max_length=200)
    modelo = models.CharField(max_length=200)
    precio = models.IntegerField()
    NUEVO_USADO = (
        ('nuevo', 'NUEVO'),
        ('usado', 'USADO'),
    )
    estado = models.CharField(max_length=200, choices=NUEVO_USADO)
    GASOLINA_DIESEL = (
        ('gasolina', 'GASOLINA'),
        ('diesel', 'DIESEL'),
    )
    combustible = models.CharField(max_length=8, choices=GASOLINA_DIESEL)
    foto = models.FileField(upload_to='cochecitos/media/imagenes/')

    def __str__(self):
        return f'{self.fabricante} {self.modelo}'