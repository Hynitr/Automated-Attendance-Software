$(document).ready(function () {

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


  //register
  $("#register").click(function () {

    var fname     = $("#fname").val();
    var lname     = $("#lname").val();
    var attdid    = $("#attdid").val();
    var gender    = $("#gender").val();
    var tel1      = $("#tel1").val();
    var tel2      = $("#tel2").val();
    var dob       = $("#dob").val();
    var category  = $("#category").val();
    var address   = $("#address").val();
    var passport  = $("#passprt")[0].files[0];

    if (fname == "" || fname == null) {
      $(toastr.error("Kindly insert First Name"));
    } else {
      if (lname == "" || lname == null) {
        $(toastr.error("Kindly insert Last Name"));
      } else {
       
        if(tel1 == "" || tel1 == null) {

          $(toastr.error("Kindly insert Telephone 1"));

        } else {

          if(dob == "" || dob == null) {

            $(toastr.error("Please date of birth"));

          }else {

          if(address == "" || address == null) {

            $(toastr.error("Kindly provide valid address"));
          } else {

            if(passport == "" || passport == null) {

              $(toastr.error("Kindly provide valid passport"));

            } else {

              $(toastr.clear());
              $("#register").html("Submitting... Please wait");


              var formData = new FormData();
              formData.append("fname", fname);
              formData.append("lname", lname);
              formData.append("attdid", attdid);
              formData.append("gender", gender);
              formData.append("tel1", tel1);
              formData.append("tel2", tel2);
              formData.append("dob", dob);
              formData.append("category", category);
              formData.append("address", address);
              formData.append("passport", passport);
              $.ajax({
                url: "functions/init.php",
                type: "POST",
                data: formData,
                processData: false,
                contentType: false,
                success: function(data) {
                  $(toastr.success(data));
                }
              });

            }
          }
          }
        }

      }
    }
  });


  
  //edit
  $("#update").click(function () {

    var fname     = $("#fname").val();
    var lname     = $("#lname").val();
    var attdid    = $("#attdid").val();
    var gender    = $("#gender").val();
    var tel1      = $("#tel1").val();
    var tel2      = $("#tel2").val();
    var dob       = $("#dob").val();
    var category  = $("#category").val();
    var address   = $("#address").val();
    var edpassport  = $("#passprt")[0].files[0];
    var roletype  = "edit";

    if (fname == "" || fname == null) {
      $(toastr.error("Kindly insert First Name"));
    } else {
      if (lname == "" || lname == null) {
        $(toastr.error("Kindly insert Last Name"));
      } else {
       
        if(tel1 == "" || tel1 == null) {

          $(toastr.error("Kindly insert Telephone 1"));

        } else {

          if(dob == "" || dob == null) {

            $(toastr.error("Please date of birth"));

          }else {

          if(address == "" || address == null) {

            $(toastr.error("Kindly provide valid address"));
          } else {

              $(toastr.clear());
              $("#update").html("Updating... Please wait");


              var formData = new FormData();
              formData.append("fname", fname);
              formData.append("lname", lname);
              formData.append("attdid", attdid);
              formData.append("gender", gender);
              formData.append("tel1", tel1);
              formData.append("tel2", tel2);
              formData.append("dob", dob);
              formData.append("category", category);
              formData.append("address", address);
              formData.append("edpassport", edpassport);
              formData.append("roletype", roletype);
              $.ajax({
                url: "functions/init.php",
                type: "POST",
                data: formData,
                processData: false,
                contentType: false,
                success: function(data) {
                  $(toastr.success(data));
                }
              });

            }
          }
          
        }

      }
    }
  });


   //delete
   $("#delete").click(function () {

    var delattdid    = $("#attdid").val();
    var roletype  = "delete";

    $.ajax({
      type: "post",
      url: "functions/init.php",
      data: { delattdid: delattdid, roletype: roletype },
        beforeSend: function() {
                $(toastr.clear());
                $("#delete").html("Deleting... Please wait");
             },
      success: function (data) {
        $(toastr.success(data));
      },
    });
  });



  //security key validation
  $("#securitykeysubmit").click(function () {

    var securitykeyy     = $("#securitykeyy").val();
    var qrid             = $("#qrid").val();

    if(securitykeyy == "" || securitykeyy == null) {

      $(toastr.error("Input security key"));

    }  else {


      $(toastr.error("Submitting..."));

      $.ajax({
        type: "post",
        url: "functions/init.php",
        data: { securitykeyy: securitykeyy, qrid: qrid },
        success: function (data) {
          $(toastr.success(data));
        },
      });
    }

  });


   //profile update
   $("#profchange").click(function () {

    var schoolname     = $("#schoolname").val();
    var website        = $("#website").val();
    var alias          = $("#alias").val();
    var telephone      = $("#telephone").val();
    var address        = $("#address").val();
    var blksmnme       = $("#blksmnme").val();
    var blksmseml      = $("#blksmseml").val();
    var blkpword       = $("#blkpword").val();
    var whtkn          = $("#whtkn").val();
    var intanceid      = $("#intanceid").val();
    var timein         = $("#timein").val();

    if(schoolname == "" || schoolname == null) {

      $(toastr.error("Input your school name"));

    }  else {
      
      if(alias == "" || alias == null) {

        $(toastr.error("Input your school alias"));
  
      } else {

        if(telephone == "" || telephone == null) {

          $(toastr.error("Input your school telephone number"));
    
        } else {

          if(address == "" || address == null) {

            $(toastr.error("Input your school address"));
      
          } else {

            if(blksmnme == "" || blksmnme == null) {

              $(toastr.error("Input your SMS Name"));
        
            } else {

              if(blksmseml == "" || blksmseml == null) {

                $(toastr.error("Input your Bulk SMS Email"));
          
              } else {

                if(blkpword == "" || blkpword == null) {

                  $(toastr.error("Input your Bulk SMS Password"));
            
                } else {

                  if(timein == "" || timein == null) {

                    $(toastr.error("Input your Resumption time"));
              
                  } else {

                     $(toastr.info("Submitting..."));
                     $.ajax({
                      type: "post",
                      url: "functions/init.php",
                      data: { schoolname: schoolname, website: website, alias: alias, telephone: telephone, address: address, blksmnme: blksmnme, blksmseml: blksmseml, blkpword: blkpword, whtkn: whtkn, intanceid: intanceid, timein: timein },
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
}
});

});