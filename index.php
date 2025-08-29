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
 * Prints a list of module instances
 *
 * @package   mod_simplemod
 * @copyright 2019 Richard Jones richardnz@outlook.com.
 * @license   https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later.
 * @see       https://github.com/moodlehq/moodle-mod_simplemod
 * @see       https://github.com/justinhunt/moodle-mod_simplemod
 */

require_once('../../config.php');
require_once($CFG->dirroot.'/mod/simplemod/lib.php');

$id = required_param('id', PARAM_INT); // Course.

$course = $DB->get_record('course', ['id' => $id], '*', MUST_EXIST);

require_course_login($course);

$params = [
    'context' => context_course::instance($course->id),
];

$strname = get_string('modulenameplural', 'mod_simplemod');
$PAGE->set_url('/mod/simplemod/index.php', ['id' => $id]);
$PAGE->navbar->add($strname);
$PAGE->set_title("$course->shortname: $strname");
$PAGE->set_heading($course->fullname);
$PAGE->set_pagelayout('incourse');

echo $OUTPUT->header();
echo $OUTPUT->heading($strname);

if (!$simplemods = get_all_instances_in_course('simplemod', $course)) {
    notice(get_string('nosimplemods', 'simplemod'), new moodle_url('/course/view.php', ['id' => $course->id]));
}

$usesections = course_format_uses_sections($course->format);

$table = new html_table();
$table->attributes['class'] = 'generaltable mod_index';

if ($usesections) {
    $strsectionname = get_string('sectionname', 'format_'.$course->format);
    $table->head  = [$strsectionname, $strname];
    $table->align = ['center', 'left'];
} else {
    $table->head  = [$strname];
    $table->align = ['left'];
}

$modinfo = get_fast_modinfo($course);
$currentsection = '';
foreach ($modinfo->instances['simplemod'] as $cm) {
    $row = [];
    if ($usesections) {
        if ($cm->sectionnum !== $currentsection) {
            if ($cm->sectionnum) {
                $row[] = get_section_name($course, $cm->sectionnum);
            }
            if ($currentsection !== '') {
                $table->data[] = 'hr';
            }
            $currentsection = $cm->sectionnum;
        }
    }

    $class = $cm->visible ? null : ['class' => 'dimmed'];

    $row[] = html_writer::link(new moodle_url('view.php', ['id' => $cm->id]),
        $cm->get_formatted_name(), $class);
    $table->data[] = $row;
}

echo html_writer::table($table);

echo $OUTPUT->footer();
