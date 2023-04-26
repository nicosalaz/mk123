$(document).ready(function() {


        $('body').on('click', 'td', function() {
            
            document.getElementById("colorx2").style.display="block"; 
            document.getElementById("rmenu2").style.display="block";  
                
                var opcionw= document.getElementById("opcionx").value;
                var colorw= document.getElementById("concolor").value;


            if (colorw=='white') {
                
                if (opcionw=='section-2') {
              
                        var celdaw= document.getElementById("cell4").value;
                           /*  alert(celdaw); */
                        if (celdaw=='counter' ||
                            celdaw=='total_blister_in_shippers' ||
                            celdaw=='reserve_release_samples' || 
                            celdaw=='qc_sample' || 
                            celdaw=='production_yield' || 
                            celdaw=='process_yield') {
                                
                                document.getElementById("colorx2").style.display="none";
                            } 

                        document.getElementById("rmenu2").style.display="block";
                        document.getElementById("rmenu2").className = "show";
                        document.getElementById("rmenu2").style.top = mouseY(event) + 'px';
                        document.getElementById("rmenu2").style.left = mouseX(event) + 'px';
                 
                    } 
               

            } else if (colorw=='red') {

                              
                if (opcionw=='section-2' && opcionw !=='section-3c') {
                        document.getElementById("rmenu").className = "hide";

                } else {
 
                        if (opcionw =='section-3') {
                            document.getElementById("rmenu3b").className = "show";
                        }
                    document.getElementById("rmenu3b").style.top = mouseY(event) + 'px';
                    document.getElementById("rmenu3b").style.left = mouseX(event) + 'px';
                }
            
            } else if(colorw=='nocolor' || colorw=='') {
              

                document.getElementById("rmenu2").style.display="block";
                document.getElementById("rmenu2").className = "show";
                document.getElementById("rmenu2").style.top = mouseY(event) + 'px';
                document.getElementById("rmenu2").style.left = mouseX(event) + 'px'; 
                       
            } else{
                                          
                document.getElementById("rmenu").className = "hide";
                document.getElementById("rmenu2").style.display="block";
                document.getElementById("rmenu2").className = "show";
                document.getElementById("rmenu2").style.top = mouseY(event) + 'px';
                document.getElementById("rmenu2").style.left = mouseX(event) + 'px';
                   
            }

            window.event.returnValue = false;

        });
 
    });

    // this is from another SO post...  
    $(document).bind("click", function(event) {
        document.getElementById("rmenu").className = "hide";
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