from django.db import models
from django.urls import reverse

# Create your models here.

class Tarea(models.Model):
    titulo = models.CharField(max_length=100)
    descripcion = models.TextField()
    fecha_creacion = models.DateTimeField(auto_now_add=True)
    fecha_vencimiento = models.DateTimeField()

    TIPO_PRIORIDAD = (
        ('alta', 'Alta'),
        ('baja', 'Baja'),
    )

    prioridad = models.CharField(max_length=4, choices=TIPO_PRIORIDAD)

    TIPO_ESTADO = (
        ('pendiente', 'Pendiente'),
        ('en progreso', 'En progreso'),
        ('completada', 'Completada'),
    )

    estado = models.CharField(max_length=20, choices=TIPO_ESTADO)

    def __str__(self):
        return self.titulo
    
    def get_absolute_url(self):
        return reverse("tareillas:detalle", kwargs={"pk": self.pk})
    