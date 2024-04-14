const body=document.querySelector("body");
const tetedepage=document.querySelector("#tetedepage");
const menu=document.querySelector("#menu");
const fermerwrapper=document.querySelector("#fermerwrapper");

let i=0;

console.log("click");

menu.onclick=function ouvrirfermerwrapper() {
	
	if (i%2==0) {
			wrapper.style.display= 'block';
			wrapper.style.transition="display 1s" ;
			body.style.touchAction="none";
			body.style.overflowY="hidden";
			i++;
	}
	else{

			wrapper.style.display= "none";
			wrapper.style.transition="display 1s" ;
			body.style.overflowY=null;
			body.style.touchAction=null;
			

			i++;
	}

	console.log("click");
		
}

fermerwrapper.onclick=function ouvrirfermerwrapper() {


			wrapper.style.display= "none";
			wrapper.style.transition="display 1s" ;
			body.style.overflowY=null;
			body.style.touchAction=null;
	
}

$(document).click(function() {
    var obj = $("#wrapper");
    var wrapper=document.querySelector("#wrapper");
    if (wrapper.style.display=="block") {
    	if (!obj.is(event.target) && !obj.has(event.target).length) {
	        alert("Outside click detected!");
	    }
	    else {
	        alert("Inside click detected!");
	    }

    }
    
});

