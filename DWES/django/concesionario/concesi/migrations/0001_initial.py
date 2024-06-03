# Generated by Django 5.0.4 on 2024-06-01 10:50

import django.db.models.deletion
from django.db import migrations, models


class Migration(migrations.Migration):

    initial = True

    dependencies = [
    ]

    operations = [
        migrations.CreateModel(
            name='Persona',
            fields=[
                ('id', models.BigAutoField(auto_created=True, primary_key=True, serialize=False, verbose_name='ID')),
                ('nombre', models.CharField(max_length=70)),
                ('apellido', models.CharField(max_length=70)),
                ('fecha_nacimiento', models.DateField()),
                ('foto', models.FileField(upload_to='personas/')),
                ('slug', models.SlugField(blank=True, null=True)),
            ],
        ),
        migrations.CreateModel(
            name='Coche',
            fields=[
                ('id', models.BigAutoField(auto_created=True, primary_key=True, serialize=False, verbose_name='ID')),
                ('fabricante', models.CharField(max_length=80)),
                ('modelo', models.CharField(max_length=80)),
                ('precio', models.DecimalField(decimal_places=2, max_digits=7)),
                ('imagen', models.FileField(upload_to='coches/')),
                ('slug', models.SlugField(blank=True, null=True)),
                ('persona', models.ForeignKey(on_delete=django.db.models.deletion.CASCADE, to='concesi.persona')),
            ],
        ),
    ]
