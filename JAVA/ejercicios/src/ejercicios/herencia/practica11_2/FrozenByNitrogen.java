package ejercicios.herencia.practica11_2;

public class FrozenByNitrogen extends Frozen {
	private String congelationMethod;
	private int secondsNitrogenExposure;
	public FrozenByNitrogen(String expireDate, int lotNumber, String packingDate, String originCountry, float recommendedHoldingTemperature, String congelationMethod, int secondsNitrogenExposure) {
		super(expireDate, lotNumber, packingDate, originCountry, recommendedHoldingTemperature);
		this.congelationMethod = congelationMethod;
		this.secondsNitrogenExposure = secondsNitrogenExposure;
	}
	public String getCongelationMethod() {
		return congelationMethod;
	}
	public void setCongelationMethod(String congelationMethod) {
		this.congelationMethod = congelationMethod;
	}
	public int getSecondsNitrogenExposure() {
		return secondsNitrogenExposure;
	}
	public void setSecondsNitrogenExposure(int secondsNitrogenExposure) {
		this.secondsNitrogenExposure = secondsNitrogenExposure;
	}
	@Override
	public String toString() {
		String frozenByNitrogenInfo = super.toString()
		+ "\nMétodo de congelación: " + congelationMethod + "\nSegundos de exposición al nitrógeno: " + secondsNitrogenExposure;
		return frozenByNitrogenInfo;
	}
}
