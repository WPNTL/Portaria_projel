//////////////////// Agenda file for CalendarXP 9.0 /////////////////
// This file is totally configurable. You may remove all the comments in this file to minimize the download size.
/////////////////////////////////////////////////////////////////////

//////////////////// Define agenda events ///////////////////////////
// Usage -- fAddEvent(year, month, day, message, action, bgcolor, fgcolor, bgimg, boxit, html);
// Notice:
// 1. The (year,month,day) identifies the date of the agenda.
// 2. In the action part you can use any javascript statement, or use " " for doing nothing.
// 3. Assign "null" value to action will result in a line-through effect(can't be selected).
// 4. html is the HTML string to be shown inside the agenda cell, usually an <img> tag.
// 5. fgcolor is the font color for the specific date. Setting it to ""(empty string) will make the fonts invisible and the date unselectable.
// 6. bgimg is the url of the background image file for the specific date.
// 7. boxit is a boolean that enables the box effect using the bgcolor when set to true.
// ** REMEMBER to enable respective flags of the gAgendaMask option in the theme, or it won't work.
/////////////////////////////////////////////////////////////////////

// fAddEvent(2003,12,2," Click me to active your email client. ","popup('mailto:any@email.address.org?subject=email subject')","#87ceeb","dodgerblue",null,true);
// fAddEvent(2004,4,1," Let's google. ","popup('http://www.google.com','_top')","#87ceeb","dodgerblue",null,true);
// fAddEvent(2004,9,23, "Hello World!\nYou can't select me.", null, "#87ceeb", "dodgerblue");




///////////// Dynamic holiday calculations /////////////////////////
// This function provides you a flexible way to make holidays of your own. (It's optional.)
// Once defined, it'll be called every time the calendar engine renders the date cell;
// With the date passed in, just do whatever you want to validate whether it is a desirable holiday;
// Finally you should return an agenda array like [message, action, bgcolor, fgcolor, bgimg, boxit, html] 
// to tell the engine how to render it. (returning null value will make it rendered as default style)
// ** REMEMBER to enable respective flags of the gAgendaMask option in the theme, or it won't work.
////////////////////////////////////////////////////////////////////



function fHoliday(y,m,d) {
	var rE=fGetEvent(y,m,d), r=null;

	// you may have sophisticated holiday calculation set here, following are only simple examples.
	if (m==1&&d==1)
		r=[" 01 de Jan, "+y+" \n Feliz Ano Novo! ",gsAction,"skyblue","red"];
    else if (m==4&&d==21)
		r=[" 21 de Abr, "+y+" \n Tiradentes ",gsAction,"skyblue","red"];
	else if (m==5&&d==1)
		r=[" 01 de Mai, "+y+" \n Dia do Trabalhador ",gsAction,"skyblue","red"];
	else if (m==8&&d==20)
		r=[" 20 de Ago, "+y+" \n Emancipação Municipal ",gsAction,"skyblue","red"];
	else if (m==9&&d==7)
		r=[" 07 de Set,  "+y+" \n Independência do Brasil ",gsAction,"skyblue","red"];
	else if (m==9&&d==20)
		r=[" 20 de Set,  "+y+" \n Revolução Farropilha ",gsAction,"skyblue","red"];
	else if (m==10&&d==12)
		r=[" 12 de Out,  "+y+" \n Dia das Criança/Nossa Sra. Aparecida ",gsAction,"skyblue","red"];
	else if (m==11&&d==2)
		r=[" 02 de Nov, "+y+" \n Finados ",gsAction,"skyblue","red"];
	else if (m==11&&d==15)
		r=[" 15 de Nov, "+y+" \n Proclamação República ",gsAction,"skyblue","red"];
	else if (m==12&&d==8)
		r=[" 08 de Dez, "+y+" \n Nossa Sra. da Conceição! ",gsAction,"skyblue","red"];
	else if (m==12&&d==25)
		r=[" 25 de Dez, "+y+" \n Feliz Natal! ",gsAction,"skyblue","red"];
		
		
/*	else if (m==4&&d<20) {
		var date=fGetDateByDOW(y,8,2,1);	// Dia 14 - Sexta Feira Santa
		if (d==date) r=[" "+d+" de Abr, "+y+" \n Sexta-Feira Santa",gsAction,"skyblue","red"];
	}	
	else if (m==6&&d>15) {
		var date=fGetDateByDOW(y,5,3,1);	// Dia 15 - Corpus Christi
		if (d==date) r=[" May "+d+", "+y+" \n Corpus Christi ",gsAction,"skyblue","red"];
	}
	else if (m==6&&d<20) {
		var date=fGetDateByDOW(y,2,3,1);	// President's Day is the 3rd Monday of Feb
		if (d==date) r=[" Feb "+d+", "+y+" \n President's Day ",gsAction,"skyblue","red"];
	}
	else if (m==6&&d<15) {
		var date=fGetDateByDOW(y,9,1,1);	// Labor Day is the 1st Monday of Sep
		if (d==date) r=[" Sep "+d+", "+y+" \n Labor Day ",gsAction,"skyblue","red"];
	}
	else if (m==6&&d<15) {
		var date=fGetDateByDOW(y,8,2,1);	// Labor Day is the 1st Monday of Sep
		if (d==date) r=[" Ago "+d+", "+y+" \n Dia dos Pais ",gsAction,"skyblue","red"];
	}
	else if (m==6&&d<15) {
		var date=fGetDateByDOW(y,10,2,1);	// Thanksgiving is the 2nd Monday of October
		if (d==date) r=[" Oct "+d+", "+y+" \n Thanksgiving Day (Canada) ",gsAction,"skyblue","red"];
	}
	else if (m==6&&d>15) {
		var date=fGetDateByDOW(y,11,4,4);	// Thanksgiving is the 4th Thursday of November
		if (d==date) r=[" Nov "+d+", "+y+" \n Thanksgiving Day (U.S.) ",gsAction,"skyblue","red"];
	}


*/	
	return rE?rE:r;	// favor events over holidays
}


