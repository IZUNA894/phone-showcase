$(document).ready(function() {
 // executes when HTML-Document is loaded and DOM is ready
console.log("document is ready");


  $( ".card" ).hover(
  function() {
    $(this).addClass('shadow-lg').addClass("").css('cursor', 'pointer');
  }, function() {
    $(this).removeClass('shadow-lg');
  }
);

// document ready
});
// function to make ajax req to server to delete data of asked phone,called when user click on delete button in card
function delete_phone(id){
  console.log("inside function");
var xhttp = new XMLHttpRequest();


xhttp.onreadystatechange = function() {
if (this.readyState == 4 && this.status == 200) {

document.getElementById("response").innerHTML=this.responseText;
}
};
xhttp.open("GET", "utility.php?deleteId="+id, true);
xhttp.send();
}
