{include file="header.tpl"}

<form action="user/register" method="POST">
  <div>
      <label>Email</label>
      <input type="email" name="user" placeholder="ejemplo@servidor">
  </div>
  <div>
      <label>Password</label>
      <input type="password" name="opass" placeholder="Password">
  </div>
  <div>
      <label>Rescribir Password</label>
      <input type="password" name="rpass" placeholder="Rescribir Password">
  </div>
  <div>
    <button type="submit">Registrarse</button>
  </div>
</form>

{include file="footer.tpl"}