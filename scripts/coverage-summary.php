<?php

$xml = new SimpleXMLElement(file_get_contents('coverage.xml'));

$metrics = $xml->project->metrics;

$totalElements = (int) $metrics['elements'];
$coveredElements = (int) $metrics['coveredelements'];

$coverage = ($totalElements > 0) ? ($coveredElements / $totalElements) * 100 : 0;

printf("Total Coverage: %.2f%%\n", $coverage);
