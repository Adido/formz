##Formz Builder User Interface

The User Interface (UI) of Formz should be easy to use and follow. Inside of 
the UI we tried to keep action names as user friendly as possible so that even 
a beginner can start using the system from as early as possible.

##Formz Template Variable

In the Formz Template Variable you could set a few Output Options. They all 
change the output of the Formz Snippet `fmzForms` called in the template 
variable output. The following Output Options change the the following Snippet 
Properties.

Output Option | fmzForms Snippet Property
------------|------------
Form Template | tpl
Form Field Template | fieldTpl
Form Field Types Template | fieldTypesTpl
Form Field Wrapper Template | fieldWrapTpl

##Formz Snippet

This is what make creating frontend forms with Formz so easy, the main Formz 
Snippet `fmzForms` ties in all the code for the frontend form using 
[FormIt](http://modx.com/extras/package/formit) and 
[FormItFastPack](http://modx.com/extras/package/formitfastpack).

The Snippet work behind the scenes when you are using the formz output type in 
your Template Variable. You can use the Formz Snippet `fmzForms` directly by 
adding it in the template you have attached your Formz Template Variable to. If 
you decide to use the Formz Snippet `fmzForms` inside of your template, make 
sure you change the Template Variable output type to `default`.

The default Formz Snippet call should look like this:

```
[[!fmzForms?
&id=`[[*formz]]`
]]
```

`[[*formz]]` has to be replaced with the name of your Formz TV, this is the 
only required parameter you need to pass to the Formz Snippet `fmzForms`.

The following properties could be set in the snippet call[^1]:

Property | Description | Default
---------|-------------|--------
id | Form ID | -
tpl | Name of the chunk containing the Formz form template. | formTpl
fieldTpl | Name of the chunk containing the Formz field template. | fieldTpl
fieldTypesTpl | Name of the chunk containing the Formz field types template (see tpl property in [FormitFastPack Field Snippet](https://rtfm.modx.com/extras/revo/formitfastpack/formitfastpack.field)). | -
fieldWrapTpl | Name of the chunk containing the Formz field wrapper template (see outer_tpl property in [FormitFastPack Field Snippet](https://rtfm.modx.com/extras/revo/formitfastpack/formitfastpack.field)). | -
hookPrefix | Prefix of the FormIt hooks called by Formz. | fmzForm_

[^1]: See Formz Hooks

You have to duplicate and change the default Formz chunks `emailTpl`, 
`fieldTpl` and `formTpl`, if you want to set your own options to the `FormIt` 
and the `field` snippet calls created with Formz.

##Formz Hooks

There are two Formz Hooks available to be called by FormIt. Depending on the 
Formz form method the following hooks `fmzForm_database` or 
`fmzForm_database_email` are called after a successful form submit. With the 
`hookPrefix` property `fmzForms` could call hooks with a differen prefix (i.e. 
if you need to write your own hooks, since the default hooks are overwritten, 
when the package is updated.

The `fmzForm_database_email` hook could use the following properties[^2]:

Property | Description | Default
---------|-------------|--------
excludeFields | Comma separated list of fields that are not saved in the database | -
emailFrom | The from address for the sent email. | System Setting `emailsender`
emailTo | A comma-separated list of emails to send to. | -
emailReplyTo | An email to set as the reply-to. | -
emailTpl | Name of the chunk containing the Formz email template. | emailTpl
senderName | The from name for the sent email. | Form Name[^3]
subject | The subject of the email. | Website Contact Form on %Y-%m-%d
mandrillApiUsername | The Mandrill API username[^4]. | -
mandrillApiKey | The Mandrill API key[^4]. | -

[^2]: You could change these properties in the `formTpl` chunk and in the Template Variable Output Options.
[^3]: The Form Name is set in the Formz Builder User Interface
[^4]: If `mandrillApiUsername` and `mandrillApiKey` are set, the Mail is sent with the Mandrill service