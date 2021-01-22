<?php
echo "List users on test site... \n";

if ( ! empty( $_ENV['PANTHEON_ENVIRONMENT'] ) ) {
  switch( $_ENV['PANTHEON_ENVIRONMENT'] ) {
    case 'test':
      passthru('wp user list ');
      break;
  }
}
?>

