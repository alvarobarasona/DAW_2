from django.db import models

# Create your models here.

class Distro(models.Model):
    name = models.CharField(max_length=255)
    version = models.CharField(max_length=255)
    basada = models.CharField(max_length=255)
    activa = models.BooleanField(default=True)

    def __str__(self):
        return self.name