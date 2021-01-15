<?php
echo "Replacing previous environment urls with new environment urls... \n";

if ( ! empty( $_ENV['PANTHEON_ENVIRONMENT'] ) ) {
  switch( $_ENV['PANTHEON_ENVIRONMENT'] ) {
    case 'live':
      passthru('wp search-replace "https://dev-kris-test.pantheonsite.io" "http://test-kris-test.pantheonsite.io" --all-tables ');
      break;
    case 'test':
      passthru('wp search-replace "http://test-kris-test.pantheonsite.io" ":http://changed.pantheonsite.io" --all-tables ');
      break;
  }
}
?>
