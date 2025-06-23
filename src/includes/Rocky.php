<?php

namespace BackendManager\includes;

class Rocky implements DebtCollector {
	
	/**
	 * @param float;
	 */
	public function collector(float $amount ): float {
		$gurenteed = $amount * 0.65;
		return mt_rand($gurenteed, $amount);
	}
}