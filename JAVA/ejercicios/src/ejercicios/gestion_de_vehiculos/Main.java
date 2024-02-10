package ejercicios.gestion_de_vehiculos;

import java.util.ArrayList;

public class Main {
	public static void main(String[] args) {
		
		ArrayList <Vehiculo> listaVehiculos = new ArrayList<>();
		
		Vehiculo vehiculo = new Coche("1234ABC", "Diesel", 350.50f, 200.00f, 5);
		
		listaVehiculos.add(vehiculo);
		
		vehiculo = new Camion("5678DEF", "Gasolina", 2000.50f, 140.00f, 2);
		
		listaVehiculos.add(vehiculo);
		
		for(int i = 0; i < listaVehiculos.size(); i++) {
			System.out.println(i == 0 ? "COCHE\n" : "CAMIÓN\n");
			listaVehiculos.get(i).imprimirInformacion();
			System.out.printf("El viaje tendrá una duración de %.2f minutos\n\r", listaVehiculos.get(i).calcularTiempoDeViaje(10000.50f));
		}
	}
}
