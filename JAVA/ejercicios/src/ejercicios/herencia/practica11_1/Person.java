package ejercicios.herencia.practica11_1;

public class Person {
	private String name;
	private String numberPhone;
	private int age;
	public Person() {}
	public Person(String name, String numberPhone, int age) {
		this.name = name;
		this.numberPhone = numberPhone;
		this.age = age;
	}
	public String getName() {
		return name;
	}
	public void setName(String name) {
		this.name = name;
	}
	public String getNumberPhone() {
		return numberPhone;
	}
	public void setNumberPhone(String numberPhone) {
		this.numberPhone = numberPhone;
	}
	public int getAge() {
		return age;
	}
	public void setAge(int age) {
		this.age = age;
	}
	@Override
	public String toString() {
		String personInfo = "Nombre: " + name + "\nNúmero de teléfono: " + numberPhone + "\nEdad: " + age;
		return personInfo;
	}
}
