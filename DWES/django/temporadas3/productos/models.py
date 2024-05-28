from django.db import models

# Create your models here.

class Producto(models.Model):
    nombre = models.CharField(max_length=40)
    foto = models.FileField(upload_to='fotos/')
    descripcion = models.TextField()
    fecha_inicio = models.DateField(blank=True, null=True)
    fecha_final = models.DateField(blank=True, null=True)
    disponible = models.BooleanField(default=False, blank=True)

    def __str__(self):
        return self.nombre