(function($, undefined){

	sblp.SBLPView_Simple = sblp.SBLPView.extend({

		init: function($view){
			this._super($view, {
				source_list: 'label'
			});

			// initialize
			this.update();
		},

		update: function(){
			var view = this;

			view.$view.find("select.target option:selected").each(function(){
				//view.$view.find("div.sblp-autocomplete input[value="+$(this).val()+"]").attr("checked", "checked");
			});

/*
			var options = [];
			view.$view.find("select.target option").each(function(i) {
				options[i] = { name: $(this).text(), id: $(this).attr("value") };
			});
*/

/*
			view.$view.parents('.field-selectbox_link_plus').find("input.sblp-autocomplete").autocomplete(options, {
				multiple: true,
				matchContains: true,
				formatItem: function(row, i, max) {
					return row.name;
				},
				formatMatch: function(row, i, max) {
					return row.name;
				}
			}).result(function(event, data, formatted) {

					var option = view.$view.find("div.sblp-autocomplete input[value=" + data.id + "]");

					option.attr("checked", "checked");
					option.parent().parent().parent().show();

					view.$view.find("select.target option[value=" + data.id + "]").attr("selected", "selected");

					$(this).val("");
				});

			if( view.$view.data('multiple') ){
				// Load the sorting order-state:
				this.loadSorting();

				view.$view.find("div.sblp-autocomplete div.container").sortable({items: "label", update: function(){
					// Update the option list according to the div items:
					view.sortItems();
				}});

				view.$view.disableSelection();
			}
*/

		}

	})

})(jQuery);
