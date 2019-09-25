<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Laravel</title>


    <script src="{{asset('/Utilities/jquery.js')}}"></script>
    <script src="{{asset('/bootstrap/dist/js/bootstrap.min.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/additional-methods.min.js"></script>
      

    <link href=" {{asset('/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">
    <style>
      .error{ color:red; } 
      </style>

</head>
<body>
    <div class="container mt-5">
      <div><h1 class="text-center">Feedback</h1></div>
        <form id="feedback">
            @csrf
            <div class="form-group">
                <label for="exampleInputName">Name</label>
                <input type="name" class="form-control" id="exampleInputName" name="name"  placeholder="Enter name">
                <span class="text-danger">{{ $errors->first('name') }}</span>
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Email</label>
              <input type="email" class="form-control" id="exampleInputEmail1" name="email" aria-describedby="emailHelp" placeholder="Enter email">
              <span class="text-danger">{{ $errors->first('email') }}</span>
            </div>
            <div class="form-group">
              <label for="exampleInputTelephone">Telephone</label>
              <input type="text" class="form-control" id="exampleInputTelephone" name="telephone" >
              <span class="text-danger">{{ $errors->first('telephone') }}</span>
            </div>
            <div class="form-group">
              <label for="exampleFormControlFeedback">Feedback</label>
              <textarea class="form-control" id="exampleFormControlFeedback" name="feedback" rows="3"></textarea>
              <span class="text-danger">{{ $errors->first('feedback') }}</span>
            </div>
            <div class="alert alert-success d-none" id="msg_div">
                <span id="res_message"></span>
            </div>
            <button type="submit" id="send_form" class="btn btn-primary">Submit</button>
          </form>
    </div>
    <script>
        if ($("#feedback").length > 0) {
         $("#feedback").validate({
           
         rules: {
           name: {
             required: true,
             maxlength: 50
           },
       
            telephone: {
                 required: true,
                 digits:true,
                 minlength: 9,
                 maxlength:10,
             },
             email: {
                     required: true,
                     maxlength: 50,
                     email: true,
                 },    
            feedback: {
            required: true,
              },   
         },
         messages: {
             
           name: {
             required: "Please enter name",
             maxlength: "Your last name maxlength should be 50 characters long."
           },
           telephone: {
             required: "Please enter contact number",
             minlength: "The contact number should be 9 digits",
             digits: "Please enter only numbers",
             maxlength: "The contact number should be 10 digits",
           },
           email: {
               required: "Please enter valid email",
               email: "Please enter valid email",
               maxlength: "The email name should less than or equal to 50 characters",
             },
             feedback: {
              required: "Please enter valid feeback",
              
            },
              
         },
         submitHandler: function(form) {
          $.ajaxSetup({
               headers: {
                   'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
               }
           });
           $('#send_form').html('Sending..');
           $.ajax({
             url: 'http://localhost:8000/surveyPost' ,
             type: "POST",
             data: $('#feedback').serialize(),
             success: function( response ) {
                 $('#send_form').html('Submit');
                 $('#res_message').show();
                 $('#res_message').html(response.msg);
                 $('#msg_div').removeClass('d-none');
      
                 document.getElementById("contact_us").reset(); 
                 setTimeout(function(){
                 $('#res_message').hide();
                 $('#msg_div').hide();
                 },10000);
             }
           });
         }
       })
     }
     </script>
</body>
</body>
</html>
