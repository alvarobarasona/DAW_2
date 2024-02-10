package ejercicios.herencia.practica11_6;

import java.util.Date;

public abstract class Machine {
	
	private int serialNumber;
	private String machineClass;
	private String model;
	private int operatingHours;
	private float price;
	private Date manufacturingDate;
	private String clientDni;
	
	public Machine(int serialNumber, String machineClass, String model, int operatingHours, float price, Date manufacturingDate) {
		this.serialNumber = serialNumber;
		this.machineClass = machineClass;
		this.model = model;
		this.operatingHours = operatingHours;
		this.price = price;
		this.manufacturingDate = manufacturingDate;
		clientDni = "En venta";
	}

	public int getSerialNumber() {
		return serialNumber;
	}

	public void setSerialNumber(int serialNumber) {
		this.serialNumber = serialNumber;
	}

	public String getMachineClass() {
		return machineClass;
	}

	public void setMachineClass(String machineClass) {
		this.machineClass = machineClass;
	}

	public String getModel() {
		return model;
	}

	public void setModel(String model) {
		this.model = model;
	}

	public int getOperatingHours() {
		return operatingHours;
	}

	public void setOperatingHours(int operatingHours) {
		this.operatingHours = operatingHours;
	}

	public float getPrice() {
		return price;
	}

	public void setPrice(float price) {
		this.price = price;
	}
	
	public Date getManufacturingDate() {
		return manufacturingDate;
	}

	public void setManufacturingDate(Date manufacturingDate) {
		this.manufacturingDate = manufacturingDate;
	}

	public String getClientDni() {
		return clientDni;
	}

	public void setClientDni(String clientDni) {
		this.clientDni = clientDni;
	}

	public abstract void light();
	
	public abstract void turnOff();

	@Override
	public String toString() {
		return "Número de serie: " + serialNumber + "\nClase de máquina: " + machineClass + "\nModelo: " + model
		+ "\nHoras operativas: " + operatingHours + "\nPrecio: " + price + " €\nFecha de fabricación: " + manufacturingDate + "\nDNI del cliente:" + clientDni;
	}
}