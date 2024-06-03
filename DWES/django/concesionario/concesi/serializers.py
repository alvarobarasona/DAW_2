from rest_framework import serializers
from .models import Persona, Coche

class PersonaSerializer(serializers.ModelSerializer):
    class Meta:
        model = Persona
        fields = '__all__'

class CocheSerializer(serializers.ModelSerializer):
    class Meta:
        model = Coche
        fields = '__all__'