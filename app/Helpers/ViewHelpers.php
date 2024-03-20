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

    return $sectionName !== null ? Str::ucfirst(__('boilerplate.'.$sectionName)) : '';
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
