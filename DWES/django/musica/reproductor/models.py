from django.db import models

# Create your models here.

class Cancion(models.Model):
    nombre = models.CharField(max_length=100)
    genero = models.CharField(max_length=50)
    archivo = models.FileField(upload_to='reproductor/media/canciones/')

    def __str__(self):
        return self.nombre