function mycallback(response)
{
   console.log(response);
  var jresult    = JSON.parse(response);
  var exsistence = jresult.exsistence;

  if( exsistence == '0' ){
    var it_word   = jresult.parola;
    var en_word   = jresult.english;
    var date      = jresult.data;
    var num       = jresult.numero;
    var num_words = jresult.num_words;
    var table     = document.getElementById("mytable");
    var row       = table.insertRow(1);
    var cell1     = row.insertCell(0);
    var cell2     = row.insertCell(1);
    var cell3     = row.insertCell(2);
    cell1.innerHTML = it_word;
    cell2.innerHTML = en_word;
    cell3.innerHTML = date;
    document.getElementById("num_words").innerHTML=num_words;
    console.log(exsistence)
  }
  else {
    alert("Word already exists");
  }
}




function add_to_base() {
  var english = document.getElementById("en_word").value;
  var italian = document.getElementById("it_word").value;
  document.getElementById("en_word").value   = " ";
  document.getElementById("it_word").value = " ";
  var dataString = 'parola=' + italian + '&english=' + english; // php GET request that will be included in URL
  if (italian == '' || english == '') {
    alert("Please Fill All Fields");
  } 
  else {
    // AJAX code to submit form.
    $.ajax({
      type: "GET",
      url: "add.php",
      data: dataString,
      cache: false,
      success: function(response){
      mycallback(response);
      }
    });
  }
  return false;
}
