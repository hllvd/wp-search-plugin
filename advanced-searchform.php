<form method="get" id="advanced-searchform" role="search" action="<?php echo esc_url( home_url( '/' ) ); ?>">
sdfdsfsdf sdfs dfs dsf sdf
    <h3><?php _e( 'Advanced Search', 'textdomain' ); ?></h3>

    <!-- PASSING THIS TO TRIGGER THE ADVANCED SEARCH RESULT PAGE FROM functions.php -->
    <input type="hidden" name="search" value="advanced">

    <label for="name" class=""><?php _e( 'Name: ', 'textdomain' ); ?></label><br>
    <input type="text" value="" placeholder="<?php _e( 'Type the Car Name', 'textdomain' ); ?>" name="name" id="name" />

    <label for="model" class=""><?php _e( 'Select a Model: ', 'textdomain' ); ?></label><br>
    <select name="model" id="model">
        <option value=""><?php _e( 'Select one...', 'textdomain' ); ?></option>
        <option value="model1"><?php _e( 'Model 1', 'textdomain' ); ?></option>
        <option value="model2"><?php _e( 'Model 1', 'textdomain' ); ?></option>
    </select>

    <input type="submit" id="searchsubmit" value="Search" />

</form>
