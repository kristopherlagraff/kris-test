<?php
echo "Replacing previous environment urls with new environment urls... \n";

if ( ! empty( $_ENV['PANTHEON_ENVIRONMENT'] ) ) {
  switch( $_ENV['PANTHEON_ENVIRONMENT'] ) {
    case 'test':
      passthru('wp search-replace "http://test-kris-test.pantheonsite.io" "http://changed.pantheonsite.io" --all-tables ');
      break;
  }
}
?>
