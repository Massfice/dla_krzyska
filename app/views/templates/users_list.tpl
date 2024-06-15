{extends file="main.tpl"}
{block name="content"}
    <div>
        <a href="add_user_view">Add User</a>
    </div>
    {foreach from=$users item=user}
        <div class="list">
            <div>{$user['login']}</div>
            <div>{$user['name']} {$user['surname']}</div>
            <div>
                <a href="edit_user_view/{$user['iduser']}">Edit</a>
                <a href="delete_user/{$user['iduser']}">Delete</a>
            </div>
        </div>
    {/foreach}
{/block}