package ejercicios.polimorfismo.practica11_4;

public class Product {
	private String expireDate;
	private int lotNumber;
	public Product(String expireDate, int lotNumber) {
		this.expireDate = expireDate;
		this.lotNumber = lotNumber;
	}
	public String getExpireDate() {
		return expireDate;
	}
	public void setExpireDate(String expireDate) {
		this.expireDate = expireDate;
	}
	public int getLotNumber() {
		return lotNumber;
	}
	public void setLotNumber(int lotNumber) {
		this.lotNumber = lotNumber;
	}
	
	public String description() {
		return "Número de lote:" + lotNumber;
	}
	
	@Override 
	public String toString() {
		String productInfo = "Fecha de caducidad: " + expireDate + "\nNúmero de lote: " + lotNumber;
		return productInfo;
	}
}