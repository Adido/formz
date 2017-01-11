Formz.panel.Home = function(config) {
    config = config || {};
    Ext.applyIf(config,{
        cls: 'container'
        ,defaults: { collapsible: false ,autoHeight: true }
        ,items: [{
            html: '<h2>'+_('formz.menu')+'</h2>'
            ,border: false
            ,cls: 'modx-page-header'
        },MODx.getPageStructure([{
            title: _('formz.form')
            ,layout: 'form'
            ,defaults: { border: false ,msgTarget: 'side' }
            ,items: [{
                html: '<p>'+_('formz.intro_msg')+'</p>'
                ,bodyCssClass: 'panel-desc'
                ,border: false
            }, {
                xtype: 'formz-grid-forms'
                ,cls:'main-wrapper'
                ,preventRender: true
            }]
        }])]
    });
    Formz.panel.Home.superclass.constructor.call(this,config);
};
Ext.extend(Formz.panel.Home,MODx.FormPanel);
Ext.reg('formz-panel-home',Formz.panel.Home);