<?php
declare(strict_types=1);
if (!defined('WHMCS')) { exit('Direct access is not permitted.'); }
require_once __DIR__.'/bootstrap.php';
use Vexura\Whmcs\Vpn\Module;
use Vexura\Whmcs\Vpn\Registrar;
use Vexura\Whmcs\Vpn\Automation;

/** VPN: WHMCS MetaData callback. */
function vexuravpn_MetaData(): array
{
    return ['DisplayName' => 'Vexura · VPN', 'APIVersion' => '1.1', 'RequiresServer' => true, 'DefaultSSLPort' => 443];
}

/** VPN: WHMCS ConfigOptions callback. */
function vexuravpn_ConfigOptions(): array
{
    return Module::config('vpn');
}

/** VPN: WHMCS TestConnection callback. */
function vexuravpn_TestConnection(array $params): array
{
    return Module::connection($params);
}

/** VPN: WHMCS ClientArea callback. */
function vexuravpn_ClientArea(array $params): array
{
    return Module::clientArea('vpn', $params);
}

/** VPN: WHMCS AdminCustomButtonArray callback. */
function vexuravpn_AdminCustomButtonArray(): array
{
    return ['Bereitstellung prüfen' => 'RefreshStatus', 'Bezahlte Rechnungen abgleichen' => 'SyncPaidInvoices'];
}

/** VPN: WHMCS CreateAccount callback. */
function vexuravpn_CreateAccount(array $params): string
{
    return Module::run('vpn', 'create', $params);
}

/** VPN: WHMCS RefreshStatus callback. */
function vexuravpn_RefreshStatus(array $params): string
{
    return Module::run('vpn', 'create', $params);
}

/** VPN: WHMCS SyncPaidInvoices callback. */
function vexuravpn_SyncPaidInvoices(array $params): string
{
    return Module::run('vpn', 'sync', $params);
}

/** VPN: WHMCS TerminateAccount callback. */
function vexuravpn_TerminateAccount(array $params): string
{
    return Module::run('vpn', 'terminate', $params);
}

/** VPN: WHMCS SuspendAccount callback. */
function vexuravpn_SuspendAccount(array $params): string
{
    return Module::run('vpn', 'suspend', $params);
}

/** VPN: WHMCS UnsuspendAccount callback. */
function vexuravpn_UnsuspendAccount(array $params): string
{
    return Module::run('vpn', 'unsuspend', $params);
}
