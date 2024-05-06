from django.db import models

# Create your models here.

class Chiste(models.Model):
    titulo = models.CharField(max_length=100)
    texto = models.TextField()
    adulto = models.BooleanField(default=False)
    fecha = models.DateTimeField(auto_now_add=True)

    def __str__(self):
        return self.titulo