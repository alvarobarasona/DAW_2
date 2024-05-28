from django import forms
from .models import Cancion

class FormCanciones(forms.ModelForm):
    class Meta:
        model = Cancion
        fields = ['titulo', 'genero', 'archivo_cancion']