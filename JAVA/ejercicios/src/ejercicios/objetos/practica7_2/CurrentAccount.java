package ejercicios.objetos.practica7_2;

import ejercicios.utils.Utils;

public class CurrentAccount {
	private String name;
	private String surnames;
	private String dni;
	private String direction;
	private long accountNumber;
	private double balance;
	public CurrentAccount(String name, String surnames, String dni, String direction, long accountNumber, double balance) {
		this.name = name;
		this.surnames = surnames;
		this.dni = dni;
		this.direction = direction;
		this.accountNumber = accountNumber;
		this.balance = balance;
	}
	public double getBalance() {
		return balance;
	}

	public void setBalance(double balance) {
		this.balance = balance;
	}

	public double depositMoney(double moneyToDeposit) {
		balance += moneyToDeposit;
		return balance;
	}
	public double withdrawMoney(double moneyToWithdraw) {
		balance -= moneyToWithdraw;
		return balance;
	}
	public void showBalance() {
		System.out.println(balance);
	}
	public void showDataAndModify() {
		System.out.println("Nombre: " + name + "\nApellidos: " + surnames + "\nDNI: "
		+ dni + "\nDirección: " + direction + "\nNúmero de cuenta: " + accountNumber + "\nSaldo: " + balance + "\n");
		final int CHANGE_DATA_MINIMUM = 1;
		final int CHANGE_DATA_MAXIMUM = 2;
		String changeDataMenu = "¿Quieres cambiar los datos del propietario de la cuenta?"
		+ "\nPara SÍ pulsa " + CHANGE_DATA_MINIMUM
		+ ".\nPara NO pulsa " + CHANGE_DATA_MAXIMUM + ".";
		if(Utils.getMenuOptionGreaterThanMinimumAndLesserThanMaximum(changeDataMenu, CHANGE_DATA_MINIMUM, CHANGE_DATA_MAXIMUM) == Utils.DEFAULT_VALUE_ONE) {

			final int NUMBER_OF_OPTIONS_TO_CHANGE = 4;
			for(int i = 0; i < NUMBER_OF_OPTIONS_TO_CHANGE; i++) {
				String changeMenuString = "";
				final int MINIMUM_OPTION_CHANGE_ATRIBUTE = 1;
				final int MAXIMUM_OPTION_CHANGE_ATRIBUTE = 2;
				switch(i) {
					case 0:
						changeMenuString = "¿Quieres cambiar el nombre?\nPara SÍ pulsa " + MINIMUM_OPTION_CHANGE_ATRIBUTE + ".\nPara NO pulsa " + MAXIMUM_OPTION_CHANGE_ATRIBUTE + ".";
						if(Utils.getMenuOptionGreaterThanMinimumAndLesserThanMaximum(changeMenuString, MINIMUM_OPTION_CHANGE_ATRIBUTE, MAXIMUM_OPTION_CHANGE_ATRIBUTE) == Utils.DEFAULT_VALUE_ONE) {
							name = Utils.getMenuString("Introduce el nombre del cliente:");
						}
						break;
					case 1:
						changeMenuString = "¿Quieres cambiar los apellidos?\nPara SÍ pulsa " + MINIMUM_OPTION_CHANGE_ATRIBUTE + ".\nPara NO pulsa " + MAXIMUM_OPTION_CHANGE_ATRIBUTE + ".";
						if(Utils.getMenuOptionGreaterThanMinimumAndLesserThanMaximum(changeMenuString, MINIMUM_OPTION_CHANGE_ATRIBUTE, MAXIMUM_OPTION_CHANGE_ATRIBUTE) == Utils.DEFAULT_VALUE_ONE) {
							surnames = Utils.getMenuString("Introduce los apellidos del cliente:");
						}
						break;
					case 2:
						changeMenuString = "¿Quieres cambiar el DNI?\nPara SÍ pulsa " + MINIMUM_OPTION_CHANGE_ATRIBUTE + ".\nPara NO pulsa " + MAXIMUM_OPTION_CHANGE_ATRIBUTE + ".";
						if(Utils.getMenuOptionGreaterThanMinimumAndLesserThanMaximum(changeMenuString, MINIMUM_OPTION_CHANGE_ATRIBUTE, MAXIMUM_OPTION_CHANGE_ATRIBUTE) == Utils.DEFAULT_VALUE_ONE) {
							dni = Utils.getMenuString("Introduce el DNI del cliente:");
						}
						break;
					case 3:
						changeMenuString =  "¿Quieres cambiar la dirección?\nPara SÍ pulsa " + MINIMUM_OPTION_CHANGE_ATRIBUTE + ".\nPara NO pulsa " + MAXIMUM_OPTION_CHANGE_ATRIBUTE + ".";
						if(Utils.getMenuOptionGreaterThanMinimumAndLesserThanMaximum(changeMenuString, MINIMUM_OPTION_CHANGE_ATRIBUTE, MAXIMUM_OPTION_CHANGE_ATRIBUTE) == Utils.DEFAULT_VALUE_ONE) {
							direction = Utils.getMenuString("Introduce la dirección del cliente:");
						}
					default:
						break;
				}
			}
		}
	}
}
