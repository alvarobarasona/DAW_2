package ejercicios.utils;

import java.util.Scanner;

public class Utils {
	
	final static Scanner SC = new Scanner(System.in);
	
	public final static String LINE_BREAK = "\n";
	
	public final static int DEFAULT_VALUE_ONE = 1;
	
	public static String getString() {
		String String = SC.nextLine();
		return String;
	}
	
	public static String getMenuString(String text) {
		System.out.println(text);
		String menuString = getString();
		return menuString;
	}
	
	public static int isNumber() {
		Integer number = null;
		do {
			try {
				number = Integer.parseInt(SC.nextLine());
			} catch(NumberFormatException nfe) {
				System.out.println("Caracter incorrecto\n");
			}
		} while(number == null);
		return number;
	}
	
	public static int getMenuNumberOption(String text) {
		System.out.println(text);
		int menuOption = isNumber();
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
}
