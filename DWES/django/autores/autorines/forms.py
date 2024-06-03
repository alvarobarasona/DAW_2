from django import forms
from .models import Autor, Libro

class FormularioAutor(forms.ModelForm):
    class Meta():
        model = Autor
        fields = ['nombre', 'apellido', 'biografia', 'fecha_nacimiento', 'foto']
        widgets = {
            'fecha_nacimiento': forms.DateInput(attrs={'type': 'date'})
        }

class FormularioLibro(forms.ModelForm):
    class Meta():
        model = Libro
        fields = ['titulo', 'sinopsis', 'fecha_publicacion', 'imagen']
        widgets = {
            'fecha_publicacion': forms.DateInput(attrs={'type': 'date'})
        }