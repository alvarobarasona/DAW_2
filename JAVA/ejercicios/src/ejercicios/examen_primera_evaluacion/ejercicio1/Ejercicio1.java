package ejercicios.examen_primera_evaluacion.ejercicio1;

import ejercicios.utils.Utils;

public class Ejercicio1 {
	public static void main(String[] args) {
		
		final int MINIMUM_CATEGORY_OPTION = 1;
		final int MAXIMUM_CATEGORY_OPTION = 3;
		
		int numberCategory;
		
		do {
			numberCategory = Utils.getMenuOptionGreaterThanMinimumAndLesserThanMaximum("Introduce la categoría del trabajador:\n1. A\n2. B\n3. C", MINIMUM_CATEGORY_OPTION, MAXIMUM_CATEGORY_OPTION);
		} while(numberCategory < MINIMUM_CATEGORY_OPTION || numberCategory > MAXIMUM_CATEGORY_OPTION);
		
		final String CATEGORY;
		
		if(numberCategory == Utils.DEFAULT_VALUE_ONE) {
			CATEGORY = "A";
		} else if(numberCategory == Utils.DEFAULT_VALUE_TWO) {
			CATEGORY = "B";
		} else {
			CATEGORY = "C";
		}
		
		final int MINIMUM_ANTIQUITY = 1;
		
		int antiquity = Utils.getMenuOptionGreaterThanMinimum("Introduce la antiguedad trabajador(Debe ser mayor o igual a 1 año):", MINIMUM_ANTIQUITY);

		System.out.printf("El salario final del trabajador es de %.2f €", getSalary(CATEGORY, antiquity));
	}
	
	public static float getSalary(String category, int antiquity) {
		
		final float BASE_SALARY = 1040.00f;
		
		float categoryIncrement = 0.0f;
		
		switch(category) {
			case "A":
				categoryIncrement = ((10 * BASE_SALARY) / 100);
				break;
				
			case "B":
				categoryIncrement = ((30 * BASE_SALARY) / 100);
				break;
				
			case "C":
				categoryIncrement = ((50 * BASE_SALARY) / 100);
				break;
				
			default:
				break;
		}
		
		final int ANTIQUITY_INCREMENT;
		
		if(antiquity < Utils.DEFAULT_VALUE_THREE) {
			ANTIQUITY_INCREMENT = 100;
		} else if(antiquity >= 3 && antiquity < 5) {
			ANTIQUITY_INCREMENT = 300;
		} else {
			ANTIQUITY_INCREMENT = 500;
		}
		
		return BASE_SALARY + categoryIncrement + ANTIQUITY_INCREMENT;
	}
}
