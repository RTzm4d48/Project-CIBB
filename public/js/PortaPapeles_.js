var textoeslogan = document.querySelector('#textoeslogan');
var textoetiqueta = document.querySelector('#textoetiqueta');
var texturl = document.querySelector('#textourl');
var rango = document.createRange();  

function eslogancopy(){
    rango.selectNode(textoeslogan);
    window.getSelection().removeAllRanges();  
    window.getSelection().addRange(rango); 
  
    try {  
      var successful = document.execCommand('copy');
      alert("Eslogan copiado en el portapapeles")
      window.getSelection().removeAllRanges(); 
    } catch(e) {  
      alert("no copiado");}};

function etiquetacopy(){
    rango.selectNode(textoetiqueta);
    window.getSelection().removeAllRanges();  
    window.getSelection().addRange(rango); 
  
    try {  
      var successful = document.execCommand('copy');
      alert("Etiqueta copiada en el portapapeles")
      window.getSelection().removeAllRanges(); 
    } catch(e) {  
      alert("no copiado");}
}

function urlcopy(){
  rango.selectNode(texturl);
  window.getSelection().removeAllRanges();  
  window.getSelection().addRange(rango); 

  try {  
    var successful = document.execCommand('copy');
    alert("URL copiado en el portapapeles")
    window.getSelection().removeAllRanges(); 
  } catch(e) {  
    alert("no copiado");}
}

/* -inserta texto en una etiqueta html atraves de un identificador id 
var resultado= document.getElementById('resultado'); 
var mensaje = successful ? '¡Texto Copiado!' : 'No se pudo copiar :c';   
resultado.innerHTML=mensaje;*/