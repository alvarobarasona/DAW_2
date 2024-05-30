#IMPORTANTE: PARA QUE FUNCIONE TIENES QUE AÑADIR rest_framework  A LA LISTA INSTALLED_APPS DEL ARCHIVO settings.py

from rest_framework import serializers
from .models import Mantenimiento, Edificio, Tecnico

class MantenimientoSerializer(serializers.ModelSerializer):
    class Meta:
        model = Mantenimiento
        fields = '__all__'

class EdificioSerializer(serializers.ModelSerializer):
    class Meta:
        model = Edificio
        fields = '__all__'

class TecnicoSerializer(serializers.ModelSerializer):
    class Meta:
        model = Tecnico
        fields = '__all__'