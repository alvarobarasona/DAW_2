package ejercicios.gestion_de_vehiculos;

public abstract class Vehiculo {
	
	private String matricula;
	private String tipoDeCombustible;
	private float capacidadDeCarga;
	private float velocidadMaxima;
	
	public Vehiculo(String matricula, String tipoDeCombustible, float capacidadDeCarga, float velocidadMaxima) {
		this.matricula = matricula;
		this.tipoDeCombustible = tipoDeCombustible;
		this.capacidadDeCarga = capacidadDeCarga;
		this.velocidadMaxima = velocidadMaxima;
	}

	public void imprimirInformacion() {
		System.err.printf("Matrícula: %s\nTipo de combustible: %s\nCapacidad de carga: %.2f kg\nVelocidad máxima: %.2f km/h", matricula, tipoDeCombustible, capacidadDeCarga, velocidadMaxima);
	}
	
	public float getVelocidadMaxima() {
		return velocidadMaxima;
	}

	public void setVelocidadMaxima(float velocidadMaxima) {
		this.velocidadMaxima = velocidadMaxima;
	}

	public float calcularTiempoDeViaje(float distancia) {
		return distancia / velocidadMaxima;
	}
}
