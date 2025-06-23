<?php

namespace BackendManager\includes;
interface DebtCollector {
	public function collector( float $owedAmount ): float;
}