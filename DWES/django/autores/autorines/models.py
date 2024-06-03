from django.utils.text import slugify
from django.db import models

# Create your models here.

class Autor(models.Model):
    nombre = models.CharField(max_length=50)
    apellido = models.CharField(max_length=50)
    biografia = models.TextField()
    fecha_nacimiento = models.DateField()
    foto = models.FileField(upload_to='autores/')
    slug = models.SlugField(blank=True, null=True)

    def __str__(self):
        return f'{self.nombre} {self.apellido}'
    
    def save(self, *args, **kwargs):
        if not self.slug:
            self.slug = slugify(f'{self.nombre}-{self.apellido}')
        return super().save(*args, **kwargs)
    
class Libro(models.Model):
    autor = models.ForeignKey(Autor, on_delete=models.CASCADE)
    titulo = models.CharField(max_length=80)
    sinopsis = models.TextField()
    fecha_publicacion = models.DateField()
    imagen = models.FileField(upload_to='libros/')
    slug = models.SlugField(blank=True, null=True)

    def __str__(self):
        return self.titulo
    
    def save(self, *args, **kwargs):
        if not self.slug:
            self.slug = slugify(self.titulo)
        return super().save(*args, **kwargs)