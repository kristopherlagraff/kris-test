<?php
echo "Replacing previous environment urls with new environment urls... \n";

if ( ! empty( $_ENV['PANTHEON_ENVIRONMENT'] ) ) {
  switch( $_ENV['PANTHEON_ENVIRONMENT'] ) {
    case 'test':
      passthru('wp search-replace "://test-kris-test.pantheonsite.io" "://changed.pantheonsite.io" --all-tables ');
      break;
  }
}
?>

