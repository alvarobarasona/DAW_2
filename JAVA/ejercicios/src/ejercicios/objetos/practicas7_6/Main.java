package ejercicios.objetos.practicas7_6;

import java.util.ArrayList;
import java.util.Vector;

public class Main {
	public static void main(String[] args) {
		
		ArrayList <Employee> employeeList = new ArrayList<>();
		
		Employee employee1 = new Employee("Sebastiana", "Ventas", 35, 2000.50f);
		Employee employee2 = new Employee("Jesus Manuel", "Marketing", 23, 1850.33f);
		Employee employee3 = new Employee("Nicole", "Asesoramiento", 58, 3421.73f);
		Employee employee4 = new Employee("Benito", "Diseño", 33, 1265.89f);
		Employee employee5 = new Employee("Erica", "Televisión", 21, 1000.50f);
		Employee employee = null;

		final int NUMBER_OF_EMPLOYEES = 5;
		
		System.out.printf("%-30s %-30s %-30s \n---------------------------------------------------------------------\n", "DEPARTAMENTO", "EMPLEADO", "SALARIO");
		for(int i = 0; i < NUMBER_OF_EMPLOYEES; i++) {
			switch(i) {
			case 0:
				employee = employee1;
				break;
			case 1:
				employee = employee2;
				break;
			case 2:
				employee = employee3;
				break;
			case 3:
				employee = employee4;
				break;
			case 4:
				employee = employee5;
			default:
				break;
			}
		employeeList.add(employee);
		employeeList.get(i).showEmployee();
		}
	}
}
