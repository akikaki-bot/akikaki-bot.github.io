<?php
    /* NHKの地震情報をゴニョゴニョして貰う方法 by nirot1r */

    $imageBaseURL = "http://www3.nhk.or.jp/sokuho/jishin/"; /* 1 */

    $rawReportXML = mb_convert_encoding(file_get_contents("http://www3.nhk.or.jp/sokuho/jishin/data/JishinReport.xml"), "UTF-8", "SJIS"); /* 2 */

    /* 3 */
        $dump = explode("\n", $rawReportXML, 2);
        $rawReportXML = '<?xml version="1.0" encoding="UTF-8" ?>' . $dump[1];
        $xmlData = new SimpleXMLElement($rawReportXML);

    $latestItemURL = $xmlData->record[0]->item[0]["url"]; /* 4 */

    $rawLatestEarthquake = mb_convert_encoding(file_get_contents($latestItemURL), "UTF-8", "SJIS"); /* 5 */;

    /* 3 */
        $dump = explode("\n", $rawLatestEarthquake, 2);
        $rawLatestEarthquake = '<?xml version="1.0" encoding="UTF-8" ?>' . $dump[1];
        $earthquakeXMLData = new SimpleXMLElement($rawLatestEarthquake);

    $earthquake = $earthquakeXMLData->Earthquake; /* 6 */
?>
