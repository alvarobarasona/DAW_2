from django import forms

class FormularioCoches(forms.Form):
    sueldo = forms.FloatField()
    alquiler = forms.FloatField()
    gastos = forms.FloatField()