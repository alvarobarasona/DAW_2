package ejercicios.objetos.practica7_5;

import java.util.Vector;

public class Student {
	private String name;
	private String surnames;
	private int age;
	private Vector <String> asignatures;
	public Student(String name, String surnames, int age) {
		this.name = name;
		this.surnames = surnames;
		this.age = age;
	}
	@Override
	public String toString() {
		return "Student [name=" + name + ", surnames=" + surnames + ", age=" + age + ", asignatures=" + asignatures + "]";
	}
}