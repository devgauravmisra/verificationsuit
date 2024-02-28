<!doctype html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
      <title>Verification Suit</title>
      <style>  
         .div-class {
                     width: 415px; /* Example width */
                     height: 800px; /* Example height */
                    /*  border: 1px solid white; Example border */
                     overflow: hidden; /* or 'auto' or 'scroll' depending on your preference */
                     overflow-wrap: break-word;
               }

         </style>
   </head>
   <body style="background-color: black; color:white !important;">
      <div class="container-fluid">
         <h2 style="text-align:center !important; margin:3%;">Verification Suite Demo</h2>
         <div class="row">
            <div class="col-md-3" style=" border-style: dotted; border-color: white !important; box-shadow: 1px 2px 11px 5px white !important; text-align: center !important;" >
               <form method="post"  id="myForm" >
                  <label class="form-label" for="form6Example1">Bank Account </label>
                  <div class="form-outline">
                     <input type="text" id="form6Example2" name="bankac" class="form-control"  placeholder="Please enter Bank Account No" required />
                  </div>
                  <div class="form-outline">
                     <label class="form-label" for="form6Example1">IFSC</label>
                     <input type="text" id="form6Example1" name="ifsc" class="form-control"
                        placeholder="Please enterIFSC" required />
                  </div>
                  <button type="button" onclick="submitForm()" class="btn btn-primary btn-block mb-4" style="margin-top:4%">Verify Bank Details</button>
               </form>
               <h6><a  style="font-color: white !important;" href="https://docs.cashfree.com/docs/data-to-testintegration#bank-numbers">Test Details</a></h6>
            </div>
            <div class="col-md-3" style=" border-style: dotted; border-color: white !important; box-shadow: 1px 2px 11px 5px white !important; text-align: center !important;" >
               <form method="post" id="upiform">
                  <label class="form-label" for="form6Example1">UPI VPA MOBILE NUMBER </label>
                  <div class="form-outline">
                     <input type="text" id="form6Example2" name="mobile" class="form-control"  placeholder="Please enter mobile no" required />
                  </div>
                  <label class="form-label" for="form6Example1">Verification ID </label>
                  <div class="form-outline">
                     <input type="text" id="form6Example2" name="verificationid" class="form-control"  placeholder="Please enter verification id" required />
                  </div>
                  <button type="button" onclick="verifyupidetails()" class="btn btn-primary btn-block mb-4" style="margin-top:4%">Verify UPI/VPA</button>
                  <h6><a href="https://docs.cashfree.com/docs/data-to-testintegration#upi-vpa-from-mobile-number">Test Details</a></h6>
               </form>
            </div>
            <div class="col-md-3" style=" border-style: dotted; border-color: white !important; box-shadow: 1px 2px 11px 5px white !important; text-align: center !important;" >
               <form method="post" id="panform">
                  <label class="form-label" for="form6Example1">PAN </label>
                  <div class="form-outline">
                     <input type="text" id="form6Example2" name="pan" class="form-control"  placeholder="Please enter PAN no" required />
                  </div>
                  <button type="button" onclick="pandetail()"class="btn btn-primary btn-block mb-4" style="margin-top:4%">Verify PAN Details</button>
                  <h6><a href="https://docs.cashfree.com/docs/data-to-testintegration#pan">Test Details</a></h6>
               </form>
            </div>
            <div class="col-md-3" style=" border-style: dotted; border-color: white !important; box-shadow: 1px 2px 11px 5px white !important; text-align: center !important;" >
               <form method="post" id ="upiidform">
                  <label class="form-label" for="form6Example1">UPI ID </label>
                  <div class="form-outline">
                     <input type="text" id="form6Example2" name="upiid" class="form-control"  placeholder="Please enter UPI ID" required />
                  </div>
                  <button type="button" onclick="upiidverification()" class="btn btn-primary btn-block mb-4" style="margin-top:4%" >Verify UPI details</button>
                  <h6><a href="https://docs.cashfree.com/docs/data-to-testintegration#upi">Test Details</a></h6>

               </form>
            </div>
          
         </div>
         <div class="row">
            <div class="col-md-3 div-class" id="responseDiv"  style="color: chartreuse; margin-top: 36px">
            </div>
            <div class="col-md-3 div-class" id="verifyupidetails" style="color: chartreuse; margin-top: 36px">
            </div>
            <div class="col-md-3 div-class" id="panresp" style="color: chartreuse; margin-top: 36px">
            </div> 
            <div class="col-md-3 div-class" id="upiidverification" style="color: chartreuse; margin-top: 36px">
            </div>
         </div>
      </div>
   
      
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
      <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
      <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
         integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
         integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
      <script>
         jQuery.noConflict();
         

          // Bank account verification

         function submitForm() {
         var formData = $('#myForm').serialize();
         
         $.ajax({
             url: 'http://localhost:8888/verificationsuit/verify.php', 
             type: 'POST',
             data: formData,
             success: function (response) {
                //alert(response);
                $('#responseDiv').html('Verification response: ' + response);
                
             },
             error: function (error) {
                 console.log('Error submitting form:', error);
             }
         });
         }


         // Pan verification
         
         function pandetail() {
         var formData = $('#panform').serialize();
         
          $.ajax({
              url: 'http://localhost:8888/verificationsuit/panverify.php', 
              type: 'POST',
              data: formData,
              success: function (response) {
                // console.log(response);
                 $('#panresp').html('Form submitted successfully: ' + response);
              },
              error: function (error) {
                  console.log('Error submitting form:', error);
              }
          });
         }
         
         //UPI details verification

         function verifyupidetails() {
         var formData = $('#upiform').serialize();
         
          $.ajax({
              url: 'http://localhost:8888/verificationsuit/verifyupidetails.php', 
              type: 'POST',
              data: formData,
              success: function (response) {
                // console.log(response);
                 $('#verifyupidetails').html('Form submitted successfully: ' + response);
              },
              error: function (error) {
                  console.log('Error submitting form:', error);
              }
          });
         }

         // UPI id verification

         function upiidverification() {
         var formData = $('#upiidform').serialize();
         
          $.ajax({
              url: 'http://localhost:8888/verificationsuit/upiidverification.php', 
              type: 'POST',
              data: formData,
              success: function (response) {
               //  console.log(response);
                 $('#upiidverification').html('Form submitted successfully: ' + response);
              },
              error: function (error) {
                  console.log('Error submitting form:', error);
              }
          });
         }
          
      </script>
   </body>
</html>