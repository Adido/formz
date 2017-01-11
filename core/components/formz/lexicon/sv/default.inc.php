<?php
/**
 * formz
 */
/**
 * Default Swedish Lexicon Entries for formz
 *
 * @package formz
 * @subpackage lexicon
 */
$_lang['formz.menu'] = 'Formz Builder';
$_lang['formz.menu_desc'] = 'Hantera formulär för användning på webbsidan.';
$_lang['formz.intro_msg'] = 'Hantera dina formulär.';
$_lang['formz.form'] = 'Formulär';
$_lang['formz.form.field'] = 'Fält';
$_lang['formz.form.default'] = 'Standard';
$_lang['formz.form.properties'] = 'Egenskaper';
$_lang['formz.form.field.desc'] = 'Lägg till, Redigera, Ta bort och Ordna fält i formuläret. För att ordna, klicka och dra respektive fältrutnät. Alla ändringar gjorda i fliken Fält sparas automatiskt.';
$_lang['formz.form.create'] = 'Skapa nytt formulär';
$_lang['formz.form.remove'] = 'Ta bort formulär';
$_lang['formz.form.remove_confirm'] = 'Är du säker att du vill ta bort detta formulär?';
$_lang['formz.form.update'] = 'Uppdatera formulär';
$_lang['formz.form.has_submission'] = 'Visa inskickat formulär';
$_lang['formz.form.has_submissions'] = 'Visa inskickade formulär';
$_lang['formz.form.export'] = 'Exportera inskickad data';
$_lang['formz.form.submissions'] = 'Inskickade formulär';
$_lang['formz.form.submissions.desc'] = 'Du kan visa och exportera datat som skickades genom detta formulär.';

// Grid Headers
$_lang['formz.form.email'] = 'Mottagare';
$_lang['formz.form.method'] = 'Metod';

// Create/Edit
$_lang['formz.form.management'] = 'Formulärbyggare';
$_lang['formz.form.create_edit_desc'] = 'Skapa och redigera formulär. När du har skapat ditt formulär kan du lägga till det på en sida genom att lägga till Mallvariabeln till sidans mall och sedan välja formuläret ur listan.';
$_lang['formz.form.search'] = 'Sök...';
$_lang['formz.form.general'] = 'Allmänt';
$_lang['formz.form.extra'] = 'Extra';
$_lang['formz.form.identifier'] = 'Identifierare';
$_lang['formz.form.identifier_desc'] = 'Identifieraren kan användas som ett ID för ditt formulär eller en klass när di skapar formulärets mall. <em>standard: form-[genererat id]</em>';
$_lang['formz.form.success'] = 'Framgångsmeddelande';
$_lang['formz.form.method.dbonly'] = 'Spara i databasen';
$_lang['formz.form.method.dbandemail'] = 'Spara i database och skicka e-post';
$_lang['formz.form.recipient'] = 'Mottagare';
$_lang['formz.form.properties'] = 'Egenskaper';
$_lang['formz.form.properties_desc'] = 'Ytterligare egenskaper som ett FormIt formulär kan ha, du kan lägga till multipla egenskaper genom att separera dem med || <em>ex.: &fiarTpl</em>';
$_lang['formz.form.redirect_to'] = 'Omdirigera till';
$_lang['formz.form.redirect_to_desc'] = 'ID för resursen man skall omdirigeras till <em>standard: [[*id]]</em>';
$_lang['formz.form.action_button'] = 'Åtgärdsknapp';
$_lang['formz.form.action_button_desc'] = 'Text som formulärets submit knapp skall ha. <em>standard: Submit</em>';

// Fields
$_lang['formz.field.name'] = 'Etikett';
$_lang['formz.field.help_text'] = 'Ytterligare Text';
$_lang['formz.field.type'] = 'Typ';
$_lang['formz.field.values'] = 'Värden';
$_lang['formz.field.default'] = 'Standardvärde';
$_lang['formz.field.validation'] = 'Validering';
$_lang['formz.field.required'] = 'Obligatoriskt';
$_lang['formz.field.email_tpl_tag'] = 'E-post malltagg';
$_lang['formz.field.error_message'] = 'Felmeddelande';
$_lang['formz.field.cancel'] = 'Tillbaka till formulären';

$_lang['formz.field.add'] = 'Lägg till fält';
$_lang['formz.field.create'] = 'Skapa fält';
$_lang['formz.field.update'] = 'Uppdatera fält';
$_lang['formz.field.delete'] = 'Ta bort fält';
$_lang['formz.field.remove'] = 'Ta bort formulärfält';
$_lang['formz.field.remove_confirm'] = 'Är du säker att du vill ta bort detta formulärfält?';

$_lang['formz.submissions.removedata'] = 'Ta bort inskickad data';
$_lang['formz.submissions.view'] = 'Visa detaljer';
$_lang['formz.submissions.viewdata'] = 'Inskickad data för: ';
$_lang['formz.submissions.remove'] = 'Ta bort inskickat formulär';
$_lang['formz.submissions.senton'] = 'Skickat den';
$_lang['formz.submissions.ip_address'] = 'IP-adress';
$_lang['formz.submissions.sender_info'] = 'Avsändarinformation';
$_lang['formz.submissions.content'] = 'Innehåll';
$_lang['formz.submissions.remove_confirm'] = 'Är du säker att du vill ta bort detta formulär data?';

$_lang['formz.export'] = 'Exportera';
$_lang['formz.export.daterange'] = 'Datumintervall';
$_lang['formz.export.start_date'] = 'Startdatum';
$_lang['formz.export.end_date'] = 'Slutdatum';

// Validation
$_lang['formz.field.validation.required'] = 'Detta fält är obligatoriskt.';

$_lang['formz.form_err_ae'] = 'Ett formulär existerar redan med det här namnet.';
$_lang['formz.form_err_nf'] = 'Formuläret hittades inte.';
$_lang['formz.form_err_ns'] = 'Formulär ej angivet.';
$_lang['formz.form_err_remove'] = 'Ett fel uppstod när formuläret skulle tas bort.';
$_lang['formz.form_err_save'] = 'Ett fel uppstod när formuläret skulle sparas.';

$_lang['formz.field_err_ae'] = 'Ett formulärfält existerar redan med det här namnet.';
$_lang['formz.field_err_nf'] = 'Formulärfältet hittades inte.';
$_lang['formz.field_err_ns'] = 'Formulärfält ej angivet.';
$_lang['formz.field_err_remove'] = 'Ett fel uppstod när formulärfältet skulle tas bort.';
$_lang['formz.field_err_save'] = 'Ett fel uppstod när formulärfältet skulle sparas.';
