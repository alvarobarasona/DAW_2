package ejercicios.polimorfismo.practica11_4;

public class Frozen extends Fresh{
	private float recommendedHoldingTemperature;
	public Frozen(String expireDate, int lotNumber, String packingDate, String originCountry, float recommendedHoldingTemperature) {
		super(expireDate, lotNumber, packingDate, originCountry);
		this.recommendedHoldingTemperature = recommendedHoldingTemperature;
	}
	public float getRecommendedHoldingTemperature() {
		return recommendedHoldingTemperature;
	}
	public void setRecommendedHoldingTemperature(float recommendedHoldingTemperature) {
		this.recommendedHoldingTemperature = recommendedHoldingTemperature;
	}
	
	@Override
	public String description() {
		return "CONGELADO\n" + super.description() + "\nTemperatura de mantenimiento: " + recommendedHoldingTemperature;
	}
	
	@Override
	public String toString() {
		String frozenInfo = super.toString()
		+ "\nTemperatura de mantenimiento recomendada: " + recommendedHoldingTemperature;
		return frozenInfo;
	}
}
