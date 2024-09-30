let date1 = document.getElementById("date1");
let date2 = document.getElementById("date2");
let table = document.getElementById("table");
date2.onchange = function () {
    let date1Value = date1.value;
    let date2Value = date2.value;
    let dataRequest = new XMLHttpRequest;
    dataRequest.onreadystatechange = function () {
        if(this.status == 200 && this.readyState == 4)
        {
            table.innerHTML=this.responseText;
        }
    }
    dataRequest.open("GET","search_salary.php?date1="+date1Value+"&date2="+date2Value,true);
    dataRequest.send();
  }