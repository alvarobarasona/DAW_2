package ejercicios.objetos.practica7_1;

import ejercicios.utils.Utils;

public class Main {
	public static void main(String[] args) {
	
		final int MINIMUM_RECTANGLE_WIDTH = 2;
		final int MINIMUM_RECTANGLE_HEIGHT = 1;
		final int RECTANGLE_WIDTH = Utils.getMenuOptionGreaterThanMinimum("Introduce la anchura del rectángulo(No puede ser menor de " + MINIMUM_RECTANGLE_WIDTH + "): ", MINIMUM_RECTANGLE_WIDTH);
		final int RECTANGLE_HEIGHT = Utils.getMenuOptionGreaterThanMinimum("Introduce la altura del rectángulo(No puede ser menor de " + MINIMUM_RECTANGLE_HEIGHT + "): ", MINIMUM_RECTANGLE_HEIGHT);
		
		Rectangle rectangle = new Rectangle(RECTANGLE_WIDTH, RECTANGLE_HEIGHT);
		
		int MAXIMUM_MENU_STRING = 8;
		int menuOption;
		
		System.out.println("\n¡Bienvenido al sistema de gestión de cuadrados!\n");
		do {
			
			final String MENU_OPTION_1 = "1. Imprimir rectángulo con '*'";
			final String MENU_OPTION_2 = "2. Imprimir rectángulo tuneado";
			final String MENU_OPTION_3 = "3. Imprimir rectángulo con las proporciones invertidas";
			final String MENU_OPTION_4 = "4. Área";
			final String MENU_OPTION_5 = "5. Perímetro";
			final String MENU_OPTION_6 = "6. Diagonal";
			final String MENU_OPTION_7 = "7. Crear cuadrado";
			final String MENU_OPTION_8 = "8. Salir";
			
			final int MINIMUM_MENU_STRING = 1;
			final String SQUARE_MENU_STRING = "Introduce una opción(Del " + MINIMUM_MENU_STRING + " al " + MAXIMUM_MENU_STRING + "):"
			+ "\n" + MENU_OPTION_1
			+ "\n" + MENU_OPTION_2
			+ "\n" + MENU_OPTION_3
			+ "\n" + MENU_OPTION_4
			+ "\n" + MENU_OPTION_5
			+ "\n" + MENU_OPTION_6
			+ "\n" + MENU_OPTION_7
			+ "\n" + MENU_OPTION_8
			+ "\n\r";
			menuOption = Utils.getMenuOptionGreaterThanMinimumAndLesserThanMaximum(SQUARE_MENU_STRING, MINIMUM_MENU_STRING, MAXIMUM_MENU_STRING);
			
			switch(menuOption) {
			case 1:
				Utils.showTitle(MENU_OPTION_1);
				rectangle.printRectangle();
				break;
				
			case 2:
				Utils.showTitle(MENU_OPTION_2);
				String inputSign;
				do {
					inputSign = Utils.getMenuString("Introduce un único caracter:");
				} while(inputSign.length() > Utils.DEFAULT_VALUE_ONE);
				rectangle.printSign(inputSign);
				break;
				
			case 3:
				Utils.showTitle(MENU_OPTION_3);
				rectangle.printInverseSquare();
				break;
				
			case 4:
				Utils.showTitle(MENU_OPTION_4);
				System.out.printf("Área del rectángulo: %.2f px\n\r", rectangle.getRectangleArea());
				break;
				
			case 5:
				Utils.showTitle(MENU_OPTION_5);
				System.out.printf("Perímetro del rectángulo: %.2f px\n\r", rectangle.getRectanglePerimeter());
				break;
				
			case 6:
				Utils.showTitle(MENU_OPTION_6);
				System.out.printf("Diagonal del rectángulo: %.2f px\n\r", rectangle.getRectangleDiagonal());
				break;
				
			case 7:
				Utils.showTitle(MENU_OPTION_7);
				final int MINIMUM_SQUARE_DIMENSION = 2;
				final int SQUARE_DIMENSION = Utils.getMenuOptionGreaterThanMinimum("Introduce la anchura del cuadrado(No puede ser menor de " + MINIMUM_SQUARE_DIMENSION + "): ", MINIMUM_SQUARE_DIMENSION);
				Rectangle square = new Rectangle(SQUARE_DIMENSION, SQUARE_DIMENSION);
				square.printRectangle();
				break;
				
			case 8:
				Utils.getFarewellString();

			default:
				break;
				
			}
		} while(menuOption != MAXIMUM_MENU_STRING);
	}
}
