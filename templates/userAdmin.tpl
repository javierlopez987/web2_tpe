{include file="header_adm.tpl"}
<form action="user/admin/set" method="post">
<table>
    <thead>
        <tr>
            <th>Usuario</th>
            <th>Es admin?</th>
        </tr>
    </thead>
        <tbody>
        {foreach from=$users item=user}
            <tr>
                <td>{$user->user}</td>
                <td>
                    {html_options name=$user->id options=$administrador
                    selected=$user->administrador}
                </td>
                <td><a href="user/admin/delete/{$user->id}">Delete User</a></td>
            </tr>
        {/foreach}
        </tbody>
    </table>
    <input type="submit" value="Confirmar & Reset">
</form>
{include file="footer.tpl"}