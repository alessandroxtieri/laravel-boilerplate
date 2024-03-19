<?php

/**
 * This PHP code was authored by Alessandro Tieri.
 * Please contact Alessandro Tieri for any inquiries related to this code.
 *
 * @author Alessandro Tieri
 */

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

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
 * @param  array<string, string>  $list  An array of section names to check for activity.
 * @param  int  $segment  (Optional) An optional segment used to generate the section name.
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
 * @param  int  $segment  (Optional) An optional segment used to generate the section name.
 * @return string The user-readable section name.
 */
function userReadableAppSectionName($segment = 0): string
{
    $sectionName = appSectionName($segment);

    return $sectionName !== null ? Str::ucfirst(__('kanbanlogiq.'.$sectionName)) : '';
}

/**
 * Get the name of a specific segment from the request's URL segments.
 *
 * @param  int  $segment  (Optional) The segment number to retrieve (default is 0).
 * @return string|null The name of the specified segment or the previous segment if not found.
 */
function appSectionName($segment = 0): ?string
{
    return request()->segments()[$segment] ?? request()->segments()[$segment - 1];
}

/**
 * Check if a value should be selected in a dropdown or selection input.
 *
 * @param  string  $val  The value to check.
 * @param  string  $check  The value to compare against.
 * @return string Returns 'selected' if the values match (case-insensitively), or an empty string if not selected.
 */
function isSelectedOption($val, $check): string
{
    return Str::lower($val) === Str::lower($check) ? 'selected' : '';
}

/**
 * Calculate the percentage of a part in relation to a total.
 *
 * @param  float  $shipped  The part to calculate the percentage for.
 * @param  float  $total  The total from which to calculate the percentage.
 * @return float The calculated percentage as a floating-point number.
 */
function asPercent($shipped, $total)
{
    if ($total === 0.0) {
        $total = 1.0;
    }

    return $shipped * 100 / $total;
}
