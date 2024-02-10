package ejercicios.herencia.practica11_2;

public class Main {
	public static void main(String[] args) {
		Product product;
		
		product = new Fresh("01/04/2024", 1, "01/02/2024", "Spain");
		System.out.println("Producto fresco 1:\n\r" + product + "\n\r");
		product = new Fresh("14/07/2024", 2, "14/05/2024", "Germany");
		System.out.println("Producto fresco 2:\n\r" + product + "\n\r");
		product = new Refrigerated("22/09/2024", 3, "22/03/2024", "Australia", 7.3f, "A354576");
		System.out.println("Producto refrigerado 1:\n\r" + product + "\n\r");
		product = new Refrigerated("04/08/2024", 4, "04/02/2024", "Italy", 6.5f, "K619375");
		System.out.println("Producto refrigerado 2:\n\r" + product + "\n\r");
		product = new Refrigerated("17/12/2024", 5, "17/06/2024", "Norway", 7.0f, "W645783");
		System.out.println("Producto refrigerado 3:\n\r" + product + "\n\r");
		product = new FrozenByWater("09/10/2024", 6, "09/03/2024", "France", -4.6f, 14.8f);
		System.out.println("Producto congelado por agua 1:\n\r" + product + "\n\r");
		product = new FrozenByWater("06/12/2024", 7, "06/05/2024", "Belgic", -5.0f, 11.5f);
		System.out.println("Producto congelado por agua 2:\n\r" + product + "\n\r");
		product = new FrozenByAir("20/09/2024", 8, "20/01/2024", "Brazil", -5.3f, 3.2f, 1.6f, 0.4f, 1.1f);
		System.out.println("Producto congelado por aire 1:\n\r" + product + "\n\r");
		product = new FrozenByAir("26/10/2024", 9, "26/02/2024", "Greece", -4.1f, 2.3f, 2.0f, 1.2f, 0.4f);
		System.out.println("Producto congelado por aire 2:\n\r" + product + "\n\r");
		product = new FrozenByAir("07/11/2024", 10, "07/03/2024", "Finland", -6.5f, 0.6f, 1.3f, 1.8f, 2.6f);
		System.out.println("Producto congelado por aire 3:\n\r" + product + "\n\r");
		product = new FrozenByNitrogen("23/12/2024", 11, "23/01/2024", "Ireland", -7.9f, "criocongelación", 43);
		System.out.println("Producto congelado por nitrógeno 1:\n\r" + product + "\n\r");
	}
}
