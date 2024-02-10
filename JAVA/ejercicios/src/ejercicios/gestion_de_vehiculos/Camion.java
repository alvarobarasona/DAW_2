package ejercicios.gestion_de_vehiculos;

public class Camion extends Vehiculo {

	private int numeroDeRuedas;
	
	public Camion(String matricula, String tipoDeCombustible, float capacidadDeCarga, float velocidadMaxima, int numeroDeRuedas) {
		super(matricula, tipoDeCombustible, capacidadDeCarga, velocidadMaxima);
		this.numeroDeRuedas = numeroDeRuedas;
	}
	
	@Override
	public void imprimirInformacion() {
		super.imprimirInformacion();
		System.out.printf("\nNúmero de ruedas: %d\n\r", numeroDeRuedas);
	}
	
	@Override
	public float calcularTiempoDeViaje(float distancia) {
		return distancia / (getVelocidadMaxima() - ((20 * getVelocidadMaxima()) / 100));
	}
}
