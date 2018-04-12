window.addEventListener("load" , function(){
   var postButton = document.getElementById("postButton");
   postButton.addEventListener("click" , function(){
      if( document.getElementById("message").value != ""){
         var div1 = document.createElement("div") ;
         var div1_2 = document.createElement("div") ;
         var div1_2_2 = document.createElement("div") ;
         var p1 = document.createElement("p");
         var text1 = document.createTextNode("someone");
         var img = document.createElement("img") ;
         var div1_4 = document.createElement("div") ;
         var div1_4_2 = document.createElement("div") ;
         var p2 = document.createElement("p");
         var text2 = document.createTextNode(document.getElementById("message").value);
         
         div1.setAttribute("class" , "row") ;
         div1_2.setAttribute("class" , "col-sm-3") ;
         div1_2_2.setAttribute("class" , "well") ;
         div1_4.setAttribute("class" , "col-sm-9") ;
         div1_4_2.setAttribute("class" , "well") ;
         img.setAttribute("src" , "https://winklevosscapital.com/wp-content/uploads/2014/10/2014-09-16-Anoynmous-The-Rise-of-Personal-Networks.jpg") ;
         img.setAttribute("class" , "img-circle") ;
         img.setAttribute("height" , "55") ;
         img.setAttribute("width" , "55") ;
         
         p1.appendChild(text1);
         div1_2_2.appendChild(p1);
         div1_2_2.appendChild(img);
         p2.appendChild(text2);
         div1_4_2.appendChild(p2);
         div1_2.appendChild(div1_2_2);
         div1_4.appendChild(div1_4_2);
         div1.appendChild(div1_2);
         div1.appendChild(div1_4);
         
         var deadline = document.getElementById("deadline");
         deadline.appendChild(div1);
         document.getElementById("message").value = "";
      }
   });
});

