package ejercicios.herencia.practica11_3;

public class Person {
	private String name;
	private int age;
	private String dni;
	
	final static int ADULT_AGE = 18;
	
	public Person() {}
	
	public Person(String name, int age, String dni) {
		this.name = name;
		this.age = age;
		this.dni = dni;
	}
	
	public Person(String name, int age) {
		this.name = name;
		this.age = age;
	}
	
	public boolean isAdult(int age) {
		
		return age >= ADULT_AGE ? true : false; 
	}
	
	public boolean dniIsValid(String dni) {
		final String DNI_REGEX = "\\d{8}[A-Z]";
		return dni.matches(DNI_REGEX) ? true : false;
	}

	@Override
	public String toString() {
		return "Person [name=" + name + ", age=" + age + ", dni=" + dni + "]";
	}

	public void setDni(String dni) {
		this.dni = dni;
	}

	public int getAge() {
		return age;
	}

	public void setAge(int age) {
		this.age = age;
	}
}