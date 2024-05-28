from django.db import models
from django.utils.text import slugify

# Create your models here.

class Meme(models.Model):
    titulo = models.CharField(max_length=100)
    descripcion = models.TextField()
    imagen = models.ImageField(upload_to='memes/')
    slug = models.SlugField(max_length=100, unique=True, blank=True)

    def __str__(self):
        return self.titulo
    
    def save(self, *args, **kwargs):
        #Si está en blanco el slug
        if not self.slug:
            #Convierte el título en un slug
            self.slug = slugify(self.titulo)
        return super().save(*args, **kwargs)
    
class Comentario(models.Model):
    meme = models.ForeignKey(Meme, on_delete=models.CASCADE)
    texto = models.TextField()

    def __str__(self):
        return self.texto
    