<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>doucment </title>
     @vite(['resources/css/app.css', 'resources/js/app.tsx'])
</head>
<body>
  <h1>Submit Form</h1>
  
  <form method="POST" action="/submit">
    <label for="name">Enter Name:</label>
    <input type="text" id="name" name="name" required />
    <br><label for="description">Description:</label>
    <textarea id="description" name="description" rows="6" required></textarea>
    <br><button type="submit">Submit</button>
  </form>
</body>
</html>
