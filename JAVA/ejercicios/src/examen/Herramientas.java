package examen;

import java.util.Scanner;

public class Herramientas {
	
	final static Scanner SC = new Scanner(System.in);

	public final static int VALOR_CERO = 0;

	public final static int VALOR_UNO = 1;
	
	public final static String REGEX_MATRICULA = "\\d{4}[A-Z]{3}";
	
	public final static String REGEX_DNI = "\\d{8}[A-Z]";

	public static String obtenerString() {
		return SC.nextLine();
	}

	public static String obtenerStringConMenu(String textoString) {
		String nombreString;
		do {
			System.out.printf("%s\n\r", textoString);
			nombreString = obtenerString();
		} while(nombreString.equals(""));
		return nombreString;
	}

	public static int obtenerNumeroIntConMenu(String textoNumeroInt) {
		Integer numeroInt = null;
		do {
			System.out.println(textoNumeroInt);
			try {
				numeroInt = Integer.parseInt(SC.nextLine());
			} catch(NumberFormatException nfe) {
				System.out.printf("Caracter incorrecto. %s\n\r", textoNumeroInt);
			}
		} while(numeroInt == null);
		return numeroInt;
	}

	public static int obtenerNumeroIntConMenuMayorQueMinimo(String textoNumeroIntMayor, int numeroIntMinimo) {
		int numeroIntMayorMinimo;
		do {
			numeroIntMayorMinimo = obtenerNumeroIntConMenu(textoNumeroIntMayor);
		} while(numeroIntMayorMinimo < numeroIntMinimo);
		return numeroIntMayorMinimo;
	}

	public static int obtenerNumeroIntConMenuMayorQueMinimoMenorQueMaximo(String textoNumeroIntMayorMenor, int numeroIntMinimo, int numeroIntMaximo) {
		int numeroIntMayorMinimoMenorMaximo;
		do {
			numeroIntMayorMinimoMenorMaximo = obtenerNumeroIntConMenuMayorQueMinimo(textoNumeroIntMayorMenor, numeroIntMinimo);
		} while(numeroIntMayorMinimoMenorMaximo > numeroIntMaximo);
		return numeroIntMayorMinimoMenorMaximo;
	}

	public static float obtenerNumeroFloatConMenu(String textoNumeroFloat) {
		Float numeroFloat = null;
		do {
			System.out.println(textoNumeroFloat);
			try {
				numeroFloat = Float.parseFloat(SC.nextLine());
			} catch(NumberFormatException nfe) {
				System.out.printf("Caracter incorrecto. %s\n\r", textoNumeroFloat);
			}
		} while(numeroFloat == null);
		return numeroFloat;
	}

	public static float obtenerNumeroFloatConMenuMayorQueMinimo(String textoNumeroFloatMayor, float numeroFloatMinimo) {
		float numeroFloatMayorMinimo;
		do {
			numeroFloatMayorMinimo = obtenerNumeroFloatConMenu(textoNumeroFloatMayor);
		} while(numeroFloatMayorMinimo < numeroFloatMinimo);
		return numeroFloatMayorMinimo;
	}

	public static float obtenerNumeroFloatConMenuMayorQueMinimoMenorQueMaximo(String textoNumeroFloatMayorMenor, float numeroFloatMinimo, float numeroFloatMaximo) {
		float numeroFloatMayorMinimoMenorMaximo;
		do {
			numeroFloatMayorMinimoMenorMaximo = obtenerNumeroFloatConMenuMayorQueMinimo(textoNumeroFloatMayorMenor, numeroFloatMinimo);
		} while(numeroFloatMayorMinimoMenorMaximo > numeroFloatMaximo);
		return numeroFloatMayorMinimoMenorMaximo;
	}

	public static void mostrarTitulo(String titulo) {
		System.out.printf("%s\n\r", titulo);
	}

	public static String esStringValido(String textoMenu, String regex) {
		String string;
		do {
			string = obtenerStringConMenu(textoMenu);
		} while(string.matches(regex) == false);
		return string;
	}
}
