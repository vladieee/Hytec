
const form = document.getElementById('formData');
form.addEventListener('submit', function(e){
    e.preventDefault();
    const formData = new FormData(form);
    const fname = formData.get('fname');
    const lname = formData.get('lname');
    const email = formData.get('email');
    const password = formData.get('password');
    const rpassword = formData.get('rpassword');
    if(password === rpassword){
        $.ajax({
            url: 'includes/register.php',
            type: 'POST',
            data: {
                fname: fname,
                lname: lname,
                email: email,
                password: password,
                rpassword: rpassword
            },
            success: function(response){
                console.log(response);
                if(response == 0)
                {
                    Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: 'New account created'
                      }).then(()=>{
                        window.location.href = "index.php";
                    })
                    
                }
                else if(response == 1)
                {
                    console.log(response);
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'Email already exist'
                      });
                      
                }
                else if(response == 2)
                {
                    console.log('Unexpected Error');
                }
              
            },
            error: function(xhr, status, error){
                console.error('AJAX request failed with status ' + status + ": " + error);
            }
        });
    }else{
        Swal.fire({
            icon: 'error',
            title: 'Error!',
            text: 'Password and Re-enter password did not match'
        })
    }
    
});


