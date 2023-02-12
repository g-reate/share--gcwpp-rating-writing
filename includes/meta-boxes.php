<?php

function gcrw_meta_box() {
  $screens = array( 'post', 'page' );
  $screens = apply_filters( 'gcrw_filter_screens', $screens );
  add_meta_box( 'rating', __( 'Rating-Writing', 'gcrw' ), 'gcrw_meta_box_html', $screens, 'normal', 'high' );
}

function gcrw_meta_box_html() {
  global $post;
  wp_nonce_field( wp_create_nonce( __FILE__ ), 'gcrw_nonce' );
  $title_text = get_post_meta( sanitize_text_field( $_GET['post'] ), '_t_t_key' );
  $box = new MetaBox( '_t_key_00', 't_id_00', '_key_00', 'id_00', 'c_id_00', 'stars.png', 'stars_00', 'rating_01' );
  echo "\n" . '<div id="rating-writing">' . "\n";
  echo '<h3 id="rating-title">' . __( 'rating title', 'gcrw' );
  echo '&nbsp;<input id="title-text" class="title-text" name="_t_t_key" size="40" type="text" value="' . esc_attr( $title_text[0] ) . '" />';
  echo '</h3>' . "\n";
  echo '<ul id="inner-meta">' . "\n";
  echo $box -> getBox();
  echo '</ul>' . "\n";
  echo '</div>' . "\n";
}
add_action('admin_head', 'gcrw_meta_box');

function gcrw_save_custom_field_postdata( $post_id ) {
  global $post;
  $nonce = sanitize_text_field( $_POST['gcrw_nonce'] );
  $gcrw_nonce = isset( $nonce ) ? $nonce : null;
  if( ! wp_verify_nonce( $gcrw_nonce, wp_create_nonce( __FILE__ ) ) ) {
    return $post_id;
  }

  $titledata = sanitize_text_field( $_POST[ '_t_t_key' ] );
  if( "" === get_post_meta( $post_id, '_t_t_key' ) ) {
    add_post_meta( $post_id, _t_t_key, $titledata, true );
  }
  elseif( $titledata != get_post_meta( $post_id, '_t_t_key' ) ) {
    update_post_meta( $post_id, '_t_t_key', $titledata );
  }
  elseif( "" === $titledata ) {
    delete_post_meta( $post_id, '_t_t_key' );
  }

  $i = 0;
  while( $i < 10 ) {
    if( $i === 0 ) {
      $boxdata_01 = '';
      $boxdata = $boxdata_01;
      $save_key = '_t_key_01';
    } elseif( $i === 1 ) {
      $boxdata_02 = '';
      $boxdata = $boxdata_02;
      $save_key = '_t_key_02';
    } elseif( $i === 2 ) {
      $boxdata_03 = '';
      $boxdata = $boxdata_03;
      $save_key = '_t_key_03';
    } elseif( $i === 3 ) {
      $boxdata_04 = '';
      $boxdata = $boxdata_04;
      $save_key = '_t_key_04';
    } elseif( $i === 4 ) {
      $boxdata_05 = '';
      $boxdata = $boxdata_05;
      $save_key = '_t_key_05';
    } elseif( $i === 5 ) {
      $boxdata_06 = '';
      $boxdata = $boxdata_06;
      $save_key = '_key_01';
    } elseif( $i === 6 ) {
      $boxdata_07 = '';
      $boxdata = $boxdata_07;
      $save_key = '_key_02';
    } elseif( $i === 7 ) {
      $boxdata_08 = '';
      $boxdata = $boxdata_08;
      $save_key = '_key_03';
    } elseif( $i === 8 ) {
      $boxdata_09 = '';
      $boxdata = $boxdata_09;
      $save_key = '_key_04';
    } elseif( $i === 9 ) {
      $boxdata_10 = '';
      $boxdata = $boxdata_10;
      $save_key = '_key_05';
    }
    if( isset( $_POST[ $save_key ] ) ) {
      $boxdata = sanitize_text_field( $_POST[ $save_key ] );
    }
    if( "" === get_post_meta( $post_id, $save_key ) ) {
      add_post_meta( $post_id, $save_key, $boxdata, true );
    }
    elseif( $boxdata != get_post_meta( $post_id, $save_key ) ) {
      update_post_meta( $post_id, $save_key, $boxdata );
    }
    elseif( "" === $boxdata ) {
      delete_post_meta( $post_id, $save_key );
    }
    $i++;
  }
}
add_action( 'save_post', 'gcrw_save_custom_field_postdata' );

?>