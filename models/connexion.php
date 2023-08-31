<?php

function getConnexion()
{
    return new PDO("mysql:host=localhost; dbname=numerica; charset=utf8", "root", "");
}