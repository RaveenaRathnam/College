<?php include 'includes/header.php';?>

<main class="container">
  <div class="starter-template text-center">
  <h1>Contact us</h1>
    <p class="lead">Use this document as a way to quickly start any new project.<br> All you get is this text and a mostly barebones HTML document.</p>
  </div>
  
<form method="POST" name="contactform" action="contact-form-handler.php"> 
<p>
<label for='fname'>First Name:</label> <br>
<input type="text" name="fname"  required>
</p>
<p>
<label for='lname'>Last Name:</label> <br>
<input type="text" name="lname"  required>
</p>
<p>
<label for='email'>Email Address:</label> <br>
<input type="text" name="email"  required> <br>
</p>
<p>
<label for="phone">Phone:</label><br>
<input type="tel" name="phone" pattern="[0-9]{10}" required><br>
</p>
<p>
<label for="birthdate">Birthdate:</label><br>
<input type="date" id="birthdate" name="birthdate"><br>
</p>
<p>
<label for="resume">Upload Resume:</label>
<input type="file" id="resume" name="resume">	
</p>
<p>
<label for="admissions">Admissions:</label><br>
<select name="admissions" required>
<option value="">Choose an Option</option>
<option value="Undergraduate Programs">Undergraduate Admissions</option>
<option value="Graduate Programs">Graduate Admissions</option>
<option value="Transfer Students">Transfer Admissions</option>
<option value="International Students">International Admissions</option>
</select><br>
</p>
<p>
<p>
<label for="gender">Gender:</label><br>
<input type="radio" name="gender" value="male" required>
<label for="male">Male</label>
<input type="radio" name="gender" value="female" required>
<label for="female">Female</label><br>
</p>
<p>
<label for="tuition_budget">Tuition Budget:</label><br>
<input type="range" id="tuition_budget" name="tuition_budget" min="0" max="10000" step="1000" value="5000"><br>
</p>
</p>
<p>	
<label for='message'>Message:</label><br>
<textarea name="message"></textarea><br>
</p>
<p>
<label for="updates">Receive updates:</label>
<input type="checkbox" id="updates" name="updates" value="yes"><br>
</p>
<input type="submit" value="Submit"><br>
</form>

</main><!-- /.container -->
<?php include 'includes/footer.php';?>