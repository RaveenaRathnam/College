//user first name validation starts
function fname_validation(){
    'use strict';
    var fname_name = document.getElementById("fname");
    var fname_value = document.getElementById("fname").value;
    var fname_length = fname_value.length;
    var letters = /^[a-z ,.'-]+$/i ;
    if(fname_length==0 || !fname_value.match(letters))
    {
    document.getElementById('fname_err').innerHTML = 'Please enter a valid first name.';
    fname_name.focus();
    document.getElementById('fname_err').style.color = "#FF0000";
    }
    else
    {
    document.getElementById('fname_err').innerHTML = 'Vaild!';
    document.getElementById('fname_err').style.color = "#00AF33";
    }
    }
    //user last name validation starts
    function lname_validation(){
        'use strict';
        var lname_name = document.getElementById("lname");
        var lname_value = document.getElementById("lname").value;
        var lname_length = lname_value.length;
        var letters = /^[a-z ,.'-]+$/i ;
        if(lname_length==0 || !lname_value.match(letters))
        {
        document.getElementById('lname_err').innerHTML = 'Please enter a valid last name.';
        lname_name.focus();
        document.getElementById('lname_err').style.color = "#FF0000";
        }
        else
        {
        document.getElementById('lname_err').innerHTML = 'Vaild!';
        document.getElementById('lname_err').style.color = "#00AF33";
        }
        }
    //first and last name validation ends
    //email validation starts
    function email_validation(){
    'use strict';
    var email_name = document.getElementById("email");
    var email_value = document.getElementById("email").value;
    var email_length = email_value.length;
    var letters = /^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$/i ;
    if(email_length==0 || !email_value.match(letters))
    {
    document.getElementById('email_err').innerHTML = 'Please enter a valid email address.';
    email_name.focus();
    document.getElementById('email_err').style.color = "#FF0000";
    }
    else
    {
    document.getElementById('email_err').innerHTML = 'Valid email';
    document.getElementById('email_err').style.color = "#00AF33";
    }
    }
    //email validation ends
     //phone validation starts
     function phone_validation(){
        'use strict';
        var phone_name = document.getElementById("phone");
        var phone_value = document.getElementById("phone").value;
        var phone_length = phone_value.length;
        var letters =/^[0-9]{10}$/;
        if(phone_length==0 || !phone_value.match(letters))
        {
        document.getElementById('phone_err').innerHTML = 'Please enter a valid phone number.';
        phone_name.focus();
        document.getElementById('phone_err').style.color = "#FF0000";
        }
        else
        {
        document.getElementById('phone_err').innerHTML = 'Valid phone number.';
        document.getElementById('phone_err').style.color = "#00AF33";
        }
        }
        //phone validation ends
        //birthdate validation starts
        function birthdate_validation(){
            'use strict';
            var  birthdate_name = document.getElementById("birthdate");
            var  birthdate_value = document.getElementById("birthdate").value;
            var  birthdate_length = birthdate_value.length;
            var birthdate = new Date(birthdate_value);
            var today = new Date();
            var age = today.getFullYear() - birthdate.getFullYear();
            if(birthdate > today || birthdate_length==0)
            {
            document.getElementById('birthdate_err').innerHTML = 'Please enter a valid date of birth.';
            birthdate_name.focus();
            document.getElementById('birthdate_err').style.color = "#FF0000";
            }
            else if (age < 18 || age > 45) 
            {
            document.getElementById('birthdate_err').innerHTML = 'Unfortunately, only applicants of age 18-45 are eligible';
            birthdate_name.focus();
            document.getElementById('birthdate_err').style.color = "#FF0000";
            } 
            else
            {
            document.getElementById('birthdate_err').innerHTML = 'Valid date of birth';
            document.getElementById('birthdate_err').style.color = "#00AF33";
            }
            }
        //birthdate validation ends
    //resume validation starts
    
    function resume_validation(){
        'use strict';
        var  resume_name = document.getElementById("resume");
        var resume_value = document.getElementById("resume").value;
        var allowed_extensions = /(\.doc|\.docx|\.xml|\.pdf)$/i;
        if(!allowed_extensions.exec(resume_value))
        {
        document.getElementById('resume_err').innerHTML = 'Please upload a file in one of the following formats: .doc, .docx, .xml, .pdf';
        resume_name.focus();
        document.getElementById('resume_err').style.color = "#FF0000";
        }
        else
        {
        document.getElementById('resume_err').innerHTML = 'File uploaded.';
        document.getElementById('resume_err').style.color = "#00AF33";
        }
        }
    //resume validation ends
     //admissions validation starts
     function admissions_validation() {
        'use strict';
        var admissions_select = document.getElementById("admissions");
        var selected_option = admissions_select.options[admissions_select.selectedIndex].value;
        if (selected_option === "") {
          document.getElementById('admissions_err').innerHTML = 'Please select an option.';
          admissions_select.focus();
          document.getElementById('admissions_err').style.color = "#FF0000";
        } else   {
            document.getElementById('admissions_err').innerHTML = 'Valid option.';
            document.getElementById('admissions_err').style.color = "#00AF33";
            }
      }
    //admissions validation ends
    
   
 
    