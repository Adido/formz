<?php
/**
 * formz
 */
/**
 * Default German Lexicon Entries for formz
 *
 * @package formz
 * @subpackage lexicon
 */
$_lang['formz.menu'] = 'Formz-Generator';
$_lang['formz.menu_desc'] = 'Verwalten Sie Formulare zur Verwendung in Ihrer Website.';
$_lang['formz.intro_msg'] = 'Verwalten Sie Ihre Formulare.';
$_lang['formz.form'] = 'Formulare';
$_lang['formz.form.field'] = 'Formularfelder';
$_lang['formz.form.default'] = 'Feld-Definition';
$_lang['formz.form.properties'] = 'Zusätzliche Eigenschaften';
$_lang['formz.form.field.desc'] = 'Fügen Sie dem Formular Felder hinzu, bearbeiten, löschen oder sortieren Sie sie. Zum Sortieren klicken Sie einfach auf ein Feld und ziehen es auf eine andere Position. Alle Änderungen im Reiter "Formularfelder" werden sofort gespeichert.';
$_lang['formz.form.create'] = 'Neues Formular erstellen';
$_lang['formz.form.remove'] = 'Formular löschen';
$_lang['formz.form.remove_confirm'] = 'Sind Sie sicher, dass Sie dieses Formular löschen möchten?';
$_lang['formz.form.update'] = 'Formular bearbeiten';
$_lang['formz.form.has_submission'] = 'Einsendung anzeigen';
$_lang['formz.form.has_submissions'] = 'Einsendungen anzeigen';
$_lang['formz.form.export'] = 'Einsendungen exportieren';
$_lang['formz.form.submissions'] = 'Einsendungen';  // Einsendungen?
$_lang['formz.form.submissions.desc'] = 'Sie können die Daten, die mittels dieses Formulars übertragen wurden, anzeigen und exportieren.';

// Grid Headers
$_lang['formz.form.email'] = 'Empfänger';
$_lang['formz.form.method'] = 'Methode';

// Create/Edit
$_lang['formz.form.management'] = 'Formular-Generator';
$_lang['formz.form.create_edit_desc'] = 'Erstellen und bearbeiten Sie Formulare. Sobald Sie Ihr Formular erstellt haben, können Sie es einer Seite hinzufügen, indem Sie die Template-Variable dem Seiten-Template zuordnen und dann das Formular aus der Liste auswählen.';
$_lang['formz.form.search'] = 'Suchen...';
$_lang['formz.form.general'] = 'Allgemein';
$_lang['formz.form.extra'] = 'Zusätzliche Einstellungen';
$_lang['formz.form.identifier'] = 'Identifikator';
$_lang['formz.form.identifier_desc'] = 'Der Identifikator kann in Ihrem Formular als ID oder CSS-Klasse verwendet werden, wenn Sie Ihr Formular-Template erstellen. <em>Standard: form-[generierte ID]</em>';
$_lang['formz.form.success'] = 'Erfolgsmitteilung';
$_lang['formz.form.method.dbonly'] = 'In der Datenbank speichern';
$_lang['formz.form.method.dbandemail'] = 'In der Datenbank speichern und E-Mail schicken';
$_lang['formz.form.recipient'] = 'Empfänger';
$_lang['formz.form.properties'] = 'Eigenschaften';
$_lang['formz.form.properties_desc'] = 'Zusätzliche Eigenschaften, die ein FormIt-Formular haben kann; Sie können mehrere Eigenschaften hinzufügen, indem Sie das doppelte Pipe-Symbol || als Trennzeichen verwenden. <em>Beispiel: &fiarTpl</em>';
$_lang['formz.form.hooks'] = 'Hooks';
$_lang['formz.form.hooks_desc'] = 'Sie können zusätzliche Hooks hinzufügen, die von Ihrem FormIt-Formular aufgerufen werden sollen, indem Sie das Komma als Separator verwenden. <em>Beispiel: redirect,spam</em>';
$_lang['formz.form.action_button'] = 'Absende-Button';
$_lang['formz.form.action_button_desc'] = 'Der Text, mit dem der Absende-Button beschriftet werden soll. <em>Standard: Submit</em>';

// Fields
$_lang['formz.field.name'] = 'Beschriftung (Label)';
$_lang['formz.field.help_text'] = 'Zusatztext';
$_lang['formz.field.type'] = 'Typ';
$_lang['formz.field.values'] = 'Werte';
$_lang['formz.field.default'] = 'Standardwert';
$_lang['formz.field.validation'] = 'Validierung';
$_lang['formz.field.required'] = 'Pflichtfeld';
$_lang['formz.field.email_tpl_tag'] = 'E-Mail-Template-Tag';
$_lang['formz.field.error_message'] = 'Fehlermeldung';
$_lang['formz.field.cancel'] = 'Zurück zu den Formularen';

$_lang['formz.field.add'] = 'Formularfeld hinzufügen';
$_lang['formz.field.create'] = 'Formularfeld erstellen';
$_lang['formz.field.update'] = 'Bearbeiten';
$_lang['formz.field.delete'] = 'Formularfeld löschen';  // delete
$_lang['formz.field.remove'] = 'Löschen';  // remove
$_lang['formz.field.remove_confirm'] = 'Sind Sie sicher, dass Sie dieses Formularfeld löschen möchten?';

$_lang['formz.submissions.removedata'] = 'Einsendung löschen';
$_lang['formz.submissions.view'] = 'Details anzeigen';
$_lang['formz.submissions.viewdata'] = 'Einsendung für: ';
$_lang['formz.submissions.remove'] = 'Einsendung löschen';
$_lang['formz.submissions.senton'] = 'Gesendet am';
$_lang['formz.submissions.ip_address'] = 'IP-Adresse';
$_lang['formz.submissions.sender_info'] = 'Absender-Informationen';
$_lang['formz.submissions.content'] = 'Inhalt';
$_lang['formz.submissions.remove_confirm'] = 'Sind Sie sicher, dass Sie diese Einsendung löschen möchten?';

$_lang['formz.export'] = 'Exportieren';
$_lang['formz.export.daterange'] = 'Datumsbereich';
$_lang['formz.export.start_date'] = 'Start-Datum';
$_lang['formz.export.end_date'] = 'End-Datum';

// Validation
$_lang['formz.field.validation.required'] = 'Dieses Feld muss ausgefüllt werden.';

$_lang['formz.form_err_ae'] = 'Ein Formular mit diesem Namen existiert bereits.';
$_lang['formz.form_err_nf'] = 'Formular nicht gefunden.';
$_lang['formz.form_err_ns'] = 'Formular nicht angegeben.';
$_lang['formz.form_err_remove'] = 'Ein Fehler trat auf beim Versuch, das Formular zu löschen.';
$_lang['formz.form_err_save'] = 'Ein Fehler trat auf beim Versuch, das Formular zu speichern.';

$_lang['formz.field_err_ae'] = 'Ein Formularfeld mit diesem Namen existiert bereits.';
$_lang['formz.field_err_nf'] = 'Formularfeld nicht gefunden.';
$_lang['formz.field_err_ns'] = 'Formularfeld nicht angegeben.';
$_lang['formz.field_err_remove'] = 'Ein Fehler trat auf beim Versuch, das Formularfeld zu löschen.';
$_lang['formz.field_err_save'] = 'Ein Fehler trat auf beim Versuch, das Formularfeld zu speichern.';
