# Generated by Django 5.0.4 on 2024-05-22 18:40

from django.db import migrations, models


class Migration(migrations.Migration):

    dependencies = [
        ('productos', '0001_initial'),
    ]

    operations = [
        migrations.AlterField(
            model_name='producto',
            name='disponible',
            field=models.BooleanField(blank=True, default=False),
        ),
        migrations.AlterField(
            model_name='producto',
            name='fecha_final',
            field=models.DateField(blank=True),
        ),
        migrations.AlterField(
            model_name='producto',
            name='fecha_inicio',
            field=models.DateField(blank=True),
        ),
    ]