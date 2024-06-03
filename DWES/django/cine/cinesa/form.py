from django import forms
from .models import Director, Pelicula

class FormularioDirector(forms.ModelForm):
    class Meta:
        model = Director
        fields = ['nombre', 'fecha_nacimiento', 'biografia', 'foto']
        widgets = {
            'fecha_nacimiento': forms.DateInput(attrs={'type': 'date'})
        }

class FormularioPelicula(forms.ModelForm):
    class Meta:
        model = Pelicula
        fields = ['titulo', 'sinapsis', 'fecha_rodaje', 'fecha_estreno', 'imagen']
        widgets = {
           'fecha_rodaje': forms.DateInput(attrs={'type': 'date'}),
           'fecha_estreno': forms.DateInput(attrs={'type': 'date'})           
        }