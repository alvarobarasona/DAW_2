# Generated by Django 5.0.4 on 2024-05-28 10:27

from django.db import migrations, models


class Migration(migrations.Migration):

    dependencies = [
        ('cochines', '0001_initial'),
    ]

    operations = [
        migrations.AddField(
            model_name='coche',
            name='slug',
            field=models.SlugField(null=True),
        ),
    ]