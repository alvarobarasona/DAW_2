package ejercicios.objetos.practica7_1;

import ejercicios.utils.Utils;

public class Rectangle {
	
	private int base;
	private int height;
	

	final static String ASTERISC = "*";
	
	public Rectangle(int base, int height) {
		this.base = base;
		this.height = height;
	}
	
	public void printRectangle() {
		printSign(ASTERISC);
	}
	
	public void printSign(String sign) {
		System.out.printf("Base: %d px\nAltura: %d px\n\r", base, height);
		for(int row = Utils.DEFAULT_VALUE_ZERO; row < height; row++) {
			for(int column = Utils.DEFAULT_VALUE_ZERO; column < base; column++) {
				System.out.printf(column != base - Utils.DEFAULT_VALUE_ONE ? "%s " : "%s\n", sign);
			}
		}
		System.out.println();
	}
	
	public void printInverseSquare() {
		System.out.printf("Base: %d px\nAltura: %d px\n\r", height, base);
		for(int row = Utils.DEFAULT_VALUE_ZERO; row < base; row++) {
			for(int column = Utils.DEFAULT_VALUE_ZERO; column < height; column++) {
				System.out.printf(column != height - Utils.DEFAULT_VALUE_ONE ? "%s " :  "%s\n", ASTERISC);
			}
		}
		System.out.println();
	}
	
	public float getRectangleArea() {
		return base * height;
	}
	
	public float getRectanglePerimeter() {
		return Utils.DEFAULT_VALUE_TWO * (base + height);
	}
	
	public float getRectangleDiagonal() {
//		return (float)((base * base) + (height * height)) / ((base * base) + (height * height));
		return (float)Math.sqrt(Math.pow(base, Utils.DEFAULT_VALUE_TWO) + Math.pow(height, Utils.DEFAULT_VALUE_TWO));
	}
}