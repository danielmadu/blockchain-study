<?php

/**
 * Blockchain class
 */
class Blockchain {
	public $blocks = [];
	public $index;
	/**
	 * construct method
	 */
	public function __construct() {
		$this->blocks[] = new Block();
		$this->index = 1;
	}

	/**
	 * return last Block added
	 */
	public function getLastBlock() {
		return $this->blocks[count($this->blocks) - 1];
	}

	/**
	 * Add a new Block
	 */
	public function addBlock($data) {
		$previousHash = $this->getLastBlock()->hash;
		$block = new Block($this->index, $previousHash, $data);
		$this->index++;
		$this->blocks[] = $block;
	}

	/**
	 * Verify if is the Blockchai is valid
	 */
	public function isValid() {
		for ($i = 1; $i < count($this->blocks); $i++) {
			$currentBlock = $this->blocks[$i];
			$previousBlock = $this->blocks[$i - 1];

			if ($currentBlock->hash !== $currentBlock->generateHash()) {
				return false;
			}

			if ($currentBlock->index !== $previousBlock->index + 1) {
				return false;
			}

			if ($currentBlock->previousHash !== $previousBlock->hash) {
				return false;
			}
		}

		return true;
	}
}
