<?php
/**
 * Serves a file with a custom MIME type header.
 *
 * @param string $file - Absolute path to a file.
 * @param string $mimeType - Mime Type to serve with file. (default='text/plain')
 * @param int $cacheTime - Cache control time. (default=3600)
 */

function serveFileCustomMIMEType($file, $mimeType = 'json', $cacheTime = 3600) {
  if (file_exists($file)) {

    $fileName = sprintf('"%s"', addcslashes(basename($file), '"\\'));
    $modified = gmdate ('D, d M Y H:i:s', filemtime($file)) . ' GMT';
    $size = filesize($file);

    header('Content-Description: File Transfer');
    header('Content-Type: ' . $mimeType);
    header('Content-Disposition: attachment; filename=' . $fileName);
    header('Content-Transfer-Encoding: binary');
    header('Cache-Control: public, max-age=' . $cacheTime);
    header('Last-Modified: ' . $modified);
    header('Content-Length: ' .$size);

    readfile($file);
    exit;
  }

  if (!file_exists($file)) {
    return "File not found";
  }
}

serveFileCustomMIMEType(".well-known/apple-app-site-association", "apple-test");
