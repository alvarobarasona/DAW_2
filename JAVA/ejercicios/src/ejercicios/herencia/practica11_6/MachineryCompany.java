package ejercicios.herencia.practica11_6;

import java.util.ArrayList;

public class MachineryCompany implements Brand{

	private String name;
	private ArrayList <Machine> machinesForSale;
	private ArrayList <Machine> machinesSold;
	private ArrayList <Client> clientList;
	private double budget;
	private int serialNumber;
	
	Machine machine;
	
	public MachineryCompany() {
		name = BRAND;
		machinesForSale = new ArrayList<>();
		machinesSold = new ArrayList<>();
		clientList = new ArrayList<>();
		budget = 0d;
		serialNumber = 0;
	}

	public String getName() {
		return name;
	}

	public void showCertificateOfApproval() {
		System.out.printf("Certificado de Aprobación\n\rIndustrias %s, S.A\n\rNúmero de Aprobación: %s - %d\n\r", BRAND, CERTIFICATION, APPROVAL_NUMBER);
	}
	
	public void addElectricMachine(String machineClass) {
		machine = new Electric(machine.setSerialNumber(serialNumber), machine.setMachineClass(machineClass),);
	}
}
