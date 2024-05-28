from django.db import models

# Create your models here.

class Coche(models.Model):
    fabricante = models.CharField(max_length=100)
    modelo = models.CharField(max_length=100)
    precio = models.IntegerField()

    TIPO_ESTADO = (
        ('NUEVO', 'Nuevo'),
        ('USADO', 'Usado'),
    )

    estado = models.CharField(max_length=5, choices=TIPO_ESTADO)

    TIPO_COMBUSTIBLE = (
        ('GASOLINA', 'Gasolina'),
        ('DIESEL', 'Diesel'),
    )

    combustible = models.CharField(max_length=8, choices=TIPO_COMBUSTIBLE)

    foto = models.FileField(upload_to='coches/')

    def __str__(self):
        return f'{self.fabricante} {self.modelo}'