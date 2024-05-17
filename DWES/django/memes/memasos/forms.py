from django import forms
from .models import Comentario

class FormComentario(forms.ModelForm):
    class Meta:
        model = Comentario
        fields = ['texto']