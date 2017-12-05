<?php

function up($value) {
    return strtoupper($value);
}

function staticImage($filename) {
    return 'https://static.sander.borret.mtantwerp.eu/img/' . $filename;
}
