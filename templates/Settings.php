<div class="wrap">
    <h1>Settings</h1>
    <?php settings_errors(); ?>

    <form method="POST" action="options.php">
    <?php
        settings_fields('cssux_options_group');
        do_settings_sections('cssux_settings');
        submit_button();

    ?>

    </form>
</div>