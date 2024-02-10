package ejercicios.herencia.practica11_6;

import java.util.Date;

public class Hydraulic extends Industrial {

	private float fluidPressure;
	
	public Hydraulic(int serialNumber, String machineClass, String model, int operatingHours, float price, Date manufacturingDate, float consumptionPower, float fluidPressure) {
		super(serialNumber, machineClass, model, operatingHours, price, manufacturingDate, consumptionPower);
		this.fluidPressure = fluidPressure;
	}

	public float getFluidPressure() {
		return fluidPressure;
	}

	public void setFluidPressure(float fluidPressure) {
		this.fluidPressure = fluidPressure;
	}

	@Override
	public void light() {
		System.out.printf("Encendido mediante presión de fluidos de %f t.\n\r", fluidPressure);
	}

	@Override
	public void turnOff() {
		System.out.println("Apagado al cortar la presión de fluidos.\n\r");
	}

	@Override
	public String toString() {
		return super.toString() + "\nPresión de fluidos: " + fluidPressure;
	}
}
