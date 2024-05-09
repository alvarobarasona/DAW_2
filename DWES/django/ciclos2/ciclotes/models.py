from django.db import models

# Create your models here.

class Familia(models.Model):
    titulo = models.CharField(max_length=200)
    descripcion = models.TextField()

    def __str__(self):
        return self.titulo
    
class Ciclo(models.Model):
    fk = models.ForeignKey(Familia, on_delete=models.CASCADE)
    titulo = models.CharField(max_length=200)

    def __str__(self):
        return self.titulo