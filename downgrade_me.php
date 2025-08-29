<?php
// This file is part of Moodle - https://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <https://www.gnu.org/licenses/>.

/**
 * Simplemod module.
 *
 * @package   mod_simplemod
 * @copyright &copy; 2021-onwards G J Barnard.
 * @author    G J Barnard - {@link https://moodle.org/user/profile.php?id=442195}.
 * @license   https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later.
 */

require_once('../../config.php');
require_login();

if (is_siteadmin()) {
    $plugin = new stdClass;
    require_once($CFG->dirroot.'/mod/simplemod/version.php');
    set_config('allversionshash', '');
    $currentconfigversion = get_config('mod_simplemod', 'version');
    $currentversionversion = $plugin->version;
    $newversion = $plugin->version - 1;
    set_config('version', $newversion, 'mod_simplemod');
    echo 'Simplemod module downgraded to version: '.$newversion.' from config version '.$currentconfigversion.', version.php version '.$currentversionversion.'.';
}
