package ejercicios.objetos.practica7_3;

import ejercicios.utils.Utils;

public class Main {
	public static void main(String[] args) {
		
		final Date BIRTHDAY_DATE = new Date(26, 02, 1995);
		
		System.out.println("Fecha formateada: ".concat(BIRTHDAY_DATE.returnFormatedDate().concat((BIRTHDAY_DATE.isLeapYear() ? "\nEl año " + BIRTHDAY_DATE.getYear() + " es bisiesto.\n" : "\nEl año " + BIRTHDAY_DATE.getYear() + " no es bisiesto.\n"))));

		final int MINIMUM_DAY = 1;
		final int MAXIMUM_DAY = 30;
		final String MENU_DAY_STRING = "Introduce el número del día (Debe ser mayor o igual que " + MINIMUM_DAY + " y menor o igual que " + MAXIMUM_DAY + "):";
		
		final int DAY = Utils.getMenuOptionGreaterThanMinimumAndLesserThanMaximum(MENU_DAY_STRING, MINIMUM_DAY, MAXIMUM_DAY);
		
		final int MINIMUM_MONTH = 1;
		final int MAXIMUM_MONTH = 12;
		final String MENU_MONTH_STRING = "Introduce el número del mes (Debe ser mayor o igual que " + MINIMUM_MONTH + " y menor o igual que " + MAXIMUM_MONTH + "):";
		
		final int MONTH = Utils.getMenuOptionGreaterThanMinimumAndLesserThanMaximum(MENU_MONTH_STRING, MINIMUM_MONTH, MAXIMUM_MONTH);
		
		final int MINIMUM_YEAR = 1914;
		final int MAXIMUM_YEAR = 2024;
		final String MENU_YEAR_STRING = "Introduce el número del mes (Debe ser mayor o igual que " + MINIMUM_YEAR + " y menor o igual que " + MAXIMUM_YEAR + "):";
		
		final int YEAR = Utils.getMenuOptionGreaterThanMinimumAndLesserThanMaximum(MENU_YEAR_STRING, MINIMUM_YEAR, MAXIMUM_YEAR);
		
		final Date NEW_DATE = new Date(DAY, MONTH, YEAR);
		
		System.out.println("Fecha formateada: ".concat(NEW_DATE.returnFormatedDate()
		.concat((NEW_DATE.isLeapYear() ? "\nEl año " + NEW_DATE.getYear() + " es bisiesto.\n" : "\nEl año " + NEW_DATE.getYear() + " no es bisiesto.\n")
		.concat("El número de días entre el ".concat(BIRTHDAY_DATE.returnFormatedDate().concat(" y el ".concat(NEW_DATE.returnFormatedDate().concat(" es de " + Date.getNumberOfDaysBetweenTwoDates(BIRTHDAY_DATE, NEW_DATE) + " días."))))))));
	}
}