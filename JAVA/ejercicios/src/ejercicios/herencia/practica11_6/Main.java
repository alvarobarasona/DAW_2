package ejercicios.herencia.practica11_6;

import ejercicios.utils.Utils;

public class Main {
	public static void main(String[] args) {
		
		MachineryCompany company = new MachineryCompany();
		
		System.out.printf("¡Bienvenido al sistema de gestión de %s!", company.getName());
		
		final int MAXIMUM_ROOT_MENU_OPTION = 7;
		
		int rootMenuOption;
		do {
			final String ROOT_OPTION_1 = "1. Gestionar producto";
			final String ROOT_OPTION_2 = "2. Gestionar cliente";
			final String ROOT_OPTION_3 = "3. Consultar lista de productos en venta";
			final String ROOT_OPTION_4 = "4. Consultar lista de productos vendidos";
			final String ROOT_OPTION_5 = "5. Consultar cartera de " + company.getName();
			final String ROOT_OPTION_6 = "6. Consultar Certificado de Aprobación";
			final String ROOT_OPTION_7 = "7. Salir";
			final int MINIMUM_ROOT_MENU_OPTION = 1;
			
			final String ROOT_MENU_STRING = "Introduce una opción(Del " + MINIMUM_ROOT_MENU_OPTION + " al " + MAXIMUM_ROOT_MENU_OPTION + "):\n\r"
			+ ROOT_OPTION_1 + "\n"
			+ ROOT_OPTION_2 + "\n"
			+ ROOT_OPTION_3 + "\n"
			+ ROOT_OPTION_4 + "\n"
			+ ROOT_OPTION_5 + "\n"
			+ ROOT_OPTION_6 + "\n"
			+ ROOT_OPTION_7;
			
			rootMenuOption = Utils.getMenuOptionGreaterThanMinimumAndLesserThanMaximum(ROOT_MENU_STRING, MINIMUM_ROOT_MENU_OPTION, MAXIMUM_ROOT_MENU_OPTION);
			
			switch(rootMenuOption) {
				case 1:
					Utils.showTitle(ROOT_OPTION_1);
					final String MANAGE_PRODUCT_OPTION_1 = "1. Añadir producto";
					final String MANAGE_PRODUCT_OPTION_2 = "2. Modificar producto";
					final String MANAGE_PRODUCT_OPTION_3 = "3. Eliminar producto";
					final String MANAGE_PRODUCT_OPTION_4 = "4. Vender producto";
					final int MINIMUM_MANAGE_PRODUCT_OPTION = 1;
					final int MAXIMUM_MANAGE_PRODUCT_OPTION = 4;
					final String MANAGE_PRODUCT_STRING = "Introduce la operación a realizar(Del " + MINIMUM_MANAGE_PRODUCT_OPTION + " al " + MAXIMUM_MANAGE_PRODUCT_OPTION + "):\n\r"
					+ MANAGE_PRODUCT_OPTION_1 + "\n"
					+ MANAGE_PRODUCT_OPTION_2 + "\n"
					+ MANAGE_PRODUCT_OPTION_3 + "\n"
					+ MANAGE_PRODUCT_OPTION_4;
					
					int manageProductOption = Utils.getMenuOptionGreaterThanMinimumAndLesserThanMaximum(MANAGE_PRODUCT_STRING, MINIMUM_MANAGE_PRODUCT_OPTION, MAXIMUM_MANAGE_PRODUCT_OPTION);
					
					switch(manageProductOption) {
						case 1:
							Utils.showTitle(MANAGE_PRODUCT_OPTION_1);
							final String TYPE_PRODUCT_OPTION_1 = "1. Máquina industrial";
							final String TYPE_PRODUCT_OPTION_2 = "2. Máquina doméstica";
							final int MINIMUM_TYPE_PRODUCT_OPTION = 1;
							final int MAXIMUM_TYPE_PRODUCT_OPTION = 2;
							final String TYPE_PRODUCT_STRING = "Introduce el tipo de máquina que deseas añadir(Del " + MINIMUM_TYPE_PRODUCT_OPTION + " al " + MAXIMUM_TYPE_PRODUCT_OPTION + "):\n\r"
							+ TYPE_PRODUCT_OPTION_1 + "\n"
							+ TYPE_PRODUCT_OPTION_2;
							
							int typeProductOption = Utils.getMenuOptionGreaterThanMinimumAndLesserThanMaximum(TYPE_PRODUCT_STRING, MINIMUM_TYPE_PRODUCT_OPTION, MAXIMUM_TYPE_PRODUCT_OPTION);
							
							switch(typeProductOption) {
								case 1:
									Utils.showTitle(TYPE_PRODUCT_OPTION_1);
									final String INDUSTRIAL_OPTION_1 = "1. Máquina industrial eléctrica";
									final String INDUSTRIAL_OPTION_2 = "2. Máquina industrial hidráulica";
									final String INDUSTRIAL_OPTION_3 = "3. Máquina industrial térmica";
									final String INDUSTRIAL_OPTION_4 = "4. Máquina industrial de brazo robótico";
									final int MINIMUM_INDUSTRIAL_OPTION = 1;
									final int MAXIMUM_INDUSTRIAL_OPTION = 4;
									final String INDUSTRIAL_OPTION_STRING = "Introduce el tipo de máquina industrial que deseas añadir(Del " + MINIMUM_INDUSTRIAL_OPTION + " al " + MAXIMUM_INDUSTRIAL_OPTION + "):\n\r"
									+ INDUSTRIAL_OPTION_1 + "\n"
									+ INDUSTRIAL_OPTION_2 + "\n"
									+ INDUSTRIAL_OPTION_3 + "\n"
									+ INDUSTRIAL_OPTION_4;
									
									int industrialOption = Utils.getMenuOptionGreaterThanMinimumAndLesserThanMaximum(INDUSTRIAL_OPTION_STRING, MINIMUM_INDUSTRIAL_OPTION, MAXIMUM_INDUSTRIAL_OPTION);
									
									switch(industrialOption) {
										case 1:
											Utils.showTitle(INDUSTRIAL_OPTION_1);
											final String ELECTRIC_OPTION_1 = "1. Generador";
											final String ELECTRIC_OPTION_2 = "2. Transformador";
											final String ELECTRIC_OPTION_3 = "3. Motor";
											final int MINIMUM_ELECTRIC_OPTION = 1;
											final int MAXIMUM_ELECTRIC_OPTION = 3;
											final String ELECTRIC_OPTION_STRING = "Introduce el tipo de máquina eléctrica que deseas añadir(Del " + MINIMUM_ELECTRIC_OPTION + " al " + MAXIMUM_ELECTRIC_OPTION + "):\n\r"
											+ ELECTRIC_OPTION_1 + "\n"
											+ ELECTRIC_OPTION_2 + "\n"
											+ ELECTRIC_OPTION_3;
											
											int electricOption = Utils.getMenuOptionGreaterThanMinimumAndLesserThanMaximum(ELECTRIC_OPTION_STRING, MINIMUM_ELECTRIC_OPTION, MAXIMUM_ELECTRIC_OPTION);
											
											String electricMachineString;
											
											switch(electricOption) {
												case 1:
													Utils.showTitle(ELECTRIC_OPTION_1);
													electricMachineString = "Generador";
													break;
													
												case 2:
													Utils.showTitle(ELECTRIC_OPTION_2);
													electricMachineString = "Transformador";
													break;
													
												case 3:
													Utils.showTitle(ELECTRIC_OPTION_3);
													electricMachineString = "Motor";
													
												default:
													break;
											}
											
										case 2:
										case 3:
										case 4:
										default:
											break;
											
									}
								case 2:
								default:
							}
							
						case 2:
						case 3:
						case 4:
						default:
							break;
					}
					
				case 2:
				case 3:
					
				case 4:

					
				case 5:

				case 6:
					Utils.showTitle(ROOT_OPTION_6);
					company.showCertificateOfApproval();
					break;
				
				case 7:
					Utils.showTitle(ROOT_OPTION_5);
					Utils.getFarewellString();
				
				default:
					break;
			}
		} while(rootMenuOption != MAXIMUM_ROOT_MENU_OPTION);
	}
}
