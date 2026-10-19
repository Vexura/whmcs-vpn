<?php
declare(strict_types=1);
if (!defined('WHMCS')) { exit('Direct access is not permitted.'); }
require_once __DIR__.'/bootstrap.php';
use Vexura\Whmcs\Vpn\Module;
use Vexura\Whmcs\Vpn\Registrar;
use Vexura\Whmcs\Vpn\Automation;

add_hook('InvoiceCreated', 1, static function (array $vars): void { Automation::snapshot('vpn', (int) $vars['invoiceid']); });
add_hook('InvoicePaid', 1, static function (array $vars): void { Automation::paid('vpn', (int) $vars['invoiceid']); });
add_hook('AfterCronJob', 1, static function (array $vars): void { Automation::cron('vpn'); });
