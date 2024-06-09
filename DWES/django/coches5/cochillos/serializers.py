from rest_framework import serializers
from .models import Coche

class CocheSerializer(serializers.ModelSerializer):
    class Meta:
        model = Coche
        fields = '__all__'