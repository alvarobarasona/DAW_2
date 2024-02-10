package ejercicios.objetos.practicas7_6;

public class Employee {
	private String name;
	private String depart;
	private int age;
	private double salary;
	public Employee(String name, String depart, int age, double salary) {
		this.name = name;
		this.depart = depart;
		this.age = age;
		this.salary = salary;
	}
	public Employee(String name, String depart) {
		this.name = name;
		this.depart = depart;
	}
	@Override
	public String toString() {
		return "Employee [name=" + name + ", depart=" + depart + ", age=" + age + ", salary=" + salary + "]";
	}
	public void showEmployee() {
		System.out.printf("%-30s %-30s %-30.2f\n", depart, name, salary);
	}
}