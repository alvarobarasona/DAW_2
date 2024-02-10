package examen.ejercicio1;

import examen.Herramientas;

public class Main {

	public static void main(String[] args) {
	
		int intNumber = Herramientas.getMenuIntNumber("Introduce un número entero:");
		
		System.out.println(intNumber);
		
		float floatNumber = Herramientas.getMenuFloatNumber("Introduce un número decimal:");
		
		System.out.println(floatNumber);
	}
}
