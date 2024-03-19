<?php

/**
 * This PHP code was authored by Alessandro Tieri.
 * Please contact Alessandro Tieri for any inquiries related to this code.
 *
 * @author Alessandro Tieri
 */

use App\Models\InstallationItem;
use App\Models\Order;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

/**
 * Determine and return the appropriate route based on the user's role.
 *
 * @return string The name of the route to redirect to.
 */
function homeRoute()
{
    $role = Auth::user()->getRoleName();

    if ($role === 'Amministratore') {
        return route('admin.home');
    }
    if ($role === 'Cliente') {
        return route('customer.home');
    }

    return route('admin.home');
}

/**
 * Determine if a section is active based on a list of section names.
 *
 * @param array<string, string> $list An array of section names to check for activity.
 * @param int $segment (Optional) An optional segment used to generate the section name.
 *
 * @return bool Returns true if any section in the list is active, false otherwise.
 */
function isSectionActive(array $list, $segment = 0): bool
{
    foreach ($list as $l) {
        if (Str::contains(appSectionName($segment), $l)) {
            return true;
        }
    }

    return false;
}

/**
 * Generate a user-readable application section name.
 *
 * @param int $segment (Optional) An optional segment used to generate the section name.
 *
 * @return string The user-readable section name.
 */
function userReadableAppSectionName($segment = 0): string
{
    $sectionName = appSectionName($segment);

    return $sectionName !== null ? Str::ucfirst(__('kanbanlogiq.' . $sectionName)) : '';
}

/**
 * Get the name of a specific segment from the request's URL segments.
 *
 * @param int $segment (Optional) The segment number to retrieve (default is 0).
 *
 * @return string|null The name of the specified segment or the previous segment if not found.
 */
function appSectionName($segment = 0): ?string
{
    return request()->segments()[$segment] ?? request()->segments()[$segment - 1];
}

/**
 * Generate a human-readable column label for CSV data.
 *
 * @param object $col The column data, which typically contains an 'id' attribute.
 *
 * @return string The human-readable column label.
 */
function replaceCsvCol(object $col)
{
    if (property_exists($col, 'id')) {
        $csvArray = trans('csv');
        if (is_array($csvArray) && array_key_exists($col->id, $csvArray)) {
            return Str::ucfirst(Str::replace('_', ' ', (string) $csvArray[$col->id]));
        }
        return Str::ucfirst(Str::replace('_', ' ', (string) $col->id));
    }

    return 'Colonna non valida. Contatta l\'amministratore di sistema.';
}

/**
 * Check if a value should be selected in a dropdown or selection input.
 *
 * @param string $val The value to check.
 * @param string $check The value to compare against.
 *
 * @return string Returns 'selected' if the values match (case-insensitively), or an empty string if not selected.
 */
function isSelectedOption($val, $check): string
{
    return Str::lower($val) === Str::lower($check) ? 'selected' : '';
}

/**
 * Calculate the percentage of a part in relation to a total.
 *
 * @param float $shipped The part to calculate the percentage for.
 * @param float $total The total from which to calculate the percentage.
 *
 * @return float The calculated percentage as a floating-point number.
 */
function asPercent($shipped, $total)
{
    if ($total === 0.0) {
        $total = 1.0;
    }

    return $shipped * 100 / $total;
}

/**
 * Determine the color class for a progression level based on a given percentage.
 *
 * @param int|float $percent The percentage of progression.
 *
 * @return string The CSS class name indicating the color for the progression level.
 */
function progressionLevelColor(int|float $percent): string
{
    if ($percent === 100.0) {
        return 'active bg-green';
    }

    if ($percent > 0.0) {
        return 'active bg-orange';
    }

    return 'active bg-red';
}

/**
 * Generate a progress bar indicating the fulfillment status of an order.
 *
 * @param Order $order The order object containing order items.
 *
 * @return string HTML representation of the progress bar.
 */
function getOrderProgressBar(Order $order): string
{
    $orderItems = $order->orderItems()->get();
    $total = 0.0;
    $shipped = 0.0;

    foreach ($orderItems as $orderItem) {
        $total += $orderItem->qta_vaschette;
        $shipped += $orderItem->qta_evasa;
    }

    $percent = $total > 0 ? asPercent($shipped, $total) : 0;

    $color = progressionLevelColor($percent);

    return '<div class="progress" title="Articoli evasi: ' . round($percent) . '%">
                <div class="progress-bar progress-bar-striped ' . $color . '" role="progressbar" aria-valuenow="' . ($percent === 0.0 ? 100.0 : $percent) . '"
                    aria-valuemin="0" aria-valuemax="100" style="width: ' . ($percent === 0.0 ? 100.0 : $percent) . '%">
                </div>
            </div>';
}

/**
 * Generate HTML representation of a "vaschetta" (tray) with a progress bar based on its type and status.
 *
 * @param InstallationItem $installationItem The "vaschetta" object containing type and status information.
 *
 * @return string HTML representation of the "vaschetta" with a progress bar.
 */
function getTray(InstallationItem $installationItem): string
{
    $tipo_vaschette = $installationItem->tipo_vaschette;
    $stato_vaschette = $installationItem->stato_vaschette;
    $barcode = $installationItem->barcodeForItem();

    $content = 'Stato Vaschetta: ';
    $percent = 100;

    if ($stato_vaschette === 0) {
        $content .= 'Vuota';
        $bg_color = 'bg-red';
    } else {
        $stato = $stato_vaschette;
        $totale = $installationItem->quantita;
        $percent = asPercent($stato, $totale);
        $content .= "{$stato}/{$totale} pz";
        $bg_color = 'bg-green';
    }

    $class = Str::lower($tipo_vaschette);

    return '<div class="vaschetta_' . $class . '" data-toggle="popover" data-trigger="hover" title="' . $barcode . '"
                 data-content="' . $content . '">
                 <div class="progress">
                     <div class="progress-bar progress-bar-striped active ' . $bg_color . '" role="progressbar"
                          aria-valuenow="' . $percent . '" aria-valuemin="0" aria-valuemax="100" style="width: ' . $percent . '%">
                     </div>
                 </div>
             </div>';
}
