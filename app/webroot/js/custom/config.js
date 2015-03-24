var HOST = window.location.hostname;

switch(HOST){
	case "localhost":
		var config = {
			'path': window.location.protocol + '//' + window.location.hostname + '/rr-events',
			'globalpath': window.location.protocol + '//' + window.location.hostname + '/rr-events/events',
			'category': window.location.protocol + '//' + window.location.hostname + '/rr-events/categories',
			'user': window.location.protocol + '//' + window.location.hostname + '/rr-events/users'
		};
	break;
	case "citybuzz.iab.app42paas.com":
		var config = {
			'path': window.location.protocol + '//' + window.location.hostname,
			'globalpath': window.location.protocol + '//' + window.location.hostname + '/events',
			'category': window.location.protocol + '//' + window.location.hostname + '/categories',
			'user': window.location.protocol + '//' + window.location.hostname + '/users'
		};
	break;
	default:
		var config = {
			'path': window.location.protocol + '//' + window.location.hostname + '/rr-events',
			'globalpath': window.location.protocol + '//' + window.location.hostname + '/rr-events/events',
			'category': window.location.protocol + '//' + window.location.hostname + '/rr-events/categories',
			'user': window.location.protocol + '//' + window.location.hostname + '/rr-events/users'
		};
	break;
}

