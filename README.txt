SAML Enrollment for Moodle
-------------------------------------------------------------------------------
license: http://www.gnu.org/copyleft/gpl.html GNU Public License

Changes:
- 2010-11    : Created by Yaco Sistemas.
- 2019       : Updated to work with new version of moodle 3.5 (with new version ofmoodle-saml/auth)

Requirements:
- SimpleSAML (http://rnd.feide.no/simplesamlphp). Tested with version > 1.7
- SAML Authentication for Moodle module

This plugin require a simplesamlphp instance configured as SP
(http://simplesamlphp.org/docs/trunk/simplesamlphp-sp)

It works with 3.4 and 3.5.

Install instructions:

Check moodle_enrol_saml.txt


Important for enrollment!!
==========================

This plugin suppose that the IdP send the courses data of the user in a attribute that
can be configured but the pattern of the expected data is always: 
<course_id>:<period>:<role>:<status>
You can change this pattern editing the file auth/saml/course_mapping.php
