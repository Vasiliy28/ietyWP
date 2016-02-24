<?php
/**
 * Created by PhpStorm.
 * User: vasy
 * Date: 02.02.16
 * Time: 12:19
 */
if(! function_exists('welcome_post_type')):

    function welcome_post_type(){
        $singular = 'Welcome';
        $pulural = 'Welcomes';
        $slug = str_replace( ' ', '_', strtolower( $singular ) );

        $labels = array(
            'name'                  => $pulural,
            'singular_name'         => $singular,
            'add_new'               => 'Add New',
            'add_new_item'          => 'Add New ' . $singular,
            'edit'                  => 'Edit',
            'edit_item'             => 'Edit ' . $singular,
            'new_item'              => 'New ' . $singular,
            'view'                  => 'View ' . $singular,
            'view_item'             => 'View ' . $singular,
            'search_term'           => 'Search ' . $pulural,
            'parent'                => 'Parent ' . $singular,
            'not_found'             => 'No ' . $pulural . ' found',
            'not_found_in_trash'    => 'No ' . $pulural . ' in Trash'
        );

        $args = array(
            'labels' =>  $labels,
            'public'              => true,
            'publicly_queryable'  => true,
            'exclude_from_search' => false,
            'show_in_nav_menus'   => true,
            'show_ui'             => true,
            'show_in_menu'        => true,
            'show_in_admin_bar'   => true,
            'menu_position'       => 27,
            'menu_icon'           => 'dashicons-welcome-view-site',
            'can_export'          => true,
            'delete_with_user'    => false,
            'hierarchical'        => true,
            'has_archive'         => true,
            'query_var'           => true,
            'capability_type'     => 'post',
            'map_meta_cap'        => true,


            // 'capabilities' => array(),
            'rewrite'             => array(
                'slug' => $slug,
                'with_front' => true,
                'pages' => true,
                'feeds' => true,
            ),
            'supports'            => array(
                'title',
                'page-attributes'
            ),
            'taxonomies'          => array(
                'category'
            ),

        );
        register_post_type('welcome', $args);
    };

endif;

add_action('init', 'welcome_post_type');


    add_action('admin_menu', 'register_my_custom_submenu_page');

/*
 * Функция, добавляющая страницу в пункт меню Настройки
 */
function true_options() {
    global $true_page;
    add_submenu_page( 'edit.php?post_type=welcome','Параметры', 'Параметры', 'manage_options', $true_page, 'true_option_page');
}
add_action('admin_menu', 'true_options');

/**
 * Возвратная функция (Callback)
 */
function true_option_page(){
    global $true_page;
    ?><div class="wrap">
    <h2>Дополнительные параметры сайта</h2>
    <form method="post" enctype="multipart/form-data" action="options.php">
        <?php
        settings_fields('true_options'); // меняем под себя только здесь (название настроек)
        do_settings_sections($true_page);
        ?>
        <p class="submit">
            <input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />
        </p>
    </form>
    </div><?php
}

/*
 * Регистрируем настройки
 * Мои настройки будут храниться в базе под названием true_options (это также видно в предыдущей функции)
 */
function true_option_settings() {
    global $true_page;
    // Присваиваем функцию валидации ( true_validate_settings() ). Вы найдете её ниже
    register_setting( 'true_options', 'true_options', 'true_validate_settings' ); // true_options

    // Добавляем секцию
    add_settings_section( 'true_section_1', 'Текстовые поля ввода', '', $true_page );

    // Создадим текстовое поле в первой секции
    $true_field_params = array(
        'type'      => 'text', // тип
        'id'        => 'my_text',
        'desc'      => 'Пример обычного текстового поля.', // описание
        'label_for' => 'my_text' // позволяет сделать название настройки лейблом (если не понимаете, что это, можете не использовать), по идее должно быть одинаковым с параметром id
    );
    add_settings_field( 'my_text_field', 'Текстовое поле', 'true_option_display_settings', $true_page, 'true_section_1', $true_field_params );

    // Создадим textarea в первой секции
    $true_field_params = array(
        'type'      => 'textarea',
        'id'        => 'my_textarea',
        'desc'      => 'Пример большого текстового поля.'
    );
    add_settings_field( 'my_textarea_field', 'Большое текстовое поле', 'true_option_display_settings', $true_page, 'true_section_1', $true_field_params );

    // Добавляем вторую секцию настроек

    add_settings_section( 'true_section_2', 'Другие поля ввода', '', $true_page );

    // Создадим чекбокс
    $true_field_params = array(
        'type'      => 'checkbox',
        'id'        => 'my_checkbox',
        'desc'      => 'Пример чекбокса.'
    );
    add_settings_field( 'my_checkbox_field', 'Чекбокс', 'true_option_display_settings', $true_page, 'true_section_2', $true_field_params );

    // Создадим выпадающий список
    $true_field_params = array(
        'type'      => 'select',
        'id'        => 'my_select',
        'desc'      => 'Пример выпадающего списка.',
        'vals'		=> array( 'val1' => 'Значение 1', 'val2' => 'Значение 2', 'val3' => 'Значение 3')
    );
    add_settings_field( 'my_select_field', 'Выпадающий список', 'true_option_display_settings', $true_page, 'true_section_2', $true_field_params );

    // Создадим радио-кнопку
    $true_field_params = array(
        'type'      => 'radio',
        'id'      => 'my_radio',
        'vals'		=> array( 'val1' => 'Значение 1', 'val2' => 'Значение 2', 'val3' => 'Значение 3')
    );
    add_settings_field( 'my_radio', 'Радио кнопки', 'true_option_display_settings', $true_page, 'true_section_2', $true_field_params );

}
add_action( 'admin_init', 'true_option_settings' );

/*
 * Функция отображения полей ввода
 * Здесь задаётся HTML и PHP, выводящий поля
 */
function true_option_display_settings($args) {
    extract( $args );

    $option_name = 'true_options';

    $o = get_option( $option_name );

    switch ( $type ) {
        case 'text':
            $o[$id] = esc_attr( stripslashes($o[$id]) );
            echo "<input class='regular-text' type='text' id='$id' name='" . $option_name . "[$id]' value='$o[$id]' />";
            echo ($desc != '') ? "<br /><span class='description'>$desc</span>" : "";
            break;
        case 'textarea':
            $o[$id] = esc_attr( stripslashes($o[$id]) );
            echo "<textarea class='code large-text' cols='50' rows='10' type='text' id='$id' name='" . $option_name . "[$id]'>$o[$id]</textarea>";
            echo ($desc != '') ? "<br /><span class='description'>$desc</span>" : "";
            break;
        case 'checkbox':
            $checked = ($o[$id] == 'on') ? " checked='checked'" :  '';
            echo "<label><input type='checkbox' id='$id' name='" . $option_name . "[$id]' $checked /> ";
            echo ($desc != '') ? $desc : "";
            echo "</label>";
            break;
        case 'select':
            echo "<select id='$id' name='" . $option_name . "[$id]'>";
            foreach($vals as $v=>$l){
                $selected = ($o[$id] == $v) ? "selected='selected'" : '';
                echo "<option value='$v' $selected>$l</option>";
            }
            echo ($desc != '') ? $desc : "";
            echo "</select>";
            break;
        case 'radio':
            echo "<fieldset>";
            foreach($vals as $v=>$l){
                $checked = ($o[$id] == $v) ? "checked='checked'" : '';
                echo "<label><input type='radio' name='" . $option_name . "[$id]' value='$v' $checked />$l</label><br />";
            }
            echo "</fieldset>";
            break;
    }
}

/*
 * Функция проверки правильности вводимых полей
 */
function true_validate_settings($input) {
    foreach($input as $k => $v) {
        $valid_input[$k] = trim($v);

        /* Вы можете включить в эту функцию различные проверки значений, например
        if(! задаем условие ) { // если не выполняется
            $valid_input[$k] = ''; // тогда присваиваем значению пустую строку
        }
        */
    }
    return $valid_input;
}






