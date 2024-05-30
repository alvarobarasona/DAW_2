from django import forms
from .models import Coche

class FormularioCoches(forms.ModelForm):
    class Meta:
        model = Coche
        fields = ['fabricante', 'modelo', 'precio', 'estado', 'combustible', 'foto', 'slug']

class FormularioDinero(forms.Form):
    salario = forms.FloatField()
    alquiler = forms.FloatField()
    gastos = forms.FloatField()