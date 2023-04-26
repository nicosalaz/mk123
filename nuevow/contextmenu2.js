$(document).ready(function() {


        /* $('body').on('contextmenu', 'td', function() { */
         $('body').on('click', 'td', function() {
                
            /* document.getElementById("rmenu2b").style.display = "block"; */
            
                            
            var opcionw= document.getElementById("opcionx2").value;
                                
            if (document.getElementById("concolor").value=='white') {
                    
                if (opcionw=='section-2' && opcionw !=='section-3c') {
                                
                        if (celdaw=='counter' || celdaw=='total_blister_in_shippers') {
                            document.getElementById("salidaMensaje").style.display="none";
                        } 
                                               
                    } else {
                        alert("uno");
                        document.getElementById("rmenu2b").className = "hide";
                        document.getElementById("rmenu3b").className = "hide";
                        document.getElementById("rmenu2b").className = "show";
                        document.getElementById("rmenu2b").style.top = mouseY(event) + 'px';
                        document.getElementById("rmenu2b").style.left = mouseX(event) + 'px';
                    }
               

            } else if (document.getElementById("concolor").value=='red') {
                
                if (opcionw=='section-2' && opcionw !=='section-3c') {
                    
                } else {
                    /* alert(opcionw); */
                    document.getElementById("rmenub").className = "hide";
                    document.getElementById("rmenu2b").className = "hide";
                        if (opcionw =='section-3') {
                            alert(opcionw);
                            document.getElementById("rmenu3b").style.display = "block";
                            document.getElementById("rmenu3b").className = "show";
                            document.getElementById("rmenu3b").style.top = mouseY(event) + 'px';
                            document.getElementById("rmenu3b").style.left = mouseX(event) + 'px';
                        }
                    
                }
            
            } else if(document.getElementById("concolor").value=='nocolor' || document.getElementById("concolor").value=='') {
                    
                    document.getElementById("rmenub").className = "hide";
                    document.getElementById("rmenu2b").className = "hide";
                    if (opcionw =='section-3') {
                        alert("tres");
                        document.getElementById("rmenu3b").className = "show";
                    }
                    document.getElementById("rmenu3b").style.top = mouseY(event) + 'px';
                    document.getElementById("rmenu3b").style.left = mouseX(event) + 'px';
            } else{

                if (opcionw=='section-2' && opcionw !=='section-3c') {
                    
                        document.getElementById("rmenu3").className = "hide";
                
                   
                } else {
                    alert("cuatro");
                    
                        document.getElementById("rmenu3b").className = "hide";
                        document.getElementById("rmenub").className = "hide";
                        document.getElementById("rmenu2b").className = "show";
                        document.getElementById("rmenu2b").style.top = mouseY(event) + 'px';
                        document.getElementById("rmenu2b").style.left = mouseX(event) + 'px';
                }
            }


            window.event.returnValue = false;

        });
 

    });

    // this is from another SO post...  
    $(document).bind("click", function(event) {
        document.getElementById("rmenub").className = "hide";
        document.getElementById("rmenu2b").className = "hide";
        document.getElementById("rmenu3b").className = "hide";
    });



    function mouseX(evt) {
    if (evt.pageX) {
    return evt.pageX;
    } else if (evt.clientX) {
    return evt.clientX + (document.documentElement.scrollLeft ?
        document.documentElement.scrollLeft :
        document.body.scrollLeft);
    } else {
    return null;
    }
    }

    function mouseY(evt) {
    if (evt.pageY) {
    return evt.pageY;
    } else if (evt.clientY) {
    return evt.clientY + (document.documentElement.scrollTop ?
        document.documentElement.scrollTop :
        document.body.scrollTop);
    } else {
    return null;
    }
}