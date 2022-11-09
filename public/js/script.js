 
function SetLeftPanelHeight() {
//      alert("load event detected!");
     var body = document.body,
         html = document.documentElement;

     var height = Math.max( body.scrollHeight, body.offsetHeight, 
                       html.clientHeight, html.scrollHeight, html.offsetHeight );
//      alert(height);
     document.getElementById("left-panel").style.height = height + "px";
      }
 
window.onload = SetLeftPanelHeight;
//   window.onresize = SetLeftPanelHeight;