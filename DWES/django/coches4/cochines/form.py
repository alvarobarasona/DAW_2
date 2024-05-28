from django import forms
from .models import Coche

class FormularioCoches(forms.ModelForm):
    class Meta:
        model = Coche
        fields = ['fabricante', 'modelo', 'precio', 'estado', 'combustible', 'foto', 'slug']