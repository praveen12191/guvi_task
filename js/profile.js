function hit(){
    $(document).ready(function(){
      var data = {
        img : $("#img").val,
        name: $("#name").val(),
        email: $("#email").val(),
        dob: $("#dob").val(),
        address: $("#address").val(),
      };
  console.log(data.name);
      $.ajax({
        url: 'php/register.php',
        type: 'post',
        data: data,
        success:function(response){
            let name = localStorage.getItem('name');
            let email = localStorage.getItem('email');
            let dob = localStorage.getItem('dob');
            let address = localStorage.getItem('address');
            user_name = document.getElementById('name');
            user_name.innerHTML = val;
            Email = document.getElementById('email');
            Email.innerHTML = email;
            dob = document.getElementById('name');
            dob.innerHTML = val;
            address = document.getElementById('email');
            adddress.innerHTML = email;
            console.log(email);
            alert(response);
          if(response == "Successful"){
            window.location.reload();
          }
        }
      });
    });
  }