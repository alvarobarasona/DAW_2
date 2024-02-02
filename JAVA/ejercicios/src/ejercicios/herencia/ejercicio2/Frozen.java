package ejercicios.herencia.ejercicio2;

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
	public String toString() {
		String frozenInfo = "Fecha de caducidad: " + getExpireDate() + "\nNúmero de lote: " + getLotNumber()
		+ "\nFecha de envasado: " + getPackingDate() + "\nPaís de orígen: " + getOriginCountry()
		+ "\nTemperatura de mantenimiento recomendada: " + recommendedHoldingTemperature;
		return frozenInfo;
	}
}
