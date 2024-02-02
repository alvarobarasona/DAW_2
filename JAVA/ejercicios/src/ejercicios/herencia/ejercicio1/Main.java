package ejercicios.herencia.ejercicio1;

import java.util.Scanner;

public class Main {
	public static void main(String[] args) {
		Worker worker1 = new Worker();
		worker1.setName("Eustaquio");
		worker1.setNumberPhone("+34 624 996 435");
		worker1.setAge(43);
		worker1.setProfesionalCategory("A");
		worker1.setAntiquity(5);
		
		System.out.println("Trabajador 1:\n\r" + worker1.toString());
		
		Scanner sc = new Scanner(System.in);
		System.out.println("\nIntroduce el nombre del trabajador 2:");
		String name = sc.nextLine();
		System.out.println("Introduce el número de teléfono del trabajador 2:");
		String phoneNumber = sc.nextLine();
		System.out.println("Introduce la edad del trabajador 2:");
		int age = Integer.parseInt(sc.nextLine());
		System.out.println("Introduce la categoría profesional del trabajador 2:");
		String profesionalCategory = sc.nextLine();
		System.out.println("Introduce la antiguedad del trabajador 2:");
		int antiquity = Integer.parseInt(sc.nextLine());
		sc.close();
		Worker worker2 = new Worker(name, phoneNumber, age, profesionalCategory, antiquity);
		
		System.out.println("Trabajador 2:\n" + worker2.toString() + "\n\rTrabajador de más antiguedad:");
		
		System.out.println(worker1.getAntiquity() > worker2.getAntiquity() ? worker1.toString() : worker2.toString());
		
		/*
		Si comento el método toString de la clase Person y Worker, en vez de mostrar la construcción del objeto, se mostrará
		la dirección de memoria en la que se encuentra ubicado ese objeto.
		*/
	}
}