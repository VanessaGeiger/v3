<?php
	
	// LDAP Authentifizierung
	function getActiveDirectoryAuthentification($username, $password) {
		$authenticated = false;
		$fullname = '';
		$mail = '';
		$telephoneNumber = '';
		$otherTelephone = '';
		$error = null;
	
		// mit AD-Server via LDAP verbinden
		$ad_server = 'ad.otterbach.de'; // 192.168.120.231
		$ldap_connection = ldap_connect($ad_server);
		

		if ($ldap_connection) {
			$ldap_bind = @ldap_bind($ldap_connection, $username, $password);
				var_dump($ldap_bind);
		exit;
			if ($ldap_bind) {
				// Paramter fuer LDAP-Suche auf AD festelgen
				$ldap_dn = 'cn=users,dc=ad,dc=otterbach,dc=de';
				$ldap_group = 'g-otterbach'; // Otterbach Gruppe
				$ldap_filter = '(&(objectClass=user)(sAMAccountName=' . $username . ')(memberOf=cn=' . $ldap_group . ',' . $ldap_dn . '))';
				$ldap_attributes = array('cn', 'mail', 'telephoneNumber', 'otherTelephone'); // Suche nach vollstaendigen Namen und E-Mail Adresse
	
				ldap_set_option($ldap_connection, LDAP_OPT_PROTOCOL_VERSION, 3);
				ldap_set_option($ldap_connection, LDAP_OPT_REFERRALS, false);
	
				$ldap_result = @ldap_search($ldap_connection, $ldap_dn, $ldap_filter, $ldap_attributes);
				if ($ldap_result) {
					$data = ldap_get_entries($ldap_connection, $ldap_result);
					if ( count($data) == 2 ) {
						$authenticated = true;
						
						if (isset($data[0]['cn'][0]) && !empty($data[0]['cn'][0])) {
							$fullname = $data[0]['cn'][0];
						}
						if (isset($data[0]['mail'][0]) && !empty($data[0]['mail'][0])) {
							$mail = $data[0]['mail'][0];
						}
						if (isset($data[0]['telephonenumber'][0]) && !empty($data[0]['telephonenumber'][0])) {
							$telephoneNumber = $data[0]['telephonenumber'][0];
						}
						if (isset($data[0]['othertelephone'][0]) && !empty($data[0]['othertelephone'][0])) {
							$otherTelephone = $data[0]['othertelephone'][0];
						}
					}
				} else {
					$error = 'Directory-Suche fehlgeschlagen';
				}
	
			}
			// LDAP Verbindung schliessen
			ldap_close($ldap_connection);
		} else {
			$error = 'Verbindung zum AD-Server fehlgeschlagen';
		}
	
		$result['authenticated'] = $authenticated;
		$result['fullname'] = $fullname;
		$result['mail'] = $mail;
		$result['telephoneNumber'] = $telephoneNumber;
		$result['otherTelephone'] = $otherTelephone;
		$result['error'] = $error;
	
		return $result;
	}

	//getActiveDirectoryAuthentification('f-gehringer','ba1aa552');
	getActiveDirectoryAuthentification('v.geiger','a5d968e6');
	
?>