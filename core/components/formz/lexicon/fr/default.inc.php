<?php
/**
 * formz
 */
/**
 * Default French Lexicon Entries for formz
 *
 * @package formz
 * @subpackage lexicon
 */
$_lang['formz.menu'] = 'Formz Builder';
$_lang['formz.menu_desc'] = 'Gérez vos formulaire à utiliser sur votre site.';
$_lang['formz.intro_msg'] = 'Gérez vos formulaires.';
$_lang['formz.form'] = 'Formulaires';
$_lang['formz.form.field'] = 'Champs';
$_lang['formz.form.default'] = 'Défaut';
$_lang['formz.form.properties'] = 'Propriétés';
$_lang['formz.form.field.desc'] = 'Ajouter, éditer, supprimer et ordonner les champs du formulaire. Pour ordonner, faites un glisser-déposer. Toutes les modifications sont enregistrées immediatement.';
$_lang['formz.form.create'] = 'Créer un nouveau formulaire';
$_lang['formz.form.remove'] = 'Supprimer le formulaire';
$_lang['formz.form.remove_confirm'] = 'Êtes-vous ssûr de vouloir supprimer ce formulaire ?';
$_lang['formz.form.update'] = 'Mettre à jour';
$_lang['formz.form.has_submission'] = 'Voir la soumission';
$_lang['formz.form.has_submissions'] = 'Voir les soumissions';
$_lang['formz.form.export'] = 'Exporter les données';
$_lang['formz.form.submissions'] = 'Soumissions';
$_lang['formz.form.submissions.desc'] = 'Vous pouvez visualiser et exporter les données envoyées via ce formulaire.';

// Grid Headers
$_lang['formz.form.email'] = 'Destinataire';
$_lang['formz.form.method'] = 'Méthode';

// Create/Edit
$_lang['formz.form.management'] = 'Créateur de formulaire';
$_lang['formz.form.create_edit_desc'] = 'Créez et éditez des formulaires. Une fois votre formulaire créé, vous pouvez l\'ajouter à votre page en liant la variable de modèle (TV) à votre modèle (template) de page, puis sélectionnez votre formulaire depuis le menu déroulant de la TV.';
$_lang['formz.form.search'] = 'Rechercher...';
$_lang['formz.form.general'] = 'Général';
$_lang['formz.form.extra'] = 'Extra';
$_lang['formz.form.identifier'] = 'Identifiant';
$_lang['formz.form.identifier_desc'] = 'L\'identifiant peut être utilisé comme ID ou classe dans votre formulaire, lors de la création de votre modèle. <em>default: form-[generated id]</em>';
$_lang['formz.form.success'] = 'Message de succès';
$_lang['formz.form.method.dbonly'] = 'Enregistrer dans la base de données';
$_lang['formz.form.method.dbandemail'] = 'Enregistrer dans la base de données et envoyer un email';
$_lang['formz.form.recipient'] = 'Destinataires';
$_lang['formz.form.properties'] = 'Propriétés';
$_lang['formz.form.properties_desc'] = 'Propriétés additionnelles que FormIt peut utiliser. Vous pouvez ajouter plusieurs propriétés en utilisant un double pipe || <em>exemple : &fiarTpl</em>';
$_lang['formz.form.hooks'] = 'Hooks';
$_lang['formz.form.hooks_desc'] = 'Vous pouvez ajouter des hooks en les séprant par des virgules. <em>exemple : redirect,spam</em>';
$_lang['formz.form.action_button'] = 'Action de bouton';
$_lang['formz.form.action_button_desc'] = 'Le texte affiché sur le bouton d\'envoi du formulaire. <em>default: Submit</em>';

// Fields
$_lang['formz.field.name'] = 'Intitulé (label)';
$_lang['formz.field.help_text'] = 'Texte Complémentaire';
$_lang['formz.field.type'] = 'Type';
$_lang['formz.field.values'] = 'Valeurs';
$_lang['formz.field.default'] = 'Valeur par défaut';
$_lang['formz.field.validation'] = 'Validation';
$_lang['formz.field.required'] = 'Requis';
$_lang['formz.field.email_tpl_tag'] = 'Email Template Tag';
$_lang['formz.field.error_message'] = 'Message d\'erreur';
$_lang['formz.field.cancel'] = 'Retour aux formulaires';

$_lang['formz.field.add'] = 'Ajouter un champ';
$_lang['formz.field.create'] = 'Créer un champ';
$_lang['formz.field.update'] = 'Mettre à jour';
$_lang['formz.field.delete'] = 'Supprimer';
$_lang['formz.field.remove'] = 'Retirer du formulaire';
$_lang['formz.field.remove_confirm'] = 'Êtes-vous sûr de vouloir retirer ce champ du formulaire ?';

$_lang['formz.submissions.removedata'] = 'Supprimer les données';
$_lang['formz.submissions.view'] = 'Voir le détail';
$_lang['formz.submissions.viewdata'] = 'Données pour : ';
$_lang['formz.submissions.remove'] = 'Retirer les données';
$_lang['formz.submissions.senton'] = 'Envoyé le';
$_lang['formz.submissions.ip_address'] = 'Adresse IP';
$_lang['formz.submissions.sender_info'] = 'Informations de l\'expediteur';
$_lang['formz.submissions.content'] = 'Contenu';
$_lang['formz.submissions.remove_confirm'] = 'Êtes-vous sûr de vouloir supprimer ces données ?';

$_lang['formz.export'] = 'Exporter';
$_lang['formz.export.daterange'] = 'Créneau de date';
$_lang['formz.export.start_date'] = 'Date de départ';
$_lang['formz.export.end_date'] = 'Date de fin';

// Validation
$_lang['formz.field.validation.required'] = 'Ce champ est requis.';

$_lang['formz.form_err_ae'] = 'Un formulaire portant ce nom existe déjà.';
$_lang['formz.form_err_nf'] = 'Formulaire non trouvé.';
$_lang['formz.form_err_ns'] = 'Formulaire non indiqué.';
$_lang['formz.form_err_remove'] = 'Une erreur est survenue lors de la suppression du formulaire.';
$_lang['formz.form_err_save'] = 'Une erreur est survenue lors de l\'enregistrement du formulaire.';

$_lang['formz.field_err_ae'] = 'Un champ portant ce nom existe déjà.';
$_lang['formz.field_err_nf'] = 'Champ non trouvé.';
$_lang['formz.field_err_ns'] = 'Champ non indiqué.';
$_lang['formz.field_err_remove'] = 'Une erreur est survenue lors de la suppression du champ.';
$_lang['formz.field_err_save'] = 'Une erreur est survenue lors de l\'enregistrement du champ.';
