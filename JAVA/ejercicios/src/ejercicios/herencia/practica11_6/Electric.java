package ejercicios.herencia.practica11_6;

import java.util.Date;

public class Electric extends Industrial {
	
	private float kineticEnergy;
	
	public Electric(int serialNumber, String machineClass, String model, int operatingHours, float price, Date manufacturingDate, float consumptionPower, float kineticEnergy) {
		super(serialNumber, machineClass, model, operatingHours, price, manufacturingDate, consumptionPower);
		this.kineticEnergy = kineticEnergy;
	}

	public float getKineticEnergy() {
		return kineticEnergy;
	}

	public void setKineticEnergy(float kineticEnergy) {
		this.kineticEnergy = kineticEnergy;
	}
	
	@Override
	public void light() {
		System.out.printf("Encendido mediante energía cinética de %f kw.\n\r", kineticEnergy);
	}

	@Override
	public void turnOff() {
		System.out.println("Apagado al cortar la energía cinética.\n\r");
	}
	
	@Override
	public String toString() {
		return super.toString() + "\nEnergía cinética: " + kineticEnergy;
	}
}
