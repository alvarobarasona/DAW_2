from django import forms
from .models import Persona, Coche

class FormularioPersona(forms.ModelForm):
    class Meta:
        model = Persona
        fields = ['nombre', 'apellido', 'fecha_nacimiento', 'foto']
        widgets = {
            'fecha_nacimiento': forms.DateInput(attrs={'type': 'date'})
        }

class FormularioCoche(forms.ModelForm):
    class Meta:
        model = Coche
        fields = ['fabricante', 'modelo', 'precio', 'imagen']