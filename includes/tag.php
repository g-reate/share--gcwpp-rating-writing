<?php

/*==================================================
  Shortcode
  ==================================================*/
function gcrw_rating_code( $post_id ) {
  global $post;

  $title_text = get_post_meta( get_the_ID(), '_t_t_key', true );

  $t_key_01 = get_post_meta( get_the_ID(), '_t_key_01', true );
  $t_key_02 = get_post_meta( get_the_ID(), '_t_key_02', true );
  $t_key_03 = get_post_meta( get_the_ID(), '_t_key_03', true );
  $t_key_04 = get_post_meta( get_the_ID(), '_t_key_04', true );
  $t_key_05 = get_post_meta( get_the_ID(), '_t_key_05', true );
  $t_key = array( $t_key_01, $t_key_02, $t_key_03, $t_key_04, $t_key_05 );

  $s_key_01 = get_post_meta( get_the_ID(), '_key_01', true );
  $s_key_02 = get_post_meta( get_the_ID(), '_key_02', true );
  $s_key_03 = get_post_meta( get_the_ID(), '_key_03', true );
  $s_key_04 = get_post_meta( get_the_ID(), '_key_04', true );
  $s_key_05 = get_post_meta( get_the_ID(), '_key_05', true );
  $s_key = array( $s_key_01, $s_key_02, $s_key_03, $s_key_04, $s_key_05 );

  $html = '';
  $i = 0;
  if( $t_key_01 && $s_key_01 ) {
    $html .= '<aside class="rating-writing">' . "\n";
    if( $title_text ) {
      $html .= '<h1 class="title-text">' . esc_html( $title_text ) . '</h1>' . "\n";
    }
    $html .= '<table class="rating-table">' . "\n";
    foreach( $t_key as $val ) {
      if( $t_key[$i] && $s_key[$i] ) {
        $html .= '<tr>' . "\n";
        $html .= '<th>' . esc_html( $t_key[$i] ) . '</th>' . "\n";
        $html .= '<td class="' . esc_attr( $s_key[$i] ) . '"><span class="rate"></span></td>' . "\n";
        $html .= '</tr>' . "\n";
        $i++;
      }
    }
    $html .= '</table>' . "\n";
    $html .= '</aside>' . "\n";
  }
  return $html;
}
add_shortcode( 'rating-writing', 'gcrw_rating_code' );

/*==================================================
  Quicktag
  ==================================================*/
function gcrw_quicktag() { 
?>
<script>
  QTags.addButton( 'rating-writing', 'rating-writing', '[rating-writing]', '', '', 'rating-writing', '150', '' );
</script>
<?php
}
add_action( 'admin_print_footer_scripts','gcrw_quicktag' );

//Visual Editor
$mybutton = new MceButton();
add_action( 'init',array( & $mybutton, 'MceButton' ) );

?>