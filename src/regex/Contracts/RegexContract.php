<?php

namespace RegEx\Contracts;


interface RegexContract
{

	public function __construct($re);

	public function test();

}