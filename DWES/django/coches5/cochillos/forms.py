from django import forms
from .models import Coche

class FormularioCoche(forms.ModelForm):
    class Meta:
        model = Coche
        fields = ['fabricante', 'modelo', 'precio', 'estado', 'combustible', 'foto']

class FormularioRenta(forms.Form):
    salario = forms.DecimalField(max_digits=10, decimal_places=2)
    gastos = forms.DecimalField(max_digits=10, decimal_places=2)
    alquiler = forms.DecimalField(max_digits=10, decimal_places=2)