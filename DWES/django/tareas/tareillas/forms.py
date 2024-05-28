from django import forms
from .models import Tarea

class FormularioTarea(forms.ModelForm):
    class Meta:
        model =Tarea
        fields = ['titulo', 'descripcion', 'fecha_vencimiento', 'prioridad', 'estado']
        #Para especificar un widget del campo de un modelo se debe hacer de esta forma
        widgets = {
            'fecha_vencimiento': forms.DateInput(attrs={'type': 'date'})
        }