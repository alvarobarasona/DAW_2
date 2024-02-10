package ejercicios.herencia.practica11_6;

import java.util.Date;

public class RoboticArm extends Industrial {
	
	private float electricEnergy;
	private String armTermination;
	private int numberOfSegments;
	
	public RoboticArm(int serialNumber, String machineClass, String model, int operatingHours, float price, Date manufacturingDate, float consumptionPower, float electricEnergy, String armTermination, int numberOfSegments) {
		super(serialNumber, machineClass, model, operatingHours, price, manufacturingDate, consumptionPower);
		this.electricEnergy = electricEnergy;
		this.armTermination = armTermination;
		this.numberOfSegments = numberOfSegments;
	}
	
	public float getElectricEnergy() {
		return electricEnergy;
	}

	public void setElectricEnergy(float electricEnergy) {
		this.electricEnergy = electricEnergy;
	}

	public String getArmTermination() {
		return armTermination;
	}

	public void setArmTermination(String armTermination) {
		this.armTermination = armTermination;
	}

	public int getNumberOfSegments() {
		return numberOfSegments;
	}

	public void setNumberOfSegments(int numberOfSegments) {
		this.numberOfSegments = numberOfSegments;
	}
	
	@Override
	public void light() {
		System.out.printf("Encendido mediante energía eléctrica de %f kw.\n\r", electricEnergy);
	}

	@Override
	public void turnOff() {
		System.out.println("Apagado al cortar la energía eléctrica.\n\r");
	}

	@Override
	public String toString() {
		return super.toString() + "\nEnergía eléctrica: " + electricEnergy + "\nTerminación del brazo: " + armTermination
		+ "\nNúmero de segmentos: " + numberOfSegments;
	}
}
