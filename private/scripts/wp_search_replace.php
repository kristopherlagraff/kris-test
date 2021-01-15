<?php
echo "Replacing previous environment urls with new environment urls... \n";

if ( ! empty( $_ENV['PANTHEON_ENVIRONMENT'] ) ) {
  switch( $_ENV['PANTHEON_ENVIRONMENT'] ) {
    case 'live':
      passthru('wp search-replace "://dev-kris-test.pantheonsite.io" "://test-kris-test.pantheonsite.io" --all-tables ');
      break;
    case 'test':
      passthru('wp search-replace "://test-kris-test.pantheonsite.io" "://changed.com" --all-tables ');
      break;
  }
}
?>
