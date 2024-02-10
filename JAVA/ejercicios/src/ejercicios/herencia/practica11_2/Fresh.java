package ejercicios.herencia.practica11_2;

public class Fresh extends Product{
	private String packingDate;
	private String originCountry;
	public Fresh(String expireDate, int lotNumber, String packingDate, String originCountry) {
		super(expireDate, lotNumber);
		this.packingDate = packingDate;
		this.originCountry = originCountry;
	}
	public String getPackingDate() {
		return packingDate;
	}
	public void setPackingDate(String packingDate) {
		this.packingDate = packingDate;
	}
	public String getOriginCountry() {
		return originCountry;
	}
	public void setOriginCountry(String originCountry) {
		this.originCountry = originCountry;
	}
	@Override
	public String toString() {
		String freshInfo = super.toString()
		+ "\nFecha de envasado: " + packingDate + "\nPaís de orígen: " + originCountry;
		return freshInfo;
	}
}
