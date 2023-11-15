function submitData()
{
   var name = document.getElementById("name").value;
   var gender = document.getElementById("gen").value;
   var contact_num = document.getElementById("con").value;
   var email = document.getElementById("email").value;
   var Password = document.getElementById("pass").value;
   var Confirm_pass = document.getElementById("cpass").value;

   if(name===""||gender===""||contact_num===""||email===""||Password===""||Confirm_pass==="")
   {
        alert("Please fill section");
        return false;
   }
   else if(gender===NULL|| gender ==="")
   {

   }
   else if(Password.length<6)
   {
        alert("Minimum length of Password is 6");
        return false;
   }
   else if(Password !== Confirm_pass)
   {
        alert("Password dose not Match");
        return false;
   }
   else{
    var registrationdata = 
    {
        username: name,
        Gender_: gender,
        user_contact: contact_num,
        useremail: email,
        userpass: Password,
        userConfirm_pass: Confirm_pass
    };

    //Send data to the server using the fetch method
    fetch('registration.php',
    {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(registrationdata)
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