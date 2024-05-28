from django import forms
from .models import Receta

class FormularioReceta(forms.ModelForm):
    class Meta:
        model = Receta
        fields = ['nombre', 'ingredientes', 'instrucciones', 'tiempo_preparacion', 'foto']
