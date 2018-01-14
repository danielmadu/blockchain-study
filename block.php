<?php

/**
 * Block class
 */
class Block {
	public $index;
	public $previousHash;
	public $data;
	protected $timestamp;
	public $hash;

	/**
	 * construct method
	 */
	public function __construct($index = 0, $previousHash = null, $data = 'Genesis block') {
		$this->index = $index;
		$this->previousHash = $previousHash;
		$this->data = $data;
		$this->timestamp = time();
		$this->hash = $this->generateHash();
	}

	/**
	 * Generate a hash based on properties of the Block
	 */
	public function generateHash() {
		return hash('sha256', $this->index . $this->previousHash . json_encode($this->data) . $this->timestamp);
	}
}