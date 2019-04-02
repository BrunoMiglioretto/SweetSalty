function atualizarCozinha(){
	        var resultado = document.getElementById("chat");
	        var cozinhaContent;
	        if(resultado){
	            window.setInterval(function(){
	                if(window.XMLHttpRequest){
	                    xmlhttp=new XMLHttpRequest();
	                }else{
	                    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	                }
	                xmlhttp.onreadystatechange=function() {
	                    if(this.readyState==4 && this.status==200){
	                        var content = this.responseText;
	                        if(cozinhaContent != content){
	                            cozinhaContent = content;
	                            document.getElementById("chat").innerHTML=cozinhaContent;
	                        }
	                    }
	                }
	                xmlhttp.open("GET","mensagem.php",true);
	                xmlhttp.send();
	            },200);
	        }
	    }