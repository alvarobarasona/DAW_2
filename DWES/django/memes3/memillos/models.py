from django.db import models

# Create your models here.

class Meme(models.Model):
    titulo = models.CharField(max_length=100)
    descripcion = models.TextField()
    imagen = models.FileField(upload_to='memes/')

    def __str__(self):
        return self.titulo
    
class Comentario(models.Model):
    meme = models.ForeignKey(Meme, on_delete=models.CASCADE)
    texto = models.TextField()

    def __str__(self):
        return self.texto