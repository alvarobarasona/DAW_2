from django import forms
from .models import Cancion

class FormCancion(forms.ModelForm):
    class Meta:
        model = Cancion
        fields = ['nombre', 'genero', 'archivo']
