<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>login</title>
    <link rel="stylesheet" href="loginStyle.css" />
  </head>
  <body>
    <div class="back">
        <a href="index.html">Home</a>
      </div>
    <div class="container">
      <form class="loginForm" action="loginsearch.php" method="POST">
        <h2>Login</h2>
        <label>User Name:</label><br />
        <input
          type="text"
          id="userName"
          name="userName"
          required="required"
        /><br /><br />

        <label>Password:</label><br />
        <input
          type="password"
          id="password"
          name="password"
          required="required"
        /><br /><br />

        <button type="submit">Login</button>

        <div class="switch">
          <p>Don't you have an account?</p>
          <a href="signUp.php">Sign Up</a>
        </div>
      </form>
     
    </div>
    
  </body>
</html>
