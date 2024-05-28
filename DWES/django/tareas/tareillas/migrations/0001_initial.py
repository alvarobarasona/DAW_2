# Generated by Django 5.0.4 on 2024-05-25 10:32

from django.db import migrations, models


class Migration(migrations.Migration):

    initial = True

    dependencies = [
    ]

    operations = [
        migrations.CreateModel(
            name='Tarea',
            fields=[
                ('id', models.BigAutoField(auto_created=True, primary_key=True, serialize=False, verbose_name='ID')),
                ('titulo', models.CharField(max_length=100)),
                ('descripcion', models.TextField()),
                ('fecha_creacion', models.DateTimeField(auto_now_add=True)),
                ('fecha_vencimiento', models.DateTimeField()),
                ('prioridad', models.CharField(choices=[('alta', 'Alta'), ('baja', 'Baja')], max_length=4)),
                ('estado', models.CharField(choices=[('pendiente', 'Pendiente'), ('en_progreso', 'En progreso'), ('completada', 'Completada')], max_length=20)),
            ],
        ),
    ]
