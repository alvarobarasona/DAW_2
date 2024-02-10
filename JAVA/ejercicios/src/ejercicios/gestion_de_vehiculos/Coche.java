package ejercicios.gestion_de_vehiculos;

public class Coche extends Vehiculo{
	
	private int numeroDePuertas;
	
	
	
	public Coche(String matricula, String tipoDeCombustible, float capacidadDeCarga, float velocidadMaxima, int numeroDePuertas) {
		super(matricula, tipoDeCombustible, capacidadDeCarga, velocidadMaxima);
		this.numeroDePuertas = numeroDePuertas;
	}

	@Override
	public void imprimirInformacion() {
		super.imprimirInformacion();
		System.out.printf("\nNúmero de puertas: %d\n\r", numeroDePuertas);
	}
}
