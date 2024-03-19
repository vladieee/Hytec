
const form = document.getElementById('form');
form.addEventListener('submit', function(e){
    e.preventDefault();
    
    const formData = new FormData(form);

    const email = formData.get('email');
    const password = formData.get('password');
    
    $.ajax({
        url: 'includes/login.php',
        type: 'POST',
        data:{
            email: email,
            password: password,
        },
        success: function(response){
            
            if(response == 0)
            {
                window.location.href = "http://localhost/Hytec/index.php";
            }
            else if(response == 1)
            {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Wrong email or password'
                })
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
});


