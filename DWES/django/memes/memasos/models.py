from django.db import models

# Create your models here.

class Meme(models.Model):
    imagen = models.ImageField(upload_to='memasos/media/memes/')
    descripcion = models.TextField()

    def __str__(self):
        return self.imagen.url
    
class Comentario(models.Model):
    fk_comentario = models.ForeignKey(Meme, on_delete=models.CASCADE)
    texto = models.TextField()

    def __str__(self):
        return self.texto