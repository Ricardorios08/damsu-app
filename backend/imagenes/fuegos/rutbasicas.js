/********Rutinas generales para los casos Javascript***********/
/***Objetos globales definidos aquí**********/
function oNavegador(  ) {
	this.nombre = navigator.appName;
	this.iniciar = iniciar;
	this.IE = this.nombre.toUpperCase().indexOf('MICROSOFT') >=0;
	this.NS = this.nombre.toUpperCase().indexOf('NETSCAPE') >=0;
	this.OP = this.nombre.toUpperCase().indexOf('OPERA') >= 0;
	this.XX = !this.IE && !this.NS && !this.OP;
	this.version = this.iniciar();
	this.Verent = parseInt(this.version);
	this.standard = (this.IE && this.Verent >=5) || (this.NS && this.Verent >=5)

/* ======================================================================
	FUNCION:	iniciar( ), miembro de oNavegador
	ARGS: 		none.
	DEVUELVE:	nada
	DESCRIP:	Inicializa los valores del objeto
====================================================================== */
  function iniciar() {
  var ver = navigator.appVersion;
  if(ver+"" != "NaN")
	if (this.IE)
		{
		ver.match(/(MSIE)(\s*)([0-9].[0-9]+)/ig);
  		ver = RegExp.$3;
		}
  return ver;
  } //Termina la funcion iniciar el objeto
}

window.miNavegador = new oNavegador()
window.miNavegador.iniciar();
/*=========================================================================
FUNCION:	objHtml(n, d), 
ARGS:		n: un atributo ID del elemento que se desea encontrar
			d: documento en el que se busca
RETURN:		Referencia javascript al elemento HTML cuyo ID es el atributo n
DESCRIP:	Esta función busca un elemento HTML (un nodo) cuyo atributo ID sea igual al 
			que se pasa como primer argumento ( n ). La b´suqueda se realiza en el árbol
			que se le indique como segundo argumento, si éste no existe la busqueda se 
			realiza en document de la ventana actual. La función es recursiva.
================================================================================*/			
function objHtml(n, d) { 
  var p,i,x;  
  if(!d) d=document; 
  if (miNavegador.standard)
	  x = d.getElementById(n)	
  if(!x && !(x=d[n]) && miNavegador.IE) 
      x=d.all[n]; 
  for (i=0; !x && i<d.forms.length; i++) 
      x=d.forms[i][n];
  for(i=0; !x && d.layers &&i< d.layers.length; i++) 
      x=objHtml(n,d.layers[i].document); 
  return x;
}

//Busca un valor de estilo en un descriptor. Solo MSIE <5
//no llamar con otro explorador
function estiloActual(obj, estilo, atributo)
{
var regla;
var devolver=null
//Si el estilo está definido en linea
if (!mie) return obj[atributo];
if (obj.style[atributo] != '') return obj.style[atributo]
if (verex >=5)
	devolver = obj.currentStyle[atributo]
else{
	regla = buscaEstilo(estilo)
	devolver = regla.style[atributo];	
	}
return devolver;
}
function buscaEstilo(estilo)
{
var hj, fin, hojas = document.styleSheets;
for (hj = 0; hj < hojas.length; hj++)
	{
	reglas = hojas[hj].rules;
	for (ti=0; ti< reglas.length; ti++)       
		{
		if (reglas[ti].selectorText.toUpperCase() == '.'+estilo.toUpperCase())
			{
			devolver = reglas[ti];	
			fin = true;
			break;
			}
		}	
	if (fin) break;		
	}		
return reglas[ti];
}
