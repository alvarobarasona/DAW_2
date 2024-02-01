package ejercicios_java.practica7_2;

import ejercicios_java.utils.Utils;

public class Main {
	public static void main(String[] args) {
		CurrentAccount currentCount = new CurrentAccount("Leovigildo", "Contreras Ramirez", "56712584D", "C/ Salchipapa, nº 45", 4345656567546547236l, 32526);
		final int MAXIMUM_MENU_ROOT_OPTION = 5;
		int rootMenuOption;
		do {
			final int MIMUM_MENU_ROOT_OPTION = 1;
			final String OPTION_1 = "1. Sacar dinero".concat(Utils.LINE_BREAK);
			final String OPTION_2 = "2. Ingresar dinero".concat(Utils.LINE_BREAK);
			final String OPTION_3 = "3. Consultar saldo".concat(Utils.LINE_BREAK);
			final String OPTION_4 = "4. Modificar datos personales".concat(Utils.LINE_BREAK);
			final String OPTION_5 = "5. Terminar".concat(Utils.LINE_BREAK);
			String rootMenu = "Bienvenido al cajero automático.".concat(Utils.LINE_BREAK)
					+ "Introduce una opción(Del " + MIMUM_MENU_ROOT_OPTION + " al " +  MAXIMUM_MENU_ROOT_OPTION +"):".concat(Utils.LINE_BREAK)
					+ OPTION_1.concat(Utils.LINE_BREAK)
					+ OPTION_2.concat(Utils.LINE_BREAK)
					+ OPTION_3.concat(Utils.LINE_BREAK)
					+ OPTION_4.concat(Utils.LINE_BREAK)
					+ OPTION_5.concat(Utils.LINE_BREAK);
			final double EMPTY_ACCOUNT = 0.0f;
			rootMenuOption = Utils.getMenuOptionGreaterThanMinimumAndLesserThanMaximum(rootMenu, MIMUM_MENU_ROOT_OPTION, MAXIMUM_MENU_ROOT_OPTION);
			switch(rootMenuOption) {
				case 1:
					System.out.println(OPTION_1);
					final double MINIMUM_WITHDRAW_MONEY = 0.01f;
					if(currentCount.getBalance() <= EMPTY_ACCOUNT) {
						System.out.println("No queda saldo disponible en la cuenta.".concat(Utils.LINE_BREAK));
					} else {
						String withdrawMoneyMenuString = "Introduce el saldo a retirar (Saldo: " + currentCount.getBalance() + "€):".concat(Utils.LINE_BREAK);
						System.out.println("Saldo Disponible: " + currentCount.withdrawMoney(Utils.getMenuDoubleNumberOptionGreaterThanMinimumAndLesserThanMaximum(withdrawMoneyMenuString, MINIMUM_WITHDRAW_MONEY, currentCount.getBalance())) + "€");
					}
					break;
				case 2:
					System.out.println(OPTION_2);
					final double MINIMUM_MONEY_TO_DEPOSIT = 0.01f;
					if(currentCount.getBalance() <= EMPTY_ACCOUNT) {
						System.out.println("No queda saldo disponible en la cuenta.".concat(Utils.LINE_BREAK));
					} else {
						String moneyToDeposit = "Introduce el saldo a ingresar (Saldo: " + currentCount.getBalance() + "€):".concat(Utils.LINE_BREAK);
						System.out.println("Saldo Disponible: " + currentCount.withdrawMoney(Utils.getMenuDoubleNumberOptionGreaterThanMinimumAndLesserThanMaximum(withdrawMoneyMenuString, MINIMUM_WITHDRAW_MONEY, currentCount.getBalance())) + "€");
					}
				case 3:
					System.out.println(OPTION_3.concat("Saldo Disponible: " + currentCount.getBalance()  + "€"));
					break;
			}
		} while(rootMenuOption != MAXIMUM_MENU_ROOT_OPTION);
	}
}