from django.db import models

# Create your models here.

class Familia(models.Model):
    nombre = models.CharField(max_length=200)
    descripcion = models.TextField()

    def __str__(self):
        return self.nombre
    
class Ciclo(models.Model):
    pk_ciclo = models.ForeignKey(Familia, on_delete=models.CASCADE)
    nombre = models.CharField(max_length=200)

    def __str__(self):
        return self.nombre