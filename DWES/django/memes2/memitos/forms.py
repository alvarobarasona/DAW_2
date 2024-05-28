from django import forms
from .models import Comentario

class FormularioComentarios(forms.ModelForm):
    class Meta:
        model = Comentario
        fields = ['texto']