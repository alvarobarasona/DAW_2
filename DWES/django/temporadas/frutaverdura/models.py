from django.db import models

# Create your models here.

class Producto(models.Model):
    nombre = models.CharField(max_length=200)
    foto = models.ImageField(upload_to='frutaverdura', null=True, blank=True)
    descripcion = models.TextField()
    fecha_inicio = models.DateField()
    fecha_final = models.DateField()
    disponible = models.BooleanField(default=False)

    def __str__(self):
        return self.nombre