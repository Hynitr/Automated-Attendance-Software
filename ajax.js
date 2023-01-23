$(document).ready(function () {

  //var pk = 'pk_live_7a2adba82cb1a1fc7bf752451c000e431d74bdc3';

  /*$(document).ajaxStart(function(){
    $(toastr.info("Loading...Please wait"));
  });
  $(document).ajaxComplete(function(){
    toastr.clear();
    $(toastr.error("Kindly insert your email"));
  });*/



  

  //signin
  $("#lsub").click(function () {
    var username = $("#luname").val();
    var password = $("#lpword").val();

    if (username == "" || username == null) {
      $(toastr.error("Kindly insert your email"));
    } else {
      if (password == "" || password == null) {
        $(toastr.error("Your password is empty"));
      } else {
        $.ajax({
          type: "post",
          url: "functions/init.php",
          data: { username: username, password: password },
            beforeSend: function() {
                    $(toastr.clear());
                    $("#lsub").html("Submitting... Please wait");
                 },
          success: function (data) {
            $(toastr.success(data));
          },
        });
      }
    }
  });



  //book appountment with doctor
  $("#bkdoc").click(function () {
    var aptdate = $("#aptdte").val();
    var bkmsg = $("#bkmsg").val();

    if (aptdate == "" || aptdate == null) {
      $(toastr.error("Please pick a date for your appointment"));
    } else {
      if (bkmsg == "" || bkmsg == null) {
        $(toastr.error("State the reason for booking an appointment"));
      } else {
        $.ajax({
          type: "post",
          url: "servl/init.php",
          data: { aptdate: aptdate, bkmsg: bkmsg },
            beforeSend: function() {
                    $(toastr.clear());
                    $("#bkdoc").html("Submitting... Please wait");
                 },
          success: function (data) {
            $(toastr.success(data));
          },
        });
      }
    }
  });


  
  //save profile details changes
  $("#updtpro").click(function () {

    var tel = $("#phoneNumber").val();
    var add = $("#address").val();
    var state = $("#state").val();
    var genotype = $("#genotype").val();
    var blood = $("#blood").val();
    var gender = $("#gender").val();
    var lang = $("#lang").val();

    if(tel == null || tel == '') {

      $(toastr.error("Please input a phone number"));

    } else {

    if(add == null || add == '') {

      $(toastr.error("Please provide your address"));

    } else {

    if(state == null || state == '') {

      $(toastr.error("Please provide your state"));

    } else {

      if(genotype == null || genotype == '') {

        $(toastr.error("We need your genotype"));
  
      } else {


        if(blood == null || blood == '') {

          $(toastr.error("We need your blood group"));
    
        } else {

          if(gender == null || gender == '') {

            $(toastr.error("We need your gender"));
      
          } else {


            if(lang == null || lang == '') {

              $(toastr.error("What your language"));
        
            } else {

            $.ajax({
              type: "post",
              url: "servl/init.php",
              data: {tel: tel, add: add, state: state, genotype: genotype, blood: blood, gender: gender, lang: lang},
              beforeSend: function() {
                $(toastr.clear());
                $("#updtpro").html("Submitting... Please wait");
             },
            success: function (data) {
              $(toastr.success(data));
            },
            });
      
    }
        
  }


}

}

}
    }
    }
  });

});