from django import forms
from .models import Pregunta, Respuesta

class FormularioPreguntas(forms.ModelForm):
    class Meta:
        model = Pregunta
        fields = ['texto']

class FormularioRespuestas(forms.ModelForm):
    class Meta:
        model = Respuesta
        fields = ['texto']