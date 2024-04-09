package ejercicios.pruebas;

public class Main {

	public static void main(String[] args) {
		
		String palabra = "hola";
		
		for(int i = 0; i < palabra.length(); i++) {
			if(palabra.charAt(i) == 'l') {
				System.out.println(palabra.charAt(i));
			}
			
		}
	}
}
