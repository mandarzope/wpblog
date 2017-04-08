(function() {
	tinymce.create('tinymce.plugins.arvi', {
		init : function(ed, url) {
			ed.addCommand('InsertCustomBlockQuote', function() {
				ed.execCommand('mceInsertContent', false, '<hr />');
			});
			ed.addButton('blockquotearvi', {
				icon: 'blockquote',
				tooltip: 'BlockQuote Twitter',
				cmd: 'InsertCustomBlockQuote'
			});
		},
		createControl : function(n, cm) {
			return null;
		},
		getInfo : function() {
			return {
				longname : 'Arvi Buttons',
				author : 'Mandar',
				authorurl : '',
				infourl : '',
				version : "0.1"
			};
		}
		
	});

	tinymce.PluginManager.add( 'arvi', tinymce.plugins.arvi );
})();
