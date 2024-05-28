from django.forms import ModelForm
from .models import Cancion

class FormularioCanciones(ModelForm):
    class Meta:
        model = Cancion
        fields = ['nombre', 'genero', 'fichero']