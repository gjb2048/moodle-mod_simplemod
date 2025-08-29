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
 * Defines the version and other meta-info about the plugin
 *
 * @package   mod_simplemod
 * @copyright 2019 Richard Jones richardnz@outlook.com.
 * @copyright 2022 G J Barnard - {@link https://moodle.org/user/profile.php?id=442195}.
 * @license   https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later.
 * @see       https://github.com/moodlehq/moodle-mod_simplemod
 * @see       https://github.com/justinhunt/moodle-mod_simplemod
 * @see       https://github.com/richardjonesnz/moodle-mod_simplemod
 * @see       https://github.com/gjb2048/moodle-mod_simplemod
 */

defined('MOODLE_INTERNAL') || die();

$plugin->component = 'mod_simplemod';
$plugin->version = 2025082500;
$plugin->requires = 2024100700.00; // 4.5 (Build: 20241007).
$plugin->supported = [405, 405];
$plugin->release = '405.1.0';
$plugin->maturity = MATURITY_STABLE;
