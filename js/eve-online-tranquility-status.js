jQuery(document).ready(function($) {
	// setup websocket with callbacks
	var ws = new ReconnectingWebSocket('wss://zkillboard.com:2096/', '', {
		maxReconnectAttempts: 15
	});

	ws.onmessage = function (event) {
		wslog(event.data);
	};

	function wslog(msg) {
		if(msg === 'ping' || msg === 'pong') {
			return;
		}

		json = JSON.parse(msg);

		if(json.action === 'tqStatus') {
			tqStatus = json.tqStatus;
			tqCount = json.tqCount;

			if(tqStatus === 'OFFLINE') {
				html = '<span class="tq-status-red">' + tqCount.replace(',', '.') + " capsuleers online</span>";
			} else {
				html = '<span class="tq-status-green">' + tqCount.replace(',', '.') + " capsuleers online</span>";
			}

			$('.tq-status').html(html);
			$('.last-hour').text(json.kills);
		} else if(json.action === 'reload') {
			setTimeout("location.reload();", (Math.random() * 150000));
		}
	}
});
