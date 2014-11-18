<?php
/**
 * formz
 */
/**
 * Default Dutch Lexicon Entries for formz
 *
 * @package formz
 * @subpackage lexicon
 */
$_lang['formz'] = 'Formulieren';
$_lang['formz.menu_desc'] = 'Beheer de formulieren die op de website gebruikt kunnen worden.';
$_lang['formz.intro_msg'] = 'Beheer hier de formulieren die op de website gebruikt kunnen worden.';
$_lang['formz.form'] = 'Formulieren';
$_lang['formz.form.field'] = 'Velden';
$_lang['formz.form.default'] = 'Standaardwaarde';
$_lang['formz.form.properties'] = 'Eigenschappen';
$_lang['formz.form.field.desc'] = 'Hier kun je velden van het formulier toevoegen, verwijderen en aanpassen. Om de volgorde te veranderen kun je de velden selecteren en verslepen. Alle veranderingen die je hier maakt worden direct opgeslagen.';
$_lang['formz.form.create'] = 'Maak een nieuw formulier';
$_lang['formz.form.remove'] = 'Verwijder formulier';
$_lang['formz.form.remove_confirm'] = 'Weet je zeker dat je dit formulier wilt verwijderen?';
$_lang['formz.form.update'] = 'Formulier aanpassen';
$_lang['formz.form.has_submission'] = 'Bekijk inzendingen';
$_lang['formz.form.has_submissions'] = 'Bekijk inzendingen';
$_lang['formz.form.export'] = 'Exporteer inzendingen';
$_lang['formz.form.submissions'] = 'Inzendingen';
$_lang['formz.form.submissions.desc'] = 'Je kunt de inzendingen bekijken en exporteren.';

// Grid Headers
$_lang['formz.form.email'] = 'Ontvanger';
$_lang['formz.form.method'] = 'Methode';

// Create/Edit
$_lang['formz.form.management'] = 'Formulieren generator';
$_lang['formz.form.create_edit_desc'] = 'Maak en bewerk formulieren. Nadat je een formulier hebt gemaakt, kun je deze aan een pagina toevoegen door het formulier op die pagina bij Instellingen te kiezen.';
$_lang['formz.form.search'] = 'Zoeken...';
$_lang['formz.form.general'] = 'Algemeen';
$_lang['formz.form.extra'] = 'Instellingen';
$_lang['formz.form.identifier'] = 'Uniek ID (geen spaties)';
$_lang['formz.form.identifier_desc'] = 'Het unieke ID kan gebruikt worden als je het formulier een ID wilt geven. Niet verplicht';
$_lang['formz.form.success'] = 'Mededeling bij succesvol ingezonden formulier';
$_lang['formz.form.method.dbonly'] = 'Opslaan';
$_lang['formz.form.method.dbandemail'] = 'Opslaan en per e-mail sturen';
$_lang['formz.form.recipient'] = 'Ontvangers';
$_lang['formz.form.properties'] = 'Eigenschappen';
$_lang['formz.form.properties_desc'] = 'Optionele eigenschappen die worden toegevoegd aan FormIt. Meerder eigenschappen moeten worden gescheiden met een double pipe: ||. <em>Voorbeeld: &fiarTpl</em>';
$_lang['formz.form.hooks'] = 'Hooks';
$_lang['formz.form.hooks_desc'] = 'Optionele hooks die worden toegevoegd aan FormIt. Meerder hooks moeten worden gescheiden met een komma. <em>Voorbeeld: &redirect,spam</em>';
$_lang['formz.form.action_button'] = 'Verzendknop';
$_lang['formz.form.action_button_desc'] = 'De tekst die op de verzendknop moet staan. <em>Standaard: Versturen</em>';

// Fields
$_lang['formz.field.name'] = 'Label';
$_lang['formz.field.type'] = 'Type';
$_lang['formz.field.values'] = 'Waarden <em>Zet tussen elke waarde twee verticale streepjes. Zo: groen||rood||blauw</em>';
$_lang['formz.field.default'] = 'Standaard waarde (deze wordt al ingevuld). Optioneel';
$_lang['formz.field.validation'] = 'Validatie';
$_lang['formz.field.required'] = 'Is dit veld verplicht?';
$_lang['formz.field.email_tpl_tag'] = 'Email Template Tag';
$_lang['formz.field.error_message'] = 'Foutmelding';
$_lang['formz.field.cancel'] = 'Terug naar de formulieren';

$_lang['formz.field.add'] = 'Veld toevoegen';
$_lang['formz.field.create'] = 'Maak nieuw veld';
$_lang['formz.field.update'] = 'Pas dit veld aan';
$_lang['formz.field.delete'] = 'Verwijder dit veld';
$_lang['formz.field.remove'] = 'Verwijder formulierveld';
$_lang['formz.field.remove_confirm'] = 'Weet je zeker dat je dit veld wilt verwijderen?';

$_lang['formz.submissions.removedata'] = 'Verwijder inzending';
$_lang['formz.submissions.view'] = 'Bekijk details';
$_lang['formz.submissions.viewdata'] = 'Inzending voor: ';
$_lang['formz.submissions.remove'] = 'Verwijder inzending';
$_lang['formz.submissions.senton'] = 'Verzonden op';
$_lang['formz.submissions.ip_address'] = 'IP-adres';
$_lang['formz.submissions.sender_info'] = 'Informatie van de zender';
$_lang['formz.submissions.content'] = 'Inhoud';
$_lang['formz.submissions.remove_confirm'] = 'Weet je zeker dat je deze inzending wilt verwijderen?';

$_lang['formz.export'] = 'Exporteer';
$_lang['formz.export.daterange'] = 'Datumbereik';
$_lang['formz.export.start_date'] = 'Startdatum';
$_lang['formz.export.end_date'] = 'Einddatum';

// Validation
$_lang['formz.field.validation.required'] = 'Dit veld is verplicht.';

$_lang['formz.form_err_ae'] = 'Er is al een formulier met deze naam.';
$_lang['formz.form_err_nf'] = 'Het formulier is niet gevonden.';
$_lang['formz.form_err_ns'] = 'Het formulier is niet gekozen.';
$_lang['formz.form_err_remove'] = 'Er was een fout bij het verwijderen van het formulier.';
$_lang['formz.form_err_save'] = 'Er was een fout bij het opslaan van het formulier.';

$_lang['formz.field_err_ae'] = 'Er is al een veld met deze naam.';
$_lang['formz.field_err_nf'] = 'Het veld is niet gevonden.';
$_lang['formz.field_err_ns'] = 'Het veld is niet gekozen.';
$_lang['formz.field_err_remove'] = 'Er was een fout bij het verwijderen van het veld.';
$_lang['formz.field_err_save'] = 'Er was een fout bij het opslaan van het veld.';
