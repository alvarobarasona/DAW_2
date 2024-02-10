package ejercicios.herencia.practica11_3;

public class Neighbor extends Person {
	private String neighborCode;
	private String houseCode;
	private String state;
	private static double cuote;
	
	public Neighbor() {}
	
	public Neighbor(String name, int age, String dni, String neighborCode, String houseCode, String state, double cuote) {
		super(name, age, dni);
		this.neighborCode = neighborCode;
		this.houseCode = houseCode;
		this.state = state;
		this.cuote = cuote;
	}
	
	public Neighbor(String name, int age, String neighborCode, String houseCode, String state, double cuote) {
		super(name, age);
		this.neighborCode = neighborCode;
		this.houseCode = houseCode;
		this.state = state;
		this.cuote = cuote;
	}
	
	public static double getCuote() {
		return cuote;
	}

	public boolean validNeighborCode(String neighborCode) {
		String NEIGHBOR_CODE_REGEX = "V.{0,4}";
		return neighborCode.matches(NEIGHBOR_CODE_REGEX) ? true : false;
	}
	
	public void modifyCuote(double newCuote) {
		cuote = newCuote;
	}

	@Override
	public String toString() {
		return "Neighbor [neighborCode=" + neighborCode + ", houseCode=" + houseCode + ", state=" + state + "]";
	}
}
