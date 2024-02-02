package ejercicios.herencia.ejercicio2;

public class Refrigerated extends Frozen{
	private String foodSupervisionAgencyCode;
	public Refrigerated(String expireDate, int lotNumber, String packingDate, String originCountry, float recommendedHoldingTemperature, String foodSupervisionAgencyCode) {
		super(expireDate, lotNumber, packingDate, originCountry, recommendedHoldingTemperature);
		this.foodSupervisionAgencyCode = foodSupervisionAgencyCode;
	}
	public String getFoodSupervisionAgencyCode() {
		return foodSupervisionAgencyCode;
	}
	public void setFoodSupervisionAgencyCode(String foodSupervisionAgencyCode) {
		this.foodSupervisionAgencyCode = foodSupervisionAgencyCode;
	}
	@Override
	public String toString() {
		String refrigeratedInfo = "Fecha de caducidad: " + getExpireDate() + "\nNúmero de lote: " + getLotNumber()
		+ "\nFecha de envasado: " + getPackingDate() + "\nPaís de orígen: " + getOriginCountry()
		+ "\nTemperatura de mantenimiento recomendada: " + getRecommendedHoldingTemperature()
		+ "\nCódigo de organismo de supervisión alimentaria: " + foodSupervisionAgencyCode;
		return refrigeratedInfo;
	}
}
