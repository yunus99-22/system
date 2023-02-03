<!DOCTYPE html>
<html>
<style>
input[type=text], select {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

input[type=submit] {
  width: 100%;
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #45a049;
}

div {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}
</style>
<body>

<h3>Using CSS to style an HTML Form</h3>

<div>
  <form action="/action_page.php">
    <label for="fname">maternity Name</label>
    <input type="text" id="Mname" name="Mname" placeholder="Your name..">

    <label for="lname">maternity_Age</label>
    <input type="text" id="M_Age" name="M_Age" placeholder="Your last name..">

    <label for="fname">maternity_Address</label>
    <input type="text" id="M_Address" name="M_Address" placeholder="Your name..">

    <label for="fname">Phone_no.</label>
    <input type="text" id="Phone_no" name="Phone_no" placeholder="Your name..">

    <label for="fname">Maretal_Stutus</label>
    <input type="text" id="M_Stutus" name="M_Stutus" placeholder="..">``
    <label for="fname">Doctor_ID</label>
    <input type="text" id="D_ID" name="D_ID" placeholder="Doctor_ID..">

  
    <input type="submit" value="Submit">
  </form>
</div>

</body>
</html>


