package ejercicios.objetos.practica7_3;

public class Date {
	private int day;
	private int month;
	private int year;
	
	public Date() {}
	
	public Date(int day, int month, int year) {
		this.day = day;
		this.month = month;
		this.year = year;
	}
	
	public boolean isLeapYear() {
		if(year % 400 == 0) {
			return true;
		} else {
			if(year % 4 == 0 && year % 100 != 0) {
				return true;
			} else {
				return false;
			}
		}
	}

	public static int getNumberOfDaysBetweenTwoDates(Date date1, Date date2) {
		int totalDaysNumber = 0;
		final int TOTAL_MONTHS = 12;
		final int MONTH_TOTAL_DAYS = 30;
		final int YEAR_TOTAL_DAYS = 365;
		if(date1.year > date2.year) {
			totalDaysNumber += ((date1.year - date2.year) * YEAR_TOTAL_DAYS) +
			(date2.month > date1.month ? ((TOTAL_MONTHS - date2.month) + date1.month) * MONTH_TOTAL_DAYS : (date1.month - date2.month) * MONTH_TOTAL_DAYS) +
			(date2.day > date1.day ? (MONTH_TOTAL_DAYS - date2.day) + date1.day : date1.day - date2.day);
		} else if(date1.year < date2.year) {
			totalDaysNumber += ((date2.year - date1.year) * YEAR_TOTAL_DAYS) +
			(date1.month > date2.month ? ((TOTAL_MONTHS - date1.month) + date2.month) * MONTH_TOTAL_DAYS : (date2.month - date1.month) * MONTH_TOTAL_DAYS) +
			(date1.day > date2.day ? (MONTH_TOTAL_DAYS - date1.day) + date2.day : date2.day - date1.day);
		} else {
			if(date1.month > date2.month) {
				totalDaysNumber += (date1.month - date2.month) * MONTH_TOTAL_DAYS +
				(date2.day > date1.day ? (MONTH_TOTAL_DAYS - date2.day) + date1.day : date1.day - date2.day);
			} else if(date1.month < date2.month) {
				totalDaysNumber += (date2.month - date1.month) * MONTH_TOTAL_DAYS +
				(date1.day > date2.day ? (MONTH_TOTAL_DAYS - date1.day) + date2.day : date2.day - date1.day);
			} else {
				if(date1.day > date2.day) {
					totalDaysNumber += date1.day - date2.day;
				} else if(date1.day < date2.day) {
					totalDaysNumber += date2.day - date1.day;
				}
			}
		}
		return totalDaysNumber;
	}
	
	public int getYear() {
		return year;
	}

	public String returnFormatedDate() {
		return day + "/" + month + "/" + year;
	}
}
