from typing import Any, Mapping
from django import forms
from django.forms.renderers import BaseRenderer
from django.forms.utils import ErrorList

class Formulario(forms.Form):
    salario = forms.DecimalField(label='Salario')
    gastos = forms.DecimalField(label='Gastos')
    alquiler = forms.DecimalField(label='Alquiler')
