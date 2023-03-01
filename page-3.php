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
  
<form class="row g-3" method="POST" name="contactform" action="contact-form-handler.php"> 

<div class="col-md-6">
<p>
<label for='fname'class="form-label">First Name:</label> <br>
<input type="text" class="form-control" placeholder="John" aria-label="First name" required>
</p>
</div>

<div class="col-md-6">
<p>
<label for='lname'class="form-label">Last Name:</label> <br>
<input type="text" class="form-control" placeholder="McDonnel" aria-label="Last name" required>
</p>
</div>

<div class="col-md-6">
<p>
<label for='email'class="form-label">Email Address:</label>
<input type="text" name="email" placeholder="john123@gmail.com"  class="form-control" required> <br>
</p>
</div>

<div class="col-md-6">
<p>
<label for="phone"class="form-label">Phone:</label><br>
<input type="tel" name="phone" placeholder="1234567890" class="form-control" pattern="[0-9]{10}" required><br>
</p>
</div>

<div class="col-12">
<label for="inputAddress2" class="form-label">Address:</label>
<input type="text" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor">
</div>

<div class="col-md-6">
<p>
<label for="birthdate" class="form-label">Birthdate:</label><br>
<input type="date"  class="form-control"id="birthdate" name="birthdate"><br>
</p>
</div>

<div class="col-md-6">
<p>
<label for="resume" class="form-label">Upload Resume:</label>
<input type="file" class="form-control" id="resume" name="resume">	
</p>
</div>

<div class="col-md-6">
<p>
<label for="admissions" class="form-label">Admissions:</label><br>
<select name="admissions" class="form-select" aria-label="Default select example" required>
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
<label for="gender" >Gender:</label><br>
<div class="input-group">
<div class="input-group-text">
<input type="radio"  class="form-check-input mt-0" name="gender" value="male" aria-label="Radio button for following text input" required>
</div>
<label for="male"  class="form-control" aria-label="Text input with radio button">Male</label>
</div>

<div class="input-group" >
<div  class="input-group-text">
<input type="radio"  class="form-check-input mt-0" name="gender" value="female" aria-label="Radio button for following text input"required>
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
<?php include 'includes/footer.php';?>
<!-- q  aszx -->