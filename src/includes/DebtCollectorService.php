<?php

namespace BackendManager\includes;

class DebtCollectorService {
	/**
	 * @param Rocky();
	 */
	public function collectDebts( DebtCollector $collector ) {
		$owedAmout     = mt_rand( 100, 1000 );
		$collectAmount = $collector->collector( $owedAmout );
		return "Collected $" . $collectAmount . " debts $owedAmout.\n";
	}
}