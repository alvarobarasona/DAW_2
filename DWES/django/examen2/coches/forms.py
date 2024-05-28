from django import forms

#Al no ser un formulario del modelo de una BBDD, se le pone forms.Form en vez de forms.ModelForm

class CarForm(forms.Form):
    salary = forms.FloatField()
    rent = forms.FloatField()
    costs = forms.FloatField()