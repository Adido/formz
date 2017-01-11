Formz.panel.NewForm = function (config) {
	config = config || { record: {} };
	config.record = config.record || {};
	config.create_update = Ext.isEmpty(config.record.id) ? false : true;

	var tbs = [];

	tbs.push({
		title: _('formz.form.general')
		,id: 'formz_form_general'
		,defaults: {
			border: false
			,autoHeight: true
			,msgTarget: 'side'
		}
		,layout: 'form'
		,labelWidth: 80
		,items: [{
			html: '<p>' + _('formz.form.create_edit_desc') + '</p>'
			,bodyCssClass: 'panel-desc'
		}, {
			layout: 'form'
			,cls: 'main-wrapper'
			,border: false
			,defaults: {
				layout: 'form'
			}
			,items: [{
				xtype: 'textfield'
				,fieldLabel: _('name')
				,name: 'name'
				,anchor: '30%'
				,allowBlank: false
			}, {
				xtype: 'formz-combo-method'
				,fieldLabel: _('formz.form.method')
				,name: 'method'
				,anchor: '40%'
				,listeners: {
					scope: this
					,'beforerender': function () {
						if (!Ext.isEmpty(this.record)) {
							var recipientField = Ext.getCmp('formz-form-recipient'),
								rec = this.record.method;

							if (rec === 'database_email') {
								recipientField.show();
							}
						}
					}
					,'select': function (box, rec, index) {
						var recipientField = Ext.getCmp('formz-form-recipient');
						if (rec.id === 'database_email') {
							recipientField.show();
							recipientField.allowBlank = false;
						} else {
							recipientField.hide();
							recipientField.allowBlank = true;
						}
					}
				}
			}, {
				xtype: 'textfield'
				,id: 'formz-form-recipient'
				,hidden: true
				,fieldLabel: _('formz.form.recipient')
				,name: 'email'
				,anchor: '60%'
			}, {
				title: _('formz.form.success')
				,id: 'formz_form_success'
				,layout: 'form'
				,autoHeight: true
				,collapsible: true
				,hideMode: 'offsets'
				,items: [{
					xtype: 'textarea'
					,fieldLabel: _('formz.form.success')
					,hideLabel: true
					,name: 'success_message'
					,height: 180
					,grow: false
					,anchor: '100%'
					,allowBlank: false
				}]
			}]
		}]
	}, {
		title: _('formz.form.extra')
		,id: 'formz_form_extra'
		,defaults: {
			border: false
			,autoHeight: true
		}
		,layout: 'form'
		,labelWidth: 120
		,items: [{
			html: '<p>' + _('formz.form.identifier_desc') + '</p>'
			,bodyCssClass: 'panel-desc'
		}, {
			layout: 'form'
			,cls: 'main-wrapper'
			,border: false
			,anchor: '98%'
			,defaults: {
				layout: 'form'
			}
			,items: [{
				xtype: 'textfield'
				,fieldLabel: _('formz.form.identifier')
				,name: 'identifier'
				,value: ''
				,anchor: '40%'
				,allowBlank: true
			}]
		}, {
			html: '<p>' + _('formz.form.hooks_desc') + '</p>'
			,bodyCssClass: 'panel-desc'
		}, {
			layout: 'form'
			,cls: 'main-wrapper'
			,border: false
			,anchor: '98%'
			,defaults: {
				layout: 'form'
			}
			,items: [{
				xtype: 'textfield'
				,fieldLabel: _('formz.form.hooks')
				,name: 'hooks'
				,anchor: '40%'
			}]
		}, {
			html: '<p>' + _('formz.form.properties_desc') + '</p>'
			,bodyCssClass: 'panel-desc'
		}, {
			layout: 'form'
			,cls: 'main-wrapper'
			,border: false
			,anchor: '98%'
			,defaults: {
				layout: 'form'
			}
			,items: [{
				xtype: 'textfield'
				,fieldLabel: _('formz.form.properties')
				,name: 'properties'
				,anchor: '40%'
			}]
		}, {
			html: '<p>' + _('formz.form.action_button_desc') + '</p>'
			,bodyCssClass: 'panel-desc'
		}, {
			layout: 'form'
			,cls: 'main-wrapper'
			,border: false
			,anchor: '98%'
			,defaults: {
				layout: 'form'
			}
			,items: [{
				xtype: 'textfield'
				,fieldLabel: _('formz.form.action_button')
				,name: 'action_button'
				,anchor: '40%'
			}]
		}]
	});

	if (config.create_update) {
		// Add the fields tab before extra
		tbs.splice(1, 0, {
			title: _('formz.form.field')
            ,layout: 'form'
            ,defaults: { border: false ,msgTarget: 'side' }
			,items: [{
				html: '<p>' + _('formz.form.field.desc') + '</p>'
				,border: false
				,bodyCssClass: 'panel-desc'
			}, {
				xtype: 'formz-grid-fields'
				,cls: 'main-wrapper'
				,preventRender: true
				,anchor: '100%'
				,form_id: config.record.id
			}]
		});
	}

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
		}, MODx.getPageStructure(tbs)]
		,listeners: {
			'setup': { fn: this.setup, scope: this }
			,'success': { fn: this.success, scope: this }
		}
	});
	Formz.panel.NewForm.superclass.constructor.call(this, config);
};
Ext.extend(Formz.panel.NewForm, MODx.FormPanel, {
	initialized: false
	,setup: function () {
		if (this.initialized) {
			this.clearDirty();
			return true;
		}
		this.getForm().setValues(this.config.record);

		this.fireEvent('ready', this.config.record);
		this.clearDirty();
		this.initialized = true;
		MODx.fireEvent('ready');
		return true;
	}
	,success: function (r) {
		if (!this.config.create_update) {
        	var r = r.result.object;
        	window.location.href = '?a=' + MODx.action['formz:index'] + '&action=update&id=' + r.id;
        }
	}
});
Ext.reg('formz-panel-new-form', Formz.panel.NewForm);

Formz.combo.Method = function(config) {
	config = config || {};
	Ext.applyIf(config, {
		name: 'method'
		,triggerAction: 'all'
    	,lazyRender: true
		,hiddenName: 'method'
		,mode: 'local'
		,store: new Ext.data.ArrayStore({
	        id: 0
	        ,fields: [
	            'id',
	            'name'
	        ]
	        ,data: [['database', _('formz.form.method.dbonly')], ['database_email', _('formz.form.method.dbandemail')]]
	    })
		,displayField: 'name'
		,valueField: 'id'
		,fields: ['id', 'name']
		,editable: false
		,value: 'database'
	});
	Formz.combo.Method.superclass.constructor.call(this, config);
};
Ext.extend(Formz.combo.Method, Ext.form.ComboBox);
Ext.reg('formz-combo-method', Formz.combo.Method);
