# Generated by Django 5.0.4 on 2024-05-28 11:24

from django.db import migrations, models


class Migration(migrations.Migration):

    dependencies = [
        ('cochines', '0002_coche_slug'),
    ]

    operations = [
        migrations.AlterField(
            model_name='coche',
            name='slug',
            field=models.SlugField(default='pula', max_length=100),
        ),
    ]