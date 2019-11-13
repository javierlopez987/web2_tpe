{include file="header.tpl"}

<form action="User/Login" method="POST">
  <div>
      <label>Email</label>
      <input type="email" name="user" placeholder="ejemplo@servidor">
  </div>
  <div>
      <label>Password</label>
      <input type="password" name="opass" placeholder="Password">
  <div>
      <button type="submit">Login</button>
  </div>
</form>

{include file="footer.tpl"}