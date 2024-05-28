from django.db import models

# Create your models here.

class Cancion(models.Model):
    titulo = models.CharField(max_length=40)

    SELECT_GENERO = (
        ('rock', 'Rock'),
        ('pop', 'Pop'),
        ('reggaeton', 'Reggaeton'),
        ('cumbia', 'Cumbia'),
        ('salsa', 'Salsa'),
        ('bachata', 'Bachata'),
        ('merengue', 'Merengue'),
        ('trap', 'Trap'),
        ('rap', 'Rap'),
        ('hip_hop', 'Hip Hop'),
        ('reggae', 'Reggae'),
        ('electronica', 'Electronica'),
        ('balada', 'Balada'),
        ('ranchera', 'Ranchera'),
        ('bolero', 'Bolero'),
        ('tango', 'Tango'),
        ('jazz', 'Jazz'),
        ('blues', 'Blues'),
        ('metal', 'Metal'),
        ('punk', 'Punk'),
        ('indie', 'Indie'),
        ('alternativo', 'Alternativo'),
        ('clasica', 'Clasica'),
        ('country', 'Country'),
        ('disco', 'Disco'),
        ('ska', 'Ska'),
        ('soul', 'Soul'),
        ('funk', 'Funk'),
        ('r&b', 'R&B'),
        ('techno', 'Techno'),
        ('house', 'House'),
        ('dubstep', 'Dubstep'),
        ('trap', 'Trap'),
    )

    genero = models.CharField(choices=SELECT_GENERO, max_length=20)
    archivo_cancion = models.FileField(upload_to='canciones/')

    def __str__(self):
        return self.titulo