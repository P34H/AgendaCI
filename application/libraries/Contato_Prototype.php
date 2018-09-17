<?php
defined('BASEPATH') OR exit('No direct script access allowed');

abstract class Contato_Prototype {

	protected $title;
	//protected $topic;
	protected $name;
	protected $numero;
	protected $birthday;
	protected $date;
	abstract function __clone();

	function getName() {
		return $this->name;
	}
	function setTitle($nameIn) {
		$this->name = $nameIn;
	}
	function getNumero() {
		return $this->numero;
	}
	function setNumero($numeroIn) {
		$this->numero = $numeroIn;
	}
	function getBirthday() {
		return $this->birthday;
	}
	function setBirthday($birthdayIn) {
		$this->birthday = $birthdayIn;
	}
	function getDate() {
		return $this->Date;
	}
	function setDate($dateIn) {
		$this->date = $dateIn;
	}
	function getTitle() {
		return $this->title;
	}
}


