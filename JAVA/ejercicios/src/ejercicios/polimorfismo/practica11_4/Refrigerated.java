package ejercicios.polimorfismo.practica11_4;

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
		String refrigeratedInfo = super.toString()
		+ "\nCódigo de organismo de supervisión alimentaria: " + foodSupervisionAgencyCode;
		return refrigeratedInfo;
	}
}
