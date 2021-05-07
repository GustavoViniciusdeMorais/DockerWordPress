    <?php
    /*
    Plugin Name: Facilita Disponibilidade
    description: Exclusivo para Facilita
    Version: 1.0
    Author: Orlando Lacerda
    Author URI: http://orlandolacerda.com
    */
    error_reporting(WP_DEBUG);

    add_action( 'parse_request', function( $wp ){
    // The regex can be changed depending on your needs
    if ( preg_match( '#^disponibilidade/(.*)/(.*)#', $wp->request, $matches ) ) {
        // Get the Instance of Availability
        $instance = $matches[1];

        // Get the Product ID
        $productId = $matches[2]; 

        //Instance Class
        require_once $fileRootPath . 'AvailabilityApiBI.class.php';
        $productClass = new AvailabilityApiBI($productId, $instance);
        $product = $productClass->getProduct();

        // LOAD PAGES
        $fileRootPath = WP_PLUGIN_DIR . '/facilita-disponibilidade/';

        if(count($product) > 0 && isset($product['tipo_empreendimento']) && $product['tipo_empreendimento'] !== 'vertical'){
            require_once $fileRootPath . "disponibilidade-{$product['tipo_empreendimento']}.php";
        }else{
            require_once $fileRootPath . '404.php';
        }

        exit;
    }
});