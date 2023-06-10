<?php
// Check if cURL extension is enabled
if (extension_loaded('curl')) {
    echo "cURL is enabled";
} else {
    echo "cURL is not enabled";
}
?>