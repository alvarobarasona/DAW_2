package ejercicios.utils;

import java.util.Date;
import java.util.Scanner;

public class Utils {
	
	final static Scanner SC = new Scanner(System.in);
	
	public final static String LINE_BREAK = "\n";
	
	public final static int DEFAULT_VALUE_ZERO = 0;
	public final static int DEFAULT_VALUE_ONE = 1;
	public final static int DEFAULT_VALUE_TWO = 2;
	public final static int DEFAULT_VALUE_THREE = 3;
	public final static int DEFAULT_VALUE_FIVE = 5;
	
	public static String getString() {
		String String = SC.nextLine();
		return String;
	}
	
	public static String getMenuString(String text) {
		System.out.println(text);
		String menuString = getString();
		return menuString;
	}
	
	public static int isNumber(String text) {
		Integer number = null;
		do {
			try {
				number = Integer.parseInt(SC.nextLine());
			} catch(NumberFormatException nfe) {
				System.out.printf("Caracter incorrecto. %s\n", text);
			}
		} while(number == null);
		return number;
	}
	
	public static int getMenuNumberOption(String text) {
		System.out.println(text);
		int menuOption = isNumber(text);
		return menuOption;
	}
	
	public static int getMenuOptionGreaterThanMinimum(String text, int minimum) {
		int menuOptionGreaterThanMinimum;
		do {
			menuOptionGreaterThanMinimum = getMenuNumberOption(text);
		} while(menuOptionGreaterThanMinimum < minimum);
		return menuOptionGreaterThanMinimum;
	}
	
	public static int getMenuOptionGreaterThanMinimumAndLesserThanMaximum(String text, int minimum, int maximum) {
		int menuOptionGreaterThanMinimumAndLesserThanMaximum;
		do {
			menuOptionGreaterThanMinimumAndLesserThanMaximum = getMenuOptionGreaterThanMinimum(text, minimum);
		} while(menuOptionGreaterThanMinimumAndLesserThanMaximum < minimum || menuOptionGreaterThanMinimumAndLesserThanMaximum > maximum);
		return menuOptionGreaterThanMinimumAndLesserThanMaximum;
	}
	
	public static double isDoubleNumber() {
		Double doubleNumber = null;
		do {
			try {
				doubleNumber = Double.parseDouble(SC.nextLine());
			} catch(NumberFormatException nfe) {
				System.out.println("Caracter incorrecto\n");
			}
		} while(doubleNumber == null);
		return doubleNumber;
	}
	
	public static double getMenuDoubleNumberOption(String text) {
		System.out.println(text);
		double menuOption = isDoubleNumber();
		return menuOption;
	}
	
	public static double getMenuDoubleNumberOptionGreaterThanMinimum(String text, double minimum) {
		double menuDoubleNumberOptionGreaterThanMinimum;
		do {
			menuDoubleNumberOptionGreaterThanMinimum = getMenuDoubleNumberOption(text);
		} while(menuDoubleNumberOptionGreaterThanMinimum < minimum);
		return menuDoubleNumberOptionGreaterThanMinimum;
	}
	
	public static double getMenuDoubleNumberOptionGreaterThanMinimumAndLesserThanMaximum(String text, double minimum, double maximum) {
		double menuDoubleNumberOptionGreaterThanMinimumAndLesserThanMaximum;
		do {
			menuDoubleNumberOptionGreaterThanMinimumAndLesserThanMaximum = getMenuDoubleNumberOptionGreaterThanMinimum(text, minimum);
		} while(menuDoubleNumberOptionGreaterThanMinimumAndLesserThanMaximum < minimum || menuDoubleNumberOptionGreaterThanMinimumAndLesserThanMaximum > maximum);
		return menuDoubleNumberOptionGreaterThanMinimumAndLesserThanMaximum;
	}
	
	public static void showTitle(final String MENU_OPTION) {
		System.out.printf("%s\n\r", MENU_OPTION);
	}
	
	public static void getFarewellString() {
		String farwellString;
		Date actualDate = new Date();
		if(actualDate.getHours() < 6) {
			farwellString = "¡Hasta luego! Que tengas buena noche.".concat(Utils.LINE_BREAK);
		} else if(actualDate.getHours() >= 6 && actualDate.getHours() < 12) {
			farwellString = "¡Hasta luego! Que tengas buena mañana.".concat(Utils.LINE_BREAK);
		} else {
			farwellString = "¡Hasta luego! Que tengas buena tarde.".concat(Utils.LINE_BREAK);
		}
		System.out.print(farwellString);
	}
}
