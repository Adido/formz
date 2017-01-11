<?php
/**
 * formz
 */
/**
 * Default English Lexicon Entries for formz
 *
 * @package formz
 * @subpackage lexicon
 */
$_lang['formz.menu'] = 'Formz Builder';
$_lang['formz.menu_desc'] = 'Manage Forms to use on the website.';
$_lang['formz.intro_msg'] = 'Manage your forms.';
$_lang['formz.form'] = 'Forms';
$_lang['formz.form.field'] = 'Fields';
$_lang['formz.form.default'] = 'Default';
$_lang['formz.form.properties'] = 'Properties';
$_lang['formz.form.field.desc'] = 'Add, Edit, Delete and Order fields in the Form. To order just click and drag each field grid. All Changes made in the Field tab are saved immediately.';
$_lang['formz.form.create'] = 'Create a new Form';
$_lang['formz.form.remove'] = 'Remove Form';
$_lang['formz.form.remove_confirm'] = 'Are you sure you want to remove this Form?';
$_lang['formz.form.update'] = 'Update Form';
$_lang['formz.form.has_submission'] = 'View Submission';
$_lang['formz.form.has_submissions'] = 'View Submissions';
$_lang['formz.form.export'] = 'Export Submissions';
$_lang['formz.form.submissions'] = 'Submissions';
$_lang['formz.form.submissions.desc'] = 'You can view and export data that was submitted to this Form.';

// Grid Headers
$_lang['formz.form.email'] = 'Recipient';
$_lang['formz.form.method'] = 'Method';

// Create/Edit
$_lang['formz.form.management'] = 'Form Builder';
$_lang['formz.form.create_edit_desc'] = 'Create and edit forms. Once you have created your form, you can add it to a page by adding the Template Variable to the page template, then select the form from the list.';
$_lang['formz.form.search'] = 'Search...';
$_lang['formz.form.general'] = 'General';
$_lang['formz.form.extra'] = 'Extra';
$_lang['formz.form.identifier'] = 'Identifier';
$_lang['formz.form.identifier_desc'] = 'The Identifier can be used as an ID on your form or a class when you are creating your form template. <em>default: form-[generated id]</em>';
$_lang['formz.form.success'] = 'Success Message';
$_lang['formz.form.method.dbonly'] = 'Save in the database';
$_lang['formz.form.method.dbandemail'] = 'Save in the database and send email';
$_lang['formz.form.recipient'] = 'Recipients';
$_lang['formz.form.properties'] = 'Properties';
$_lang['formz.form.properties_desc'] = 'Additional properties that a FormIt form can take, you can add multiple properties using the double pipe || <em>e.g.: &fiarTpl</em>';
$_lang['formz.form.hooks'] = 'Hooks';
$_lang['formz.form.hooks_desc'] = 'You can add additional hooks using comma-separator to call on your FormIt form. <em>e.g. redirect,spam</em>';
$_lang['formz.form.action_button'] = 'Action Button';
$_lang['formz.form.action_button_desc'] = 'The text that the form submit button should have written on it. <em>default: Submit</em>';

// Fields
$_lang['formz.field.name'] = 'Label';
$_lang['formz.field.help_text'] = 'Help Text';
$_lang['formz.field.type'] = 'Type';
$_lang['formz.field.values'] = 'Values';
$_lang['formz.field.default'] = 'Default Value';
$_lang['formz.field.validation'] = 'Validation';
$_lang['formz.field.required'] = 'Required';
$_lang['formz.field.email_tpl_tag'] = 'Email Template Tag';
$_lang['formz.field.error_message'] = 'Error Message';
$_lang['formz.field.cancel'] = 'Back to forms';

$_lang['formz.field.add'] = 'Add Field';
$_lang['formz.field.create'] = 'Create Field';
$_lang['formz.field.update'] = 'Update';
$_lang['formz.field.delete'] = 'Delete Field';
$_lang['formz.field.remove'] = 'Remove';
$_lang['formz.field.remove_confirm'] = 'Are you sure you want to remove this Form Field?';

$_lang['formz.submissions.removedata'] = 'Remove Submission';
$_lang['formz.submissions.view'] = 'View Details';
$_lang['formz.submissions.viewdata'] = 'Submission for: ';
$_lang['formz.submissions.remove'] = 'Remove Form Submission';
$_lang['formz.submissions.senton'] = 'Sent On';
$_lang['formz.submissions.ip_address'] = 'IP Address';
$_lang['formz.submissions.sender_info'] = 'Sender Information';
$_lang['formz.submissions.content'] = 'Content';
$_lang['formz.submissions.remove_confirm'] = 'Are you sure you want to remove this Form Submission?';

$_lang['formz.export'] = 'Export';
$_lang['formz.export.daterange'] = 'Date Range';
$_lang['formz.export.start_date'] = 'Start Date';
$_lang['formz.export.end_date'] = 'End Date';

// Validation
$_lang['formz.field.validation.required'] = 'This field is required.';

$_lang['formz.form_err_ae'] = 'A Form already exists with that name.';
$_lang['formz.form_err_nf'] = 'Form not found.';
$_lang['formz.form_err_ns'] = 'Form not specified.';
$_lang['formz.form_err_remove'] = 'An error occurred while trying to remove the Form.';
$_lang['formz.form_err_save'] = 'An error occurred while trying to save the Form.';

$_lang['formz.field_err_ae'] = 'A Form Field already exists with that name.';
$_lang['formz.field_err_nf'] = 'Form Field not found.';
$_lang['formz.field_err_ns'] = 'Form Field not specified.';
$_lang['formz.field_err_remove'] = 'An error occurred while trying to remove the Form Field.';
$_lang['formz.field_err_save'] = 'An error occurred while trying to save the Form Field.';
