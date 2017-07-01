function display_random_word(response){
  j = JSON.parse(response);
  console.log(j.english);
  document.getElementById("quiz_o").innerHTML= j.english;
}

function gen_word(){
  document.getElementById("quizz-answer").innerHTML="";
  document.getElementById("quiz_i").value="";
  $.ajax({
        type: "GET",
        url: "generate_random_word.php",
        data: "",
        cache: false,
        success: function(response){
        display_random_word(response);
        }
      });
}
function check_answer(response)
{
  var j = JSON.parse(response);
  if (j.result=='true') document.getElementById("quizz-answer").innerHTML="<div class=\"w3-text-green\"> Correct </div>";
  else document.getElementById("quizz-answer").innerHTML="<div class=\"w3-text-red\">" + j.result + "</div>";

}
function check()
{
  var english = document.getElementById("quiz_o").innerHTML;
  var ans     = document.getElementById("quiz_i").value;
  var http_req = 'english=' + english +'&ans=' + ans;
   $.ajax({
        type: "GET",
        url: "check_random_word.php",
        data: http_req,
        cache: false,
        success: function(response){
        check_answer(response);
        }
      });
}