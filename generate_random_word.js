function display_random_word(response){
  j = JSON.parse(response);
  console.log(j.english);
  document.getElementById("quiz_io").placeholder= j.english;
}

function gen_word(){
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