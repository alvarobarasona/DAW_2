package ejercicios.herencia.practica11_6;

import java.util.Date;

public class Thermal extends Industrial{
	
	private float temperatureVariation;

	public Thermal(int serialNumber, String machineClass, String model, int operatingHours, float price, Date manufacturingDate, float consumptionPower, float temperatureVariation) {
		super(serialNumber, machineClass, model, operatingHours, price, manufacturingDate, consumptionPower);
		this.temperatureVariation = temperatureVariation;
	}

	public float getTemperatureVariation() {
		return temperatureVariation;
	}

	public void setTemperatureVariation(float temperatureVariation) {
		this.temperatureVariation = temperatureVariation;
	}

	@Override
	public void light() {
		System.out.printf("Encendido mediante variación de temperatura de %f º.\n\r", temperatureVariation);
	}

	@Override
	public void turnOff() {
		System.out.println("Apagado al cambiar la variación de temperatura.\n\r");
	}

	@Override
	public String toString() {
		return super.toString() + "\nVariación de temperatura: " + temperatureVariation;
	}
}
