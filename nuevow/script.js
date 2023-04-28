const navbar = document.querySelector(".navbar");
const navbarOffsetTop = navbar.offsetTop;
const sections = document.querySelectorAll("section");
const navbarLinks = document.querySelectorAll(".navbar-link");
const progress = document.querySelector(".progress-bars-wrapper");
const progressBarPercents = [97, 89, 85, 87, 80, 70, 50];

window.addEventListener("scroll", () => {
  mainFn();
});

const mainFn = () => {
  if (window.pageYOffset >= navbarOffsetTop) {
    navbar.classList.add("sticky");
  } else {
    navbar.classList.remove("sticky");
  }

  sections.forEach((section, i) => {
    if (window.pageYOffset >= section.offsetTop - 10) {
      navbarLinks.forEach((navbarLink) => {
        navbarLink.classList.remove("change");
      });
      navbarLinks[i].classList.add("change");
    }
  });

  if (window.pageYOffset + window.innerHeight >= progress.offsetTop) {
    document.querySelectorAll(".progress-percent").forEach((el, i) => {
      el.style.width = `${progressBarPercents[i]}%`;
      el.previousElementSibling.firstElementChild.textContent =
        progressBarPercents[i];
    });
  }
};

mainFn();

window.addEventListener("resize", () => {
  window.location.reload();
});


  function enviarformx(X){  
      document.getElementById(X).submit();
      document.getElementById(X).reset();
  }

 function go_section(X){
        var celdaw= document.getElementById("cell4").value;
        if (celdaw=='counter' ||
            celdaw=='total_blister_in_shippers' ||
            celdaw=='reserve_release_samples' || 
            celdaw=='qc_sample' || 
            celdaw=='production_yield' || 
            celdaw=='process_yield') {
            
            document.getElementById("valores").style.display="block";
            document.getElementById("colorx2").style.display="none";
        } else {
            document.getElementById("valores").style.display="none";
            document.getElementById("colorx2").style.display="block";
        }

      if (X=='logout') {
        location.href='logout.php';
      } else {
          document.getElementById("opcionx").value =X;
          document.getElementById("section-1").hidden=true;
          document.getElementById("section-2").hidden=true;
          document.getElementById("section-3").hidden=true;
          document.getElementById("section-4").hidden=true;
          document.getElementById("section-5").hidden=true;
          document.getElementById("section-6").hidden=true;
          // document.getElementById("section-2b").style.display="none";
          document.getElementById("section-2c").hidden=true;
          document.getElementById(String(X)).hidden=false;
          // document.getElementById(String(X)).style.display="flex";
          setTimeout(function(){ 
            // document.getElementById("rmenu2").style.display="none";
            }, 100);
      }

 }


 function showdatay(M){
      /* console.log("Mensaje: "+M); */
      document.getElementById("rmenu2").style.display="none";
      document.getElementById("salidaMensaje").innerHTML = M;
      document.getElementById("salidaMensaje2").innerHTML = M;
  }

  function showdatayb(M){
      if (M === null) {
        console.log('Nulo');
      } else {
        document.getElementById("salidaMensajeb").innerHTML = M;
        document.getElementById("salidaMensaje2b").innerHTML = M;
      }
 
  }

  function enviarform(X,S){ 
     document.getElementById(X).submit();
     document.getElementById(X).reset();
     setTimeout(function(){ 
        location.href='?opc='+S;
    }, 1000);
  }

  function reparar(C,T,ID){
    if (C=='red') {
        document.getElementById("tipo").value=T;
        document.getElementById("idx").value=ID;
        document.getElementById("repaired").value="Ok";           
        /* document.getElementById("ingresoreparar").style.display="block"; */          
    }         
  }

  function repararb(C,T,ID){
    if (C=='red') {
        document.getElementById("tipob").value=T;
        document.getElementById("idxb").value=ID;
        document.getElementById("repairedb").value="Ok";           
        /* document.getElementById("ingresorepararb").style.display="block"; */          
    }         
  }

  function loteelegido(X){
    document.getElementById("lot_number4").value=X;
  }

  function loteelegido2(S,L){
    /* alert(S); alert(L); */
    document.getElementById("shiftx").value=S;
    document.getElementById("lotnumberx").value=L;
  }

  function celdaelegida(X,C){ 
      document.getElementById("concolor").value=C;
      document.getElementById("cell4").value=X;                    
  }

  function celdaelegida2(event){ 
      const X = event.clientX;
      const Y = event.clientY;
      var n1,n2,W;
      n1 = parseInt(Y);
      n2 = parseInt(20);
      W = n1 + n2;
      var posx= X+"px";
      var posy= W+"px"; 
      document.getElementById("rmenu3b").style.display = "block";
      document.getElementById("rmenu3b").className = "show";
      document.getElementById("rmenu3b").style.left=posx;
      document.getElementById("rmenu3b").style.top=posy;
      setTimeout(function(){ 
        document.getElementById("rmenu3b").style.display = "none";
      }, 4000);
  }

  function finalizar(X){
    document.getElementById('lotnumber').value=X;
    document.getElementById('finaliza').submit();
    document.getElementById('finaliza').reset();
    setTimeout(function(){ 
      location.reload();
    }, 2000);
  }


  function verhistorico(S,X){
      location.href='?opc='+S+'&lotn='+X;
  }

 function vercomentario(X){
      var comentario= X.replace(/['"]+/g, '');
    console.log(comentario);
    document.getElementById("commentsx").innerHTML = comentario;
 }