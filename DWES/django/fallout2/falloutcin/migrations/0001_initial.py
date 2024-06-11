# Generated by Django 5.0.4 on 2024-05-24 11:39

from django.db import migrations, models


class Migration(migrations.Migration):

    initial = True

    dependencies = [
    ]

    operations = [
        migrations.CreateModel(
            name='Personaje',
            fields=[
                ('id', models.BigAutoField(auto_created=True, primary_key=True, serialize=False, verbose_name='ID')),
                ('nombre', models.CharField(max_length=100)),
                ('slug', models.SlugField()),
                ('descripcion', models.TextField()),
                ('foto_portada', models.FileField(upload_to='portadas/')),
                ('foto_detalle', models.FileField(upload_to='detalles/')),
            ],
        ),
    ]