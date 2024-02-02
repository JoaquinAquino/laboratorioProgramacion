var armaJugador;
var armaMaquina;
var contadorJugador=0;
var contadorMaquina=0;
var contadorJuegosJugados=0;
var volverAJugar = true;
var reiniciarValores = false;
var rendirse = true;

function freiniciarValores(){
	if(reiniciarValores){
	var jugador = document.getElementById("manosJugador");
	var maquina = document.getElementById("manosMaquina");
	var manosJugadas = document.getElementById("manosJugadas");
	var ganadorFinal = document.getElementById("ganadorFinal");
	var ganador = document.getElementById("manoGanadora");
	volverAJugar = true;
	contadorJuegosJugados = 0;
	contadorJugador=0;
    contadorMaquina=0;
	jugador.textContent=" ";
	ganador.textContent = " ";
	ganadorFinal.textContent= " ";
    maquina.textContent = " ";
    manosJugadas.textContent = " ";
	reiniciarValores = false;
	rendirse=true;
	}
}

function frendirse (){
	if(rendirse){
	var ganadorFinal = document.getElementById("ganadorFinal");
	reiniciarValores = true;
	ganadorFinal.textContent = "MAQUINA POR QUE JUGADOR SE RINDIO"
	volverAJugar = false;
	rendirse=true;
	}
}

function batallar(){
	var ganador = document.getElementById("manoGanadora");
	if(armaJugador == "piedra" && armaMaquina == "papel"){
		ganador.textContent = "MAQUINA";
		contadorMaquina++;
	}else if(armaJugador == "papel" && armaMaquina == "piedra"){
		ganador.textContent  = "JUGADOR";
		contadorJugador++;
	}else if (armaJugador == "tijera" && armaMaquina == "papel"){
		ganador.textContent  = "JUGADOR";
		contadorJugador++;
	}else if (armaJugador == "papel" && armaMaquina == "tijera"){
		ganador.textContent  = "MAQUINA";
		contadorMaquina++;
	}else if (armaJugador == "piedra" && armaMaquina == "tijera"){
		ganador.textContent  = "JUGADOR";
		contadorJugador++;
	}else if (armaJugador == "tijera" && armaMaquina == "piedra"){
		ganador.textContent  = "MAQUINA";
		contadorMaquina++;
	}else if (armaJugador == armaMaquina){
		ganador.textContent  =  "EMPATE";
	}
	
}



function elejirArma(numero){
  var arma;
    switch(numero){
		case 0: 
		    arma = "piedra"
		break;
		case 1:
			arma = "tijera"
		break;
		case 2:
			arma = "papel"
		break;
	}
	return arma;

}

function eleccionJugador(){
	var opciones = document.getElementById("idEleccion");
	var indseleccionado = opciones.selectedIndex;
	armaJugador = elejirArma(indseleccionado);
}

function eleccionMaquina(){
	var elijio = document.getElementById("eleccionMaquina");
	var num = Math.floor(Math.random() * 3);
	armaMaquina = elejirArma(num);
	elijio.textContent=armaMaquina;
}

function fjugar(){
	if(volverAJugar){
		var jugador = document.getElementById("manosJugador");
		var maquina = document.getElementById("manosMaquina");
		var manosJugadas = document.getElementById("manosJugadas");
		var ganadorFinal = document.getElementById("ganadorFinal");
		
		if(contadorJugador <= 5 || contadorMaquina <=5){
		eleccionJugador();
		eleccionMaquina();
		batallar();
		contadorJuegosJugados++;
		jugador.textContent = contadorJugador;
		maquina.textContent = contadorMaquina;
		manosJugadas.textContent = contadorJuegosJugados;
		} 
		if(contadorJugador == 5){
		ganadorFinal.textContent = "JUGADOR";
		volverAJugar=false;
		reiniciarValores=true;
		rendirse=false;
		}else if(contadorMaquina == 5){
		ganadorFinal.textContent = "MAQUINA";
		volverAJugar=false;
		reiniciarValores=true;
		rendirse=false;
		}
   }else {
	   alert("ESTA PARTIDA YA TIENE GANADOR , COMIENZE UN NUEVO JUEGO TOQUE EL BOTON |REINICIAR VALORES| Y LUEGO EL BOTON |JUGAR| PARA PODER JUGAR");
   }
}



