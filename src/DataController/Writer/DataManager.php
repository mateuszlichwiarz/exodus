<?php

namespace App\DataController\Writer;

abstract class DataManager
{
    abstract public function setArray($array): array;

    abstract public function getUserEncoder(): UserEncoder;

    abstract public function getUserDecoder(): UserDecoder;

    /*
    abstract public function loadValue();
    abstract public function getHeader();
    abstract public function getType();
    abstract public function getItem();
    abstract public function install();
    abstract public function make(int $flag_int): Encoder;
    */

    //zbudowanie writera dla zapisywania danych w różnych formatach
    //w tym dla sql i jego pochodnych
    //nie wiem po co
    //dla beki

    //dla usera to robie, żeby móc na szybko budować baze danych nawet w txt;
    //xml

    //najlepiej bedzie --type:item--
    //ale to w przypadku najmniej rozbudowanych systemów
    //w innych może być trochę inaczej

}