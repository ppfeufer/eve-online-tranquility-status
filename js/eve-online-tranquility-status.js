/* global tqStatusL10n, ReconnectingWebSocket */

jQuery(document).ready(function($) {
	// setup websocket with callbacks
	var ws = new ReconnectingWebSocket('wss://zkillboard.com:2096/', '', {
		maxReconnectAttempts: 15
	});

	/**
	 * wslog
	 *
	 * @param {type} msg
	 * @returns {undefined}
	 */
	function wslog(msg) {
		if(msg === 'ping' || msg === 'pong') {
			return;
		} // END if(msg === 'ping' || msg === 'pong')

		var json = JSON.parse(msg);

		if(json.action === 'tqStatus') {
//			var tqStatus = json.tqStatus;
			var tqCount = json.tqCount;

//			if(tqStatus === 'OFFLINE') {
//				html = tqCount.replace(',', '.') + ' capsuleers online';
//			} else {
//				html = tqCount.replace(',', '.') + ' capsuleers online';
//			} // END if(tqStatus === 'OFFLINE')

			var html = tqCount.replace(',', '.') + ' ' + tqStatusL10n.online;

			$('.tq-status').html(html);
			$('.last-hour').text(json.kills);
		} else if(json.action === 'reload') {
			setTimeout('location.reload();', (Math.random() * 150000));
		} // END if(json.action === 'tqStatus')
	} // END function wslog(msg)

	ws.onmessage = function(event) {
		wslog(event.data);
	};
});
