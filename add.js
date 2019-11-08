
  function make(ele)
  {
    var spec_func = function(str)
  {
      var specs=[];
      var arr= str.split(";");
      console.log(arr);
      arr.forEach((item)=>{
    item=item.split(":");
          var key= item[0];
          var value = item[1];
          specs[key]=value;
          }
          );

            return specs;
  };

  var specs=spec_func(ele);

  console.log(specs)  ;
  console.log("lentgh is " + Object.keys(specs).length);
  var length =Object.keys(specs).length;

  function tableCreate(data_arr,length) {
    //body reference
    console.log(data_arr.length);
    var body = document.getElementById("tgh");
    //console.log(body);
    // create elements <table> and a <tbody>
    var tbl = document.createElement("table");
    var tblBody = document.createElement("tbody");
    var rows= length;
    //data_arr.length;
    var cols=2;
    // cells creation
    for (var i = 0; i < rows; i++) {
      // table row creation
      var row = document.createElement("tr");

      for (var j = 0; j < cols; j++) {
        // create element <td> and text node
        //Make text node the contents of <td> element
        // put <td> at end of the table row
        var cell = document.createElement("td");
        if(j==0)
        {
          cell.setAttribute("style","text-align:left;");
          var cellText = document.createTextNode(Object.keys(data_arr)[i]);

        }
        else {
          cell.setAttribute("style","text-align:right;");
          var cellText = document.createTextNode(data_arr[Object.keys(data_arr)[i]]);


        }

        cell.appendChild(cellText);
        row.appendChild(cell);
      }

      //row added to end of table body
      tblBody.appendChild(row);
    }

    // append the <tbody> inside the <table>
    tbl.appendChild(tblBody);
    // put <table> in the <body>
    body.innerHTML="";
    body.appendChild(tbl);
    // tbl border attribute to
    //tbl.setAttribute("border", "2");
    tbl.setAttribute("class","table table-hover");
    tbl.setAttribute("style","width:80%;margin-left:auto;margin-right:auto;");
  }

  tableCreate(specs,length);

};
