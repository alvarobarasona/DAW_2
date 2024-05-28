from django.db import models

# Create your models here.

class Blog(models.Model):
    titulo = models.CharField(max_length=50)
    contenido = models.TextField()
    fecha_publicacion = models.DateTimeField(auto_now_add=True)
    autor = models.CharField(max_length=50)
    tags = models.CharField(max_length=200)

    def __str__(self):
        return self.titulo