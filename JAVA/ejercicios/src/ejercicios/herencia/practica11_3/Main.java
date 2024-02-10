package ejercicios.herencia.practica11_3;

import ejercicios.utils.Utils;

public class Main {
	public static void main(String[] args) {
		Neighbor neighbor = new Neighbor("Anacleto", 16, "V2759", "544356H", "Villagolf", 100.68d);
		String dni;
		do {
			dni = Utils.getMenuString("Introduce un DNI(Debe estar compuesto por 8 números y una letra mayúscula):");
		} while(neighbor.dniIsValid(dni) == false);
		
		neighbor.setDni(dni);
		
		if(neighbor.getAge() < Person.ADULT_AGE) {
			neighbor.setAge(Person.ADULT_AGE);
		}
		
		Admin admin = new Admin("Rodolfo", 16, "81256235W", "A3456", "La Fontana", 23, 4000.56f);
		
		if(admin.getAge() < Person.ADULT_AGE) {
			admin.setAge(Person.ADULT_AGE);
		}
		
		if(admin.getSalary() > admin.maximumSalary((float) Neighbor.getCuote())) {
			admin.setSalary((float) admin.maximumSalary( (float) Neighbor.getCuote()));
		}
		
		System.out.println(neighbor.toString() + "\n" + admin.toString());
	}
}
