from django.db import models

# Create your models here.

class Receta(models.Model):
    nombre = models.CharField(max_length=50)
    ingredientes = models.CharField(max_length=100)
    instrucciones = models.TextField()
    tiempo_preparacion = models.FloatField()
    foto = models.FileField(upload_to='images/')

    def __str__(self):
        return self.nombre