<?php namespace ProcessWire; ?>
<div layout="row" layout-align="center center">
    <form layout="column" layout-align="center start" method="POST" class="card primary" action="<?=$content->action->httpUrl?>">
        <label for="name">
            Name
            <input type="text" name="name" size="12" placeholder="First Name" required autocomplete>
        </label>
        <label for="email">
            Email
            <input type="email" name="email" size="25" placeholder="Email" required autocomplete>
        </label>
        <input type="submit" class="button primary outline" value="<?=$content->submit?>">
        <input type="hidden" name="groupid" value="<?=$content->groupid?>">
        <input type="hidden" name="action" value="subscribe">
    </form>
</div>
