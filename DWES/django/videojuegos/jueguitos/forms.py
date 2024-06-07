from django import forms
from .models import Cliente, Videojuego

class FormularioCliente(forms.ModelForm):
    class Meta:
        model = Cliente
        fields = ['nombre', 'apellido', 'direccion', 'fecha_nacimiento', 'foto']
        widgets = {
            'fecha_nacimiento': forms.DateInput(attrs={'type': 'date'})
        }

class FormularioVideojuego(forms.ModelForm):
    class Meta:
        model = Videojuego
        fields = ['titulo', 'precio']