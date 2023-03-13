<?php include 'includes/header.php';?>
<head>
<Style>
  form
  {
  /* background-color:white; */
    margin left:700px;
    margin right:300px;
    border-radius:50px;
    text-align:center;
  }
</Style>
</head>
<main class="container">
  <div class="starter-template text-center ">
  <h1>Contact us</h1>
  <p class="lead">Use this document as a way to quickly start any new project.<br> All you get is this text and a mostly barebones HTML document.</p>
  </div>
  
<form class="row g-3" method="POST" name="contactform" action="contact-form-handler.php"  enctype="multipart/form-data"> 

<div class="col-md-6">
<p>
<span style="color:red;">*</span><label for='fname'class="form-label">First Name:</label><span id="fname_err"></span> <br>
<input type="text" pattern="[a-zA-Z ,.'-]{1,32}" name="fname" id="fname" class="form-control" placeholder="John" aria-label="First name" required  onBlur="fname_validation();">
</p>
</div>

<div class="col-md-6">
<p>
<span style="color:red;">*</span><label for='lname'class="form-label">Last Name:</label><span id="lname_err"></span> <br>
<input type="text" pattern="[a-zA-Z ,.'-]{1,32}" name="lname"id="lname" class="form-control" placeholder="McDonnel" aria-label="Last name" required onBlur="lname_validation();">
</p>
</div>

<div class="col-md-6">
<p>
<span style="color:red;">*</span><label for='email'class="form-label">Email Address:</label><span id="email_err"></span><br>
<input type="text"pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" name="email" id="email" placeholder="john123@gmail.com"  class="form-control" required onBlur="email_validation();"> 
</p>
</div>

<div class="col-md-6">
<p>
<span style="color:red;">*</span><label for="phone"class="form-label">Phone:</label><span id="phone_err"></span>
<input type="tel" name="phone" id="phone" placeholder="1234567890" class="form-control" pattern="[0-9]{10}" required onBlur="phone_validation();"><br>
</p>
</div>

<div class="col-12">
<label for="address" class="form-label">Address:</label>
<input type="text" class="form-control" name="address" placeholder="Apartment, studio, or floor">
</div>

<div class="col-md-6">
<p>
<span style="color:red;">*</span><label for="birthdate" class="form-label">Birthdate:</label><span id="birthdate_err"></span><br>
<input type="date" class="form-control" name="birthdate"  id="birthdate" required onBlur="birthdate_validation();"><br>
</p>
</div>

<div class="col-md-6">
<p>
<span style="color:red;">*</span><label for="resume" class="form-label">Upload Resume:</label><span id="resume_err"></span><br>
<input type="file" class="form-control" name="resume" id="resume" accept=".doc,.docx,.xml,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.documen,.pdf" onBlur="resume_validation();">	
</p>
</div>

<div class="col-md-6">
<p>
<span style="color:red;">*</span><label for="admissions" class="form-label">Admissions:</label><span id="admissions_err"></span><br>
<select name="admissions" id="admissions"class="form-select" aria-label="Default select example" required onBlur="admissions_validation();">
<option value="">Choose an Option</option>
<option value="Undergraduate Programs">Undergraduate Admissions</option>
<option value="Graduate Programs">Graduate Admissions</option>
<option value="Transfer Students">Transfer Admissions</option>
<option value="International Students">International Admissions</option>
</select>
</p>
</div>

<div class="col-md-6">
<!-- <fieldset class="col mb-6"> -->
<span style="color:red;">*</span><label for="gender" >Gender:</label><br>
<div class="input-group">
<div class="input-group-text">
<input type="radio"  class="form-check-input mt-0" name="gender" id="gender" value="male" aria-label="Radio button for following text input" required>
</div>
<label for="male"  class="form-control" aria-label="Text input with radio button">Male</label>
</div>

<div class="input-group" >
<div  class="input-group-text">
<input type="radio"  class="form-check-input mt-0" name="gender" id="gender" value="female" aria-label="Radio button for following text input"required>
</div>
<label for="female"  class="form-control" aria-label="Text input with radio button"">Female</label><br>
</div>
</div>


<div class="col-md-6">
    <label for="tuition_budget" class="form-label">Tuition Budget:</label><br>
    <input type="range" id="tuition_budget" class="form-range" name="tuition_budget" min="0" max="10000" step="1000" value="5000">
</div>
    <div class="col-md-6" style=" margin-top:50px">
    <span class="border" style="padding: 5px 90% 5px 5px; " id="tuition_budget_value">$5000</span>
</div>
  
 

<script>
  const tuitionBudgetRange = document.querySelector('#tuition_budget');
  const tuitionBudgetValue = document.querySelector('#tuition_budget_value');
  tuitionBudgetRange.addEventListener('input', () => {
    tuitionBudgetValue.innerText = `$${tuitionBudgetRange.value}`;
  });
</script>


<div class="col-12">
<p>	
<label for='message'>Message:</label><br>
<textarea placeholder="Type your message..." class="form-control"  aria-label="Message" name="message"></textarea><br>
</p>
</div>

<div class="input-group mb-2">
<div class="input-group-text">
<input class="form-check-input mt-0" type="checkbox" aria-label="Checkbox for following text input" id="updates" name="updates" value="yes">
</div>
<label for="updates" class="form-control" aria-label="Text input with checkbox">Receive updates</label>
<!-- <input type="text" class="form-control" aria-label="Text input with checkbox"> -->
</div>

<div class="col-12">
<input type="submit" value="Submit" class="btn btn-primary"><br>
</div>

</form>
</main><!-- /.container -->
<script src="validation.js"></script>
<?php include 'includes/footer.php';?>
<!-- q  aszx -->