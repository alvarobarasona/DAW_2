# Generated by Django 5.0.4 on 2024-06-05 11:14

import django.db.models.deletion
from django.db import migrations, models


class Migration(migrations.Migration):

    initial = True

    dependencies = [
    ]

    operations = [
        migrations.CreateModel(
            name='Cliente',
            fields=[
                ('id', models.BigAutoField(auto_created=True, primary_key=True, serialize=False, verbose_name='ID')),
                ('nombre', models.CharField(max_length=80)),
                ('apellido', models.CharField(max_length=80)),
                ('direccion', models.CharField(max_length=150)),
                ('fecha_nacimiento', models.DateField()),
                ('foto', models.FileField(upload_to='clientes/')),
                ('slug', models.SlugField(blank=True, null=True)),
            ],
        ),
        migrations.CreateModel(
            name='Videojuego',
            fields=[
                ('id', models.BigAutoField(auto_created=True, primary_key=True, serialize=False, verbose_name='ID')),
                ('titulo', models.CharField(max_length=80)),
                ('precio', models.DecimalField(decimal_places=2, max_digits=10)),
                ('slug', models.SlugField(blank=True, null=True)),
                ('cliente', models.ForeignKey(on_delete=django.db.models.deletion.CASCADE, to='jueguitos.cliente')),
            ],
        ),
    ]
