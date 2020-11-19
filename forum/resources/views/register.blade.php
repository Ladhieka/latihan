<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Ladhieka</title>
</head>
<body>
    <h1>Buat Account Baru!</h1>

<h3>Sign Up Form</h3>

<form action="/welcome" method="POST">
    @csrf
    <label for="fName">First name:</label> <br><br>
    <input type="text" name="fName" id="fName" value=""><br><br>
    
    <label for="lName">Last name:</label> <br><br>
    <input type="text" name="lName" id="lName" value=""><br><br>
    
    <label for="gender">Gender:</label><br><br>
    <input type="radio" name="gender" id="male">
    <label for="male">Male</label><br>
    <input type="radio" name="gender" id="female" value="female">
    <label for="female">Female</label><br>
    <input type="radio" name="gender" id="other" value="other">
    <label for="other">Other</label><br><br>

    <label for="nation">Nationality:</label><br><br>
    <select name="nation" id="nation">
        <option value="Indonesian">Indonesian</option>
        <option value="Malaysian">Malaysian</option>
        <option value="Korean">Korean</option>
        <option value="Japanese">Japanese</option>
    </select><br><br>

    <label for="language">Language Spoken:</label><br><br>
    <input type="checkbox" id="language1" name="language1" value="Bike">
    <label for="vehicle1"> Bahasa Indonesia</label><br>
    <input type="checkbox" id="language2" name="language2" value="Car">
    <label for="vehicle2"> English</label><br>
    <input type="checkbox" id="language3" name="language3" value="Boat">
    <label for="vehicle3"> Other</label><br><br>

    <label for="bio">Bio:</label><br><br>
    <textarea name="bio" id="bio" cols="30" rows="10"></textarea>
    <br>
    <input type="submit" value="Sign Up" >
    
  </form>
</body>
</html>