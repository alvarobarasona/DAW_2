from django.db import models

# Create your models here.

class Car(models.Model):
    car_manufacturer = models.CharField(max_length=100)
    car_model = models.CharField(max_length=100)
    car_price = models.IntegerField()

    STATE_TYPE = (
        ('new', 'Nuevo'),
        ('used', 'Usado'),
    )

    car_state = models.CharField(max_length=10, choices=STATE_TYPE)

    FUEL_TYPE = (
        ('gasoil', 'Gasolina'),
        ('diesel', 'Diesel'),
    )

    car_fuel = models.CharField(max_length=20, choices=FUEL_TYPE)
    car_photo = models.FileField(upload_to='images/')

    def __str__(self):
        return f"{self.car_manufacturer} {self.car_model}"