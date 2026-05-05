//Necesita de rutinas genéricas
function oChispa(x, y, color, blqdiv)
{
this.xa = x;
this.ya = y;			//Coords. iniciales de las chispas
this.xt = x;
this.yt = y;			//Coords. instantáneas
this.delta = 0;      	//incremento distancia recorrida
this.rad = 0;			//distancia actual
this.radfin = 0;		//distancia final 
this.ang = 0;			//angulo del movimiento
this.color = color;		//color del bloque, o sea, de la chispa
this.div = objHtml(blqdiv);   //bloque DIV HTML según su ID
this.div.style.backgroundColor = color;
this.fin = false;
this.mover = mover;			//Actualiza posición de la chispa
this.apagar = apagar;		//Pone la chispa en visible
this.iluminar = iluminar;	//Pone la chispa invisible 
this.origen = origen;       //Pone los valores de coords. iniciales
 function origen(x, y)
 {
 this.xa = x;
 this.ya = y;
 }
//Se usan coordenadas polares  
function mover()
 {
 this.xt = parseInt(this.xa + this.rad*Math.cos(this.ang*Math.PI/180));
 this.yt = parseInt(this.ya - this.rad*Math.sin(this.ang*Math.PI/180));
 this.div.style.left = this.xt;
 this.div.style.top = this.yt;
 this.rad += this.delta;
 this.fin = (this.rad >= this.radfin);
 return (this.fin);
 }
function apagar()
 {
 this.div.style.visibility = "hidden";
 }
function iluminar()
 {
 this.div.style.visibility = "visible";
 }
}

//Objeto cohete, consiste en una lista de chispas (oChispa)
function oCohete(num, x0, y0, id, alt)
{
var ch;
var colores = new Array("yellow", "yellow","yellow","yellow","white", "white", "white", "red", "cyan", "maroon", "pink", "orange");
var color = 0;
this.chispas = new Array(num)   //Array para las chispas que forman el cohete
this.fin = false;
this.fase = 1;			// 0: lanzado, 1: explotando 
this.xa = x0;			//Posición hor inicial del cohete
this.ya = y0;			//Posición ver inicial del cohete
this.altura = alt;		//Máximo espacio recorrido por el cohete
this.mover = mover;		//Actualiza la posición del cohete, es decir, de las chispas
this.cambio = cambio;	//Cambia de fase (lanzado a explotando y viceversa)
//Coloca los bloques DIV que forman las chispas del cohete
for (ch = 0; ch<this.chispas.length; ch++)
	{
	document.write('<div id="'+id+ch+'" style="position:absolute; ');
	document.write('width:1px; height:1px; z-index:10; left: 0px; top: 0px; ');
	document.write('background-color: #FF0000; visibility: hidden;');
	document.write('"><img src="trans.gif" width="1" height="1"></div>');
	}
//Crea los objetos oChispas	contenidos en el cohete
for (ch = 0; ch<num; ch++)
	{
	color = Math.round(Math.random()*colores.length);
	this.chispas[ch] = new oChispa(x0, y0, colores[color], id+ch);
	}
//Pasa a la fase inicial (lanzamiento)
this.cambio(x0,y0);
//Implementación de los métodos 
 function mover()
 {
 var ch=0, fin = true;
 for (ch=0; ch < this.chispas.length/(2-this.fase); ch++)
 	{
	fin = this.chispas[ch].fin && fin;
	if (!this.chispas[ch].fin)
		this.chispas[ch].mover();
	else
		this.chispas[ch].apagar();
	}
 if (this.fase==0)
 	this.fin = this.chispas[0].fin;
 else
 	this.fin = fin;
 return this.fin;
 }		
//Según la fase del movimiento prepara las chispas para moverse todas con la misma
//trayectoria (nueva fase 0, lanzamiento) o en trayectorias aleatorias (nueva fase 1 explosión) 
 function cambio()
 {
 var ch=0, ang, inc, est=1, x0, y0;
 with (this){
 switch (fase){
   case 0:
  	fase = 1;
	x0 = this.chispas[0].xt;
	y0 = this.chispas[0].yt;
	for (ch = 0; ch<chispas.length; ch++)
		{
		chispas[ch].origen(x0, y0);
		chispas[ch].fin = false;
		chispas[ch].rad = 0;
		chispas[ch].ang = Math.random()*360;
		chispas[ch].delta = Math.random()*10+5;
		chispas[ch].radfin = Math.random()*chispas.length/3+40;
		chispas[ch].mover()
		chispas[ch].iluminar();
		}
		break;	
   case 1:
	fase=0;
	ang = 70+40*Math.random();   //Angulo de lanza. va de 70 a 110 grados
	est=1;
	inc = Math.random()*8+8;		//Incremento del espacio recorrido
	//Parte de las chispas forman la estela
 	for (ch = 0; ch< chispas.length/4; ch++)
		{
		chispas[ch].origen(xa+est*Math.cos(ang*Math.PI/180),
		                   ya-est*Math.sin(ang*Math.PI/180));
		chispas[ch].fin = false;
		chispas[ch].rad = 0;
		chispas[ch].ang = ang;
		chispas[ch].delta = inc;
		chispas[ch].radfin = this.altura;
		chispas[ch].mover();
		chispas[ch].iluminar();
		est++;
		}
 	break;		
   }
  }		
 }
}
//Fin objeto cohete
//Funciones de preparación del entorno
//Cada cohete usa su propio temporizador
//num: número de chispas
//xlz, ylz: coords x y del punto de lanzamiento
//sonido: true o false, para tener o no sonido.
function ponerFuegos(num, xlz, ylz, alt, sonido)
{
var i=0;
window.cohetes = new Array(num);
window.sonido = sonido;
for (i=0; i < num; i++)
	{   
 	cohetes[i] = new oCohete(30, xlz, ylz, "c"+i, alt);
	setTimeout("lanzar("+i+")", 5 +i*200);
	}
}
//Movimiento para cada cohete 
function lanzar(nc)
{
if (!cohetes[nc].fin)
	cohetes[nc].mover();
else
	{
	if (sonido)
		if(cohetes[nc].fase == 0)
			document.all.expl.src = "explos1.wav"
		else
			document.all.siseo.src = "sis.wav"
	cohetes[nc].cambio();
	cohetes[nc].fin = false;
	}
setTimeout("lanzar("+nc+")", 10+ cohetes[nc].fase*80);
}
//Por si se usa sonido
document.write('<bgsound id="expl" src="explos1.wav"></bgsound>');
document.write('<bgsound id="siseo" src="sis.wav"></bgsound>');

