    function submitData()
    {
        var username = document.getElementById("email").value;
        var password = document.getElementById("pass").value;

        if(username==""||password=="")
        {
            alert("Please fill section");
            return false;
        }
        else
        { 
            var login = 
          {
            userName_: username,
            Password_: password
          }
 
             //Send data to the server using the fetch method
            fetch('login.php',
            {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(login)
            })
            .then(res => 
                {
                    if(res.ok)
                    {
                        return res.json();
                    }
                    else
                    {
                        throw new Error('Registration Failed');
                    }
                })
                .then(data =>
                    {
                        console.log(data);
                    })
                .catch(error =>
                    {
                        console.error(error);
                    });

                    return true;
        }
    }
