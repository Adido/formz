<div id="tv-wprops-form{$tv}"></div>
{literal}

<script type="text/javascript">
// <![CDATA[
var params = {
{/literal}{foreach from=$params key=k item=v name='p'}
 '{$k}': '{$v|escape:"javascript"}'{if NOT $smarty.foreach.p.last},{/if}
{/foreach}{literal}
};
var oc = {'change':{fn:function(){Ext.getCmp('modx-panel-tv').markDirty();},scope:this}};
MODx.load({
    xtype: 'panel'
    ,layout: 'form'
    ,autoHeight: true
    ,labelAlign: 'top'
    ,cls: 'form-with-labels'
    ,border: false
    ,items: [{{/literal}
        xtype: 'textfield' 
        ,fieldLabel: _('formz.output.properties.tpl')
        ,name: 'prop_tpl'
        ,value: params['tpl'] || ''
        ,listeners: oc
        ,anchor: '100%'
    },{
        xtype: 'textfield' 
        ,fieldLabel: _('formz.output.properties.fieldTpl')
        ,name: 'prop_fieldTpl'
        ,value: params['fieldTpl'] || ''
        ,listeners: oc
        ,anchor: '100%'
    },{
        xtype: 'textfield'
        ,fieldLabel: _('formz.output.properties.fieldTypeTpl')
        ,name: 'prop_fieldTypeTpl'
        ,value: params['fieldTypeTpl'] || ''
        ,listeners: oc
        ,anchor: '100%'
    },{
        xtype: 'textfield'
        ,fieldLabel: _('formz.output.properties.fieldWrapTpl')
        ,name: 'prop_fieldWrapTpl'
        ,value: params['fieldWrapTpl'] || ''
        ,listeners: oc
        ,anchor: '100%'
    },{
        xtype: 'textfield'
        ,fieldLabel: _('formz.output.properties.hookPrefix')
        ,name: 'prop_hookPrefix'
        ,value: params['hookPrefix'] || ''
        ,listeners: oc
        ,anchor: '100%'{literal}
    }]
    ,renderTo: 'tv-wprops-form{/literal}{$tv}{literal}'
});
// ]]>
</script>
{/literal}
