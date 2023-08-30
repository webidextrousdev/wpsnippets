<?php
/**
 * Disable XMLRPC
 */

add_filter('xmlrpc_enabled', '__return_false');