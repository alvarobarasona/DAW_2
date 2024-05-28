from django import forms

class FormularioSueldo(forms.Form):
    sueldo = forms.FloatField()
    alquiler = forms.FloatField()
    gastos = forms.FloatField()