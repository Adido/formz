Formz.panel.FormData = function (config) {
	config = config || { formId: '' };

	Ext.applyIf(config, {
		title: _('formz.form')
		,url: Formz.config.connector_url
		,baseParams: {}
		,border: false
		,cls: 'container form-with-labels'
		,items: [{
			html: '<h2>' + _('formz.menu') + '</h2>'
            ,cls: 'modx-page-header'
			,border: false
		}, MODx.getPageStructure({
			title: _('formz.form.submissions')
            ,layout: 'form'
            ,defaults: { border: false ,msgTarget: 'side' }
			,items: [{
				html: '<p>' + _('formz.form.submissions.desc') + '</p>'
				,border: false
				,bodyCssClass: 'panel-desc'
			}, {
				xtype: 'formz-grid-data'
				,cls: 'main-wrapper'
				,preventRender: true
				,anchor: '100%'
				,formId: config.formId
			}]
		})]
	});
	Formz.panel.FormData.superclass.constructor.call(this, config);
};
Ext.extend(Formz.panel.FormData, MODx.FormPanel);
Ext.reg('formz-panel-form-data', Formz.panel.FormData);
