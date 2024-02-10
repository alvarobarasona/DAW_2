package ejercicios.examen_primera_evaluacion.ejercicio3;

import ejercicios.utils.Utils;

public class DicesGame {
	public static void main(String[] args) {
		
		double playerBudget = 100.00d;
		double bankBudget = 500.00d;
		final double MINIMUM_BET = 10.00d;
		String playAgainOption = "";
		do {
			System.out.printf("Dinero de la banca: %.2f €\nDinero del jugador: %.2f €\n\r", bankBudget, playerBudget);
			if(playerBudget < MINIMUM_BET) {
				String lifeDeathOption;
				do {
					lifeDeathOption = Utils.getMenuString("¿Quieres jugar a vida o muerte(S/N)?");
				} while(!lifeDeathOption.equals("S") && !lifeDeathOption.equals("N"));
				if(lifeDeathOption.equals("S")) {
					final int MINIMUM_DEATH_OPTION = 1;
					final int MAXIMUM_DEATH_OPTION = 12;
					
					int lifeDeathNumber = Utils.getMenuOptionGreaterThanMinimumAndLesserThanMaximum("Introduce un número(Del " + MINIMUM_DEATH_OPTION + " al " + MAXIMUM_DEATH_OPTION + "):", MINIMUM_DEATH_OPTION, MAXIMUM_DEATH_OPTION);
					
					int randomNumber = (int)(Math.random() * MAXIMUM_DEATH_OPTION) + MINIMUM_DEATH_OPTION;
					
					if(lifeDeathNumber == randomNumber) {
						System.out.printf("¡Enhorabuena, el número era el %d\n\r!", randomNumber);
						playerBudget += bankBudget;
						bankBudget = Utils.DEFAULT_VALUE_ZERO;
					} else {
						System.out.printf("Has perdido, el número era el %d\n\r", randomNumber);
						bankBudget += playerBudget;
						playerBudget = Utils.DEFAULT_VALUE_ZERO;
					}
					playAgainOption = "N";
				}
			} else {
				//Se realiza la apuesta
				double bet = Utils.getMenuDoubleNumberOptionGreaterThanMinimumAndLesserThanMaximum("Introduce la cantidad de la apuesta(Mínimo: " + MINIMUM_BET + " € / Máximo: " + playerBudget + " €):", MINIMUM_BET, playerBudget);
				playerBudget -= bet;
				bankBudget += bet;

				//Declaración de los dados y su suma
				int dice1;
				int dice2;
				int dicesAdd;

				//Se tiran los dados
				do {
					String throwDice;
					do {
						throwDice = Utils.getMenuString("Pulsa enter para lanzar los dados:");
					} while(throwDice != "");
					dicesAdd = 0;
					dice1 = (int)(Math.random() * 6) + 1;
					dice2 = (int)(Math.random() * 6) + 1;
					dicesAdd = dice1 + dice2;
					System.out.printf("Dado 1: %d\nDado 2: %d\n%d + %d = %d\n\r", dice1, dice2, dice1, dice2, dicesAdd);
				} while(dicesAdd != 7 && dicesAdd != 11 && dicesAdd != 2 && dicesAdd != 3 && dicesAdd != 10 && dicesAdd != 12);

				if(dice1 + dice2 == 7 || dice1 + dice2 == 11) {
					if(bet * Utils.DEFAULT_VALUE_THREE > bankBudget) {
						System.out.printf("¡Enhorabuena! El jugador ha ganado %.2f €\n\r", bankBudget);
						playerBudget += bankBudget;
						bankBudget = Utils.DEFAULT_VALUE_ZERO;
					} else {
						System.out.printf("¡Enhorabuena! El jugador ha ganado %.2f €\n\r", (bet * Utils.DEFAULT_VALUE_THREE) - bet);
						playerBudget += bet * Utils.DEFAULT_VALUE_THREE;
						bankBudget -= bet * Utils.DEFAULT_VALUE_THREE;
					}	
					System.out.printf("Dinero del jugador: %.2f €\n\r", playerBudget);
					
				} else {
					System.out.printf("Gana la banca\n\rDinero del jugador: %.2f €\n\r", playerBudget);
				}
				if(playerBudget > Utils.DEFAULT_VALUE_ZERO && bankBudget > Utils.DEFAULT_VALUE_ZERO) {		
					do {
						playAgainOption = Utils.getMenuString("¿Quieres volver a jugar(S/N)?");
					} while(!playAgainOption.equals("S") && !playAgainOption.equals("N"));
				} else {
					playAgainOption = "N";
				}
			}	
		} while(playAgainOption.equals("S"));
		System.out.printf("Dinero de la banca: %.2f €\nDinero del jugador: %.2f €\n\r", bankBudget, playerBudget);
		Utils.getFarewellString();
	}
}
