from django.urls import reverse_lazy
from django.views.generic import ListView
from django.views.generic.edit import FormView
from .models import Car
from .forms import CarForm

# Create your views here.

class CarsView(ListView):
    model = Car
    template_name = 'coches/index.html'
    context_object_name = 'cars'

class GeneralView(FormView):
    template_name = 'coches/general.html'
    form_class = CarForm
    success_url = reverse_lazy('coches:general')

    def form_valid(self, form):
        salary = form.cleaned_data['salary']
        rent = form.cleaned_data['rent']
        costs = form.cleaned_data['costs']

        savings = salary - (rent + costs)

        cars = Car.objects.all()

        for car in cars:
            money = 0
            years = 0
            months = 0
            while money < car.car_price:
                money += savings
                months += 1
                if months == 12:
                    years += 1
                    months = 0
                
                car.years = years
                car.months = months
                car.save()
            
        context = self.get_context_data()
        context['form'] = form
        context['cars'] = cars
            
        return self.render_to_response(context)