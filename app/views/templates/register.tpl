{extends file="main.tpl"}
{block name="content"}
    <form action="{$action}" method="post">
        <div class="input">
            <label for="name">Name</label>
            <input type="text" id="name" name="name" value="{$form->name}" />
        </div>

        <div class="input">
            <label for="surname">Surname</label>
            <input type="text" id="surname" name="surname" value="{$form->surname}" />
        </div>

        <div class="input">
            <label for="city">City</label>
            <input type="text" id="city" name="city" value="{$form->city}" />
        </div>

        <div class="input">
            <label for="username">Username</label>
            <input type="text" id="username" name="username" value="{$form->username}" />
        </div>

        <div class="input">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" value="{$form->password}" />
        </div>

        <div class="input">
            <label for="repeat_password">Repeat Password</label>
            <input type="password" id="repeat_password" name="repeat_password" value="{$form->repeat_password}" />
        </div>

        <div class="input">
            <input type="submit" value="{$button_title}" />
        </div>
    </form>
{/block}