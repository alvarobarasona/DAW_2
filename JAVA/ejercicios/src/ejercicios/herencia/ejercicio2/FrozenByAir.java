package ejercicios.herencia.ejercicio2;

public class FrozenByAir extends Frozen{
	private float nitrogenPercentage;
	private float oxigenPercentage;
	private float carbonDioxidePercentage;
	private float waterSteamPercentage;
	public FrozenByAir(String expireDate, int lotNumber, String packingDate, String originCountry, float recommendedHoldingTemperature, float nitrogenPercentage, float oxigenPercentage, float carbonDioxidePercentage, float waterSteamPercentage) {
		super(expireDate, lotNumber, packingDate, originCountry, recommendedHoldingTemperature);
		this.nitrogenPercentage = nitrogenPercentage;
		this.oxigenPercentage = oxigenPercentage;
		this.carbonDioxidePercentage = carbonDioxidePercentage;
		this.waterSteamPercentage = waterSteamPercentage;
	}
	public float getNitrogenPercentage() {
		return nitrogenPercentage;
	}
	public void setNitrogenPercentage(float nitrogenPercentage) {
		this.nitrogenPercentage = nitrogenPercentage;
	}
	public float getOxigenPercentage() {
		return oxigenPercentage;
	}
	public void setOxigenPercentage(float oxigenPercentage) {
		this.oxigenPercentage = oxigenPercentage;
	}
	public float getCarbonDioxidePercentage() {
		return carbonDioxidePercentage;
	}
	public void setCarbonDioxidePercentage(float carbonDioxidePercentage) {
		this.carbonDioxidePercentage = carbonDioxidePercentage;
	}
	public float getWaterSteamPercentage() {
		return waterSteamPercentage;
	}
	public void setWaterSteamPercentage(float waterSteamPercentage) {
		this.waterSteamPercentage = waterSteamPercentage;
	}
	@Override
	public String toString() {
		String frozenByAirInfo = "Fecha de caducidad: " + getExpireDate() + "\nNúmero de lote: " + getLotNumber()
		+ "\nFecha de envasado: " + getPackingDate() + "\nPaís de orígen: " + getOriginCountry()
		+ "\nTemperatura de mantenimiento recomendada: " + getRecommendedHoldingTemperature()
		+ "\nPorcentaje de nitrógeno: " + nitrogenPercentage + "\nPorcentaje de oxígeno: " + oxigenPercentage
		+ "\nPorcentaje de dióxido de carbono: " + carbonDioxidePercentage + "\nPorcentaje de vapor de agua: " + waterSteamPercentage;
		return frozenByAirInfo;
	}
}
