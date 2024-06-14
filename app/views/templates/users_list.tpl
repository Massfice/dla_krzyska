{extends file="main.tpl"}
{block name="content"}
    {foreach from=$users item=user}
        <div class="user">
            <div>{$user['name']} {$user['surname']}</div>
            <div>
                <a href="edit_user_view/{$user['iduser']}">Edit</a>
                <a href="delete_user/{$user['iduser']}">Delete</a>
            </div>
        </div>
    {/foreach}
{/block}