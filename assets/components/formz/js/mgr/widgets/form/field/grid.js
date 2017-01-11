Formz.grid.Fields = function(config) {
    config = config || {};

    Ext.applyIf(config, {
        id: 'formz-grid-fields'
        ,url: Formz.config.connector_url
        ,baseParams: {
			action: 'mgr/formz/field/getList'
			,form_id: config.form_id
		}
        ,fields: [
            'id',
            'type',
            'label',
            'help_text',
            'required',
            'default',
            'values',
            'validation',
            'val_error_message',
            'error_message'
        ]
        ,paging: true
        ,remoteSort: false
        ,ddGroup: 'ddGrid' + config.form_id
        ,enableDragDrop: true
        ,save_action: 'mgr/formz/field/updateFromGrid'
        ,autosave: true
        ,columns: [{
			header: _('id')
			,dataIndex: 'id'
			,sortable: false
            ,hidden: true
			,width: 5
		}, {
			header: _('formz.field.type')
			,dataIndex: 'type'
			,sortable: false
            ,width: 15
		}, {
			header: _('formz.field.name')
			,dataIndex: 'label'
			,sortable: false
			,editor: { xtype: 'textfield' }
		}, {
			header: _('formz.field.required')
			,dataIndex: 'required'
			,sortable: false
            ,width: 20
			,editor: { xtype: 'modx-combo-boolean', renderer: 'boolean' }
		}, {
			header: _('formz.field.email_tpl_tag')
			,dataIndex: ''
			,sortable: false
            ,width: 25
            ,renderer: function(val, metaData, record) {
                return '[[+field' + record.get('id') + ']]';
            }
		}, {
            header: '&#160;'
            ,width: 20
            ,renderer: function (v, md, rec) {
                return Formz.grid.btnRenderer({
                    items: [{
                        id: 'update-' + rec.id
                        ,fieldLabel: _('formz.field.update')
                        ,icon: 'pencil-square-o'
                        ,action: 'update'
                    }]
                }) +
                Formz.grid.btnRenderer({
                    items: [{
                        id: 'remove-' + rec.id
                        ,fieldLabel: _('formz.field.remove')
                        ,icon: 'trash-o'
                        ,action: 'remove'
                    }]
                });
            }
        }]
        ,tbar: ['->', {
            text: _('formz.field.add')
            ,handler: {
            	xtype: 'formz-window-field-update'
            	,form_id: config.form_id
            	,blankValues: true
            }
        }]
    });
    Formz.grid.Fields.superclass.constructor.call(this, config);

    // Reorder by Drag and Drop
    this.on('render', this.dragAndDrop, this);

    // Attach click event on buttons
    this.on('click', this.onClick, this);
};
Ext.extend(Formz.grid.Fields, MODx.grid.Grid, {
    getMenu: function (grid, rowIndex, e) {
        return [{
            text: _('formz.field.update')
            ,handler: this.updateField
        }, '-', {
            text: _('formz.field.remove')
            ,handler: this.removeField
        }];
    }
	,updateField: function (btn, e) {
		if (!this.updateFieldWindow) {
			this.updateFieldWindow = MODx.load({
				xtype: 'formz-window-field-update'
				,record: this.menu.record
				,form_id: this.config.form_id
				,listeners: {
					'success': { fn: this.refresh, scope: this }
				}
			});
		}
		this.updateFieldWindow.setValues(this.menu.record);
		this.updateFieldWindow.show(e.target);
	}
    ,removeField: function () {
        MODx.msg.confirm({
            title: _('formz.field.remove')
            ,text: _('formz.field.remove_confirm')
            ,url: this.config.url
            ,params: {
                action: 'mgr/formz/field/remove'
                ,id: this.menu.record.id
            }
            ,listeners: {
                'success': { fn: this.refresh, scope: this }
            }
        });
    }
    ,onClick: function(e){
        var t = e.getTarget();
        var elm = t.className.split(' ')[0];
        if (elm == 'action_icon') {
            var action = t.getAttribute('data-action');
            var record = this.getSelectionModel().getSelected();
            this.menu.record = record.data;
            switch (action) {
                case 'update':
                    this.updateField('', e);
                break;
                case 'remove':
                    this.removeField();
                break;
            }
        }
    }
    ,dragAndDrop: function (grid) {
    	var that = this,
            ddrow = new Ext.dd.DropTarget(grid.container, {
    		ddGroup: 'ddGrid' + this.config.form_id
    		,copy: false
    		,notifyDrop: function (dd, e, data) {
    			var ds = grid.store,
                    sm = grid.getSelectionModel(),
    				rows = sm.getSelections();

    			if (dd.getDragData(e)) {
    				var cindex = dd.getDragData(e).rowIndex;
    				for (var i = 0; i < rows.length; i++) {
                        rowData = ds.getById(rows[i].id);
    					if (!this.copy) {
                            ds.remove(ds.getById(rows[i].id));
                            ds.insert(cindex, rowData);
    					}
    				};
                }

                var d = ds.data.items,
                    data,
                    fieldOrder = [];

                for (var i = 0; i < d.length; i++) {
                    data = d[i].data;
                    data['order'] = i;

                    fieldOrder.push(data);
                };

                MODx.Ajax.request({
                    url: Formz.config.connector_url
                    ,params: {
                        action: that.config.save_action + 'Order'
                        ,data: Ext.util.JSON.encode(fieldOrder)
                    }
                });
    		}
    	});
    }
});
Ext.reg('formz-grid-fields', Formz.grid.Fields);

Formz.window.UpdateField = function (config) {
	config = config || {};
    config.id = Ext.id();
	create_update = Ext.isEmpty(config.record.id) ? 'create' : 'update';

	Ext.applyIf(config, {
		title: _('formz.field.' + create_update)
		,url: Formz.config.connector_url
		,baseParams: {
			action: 'mgr/formz/field/' + create_update
			,form_id: config.form_id
		}
        ,buttons: [{
            text: config.cancelBtnText || _('cancel')
            ,scope: this
            ,handler: function() { config.closeAction !== 'close' ? this.hide() : this.close(); }
        },{
            text: config.saveBtnText || _('save')
            ,cls: 'trigger-action primary-button'
            ,scope: this
            ,handler: this.submit
        }]
        ,autoHeight: true
		,fields: [{
            xtype: 'modx-tabs',
            autoHeight: true,
            deferredRender: false,
            forceLayout: true,
            border: true,
            defaults: {
                border: false,
                autoHeight: true,
                bodyStyle: 'padding: 5px;',
                layout: 'form',
                deferredRender: false,
                forceLayout: true
            },
            items: [{
            	title: _('formz.form.default')
            	,layout: 'form'
            	,items: [{
					xtype: 'hidden'
					,name: 'id'
				}, {
                    xtype: 'textfield'
                    ,fieldLabel: _('formz.field.name')
                    ,name: 'label'
                    ,anchor: '100%'
                }, {
                    xtype: 'textarea'
                    ,fieldLabel: _('formz.field.help_text')
                    ,name: 'help_text'
                    ,anchor: '100%'
                }, {
					xtype: 'formz-combo-types'
                    ,id: 'formz-field-types-' + config.id
					,fieldLabel: _('formz.field.type')
					,name: 'type'
					,anchor: '100%'
					,hiddenName: 'type'
					,value: 'text'
					,listeners: {
                        'select': { fn: this.fieldSets, scope: this }
						,'render': { fn: this.fieldSets, scope: this }
					}
				}, {
                    xtype: 'textfield'
                    ,id: 'formz-field-values-' + config.id
                    ,fieldLabel: _('formz.field.values')
                    ,name: 'values'
                    ,anchor: '100%'
                    ,hidden: true
                }]
            }, {
            	title: _('formz.form.properties')
            	,layout: 'form'
            	,items: [{
            		xtype: 'textfield'
            		,fieldLabel: _('formz.field.default')
            		,name: 'default'
            		,anchor: '100%'
            	}, {
            		xtype: 'checkbox'
            		,fieldLabel: _('formz.field.required')
            		,name: 'required'
            		,anchor: '100%'
                    ,listeners: {
                        'check': { fn: this.requiredFieldMsg, scope: this }
                    }
            	}, {
            		xtype: 'textfield'
                    ,id: 'formz-field-req_error_message-' + config.id
            		,fieldLabel: _('formz.field.error_message')
            		,name: 'error_message'
            		,anchor: '100%'
                    ,hidden: true
            	}, {
                    xtype: 'formz-combo-validation'
                    ,id: 'formz-field-validation-' + config.id
                    ,fieldLabel: _('formz.field.validation')
                    ,name: 'validation'
                    ,hiddenName: 'validation'
                    ,anchor: '100%'
                    ,hidden: true
                    ,listeners: {
                        'select': { fn: this.validationFieldMsg, scope: this }
                        ,'render': { fn: this.validationFieldMsg, scope: this }
                    }
                }, {
                    xtype: 'textfield'
                    ,id: 'formz-field-val_error_message-' + config.id
                    ,fieldLabel: _('formz.field.error_message')
                    ,name: 'val_error_message'
                    ,anchor: '100%'
                    ,hidden: true
                }]
            }]
		}]
	});
	Formz.window.UpdateField.superclass.constructor.call(this, config);


    /**
     * When form shows set the values field state (show/hide)
     * and set the validation message field state (show/hide)
     */
    this.on('show', function () {
        var typeField = Ext.getCmp('formz-field-types-' + config.id);
        var validationField = Ext.getCmp('formz-field-validation-' + config.id);
        this.fieldSets(typeField);
        this.validationFieldMsg(validationField);
    });
};
Ext.extend(Formz.window.UpdateField, MODx.Window, {
	fieldSets: function (field, record, i) {
        var valueField = Ext.getCmp('formz-field-values-' + this.config.id);
        var validationField = Ext.getCmp('formz-field-validation-' + this.config.id);

		switch (field.value) {
			case 'select':
			case 'checkbox':
			case 'radio':
                valueField.show();
                validationField.hide();
			break;
			default:
				// textbox, textarea
                valueField.hide();
                validationField.show();
		}
	}
    ,validationFieldMsg: function (field, record, i) {
        var valueField = Ext.getCmp('formz-field-val_error_message-' + this.config.id);
        if (field.value) {
            valueField.show();
        } else {
            valueField.hide();
        }
    }
    ,requiredFieldMsg: function (field, checked) {
        var valueField = Ext.getCmp('formz-field-req_error_message-' + this.config.id);
        if (checked) {
            valueField.show();
        } else {
            valueField.hide();
        }
    }
});
Ext.reg('formz-window-field-update', Formz.window.UpdateField);

Formz.combo.Types = function (config) {
	config = config || {};
	Ext.applyIf(config, {
		title: _('formz.field.type')
		,typeAhead: true
    	,triggerAction: 'all'
    	,lazyRender: true
		,mode: 'local'
		,store: new Ext.data.ArrayStore({
	        id: 0,
	        fields: [
	            'id',
	            'name'
	        ],
	        data: [
	        	['text', 'Textbox'],
	        	['textarea', 'Textarea'],
	        	['select', 'Select'],
	        	['checkbox', 'Checkbox'],
	        	['radio', 'Radio Button']
	        ]
	    })
	    ,valueField: 'id'
    	,displayField: 'name'
	});
	Formz.combo.Types.superclass.constructor.call(this, config);
};
Ext.extend(Formz.combo.Types, Ext.form.ComboBox);
Ext.reg('formz-combo-types', Formz.combo.Types);

Formz.combo.Validation = function (config) {
    config = config || {};
    Ext.applyIf(config, {
        title: _('formz.field.validation')
        ,typeAhead: true
        ,triggerAction: 'all'
        ,lazyRender: true
        ,mode: 'local'
        ,store: new Ext.data.ArrayStore({
            id: 0,
            fields: [
                'id',
                'name'
            ],
            data: [
                ['', 'None'],
                ['email', 'Email'],
                ['isNumber', 'Number']
            ]
        })
        ,valueField: 'id'
        ,displayField: 'name'
    });
    Formz.combo.Validation.superclass.constructor.call(this, config);
};
Ext.extend(Formz.combo.Validation, Ext.form.ComboBox);
Ext.reg('formz-combo-validation', Formz.combo.Validation);
