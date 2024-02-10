package ejercicios.herencia.practica11_2;

public class FrozenByWater extends Frozen{
	private float waterSalinity;
	public FrozenByWater(String expireDate, int lotNumber, String packingDate, String originCountry, float recommendedHoldingTemperature, float waterSalinity) {
		super(expireDate, lotNumber, packingDate, originCountry, recommendedHoldingTemperature);
		this.waterSalinity = waterSalinity;
	}
	public float getWaterSalinity() {
		return waterSalinity;
	}
	public void setWaterSalinity(float waterSalinity) {
		this.waterSalinity = waterSalinity;
	}
	@Override
	public String toString() {
		String frozenByWaterInfo = super.toString() + "\nGramos de sal por litro de agua: " + waterSalinity;
		return frozenByWaterInfo;
	}
}
