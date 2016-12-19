$(document).ready(function () {


  $("#district").click(function () {

    var distval=$('#district').val();
      $.post('http://localhost:8000/api/searchcity',{distval:distval },function (match) {
      $("#city").html(match);
    })
  });


}); 