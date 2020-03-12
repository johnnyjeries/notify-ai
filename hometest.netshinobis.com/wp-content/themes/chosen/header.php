<!DOCTYPE html>

<html <?php language_attributes(); ?>>

<head>
    <script> 
    

//check if number is prime
function isPrime(num) {
  for(var i = 2; i < num ; i++){
    if(num % i === 0){
	 return false;
     } 
   }
// here get the specific image and add css to show it( should have "display:none;" as default)
    var post_data = document.getElementsByClassName('post-'+num).item(0);
    var z = post_data.getElementsByTagName('img').item(0);
    z.style.display = "block";
    console.log(post_data);
    console.log(z);
    }



//load all posts data
function loadJSON(callback) {   

    var xobj = new XMLHttpRequest();
    xobj.overrideMimeType("application/json");
    xobj.open('GET', 'http://hometest.netshinobis.com/wp-json/wp/v2/posts', true); // Replace 'my_data' with the path to your file
    xobj.onreadystatechange = function () {
          if (xobj.readyState == 4 && xobj.status == "200") {
// Required use of an anonymous callback as .open will NOT return a value but simply returns undefined in asynchronous mode
            callback(xobj.responseText);
          }
    };
    xobj.send(null);  
}
function init() {
    loadJSON(function(response) {
// Parse JSON string into  object
    var actual_JSON = JSON.parse(response);
    console.log(actual_JSON);
    for(var i = 0 ; i<actual_JSON.length ; i++){
		var post_id = actual_JSON[i].id;
		isPrime(post_id);
	}
 });
}
init();
    </script>
	<?php wp_head(); ?>
</head>

<body id="<?php print get_stylesheet(); ?>" <?php body_class(); ?>>
	<?php do_action( 'body_top' ); ?>
	<a class="skip-content" href="#main"><?php esc_html_e( 'Skip to content', 'chosen' ); ?></a>
	<div id="overflow-container" class="overflow-container">
		<div id="max-width" class="max-width">
			<?php do_action( 'before_header' ); ?>
			<header class="site-header" id="site-header" role="banner">
				<div id="menu-primary-container" class="menu-primary-container">
					<?php get_template_part( 'menu', 'primary' ); ?>
					<?php get_template_part( 'content/search-bar' ); ?>
					<?php ct_chosen_social_icons_output(); ?>
				</div>
				<button id="toggle-navigation" class="toggle-navigation" name="toggle-navigation" aria-expanded="false">
					<span class="screen-reader-text"><?php echo esc_html_x( 'open menu', 'verb: open the menu', 'chosen' ); ?></span>
					<?php echo ct_chosen_svg_output( 'toggle-navigation' ); ?>
				</button>
				<div id="title-container" class="title-container">
					<?php get_template_part( 'logo' ) ?>
					<?php if ( get_bloginfo( 'description' ) ) {
						echo '<p class="tagline">' . esc_html( get_bloginfo( 'description' ) ) . '</p>';
					} ?>
				</div>
			</header>
			<?php do_action( 'after_header' ); ?>
			<section id="main" class="main" role="main">
				<?php do_action( 'main_top' );
				if ( function_exists( 'yoast_breadcrumb' ) ) {
					yoast_breadcrumb( '<p id="breadcrumbs">', '</p>' );
				}
