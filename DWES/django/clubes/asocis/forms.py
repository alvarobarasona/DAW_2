from django import forms
from .models import Club, Producto

class FormularioClub(forms.ModelForm):
    class Meta:
        model = Club
        fields = ['nombre', 'direccion', 'fecha_apertura']
        widgets = {
            'fecha_apertura': forms.DateInput(attrs={'type': 'date'})
        }

class FormularioProducto(forms.ModelForm):
    class Meta:
        model = Producto
        fields = ['variedad', 'tipo', 'concentracion', 'precio', 'foto']