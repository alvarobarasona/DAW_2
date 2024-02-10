package ejercicios.herencia.practica11_6;

import java.util.Date;

public abstract class Industrial extends Machine {
	
	private float consumptionPower;
	
	public Industrial(int serialNumber, String machineClass, String model, int operatingHours, float price, Date manufacturingDate, float consumptionPower) {
		super(serialNumber, machineClass, model, operatingHours, price, manufacturingDate);
		this.consumptionPower = consumptionPower;
	}

	public float getConsumptionPower() {
		return consumptionPower;
	}

	public void setConsumptionPower(float consumptionPower) {
		this.consumptionPower = consumptionPower;
	}

	@Override
	public String toString() {
		return super.toString() + "\nEnergía de consumo: " + consumptionPower + " KW";
	}
}
