<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="public/styles/style.css">
</head>
<body>
<div class="wrapper fadeInDown">
  <div id="formContent">
    <!-- Tabs Titles -->
    <h2 class="active"> Login </h2>
   
    <!-- Icon -->
    <div class="fadeIn first">
      <img src="public/styles/AGV.png" id="icon" alt="User Icon" />
    </div>

    <!-- Login Form -->
    <form id="login"  method="POST" class="wrapper">
      <input type="text" id="user" class="fadeIn second" name="user" placeholder="Identificacion" required>
      <input type="password"  name="password" maxlength="4"  id="password" pattern="\d{4}" required/ placeholder="Contraseña">
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
      <input type="submit" class="fadeIn fourth" id="enviar" value="Ingresar">
      @if(session('error'))
      <label>{{session('error')}}</label>
      @endif
    </form>


  </div>
</div>

</body>
</html>
