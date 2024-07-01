<?php
$GLOBALS[ 'author_array' ] = [ 'aberegovaya', 'admytrieva', 'akolesnyk', 'asmail', 'dnikitkina', 'esonin', 'vyaduta', 'vmazurenko', 'vzaitsev', 'seopro' ];

function filtering_author_post( $display_name ) {

  $isAuthorInArray = in_array( $display_name, $GLOBALS[ 'author_array' ] );

  if( $isAuthorInArray ) {
    $display_name = '';
  }

  return $display_name;

}
add_filter( 'the_author', 'filtering_author_post' );
?>