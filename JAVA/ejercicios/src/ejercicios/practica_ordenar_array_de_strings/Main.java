package ejercicios.practica_ordenar_array_de_strings;

import java.util.Arrays;
import java.util.Collections;
import java.util.Comparator;

import ejercicios.utils.Utils;

public class Main {
	public static void main(String[] args) {
		
		String[] unorderedArray = {"Florin", "Yago", "Estrella", "Antonio", "Marino", "Jesús", "Triana", "Fermín", "María", "Joaquín", "Raquel", "Tomás", "Ana", "Rebeca", "Patricio", "Mar"};
		
		System.out.println("Array desordenado:\n");
		for(int i = 0; i < unorderedArray.length; i++) {
			System.out.printf(i != unorderedArray.length - Utils.DEFAULT_VALUE_ONE ? "%s, " : "%s", unorderedArray[i]);
		}
		
		String[] orderedArray = getOrderedArray(unorderedArray);
		System.out.println("\n\rArray ordenado alfabéticamente mediante bubble sort:\n");
		for(int i = 0; i < orderedArray.length; i++) {
			System.out.printf(i != orderedArray.length - Utils.DEFAULT_VALUE_ONE ? "%s, " : "%s\n\r", orderedArray[i]);
		}
		
		System.out.println("\nArray ordenado alfabéticamente de forma ascendente mediante el método sort:\n");
		Arrays.sort(unorderedArray);
		System.out.println(Arrays.toString(unorderedArray));
		
		System.out.println("\n\rArray ordenado alfabéticamente de forma descendente mediante el método sort:\n");
		Arrays.sort(unorderedArray, Comparator.reverseOrder());
		System.out.println(Arrays.toString(unorderedArray));
		
		System.out.println("\n\rAhora vamos a probar el método sort con un array de números\n");
		
		int[] numbersArray = {8, 2, 7, 5, 1, 14, 6, 3};
		System.out.println(Arrays.toString(numbersArray));
		
		System.out.println("\n\rArray de números ordenado ascendentemente mediante el método sort:\n");
		Arrays.sort(numbersArray);
		System.out.println(Arrays.toString(numbersArray));
		
		System.out.println("\n\rArray de números ordenado descendentemente mediante el método sort:\n");
		/*
		El método .stream() convierte el array int[] numbersArray en un flujo de datos de tipo int.
		El método .boxed() convierte ese flujo de datos de tipo int a la clase envolvente Integer.
		El método .toArray() coge el flujo de datos de tipo Integer y los introduce en el array numbersAsInteger.
		Integer[]::new hace referencia a un constructor, y viene a decir que se crea un array de Integer donde se guarda el flujo de datos de tipo Integer.
		 */
		Integer[] numbersAsInteger = Arrays.stream(numbersArray).boxed().toArray(Integer[]::new);
		Arrays.sort(numbersAsInteger, Collections.reverseOrder());
		System.out.println(Arrays.toString(numbersAsInteger));
	}
	
	public static String[] getOrderedArray(String[] namesArray) {
		//No recorremos el array entero porque se encarga la variable c de llegar hasta la última posición del array
		for(int r = 0; r < namesArray.length - Utils.DEFAULT_VALUE_ONE; r++) {
			//Se le suma a la variable r + 1 para que siempre vaya c una posición por delante en el array
			for(int c = r + Utils.DEFAULT_VALUE_ONE; c < namesArray.length; c++) {
				//Se compara con el método compareTo si la posición que va por detrás de c (r) es mayor que c. Si es así, compareTo devuelve un número positivo
				if(namesArray[r].compareTo(namesArray[c]) > Utils.DEFAULT_VALUE_ZERO) {
					//Se crea la variable del nombre mayor y se inicializa con el valor que va por detrás de la variable c
					String greaterName = namesArray[r];
					//Se le asigna al valor de la variable que va por detrás el valor que va por delante
					namesArray[r] = namesArray[c];
					//Se le asigna a la posición que va por delante el valor del nombre mayor
					namesArray[c] = greaterName;
				}
			}
		}
		return namesArray;
	}
}
