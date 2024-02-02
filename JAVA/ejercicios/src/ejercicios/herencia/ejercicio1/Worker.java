package ejercicios.herencia.ejercicio1;

public class Worker extends Person {
	private String profesionalCategory;
	private int antiquity;
	public Worker() {}
	public Worker(String name, String numberPhone, int age, String profesionalCategory, int antiquity) {
		super(name, numberPhone, age);
		this.profesionalCategory = profesionalCategory;
		this.antiquity = antiquity;
	}
	public String getProfesionalCategory() {
		return profesionalCategory;
	}
	public void setProfesionalCategory(String profesionalCategory) {
		this.profesionalCategory = profesionalCategory;
	}
	public int getAntiquity() {
		return antiquity;
	}
	public void setAntiquity(int antiquity) {
		this.antiquity = antiquity;
	}
	@Override
	public String toString() {
		String workerInfo = "Nombre: " + getName() + "\nNúmero de teléfono: " + getNumberPhone() + "\nEdad: " + getAge()
		+ "\nCategoría profesional: " + profesionalCategory + "\nAntiguedad: " + antiquity;
		return workerInfo;
	}
}
