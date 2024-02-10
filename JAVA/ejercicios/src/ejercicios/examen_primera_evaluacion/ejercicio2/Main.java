package ejercicios.examen_primera_evaluacion.ejercicio2;

import ejercicios.utils.Utils;

public class Main {
	public static void main(String[] args) {
		
		int[] randomNumbers = new int[Utils.getMenuOptionGreaterThanMinimum("Introduce el tamaño del array(Debe ser mayor o igual que 1):", 1)];
		
		final int MINIMUM_RANDOM_NUMBER = Utils.getMenuOptionGreaterThanMinimum("Introduce el número mínimo para la generación de números random(Debe ser mayor o igual que 0):", 0);
		
		final int MAXIMUM_RANDOM_NUMBER = Utils.getMenuOptionGreaterThanMinimum("Introduce el número máximo para la generación de números random(Debe ser mayor o igual que " + (MINIMUM_RANDOM_NUMBER + Utils.DEFAULT_VALUE_ONE) + "):", (MINIMUM_RANDOM_NUMBER + Utils.DEFAULT_VALUE_ONE));
		
		System.out.print("Array de números aleatorios: ");
		
		for(int i = 0; i < randomNumbers.length; i++) {
			randomNumbers[i] = (int)(Math.random() * MAXIMUM_RANDOM_NUMBER) + MINIMUM_RANDOM_NUMBER;
			System.out.printf(i != randomNumbers.length - Utils.DEFAULT_VALUE_ONE ? "%d, " : "%d\n\r", randomNumbers[i]);
		}
		int menuOption;
		do {
			menuOption = Utils.getMenuOptionGreaterThanMinimumAndLesserThanMaximum("1. Ver número más alto del array\n2. Obtener array ordenado\n3. Ver número en el array y número de veces que aparece\n4. Obtener array con números impares\n5. Salir", 1, 5);
			
			switch(menuOption) {
			case 1:
				System.out.printf("Número mayor del array: %d\n\r",getGreaterNumber(randomNumbers));
				break;
				
			case 2:
				int[] orderedArray =  sortArray(randomNumbers);
				System.out.print("Array de números aleatorios ordenado:");
				for(int i = 0; i < orderedArray.length; i++) {
					System.out.printf(i != orderedArray.length - Utils.DEFAULT_VALUE_ONE ? "%d, " : "%d\n\r", orderedArray[i]);
				}
				break;
				
			case 3:
				valueIsInArray(randomNumbers);
				break;
				
			case 4:
				int[] oddArray = getOddNumbersArray(randomNumbers);
				for(int i = 0; i < oddArray.length; i++) {
					System.out.printf(i != oddArray.length - Utils.DEFAULT_VALUE_ONE ? "%d, " : "%d\n\r", oddArray[i]);
				}
				break;
				
			case 5:
				Utils.getFarewellString();
				
			default:
				break;
			}
		} while(menuOption != 5);
	}
	
	public static int getGreaterNumber(int[] array) {
		int greaterNumber = 0;
		for(int i = 0; i < array.length; i++) {
			if(i == Utils.DEFAULT_VALUE_ZERO) {
				greaterNumber = array[i];
			} else {
				if(array[i] > greaterNumber) {
					greaterNumber = array[i];
				}
			}
		}
		return greaterNumber;
	}
	
	public static int[] sortArray(int[] array) {
		int greaterNumber = 0;
		for(int r = 0; r < array.length; r++) {
			for(int c = 1; c < array.length; c++) {
				greaterNumber = array[c];
				if(array[c] < array[c - Utils.DEFAULT_VALUE_ONE]) {
					greaterNumber = array[c - Utils.DEFAULT_VALUE_ONE];
					array[c - Utils.DEFAULT_VALUE_ONE] = array[c];
					array[c] = greaterNumber;
				}
			}
		}
		return array;
	}
	
	public static void valueIsInArray(int[] array) {
		int acc = 0;
		final int SEARCHED_NUMBER = Utils.getMenuOptionGreaterThanMinimum("Introduce el valor que deseas buscar(Debe ser mayor o igual a 0):", 0);
		for(int i = 0; i < array.length; i++) {
			if(SEARCHED_NUMBER == array[i]) {
				acc++;
			}
		}
		System.out.printf(acc == Utils.DEFAULT_VALUE_ZERO ? "El número %d no se encuentra en el array\n\r" : "El número %d se encuentra en el array un total de %d\n\r", SEARCHED_NUMBER, acc);
	}
	
	public static int[] getOddNumbersArray(int[] array) {
		int oddAcc = 0;
		for(int element : array) {
			if(element % Utils.DEFAULT_VALUE_TWO != Utils.DEFAULT_VALUE_ZERO) {
				oddAcc++;
			}
		}
		int[] oddArray = new int[oddAcc];
		oddAcc = 0;
		for(int i = 0; i < array.length; i++) {
			if(array[i] % Utils.DEFAULT_VALUE_TWO != Utils.DEFAULT_VALUE_ZERO) {
				oddArray[oddAcc] = array[i];
				oddAcc++;
			}
		}
		return oddArray;
	}
}
