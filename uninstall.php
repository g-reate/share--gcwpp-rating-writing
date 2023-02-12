<?php

if( ! defined( 'WP_UNINSTALL_PLUGIN' ) )
  exit();

function gcrw_delete_plugin() {
  global $wpdb;
  $meta_keys = array(
    '_t_t_key',
    '_t_key_01',
    '_t_key_02',
    '_t_key_03',
    '_t_key_04',
    '_t_key_05',
    '_key_01',
    '_key_02',
    '_key_03',
    '_key_04',
    '_key_05',
  );
  foreach( $meta_keys as $key ) {
    delete_post_meta_by_key( $key );
    /******** Other code ********/
    //$wpdb -> delete( $wpdb -> postmeta, array( 'meta_key' => $key ), array( '%s' ) );
  }
}

gcrw_delete_plugin();

?>