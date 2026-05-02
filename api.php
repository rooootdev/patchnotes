<?php
$url = "https://support.apple.com/en-us/100100";
$cfile = "cache.html";
$ctime = 1800;

if (file_exists($cfile) && time() - filemtime($cfile) < $ctime) {
    $html = file_get_contents($cfile);
} else {
    $html = file_get_contents($url);
    file_put_contents($cfile, $html);
}

libxml_use_internal_errors(true);
$doc = new DOMDocument();
$doc->loadHTML($html);
libxml_clear_errors();

$xpath = new DOMXPath($doc);
$nodes = $xpath->query("//td[contains(@class,'gb-table-cell')]//a[contains(@class,'gb-anchor')]");
$results = [];

foreach ($nodes as $node) {
    $text = trim($node->textContent);

    if (preg_match('/^iOS\s+\d/', $text)) {
        preg_match('/iOS\s+([\d\.]+)/', $text, $iosmatch);
        preg_match('/iPadOS\s+([\d\.]+)/', $text, $ipadmatch);

        $ios = $iosmatch[1] ?? null;
        $ipad = $ipadmatch[1] ?? null;

        $results[] = [
            "text" => $text,
            "ios" => $ios,
            "ipad" => $ipad,
            "link" => "https://support.apple.com" . $node->getAttribute("href")
        ];
    }
}

$results = array_values(array_unique($results, SORT_REGULAR));

usort($results, function ($a, $b) {
    return version_compare($b['ios'], $a['ios']);
});

$latest = $results[0] ?? null;

if (isset($_GET['latest'])) {
    header("Content-Type: application/json");
    echo json_encode($latest, JSON_PRETTY_PRINT);
    exit;
}

if (isset($_GET['json'])) {
    header("Content-Type: application/json");
    echo json_encode($results, JSON_PRETTY_PRINT);
    exit;
}
