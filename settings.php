<?php
// This file is part of Moodle - http://moodle.org/
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
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * Self enrolment plugin settings and presets.
 *
 * @package    enrol
 * @subpackage saml
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

if ($ADMIN->fulltree) {
    // General settings.
    $settings->add(
        new admin_setting_heading(
            'enrol_saml_settings',
            '',
            get_string('pluginname_desc', 'enrol_saml')
        )
    );

    // Enrol instance defaults.
    $settings->add(
        new admin_setting_heading(
            'enrol_saml_defaults',
            get_string('enrolinstancedefaults', 'admin'),
            get_string('enrolinstancedefaults_desc', 'admin')
        )
    );

    $settings->add(
        new admin_setting_configcheckbox(
            'enrol_saml/defaultenrol',
            get_string('defaultenrol', 'enrol'),
            get_string('defaultenrol_desc', 'enrol'),
            1
        )
    );

    $options = [
        ENROL_INSTANCE_ENABLED  => get_string('yes'),
        ENROL_INSTANCE_DISABLED => get_string('no')
    ];
    $settings->add(
        new admin_setting_configselect(
            'enrol_saml/status',
            get_string('status', 'enrol_saml'),
            get_string('status_desc', 'enrol_saml'),
            ENROL_INSTANCE_ENABLED,
            $options
        )
    );

    $title = get_string('logfile', 'enrol_saml');
    $description = get_string('logfile_description', 'enrol_saml');
    $default = '';
    $setting = new admin_setting_configtext('enrol_saml/logfile', $title, $description, $default, PARAM_RAW);
    $settings->add($setting);

    $settings->add(
        new admin_setting_configtext(
            'enrol_saml/enrolperiod',
            get_string('defaultperiod', 'enrol_saml'),
            get_string('defaultperiod_desc', 'enrol_saml'),
            0,
            PARAM_INT
        )
    );

    require_once($CFG->dirroot.'/enrol/saml/classes/admin_setting_configtext_enrol_trim.php');
    $title = get_string('group_prefix', 'enrol_saml');
    $description = get_string('group_prefix_description', 'enrol_saml');
    $default = '';
    $setting = new admin_setting_configtext_enrol_trim('enrol_saml/group_prefix', $title, $description, $default, PARAM_RAW);
    $settings->add($setting);

    $title = get_string('created_group_info', 'enrol_saml');
    $description = get_string('created_group_info_description', 'enrol_saml');
    $default = '';
    $setting = new admin_setting_configtextarea('enrol_saml/created_group_info', $title, $description, $default, PARAM_RAW);
    $settings->add($setting);

    if (!during_initial_install()) {
        $options = get_default_enrol_roles(context_system::instance());
        $student = get_archetype_roles('student');
        $student = reset($student);
        $settings->add(
            new admin_setting_configselect(
                'enrol_saml/roleid',
                get_string('defaultrole', 'role'),
                '',
                $student->id,
                $options
            )
        );
    }
}
