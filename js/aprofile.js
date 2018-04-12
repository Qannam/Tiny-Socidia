function menueOptionMyProfile(){
    
       document.getElementById("infDiv").style.display="inline";
       document.getElementById("Listoffirends").style.display="none";
        document.getElementById("RequestFirendship").style.display="none";
}
function menueOptionListOfFirends(){
         document.getElementById("Listoffirends").style.display="inline";
          document.getElementById("infDiv").style.display="none";
          document.getElementById("RequestFirendship").style.display="none";
        
    }
    function menueOptionListOfRequest(){
             document.getElementById("RequestFirendship").style.display="inline";
            document.getElementById("infDiv").style.display="none";
             document.getElementById("Listoffirends").style.display="none";
  
    }
document.getElementById("MyProInfo").addEventListener("click",menueOptionMyProfile);
document.getElementById("lisFri").addEventListener("click",menueOptionListOfFirends);
document.getElementById("FirReq").addEventListener("click",menueOptionListOfRequest);