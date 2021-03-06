<?php

/**
 * Customizer Hamza Lite
 * 
 * @package Hamza Lite
 */
function hamza_lite_customizer($hamza_lite_customize) {

    /* Option list of all post */
    $hamza_lite_options_posts = array();
    $hamza_lite_options_posts_obj = get_posts('posts_per_page=-1&post_type=dang-tin');
    $hamza_lite_options_posts[''] = __('Choose Post', 'hamza-lite');
    foreach ($hamza_lite_options_posts_obj as $hamza_lite_posts) {
        $hamza_lite_options_posts[$hamza_lite_posts->ID] = $hamza_lite_posts->post_title;
    }

    /* Option list of all categories */
    $hamza_lite_args = array(
        'type' => 'post',
        'orderby' => 'name',
        'order' => 'ASC',
        'hide_empty' => 1,
        'hierarchical' => 1,
        'taxonomy' => 'category'
    );
    $hamza_lite_option_categories = array();
    $hamza_lite_category_lists = get_categories($hamza_lite_args);
    $hamza_lite_option_categories[''] = __('Choose Category', 'hamza-lite');
    foreach ($hamza_lite_category_lists as $hamza_lite_category) {
        $hamza_lite_option_categories[$hamza_lite_category->term_id] = $hamza_lite_category->name;
    }

    /* google fonts list */
    $hamza_lite_items = array('ABeeZee', 'Abel', 'Abril Fatface', 'Aclonica', 'Acme', 'Actor', 'Adamina', 'Advent Pro', 'Aguafina Script', 'Akronim', 'Aladin', 'Aldrich', 'Alef', 'Alegreya', 'Alegreya SC', 'Alegreya Sans', 'Alegreya Sans SC', 'Alex Brush', 'Alfa Slab One', 'Alice', 'Alike', 'Alike Angular', 'Allan', 'Allerta', 'Allerta Stencil', 'Allura', 'Almendra', 'Almendra Display', 'Almendra SC', 'Amarante', 'Amaranth', 'Amatic SC', 'Amethysta', 'Anaheim', 'Andada', 'Andika', 'Angkor', 'Annie Use Your Telescope', 'Anonymous Pro', 'Antic', 'Antic Didone', 'Antic Slab', 'Anton', 'Arapey', 'Arbutus', 'Arbutus Slab', 'Architects Daughter', 'Archivo Black', 'Archivo Narrow', 'Arimo', 'Arizonia', 'Armata', 'Artifika', 'Arvo', 'Asap', 'Asset', 'Astloch', 'Asul', 'Atomic Age', 'Aubrey', 'Audiowide', 'Autour One', 'Average', 'Average Sans', 'Averia Gruesa Libre', 'Averia Libre', 'Averia Sans Libre', 'Averia Serif Libre', 'Bad Script', 'Balthazar', 'Bangers', 'Basic', 'Battambang', 'Baumans', 'Bayon', 'Belgrano', 'Belleza', 'BenchNine', 'Bentham', 'Berkshire Swash', 'Bevan', 'Bigelow Rules',
        'Bigshot One', 'Bilbo', 'Bilbo Swash Caps', 'Bitter', 'Black Ops One', 'Bokor', 'Bonbon', 'Boogaloo', 'Bowlby One', 'Bowlby One SC', 'Brawler', 'Bree Serif', 'Bubblegum Sans', 'Bubbler One', 'Buda', 'Buenard', 'Butcherman', 'Butterfly Kids', 'Cabin', 'Cabin Condensed', 'Cabin Sketch', 'Caesar Dressing', 'Cagliostro', 'Calligraffitti', 'Cambay', 'Cambo', 'Candal', 'Cantarell', 'Cantata One', 'Cantora One', 'Capriola', 'Cardo', 'Carme', 'Carrois Gothic', 'Carrois Gothic SC', 'Carter One', 'Caudex', 'Cedarville Cursive', 'Ceviche One', 'Changa One', 'Chango', 'Chau Philomene One', 'Chela One', 'Chelsea Market', 'Chenla', 'Cherry Cream Soda', 'Cherry Swash', 'Chewy', 'Chicle', 'Chivo', 'Cinzel', 'Cinzel Decorative', 'Clicker Script', 'Coda', 'Coda Caption', 'Codystar', 'Combo', 'Comfortaa', 'Coming Soon', 'Concert One', 'Condiment', 'Content', 'Contrail One', 'Convergence', 'Cookie', 'Copse', 'Corben', 'Courgette', 'Cousine', 'Coustard', 'Covered By Your Grace', 'Crafty Girls', 'Creepster', 'Crete Round', 'Crimson Text', 'Croissant One', 'Crushed', 'Cuprum', 'Cutive', 'Cutive Mono', 'Damion', 'Dancing Script', 'Dangrek', 'Dawning of a New Day', 'Days One', 'Dekko', 'Delius', 'Delius Swash Caps', 'Delius Unicase', 'Della Respira', 'Denk One', 'Devonshire', 'Dhurjati', 'Didact Gothic', 'Diplomata', 'Diplomata SC', 'Domine', 'Donegal One', 'Doppio One', 'Dorsa', 'Dosis', 'Dr Sugiyama', 'Droid Sans', 'Droid Sans Mono', 'Droid Serif', 'Duru Sans', 'Dynalight', 'EB Garamond', 'Eagle Lake', 'Eater', 'Economica', 'Ek Mukta', 'Electrolize', 'Elsie', 'Elsie Swash Caps', 'Emblema One', 'Emilys Candy', 'Engagement', 'Englebert', 'Enriqueta', 'Erica One', 'Esteban', 'Euphoria Script', 'Ewert', 'Exo', 'Exo 2', 'Expletus Sans', 'Fanwood Text', 'Fascinate', 'Fascinate Inline', 'Faster One', 'Fasthand', 'Fauna One', 'Federant', 'Federo', 'Felipa', 'Fenix', 'Finger Paint', 'Fira Mono', 'Fira Sans', 'Fjalla One', 'Fjord One', 'Flamenco', 'Flavors', 'Fondamento', 'Fontdiner Swanky', 'Forum', 'Francois One', 'Freckle Face', 'Fredericka the Great', 'Fredoka One', 'Freehand', 'Fresca', 'Frijole', 'Fruktur', 'Fugaz One', 'GFS Didot', 'GFS Neohellenic', 'Gabriela', 'Gafata', 'Galdeano', 'Galindo', 'Gentium Basic', 'Gentium Book Basic', 'Geo', 'Geostar', 'Geostar Fill', 'Germania One', 'Gidugu', 'Gilda Display', 'Give You Glory', 'Glass Antiqua', 'Glegoo', 'Gloria Hallelujah', 'Goblin One', 'Gochi Hand', 'Gorditas', 'Goudy Bookletter 1911', 'Graduate', 'Grand Hotel', 'Gravitas One', 'Great Vibes', 'Griffy', 'Gruppo', 'Gudea', 'Gurajada', 'Habibi', 'Halant', 'Hammersmith One', 'Hanalei', 'Hanalei Fill', 'Handlee', 'Hanuman', 'Happy Monkey', 'Headland One', 'Henny Penny', 'Herr Von Muellerhoff', 'Hind', 'Holtwood One SC', 'Homemade Apple', 'Homenaje', 'IM Fell DW Pica', 'IM Fell DW Pica SC', 'IM Fell Double Pica', 'IM Fell Double Pica SC', 'IM Fell English', 'IM Fell English SC', 'IM Fell French Canon', 'IM Fell French Canon SC', 'IM Fell Great Primer', 'IM Fell Great Primer SC', 'Iceberg', 'Iceland', 'Imprima', 'Inconsolata', 'Inder', 'Indie Flower', 'Inika', 'Irish Grover', 'Istok Web', 'Italiana', 'Italianno', 'Jacques Francois', 'Jacques Francois Shadow', 'Jim Nightshade', 'Jockey One', 'Jolly Lodger', 'Josefin Sans', 'Josefin Slab', 'Joti One', 'Judson', 'Julee', 'Julius Sans One', 'Junge', 'Jura', 'Just Another Hand', 'Just Me Again Down Here', 'Kalam', 'Kameron', 'Kantumruy', 'Karla', 'Karma', 'Kaushan Script', 'Kavoon', 'Kdam Thmor', 'Keania One', 'Kelly Slab', 'Kenia', 'Khand', 'Khmer', 'Khula', 'Kite One', 'Knewave', 'Kotta One', 'Koulen', 'Kranky', 'Kreon', 'Kristi', 'Krona One', 'La Belle Aurore', 'Laila', 'Lakki Reddy', 'Lancelot', 'Lato', 'League Script', 'Leckerli One', 'Ledger', 'Lekton', 'Lemon', 'Libre Baskerville', 'Life Savers', 'Lilita One', 'Lily Script One', 'Limelight', 'Linden Hill', 'Lobster', 'Lobster Two', 'Londrina Outline', 'Londrina Shadow', 'Londrina Sketch', 'Londrina Solid', 'Lora', 'Love Ya Like A Sister', 'Loved by the King', 'Lovers Quarrel', 'Luckiest Guy', 'Lusitana', 'Lustria', 'Macondo', 'Macondo Swash Caps', 'Magra', 'Maiden Orange', 'Mako', 'Mallanna', 'Mandali', 'Marcellus', 'Marcellus SC', 'Marck Script', 'Margarine', 'Marko One', 'Marmelad', 'Marvel', 'Mate', 'Mate SC', 'Maven Pro', 'McLaren', 'Meddon', 'MedievalSharp', 'Medula One', 'Megrim', 'Meie Script', 'Merienda', 'Merienda One', 'Merriweather', 'Merriweather Sans', 'Metal', 'Metal Mania', 'Metamorphous', 'Metrophobic', 'Michroma', 'Milonga', 'Miltonian', 'Miltonian Tattoo', 'Miniver', 'Miss Fajardose', 'Modern Antiqua', 'Molengo', 'Molle', 'Monda', 'Monofett', 'Monoton', 'Monsieur La Doulaise', 'Montaga', 'Montez', 'Montserrat', 'Montserrat Alternates',
        'Montserrat Subrayada', 'Moul', 'Moulpali', 'Mountains of Christmas', 'Mouse Memoirs', 'Mr Bedfort', 'Mr Dafoe', 'Mr De Haviland', 'Mrs Saint Delafield', 'Mrs Sheppards', 'Muli', 'Mystery Quest', 'NTR', 'Neucha', 'Neuton', 'New Rocker', 'News Cycle', 'Niconne', 'Nixie One', 'Nobile', 'Nokora', 'Norican', 'Nosifer',
        'Nothing You Could Do', 'Noticia Text', 'Noto Sans', 'Noto Serif', 'Nova Cut', 'Nova Flat', 'Nova Mono', 'Nova Oval', 'Nova Round', 'Nova Script', 'Nova Slim', 'Nova Square', 'Numans', 'Nunito', 'Odor Mean Chey', 'Offside', 'Old Standard TT', 'Oldenburg', 'Oleo Script', 'Oleo Script Swash Caps', 'Open Sans', 'Open Sans Condensed', 'Oranienbaum', 'Orbitron', 'Oregano', 'Orienta', 'Original Surfer', 'Oswald', 'Over the Rainbow', 'Overlock', 'Overlock SC', 'Ovo', 'Oxygen', 'Oxygen Mono', 'PT Mono', 'PT Sans', 'PT Sans Caption', 'PT Sans Narrow', 'PT Serif', 'PT Serif Caption', 'Pacifico', 'Paprika', 'Parisienne', 'Passero One', 'Passion One', 'Pathway Gothic One', 'Patrick Hand', 'Patrick Hand SC', 'Patua One', 'Paytone One', 'Peddana', 'Peralta', 'Permanent Marker', 'Petit Formal Script', 'Petrona', 'Philosopher', 'Piedra', 'Pinyon Script', 'Pirata One', 'Plaster', 'Play', 'Playball', 'Playfair Display', 'Playfair Display SC', 'Podkova', 'Poiret One', 'Poller One', 'Poly', 'Pompiere', 'Pontano Sans', 'Port Lligat Sans', 'Port Lligat Slab', 'Prata', 'Preahvihear', 'Press Start 2P', 'Princess Sofia', 'Prociono', 'Prosto One', 'Puritan', 'Purple Purse', 'Quando', 'Quantico', 'Quattrocento', 'Quattrocento Sans', 'Questrial', 'Quicksand', 'Quintessential', 'Qwigley', 'Racing Sans One', 'Radley', 'Rajdhani', 'Raleway', 'Raleway Dots', 'Ramabhadra', 'Ramaraja', 'Rambla', 'Rammetto One', 'Ranchers', 'Rancho', 'Ranga', 'Rationale', 'Ravi Prakash', 'Redressed', 'Reenie Beanie', 'Revalia', 'Ribeye', 'Ribeye Marrow', 'Righteous', 'Risque', 'Roboto', 'Roboto Condensed', 'Roboto Slab', 'Rochester', 'Rock Salt', 'Rokkitt', 'Romanesco', 'Ropa Sans', 'Rosario', 'Rosarivo', 'Rouge Script', 'Rozha One', 'Rubik Mono One', 'Rubik One', 'Ruda', 'Rufina', 'Ruge Boogie', 'Ruluko', 'Rum Raisin', 'Ruslan Display', 'Russo One', 'Ruthie', 'Rye', 'Sacramento', 'Sail', 'Salsa', 'Sanchez', 'Sancreek', 'Sansita One', 'Sarina', 'Sarpanch', 'Satisfy', 'Scada', 'Schoolbell', 'Seaweed Script', 'Sevillana', 'Seymour One', 'Shadows Into Light', 'Shadows Into Light Two', 'Shanti', 'Share', 'Share Tech', 'Share Tech Mono', 'Shojumaru', 'Short Stack', 'Siemreap', 'Sigmar One', 'Signika', 'Signika Negative', 'Simonetta', 'Sintony', 'Sirin Stencil', 'Six Caps', 'Skranji', 'Slabo 13px', 'Slabo 27px', 'Slackey', 'Smokum', 'Smythe', 'Sniglet', 'Snippet', 'Snowburst One', 'Sofadi One', 'Sofia', 'Sonsie One', 'Sorts Mill Goudy', 'Source Code Pro', 'Source Sans Pro', 'Source Serif Pro', 'Special Elite', 'Spicy Rice', 'Spinnaker', 'Spirax', 'Squada One', 'Sree Krushnadevaraya', 'Stalemate', 'Stalinist One', 'Stardos Stencil', 'Stint Ultra Condensed', 'Stint Ultra Expanded', 'Stoke', 'Strait', 'Sue Ellen Francisco', 'Sunshiney', 'Supermercado One', 'Suranna', 'Suravaram', 'Suwannaphum', 'Swanky and Moo Moo', 'Syncopate', 'Tangerine', 'Taprom', 'Tauri', 'Teko', 'Telex', 'Tenali Ramakrishna', 'Tenor Sans', 'Text Me One', 'The Girl Next Door', 'Tienne', 'Timmana', 'Tinos', 'Titan One', 'Titillium Web', 'Trade Winds', 'Trocchi', 'Trochut', 'Trykker', 'Tulpen One', 'Ubuntu', 'Ubuntu Condensed', 'Ubuntu Mono', 'Ultra', 'Uncia Antiqua', 'Underdog', 'Unica One', 'UnifrakturCook', 'UnifrakturMaguntia', 'Unkempt', 'Unlock', 'Unna', 'VT323', 'Vampiro One', 'Varela', 'Varela Round', 'Vast Shadow', 'Vesper Libre', 'Vibur', 'Vidaloka', 'Viga', 'Voces', 'Volkhov', 'Vollkorn', 'Voltaire', 'Waiting for the Sunrise', 'Wallpoet', 'Walter Turncoat', 'Warnes', 'Wellfleet', 'Wendy One', 'Wire One', 'Yanone Kaffeesatz', 'Yellowtail', 'Yeseva One', 'Yesteryear', 'Zeyada');
    $hamza_lite_google_fonts = array();
    foreach ($hamza_lite_items as $hamza_lite_item) {
        $hamza_lite_google_fonts[$hamza_lite_item] = $hamza_lite_item;
    }

    /* Text Transform */
    $hamza_lite_transform = array(
        'none' => __('Normal', 'hamza-lite'),
        'uppercase' => __('Uppercase', 'hamza-lite'),
        'lowercase' => __('Lowercase', 'hamza-lite'),
        'capitalize' => __('Capitalize', 'hamza-lite')
    );

    /* Default Settings */
    $hamza_lite_customize->add_panel(
            'wp_default_panel', array(
        'priority' => 10,
        'capability' => 'edit_theme_options',
        'theme_supports' => '',
        'title' => __('Default Settings', 'hamza-lite'),
        'description' => __('Default section provided by wordpress customizer.', 'hamza-lite'),
            )
    );


    $hamza_lite_customize->get_section('title_tagline')->panel = 'wp_default_panel';
    $hamza_lite_customize->get_section('colors')->panel = 'wp_default_panel';
    $hamza_lite_customize->get_section('header_image')->panel = 'wp_default_panel';
    $hamza_lite_customize->get_section('background_image')->panel = 'wp_default_panel';
    $hamza_lite_customize->get_section('static_front_page')->panel = 'wp_default_panel';

    /** Adding Basic Setting Panel in customizer */
    $hamza_lite_customize->add_panel(
            'hamza_lite_basic_setting', array(
        'priority' => 20,
        'capability' => 'edit_theme_options',
        'theme_supports' => '',
        'title' => __('Basic Settings', 'hamza-lite'),
            )
    );

    /** Responsive setting checkbox */
    $hamza_lite_customize->add_section(
            'hamza_lite_design_layout_section', array(
        'title' => __('Design Layout', 'hamza-lite'),
        'priority' => 10,
        'panel' => 'hamza_lite_basic_setting',
            )
    );

    $hamza_lite_customize->add_setting(
            'hamza_lite_webpage_layout_choose', array(
        'default' => 'fullwidth',
        'sanitize_callback' => 'hamza_lite_sanitize_select',
            )
    );

    $hamza_lite_customize->add_control(
            'hamza_lite_webpage_layout_choose', array(
        'label' => __('Choose Web Page Layout?', 'hamza-lite'),
        'section' => 'hamza_lite_design_layout_section',
        'type' => 'radio',
        'choices' => array(
            'fullwidth' => __('Fullwidth', 'hamza-lite'),
            'boxed' => __('Boxed', 'hamza-lite'),
        ),
            )
    );

    $hamza_lite_customize->add_setting(
            'hamza_lite_disable_responsive_design', array(
        'default' => '',
        'sanitize_callback' => 'hamza_lite_sanitize_checkbox',
            )
    );

    $hamza_lite_customize->add_control(
            'hamza_lite_disable_responsive_design', array(
        'description' => __('Disable Responsive Design?', 'hamza-lite'),
        'label' => __('Check To Disable', 'hamza-lite'),
        'section' => 'hamza_lite_design_layout_section',
        'type' => 'checkbox',
            )
    );

    /** Search in header section */
    $hamza_lite_customize->add_section(
            'hamza_lite_header_section', array(
        'title' => __('Header Settings', 'hamza-lite'),
        'priority' => 20,
        'panel' => 'hamza_lite_basic_setting',
            )
    );

    /** Header Image(Logo) alignment */
    $hamza_lite_customize->add_setting(
            'hamza_lite_logo_alignment', array(
        'default' => 'left',
        'sanitize_callback' => 'hamza_lite_sanitize_select',
            )
    );

    $hamza_lite_customize->add_control(
            'hamza_lite_logo_alignment', array(
        'label' => __('Header Logo Alignment', 'hamza-lite'),
        'section' => 'hamza_lite_header_section',
        'type' => 'select',
        'choices' => array(
            'left' => __('Left', 'hamza-lite'),
            'center' => __('Center', 'hamza-lite'),
        ),
            )
    );

    $hamza_lite_customize->add_setting(
            'hamza_lite_email', array(
        'default' => '',
        'sanitize_callback' => 'sanitize_email',
            )
    );

    $hamza_lite_customize->add_control(
            'hamza_lite_email', array(
        'label' => __('Email', 'hamza-lite'),
        'section' => 'hamza_lite_header_section',
        'type' => 'text'
            )
    );

    $hamza_lite_customize->add_setting(
            'hamza_lite_phone', array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field',
            )
    );

    $hamza_lite_customize->add_control(
            'hamza_lite_phone', array(
        'label' => __('Phone', 'hamza-lite'),
        'section' => 'hamza_lite_header_section',
        'type' => 'text'
            )
    );

    /** Search in header section */
    $hamza_lite_customize->add_section(
            'hamza_lite_header_section', array(
        'title' => __('Header Settings', 'hamza-lite'),
        'priority' => 20,
        'panel' => 'hamza_lite_basic_setting',
            )
    );

    /** Main Nav alignment */
    $hamza_lite_customize->add_setting(
            'hamza_lite_menu_alignment', array(
        'default' => 'left',
        'sanitize_callback' => 'hamza_lite_sanitize_select',
            )
    );

    $hamza_lite_customize->add_control(
            'hamza_lite_menu_alignment', array(
        'label' => __('Main Nav(Menu) Alignment', 'hamza-lite'),
        'description' => __('To align menu in center, Select logo alignment as center from above option.', 'hamza-lite'),
        'section' => 'hamza_lite_header_section',
        'type' => 'select',
        'choices' => array(
            'left' => __('Left', 'hamza-lite'),
            'right' => __('Right', 'hamza-lite'),
        ),
            )
    );

    $hamza_lite_customize->add_setting(
            'hamza_lite_search_box_header', array(
        'default' => 'true',
        'sanitize_callback' => 'hamza_lite_sanitize_select',
            )
    );

    $hamza_lite_customize->add_control(
            'hamza_lite_search_box_header', array(
        'label' => __('Show Search in Header?', 'hamza-lite'),
        'description' => __('Check to enable', 'hamza-lite'),
        'section' => 'hamza_lite_header_section',
        'type' => 'radio',
        'choices' => array(
            'true' => __('Enable', 'hamza-lite'),
            'false' => __('Disable', 'hamza-lite'),
        )
            )
    );

    /** Read More Text for Archive */
    $hamza_lite_customize->add_section(
            'hamza_lite_readmore', array(
        'title' => __('Read More Settings', 'hamza-lite'),
        'priority' => 30,
        'panel' => 'hamza_lite_basic_setting',
            )
    );

    $hamza_lite_customize->add_setting(
            'hamza_lite_readmore_text', array(
        'default' => __('Read More', 'hamza-lite'),
        'sanitize_callback' => 'hamza_lite_sanitize_text',
            )
    );

    $hamza_lite_customize->add_control(
            'hamza_lite_readmore_text', array(
        'section' => 'hamza_lite_readmore',
        'label' => __('Edit Read More Text', 'hamza-lite'),
        'description' => __('Read More text for Archive page', 'hamza-lite'),
        'type' => 'text',
            )
    );

    /** Footer text */
    $hamza_lite_customize->add_section(
            'hamza_lite_footer_section', array(
        'title' => __('Footer Settings', 'hamza-lite'),
        'description' => __('Edit Footer Copyright Text', 'hamza-lite'),
        'priority' => 40,
        'panel' => 'hamza_lite_basic_setting',
            )
    );

    $hamza_lite_customize->add_setting(
            'hamza_lite_footer_text', array(
        'default' => __('8Degree Themes', 'hamza-lite'),
        'sanitize_callback' => 'hamza_lite_sanitize_text',
            )
    );

    $hamza_lite_customize->add_control(
            'hamza_lite_footer_text', array(
        'section' => 'hamza_lite_footer_section',
        'type' => 'text',
            )
    );

    /** Exclude Categories */
    $hamza_lite_customize->add_section(
            'hamza_lite_exclude_categories_section', array(
        'title' => __('Exclude Category Settings', 'hamza-lite'),
        'priority' => 50,
        'panel' => 'hamza_lite_basic_setting',
            )
    );

    $hamza_lite_customize->add_setting(
            'hamza_lite_exclude_categories', array(
        'default' => '',
        'sanitize_callback' => 'hamza_lite_sanitize_text',
            )
    );

    $hamza_lite_customize->add_control(
            'hamza_lite_exclude_categories', array(
        'label' => __('Category IDs', 'hamza-lite'),
        'section' => 'hamza_lite_exclude_categories_section',
        'type' => 'text',
        'description' => __('Example: 203,204,205,206,207,208', 'hamza-lite')
            )
    );
    /** Basic Setting Panel Ends */
    /** Homepage Settings panel */
    $hamza_lite_customize->add_panel(
            'hamza_lite_homepage_settings', array(
        'priority' => 30,
        'capability' => 'edit_theme_options',
        'theme_supports' => '',
        'title' => __('Homepage Settings', 'hamza-lite'),
            )
    );

    /** Call To Action Post Section */
    $hamza_lite_customize->add_section(
            'hamza_lite_call_to_action_section', array(
        'title' => __('Call To Action Settings', 'hamza-lite'),
        'priority' => 15,
        'panel' => 'hamza_lite_homepage_settings'
            )
    );

    $hamza_lite_customize->add_setting(
            'hamza_lite_callto_post', array(
        'default' => '',
        'sanitize_callback' => 'hamza_lite_sanitize_dropdown',
            )
    );

    $hamza_lite_customize->add_control('hamza_lite_callto_post', array(
        'label' => __('Call To Action Post', 'hamza-lite'),
        'section' => 'hamza_lite_call_to_action_section',
        'type' => 'select',
        'choices' => $hamza_lite_options_posts
            )
    );

    /** Call To action    */
    $hamza_lite_customize->add_setting(
            'hamza_lite_call_to_action_char', array(
        'default' => '250',
        'sanitize_callback' => 'hamza_lite_sanitize_call_char',
            )
    );

    $hamza_lite_customize->add_control(
            'hamza_lite_call_to_action_char', array(
        'label' => __('Call To Action Post Excerpt Character', 'hamza-lite'),
        'section' => 'hamza_lite_call_to_action_section',
        'description' => __("Select the number of character for call to action post excerpt character", 'hamza-lite'),
        'type' => 'text',
            )
    );

    $hamza_lite_customize->add_setting(
            'hamza_lite_call_to_action_text', array(
        'default' => __('Read More', 'hamza-lite'),
        'sanitize_callback' => 'hamza_lite_sanitize_text',
            )
    );

    $hamza_lite_customize->add_control(
            'hamza_lite_call_to_action_text', array(
        'label' => __('Read More Text', 'hamza-lite'),
        'section' => 'hamza_lite_call_to_action_section',
        'description' => __("Leave blank if you don't want to show read more", 'hamza-lite'),
        'type' => 'text',
            )
    );

    $hamza_lite_customize->add_setting(
            'hamza_lite_cta_button', array(
        'default' => __('Buy Now', 'hamza-lite'),
        'sanitize_callback' => 'hamza_lite_sanitize_text',
            )
    );

    $hamza_lite_customize->add_control(
            'hamza_lite_cta_button', array(
        'label' => __('Buy Button', 'hamza-lite'),
        'description' => __("Leave blank if you don't want to show", 'hamza-lite'),
        'section' => 'hamza_lite_call_to_action_section',
        'type' => 'text',
            )
    );

    $hamza_lite_customize->add_setting(
            'hamza_lite_cta_button_link', array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw',
            )
    );

    $hamza_lite_customize->add_control(
            'hamza_lite_cta_button_link', array(
        'label' => __('Buy Button Link', 'hamza-lite'),
        'section' => 'hamza_lite_call_to_action_section',
        'description' => __("Leave blank if you don't want to show", 'hamza-lite'),
        'type' => 'text',
            )
    );

    /** Call to Action Post content */
    $hamza_lite_customize->add_setting(
            'hamza_lite_show_full_content', array(
        'default' => '',
        'sanitize_callback' => 'hamza_lite_sanitize_checkbox',
            )
    );

    $hamza_lite_customize->add_control(
            'hamza_lite_show_full_content', array(
        'label' => __('Check to show full content', 'hamza-lite'),
        'section' => 'hamza_lite_call_to_action_section',
        'type' => 'checkbox',
            )
    );

    /** Service Section */
    $hamza_lite_customize->add_section(
            'hamza_lite_service_section', array(
        'title' => __('Service Section', 'hamza-lite'),
        'priority' => 20,
        'panel' => 'hamza_lite_homepage_settings',
            )
    );

    $hamza_lite_customize->add_setting(
            'hamza_lite_service_title', array(
        'default' => '',
        'sanitize_callback' => 'hamza_lite_sanitize_text',
            )
    );

    $hamza_lite_customize->add_control(
            'hamza_lite_service_title', array(
        'label' => __('Service Section Title', 'hamza-lite'),
        'section' => 'hamza_lite_service_section',
        'type' => 'text',
            )
    );

    $hamza_lite_customize->add_setting(
            'hamza_lite_service_content', array(
        'default' => '',
        'sanitize_callback' => 'wp_kses_post',
            )
    );

    $hamza_lite_customize->add_control(
            'hamza_lite_service_content', array(
        'label' => __('Serivice Section Text', 'hamza-lite'),
        'section' => 'hamza_lite_service_section',
        'description' => __("Html content allowed", 'hamza-lite'),
        'type' => 'textarea',
            )
    );

    /** Service Post one */
    $hamza_lite_customize->add_setting(
            'hamza_lite_service_post_one', array(
        'default' => '',
        'sanitize_callback' => 'hamza_lite_sanitize_dropdown',
            )
    );

    $hamza_lite_customize->add_control('hamza_lite_service_post_one', array(
        'label' => __('Service Post 1', 'hamza-lite'),
        'section' => 'hamza_lite_service_section',
        'type' => 'select',
        'choices' => $hamza_lite_options_posts
            )
    );

    //icon
    $hamza_lite_customize->add_setting(
            'hamza_lite_service_post_one_icon', array(
        'default' => '',
        'sanitize_callback' => 'hamza_lite_sanitize_text',
            )
    );

    $hamza_lite_customize->add_control(
            'hamza_lite_service_post_one_icon', array(
        'section' => 'hamza_lite_service_section',
        'description' => __('Font Awesome icon name </br> Example: fa-bell', 'hamza-lite'),
        'type' => 'text',
            )
    );

    /** Service Post two */
    $hamza_lite_customize->add_setting(
            'hamza_lite_service_post_two', array(
        'default' => '',
        'sanitize_callback' => 'hamza_lite_sanitize_dropdown',
            )
    );

    $hamza_lite_customize->add_control('hamza_lite_service_post_two', array(
        'label' => __('Service Post 2', 'hamza-lite'),
        'section' => 'hamza_lite_service_section',
        'type' => 'select',
        'choices' => $hamza_lite_options_posts
            )
    );

    //icon
    $hamza_lite_customize->add_setting(
            'hamza_lite_service_post_two_icon', array(
        'default' => '',
        'sanitize_callback' => 'hamza_lite_sanitize_text',
            )
    );

    $hamza_lite_customize->add_control(
            'hamza_lite_service_post_two_icon', array(
        'section' => 'hamza_lite_service_section',
        'description' => __('Font Awesome icon name </br> Example: fa-bell', 'hamza-lite'),
        'type' => 'text',
            )
    );

    /** Service Post three */
    $hamza_lite_customize->add_setting(
            'hamza_lite_service_post_three', array(
        'default' => '',
        'sanitize_callback' => 'hamza_lite_sanitize_dropdown',
            )
    );

    $hamza_lite_customize->add_control('hamza_lite_service_post_three', array(
        'label' => __('Service Post 3', 'hamza-lite'),
        'section' => 'hamza_lite_service_section',
        'type' => 'select',
        'choices' => $hamza_lite_options_posts
            )
    );

    //icon
    $hamza_lite_customize->add_setting(
            'hamza_lite_service_post_three_icon', array(
        'default' => '',
        'sanitize_callback' => 'hamza_lite_sanitize_text',
            )
    );

    $hamza_lite_customize->add_control(
            'hamza_lite_service_post_three_icon', array(
        'section' => 'hamza_lite_service_section',
        'description' => __('Font Awesome icon name </br> Example: fa-bell', 'hamza-lite'),
        'type' => 'text',
            )
    );

    /** Featured Content Section */
    $hamza_lite_customize->add_section(
            'hamza_lite_featured_section', array(
        'title' => __('Featured Post Section', 'hamza-lite'),
        'priority' => 30,
        'panel' => 'hamza_lite_homepage_settings',
            )
    );

    $hamza_lite_customize->add_setting(
            'hamza_lite_featured_title', array(
        'default' => '',
        'sanitize_callback' => 'hamza_lite_sanitize_text',
            )
    );

    $hamza_lite_customize->add_control(
            'hamza_lite_featured_title', array(
        'label' => __('Featured Title', 'hamza-lite'),
        'section' => 'hamza_lite_featured_section',
        'type' => 'text',
            )
    );

    $hamza_lite_customize->add_setting(
            'hamza_lite_featured_content', array(
        'default' => '',
        'sanitize_callback' => 'wp_kses_post',
            )
    );

    $hamza_lite_customize->add_control(
            'hamza_lite_featured_content', array(
        'label' => __('Featured Text', 'hamza-lite'),
        'section' => 'hamza_lite_featured_section',
        'description' => __("Html content allowed", 'hamza-lite'),
        'type' => 'textarea',
            )
    );

    /** Feature Post Font Awesome icon */
    $hamza_lite_customize->add_setting(
            'hamza_lite_featured_post_icon', array(
        'default' => '',
        'sanitize_callback' => 'hamza_lite_sanitize_checkbox',
            )
    );

    $hamza_lite_customize->add_control(
            'hamza_lite_featured_post_icon', array(
        'label' => __('Check To Enable Font Awesome Icon', 'hamza-lite'),
        'section' => 'hamza_lite_featured_section',
        'description' => sprintf(__('(If enabled the featured image will be replaced by Font Awesome Icon. For lists of icons click <a href="%s" target="_blank">here</a>)', 'hamza-lite'), esc_url("http://fontawesome.io/icons/")
        ),
        'type' => 'checkbox',
            )
    );

    /** Featured Post Selection Section    */
    $hamza_lite_customize->add_setting(
            'hamza_lite_featured_post_one', array(
        'default' => '',
        'sanitize_callback' => 'hamza_lite_sanitize_dropdown',
            )
    );

    $hamza_lite_customize->add_control('hamza_lite_featured_post_one', array(
        'label' => __('Featured Post 1', 'hamza-lite'),
        'section' => 'hamza_lite_featured_section',
        'type' => 'select',
        'choices' => $hamza_lite_options_posts
            )
    );

    //icon
    $hamza_lite_customize->add_setting(
            'hamza_lite_featured_post_one_icon', array(
        'default' => '',
        'sanitize_callback' => 'hamza_lite_sanitize_text',
            )
    );

    $hamza_lite_customize->add_control(
            'hamza_lite_featured_post_one_icon', array(
        'section' => 'hamza_lite_featured_section',
        'description' => __('Font Awesome icon name </br> Example: fa-bell', 'hamza-lite'),
        'type' => 'text',
            )
    );

    $hamza_lite_customize->add_setting(
            'hamza_lite_featured_post_two', array(
        'default' => '',
        'sanitize_callback' => 'hamza_lite_sanitize_dropdown',
            )
    );

    $hamza_lite_customize->add_control('hamza_lite_featured_post_two', array(
        'label' => __('Feature Post 2', 'hamza-lite'),
        'section' => 'hamza_lite_featured_section',
        'type' => 'select',
        'choices' => $hamza_lite_options_posts
            )
    );

    //icon
    $hamza_lite_customize->add_setting(
            'hamza_lite_featured_post_two_icon', array(
        'default' => '',
        'sanitize_callback' => 'hamza_lite_sanitize_text',
            )
    );

    $hamza_lite_customize->add_control(
            'hamza_lite_featured_post_two_icon', array(
        'section' => 'hamza_lite_featured_section',
        'description' => __('Font Awesome icon name </br> Example: fa-bell', 'hamza-lite'),
        'type' => 'text',
            )
    );

    $hamza_lite_customize->add_setting(
            'hamza_lite_featured_post_three', array(
        'default' => '',
        'sanitize_callback' => 'hamza_lite_sanitize_dropdown',
            )
    );

    $hamza_lite_customize->add_control('hamza_lite_featured_post_three', array(
        'label' => __('Feature Post 3', 'hamza-lite'),
        'section' => 'hamza_lite_featured_section',
        'type' => 'select',
        'choices' => $hamza_lite_options_posts
            )
    );

    //icon
    $hamza_lite_customize->add_setting(
            'hamza_lite_feature_post_three_icon', array(
        'default' => '',
        'sanitize_callback' => 'hamza_lite_sanitize_text',
            )
    );

    $hamza_lite_customize->add_control(
            'hamza_lite_feature_post_three_icon', array(
        'section' => 'hamza_lite_featured_section',
        'description' => __('Font Awesome icon name </br> Example: fa-bell', 'hamza-lite'),
        'type' => 'text',
            )
    );


    $hamza_lite_customize->add_setting(
            'hamza_lite_featured_post_four', array(
        'default' => '',
        'sanitize_callback' => 'hamza_lite_sanitize_dropdown',
            )
    );

    $hamza_lite_customize->add_control('hamza_lite_featured_post_four', array(
        'label' => __('Feature Post 4', 'hamza-lite'),
        'section' => 'hamza_lite_featured_section',
        'type' => 'select',
        'choices' => $hamza_lite_options_posts
            )
    );

    //icon
    $hamza_lite_customize->add_setting(
            'hamza_lite_featured_post_four_icon', array(
        'default' => '',
        'sanitize_callback' => 'hamza_lite_sanitize_text',
            )
    );

    $hamza_lite_customize->add_control(
            'hamza_lite_featured_post_four_icon', array(
        'section' => 'hamza_lite_featured_section',
        'description' => __('Font Awesome icon name </br> Example: fa-bell', 'hamza-lite'),
        'type' => 'text',
            )
    );

    //Feature read more button text.....
    $hamza_lite_customize->add_setting(
            'hamza_lite_featured_read_more', array(
        'default' => __('Read More', 'hamza-lite'),
        'sanitize_callback' => 'hamza_lite_sanitize_text'
            )
    );

    $hamza_lite_customize->add_control(
            'hamza_lite_featured_read_more', array(
        'label' => __('Read More Text', 'hamza-lite'),
        'section' => 'hamza_lite_featured_section',
        'description' => __("Leave blank if you don't want to show read more!", 'hamza-lite'),
        'type' => 'text',
            )
    );

    /** Latest Portfolio Section */
    $hamza_lite_customize->add_section(
            'hamza_lite_latest_portfolio_section', array(
        'title' => __('Latest Portfolio Section', 'hamza-lite'),
        'priority' => 40,
        'panel' => 'hamza_lite_homepage_settings',
            )
    );

    $hamza_lite_customize->add_setting(
            'hamza_lite_portfolio_title', array(
        'default' => '',
        'sanitize_callback' => 'hamza_lite_sanitize_text',
            )
    );

    $hamza_lite_customize->add_control(
            'hamza_lite_portfolio_title', array(
        'label' => __('Portfolio Title', 'hamza-lite'),
        'section' => 'hamza_lite_latest_portfolio_section',
        'type' => 'text',
            )
    );

    $hamza_lite_customize->add_setting(
            'hamza_lite_portfolio_content', array(
        'default' => '',
        'sanitize_callback' => 'wp_kses_post',
            )
    );

    $hamza_lite_customize->add_control(
            'hamza_lite_portfolio_content', array(
        'label' => __('Portfolio Text', 'hamza-lite'),
        'section' => 'hamza_lite_latest_portfolio_section',
        'description' => __("Html content allowed", 'hamza-lite'),
        'type' => 'textarea',
            )
    );

    $hamza_lite_customize->add_setting(
            'hamza_lite_portfolio_category', array(
        'default' => '',
        'sanitize_callback' => 'hamza_lite_sanitize_dropdown'
            )
    );

    $hamza_lite_customize->add_control('hamza_lite_portfolio_category', array(
        'label' => __('Select the category to display as Portfolio', 'hamza-lite'),
        'section' => 'hamza_lite_latest_portfolio_section',
        'type' => 'select',
        'choices' => $hamza_lite_option_categories
            )
    );

    /** Latest Blog */
    $hamza_lite_customize->add_section(
            'hamza_lite_latest_blog_section', array(
        'title' => __('Latest Blog Section', 'hamza-lite'),
        'priority' => 50,
        'panel' => 'hamza_lite_homepage_settings',
            )
    );

    $hamza_lite_customize->add_setting(
            'hamza_lite_blog_category', array(
        'default' => '',
        'sanitize_callback' => 'hamza_lite_sanitize_dropdown'
            )
    );

    $hamza_lite_customize->add_control('hamza_lite_blog_category', array(
        'label' => __('Select the category to display as Blog', 'hamza-lite'),
        'section' => 'hamza_lite_latest_blog_section',
        'type' => 'select',
        'choices' => $hamza_lite_option_categories
            )
    );

    /** Blog Posted Date Section  */
    $hamza_lite_customize->add_setting(
            'hamza_lite_show_blog_date', array(
        'default' => '1',
        'sanitize_callback' => 'hamza_lite_sanitize_checkbox',
            )
    );

    $hamza_lite_customize->add_control(
            'hamza_lite_show_blog_date', array(
        'label' => __('Check to enable Blog Posted Date', 'hamza-lite'),
        'description' => __('If enabled Blog Posted Date will be shown', 'hamza-lite'),
        'section' => 'hamza_lite_latest_blog_section',
        'type' => 'checkbox'
            )
    );

    /** Blog Button Section */
    $hamza_lite_customize->add_setting(
            'hamza_lite_show_blog_button', array(
        'default' => '',
        'sanitize_callback' => 'hamza_lite_sanitize_checkbox',
            )
    );

    $hamza_lite_customize->add_control(
            'hamza_lite_show_blog_button', array(
        'label' => __('Check to disable Blog View All button', 'hamza-lite'),
        'description' => __('if disabled Blog View All button will hide', 'hamza-lite'),
        'section' => 'hamza_lite_latest_blog_section',
        'type' => 'checkbox'
            )
    );

    $hamza_lite_customize->add_setting(
            'hamza_lite_recent_title', array(
        'default' => __('Recent Post', 'hamza-lite'),
        'sanitize_callback' => 'hamza_lite_sanitize_text',
            )
    );

    $hamza_lite_customize->add_control(
            'hamza_lite_recent_title', array(
        'label' => __('Recent Post Title', 'hamza-lite'),
        'section' => 'hamza_lite_latest_blog_section',
        'type' => 'text',
            )
    );

    $hamza_lite_customize->add_setting(
            'hamza_lite_recent_category', array(
        'default' => '',
        'sanitize_callback' => 'hamza_lite_sanitize_dropdown'
            )
    );

    $hamza_lite_customize->add_control('hamza_lite_recent_category', array(
        'label' => __('Select the category to display as Recent Post', 'hamza-lite'),
        'section' => 'hamza_lite_latest_blog_section',
        'type' => 'select',
        'choices' => $hamza_lite_option_categories
            )
    );

    /** Testimonail Slider Section */
    $hamza_lite_customize->add_section(
            'hamza_lite_testimonial_slider_section', array(
        'title' => __('Testimonail Slider', 'hamza-lite'),
        'priority' => 60,
        'panel' => 'hamza_lite_homepage_settings',
            )
    );


    $hamza_lite_customize->add_setting(
            'hamza_lite_testimonial_category', array(
        'default' => '',
        'sanitize_callback' => 'hamza_lite_sanitize_dropdown'
            )
    );

    $hamza_lite_customize->add_control('hamza_lite_testimonial_category', array(
        'label' => __('Select the category to display as Testimonials', 'hamza-lite'),
        'section' => 'hamza_lite_testimonial_slider_section',
        'type' => 'select',
        'choices' => $hamza_lite_option_categories
            )
    );

    /** Google Map Section */
    $hamza_lite_customize->add_section(
            'hamza_lite_google_map_section', array(
        'title' => __('Google Map Section', 'hamza-lite'),
        'priority' => 70,
        'panel' => 'hamza_lite_homepage_settings',
            )
    );

    $hamza_lite_customize->add_setting(
            'hamza_lite_google_map_iframe', array(
        'default' => '',
        'sanitize_callback' => 'wp_kses_stripslashes',
            )
    );

    $hamza_lite_customize->add_control(
            'hamza_lite_google_map_iframe', array(
        'label' => __('Google Map Iframe', 'hamza-lite'),
        'section' => 'hamza_lite_google_map_section',
        'description' => __("Enter the Google Map Iframe", 'hamza-lite'),
        'type' => 'textarea',
            )
    );

    $hamza_lite_customize->add_setting(
            'hamza_lite_contact_address', array(
        'default' => '',
        'sanitize_callback' => 'wp_kses_post',
            )
    );

    $hamza_lite_customize->add_control(
            'hamza_lite_contact_address', array(
        'label' => __('Contact Address', 'hamza-lite'),
        'section' => 'hamza_lite_google_map_section',
        'description' => __("Enter the Contact Address Detail", 'hamza-lite'),
        'type' => 'textarea',
            )
    );

    $hamza_lite_customize->add_setting(
            'hamza_lite_contact_form', array(
        'default' => '',
        'sanitize_callback' => 'wp_kses_post',
            )
    );

    $hamza_lite_customize->add_control(
            'hamza_lite_contact_form', array(
        'label' => __('Contact Form', 'hamza-lite'),
        'section' => 'hamza_lite_google_map_section',
        'description' => __('Enter the Contact Form Shortcode. Ex. [contact-form-7 id="186" title="Google contact"]', 'hamza-lite'),
        'type' => 'text',
            )
    );
    /** Homepage Settings panel Ends */
    /** Slider Settings Panel */
    $hamza_lite_customize->add_panel(
            'hamza_lite_slider_settings', array(
        'priority' => 40,
        'capability' => 'edit_theme_options',
        'title' => __('Slider Settings', 'hamza-lite'),
        'description' => __('Homepage slider settings, change the following options to control the slider', 'hamza-lite')
            )
    );

    /** Enable/Disable slider............ */
    $hamza_lite_customize->add_section(
            'hamza_lite_slider_general_section', array(
        'title' => __('General Settings', 'hamza-lite'),
        'priority' => 10,
        'panel' => 'hamza_lite_slider_settings',
            )
    );

    $hamza_lite_customize->add_setting(
            'hamza_lite_slider_option', array(
        'default' => 'show',
        'sanitize_callback' => 'hamza_lite_sanitize_select',
            )
    );

    $hamza_lite_customize->add_control(
            'hamza_lite_slider_option', array(
        'label' => __('Show/Hide Slider', 'hamza-lite'),
        'section' => 'hamza_lite_slider_general_section',
        'type' => 'radio',
        'choices' => array(
            'show' => __('Show', 'hamza-lite'),
            'hide' => __('Hide', 'hamza-lite'),
        )
            )
    );

    /** Slider control section to control arrow */
    $hamza_lite_customize->add_setting(
            'hamza_lite_slider_control_option', array(
        'default' => 'true',
        'sanitize_callback' => 'hamza_lite_sanitize_select',
            )
    );

    $hamza_lite_customize->add_control(
            'hamza_lite_slider_control_option', array(
        'label' => __('Show Slider Pager', 'hamza-lite'),
        'section' => 'hamza_lite_slider_general_section',
        'type' => 'radio',
        'choices' => array(
            'true' => __('Yes', 'hamza-lite'),
            'false' => __('No', 'hamza-lite'),
        )
            )
    );

    /** Slider transition slide/fade option.   */
    $hamza_lite_customize->add_setting(
            'hamza_lite_slider_transition', array(
        'default' => 'horizontal',
        'sanitize_callback' => 'hamza_lite_sanitize_select',
            )
    );

    $hamza_lite_customize->add_control(
            'hamza_lite_slider_transition', array(
        'label' => __('Slider Transition - fade/slide', 'hamza-lite'),
        'section' => 'hamza_lite_slider_general_section',
        'type' => 'radio',
        'choices' => array(
            'fade' => __('Fade', 'hamza-lite'),
            'horizontal' => __('Slide', 'hamza-lite'),
        )
            )
    );

    /** Slider auto transition settings.        */
    $hamza_lite_customize->add_setting(
            'hamza_lite_slider_auto_transition', array(
        'default' => 'true',
        'sanitize_callback' => 'hamza_lite_sanitize_select',
            )
    );

    $hamza_lite_customize->add_control(
            'hamza_lite_slider_auto_transition', array(
        'label' => __('Slider auto Transition', 'hamza-lite'),
        'section' => 'hamza_lite_slider_general_section',
        'type' => 'radio',
        'choices' => array(
            'true' => __('Yes', 'hamza-lite'),
            'false' => __('No', 'hamza-lite'),
        )
            )
    );

    /** Caption control setting in slider. */
    $hamza_lite_customize->add_setting(
            'hamza_lite_slider_captions', array(
        'default' => 'show',
        'sanitize_callback' => 'hamza_lite_sanitize_select',
            )
    );

    $hamza_lite_customize->add_control(
            'hamza_lite_slider_captions', array(
        'label' => __('Show slider captions', 'hamza-lite'),
        'section' => 'hamza_lite_slider_general_section',
        'type' => 'radio',
        'choices' => array(
            'show' => __('Show', 'hamza-lite'),
            'hide' => __('Hide', 'hamza-lite'),
        )
            )
    );

    /** Option to control slider speed. */
    $hamza_lite_customize->add_setting(
            'hamza_lite_slider_speed', array(
        'default' => '500',
        'sanitize_callback' => 'hamza_lite_sanitize_slider_speed',
            )
    );

    $hamza_lite_customize->add_control(
            'hamza_lite_slider_speed', array(
        'label' => __('Choose slider speed?', 'hamza-lite'),
        'section' => 'hamza_lite_slider_general_section',
        'type' => 'text',
            )
    );

    /** Option to control slider pause. */
    $hamza_lite_customize->add_setting(
            'hamza_lite_slider_pause', array(
        'default' => '4000',
        'sanitize_callback' => 'hamza_lite_sanitize_slider_pause',
            )
    );

    $hamza_lite_customize->add_control(
            'hamza_lite_slider_pause', array(
        'label' => __('Choose slider pause time?', 'hamza-lite'),
        'section' => 'hamza_lite_slider_general_section',
        'type' => 'text',
            )
    );

    /** select slider type */
    $hamza_lite_customize->add_section(
            'hamza_lite_slider_selection_section', array(
        'title' => __('Slider Selection Settings', 'hamza-lite'),
        'priority' => 20,
        'panel' => 'hamza_lite_slider_settings',
            )
    );

    $hamza_lite_customize->add_setting(
            'hamza_lite_slider_type', array(
        'default' => 'single_post_slider',
        'sanitize_callback' => 'hamza_lite_sanitize_select'
            )
    );

    $hamza_lite_customize->add_control(
            'hamza_lite_slider_type', array(
        'label' => __('Choose Slider Type', 'hamza-lite'),
        'section' => 'hamza_lite_slider_selection_section',
        'type' => 'radio',
        'choices' => array(
            'single_post_slider' => __('Single Posts as a Slider', 'hamza-lite'),
            'cat_post_slider' => __('Category Posts as a Slider', 'hamza-lite')
        )
            )
    );

    /** Slider Post Choose */
    $hamza_lite_customize->add_section(
            'hamza_lite_slider_post_choose_section', array(
        'title' => __('Slider Selection(Post)', 'hamza-lite'),
        'description' => __('Enable single post as slider in slider selection setting section.', 'hamza-lite'),
        'priority' => 25,
        'panel' => 'hamza_lite_slider_settings',
            )
    );

    $hamza_lite_customize->add_setting(
            'hamza_lite_slider_one', array(
        'sanitize_callback' => 'hamza_lite_sanitize_dropdown',
            )
    );

    $hamza_lite_customize->add_control('hamza_lite_slider_one', array(
        'label' => __('Slider 1', 'hamza-lite'),
        'section' => 'hamza_lite_slider_post_choose_section',
        'type' => 'select',
        'choices' => $hamza_lite_options_posts
            )
    );

    $hamza_lite_customize->add_setting(
            'hamza_lite_slider_two', array(
        'sanitize_callback' => 'hamza_lite_sanitize_dropdown',
            )
    );

    $hamza_lite_customize->add_control('hamza_lite_slider_two', array(
        'label' => __('Slider 2', 'hamza-lite'),
        'section' => 'hamza_lite_slider_post_choose_section',
        'type' => 'select',
        'choices' => $hamza_lite_options_posts
            )
    );

    $hamza_lite_customize->add_setting(
            'hamza_lite_slider_three', array(
        'sanitize_callback' => 'hamza_lite_sanitize_dropdown',
            )
    );

    $hamza_lite_customize->add_control('hamza_lite_slider_three', array(
        'label' => __('Slider 3', 'hamza-lite'),
        'section' => 'hamza_lite_slider_post_choose_section',
        'type' => 'select',
        'choices' => $hamza_lite_options_posts
            )
    );

    $hamza_lite_customize->add_setting(
            'hamza_lite_slider_four', array(
        'sanitize_callback' => 'hamza_lite_sanitize_dropdown',
            )
    );

    $hamza_lite_customize->add_control('hamza_lite_slider_four', array(
        'label' => __('Slider 4', 'hamza-lite'),
        'section' => 'hamza_lite_slider_post_choose_section',
        'type' => 'select',
        'choices' => $hamza_lite_options_posts
            )
    );

    /** slider category choose */
    $hamza_lite_customize->add_section(
            'hamza_lite_slider_category_section', array(
        'title' => __('Slider Selection(Category)', 'hamza-lite'),
        'priority' => 30,
        'panel' => 'hamza_lite_slider_settings',
            )
    );

    $hamza_lite_customize->add_setting(
            'hamza_lite_slider_category', array(
        'sanitize_callback' => 'hamza_lite_sanitize_dropdown'
            )
    );

    $hamza_lite_customize->add_control('hamza_lite_slider_category', array(
        'label' => __('Select the Category', 'hamza-lite'),
        'description' => __('Enable category as slider in slider selectoin setting section.', 'hamza-lite'),
        'section' => 'hamza_lite_slider_category_section',
        'type' => 'select',
        'choices' => $hamza_lite_option_categories
            )
    );
    /** Slider Settings Panel Ends */
    /** Typograpy Settings */
    $hamza_lite_customize->add_panel(
            'hamza_lite_typography_settings', array(
        'priority' => 50,
        'capability' => 'edit_theme_options',
        'description' => '',
        'title' => __('Typography Settings', 'hamza-lite'),
            )
    );

    /** Font Options */
    $hamza_lite_customize->add_section(
            'hamza_lite_font_section', array(
        'title' => __('Font Settings', 'hamza-lite'),
        'priority' => 10,
        'panel' => 'hamza_lite_typography_settings',
            )
    );

    $hamza_lite_customize->add_setting(
            'hamza_lite_header_font', array(
        'default' => 'Arial,Verdana,sans-serif',
        'sanitize_callback' => 'hamza_lite_sanitize_select',
            )
    );

    $hamza_lite_customize->add_control(
            'hamza_lite_header_font', array(
        'label' => __('Header Tags Font', 'hamza-lite'),
        'description' => __('Choose a font for the headline H1, H2, H3, H4, H5, H6 text', 'hamza-lite'),
        'section' => 'hamza_lite_font_section',
        'type' => 'select',
        'choices' => $hamza_lite_google_fonts
            )
    );

    $hamza_lite_customize->add_setting(
            'hamza_lite_header_font_weight', array(
        'default' => '700',
        'sanitize_callback' => 'hamza_lite_sanitize_select',
            )
    );

    $hamza_lite_customize->add_control(
            'hamza_lite_header_font_weight', array(
        'label' => __('Header Tags Font Weight', 'hamza-lite'),
        'description' => __('Choose a font weight for the headline H1, H2, H3, H4, H5, H6 text', 'hamza-lite'),
        'section' => 'hamza_lite_font_section',
        'type' => 'select',
        'choices' => array(
            '300' => __('300', 'hamza-lite'),
            '400' => __('400', 'hamza-lite'),
            '600' => __('600', 'hamza-lite'),
            '700' => __('700', 'hamza-lite')
        )
            )
    );

    $hamza_lite_customize->add_setting(
            'hamza_lite_body_text', array(
        'default' => 'Arial,Verdana,sans-serif ',
        'sanitize_callback' => 'hamza_lite_sanitize_select',
            )
    );

    $hamza_lite_customize->add_control(
            'hamza_lite_body_text', array(
        'label' => __('Body Text Font', 'hamza-lite'),
        'description' => __('Choose a font for the Body text', 'hamza-lite'),
        'section' => 'hamza_lite_font_section',
        'type' => 'select',
        'choices' => $hamza_lite_google_fonts
            )
    );

    $hamza_lite_customize->add_setting(
            'hamza_lite_body_text_weight', array(
        'default' => '400',
        'sanitize_callback' => 'hamza_lite_sanitize_select',
            )
    );

    $hamza_lite_customize->add_control(
            'hamza_lite_body_text_weight', array(
        'label' => __('Body Text Font Weight', 'hamza-lite'),
        'description' => __('Choose a font weight for the Body text', 'hamza-lite'),
        'section' => 'hamza_lite_font_section',
        'type' => 'select',
        'choices' => array(
            '300' => __('300', 'hamza-lite'),
            '400' => __('400', 'hamza-lite')
        )
            )
    );

    /** Heading Tags Formatting */
    $hamza_lite_customize->add_section(
            'hamza_lite_tag_section', array(
        'title' => __('Tag Settings', 'hamza-lite'),
        'priority' => 20,
        'panel' => 'hamza_lite_typography_settings',
            )
    );

    /** H1 Font */
    $hamza_lite_customize->add_setting(
            'hamza_lite_h1_font_size', array(
        'default' => '26',
        'sanitize_callback' => 'hamza_lite_h1_font_size_sanitize',
            )
    );

    $hamza_lite_customize->add_control(
            'hamza_lite_h1_font_size', array(
        'label' => __('H1 Font Size (px)', 'hamza-lite'),
        'section' => 'hamza_lite_tag_section',
        'type' => 'text'
            )
    );

    $hamza_lite_customize->add_setting(
            'hamza_lite_h1_text_transform', array(
        'default' => 'none',
        'sanitize_callback' => 'hamza_lite_sanitize_select',
            )
    );

    $hamza_lite_customize->add_control(
            'hamza_lite_h1_text_transform', array(
        'label' => __('H1 Text Transform', 'hamza-lite'),
        'section' => 'hamza_lite_tag_section',
        'type' => 'select',
        'choices' => $hamza_lite_transform
            )
    );


    $hamza_lite_customize->add_setting(
            'hamza_lite_h1_color', array(
        'default' => '#333333',
        'sanitize_callback' => 'sanitize_hex_color'
            )
    );

    $hamza_lite_customize->add_control(new WP_Customize_Color_Control($hamza_lite_customize, 'hamza_lite_h1_color', array(
        'label' => __('H1 Color', 'hamza-lite'),
        'section' => 'hamza_lite_tag_section',
            )
    ));

    /** H2 Font */
    $hamza_lite_customize->add_setting(
            'hamza_lite_h2_font_size', array(
        'default' => '24',
        'sanitize_callback' => 'hamza_lite_h2_font_size_sanitize',
            )
    );

    $hamza_lite_customize->add_control(
            'hamza_lite_h2_font_size', array(
        'label' => __('H2 Font Size (px)', 'hamza-lite'),
        'section' => 'hamza_lite_tag_section',
        'type' => 'text'
            )
    );

    $hamza_lite_customize->add_setting(
            'hamza_lite_h2_text_transform', array(
        'default' => 'none',
        'sanitize_callback' => 'hamza_lite_sanitize_select',
            )
    );

    $hamza_lite_customize->add_control(
            'hamza_lite_h2_text_transform', array(
        'label' => __('H2 Text Transform', 'hamza-lite'),
        'section' => 'hamza_lite_tag_section',
        'type' => 'select',
        'choices' => $hamza_lite_transform
            )
    );


    $hamza_lite_customize->add_setting(
            'hamza_lite_h2_color', array(
        'default' => '#4b4b4b',
        'sanitize_callback' => 'sanitize_hex_color'
            )
    );

    $hamza_lite_customize->add_control(new WP_Customize_Color_Control($hamza_lite_customize, 'hamza_lite_h2_color', array(
        'label' => __('H2 Color', 'hamza-lite'),
        'section' => 'hamza_lite_tag_section',
            )
    ));

    /** H3 Font */
    $hamza_lite_customize->add_setting(
            'hamza_lite_h3_font_size', array(
        'default' => '22',
        'sanitize_callback' => 'hamza_lite_h3_font_size_sanitize',
            )
    );

    $hamza_lite_customize->add_control(
            'hamza_lite_h3_font_size', array(
        'label' => __('H3 Font Size (px)', 'hamza-lite'),
        'section' => 'hamza_lite_tag_section',
        'type' => 'text'
            )
    );

    $hamza_lite_customize->add_setting(
            'hamza_lite_h3_text_transform', array(
        'default' => 'none',
        'sanitize_callback' => 'hamza_lite_sanitize_select',
            )
    );

    $hamza_lite_customize->add_control(
            'hamza_lite_h3_text_transform', array(
        'label' => __('H3 Text Transform', 'hamza-lite'),
        'section' => 'hamza_lite_tag_section',
        'type' => 'select',
        'choices' => $hamza_lite_transform
            )
    );


    $hamza_lite_customize->add_setting(
            'hamza_lite_h3_color', array(
        'default' => '#333333',
        'sanitize_callback' => 'sanitize_hex_color'
            )
    );

    $hamza_lite_customize->add_control(new WP_Customize_Color_Control($hamza_lite_customize, 'hamza_lite_h3_color', array(
        'label' => __('H3 Color', 'hamza-lite'),
        'section' => 'hamza_lite_tag_section',
            )
    ));

    /** H4 Font */
    $hamza_lite_customize->add_setting(
            'hamza_lite_h4_font_size', array(
        'default' => '20',
        'sanitize_callback' => 'hamza_lite_h4_font_size_sanitize',
            )
    );

    $hamza_lite_customize->add_control(
            'hamza_lite_h4_font_size', array(
        'label' => __('H4 Font Size (px)', 'hamza-lite'),
        'section' => 'hamza_lite_tag_section',
        'type' => 'text'
            )
    );

    $hamza_lite_customize->add_setting(
            'hamza_lite_h4_text_transform', array(
        'default' => 'none',
        'sanitize_callback' => 'hamza_lite_sanitize_select',
            )
    );

    $hamza_lite_customize->add_control(
            'hamza_lite_h4_text_transform', array(
        'label' => __('H4 Text Transform', 'hamza-lite'),
        'section' => 'hamza_lite_tag_section',
        'type' => 'select',
        'choices' => $hamza_lite_transform
            )
    );


    $hamza_lite_customize->add_setting(
            'hamza_lite_h4_color', array(
        'default' => '#333333',
        'sanitize_callback' => 'sanitize_hex_color'
            )
    );

    $hamza_lite_customize->add_control(new WP_Customize_Color_Control($hamza_lite_customize, 'hamza_lite_h4_color', array(
        'label' => __('H4 Color', 'hamza-lite'),
        'section' => 'hamza_lite_tag_section',
            )
    ));

    /** H5 Font */
    $hamza_lite_customize->add_setting(
            'hamza_lite_h5_font_size', array(
        'default' => '18',
        'sanitize_callback' => 'hamza_lite_h5_font_size_sanitize',
            )
    );

    $hamza_lite_customize->add_control(
            'hamza_lite_h5_font_size', array(
        'label' => __('H5 Font Size (px)', 'hamza-lite'),
        'section' => 'hamza_lite_tag_section',
        'type' => 'text'
            )
    );

    $hamza_lite_customize->add_setting(
            'hamza_lite_h5_text_transform', array(
        'default' => 'none',
        'sanitize_callback' => 'hamza_lite_sanitize_select',
            )
    );

    $hamza_lite_customize->add_control(
            'hamza_lite_h5_text_transform', array(
        'label' => __('H5 Text Transform', 'hamza-lite'),
        'section' => 'hamza_lite_tag_section',
        'type' => 'select',
        'choices' => $hamza_lite_transform
            )
    );


    $hamza_lite_customize->add_setting(
            'hamza_lite_h5_color', array(
        'default' => '#333333',
        'sanitize_callback' => 'sanitize_hex_color'
            )
    );

    $hamza_lite_customize->add_control(new WP_Customize_Color_Control($hamza_lite_customize, 'hamza_lite_h5_color', array(
        'label' => __('H5 Color', 'hamza-lite'),
        'section' => 'hamza_lite_tag_section',
            )
    ));

    /** H6 Font */
    $hamza_lite_customize->add_setting(
            'hamza_lite_h6_font_size', array(
        'default' => '16',
        'sanitize_callback' => 'hamza_lite_h6_font_size_sanitize',
            )
    );

    $hamza_lite_customize->add_control(
            'hamza_lite_h6_font_size', array(
        'label' => __('H6 Font Size (px)', 'hamza-lite'),
        'section' => 'hamza_lite_tag_section',
        'type' => 'text'
            )
    );

    $hamza_lite_customize->add_setting(
            'hamza_lite_h6_text_transform', array(
        'default' => 'none',
        'sanitize_callback' => 'hamza_lite_sanitize_select',
            )
    );

    $hamza_lite_customize->add_control(
            'hamza_lite_h6_text_transform', array(
        'label' => __('H6 Text Transform', 'hamza-lite'),
        'section' => 'hamza_lite_tag_section',
        'type' => 'select',
        'choices' => $hamza_lite_transform
            )
    );


    $hamza_lite_customize->add_setting(
            'hamza_lite_h6_color', array(
        'default' => '#333333',
        'sanitize_callback' => 'sanitize_hex_color'
            )
    );

    $hamza_lite_customize->add_control(new WP_Customize_Color_Control($hamza_lite_customize, 'hamza_lite_h6_color', array(
        'label' => __('H6 Color', 'hamza-lite'),
        'section' => 'hamza_lite_tag_section',
            )
    ));

    /** Body Text */
    $hamza_lite_customize->add_setting(
            'hamza_lite_body_font_size', array(
        'default' => '14',
        'sanitize_callback' => 'hamza_lite_body_font_size_sanitize',
            )
    );

    $hamza_lite_customize->add_control(
            'hamza_lite_body_font_size', array(
        'label' => __('Body Text Font Size (px)', 'hamza-lite'),
        'section' => 'hamza_lite_tag_section',
        'type' => 'text'
            )
    );

    $hamza_lite_customize->add_setting(
            'hamza_lite_body_color', array(
        'default' => '#212121',
        'sanitize_callback' => 'sanitize_hex_color'
            )
    );

    $hamza_lite_customize->add_control(new WP_Customize_Color_Control($hamza_lite_customize, 'hamza_lite_body_color', array(
        'label' => __('Body Text Color', 'hamza-lite'),
        'section' => 'hamza_lite_tag_section',
            )
    ));
    /** Typograpy Settings Ends */
    /** Social Links Panel */
    $hamza_lite_customize->add_panel(
            'hamza_lite_social_link_panel', array(
        'priority' => 60,
        'capability' => 'edit_theme_options',
        'title' => __('Social Link Settings', 'hamza-lite'),
        'description' => __('Put your social url', 'hamza-lite')
            )
    );

    /** Option to enable/disable social links in header/footer. */
    $hamza_lite_customize->add_section(
            'hamza_lite_social_link_disable_section', array(
        'title' => __('Enable/Disable Social Link', 'hamza-lite'),
        'priority' => 10,
        'panel' => 'hamza_lite_social_link_panel',
            )
    );

    $hamza_lite_customize->add_setting(
            'hamza_lite_social_link_footer', array(
        'default' => '',
        'sanitize_callback' => 'hamza_lite_sanitize_checkbox',
            )
    );

    $hamza_lite_customize->add_control(
            'hamza_lite_social_link_footer', array(
        'label' => __('Check To Disable', 'hamza-lite'),
        'section' => 'hamza_lite_social_link_disable_section',
        'type' => 'checkbox',
        'description' => __('Disable Social icons in Footer?', 'hamza-lite'),
            )
    );

    /** Social links settings to input url. */
    $hamza_lite_customize->add_section(
            'hamza_lite_social_link_section', array(
        'title' => __('Social Links', 'hamza-lite'),
        'description' => __("Put your social url below.. Leave blank if you don't want to show it.", 'hamza-lite'),
        'priority' => 20,
        'panel' => 'hamza_lite_social_link_panel',
            )
    );

    /** facebook */
    $hamza_lite_customize->add_setting(
            'hamza_lite_facebook', array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw',
            )
    );

    $hamza_lite_customize->add_control(
            'hamza_lite_facebook', array(
        'label' => __('Facebook', 'hamza-lite'),
        'section' => 'hamza_lite_social_link_section',
        'type' => 'text',
            )
    );

    /** twitter */
    $hamza_lite_customize->add_setting(
            'hamza_lite_twitter', array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw',
            )
    );

    $hamza_lite_customize->add_control(
            'hamza_lite_twitter', array(
        'label' => __('Twitter', 'hamza-lite'),
        'section' => 'hamza_lite_social_link_section',
        'type' => 'text',
            )
    );

    /** Google Plus */
    $hamza_lite_customize->add_setting(
            'hamza_lite_google_plus', array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw',
            )
    );

    $hamza_lite_customize->add_control(
            'hamza_lite_google_plus', array(
        'label' => __('Google plus', 'hamza-lite'),
        'section' => 'hamza_lite_social_link_section',
        'type' => 'text',
            )
    );

    /** Linkedin */
    $hamza_lite_customize->add_setting(
            'hamza_lite_linkedin', array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw',
            )
    );

    $hamza_lite_customize->add_control(
            'hamza_lite_linkedin', array(
        'label' => __('Linkedin', 'hamza-lite'),
        'section' => 'hamza_lite_social_link_section',
        'type' => 'text',
            )
    );

    /** Youtube  */
    $hamza_lite_customize->add_setting(
            'hamza_lite_youtube', array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw',
            )
    );

    $hamza_lite_customize->add_control(
            'hamza_lite_youtube', array(
        'label' => __('Youtube', 'hamza-lite'),
        'section' => 'hamza_lite_social_link_section',
        'type' => 'text',
            )
    );
    /** Social Links Panel Ends */
    /** Tool Sections */
    $hamza_lite_customize->add_section(
            'hamza_lite_tools_section', array(
        'title' => __('Tools', 'hamza-lite'),
        'description' => '',
        'priority' => 110,
            )
    );

    $hamza_lite_customize->add_setting(
            'hamza_lite_custom_css', array(
        'default' => '',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'hamza_lite_sanitize_text_css'
            )
    );

    $hamza_lite_customize->add_control(
            'hamza_lite_custom_css', array(
        'label' => __('Custom Css', 'hamza-lite'),
        'section' => 'hamza_lite_tools_section',
        'description' => __('Put your custom CSS', 'hamza-lite'),
        'type' => 'textarea',
            )
    );

    $hamza_lite_customize->add_setting(
            'hamza_lite_custom_js', array(
        'default' => '',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'hamza_lite_sanitize_text'
            )
    );

    $hamza_lite_customize->add_control(
            'hamza_lite_custom_js', array(
        'label' => __('Custom js', 'hamza-lite'),
        'section' => 'hamza_lite_tools_section',
        'description' => __('Put your custom JS', 'hamza-lite'),
        'type' => 'textarea',
            )
    );

    /** Tool Sections Ends */
    /** About Us Section */
    $hamza_lite_customize->add_section(
            'hamza_lite_about_us_section', array(
        'title' => __('About Hamza Lite', 'hamza-lite'),
        'priority' => 1000,
            )
    );

    $hamza_lite_customize->add_setting(
            'hamza_lite_about_us', array(
        'default' => '',
        'sanitize_callback' => 'esc_html'
            )
    );

    $hamza_lite_customize->add_control(new Hamza_Lite_About_Us($hamza_lite_customize, 'hamza_lite_about_us', array(
        'section' => 'hamza_lite_about_us_section',
    )));

    /** About Us Section Ends */
    //Integer Sanitize in the customizer
    function hamza_lite_sanitize_slider_pause($hamza_lite_input) {
        if (intval($hamza_lite_input)) {
            return absint($hamza_lite_input);
        } else {
            return '4000';
        }
    }

    function hamza_lite_sanitize_slider_speed($hamza_lite_input) {
        if (intval($hamza_lite_input)) {
            return absint($hamza_lite_input);
        } else {
            return '500';
        }
    }

    function hamza_lite_sanitize_call_char($hamza_lite_input) {
        if (intval($hamza_lite_input)) {
            return absint($hamza_lite_input);
        } else {
            return '250';
        }
    }

    //Sanitize input text general
    function hamza_lite_sanitize_text($hamza_lite_input) {
        return wp_kses_post(force_balance_tags($hamza_lite_input));
    }

    //Sanitize input text general
    function hamza_lite_sanitize_text_css($hamza_lite_input) {
        return $hamza_lite_input;
    }

    //General dropdown sanitize for integer value
    function hamza_lite_sanitize_dropdown($hamza_lite_input) {
        return absint($hamza_lite_input);
    }

    //Checkbox sanitization function
    function hamza_lite_sanitize_checkbox($hamza_lite_input) {
        if ($hamza_lite_input == 1) {
            return 1;
        } else {
            return '';
        }
    }

    function hamza_lite_h1_font_size_sanitize($hamza_lite_input) {
        if (intval($hamza_lite_input)) {
            return absint($hamza_lite_input);
        } else {
            return '26';
        }
    }

    function hamza_lite_h2_font_size_sanitize($hamza_lite_input) {
        if (intval($hamza_lite_input)) {
            return absint($hamza_lite_input);
        } else {
            return '24';
        }
    }

    function hamza_lite_h3_font_size_sanitize($hamza_lite_input) {
        if (intval($hamza_lite_input)) {
            return absint($hamza_lite_input);
        } else {
            return '22';
        }
    }

    function hamza_lite_h4_font_size_sanitize($hamza_lite_input) {
        if (intval($hamza_lite_input)) {
            return absint($hamza_lite_input);
        } else {
            return '20';
        }
    }

    function hamza_lite_h5_font_size_sanitize($hamza_lite_input) {
        if (intval($hamza_lite_input)) {
            return absint($hamza_lite_input);
        } else {
            return '18';
        }
    }

    function hamza_lite_h6_font_size_sanitize($hamza_lite_input) {
        if (intval($hamza_lite_input)) {
            return absint($hamza_lite_input);
        } else {
            return '16';
        }
    }

    function hamza_lite_body_font_size_sanitize($hamza_lite_input) {
        if (intval($hamza_lite_input)) {
            return absint($hamza_lite_input);
        } else {
            return '14';
        }
    }

    function hamza_lite_sanitize_select($hamza_lite_input, $hamza_lite_setting) {
        // Ensure input is a slug.
        $hamza_lite_input = sanitize_key($hamza_lite_input);

        // Get list of choices from the control associated with the setting.
        $hamza_lite_choices = $hamza_lite_setting->manager->get_control($hamza_lite_setting->id)->choices;

        // If the input is a valid key, return it; otherwise, return the default.
        return ( array_key_exists($hamza_lite_input, $hamza_lite_choices) ? $hamza_lite_input : $hamza_lite_setting->default );
    }

}

add_action('customize_register', 'hamza_lite_customizer');
