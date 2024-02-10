package ejercicios.herencia.practica11_3;

public class Admin extends Person {
	private String adminCode;
	private String state;
	private int neighborsNumber;
	private float salary;
	
	public Admin() {}

	public Admin(String name, int age, String dni, String adminCode, String state, int neighborsNumber, float salary) {
		super(name, age, dni);
		this.adminCode = adminCode;
		this.state = state;
		this.neighborsNumber = neighborsNumber;
		this.salary = salary;
	}
	
	public boolean validAdminCode(String adminCode) {
		String ADMIN_CODE_REGEX = "A.{0,4}";
		return adminCode.matches(ADMIN_CODE_REGEX) ? true : false;
	}
	
	public double maximumSalary(float cuote) {
		return 0.5f * neighborsNumber * cuote;
	}

	@Override
	public String toString() {
		return "Admin [adminCode=" + adminCode + ", state=" + state + ", neighborsNumber=" + neighborsNumber + ", salary=" + salary + "]";
	}

	public float getSalary() {
		return salary;
	}

	public void setSalary(float salary) {
		this.salary = salary;
	}
}
