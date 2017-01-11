Formz.grid.Data = function(config) {
    config = config || {};
    Ext.applyIf(config,{
        id: 'formz-grid-forms'
        ,url: Formz.config.connector_url
        ,baseParams: {
            action: 'mgr/formz/data/getlist'
            ,formId: config.formId
        }
        ,fields: ['id','senton','ip_address','name','fields']
        ,autoHeight: true
        ,paging: true
        ,remoteSort: true
        ,columns: [{
            header: _('id')
            ,dataIndex: 'id'
            ,width: 10
        }, {
            header: _('formz.submissions.senton')
            ,dataIndex: 'senton'
            ,width: 160
        }, {
            header: _('formz.submissions.ip_address')
            ,dataIndex: 'ip_address'
            ,width: 50
        }, {
            header: '&#160;'
            ,renderer: function (v, md, rec) {
                return Formz.grid.btnRenderer({
                    items: [{
                        id: 'view-' + rec.id
                        ,fieldLabel: _('formz.submissions.view')
                        ,icon: 'fa-eye'
                        ,action: 'view'
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
    });
    Formz.grid.Data.superclass.constructor.call(this, config);

    // Attach click event on buttons
    this.on('click', this.onClick, this);
};
Ext.extend(Formz.grid.Data, MODx.grid.Grid, {
    windows: {}

    ,getMenu: function() {
        var m = [];

        m.push({
            text: _('formz.submissions.view')
            ,handler: this.viewData
        }, '-', {
            text: _('formz.submissions.removedata')
            ,handler: this.removeSpam
        });

        this.addContextMenuItem(m);
    }

    ,viewData: function (btn, e) {
        if (!this.menu.record || !this.menu.record.id) return false;
        var r = this.menu.record;
        var win = MODx.load({
            xtype: 'formz-window-view-data'
            ,record: r
            ,listeners: {
                'success': { fn: this.refresh, scope: this }
            }
        });

        win.show(e.target);
    }

    ,removeSpam: function(btn,e) {
        if (!this.menu.record) return false;

        MODx.msg.confirm({
            title: _('formz.submissions.remove')
            ,text: _('formz.submissions.remove_confirm')
            ,url: this.config.url
            ,params: {
                action: 'mgr/formz/data/remove'
                ,id: this.menu.record.id
            }
            ,listeners: {
                'success': { fn: function(r) { this.refresh(); }, scope: this }
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
                case 'view':
                    this.viewData('', e);
                    break;
                case 'remove':
                    this.removeSpam();
                    break;
            }
        }
    }
});
Ext.reg('formz-grid-data', Formz.grid.Data);

Formz.window.ViewData = function (config) {
    config = config || {};
    config.id = Ext.id();

    Ext.applyIf(config, {
        title: _('formz.submissions.viewdata') + config.record.name
        ,autoHeight: true
        ,closeAction: 'close'
        ,width: 540
        ,defaults: {
            border: false,
            autoHeight: true,
            bodyStyle: 'padding: 5px 8px 5px 5px;',
            layout: 'form',
            deferredRender: false,
            forceLayout: true
        }
        ,buttons: [{
            text: config.cancelBtnText || _('cancel')
            ,scope: this
            ,handler: function() { config.closeAction !== 'close' ? this.hide() : this.close(); }
        }]
        ,fields: [{
            title: _('formz.submissions.sender_info')
            ,layout: 'form'
            ,bodyCssClass: 'main-wrapper'
            ,autoHeight: true
            ,collapsible: true
            ,collapsed: false
            ,border: true
            ,hideMode: 'offsets'
            ,items: [{
                xtype: 'displayfield'
                ,fieldLabel: _('formz.submissions.senton')
                ,name: 'senton'
                ,grow: false
                ,anchor: '100%'
                ,value: config.record.senton
            }]
        }, {
            title: _('formz.submissions.content')
            ,layout: 'form'
            ,bodyCssClass: 'main-wrapper'
            ,autoHeight: true
            ,collapsible: false
            ,collapsed: false
            ,hideMode: 'offsets'
            ,items: [{
                xtype: 'displayfield'
                ,fieldLabel: _('formz.submissions.content')
                ,hideLabel: true
                ,name: 'fields'
                ,grow: true
                ,anchor: '100%'
                ,value: config.record.fields
            }]
        }]
    });
    Formz.window.ViewData.superclass.constructor.call(this, config);
};
Ext.extend(Formz.window.ViewData, MODx.Window);
Ext.reg('formz-window-view-data', Formz.window.ViewData);


Formz.window.ExportData = function (config) {
    config = config || {};
    config.id = Ext.id();

    Ext.applyIf(config, {
        title: _('formz.form.export')
        ,autoHeight: true
        ,closeAction: 'hide'
        ,width: 540
        ,url: Formz.config.connector_url
        ,baseParams: {
            action: 'mgr/formz/data/export'
            ,form_id: config.formId
        }
        ,defaults: {
            border: false,
            autoHeight: true,
            bodyStyle: 'padding: 5px 8px 5px 5px;',
            layout: 'form',
            deferredRender: false,
            forceLayout: true
        }
        ,buttons: [{
            text: config.cancelBtnText || _('cancel')
            ,scope: this
            ,handler: function() { config.closeAction !== 'close' ? this.hide() : this.close(); }
        }, '-', {
            text: _('formz.export')
            ,cls: 'trigger-action primary-button'
            ,handler: function (btn, e) {
                /**
                 * Create dummy form to trick
                 * Ext Ajax request for force file download
                 */
                if (!Ext.fly('frmDummy')) {
                    var frm = document.createElement('form');
                    frm.id = 'frmDummy';
                    frm.formId = config.formId;
                    frm.className = 'x-hidden';
                    document.body.appendChild(frm);
                }

                MODx.Ajax.request({
                    url: Formz.config.connector_url
                    ,params: {
                        action: 'mgr/formz/data/export'
                        ,formId: config.formId
                        ,startDate: Ext.getCmp('startDate').getValue()
                        ,endDate: Ext.getCmp('endDate').getValue()
                    }
                    ,form: Ext.fly('frmDummy')
                    ,isUpload: true
                    ,listeners: {
                        'success': { fn: function(r) {
                            //
                        }, scope: this }
                    }
                });
            }
        }]
        ,fields: [{
            title: _('formz.export.daterange')
            ,layout: 'column'
            ,bodyCssClass: 'main-wrapper'
            ,autoHeight: true
            ,collapsible: true
            ,collapsed: true
            ,border: true
            ,hideMode: 'offsets'
            ,defaults: {
                layout: 'form'
                ,border: false
            }
            ,items: [{
                columnWidth: .5
                ,items: [{
                    xtype: 'datefield'
                    ,fieldLabel: _('formz.export.start_date')
                    ,name: 'start_date'
                    ,id: 'startDate'
                    ,grow: false
                    ,anchor: '100%'
                }]
            }, {
                columnWidth: .5
                ,items: [{
                    xtype: 'datefield'
                    ,fieldLabel: _('formz.export.end_date')
                    ,name: 'end_date'
                    ,id: 'endDate'
                    ,grow: false
                    ,anchor: '100%'
                }]
            }]
        }]
    });
    Formz.window.ExportData.superclass.constructor.call(this, config);
};
Ext.extend(Formz.window.ExportData, MODx.Window);
Ext.reg('formz-window-export-data', Formz.window.ExportData);