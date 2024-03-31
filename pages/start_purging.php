<?PHP
# MantisBT - A PHP based bugtracking system

# MantisBT is free software: you can redistribute it and/or modify
# it under the terms of the GNU General Public License as published by
# the Free Software Foundation, either version 2 of the License, or
# (at your option) any later version.
#
# MantisBT is distributed in the hope that it will be useful,
# but WITHOUT ANY WARRANTY; without even the implied warranty of
# MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
# GNU General Public License for more details.
#
# You should have received a copy of the GNU General Public License
# along with MantisBT.  If not, see <http://www.gnu.org/licenses/>.

/**
 * ZIP export page
 *
 * @package MantisBT
 * @copyright Copyright 2000 - 2002  Kenzaburo Ito - kenito@300baud.org
 * @copyright Copyright 2002  MantisBT Team - mantisbt-dev@lists.sourceforge.net
 * @link http://www.mantisbt.org
 *
 * @uses core.php
 * @uses authentication_api.php
 * @uses bug_api.php
 * @uses columns_api.php
 * @uses config_api.php
 * @uses excel_api.php
 * @uses file_api.php
 * @uses filter_api.php
 * @uses gpc_api.php
 * @uses helper_api.php
 * @uses print_api.php
 * @uses utility_api.php
 */
require_once( 'core.php' );
require_api( 'authentication_api.php' );
require_api( 'bug_api.php' );
require_api( 'columns_api.php' );
require_api( 'config_api.php' );
require_api( 'excel_api.php' );
require_api( 'file_api.php' );
require_api( 'filter_api.php' );
require_api( 'gpc_api.php' );
require_api( 'helper_api.php' );
require_api( 'print_api.php' );
require_api( 'utility_api.php' );
auth_ensure_user_authenticated();
$project_id		= helper_get_current_project();
$specific_where	= helper_project_specific_where( $project_id );
$t_status		= $_REQUEST['status'];
$t_purgedate 	= strtotime($_REQUEST['purge_date']);
// first get confirmation
helper_ensure_confirmed( lang_get( 'plugin_Purger_continue' ), lang_get( 'plugin_Purger_ok' ) );
// now let's do the actual purge of issues
$query = "select id from {bug} where $specific_where and status >= $t_status and last_updated <= $t_purgedate";
$result = db_query($query);
while ($row = db_fetch_array($result)) {
	$t_bug_id =  $row[ 'id' ];
	$t_data = array( 'query' => array( 'id' => $t_bug_id ) );
	$t_command = new IssueDeleteCommand( $t_data );
	$t_command->execute();
}

print_header_redirect( plugin_page( 'purge_issues',TRUE ) );