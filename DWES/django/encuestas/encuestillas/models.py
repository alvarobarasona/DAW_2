from django.db import models

# Create your models here.

class Pregunta(models.Model):
    texto = models.CharField(max_length=100)

    def __str__(self):
        return self.texto
    
class Respuesta(models.Model):
    pregunta = models.ForeignKey(Pregunta, on_delete=models.CASCADE)
    texto = models.CharField(max_length=100)
    votos = models.IntegerField(default=0)

    def __str__(self):
        return self.texto