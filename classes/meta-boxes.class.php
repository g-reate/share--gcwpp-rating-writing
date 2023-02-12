<?php

if ( ! class_exists( 'MetaBox' ) ) {
  class MetaBox {
    private $_text_key;
    private $_text_id;
    private $_key;
    private $_id;
    private $_clear_id;
    private $_img_file;
    private $_stars;
    private $_rating;

    public function __construct( $args ) {
      $args = func_get_args();
      list( $text_key, $text_id, $key, $id, $clear_id, $img_file, $stars, $rating ) = $args;
      $this -> _text_key = $text_key;
      $this -> _text_id = $text_id;
      $this -> _key = $key;
      $this -> _id = $id;
      $this -> _clear_id = $clear_id;
      $this -> _img_file = $img_file;
      $this -> _stars = $stars;
      $this -> _rating = $rating;
    }

    public function setBox() {
      $getpost = sanitize_text_field( $_GET['post'] );
      $text_01 = get_post_meta( $getpost, '_t_key_01' );
      $text_02 = get_post_meta( $getpost, '_t_key_02' );
      $text_03 = get_post_meta( $getpost, '_t_key_03' );
      $text_04 = get_post_meta( $getpost, '_t_key_04' );
      $text_05 = get_post_meta( $getpost, '_t_key_05' );
      $text = array( $text_01, $text_02, $text_03, $text_04, $text_05 );
      $checked_01 = get_post_meta( $getpost, '_key_01' );
      $checked_02 = get_post_meta( $getpost, '_key_02' );
      $checked_03 = get_post_meta( $getpost, '_key_03' );
      $checked_04 = get_post_meta( $getpost, '_key_04' );
      $checked_05 = get_post_meta( $getpost, '_key_05' );
      $checked = array( $checked_01, $checked_02, $checked_03, $checked_04, $checked_05 );
      $this -> _key = array( '_key_01', '_key_02', '_key_03', '_key_04', '_key_05' );
      $item_num = '1';
      $stars_num = 'a';
      $i = 0;
      foreach( $checked as $checked_num ) {
        if( $i === 0 ) {
          $num = 0;
        } elseif( $i === 1 ) {
          $num = 1;
        } elseif( $i === 2 ) {
          $num = 2;
        } elseif( $i === 3 ) {
          $num = 3;
        } elseif( $i === 4 ) {
          $num = 4;
        }
        echo '<li>' . "\n";
        echo '<h4>' . __( 'rating item', 'gcrw' ) . $item_num++ . ' <input id="' . esc_attr( ++$this -> _text_id ) . '" class="' . esc_attr( $this -> _text_id ) . '" name="' . esc_attr( ++$this -> _text_key ) . '" type="text" value="' . esc_attr( $text[$num][0] ) . '" /></h4>' . "\n";
        echo '<fieldset class="rating clearfix">' . "\n";
        foreach( $this -> _key as $key_num ) {
          echo '<input id="' . esc_attr( ++$this -> _id ) . '" class="stars" name="' . esc_attr( $this -> _key[$num] ) . '" type="radio" value="' . esc_attr( ++$this -> _stars ) . '"';
          if( $checked[$num][0] === $this -> _stars ) echo ' checked = "checked"';
          echo ' />' . "\n" . '<label class="' . esc_attr( $this -> _rating++ ) . ' stars" for="' . esc_attr( $this -> _id ) . '">stars-' . $stars_num++ . '</label>' . "\n";
        }
        echo '</fieldset>' . "\n";
        echo '<fieldset class="clear">' . "\n";
        echo '<input id="' . esc_attr( ++$this -> _clear_id ) . '" class="' . esc_attr( $this -> _clear_id ) . '" name="' . esc_attr( $this -> _key[$num] ) . '" type="radio" value="" />' . "\n";
        echo '<label class="clear-button" for="' . esc_attr( $this -> _clear_id ) . '">clear</label>' . "\n";
        echo '</fieldset>' . "\n";
        echo '</li>' . "\n";
        $i++;
      }
    }

    public function getBox() {
      return $this -> setBox();
    }
  }
}

if ( ! class_exists( 'MceButton' ) ) {
  class MceButton {
    function MceButton() {
      add_action( 'init', array( & $this, 'addbuttons' ) );
    }
    function sink_hooks(){
      add_filter( 'mce_plugins', array( & $this, 'mce_plugins' ) );
    }

    function addbuttons() {
      if( ! current_user_can( 'edit_posts' ) && ! current_user_can( 'edit_pages' ) )
        return;
      if ( get_user_option( 'rich_editing' ) === 'true' ) {
        add_filter( "mce_external_plugins", array( & $this, 'mce_external_plugins' ) );
        add_filter( 'mce_buttons', array( & $this, 'mce_buttons' ) );
      }
    }
      
    function mce_buttons( $buttons ) {
      array_push( $buttons, "separator", "rating-writing" );
      return $buttons;
    }
      
    function mce_external_plugins( $plugin_array ) {
      $plugin_array['newButtons'] = GCRW_PLUGIN_URL . '/js/editor_plugin.js';
      return $plugin_array;
    }
  }
}

?>