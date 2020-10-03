<?php
/*
Copyright (C) 2020 Dragoș Manea
access_mysqli.php
Database access program

This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program.  If not, see <https://www.gnu.org/licenses/>.

Last edited: 2020-10-03
*/
error_reporting(0);
ini_set('memory_limit', '4095M');
set_time_limit(0);
$languages=array('EN','RO');
$encodings=array('big5','dec8','cp850','hp8','koi8r','latin1','latin2','swe7','ascii','ujis','sjis','hebrew','tis620','euckr','koi8u','gb2312','greek','cp1250','gbk','latin5','armscii8','utf8','ucs2','cp866','keybcs2','macce','macroman','cp852','latin7','utf8mb4','cp1251','utf16','cp1256','cp1257','utf32','binary','geostd8','cp932','eucjpms');
//!!!START!!!
//From here you can edit the settings!!!
//Configuring variables
//CHARSET
$defaultCharset='utf8';
//*CHARSET
//LANGUAGE
$defaultLanguage='EN';
//*LANGUAGE
//DEFAULT SETTINGS
$DEFAULTSET=array();
$DEFAULTSET['editADV']=0;//0 or 1
$DEFAULTSET['editDate']=0;//0 or 1
$DEFAULTSET['editDateTime']=0;//0 or 1
$DEFAULTSET['editDimension']=0;//0 or 1
$DEFAULTSET['editHTML']=1;//0 or 1
$DEFAULTSET['editTime']=0;//0 or 1
//*DEFAULT SETTINGS
//PREDEFINED DATABASES
/*
$DEFAULTDBS=array('databases'=>array('<database1>','<database2>'),
'tables'=>array('<database1>'=>array('<table1>','<table2>','<table3>'),'<database2>'=>NULL)
);
*/
//*PREDEFINED DATABASES
//*Configuring variables
//DO NOT EDIT BELOW!!!
//!!!!STOP!!!!


$VERSION='2.1';
/*
ACCESS_MYSQLI.PHP
ACCESS_MYSQLI.PHP
*/

//TRANSLATIONS
$TR=array(
"Version"=>array("EN"=>"Version","RO"=>"Versiunea"),
"User"=>array("EN"=>"User","RO"=>"Utilizator"),
"Password"=>array("EN"=>"Password","RO"=>"Parola"),
"Log_in"=>array("EN"=>"Log in","RO"=>"Log in"),
"Encoding_used"=>array("EN"=>"Encoding used to comunicate with MySQL:","RO"=>"Codarea foloită în comunicarea cu MySQL:"),
"Change_encoding_language"=>array("EN"=>"Change interface language and encoding of characters","RO"=>"Schmbare limbă intrefață și codarea caracterelor"),
"Choose_db"=>array("EN"=>"Choose database:","RO"=>"Alege baza de date:"),
"Choose"=>array("EN"=>"Choose","RO"=>"Alege"),
"Create_pquery"=>array("EN"=>"Create own query","RO"=>"Introducere query propriu"),
"Create_db"=>array("EN"=>"Create database","RO"=>"Creare bază de date"),
"Import_db"=>array("EN"=>"Import database","RO"=>"Import bază de date"),
"Log_out"=>array("EN"=>"Log out","RO"=>"Log out"),
"Insert_query"=>array("EN"=>"Insert query:","RO"=>"Introdu query-ul:"),
"Close"=>array("EN"=>"Close","RO"=>"Închide"),
"Send"=>array("EN"=>"Send","RO"=>"Trimite"),
"Empty_field"=>array("EN"=>"Empty field","RO"=>"Golește câmpul"),
"Query_void"=>array("EN"=>"Query with void result.","RO"=>"Query cu rezultat vid."),
"Affected_rows"=>array("EN"=>"Affected rows:","RO"=>"Rânduri afectate:"),
"Choose_tbl"=>array("EN"=>"Choose table:","RO"=>"Alege tabelul:"),
"Database:"=>array("EN"=>"Database:","RO"=>"Baza de date:"),
"Create_tbl"=>array("EN"=>"Create table","RO"=>"Creare tabel"),
"Del_db"=>array("EN"=>"Delete database","RO"=>"Ștergere bază de date"),
"Backup_db_tbl"=>array("EN"=>"Backup database/tables","RO"=>"Backup bază de date sau tabele"),
"Import_db_tbl"=>array("EN"=>"Import database/tables","RO"=>"Import bază de date sau tabele"),
"Change_db"=>array("EN"=>"Change database","RO"=>"Schimbare bază de date"),
"conn_err"=>array("EN"=>"Connection error.","RO"=>"Eroare de conectare."),
"dbmiss"=>array("EN"=>"Error loading database.","RO"=>"Eroare la încărcarea bazei de date."),
"tblmiss"=>array("EN"=>"Error loading table.","RO"=>"Eroare la încărcarea tabelului."),
"colmiss"=>array("EN"=>"The table was modified before processing query.","RO"=>"Tabelul a fost modificat înainte de procesarea solicitării."),
"json_eror"=>array("EN"=>"JSON encoding error. Try changing the encoding from the top of the page","RO"=>"Eroare de codificare JSON. Încearcă schimbarea codificării din partea de sus a paginii."),
"bad_link"=>array("EN"=>"Insert a link address!","RO"=>"Introduceți o adresă pentru link!"),
"ERROR"=>array("EN"=>"ERROR!","RO"=>"EROARE!"),
"MySQL_error"=>array("EN"=>"MySQL error","RO"=>"Eroare MySQL"),
"Backup_error"=>array("EN"=>"Backup error","RO"=>"Eroare backup"),
"DB_load_error"=>array("EN"=>"Error loading database","RO"=>"Eroare la încărcarea bazei de date"),
"Import_error"=>array("EN"=>"Import error","RO"=>"Eroare import"),
"Import_done"=>array("EN"=>"Import done","RO"=>"Import realizat"),
"No_tableLarge"=>array("EN"=>"There is no table!","RO"=>"Nu există tabele!"),
"OK_to_close"=>array("EN"=>"Click OK to close:","RO"=>"Apasă OK pentru a închide:"),
"OK_to_save"=>array("EN"=>"Click OK to save:","RO"=>"Apasă OK pentru a salva:"),
"OK"=>array("EN"=>"OK","RO"=>"OK"),
"Insert_tbl_name"=>array("EN"=>"Insert table name:","RO"=>"Introdu numele tabelului:"),
"Insert_first_col_name"=>array("EN"=>"Insert first column name:","RO"=>"Introdu numele primei coloane:"),
"Choose_first_col_data_type"=>array("EN"=>"Choose first column data type:","RO"=>"Alege tipul de date al primei coloane:"),
"Other"=>array("EN"=>"Other","RO"=>"Altul"),
"Insert_data_type"=>array("EN"=>"Insert data type:","RO"=>"Introdu tipul de date:"),
"Dhas_been_created"=>array("EN"=>"has been created","RO"=>"a fost creată"),
"Thas_been_created"=>array("EN"=>"has been created","RO"=>"a fost creat"),
"Database"=>array("EN"=>"Database","RO"=>"Baza de date"),
"Table"=>array("EN"=>"Table","RO"=>"Tabelul"),
"INFO"=>array("EN"=>"INFO","RO"=>"INFO"),
"Really_delete_db"=>array("EN"=>"Do you really want to delete database","RO"=>"Sigur ștegi baza de date"),
"YES"=>array("EN"=>"YES","RO"=>"DA"),
"NO"=>array("EN"=>"NO","RO"=>"NU"),
"CONFIRM"=>array("EN"=>"CONFIRM","RO"=>"CONFIRMARE"),
"Dhas_been_deleted"=>array("EN"=>"has been deleted","RO"=>"a fost ștearsă"),
"Tbl_is"=>array("EN"=>"Current table:","RO"=>"Tabelul curent:"),
"Really_delete_tbl"=>array("EN"=>"Do you really want to delete table","RO"=>"Sigur ștergi tabelul"),
"Thas_been_deleted"=>array("EN"=>"has ben deleted","RO"=>"a fost șters"),
"Whole_db"=>array("EN"=>"The whole current database (including database creation)","RO"=>"Toată baza de date curentă (inclusiv crearea bazei de date)"),
"Select_tables"=>array("EN"=>"Select tables:","RO"=>"Selectează tabele:"),
"Only_tables"=>array("EN"=>"Only tables:","RO"=>"Doar tabele:"),
"All_tables"=>array("EN"=>"All tables","RO"=>"Toate tabelele"),
"No_table"=>array("EN"=>"No table","RO"=>"Niciun tabel"),
"OK_to_backup"=>array("EN"=>"Click OK to generate backup:","RO"=>"Apasă OK pentru a genera backupul:"),
"Import_sql"=>array("EN"=>"Import databases and tables (.sql file)","RO"=>"Import baze de date și tabele (fișier .sql)"),
"OK_to_import"=>array("EN"=>"Click OK to import file:","RO"=>"Apasă OK pentru a importa fișierul:"),
"Import_no_db_selected"=>array("EN"=>"There is no database selected. Because of that, the file must also specify the database in use.","RO"=>"Nu este selectată nicio bază de date. De aceea, fișierul trebuie să specifice și baza de date folosită."),
"Import_default_db"=>array("EN"=>"The queries in the file will be executed by default on the current database:","RO"=>"Query-urile din fișier se vor executa în mod implicit pe baza de date actuală:"),
"Tbl_created_content_not_copied"=>array("EN"=>"The new table has been created, but the content could not be copied.","RO"=>"Noul tabel a fost creat, dar conținutul nu a fost copiat."),
"No_dbLarge"=>array("EN"=>"There is no database!","RO"=>"Nu există nicio bază de date!"),
"Search_settings"=>array("EN"=>"Search settings","RO"=>"Setări de căutare"),
"Match"=>array("EN"=>"Match:","RO"=>"Potrivire:"),
"Exact_cell"=>array("EN"=>"Exact cell","RO"=>"Exact celula"),
"Contains"=>array("EN"=>"Contains","RO"=>"Conține"),
"Begins_with"=>array("EN"=>"Begins with","RO"=>"Începe cu"),
"Ends_with"=>array("EN"=>"Ends with","RO"=>"Se termină cu"),
"Word"=>array("EN"=>"Word","RO"=>"Cuvânt"),
"RegEx_only"=>array("EN"=>"RegEx (only RegEx, without &quot;/&quot; or i,g etc.)","RO"=>"RegEx (doar RegEx, fără &quot;/&quot; sau i,g etc.)"),
"Only_rows_containing"=>array("EN"=>"Show only rows containing results","RO"=>"Afișare doar rânduri ce conțin rezultate"),
"Upper_lower"=>array("EN"=>"Match lower/UPPERcase","RO"=>"Distinge minuscule/MAJUSCULE"),
"All_cols"=>array("EN"=>"All columns","RO"=>"Toate coloanele"),
"No_col"=>array("EN"=>"No column","RO"=>"Nicio coloană"),
"Search_cols"=>array("EN"=>"Search on columns:","RO"=>"Căutare pe coloane:"),
"Note"=>array("EN"=>"Note","RO"=>"Notă"),
"First3_settings"=>array("EN"=>"The first three settings are kept until page refresh and the column search options until table is edited.","RO"=>"Primele trei setări se păstrează până la reîncărcarea paginii, iar cele pentru căutarea pe coloane până când se fac modificări la tabel."),
"Current_db"=>array("EN"=>"Current database","RO"=>"Baza de date curentă"),
"Current_tbl"=>array("EN"=>"Current table","RO"=>"Tabelul curent"),
"Tbl_actions"=>array("EN"=>"Table_actions","RO"=>"Acțiuni tabel"),
"Delete_tbl"=>array("EN"=>"Delete table","RO"=>"Ștergere tabel"),
"Rename_tbl"=>array("EN"=>"Rename table","RO"=>"Redenumire tabel"),
"Copy_tbl"=>array("EN"=>"Copy table","RO"=>"Copiere tabel"),
"Search_actions"=>array("EN"=>"Search actions:","RO"=>"Acțiuni de căutare"),
"Back"=>array("EN"=>"Back","RO"=>"Înapoi"),
"Order"=>array("EN"=>"Order","RO"=>"Ordonare"),
"Bold"=>array("EN"=>"Bold","RO"=>"Bold"),
"Italic"=>array("EN"=>"Italic","RO"=>"Italic"),
"Underline"=>array("EN"=>"Underline","RO"=>"Subliniat"),
"Add_link"=>array("EN"=>"Add link","RO"=>"Adăugare link"),
"Link"=>array("EN"=>"Link","RO"=>"Link"),
"Link_addr"=>array("EN"=>"Link address","RO"=>"Adresă link"),
"Link_txt"=>array("EN"=>"Link text","RO"=>"Text link"),
"Follow_link"=>array("EN"=>"Follow link","RO"=>"Deplasare la adresă"),
"Text_color"=>array("EN"=>"Text color","RO"=>"Culoare text"),
"Black"=>array("EN"=>"Black","RO"=>"Negru"),
"Red"=>array("EN"=>"Red","RO"=>"Roșu"),
"Blue"=>array("EN"=>"Blue","RO"=>"Albastru"),
"Green"=>array("EN"=>"Green","RO"=>"Verde"),
"Yellow"=>array("EN"=>"Yellow","RO"=>"Galben"),
"Text_size"=>array("EN"=>"Text size","RO"=>"Dimenisune text"),
"Small"=>array("EN"=>"Small","RO"=>"Mic"),
"Normal"=>array("EN"=>"Normal","RO"=>"Normal"),
"Big"=>array("EN"=>"Big","RO"=>"Mare"),
"Huge"=>array("EN"=>"Huge","RO"=>"Imens"),
"Add_list"=>array("EN"=>"Add list","RO"=>"Adăugre listă"),
"List"=>array("EN"=>"List","RO"=>"Listă"),
"Ord_list"=>array("EN"=>"Ordered list","RO"=>"Listă ordonată"),
"Ordered"=>array("EN"=>"Ordered","RO"=>"Ordonată"),
"Unord_list"=>array("EN"=>"Unordered list","RO"=>"Listă neordonată"),
"Unordered"=>array("EN"=>"Unordered","RO"=>"Neordonată"),
"Align"=>array("EN"=>"Align","RO"=>"Aliniere"),
"Left"=>array("EN"=>"Left","RO"=>"Stânga"),
"Centre"=>array("EN"=>"Centre","RO"=>"Centru"),
"Right"=>array("EN"=>"Right","RO"=>"Dreapta"),
"HTML_disabled"=>array("EN"=>"To use this function, activate HTML edit from Settings<br>NOTE: It works only on text columns.","RO"=>"Pentru a folosi această funcție, activați editarea HTML din Setări.<br>NOTĂ: Funcționează doar pe coloanele de tip text."),
"Settings"=>array("EN"=>"Settings","RO"=>"Setări"),
"New_row"=>array("EN"=>"New row","RO"=>"Adăugare rând"),
"Inser_valid"=>array("EN"=>"Insert a valid link!","RO"=>"Introdu un link valid!"),
"Duplicate_row"=>array("EN"=>"Duplicate row","RO"=>"Duplicare rând"),
"Del_row"=>array("EN"=>"Delete row","RO"=>"Ștergere rând"),
"New_col"=>array("EN"=>"New column","RO"=>"Adăugare coloană"),
"ORDER"=>array("EN"=>"ORDER","RO"=>"ORDONARE"),
"Add_key"=>array("EN"=>"Add key","RO"=>"Adăugare criteriu"),
"Add_order_key"=>array("EN"=>"Add order key:","RO"=>"Adăugare criteriu de ordonare:"),
"Delete_key"=>array("EN"=>"Delete key","RO"=>"Ștergere criteriu"),
"Close_changes_lost"=>array("EN"=>"Do you really want to close?<br>Changes will be lost!","RO"=>"Sigur închizi?<br>Modificările se vor pierde!"),
"No_order_key"=>array("EN"=>"No order key.","RO"=>"Niciun criteriu de ordonare."),
"Rows_count"=>array("EN"=>"Rows count","RO"=>"Nr. rânduri"),
"Edit_col"=>array("EN"=>"Edit column","RO"=>"Editare coloană"),
"Del_col"=>array("EN"=>"Delete column","RO"=>"Ștergere coloană"),
"SETTINGS"=>array("EN"=>"SETTINGS","RO"=>"SETĂRI"),
"HTML_edit"=>array("EN"=>"HTML edit","RO"=>"Editare HTML"),
"HTML_edit_expl"=>array("EN"=>"Enables text formating tool, only for &amp;quot;text&amp;quot; columns.","RO"=>"Permite utilizarea instrumentelor de formatare a textului, dar doar pe coloanele de tip &amp;quot;text&amp;quot;."),
"Advanced_edit"=>array("EN"=>"Advanced edit","RO"=>"Editare avansată"),
"Advanced_edit_expl"=>array("EN"=>"For advanced users: you can insert MySQL functions; the edited text must be placed between simple quotes &amp;#40;&amp;#39;&amp;#41;.","RO"=>"Pentru avansați: permite folosirea funcțiilor MySQL, conținutul editat trebuie pus între ghilimele simple &amp;#40;&amp;#39;&amp;#41;."),
"Truncated_view"=>array("EN"=>"Show truncated cell content, except for the current edited cell","RO"=>"Afișare trunchiată pentru celulele unde nu se editează"),
"Truncated_view_expl"=>array("EN"=>"The table cells are small when not selected (not clicked inside) for simpler navigation. Some of the text in cells may not be shown.","RO"=>"Pentru avansați: permite folosirea funcțiilor MySQL, conținutul editat trebuie pus între ghilimele simple &amp;#40;&amp;#39;&amp;#41;."),
"Quot_for_date"=>array("EN"=>"Use &quot;&#36;&quot symbol for current date","RO"=>"Simbolul &quot;&#36;&quot pentru data curentă"),
"Quot_for_time"=>array("EN"=>"Use &quot;&#36;&quot symbol for current time","RO"=>"Simbolul &quot;&#36;&quot pentru timpul curent"),
"Quot_for_date_time"=>array("EN"=>"Use &quot;&#36;&quot symbol for current date and time","RO"=>"Simbolul &quot;&#36;&quot pentru data și timpul curente"),
"Quot_for_time_expl"=>array("EN"=>"On &amp;#40;TIME&amp;#41; columns, the &amp;quot;&amp;#36;&amp;quot; character inserted alone in the cell sets its value to current server time.","RO"=>"Pe coloanele de tip timp &amp;#40;TIME&amp;#41;, caracterul &amp;quot;&amp;#36;&amp;quot; introdus singur în celulă, setează timpul curent al serverului ca valoare a acelei celule."),
"Quot_for_date_expl"=>array("EN"=>"On &amp;#40;DATE&amp;#41; columns, the &amp;quot;&amp;#36;&amp;quot; character inserted alone in the cell sets its value to current server date.","RO"=>"Pe coloanele de tip timp &amp;#40;DATE&amp;#41;, caracterul &amp;quot;&amp;#36;&amp;quot; introdus singur în celulă, setează data curentă al serverului ca valoare a acelei celule."),
"Quot_for_date_time_expl"=>array("EN"=>"On &amp;#40;DATETIME&amp;#41; columns, the &amp;quot;&amp;#36;&amp;quot; character inserted alone in the cell sets its value to current server date and time.","RO"=>"Pe coloanele de tip timp &amp;#40;DATETIME&amp;#41;, caracterul &amp;quot;&amp;#36;&amp;quot; introdus singur în celulă, setează data și timpul curente ale serverului ca valoare a acelei celule."),
"Create_col"=>array("EN"=>"Create column","RO"=>"Creare coloană"),
"Insert_col_name"=>array("EN"=>"Insert column name:","RO"=>"Introdu numele coloanei:"),
"Choose_col_data_type"=>array("EN"=>"Choose column data type:","RO"=>"Alege tipul de date al coloanei:"),
"Chas_been_created"=>array("EN"=>"has been created","RO"=>"a fost creată"),
"Column"=>array("EN"=>"Column","RO"=>"Coloana"),
"Edit_done"=>array("EN"=>"Edit done.","RO"=>"Editare realizată."),
"Really_del_col"=>array("EN"=>"Do you really want to delete column","RO"=>"Sigur ștergi coloana"),
"Chas_been_removed"=>array("EN"=>"has been removed","RO"=>"a fost ștearsă"),
"Really_del_row"=>array("EN"=>"Do you really want to delete the selected row?","RO"=>"Sigur ștergi rândul selectat?"),
"Leave_page"=>array("EN"=>"Some changes are not saved. Do you really want to leave?","RO"=>"Unele modificări nu s-au salvat. Sigur părăsești pagina?"),
"results_on"=>array("EN"=>"results on","RO"=>"rezultate pe"),
"rows"=>array("EN"=>"rows","RO"=>"rânduri"),
"Show_all_rows"=>array("EN"=>"Show all rows","RO"=>"Afișează toate rândurile"),
"Insert_new_name"=>array("EN"=>"Insert new name:","RO"=>"Introdu noul nume:"),
"Rename_done"=>array("EN"=>"Rename done!","RO"=>"Redenumire realizată!"),
"In_this_db"=>array("EN"=>"In this database","RO"=>"În această bază de date"),
"In_other_db"=>array("EN"=>"In other database","RO"=>"În altă bază de date"),
"Copy_done"=>array("EN"=>"Copy done!","RO"=>"Copiere realizată!"),
"File_too_big"=>array("EN"=>"The file could not be uploaded or is too big!","RO"=>"Fișierul nu poate fi încărcat sau e prea mare!"),
"Style_CSS"=>array("EN"=>"Style with CSS","RO"=>"Formatează cu CSS"),
"Link_new_tab"=>array("EN"=>"Link in new tab:","RO"=>"Link în filă nouă:")
);
//*TRANSLATIONS
function echo_jquery(){
echo<<<'EOT'
/*! jQuery v3.4.1 | (c) JS Foundation and other contributors | jquery.org/license */
!function(e,t){"use strict";"object"==typeof module&&"object"==typeof module.exports?module.exports=e.document?t(e,!0):function(e){if(!e.document)throw new Error("jQuery requires a window with a document");return t(e)}:t(e)}("undefined"!=typeof window?window:this,function(C,e){"use strict";var t=[],E=C.document,r=Object.getPrototypeOf,s=t.slice,g=t.concat,u=t.push,i=t.indexOf,n={},o=n.toString,v=n.hasOwnProperty,a=v.toString,l=a.call(Object),y={},m=function(e){return"function"==typeof e&&"number"!=typeof e.nodeType},x=function(e){return null!=e&&e===e.window},c={type:!0,src:!0,nonce:!0,noModule:!0};function b(e,t,n){var r,i,o=(n=n||E).createElement("script");if(o.text=e,t)for(r in c)(i=t[r]||t.getAttribute&&t.getAttribute(r))&&o.setAttribute(r,i);n.head.appendChild(o).parentNode.removeChild(o)}function w(e){return null==e?e+"":"object"==typeof e||"function"==typeof e?n[o.call(e)]||"object":typeof e}var f="3.4.1",k=function(e,t){return new k.fn.init(e,t)},p=/^[\s\uFEFF\xA0]+|[\s\uFEFF\xA0]+$/g;function d(e){var t=!!e&&"length"in e&&e.length,n=w(e);return!m(e)&&!x(e)&&("array"===n||0===t||"number"==typeof t&&0<t&&t-1 in e)}k.fn=k.prototype={jquery:f,constructor:k,length:0,toArray:function(){return s.call(this)},get:function(e){return null==e?s.call(this):e<0?this[e+this.length]:this[e]},pushStack:function(e){var t=k.merge(this.constructor(),e);return t.prevObject=this,t},each:function(e){return k.each(this,e)},map:function(n){return this.pushStack(k.map(this,function(e,t){return n.call(e,t,e)}))},slice:function(){return this.pushStack(s.apply(this,arguments))},first:function(){return this.eq(0)},last:function(){return this.eq(-1)},eq:function(e){var t=this.length,n=+e+(e<0?t:0);return this.pushStack(0<=n&&n<t?[this[n]]:[])},end:function(){return this.prevObject||this.constructor()},push:u,sort:t.sort,splice:t.splice},k.extend=k.fn.extend=function(){var e,t,n,r,i,o,a=arguments[0]||{},s=1,u=arguments.length,l=!1;for("boolean"==typeof a&&(l=a,a=arguments[s]||{},s++),"object"==typeof a||m(a)||(a={}),s===u&&(a=this,s--);s<u;s++)if(null!=(e=arguments[s]))for(t in e)r=e[t],"__proto__"!==t&&a!==r&&(l&&r&&(k.isPlainObject(r)||(i=Array.isArray(r)))?(n=a[t],o=i&&!Array.isArray(n)?[]:i||k.isPlainObject(n)?n:{},i=!1,a[t]=k.extend(l,o,r)):void 0!==r&&(a[t]=r));return a},k.extend({expando:"jQuery"+(f+Math.random()).replace(/\D/g,""),isReady:!0,error:function(e){throw new Error(e)},noop:function(){},isPlainObject:function(e){var t,n;return!(!e||"[object Object]"!==o.call(e))&&(!(t=r(e))||"function"==typeof(n=v.call(t,"constructor")&&t.constructor)&&a.call(n)===l)},isEmptyObject:function(e){var t;for(t in e)return!1;return!0},globalEval:function(e,t){b(e,{nonce:t&&t.nonce})},each:function(e,t){var n,r=0;if(d(e)){for(n=e.length;r<n;r++)if(!1===t.call(e[r],r,e[r]))break}else for(r in e)if(!1===t.call(e[r],r,e[r]))break;return e},trim:function(e){return null==e?"":(e+"").replace(p,"")},makeArray:function(e,t){var n=t||[];return null!=e&&(d(Object(e))?k.merge(n,"string"==typeof e?[e]:e):u.call(n,e)),n},inArray:function(e,t,n){return null==t?-1:i.call(t,e,n)},merge:function(e,t){for(var n=+t.length,r=0,i=e.length;r<n;r++)e[i++]=t[r];return e.length=i,e},grep:function(e,t,n){for(var r=[],i=0,o=e.length,a=!n;i<o;i++)!t(e[i],i)!==a&&r.push(e[i]);return r},map:function(e,t,n){var r,i,o=0,a=[];if(d(e))for(r=e.length;o<r;o++)null!=(i=t(e[o],o,n))&&a.push(i);else for(o in e)null!=(i=t(e[o],o,n))&&a.push(i);return g.apply([],a)},guid:1,support:y}),"function"==typeof Symbol&&(k.fn[Symbol.iterator]=t[Symbol.iterator]),k.each("Boolean Number String Function Array Date RegExp Object Error Symbol".split(" "),function(e,t){n["[object "+t+"]"]=t.toLowerCase()});var h=function(n){var e,d,b,o,i,h,f,g,w,u,l,T,C,a,E,v,s,c,y,k="sizzle"+1*new Date,m=n.document,S=0,r=0,p=ue(),x=ue(),N=ue(),A=ue(),D=function(e,t){return e===t&&(l=!0),0},j={}.hasOwnProperty,t=[],q=t.pop,L=t.push,H=t.push,O=t.slice,P=function(e,t){for(var n=0,r=e.length;n<r;n++)if(e[n]===t)return n;return-1},R="checked|selected|async|autofocus|autoplay|controls|defer|disabled|hidden|ismap|loop|multiple|open|readonly|required|scoped",M="[\\x20\\t\\r\\n\\f]",I="(?:\\\\.|[\\w-]|[^\0-\\xa0])+",W="\\["+M+"*("+I+")(?:"+M+"*([*^$|!~]?=)"+M+"*(?:'((?:\\\\.|[^\\\\'])*)'|\"((?:\\\\.|[^\\\\\"])*)\"|("+I+"))|)"+M+"*\\]",$=":("+I+")(?:\\((('((?:\\\\.|[^\\\\'])*)'|\"((?:\\\\.|[^\\\\\"])*)\")|((?:\\\\.|[^\\\\()[\\]]|"+W+")*)|.*)\\)|)",F=new RegExp(M+"+","g"),B=new RegExp("^"+M+"+|((?:^|[^\\\\])(?:\\\\.)*)"+M+"+$","g"),_=new RegExp("^"+M+"*,"+M+"*"),z=new RegExp("^"+M+"*([>+~]|"+M+")"+M+"*"),U=new RegExp(M+"|>"),X=new RegExp($),V=new RegExp("^"+I+"$"),G={ID:new RegExp("^#("+I+")"),CLASS:new RegExp("^\\.("+I+")"),TAG:new RegExp("^("+I+"|[*])"),ATTR:new RegExp("^"+W),PSEUDO:new RegExp("^"+$),CHILD:new RegExp("^:(only|first|last|nth|nth-last)-(child|of-type)(?:\\("+M+"*(even|odd|(([+-]|)(\\d*)n|)"+M+"*(?:([+-]|)"+M+"*(\\d+)|))"+M+"*\\)|)","i"),bool:new RegExp("^(?:"+R+")$","i"),needsContext:new RegExp("^"+M+"*[>+~]|:(even|odd|eq|gt|lt|nth|first|last)(?:\\("+M+"*((?:-\\d)?\\d*)"+M+"*\\)|)(?=[^-]|$)","i")},Y=/HTML$/i,Q=/^(?:input|select|textarea|button)$/i,J=/^h\d$/i,K=/^[^{]+\{\s*\[native \w/,Z=/^(?:#([\w-]+)|(\w+)|\.([\w-]+))$/,ee=/[+~]/,te=new RegExp("\\\\([\\da-f]{1,6}"+M+"?|("+M+")|.)","ig"),ne=function(e,t,n){var r="0x"+t-65536;return r!=r||n?t:r<0?String.fromCharCode(r+65536):String.fromCharCode(r>>10|55296,1023&r|56320)},re=/([\0-\x1f\x7f]|^-?\d)|^-$|[^\0-\x1f\x7f-\uFFFF\w-]/g,ie=function(e,t){return t?"\0"===e?"\ufffd":e.slice(0,-1)+"\\"+e.charCodeAt(e.length-1).toString(16)+" ":"\\"+e},oe=function(){T()},ae=be(function(e){return!0===e.disabled&&"fieldset"===e.nodeName.toLowerCase()},{dir:"parentNode",next:"legend"});try{H.apply(t=O.call(m.childNodes),m.childNodes),t[m.childNodes.length].nodeType}catch(e){H={apply:t.length?function(e,t){L.apply(e,O.call(t))}:function(e,t){var n=e.length,r=0;while(e[n++]=t[r++]);e.length=n-1}}}function se(t,e,n,r){var i,o,a,s,u,l,c,f=e&&e.ownerDocument,p=e?e.nodeType:9;if(n=n||[],"string"!=typeof t||!t||1!==p&&9!==p&&11!==p)return n;if(!r&&((e?e.ownerDocument||e:m)!==C&&T(e),e=e||C,E)){if(11!==p&&(u=Z.exec(t)))if(i=u[1]){if(9===p){if(!(a=e.getElementById(i)))return n;if(a.id===i)return n.push(a),n}else if(f&&(a=f.getElementById(i))&&y(e,a)&&a.id===i)return n.push(a),n}else{if(u[2])return H.apply(n,e.getElementsByTagName(t)),n;if((i=u[3])&&d.getElementsByClassName&&e.getElementsByClassName)return H.apply(n,e.getElementsByClassName(i)),n}if(d.qsa&&!A[t+" "]&&(!v||!v.test(t))&&(1!==p||"object"!==e.nodeName.toLowerCase())){if(c=t,f=e,1===p&&U.test(t)){(s=e.getAttribute("id"))?s=s.replace(re,ie):e.setAttribute("id",s=k),o=(l=h(t)).length;while(o--)l[o]="#"+s+" "+xe(l[o]);c=l.join(","),f=ee.test(t)&&ye(e.parentNode)||e}try{return H.apply(n,f.querySelectorAll(c)),n}catch(e){A(t,!0)}finally{s===k&&e.removeAttribute("id")}}}return g(t.replace(B,"$1"),e,n,r)}function ue(){var r=[];return function e(t,n){return r.push(t+" ")>b.cacheLength&&delete e[r.shift()],e[t+" "]=n}}function le(e){return e[k]=!0,e}function ce(e){var t=C.createElement("fieldset");try{return!!e(t)}catch(e){return!1}finally{t.parentNode&&t.parentNode.removeChild(t),t=null}}function fe(e,t){var n=e.split("|"),r=n.length;while(r--)b.attrHandle[n[r]]=t}function pe(e,t){var n=t&&e,r=n&&1===e.nodeType&&1===t.nodeType&&e.sourceIndex-t.sourceIndex;if(r)return r;if(n)while(n=n.nextSibling)if(n===t)return-1;return e?1:-1}function de(t){return function(e){return"input"===e.nodeName.toLowerCase()&&e.type===t}}function he(n){return function(e){var t=e.nodeName.toLowerCase();return("input"===t||"button"===t)&&e.type===n}}function ge(t){return function(e){return"form"in e?e.parentNode&&!1===e.disabled?"label"in e?"label"in e.parentNode?e.parentNode.disabled===t:e.disabled===t:e.isDisabled===t||e.isDisabled!==!t&&ae(e)===t:e.disabled===t:"label"in e&&e.disabled===t}}function ve(a){return le(function(o){return o=+o,le(function(e,t){var n,r=a([],e.length,o),i=r.length;while(i--)e[n=r[i]]&&(e[n]=!(t[n]=e[n]))})})}function ye(e){return e&&"undefined"!=typeof e.getElementsByTagName&&e}for(e in d=se.support={},i=se.isXML=function(e){var t=e.namespaceURI,n=(e.ownerDocument||e).documentElement;return!Y.test(t||n&&n.nodeName||"HTML")},T=se.setDocument=function(e){var t,n,r=e?e.ownerDocument||e:m;return r!==C&&9===r.nodeType&&r.documentElement&&(a=(C=r).documentElement,E=!i(C),m!==C&&(n=C.defaultView)&&n.top!==n&&(n.addEventListener?n.addEventListener("unload",oe,!1):n.attachEvent&&n.attachEvent("onunload",oe)),d.attributes=ce(function(e){return e.className="i",!e.getAttribute("className")}),d.getElementsByTagName=ce(function(e){return e.appendChild(C.createComment("")),!e.getElementsByTagName("*").length}),d.getElementsByClassName=K.test(C.getElementsByClassName),d.getById=ce(function(e){return a.appendChild(e).id=k,!C.getElementsByName||!C.getElementsByName(k).length}),d.getById?(b.filter.ID=function(e){var t=e.replace(te,ne);return function(e){return e.getAttribute("id")===t}},b.find.ID=function(e,t){if("undefined"!=typeof t.getElementById&&E){var n=t.getElementById(e);return n?[n]:[]}}):(b.filter.ID=function(e){var n=e.replace(te,ne);return function(e){var t="undefined"!=typeof e.getAttributeNode&&e.getAttributeNode("id");return t&&t.value===n}},b.find.ID=function(e,t){if("undefined"!=typeof t.getElementById&&E){var n,r,i,o=t.getElementById(e);if(o){if((n=o.getAttributeNode("id"))&&n.value===e)return[o];i=t.getElementsByName(e),r=0;while(o=i[r++])if((n=o.getAttributeNode("id"))&&n.value===e)return[o]}return[]}}),b.find.TAG=d.getElementsByTagName?function(e,t){return"undefined"!=typeof t.getElementsByTagName?t.getElementsByTagName(e):d.qsa?t.querySelectorAll(e):void 0}:function(e,t){var n,r=[],i=0,o=t.getElementsByTagName(e);if("*"===e){while(n=o[i++])1===n.nodeType&&r.push(n);return r}return o},b.find.CLASS=d.getElementsByClassName&&function(e,t){if("undefined"!=typeof t.getElementsByClassName&&E)return t.getElementsByClassName(e)},s=[],v=[],(d.qsa=K.test(C.querySelectorAll))&&(ce(function(e){a.appendChild(e).innerHTML="<a id='"+k+"'></a><select id='"+k+"-\r\\' msallowcapture=''><option selected=''></option></select>",e.querySelectorAll("[msallowcapture^='']").length&&v.push("[*^$]="+M+"*(?:''|\"\")"),e.querySelectorAll("[selected]").length||v.push("\\["+M+"*(?:value|"+R+")"),e.querySelectorAll("[id~="+k+"-]").length||v.push("~="),e.querySelectorAll(":checked").length||v.push(":checked"),e.querySelectorAll("a#"+k+"+*").length||v.push(".#.+[+~]")}),ce(function(e){e.innerHTML="<a href='' disabled='disabled'></a><select disabled='disabled'><option/></select>";var t=C.createElement("input");t.setAttribute("type","hidden"),e.appendChild(t).setAttribute("name","D"),e.querySelectorAll("[name=d]").length&&v.push("name"+M+"*[*^$|!~]?="),2!==e.querySelectorAll(":enabled").length&&v.push(":enabled",":disabled"),a.appendChild(e).disabled=!0,2!==e.querySelectorAll(":disabled").length&&v.push(":enabled",":disabled"),e.querySelectorAll("*,:x"),v.push(",.*:")})),(d.matchesSelector=K.test(c=a.matches||a.webkitMatchesSelector||a.mozMatchesSelector||a.oMatchesSelector||a.msMatchesSelector))&&ce(function(e){d.disconnectedMatch=c.call(e,"*"),c.call(e,"[s!='']:x"),s.push("!=",$)}),v=v.length&&new RegExp(v.join("|")),s=s.length&&new RegExp(s.join("|")),t=K.test(a.compareDocumentPosition),y=t||K.test(a.contains)?function(e,t){var n=9===e.nodeType?e.documentElement:e,r=t&&t.parentNode;return e===r||!(!r||1!==r.nodeType||!(n.contains?n.contains(r):e.compareDocumentPosition&&16&e.compareDocumentPosition(r)))}:function(e,t){if(t)while(t=t.parentNode)if(t===e)return!0;return!1},D=t?function(e,t){if(e===t)return l=!0,0;var n=!e.compareDocumentPosition-!t.compareDocumentPosition;return n||(1&(n=(e.ownerDocument||e)===(t.ownerDocument||t)?e.compareDocumentPosition(t):1)||!d.sortDetached&&t.compareDocumentPosition(e)===n?e===C||e.ownerDocument===m&&y(m,e)?-1:t===C||t.ownerDocument===m&&y(m,t)?1:u?P(u,e)-P(u,t):0:4&n?-1:1)}:function(e,t){if(e===t)return l=!0,0;var n,r=0,i=e.parentNode,o=t.parentNode,a=[e],s=[t];if(!i||!o)return e===C?-1:t===C?1:i?-1:o?1:u?P(u,e)-P(u,t):0;if(i===o)return pe(e,t);n=e;while(n=n.parentNode)a.unshift(n);n=t;while(n=n.parentNode)s.unshift(n);while(a[r]===s[r])r++;return r?pe(a[r],s[r]):a[r]===m?-1:s[r]===m?1:0}),C},se.matches=function(e,t){return se(e,null,null,t)},se.matchesSelector=function(e,t){if((e.ownerDocument||e)!==C&&T(e),d.matchesSelector&&E&&!A[t+" "]&&(!s||!s.test(t))&&(!v||!v.test(t)))try{var n=c.call(e,t);if(n||d.disconnectedMatch||e.document&&11!==e.document.nodeType)return n}catch(e){A(t,!0)}return 0<se(t,C,null,[e]).length},se.contains=function(e,t){return(e.ownerDocument||e)!==C&&T(e),y(e,t)},se.attr=function(e,t){(e.ownerDocument||e)!==C&&T(e);var n=b.attrHandle[t.toLowerCase()],r=n&&j.call(b.attrHandle,t.toLowerCase())?n(e,t,!E):void 0;return void 0!==r?r:d.attributes||!E?e.getAttribute(t):(r=e.getAttributeNode(t))&&r.specified?r.value:null},se.escape=function(e){return(e+"").replace(re,ie)},se.error=function(e){throw new Error("Syntax error, unrecognized expression: "+e)},se.uniqueSort=function(e){var t,n=[],r=0,i=0;if(l=!d.detectDuplicates,u=!d.sortStable&&e.slice(0),e.sort(D),l){while(t=e[i++])t===e[i]&&(r=n.push(i));while(r--)e.splice(n[r],1)}return u=null,e},o=se.getText=function(e){var t,n="",r=0,i=e.nodeType;if(i){if(1===i||9===i||11===i){if("string"==typeof e.textContent)return e.textContent;for(e=e.firstChild;e;e=e.nextSibling)n+=o(e)}else if(3===i||4===i)return e.nodeValue}else while(t=e[r++])n+=o(t);return n},(b=se.selectors={cacheLength:50,createPseudo:le,match:G,attrHandle:{},find:{},relative:{">":{dir:"parentNode",first:!0}," ":{dir:"parentNode"},"+":{dir:"previousSibling",first:!0},"~":{dir:"previousSibling"}},preFilter:{ATTR:function(e){return e[1]=e[1].replace(te,ne),e[3]=(e[3]||e[4]||e[5]||"").replace(te,ne),"~="===e[2]&&(e[3]=" "+e[3]+" "),e.slice(0,4)},CHILD:function(e){return e[1]=e[1].toLowerCase(),"nth"===e[1].slice(0,3)?(e[3]||se.error(e[0]),e[4]=+(e[4]?e[5]+(e[6]||1):2*("even"===e[3]||"odd"===e[3])),e[5]=+(e[7]+e[8]||"odd"===e[3])):e[3]&&se.error(e[0]),e},PSEUDO:function(e){var t,n=!e[6]&&e[2];return G.CHILD.test(e[0])?null:(e[3]?e[2]=e[4]||e[5]||"":n&&X.test(n)&&(t=h(n,!0))&&(t=n.indexOf(")",n.length-t)-n.length)&&(e[0]=e[0].slice(0,t),e[2]=n.slice(0,t)),e.slice(0,3))}},filter:{TAG:function(e){var t=e.replace(te,ne).toLowerCase();return"*"===e?function(){return!0}:function(e){return e.nodeName&&e.nodeName.toLowerCase()===t}},CLASS:function(e){var t=p[e+" "];return t||(t=new RegExp("(^|"+M+")"+e+"("+M+"|$)"))&&p(e,function(e){return t.test("string"==typeof e.className&&e.className||"undefined"!=typeof e.getAttribute&&e.getAttribute("class")||"")})},ATTR:function(n,r,i){return function(e){var t=se.attr(e,n);return null==t?"!="===r:!r||(t+="","="===r?t===i:"!="===r?t!==i:"^="===r?i&&0===t.indexOf(i):"*="===r?i&&-1<t.indexOf(i):"$="===r?i&&t.slice(-i.length)===i:"~="===r?-1<(" "+t.replace(F," ")+" ").indexOf(i):"|="===r&&(t===i||t.slice(0,i.length+1)===i+"-"))}},CHILD:function(h,e,t,g,v){var y="nth"!==h.slice(0,3),m="last"!==h.slice(-4),x="of-type"===e;return 1===g&&0===v?function(e){return!!e.parentNode}:function(e,t,n){var r,i,o,a,s,u,l=y!==m?"nextSibling":"previousSibling",c=e.parentNode,f=x&&e.nodeName.toLowerCase(),p=!n&&!x,d=!1;if(c){if(y){while(l){a=e;while(a=a[l])if(x?a.nodeName.toLowerCase()===f:1===a.nodeType)return!1;u=l="only"===h&&!u&&"nextSibling"}return!0}if(u=[m?c.firstChild:c.lastChild],m&&p){d=(s=(r=(i=(o=(a=c)[k]||(a[k]={}))[a.uniqueID]||(o[a.uniqueID]={}))[h]||[])[0]===S&&r[1])&&r[2],a=s&&c.childNodes[s];while(a=++s&&a&&a[l]||(d=s=0)||u.pop())if(1===a.nodeType&&++d&&a===e){i[h]=[S,s,d];break}}else if(p&&(d=s=(r=(i=(o=(a=e)[k]||(a[k]={}))[a.uniqueID]||(o[a.uniqueID]={}))[h]||[])[0]===S&&r[1]),!1===d)while(a=++s&&a&&a[l]||(d=s=0)||u.pop())if((x?a.nodeName.toLowerCase()===f:1===a.nodeType)&&++d&&(p&&((i=(o=a[k]||(a[k]={}))[a.uniqueID]||(o[a.uniqueID]={}))[h]=[S,d]),a===e))break;return(d-=v)===g||d%g==0&&0<=d/g}}},PSEUDO:function(e,o){var t,a=b.pseudos[e]||b.setFilters[e.toLowerCase()]||se.error("unsupported pseudo: "+e);return a[k]?a(o):1<a.length?(t=[e,e,"",o],b.setFilters.hasOwnProperty(e.toLowerCase())?le(function(e,t){var n,r=a(e,o),i=r.length;while(i--)e[n=P(e,r[i])]=!(t[n]=r[i])}):function(e){return a(e,0,t)}):a}},pseudos:{not:le(function(e){var r=[],i=[],s=f(e.replace(B,"$1"));return s[k]?le(function(e,t,n,r){var i,o=s(e,null,r,[]),a=e.length;while(a--)(i=o[a])&&(e[a]=!(t[a]=i))}):function(e,t,n){return r[0]=e,s(r,null,n,i),r[0]=null,!i.pop()}}),has:le(function(t){return function(e){return 0<se(t,e).length}}),contains:le(function(t){return t=t.replace(te,ne),function(e){return-1<(e.textContent||o(e)).indexOf(t)}}),lang:le(function(n){return V.test(n||"")||se.error("unsupported lang: "+n),n=n.replace(te,ne).toLowerCase(),function(e){var t;do{if(t=E?e.lang:e.getAttribute("xml:lang")||e.getAttribute("lang"))return(t=t.toLowerCase())===n||0===t.indexOf(n+"-")}while((e=e.parentNode)&&1===e.nodeType);return!1}}),target:function(e){var t=n.location&&n.location.hash;return t&&t.slice(1)===e.id},root:function(e){return e===a},focus:function(e){return e===C.activeElement&&(!C.hasFocus||C.hasFocus())&&!!(e.type||e.href||~e.tabIndex)},enabled:ge(!1),disabled:ge(!0),checked:function(e){var t=e.nodeName.toLowerCase();return"input"===t&&!!e.checked||"option"===t&&!!e.selected},selected:function(e){return e.parentNode&&e.parentNode.selectedIndex,!0===e.selected},empty:function(e){for(e=e.firstChild;e;e=e.nextSibling)if(e.nodeType<6)return!1;return!0},parent:function(e){return!b.pseudos.empty(e)},header:function(e){return J.test(e.nodeName)},input:function(e){return Q.test(e.nodeName)},button:function(e){var t=e.nodeName.toLowerCase();return"input"===t&&"button"===e.type||"button"===t},text:function(e){var t;return"input"===e.nodeName.toLowerCase()&&"text"===e.type&&(null==(t=e.getAttribute("type"))||"text"===t.toLowerCase())},first:ve(function(){return[0]}),last:ve(function(e,t){return[t-1]}),eq:ve(function(e,t,n){return[n<0?n+t:n]}),even:ve(function(e,t){for(var n=0;n<t;n+=2)e.push(n);return e}),odd:ve(function(e,t){for(var n=1;n<t;n+=2)e.push(n);return e}),lt:ve(function(e,t,n){for(var r=n<0?n+t:t<n?t:n;0<=--r;)e.push(r);return e}),gt:ve(function(e,t,n){for(var r=n<0?n+t:n;++r<t;)e.push(r);return e})}}).pseudos.nth=b.pseudos.eq,{radio:!0,checkbox:!0,file:!0,password:!0,image:!0})b.pseudos[e]=de(e);for(e in{submit:!0,reset:!0})b.pseudos[e]=he(e);function me(){}function xe(e){for(var t=0,n=e.length,r="";t<n;t++)r+=e[t].value;return r}function be(s,e,t){var u=e.dir,l=e.next,c=l||u,f=t&&"parentNode"===c,p=r++;return e.first?function(e,t,n){while(e=e[u])if(1===e.nodeType||f)return s(e,t,n);return!1}:function(e,t,n){var r,i,o,a=[S,p];if(n){while(e=e[u])if((1===e.nodeType||f)&&s(e,t,n))return!0}else while(e=e[u])if(1===e.nodeType||f)if(i=(o=e[k]||(e[k]={}))[e.uniqueID]||(o[e.uniqueID]={}),l&&l===e.nodeName.toLowerCase())e=e[u]||e;else{if((r=i[c])&&r[0]===S&&r[1]===p)return a[2]=r[2];if((i[c]=a)[2]=s(e,t,n))return!0}return!1}}function we(i){return 1<i.length?function(e,t,n){var r=i.length;while(r--)if(!i[r](e,t,n))return!1;return!0}:i[0]}function Te(e,t,n,r,i){for(var o,a=[],s=0,u=e.length,l=null!=t;s<u;s++)(o=e[s])&&(n&&!n(o,r,i)||(a.push(o),l&&t.push(s)));return a}function Ce(d,h,g,v,y,e){return v&&!v[k]&&(v=Ce(v)),y&&!y[k]&&(y=Ce(y,e)),le(function(e,t,n,r){var i,o,a,s=[],u=[],l=t.length,c=e||function(e,t,n){for(var r=0,i=t.length;r<i;r++)se(e,t[r],n);return n}(h||"*",n.nodeType?[n]:n,[]),f=!d||!e&&h?c:Te(c,s,d,n,r),p=g?y||(e?d:l||v)?[]:t:f;if(g&&g(f,p,n,r),v){i=Te(p,u),v(i,[],n,r),o=i.length;while(o--)(a=i[o])&&(p[u[o]]=!(f[u[o]]=a))}if(e){if(y||d){if(y){i=[],o=p.length;while(o--)(a=p[o])&&i.push(f[o]=a);y(null,p=[],i,r)}o=p.length;while(o--)(a=p[o])&&-1<(i=y?P(e,a):s[o])&&(e[i]=!(t[i]=a))}}else p=Te(p===t?p.splice(l,p.length):p),y?y(null,t,p,r):H.apply(t,p)})}function Ee(e){for(var i,t,n,r=e.length,o=b.relative[e[0].type],a=o||b.relative[" "],s=o?1:0,u=be(function(e){return e===i},a,!0),l=be(function(e){return-1<P(i,e)},a,!0),c=[function(e,t,n){var r=!o&&(n||t!==w)||((i=t).nodeType?u(e,t,n):l(e,t,n));return i=null,r}];s<r;s++)if(t=b.relative[e[s].type])c=[be(we(c),t)];else{if((t=b.filter[e[s].type].apply(null,e[s].matches))[k]){for(n=++s;n<r;n++)if(b.relative[e[n].type])break;return Ce(1<s&&we(c),1<s&&xe(e.slice(0,s-1).concat({value:" "===e[s-2].type?"*":""})).replace(B,"$1"),t,s<n&&Ee(e.slice(s,n)),n<r&&Ee(e=e.slice(n)),n<r&&xe(e))}c.push(t)}return we(c)}return me.prototype=b.filters=b.pseudos,b.setFilters=new me,h=se.tokenize=function(e,t){var n,r,i,o,a,s,u,l=x[e+" "];if(l)return t?0:l.slice(0);a=e,s=[],u=b.preFilter;while(a){for(o in n&&!(r=_.exec(a))||(r&&(a=a.slice(r[0].length)||a),s.push(i=[])),n=!1,(r=z.exec(a))&&(n=r.shift(),i.push({value:n,type:r[0].replace(B," ")}),a=a.slice(n.length)),b.filter)!(r=G[o].exec(a))||u[o]&&!(r=u[o](r))||(n=r.shift(),i.push({value:n,type:o,matches:r}),a=a.slice(n.length));if(!n)break}return t?a.length:a?se.error(e):x(e,s).slice(0)},f=se.compile=function(e,t){var n,v,y,m,x,r,i=[],o=[],a=N[e+" "];if(!a){t||(t=h(e)),n=t.length;while(n--)(a=Ee(t[n]))[k]?i.push(a):o.push(a);(a=N(e,(v=o,m=0<(y=i).length,x=0<v.length,r=function(e,t,n,r,i){var o,a,s,u=0,l="0",c=e&&[],f=[],p=w,d=e||x&&b.find.TAG("*",i),h=S+=null==p?1:Math.random()||.1,g=d.length;for(i&&(w=t===C||t||i);l!==g&&null!=(o=d[l]);l++){if(x&&o){a=0,t||o.ownerDocument===C||(T(o),n=!E);while(s=v[a++])if(s(o,t||C,n)){r.push(o);break}i&&(S=h)}m&&((o=!s&&o)&&u--,e&&c.push(o))}if(u+=l,m&&l!==u){a=0;while(s=y[a++])s(c,f,t,n);if(e){if(0<u)while(l--)c[l]||f[l]||(f[l]=q.call(r));f=Te(f)}H.apply(r,f),i&&!e&&0<f.length&&1<u+y.length&&se.uniqueSort(r)}return i&&(S=h,w=p),c},m?le(r):r))).selector=e}return a},g=se.select=function(e,t,n,r){var i,o,a,s,u,l="function"==typeof e&&e,c=!r&&h(e=l.selector||e);if(n=n||[],1===c.length){if(2<(o=c[0]=c[0].slice(0)).length&&"ID"===(a=o[0]).type&&9===t.nodeType&&E&&b.relative[o[1].type]){if(!(t=(b.find.ID(a.matches[0].replace(te,ne),t)||[])[0]))return n;l&&(t=t.parentNode),e=e.slice(o.shift().value.length)}i=G.needsContext.test(e)?0:o.length;while(i--){if(a=o[i],b.relative[s=a.type])break;if((u=b.find[s])&&(r=u(a.matches[0].replace(te,ne),ee.test(o[0].type)&&ye(t.parentNode)||t))){if(o.splice(i,1),!(e=r.length&&xe(o)))return H.apply(n,r),n;break}}}return(l||f(e,c))(r,t,!E,n,!t||ee.test(e)&&ye(t.parentNode)||t),n},d.sortStable=k.split("").sort(D).join("")===k,d.detectDuplicates=!!l,T(),d.sortDetached=ce(function(e){return 1&e.compareDocumentPosition(C.createElement("fieldset"))}),ce(function(e){return e.innerHTML="<a href='#'></a>","#"===e.firstChild.getAttribute("href")})||fe("type|href|height|width",function(e,t,n){if(!n)return e.getAttribute(t,"type"===t.toLowerCase()?1:2)}),d.attributes&&ce(function(e){return e.innerHTML="<input/>",e.firstChild.setAttribute("value",""),""===e.firstChild.getAttribute("value")})||fe("value",function(e,t,n){if(!n&&"input"===e.nodeName.toLowerCase())return e.defaultValue}),ce(function(e){return null==e.getAttribute("disabled")})||fe(R,function(e,t,n){var r;if(!n)return!0===e[t]?t.toLowerCase():(r=e.getAttributeNode(t))&&r.specified?r.value:null}),se}(C);k.find=h,k.expr=h.selectors,k.expr[":"]=k.expr.pseudos,k.uniqueSort=k.unique=h.uniqueSort,k.text=h.getText,k.isXMLDoc=h.isXML,k.contains=h.contains,k.escapeSelector=h.escape;var T=function(e,t,n){var r=[],i=void 0!==n;while((e=e[t])&&9!==e.nodeType)if(1===e.nodeType){if(i&&k(e).is(n))break;r.push(e)}return r},S=function(e,t){for(var n=[];e;e=e.nextSibling)1===e.nodeType&&e!==t&&n.push(e);return n},N=k.expr.match.needsContext;function A(e,t){return e.nodeName&&e.nodeName.toLowerCase()===t.toLowerCase()}var D=/^<([a-z][^\/\0>:\x20\t\r\n\f]*)[\x20\t\r\n\f]*\/?>(?:<\/\1>|)$/i;function j(e,n,r){return m(n)?k.grep(e,function(e,t){return!!n.call(e,t,e)!==r}):n.nodeType?k.grep(e,function(e){return e===n!==r}):"string"!=typeof n?k.grep(e,function(e){return-1<i.call(n,e)!==r}):k.filter(n,e,r)}k.filter=function(e,t,n){var r=t[0];return n&&(e=":not("+e+")"),1===t.length&&1===r.nodeType?k.find.matchesSelector(r,e)?[r]:[]:k.find.matches(e,k.grep(t,function(e){return 1===e.nodeType}))},k.fn.extend({find:function(e){var t,n,r=this.length,i=this;if("string"!=typeof e)return this.pushStack(k(e).filter(function(){for(t=0;t<r;t++)if(k.contains(i[t],this))return!0}));for(n=this.pushStack([]),t=0;t<r;t++)k.find(e,i[t],n);return 1<r?k.uniqueSort(n):n},filter:function(e){return this.pushStack(j(this,e||[],!1))},not:function(e){return this.pushStack(j(this,e||[],!0))},is:function(e){return!!j(this,"string"==typeof e&&N.test(e)?k(e):e||[],!1).length}});var q,L=/^(?:\s*(<[\w\W]+>)[^>]*|#([\w-]+))$/;(k.fn.init=function(e,t,n){var r,i;if(!e)return this;if(n=n||q,"string"==typeof e){if(!(r="<"===e[0]&&">"===e[e.length-1]&&3<=e.length?[null,e,null]:L.exec(e))||!r[1]&&t)return!t||t.jquery?(t||n).find(e):this.constructor(t).find(e);if(r[1]){if(t=t instanceof k?t[0]:t,k.merge(this,k.parseHTML(r[1],t&&t.nodeType?t.ownerDocument||t:E,!0)),D.test(r[1])&&k.isPlainObject(t))for(r in t)m(this[r])?this[r](t[r]):this.attr(r,t[r]);return this}return(i=E.getElementById(r[2]))&&(this[0]=i,this.length=1),this}return e.nodeType?(this[0]=e,this.length=1,this):m(e)?void 0!==n.ready?n.ready(e):e(k):k.makeArray(e,this)}).prototype=k.fn,q=k(E);var H=/^(?:parents|prev(?:Until|All))/,O={children:!0,contents:!0,next:!0,prev:!0};function P(e,t){while((e=e[t])&&1!==e.nodeType);return e}k.fn.extend({has:function(e){var t=k(e,this),n=t.length;return this.filter(function(){for(var e=0;e<n;e++)if(k.contains(this,t[e]))return!0})},closest:function(e,t){var n,r=0,i=this.length,o=[],a="string"!=typeof e&&k(e);if(!N.test(e))for(;r<i;r++)for(n=this[r];n&&n!==t;n=n.parentNode)if(n.nodeType<11&&(a?-1<a.index(n):1===n.nodeType&&k.find.matchesSelector(n,e))){o.push(n);break}return this.pushStack(1<o.length?k.uniqueSort(o):o)},index:function(e){return e?"string"==typeof e?i.call(k(e),this[0]):i.call(this,e.jquery?e[0]:e):this[0]&&this[0].parentNode?this.first().prevAll().length:-1},add:function(e,t){return this.pushStack(k.uniqueSort(k.merge(this.get(),k(e,t))))},addBack:function(e){return this.add(null==e?this.prevObject:this.prevObject.filter(e))}}),k.each({parent:function(e){var t=e.parentNode;return t&&11!==t.nodeType?t:null},parents:function(e){return T(e,"parentNode")},parentsUntil:function(e,t,n){return T(e,"parentNode",n)},next:function(e){return P(e,"nextSibling")},prev:function(e){return P(e,"previousSibling")},nextAll:function(e){return T(e,"nextSibling")},prevAll:function(e){return T(e,"previousSibling")},nextUntil:function(e,t,n){return T(e,"nextSibling",n)},prevUntil:function(e,t,n){return T(e,"previousSibling",n)},siblings:function(e){return S((e.parentNode||{}).firstChild,e)},children:function(e){return S(e.firstChild)},contents:function(e){return"undefined"!=typeof e.contentDocument?e.contentDocument:(A(e,"template")&&(e=e.content||e),k.merge([],e.childNodes))}},function(r,i){k.fn[r]=function(e,t){var n=k.map(this,i,e);return"Until"!==r.slice(-5)&&(t=e),t&&"string"==typeof t&&(n=k.filter(t,n)),1<this.length&&(O[r]||k.uniqueSort(n),H.test(r)&&n.reverse()),this.pushStack(n)}});var R=/[^\x20\t\r\n\f]+/g;function M(e){return e}function I(e){throw e}function W(e,t,n,r){var i;try{e&&m(i=e.promise)?i.call(e).done(t).fail(n):e&&m(i=e.then)?i.call(e,t,n):t.apply(void 0,[e].slice(r))}catch(e){n.apply(void 0,[e])}}k.Callbacks=function(r){var e,n;r="string"==typeof r?(e=r,n={},k.each(e.match(R)||[],function(e,t){n[t]=!0}),n):k.extend({},r);var i,t,o,a,s=[],u=[],l=-1,c=function(){for(a=a||r.once,o=i=!0;u.length;l=-1){t=u.shift();while(++l<s.length)!1===s[l].apply(t[0],t[1])&&r.stopOnFalse&&(l=s.length,t=!1)}r.memory||(t=!1),i=!1,a&&(s=t?[]:"")},f={add:function(){return s&&(t&&!i&&(l=s.length-1,u.push(t)),function n(e){k.each(e,function(e,t){m(t)?r.unique&&f.has(t)||s.push(t):t&&t.length&&"string"!==w(t)&&n(t)})}(arguments),t&&!i&&c()),this},remove:function(){return k.each(arguments,function(e,t){var n;while(-1<(n=k.inArray(t,s,n)))s.splice(n,1),n<=l&&l--}),this},has:function(e){return e?-1<k.inArray(e,s):0<s.length},empty:function(){return s&&(s=[]),this},disable:function(){return a=u=[],s=t="",this},disabled:function(){return!s},lock:function(){return a=u=[],t||i||(s=t=""),this},locked:function(){return!!a},fireWith:function(e,t){return a||(t=[e,(t=t||[]).slice?t.slice():t],u.push(t),i||c()),this},fire:function(){return f.fireWith(this,arguments),this},fired:function(){return!!o}};return f},k.extend({Deferred:function(e){var o=[["notify","progress",k.Callbacks("memory"),k.Callbacks("memory"),2],["resolve","done",k.Callbacks("once memory"),k.Callbacks("once memory"),0,"resolved"],["reject","fail",k.Callbacks("once memory"),k.Callbacks("once memory"),1,"rejected"]],i="pending",a={state:function(){return i},always:function(){return s.done(arguments).fail(arguments),this},"catch":function(e){return a.then(null,e)},pipe:function(){var i=arguments;return k.Deferred(function(r){k.each(o,function(e,t){var n=m(i[t[4]])&&i[t[4]];s[t[1]](function(){var e=n&&n.apply(this,arguments);e&&m(e.promise)?e.promise().progress(r.notify).done(r.resolve).fail(r.reject):r[t[0]+"With"](this,n?[e]:arguments)})}),i=null}).promise()},then:function(t,n,r){var u=0;function l(i,o,a,s){return function(){var n=this,r=arguments,e=function(){var e,t;if(!(i<u)){if((e=a.apply(n,r))===o.promise())throw new TypeError("Thenable self-resolution");t=e&&("object"==typeof e||"function"==typeof e)&&e.then,m(t)?s?t.call(e,l(u,o,M,s),l(u,o,I,s)):(u++,t.call(e,l(u,o,M,s),l(u,o,I,s),l(u,o,M,o.notifyWith))):(a!==M&&(n=void 0,r=[e]),(s||o.resolveWith)(n,r))}},t=s?e:function(){try{e()}catch(e){k.Deferred.exceptionHook&&k.Deferred.exceptionHook(e,t.stackTrace),u<=i+1&&(a!==I&&(n=void 0,r=[e]),o.rejectWith(n,r))}};i?t():(k.Deferred.getStackHook&&(t.stackTrace=k.Deferred.getStackHook()),C.setTimeout(t))}}return k.Deferred(function(e){o[0][3].add(l(0,e,m(r)?r:M,e.notifyWith)),o[1][3].add(l(0,e,m(t)?t:M)),o[2][3].add(l(0,e,m(n)?n:I))}).promise()},promise:function(e){return null!=e?k.extend(e,a):a}},s={};return k.each(o,function(e,t){var n=t[2],r=t[5];a[t[1]]=n.add,r&&n.add(function(){i=r},o[3-e][2].disable,o[3-e][3].disable,o[0][2].lock,o[0][3].lock),n.add(t[3].fire),s[t[0]]=function(){return s[t[0]+"With"](this===s?void 0:this,arguments),this},s[t[0]+"With"]=n.fireWith}),a.promise(s),e&&e.call(s,s),s},when:function(e){var n=arguments.length,t=n,r=Array(t),i=s.call(arguments),o=k.Deferred(),a=function(t){return function(e){r[t]=this,i[t]=1<arguments.length?s.call(arguments):e,--n||o.resolveWith(r,i)}};if(n<=1&&(W(e,o.done(a(t)).resolve,o.reject,!n),"pending"===o.state()||m(i[t]&&i[t].then)))return o.then();while(t--)W(i[t],a(t),o.reject);return o.promise()}});var $=/^(Eval|Internal|Range|Reference|Syntax|Type|URI)Error$/;k.Deferred.exceptionHook=function(e,t){C.console&&C.console.warn&&e&&$.test(e.name)&&C.console.warn("jQuery.Deferred exception: "+e.message,e.stack,t)},k.readyException=function(e){C.setTimeout(function(){throw e})};var F=k.Deferred();function B(){E.removeEventListener("DOMContentLoaded",B),C.removeEventListener("load",B),k.ready()}k.fn.ready=function(e){return F.then(e)["catch"](function(e){k.readyException(e)}),this},k.extend({isReady:!1,readyWait:1,ready:function(e){(!0===e?--k.readyWait:k.isReady)||(k.isReady=!0)!==e&&0<--k.readyWait||F.resolveWith(E,[k])}}),k.ready.then=F.then,"complete"===E.readyState||"loading"!==E.readyState&&!E.documentElement.doScroll?C.setTimeout(k.ready):(E.addEventListener("DOMContentLoaded",B),C.addEventListener("load",B));var _=function(e,t,n,r,i,o,a){var s=0,u=e.length,l=null==n;if("object"===w(n))for(s in i=!0,n)_(e,t,s,n[s],!0,o,a);else if(void 0!==r&&(i=!0,m(r)||(a=!0),l&&(a?(t.call(e,r),t=null):(l=t,t=function(e,t,n){return l.call(k(e),n)})),t))for(;s<u;s++)t(e[s],n,a?r:r.call(e[s],s,t(e[s],n)));return i?e:l?t.call(e):u?t(e[0],n):o},z=/^-ms-/,U=/-([a-z])/g;function X(e,t){return t.toUpperCase()}function V(e){return e.replace(z,"ms-").replace(U,X)}var G=function(e){return 1===e.nodeType||9===e.nodeType||!+e.nodeType};function Y(){this.expando=k.expando+Y.uid++}Y.uid=1,Y.prototype={cache:function(e){var t=e[this.expando];return t||(t={},G(e)&&(e.nodeType?e[this.expando]=t:Object.defineProperty(e,this.expando,{value:t,configurable:!0}))),t},set:function(e,t,n){var r,i=this.cache(e);if("string"==typeof t)i[V(t)]=n;else for(r in t)i[V(r)]=t[r];return i},get:function(e,t){return void 0===t?this.cache(e):e[this.expando]&&e[this.expando][V(t)]},access:function(e,t,n){return void 0===t||t&&"string"==typeof t&&void 0===n?this.get(e,t):(this.set(e,t,n),void 0!==n?n:t)},remove:function(e,t){var n,r=e[this.expando];if(void 0!==r){if(void 0!==t){n=(t=Array.isArray(t)?t.map(V):(t=V(t))in r?[t]:t.match(R)||[]).length;while(n--)delete r[t[n]]}(void 0===t||k.isEmptyObject(r))&&(e.nodeType?e[this.expando]=void 0:delete e[this.expando])}},hasData:function(e){var t=e[this.expando];return void 0!==t&&!k.isEmptyObject(t)}};var Q=new Y,J=new Y,K=/^(?:\{[\w\W]*\}|\[[\w\W]*\])$/,Z=/[A-Z]/g;function ee(e,t,n){var r,i;if(void 0===n&&1===e.nodeType)if(r="data-"+t.replace(Z,"-$&").toLowerCase(),"string"==typeof(n=e.getAttribute(r))){try{n="true"===(i=n)||"false"!==i&&("null"===i?null:i===+i+""?+i:K.test(i)?JSON.parse(i):i)}catch(e){}J.set(e,t,n)}else n=void 0;return n}k.extend({hasData:function(e){return J.hasData(e)||Q.hasData(e)},data:function(e,t,n){return J.access(e,t,n)},removeData:function(e,t){J.remove(e,t)},_data:function(e,t,n){return Q.access(e,t,n)},_removeData:function(e,t){Q.remove(e,t)}}),k.fn.extend({data:function(n,e){var t,r,i,o=this[0],a=o&&o.attributes;if(void 0===n){if(this.length&&(i=J.get(o),1===o.nodeType&&!Q.get(o,"hasDataAttrs"))){t=a.length;while(t--)a[t]&&0===(r=a[t].name).indexOf("data-")&&(r=V(r.slice(5)),ee(o,r,i[r]));Q.set(o,"hasDataAttrs",!0)}return i}return"object"==typeof n?this.each(function(){J.set(this,n)}):_(this,function(e){var t;if(o&&void 0===e)return void 0!==(t=J.get(o,n))?t:void 0!==(t=ee(o,n))?t:void 0;this.each(function(){J.set(this,n,e)})},null,e,1<arguments.length,null,!0)},removeData:function(e){return this.each(function(){J.remove(this,e)})}}),k.extend({queue:function(e,t,n){var r;if(e)return t=(t||"fx")+"queue",r=Q.get(e,t),n&&(!r||Array.isArray(n)?r=Q.access(e,t,k.makeArray(n)):r.push(n)),r||[]},dequeue:function(e,t){t=t||"fx";var n=k.queue(e,t),r=n.length,i=n.shift(),o=k._queueHooks(e,t);"inprogress"===i&&(i=n.shift(),r--),i&&("fx"===t&&n.unshift("inprogress"),delete o.stop,i.call(e,function(){k.dequeue(e,t)},o)),!r&&o&&o.empty.fire()},_queueHooks:function(e,t){var n=t+"queueHooks";return Q.get(e,n)||Q.access(e,n,{empty:k.Callbacks("once memory").add(function(){Q.remove(e,[t+"queue",n])})})}}),k.fn.extend({queue:function(t,n){var e=2;return"string"!=typeof t&&(n=t,t="fx",e--),arguments.length<e?k.queue(this[0],t):void 0===n?this:this.each(function(){var e=k.queue(this,t,n);k._queueHooks(this,t),"fx"===t&&"inprogress"!==e[0]&&k.dequeue(this,t)})},dequeue:function(e){return this.each(function(){k.dequeue(this,e)})},clearQueue:function(e){return this.queue(e||"fx",[])},promise:function(e,t){var n,r=1,i=k.Deferred(),o=this,a=this.length,s=function(){--r||i.resolveWith(o,[o])};"string"!=typeof e&&(t=e,e=void 0),e=e||"fx";while(a--)(n=Q.get(o[a],e+"queueHooks"))&&n.empty&&(r++,n.empty.add(s));return s(),i.promise(t)}});var te=/[+-]?(?:\d*\.|)\d+(?:[eE][+-]?\d+|)/.source,ne=new RegExp("^(?:([+-])=|)("+te+")([a-z%]*)$","i"),re=["Top","Right","Bottom","Left"],ie=E.documentElement,oe=function(e){return k.contains(e.ownerDocument,e)},ae={composed:!0};ie.getRootNode&&(oe=function(e){return k.contains(e.ownerDocument,e)||e.getRootNode(ae)===e.ownerDocument});var se=function(e,t){return"none"===(e=t||e).style.display||""===e.style.display&&oe(e)&&"none"===k.css(e,"display")},ue=function(e,t,n,r){var i,o,a={};for(o in t)a[o]=e.style[o],e.style[o]=t[o];for(o in i=n.apply(e,r||[]),t)e.style[o]=a[o];return i};function le(e,t,n,r){var i,o,a=20,s=r?function(){return r.cur()}:function(){return k.css(e,t,"")},u=s(),l=n&&n[3]||(k.cssNumber[t]?"":"px"),c=e.nodeType&&(k.cssNumber[t]||"px"!==l&&+u)&&ne.exec(k.css(e,t));if(c&&c[3]!==l){u/=2,l=l||c[3],c=+u||1;while(a--)k.style(e,t,c+l),(1-o)*(1-(o=s()/u||.5))<=0&&(a=0),c/=o;c*=2,k.style(e,t,c+l),n=n||[]}return n&&(c=+c||+u||0,i=n[1]?c+(n[1]+1)*n[2]:+n[2],r&&(r.unit=l,r.start=c,r.end=i)),i}var ce={};function fe(e,t){for(var n,r,i,o,a,s,u,l=[],c=0,f=e.length;c<f;c++)(r=e[c]).style&&(n=r.style.display,t?("none"===n&&(l[c]=Q.get(r,"display")||null,l[c]||(r.style.display="")),""===r.style.display&&se(r)&&(l[c]=(u=a=o=void 0,a=(i=r).ownerDocument,s=i.nodeName,(u=ce[s])||(o=a.body.appendChild(a.createElement(s)),u=k.css(o,"display"),o.parentNode.removeChild(o),"none"===u&&(u="block"),ce[s]=u)))):"none"!==n&&(l[c]="none",Q.set(r,"display",n)));for(c=0;c<f;c++)null!=l[c]&&(e[c].style.display=l[c]);return e}k.fn.extend({show:function(){return fe(this,!0)},hide:function(){return fe(this)},toggle:function(e){return"boolean"==typeof e?e?this.show():this.hide():this.each(function(){se(this)?k(this).show():k(this).hide()})}});var pe=/^(?:checkbox|radio)$/i,de=/<([a-z][^\/\0>\x20\t\r\n\f]*)/i,he=/^$|^module$|\/(?:java|ecma)script/i,ge={option:[1,"<select multiple='multiple'>","</select>"],thead:[1,"<table>","</table>"],col:[2,"<table><colgroup>","</colgroup></table>"],tr:[2,"<table><tbody>","</tbody></table>"],td:[3,"<table><tbody><tr>","</tr></tbody></table>"],_default:[0,"",""]};function ve(e,t){var n;return n="undefined"!=typeof e.getElementsByTagName?e.getElementsByTagName(t||"*"):"undefined"!=typeof e.querySelectorAll?e.querySelectorAll(t||"*"):[],void 0===t||t&&A(e,t)?k.merge([e],n):n}function ye(e,t){for(var n=0,r=e.length;n<r;n++)Q.set(e[n],"globalEval",!t||Q.get(t[n],"globalEval"))}ge.optgroup=ge.option,ge.tbody=ge.tfoot=ge.colgroup=ge.caption=ge.thead,ge.th=ge.td;var me,xe,be=/<|&#?\w+;/;function we(e,t,n,r,i){for(var o,a,s,u,l,c,f=t.createDocumentFragment(),p=[],d=0,h=e.length;d<h;d++)if((o=e[d])||0===o)if("object"===w(o))k.merge(p,o.nodeType?[o]:o);else if(be.test(o)){a=a||f.appendChild(t.createElement("div")),s=(de.exec(o)||["",""])[1].toLowerCase(),u=ge[s]||ge._default,a.innerHTML=u[1]+k.htmlPrefilter(o)+u[2],c=u[0];while(c--)a=a.lastChild;k.merge(p,a.childNodes),(a=f.firstChild).textContent=""}else p.push(t.createTextNode(o));f.textContent="",d=0;while(o=p[d++])if(r&&-1<k.inArray(o,r))i&&i.push(o);else if(l=oe(o),a=ve(f.appendChild(o),"script"),l&&ye(a),n){c=0;while(o=a[c++])he.test(o.type||"")&&n.push(o)}return f}me=E.createDocumentFragment().appendChild(E.createElement("div")),(xe=E.createElement("input")).setAttribute("type","radio"),xe.setAttribute("checked","checked"),xe.setAttribute("name","t"),me.appendChild(xe),y.checkClone=me.cloneNode(!0).cloneNode(!0).lastChild.checked,me.innerHTML="<textarea>x</textarea>",y.noCloneChecked=!!me.cloneNode(!0).lastChild.defaultValue;var Te=/^key/,Ce=/^(?:mouse|pointer|contextmenu|drag|drop)|click/,Ee=/^([^.]*)(?:\.(.+)|)/;function ke(){return!0}function Se(){return!1}function Ne(e,t){return e===function(){try{return E.activeElement}catch(e){}}()==("focus"===t)}function Ae(e,t,n,r,i,o){var a,s;if("object"==typeof t){for(s in"string"!=typeof n&&(r=r||n,n=void 0),t)Ae(e,s,n,r,t[s],o);return e}if(null==r&&null==i?(i=n,r=n=void 0):null==i&&("string"==typeof n?(i=r,r=void 0):(i=r,r=n,n=void 0)),!1===i)i=Se;else if(!i)return e;return 1===o&&(a=i,(i=function(e){return k().off(e),a.apply(this,arguments)}).guid=a.guid||(a.guid=k.guid++)),e.each(function(){k.event.add(this,t,i,r,n)})}function De(e,i,o){o?(Q.set(e,i,!1),k.event.add(e,i,{namespace:!1,handler:function(e){var t,n,r=Q.get(this,i);if(1&e.isTrigger&&this[i]){if(r.length)(k.event.special[i]||{}).delegateType&&e.stopPropagation();else if(r=s.call(arguments),Q.set(this,i,r),t=o(this,i),this[i](),r!==(n=Q.get(this,i))||t?Q.set(this,i,!1):n={},r!==n)return e.stopImmediatePropagation(),e.preventDefault(),n.value}else r.length&&(Q.set(this,i,{value:k.event.trigger(k.extend(r[0],k.Event.prototype),r.slice(1),this)}),e.stopImmediatePropagation())}})):void 0===Q.get(e,i)&&k.event.add(e,i,ke)}k.event={global:{},add:function(t,e,n,r,i){var o,a,s,u,l,c,f,p,d,h,g,v=Q.get(t);if(v){n.handler&&(n=(o=n).handler,i=o.selector),i&&k.find.matchesSelector(ie,i),n.guid||(n.guid=k.guid++),(u=v.events)||(u=v.events={}),(a=v.handle)||(a=v.handle=function(e){return"undefined"!=typeof k&&k.event.triggered!==e.type?k.event.dispatch.apply(t,arguments):void 0}),l=(e=(e||"").match(R)||[""]).length;while(l--)d=g=(s=Ee.exec(e[l])||[])[1],h=(s[2]||"").split(".").sort(),d&&(f=k.event.special[d]||{},d=(i?f.delegateType:f.bindType)||d,f=k.event.special[d]||{},c=k.extend({type:d,origType:g,data:r,handler:n,guid:n.guid,selector:i,needsContext:i&&k.expr.match.needsContext.test(i),namespace:h.join(".")},o),(p=u[d])||((p=u[d]=[]).delegateCount=0,f.setup&&!1!==f.setup.call(t,r,h,a)||t.addEventListener&&t.addEventListener(d,a)),f.add&&(f.add.call(t,c),c.handler.guid||(c.handler.guid=n.guid)),i?p.splice(p.delegateCount++,0,c):p.push(c),k.event.global[d]=!0)}},remove:function(e,t,n,r,i){var o,a,s,u,l,c,f,p,d,h,g,v=Q.hasData(e)&&Q.get(e);if(v&&(u=v.events)){l=(t=(t||"").match(R)||[""]).length;while(l--)if(d=g=(s=Ee.exec(t[l])||[])[1],h=(s[2]||"").split(".").sort(),d){f=k.event.special[d]||{},p=u[d=(r?f.delegateType:f.bindType)||d]||[],s=s[2]&&new RegExp("(^|\\.)"+h.join("\\.(?:.*\\.|)")+"(\\.|$)"),a=o=p.length;while(o--)c=p[o],!i&&g!==c.origType||n&&n.guid!==c.guid||s&&!s.test(c.namespace)||r&&r!==c.selector&&("**"!==r||!c.selector)||(p.splice(o,1),c.selector&&p.delegateCount--,f.remove&&f.remove.call(e,c));a&&!p.length&&(f.teardown&&!1!==f.teardown.call(e,h,v.handle)||k.removeEvent(e,d,v.handle),delete u[d])}else for(d in u)k.event.remove(e,d+t[l],n,r,!0);k.isEmptyObject(u)&&Q.remove(e,"handle events")}},dispatch:function(e){var t,n,r,i,o,a,s=k.event.fix(e),u=new Array(arguments.length),l=(Q.get(this,"events")||{})[s.type]||[],c=k.event.special[s.type]||{};for(u[0]=s,t=1;t<arguments.length;t++)u[t]=arguments[t];if(s.delegateTarget=this,!c.preDispatch||!1!==c.preDispatch.call(this,s)){a=k.event.handlers.call(this,s,l),t=0;while((i=a[t++])&&!s.isPropagationStopped()){s.currentTarget=i.elem,n=0;while((o=i.handlers[n++])&&!s.isImmediatePropagationStopped())s.rnamespace&&!1!==o.namespace&&!s.rnamespace.test(o.namespace)||(s.handleObj=o,s.data=o.data,void 0!==(r=((k.event.special[o.origType]||{}).handle||o.handler).apply(i.elem,u))&&!1===(s.result=r)&&(s.preventDefault(),s.stopPropagation()))}return c.postDispatch&&c.postDispatch.call(this,s),s.result}},handlers:function(e,t){var n,r,i,o,a,s=[],u=t.delegateCount,l=e.target;if(u&&l.nodeType&&!("click"===e.type&&1<=e.button))for(;l!==this;l=l.parentNode||this)if(1===l.nodeType&&("click"!==e.type||!0!==l.disabled)){for(o=[],a={},n=0;n<u;n++)void 0===a[i=(r=t[n]).selector+" "]&&(a[i]=r.needsContext?-1<k(i,this).index(l):k.find(i,this,null,[l]).length),a[i]&&o.push(r);o.length&&s.push({elem:l,handlers:o})}return l=this,u<t.length&&s.push({elem:l,handlers:t.slice(u)}),s},addProp:function(t,e){Object.defineProperty(k.Event.prototype,t,{enumerable:!0,configurable:!0,get:m(e)?function(){if(this.originalEvent)return e(this.originalEvent)}:function(){if(this.originalEvent)return this.originalEvent[t]},set:function(e){Object.defineProperty(this,t,{enumerable:!0,configurable:!0,writable:!0,value:e})}})},fix:function(e){return e[k.expando]?e:new k.Event(e)},special:{load:{noBubble:!0},click:{setup:function(e){var t=this||e;return pe.test(t.type)&&t.click&&A(t,"input")&&De(t,"click",ke),!1},trigger:function(e){var t=this||e;return pe.test(t.type)&&t.click&&A(t,"input")&&De(t,"click"),!0},_default:function(e){var t=e.target;return pe.test(t.type)&&t.click&&A(t,"input")&&Q.get(t,"click")||A(t,"a")}},beforeunload:{postDispatch:function(e){void 0!==e.result&&e.originalEvent&&(e.originalEvent.returnValue=e.result)}}}},k.removeEvent=function(e,t,n){e.removeEventListener&&e.removeEventListener(t,n)},k.Event=function(e,t){if(!(this instanceof k.Event))return new k.Event(e,t);e&&e.type?(this.originalEvent=e,this.type=e.type,this.isDefaultPrevented=e.defaultPrevented||void 0===e.defaultPrevented&&!1===e.returnValue?ke:Se,this.target=e.target&&3===e.target.nodeType?e.target.parentNode:e.target,this.currentTarget=e.currentTarget,this.relatedTarget=e.relatedTarget):this.type=e,t&&k.extend(this,t),this.timeStamp=e&&e.timeStamp||Date.now(),this[k.expando]=!0},k.Event.prototype={constructor:k.Event,isDefaultPrevented:Se,isPropagationStopped:Se,isImmediatePropagationStopped:Se,isSimulated:!1,preventDefault:function(){var e=this.originalEvent;this.isDefaultPrevented=ke,e&&!this.isSimulated&&e.preventDefault()},stopPropagation:function(){var e=this.originalEvent;this.isPropagationStopped=ke,e&&!this.isSimulated&&e.stopPropagation()},stopImmediatePropagation:function(){var e=this.originalEvent;this.isImmediatePropagationStopped=ke,e&&!this.isSimulated&&e.stopImmediatePropagation(),this.stopPropagation()}},k.each({altKey:!0,bubbles:!0,cancelable:!0,changedTouches:!0,ctrlKey:!0,detail:!0,eventPhase:!0,metaKey:!0,pageX:!0,pageY:!0,shiftKey:!0,view:!0,"char":!0,code:!0,charCode:!0,key:!0,keyCode:!0,button:!0,buttons:!0,clientX:!0,clientY:!0,offsetX:!0,offsetY:!0,pointerId:!0,pointerType:!0,screenX:!0,screenY:!0,targetTouches:!0,toElement:!0,touches:!0,which:function(e){var t=e.button;return null==e.which&&Te.test(e.type)?null!=e.charCode?e.charCode:e.keyCode:!e.which&&void 0!==t&&Ce.test(e.type)?1&t?1:2&t?3:4&t?2:0:e.which}},k.event.addProp),k.each({focus:"focusin",blur:"focusout"},function(e,t){k.event.special[e]={setup:function(){return De(this,e,Ne),!1},trigger:function(){return De(this,e),!0},delegateType:t}}),k.each({mouseenter:"mouseover",mouseleave:"mouseout",pointerenter:"pointerover",pointerleave:"pointerout"},function(e,i){k.event.special[e]={delegateType:i,bindType:i,handle:function(e){var t,n=e.relatedTarget,r=e.handleObj;return n&&(n===this||k.contains(this,n))||(e.type=r.origType,t=r.handler.apply(this,arguments),e.type=i),t}}}),k.fn.extend({on:function(e,t,n,r){return Ae(this,e,t,n,r)},one:function(e,t,n,r){return Ae(this,e,t,n,r,1)},off:function(e,t,n){var r,i;if(e&&e.preventDefault&&e.handleObj)return r=e.handleObj,k(e.delegateTarget).off(r.namespace?r.origType+"."+r.namespace:r.origType,r.selector,r.handler),this;if("object"==typeof e){for(i in e)this.off(i,t,e[i]);return this}return!1!==t&&"function"!=typeof t||(n=t,t=void 0),!1===n&&(n=Se),this.each(function(){k.event.remove(this,e,n,t)})}});var je=/<(?!area|br|col|embed|hr|img|input|link|meta|param)(([a-z][^\/\0>\x20\t\r\n\f]*)[^>]*)\/>/gi,qe=/<script|<style|<link/i,Le=/checked\s*(?:[^=]|=\s*.checked.)/i,He=/^\s*<!(?:\[CDATA\[|--)|(?:\]\]|--)>\s*$/g;function Oe(e,t){return A(e,"table")&&A(11!==t.nodeType?t:t.firstChild,"tr")&&k(e).children("tbody")[0]||e}function Pe(e){return e.type=(null!==e.getAttribute("type"))+"/"+e.type,e}function Re(e){return"true/"===(e.type||"").slice(0,5)?e.type=e.type.slice(5):e.removeAttribute("type"),e}function Me(e,t){var n,r,i,o,a,s,u,l;if(1===t.nodeType){if(Q.hasData(e)&&(o=Q.access(e),a=Q.set(t,o),l=o.events))for(i in delete a.handle,a.events={},l)for(n=0,r=l[i].length;n<r;n++)k.event.add(t,i,l[i][n]);J.hasData(e)&&(s=J.access(e),u=k.extend({},s),J.set(t,u))}}function Ie(n,r,i,o){r=g.apply([],r);var e,t,a,s,u,l,c=0,f=n.length,p=f-1,d=r[0],h=m(d);if(h||1<f&&"string"==typeof d&&!y.checkClone&&Le.test(d))return n.each(function(e){var t=n.eq(e);h&&(r[0]=d.call(this,e,t.html())),Ie(t,r,i,o)});if(f&&(t=(e=we(r,n[0].ownerDocument,!1,n,o)).firstChild,1===e.childNodes.length&&(e=t),t||o)){for(s=(a=k.map(ve(e,"script"),Pe)).length;c<f;c++)u=e,c!==p&&(u=k.clone(u,!0,!0),s&&k.merge(a,ve(u,"script"))),i.call(n[c],u,c);if(s)for(l=a[a.length-1].ownerDocument,k.map(a,Re),c=0;c<s;c++)u=a[c],he.test(u.type||"")&&!Q.access(u,"globalEval")&&k.contains(l,u)&&(u.src&&"module"!==(u.type||"").toLowerCase()?k._evalUrl&&!u.noModule&&k._evalUrl(u.src,{nonce:u.nonce||u.getAttribute("nonce")}):b(u.textContent.replace(He,""),u,l))}return n}function We(e,t,n){for(var r,i=t?k.filter(t,e):e,o=0;null!=(r=i[o]);o++)n||1!==r.nodeType||k.cleanData(ve(r)),r.parentNode&&(n&&oe(r)&&ye(ve(r,"script")),r.parentNode.removeChild(r));return e}k.extend({htmlPrefilter:function(e){return e.replace(je,"<$1></$2>")},clone:function(e,t,n){var r,i,o,a,s,u,l,c=e.cloneNode(!0),f=oe(e);if(!(y.noCloneChecked||1!==e.nodeType&&11!==e.nodeType||k.isXMLDoc(e)))for(a=ve(c),r=0,i=(o=ve(e)).length;r<i;r++)s=o[r],u=a[r],void 0,"input"===(l=u.nodeName.toLowerCase())&&pe.test(s.type)?u.checked=s.checked:"input"!==l&&"textarea"!==l||(u.defaultValue=s.defaultValue);if(t)if(n)for(o=o||ve(e),a=a||ve(c),r=0,i=o.length;r<i;r++)Me(o[r],a[r]);else Me(e,c);return 0<(a=ve(c,"script")).length&&ye(a,!f&&ve(e,"script")),c},cleanData:function(e){for(var t,n,r,i=k.event.special,o=0;void 0!==(n=e[o]);o++)if(G(n)){if(t=n[Q.expando]){if(t.events)for(r in t.events)i[r]?k.event.remove(n,r):k.removeEvent(n,r,t.handle);n[Q.expando]=void 0}n[J.expando]&&(n[J.expando]=void 0)}}}),k.fn.extend({detach:function(e){return We(this,e,!0)},remove:function(e){return We(this,e)},text:function(e){return _(this,function(e){return void 0===e?k.text(this):this.empty().each(function(){1!==this.nodeType&&11!==this.nodeType&&9!==this.nodeType||(this.textContent=e)})},null,e,arguments.length)},append:function(){return Ie(this,arguments,function(e){1!==this.nodeType&&11!==this.nodeType&&9!==this.nodeType||Oe(this,e).appendChild(e)})},prepend:function(){return Ie(this,arguments,function(e){if(1===this.nodeType||11===this.nodeType||9===this.nodeType){var t=Oe(this,e);t.insertBefore(e,t.firstChild)}})},before:function(){return Ie(this,arguments,function(e){this.parentNode&&this.parentNode.insertBefore(e,this)})},after:function(){return Ie(this,arguments,function(e){this.parentNode&&this.parentNode.insertBefore(e,this.nextSibling)})},empty:function(){for(var e,t=0;null!=(e=this[t]);t++)1===e.nodeType&&(k.cleanData(ve(e,!1)),e.textContent="");return this},clone:function(e,t){return e=null!=e&&e,t=null==t?e:t,this.map(function(){return k.clone(this,e,t)})},html:function(e){return _(this,function(e){var t=this[0]||{},n=0,r=this.length;if(void 0===e&&1===t.nodeType)return t.innerHTML;if("string"==typeof e&&!qe.test(e)&&!ge[(de.exec(e)||["",""])[1].toLowerCase()]){e=k.htmlPrefilter(e);try{for(;n<r;n++)1===(t=this[n]||{}).nodeType&&(k.cleanData(ve(t,!1)),t.innerHTML=e);t=0}catch(e){}}t&&this.empty().append(e)},null,e,arguments.length)},replaceWith:function(){var n=[];return Ie(this,arguments,function(e){var t=this.parentNode;k.inArray(this,n)<0&&(k.cleanData(ve(this)),t&&t.replaceChild(e,this))},n)}}),k.each({appendTo:"append",prependTo:"prepend",insertBefore:"before",insertAfter:"after",replaceAll:"replaceWith"},function(e,a){k.fn[e]=function(e){for(var t,n=[],r=k(e),i=r.length-1,o=0;o<=i;o++)t=o===i?this:this.clone(!0),k(r[o])[a](t),u.apply(n,t.get());return this.pushStack(n)}});var $e=new RegExp("^("+te+")(?!px)[a-z%]+$","i"),Fe=function(e){var t=e.ownerDocument.defaultView;return t&&t.opener||(t=C),t.getComputedStyle(e)},Be=new RegExp(re.join("|"),"i");function _e(e,t,n){var r,i,o,a,s=e.style;return(n=n||Fe(e))&&(""!==(a=n.getPropertyValue(t)||n[t])||oe(e)||(a=k.style(e,t)),!y.pixelBoxStyles()&&$e.test(a)&&Be.test(t)&&(r=s.width,i=s.minWidth,o=s.maxWidth,s.minWidth=s.maxWidth=s.width=a,a=n.width,s.width=r,s.minWidth=i,s.maxWidth=o)),void 0!==a?a+"":a}function ze(e,t){return{get:function(){if(!e())return(this.get=t).apply(this,arguments);delete this.get}}}!function(){function e(){if(u){s.style.cssText="position:absolute;left:-11111px;width:60px;margin-top:1px;padding:0;border:0",u.style.cssText="position:relative;display:block;box-sizing:border-box;overflow:scroll;margin:auto;border:1px;padding:1px;width:60%;top:1%",ie.appendChild(s).appendChild(u);var e=C.getComputedStyle(u);n="1%"!==e.top,a=12===t(e.marginLeft),u.style.right="60%",o=36===t(e.right),r=36===t(e.width),u.style.position="absolute",i=12===t(u.offsetWidth/3),ie.removeChild(s),u=null}}function t(e){return Math.round(parseFloat(e))}var n,r,i,o,a,s=E.createElement("div"),u=E.createElement("div");u.style&&(u.style.backgroundClip="content-box",u.cloneNode(!0).style.backgroundClip="",y.clearCloneStyle="content-box"===u.style.backgroundClip,k.extend(y,{boxSizingReliable:function(){return e(),r},pixelBoxStyles:function(){return e(),o},pixelPosition:function(){return e(),n},reliableMarginLeft:function(){return e(),a},scrollboxSize:function(){return e(),i}}))}();var Ue=["Webkit","Moz","ms"],Xe=E.createElement("div").style,Ve={};function Ge(e){var t=k.cssProps[e]||Ve[e];return t||(e in Xe?e:Ve[e]=function(e){var t=e[0].toUpperCase()+e.slice(1),n=Ue.length;while(n--)if((e=Ue[n]+t)in Xe)return e}(e)||e)}var Ye=/^(none|table(?!-c[ea]).+)/,Qe=/^--/,Je={position:"absolute",visibility:"hidden",display:"block"},Ke={letterSpacing:"0",fontWeight:"400"};function Ze(e,t,n){var r=ne.exec(t);return r?Math.max(0,r[2]-(n||0))+(r[3]||"px"):t}function et(e,t,n,r,i,o){var a="width"===t?1:0,s=0,u=0;if(n===(r?"border":"content"))return 0;for(;a<4;a+=2)"margin"===n&&(u+=k.css(e,n+re[a],!0,i)),r?("content"===n&&(u-=k.css(e,"padding"+re[a],!0,i)),"margin"!==n&&(u-=k.css(e,"border"+re[a]+"Width",!0,i))):(u+=k.css(e,"padding"+re[a],!0,i),"padding"!==n?u+=k.css(e,"border"+re[a]+"Width",!0,i):s+=k.css(e,"border"+re[a]+"Width",!0,i));return!r&&0<=o&&(u+=Math.max(0,Math.ceil(e["offset"+t[0].toUpperCase()+t.slice(1)]-o-u-s-.5))||0),u}function tt(e,t,n){var r=Fe(e),i=(!y.boxSizingReliable()||n)&&"border-box"===k.css(e,"boxSizing",!1,r),o=i,a=_e(e,t,r),s="offset"+t[0].toUpperCase()+t.slice(1);if($e.test(a)){if(!n)return a;a="auto"}return(!y.boxSizingReliable()&&i||"auto"===a||!parseFloat(a)&&"inline"===k.css(e,"display",!1,r))&&e.getClientRects().length&&(i="border-box"===k.css(e,"boxSizing",!1,r),(o=s in e)&&(a=e[s])),(a=parseFloat(a)||0)+et(e,t,n||(i?"border":"content"),o,r,a)+"px"}function nt(e,t,n,r,i){return new nt.prototype.init(e,t,n,r,i)}k.extend({cssHooks:{opacity:{get:function(e,t){if(t){var n=_e(e,"opacity");return""===n?"1":n}}}},cssNumber:{animationIterationCount:!0,columnCount:!0,fillOpacity:!0,flexGrow:!0,flexShrink:!0,fontWeight:!0,gridArea:!0,gridColumn:!0,gridColumnEnd:!0,gridColumnStart:!0,gridRow:!0,gridRowEnd:!0,gridRowStart:!0,lineHeight:!0,opacity:!0,order:!0,orphans:!0,widows:!0,zIndex:!0,zoom:!0},cssProps:{},style:function(e,t,n,r){if(e&&3!==e.nodeType&&8!==e.nodeType&&e.style){var i,o,a,s=V(t),u=Qe.test(t),l=e.style;if(u||(t=Ge(s)),a=k.cssHooks[t]||k.cssHooks[s],void 0===n)return a&&"get"in a&&void 0!==(i=a.get(e,!1,r))?i:l[t];"string"===(o=typeof n)&&(i=ne.exec(n))&&i[1]&&(n=le(e,t,i),o="number"),null!=n&&n==n&&("number"!==o||u||(n+=i&&i[3]||(k.cssNumber[s]?"":"px")),y.clearCloneStyle||""!==n||0!==t.indexOf("background")||(l[t]="inherit"),a&&"set"in a&&void 0===(n=a.set(e,n,r))||(u?l.setProperty(t,n):l[t]=n))}},css:function(e,t,n,r){var i,o,a,s=V(t);return Qe.test(t)||(t=Ge(s)),(a=k.cssHooks[t]||k.cssHooks[s])&&"get"in a&&(i=a.get(e,!0,n)),void 0===i&&(i=_e(e,t,r)),"normal"===i&&t in Ke&&(i=Ke[t]),""===n||n?(o=parseFloat(i),!0===n||isFinite(o)?o||0:i):i}}),k.each(["height","width"],function(e,u){k.cssHooks[u]={get:function(e,t,n){if(t)return!Ye.test(k.css(e,"display"))||e.getClientRects().length&&e.getBoundingClientRect().width?tt(e,u,n):ue(e,Je,function(){return tt(e,u,n)})},set:function(e,t,n){var r,i=Fe(e),o=!y.scrollboxSize()&&"absolute"===i.position,a=(o||n)&&"border-box"===k.css(e,"boxSizing",!1,i),s=n?et(e,u,n,a,i):0;return a&&o&&(s-=Math.ceil(e["offset"+u[0].toUpperCase()+u.slice(1)]-parseFloat(i[u])-et(e,u,"border",!1,i)-.5)),s&&(r=ne.exec(t))&&"px"!==(r[3]||"px")&&(e.style[u]=t,t=k.css(e,u)),Ze(0,t,s)}}}),k.cssHooks.marginLeft=ze(y.reliableMarginLeft,function(e,t){if(t)return(parseFloat(_e(e,"marginLeft"))||e.getBoundingClientRect().left-ue(e,{marginLeft:0},function(){return e.getBoundingClientRect().left}))+"px"}),k.each({margin:"",padding:"",border:"Width"},function(i,o){k.cssHooks[i+o]={expand:function(e){for(var t=0,n={},r="string"==typeof e?e.split(" "):[e];t<4;t++)n[i+re[t]+o]=r[t]||r[t-2]||r[0];return n}},"margin"!==i&&(k.cssHooks[i+o].set=Ze)}),k.fn.extend({css:function(e,t){return _(this,function(e,t,n){var r,i,o={},a=0;if(Array.isArray(t)){for(r=Fe(e),i=t.length;a<i;a++)o[t[a]]=k.css(e,t[a],!1,r);return o}return void 0!==n?k.style(e,t,n):k.css(e,t)},e,t,1<arguments.length)}}),((k.Tween=nt).prototype={constructor:nt,init:function(e,t,n,r,i,o){this.elem=e,this.prop=n,this.easing=i||k.easing._default,this.options=t,this.start=this.now=this.cur(),this.end=r,this.unit=o||(k.cssNumber[n]?"":"px")},cur:function(){var e=nt.propHooks[this.prop];return e&&e.get?e.get(this):nt.propHooks._default.get(this)},run:function(e){var t,n=nt.propHooks[this.prop];return this.options.duration?this.pos=t=k.easing[this.easing](e,this.options.duration*e,0,1,this.options.duration):this.pos=t=e,this.now=(this.end-this.start)*t+this.start,this.options.step&&this.options.step.call(this.elem,this.now,this),n&&n.set?n.set(this):nt.propHooks._default.set(this),this}}).init.prototype=nt.prototype,(nt.propHooks={_default:{get:function(e){var t;return 1!==e.elem.nodeType||null!=e.elem[e.prop]&&null==e.elem.style[e.prop]?e.elem[e.prop]:(t=k.css(e.elem,e.prop,""))&&"auto"!==t?t:0},set:function(e){k.fx.step[e.prop]?k.fx.step[e.prop](e):1!==e.elem.nodeType||!k.cssHooks[e.prop]&&null==e.elem.style[Ge(e.prop)]?e.elem[e.prop]=e.now:k.style(e.elem,e.prop,e.now+e.unit)}}}).scrollTop=nt.propHooks.scrollLeft={set:function(e){e.elem.nodeType&&e.elem.parentNode&&(e.elem[e.prop]=e.now)}},k.easing={linear:function(e){return e},swing:function(e){return.5-Math.cos(e*Math.PI)/2},_default:"swing"},k.fx=nt.prototype.init,k.fx.step={};var rt,it,ot,at,st=/^(?:toggle|show|hide)$/,ut=/queueHooks$/;function lt(){it&&(!1===E.hidden&&C.requestAnimationFrame?C.requestAnimationFrame(lt):C.setTimeout(lt,k.fx.interval),k.fx.tick())}function ct(){return C.setTimeout(function(){rt=void 0}),rt=Date.now()}function ft(e,t){var n,r=0,i={height:e};for(t=t?1:0;r<4;r+=2-t)i["margin"+(n=re[r])]=i["padding"+n]=e;return t&&(i.opacity=i.width=e),i}function pt(e,t,n){for(var r,i=(dt.tweeners[t]||[]).concat(dt.tweeners["*"]),o=0,a=i.length;o<a;o++)if(r=i[o].call(n,t,e))return r}function dt(o,e,t){var n,a,r=0,i=dt.prefilters.length,s=k.Deferred().always(function(){delete u.elem}),u=function(){if(a)return!1;for(var e=rt||ct(),t=Math.max(0,l.startTime+l.duration-e),n=1-(t/l.duration||0),r=0,i=l.tweens.length;r<i;r++)l.tweens[r].run(n);return s.notifyWith(o,[l,n,t]),n<1&&i?t:(i||s.notifyWith(o,[l,1,0]),s.resolveWith(o,[l]),!1)},l=s.promise({elem:o,props:k.extend({},e),opts:k.extend(!0,{specialEasing:{},easing:k.easing._default},t),originalProperties:e,originalOptions:t,startTime:rt||ct(),duration:t.duration,tweens:[],createTween:function(e,t){var n=k.Tween(o,l.opts,e,t,l.opts.specialEasing[e]||l.opts.easing);return l.tweens.push(n),n},stop:function(e){var t=0,n=e?l.tweens.length:0;if(a)return this;for(a=!0;t<n;t++)l.tweens[t].run(1);return e?(s.notifyWith(o,[l,1,0]),s.resolveWith(o,[l,e])):s.rejectWith(o,[l,e]),this}}),c=l.props;for(!function(e,t){var n,r,i,o,a;for(n in e)if(i=t[r=V(n)],o=e[n],Array.isArray(o)&&(i=o[1],o=e[n]=o[0]),n!==r&&(e[r]=o,delete e[n]),(a=k.cssHooks[r])&&"expand"in a)for(n in o=a.expand(o),delete e[r],o)n in e||(e[n]=o[n],t[n]=i);else t[r]=i}(c,l.opts.specialEasing);r<i;r++)if(n=dt.prefilters[r].call(l,o,c,l.opts))return m(n.stop)&&(k._queueHooks(l.elem,l.opts.queue).stop=n.stop.bind(n)),n;return k.map(c,pt,l),m(l.opts.start)&&l.opts.start.call(o,l),l.progress(l.opts.progress).done(l.opts.done,l.opts.complete).fail(l.opts.fail).always(l.opts.always),k.fx.timer(k.extend(u,{elem:o,anim:l,queue:l.opts.queue})),l}k.Animation=k.extend(dt,{tweeners:{"*":[function(e,t){var n=this.createTween(e,t);return le(n.elem,e,ne.exec(t),n),n}]},tweener:function(e,t){m(e)?(t=e,e=["*"]):e=e.match(R);for(var n,r=0,i=e.length;r<i;r++)n=e[r],dt.tweeners[n]=dt.tweeners[n]||[],dt.tweeners[n].unshift(t)},prefilters:[function(e,t,n){var r,i,o,a,s,u,l,c,f="width"in t||"height"in t,p=this,d={},h=e.style,g=e.nodeType&&se(e),v=Q.get(e,"fxshow");for(r in n.queue||(null==(a=k._queueHooks(e,"fx")).unqueued&&(a.unqueued=0,s=a.empty.fire,a.empty.fire=function(){a.unqueued||s()}),a.unqueued++,p.always(function(){p.always(function(){a.unqueued--,k.queue(e,"fx").length||a.empty.fire()})})),t)if(i=t[r],st.test(i)){if(delete t[r],o=o||"toggle"===i,i===(g?"hide":"show")){if("show"!==i||!v||void 0===v[r])continue;g=!0}d[r]=v&&v[r]||k.style(e,r)}if((u=!k.isEmptyObject(t))||!k.isEmptyObject(d))for(r in f&&1===e.nodeType&&(n.overflow=[h.overflow,h.overflowX,h.overflowY],null==(l=v&&v.display)&&(l=Q.get(e,"display")),"none"===(c=k.css(e,"display"))&&(l?c=l:(fe([e],!0),l=e.style.display||l,c=k.css(e,"display"),fe([e]))),("inline"===c||"inline-block"===c&&null!=l)&&"none"===k.css(e,"float")&&(u||(p.done(function(){h.display=l}),null==l&&(c=h.display,l="none"===c?"":c)),h.display="inline-block")),n.overflow&&(h.overflow="hidden",p.always(function(){h.overflow=n.overflow[0],h.overflowX=n.overflow[1],h.overflowY=n.overflow[2]})),u=!1,d)u||(v?"hidden"in v&&(g=v.hidden):v=Q.access(e,"fxshow",{display:l}),o&&(v.hidden=!g),g&&fe([e],!0),p.done(function(){for(r in g||fe([e]),Q.remove(e,"fxshow"),d)k.style(e,r,d[r])})),u=pt(g?v[r]:0,r,p),r in v||(v[r]=u.start,g&&(u.end=u.start,u.start=0))}],prefilter:function(e,t){t?dt.prefilters.unshift(e):dt.prefilters.push(e)}}),k.speed=function(e,t,n){var r=e&&"object"==typeof e?k.extend({},e):{complete:n||!n&&t||m(e)&&e,duration:e,easing:n&&t||t&&!m(t)&&t};return k.fx.off?r.duration=0:"number"!=typeof r.duration&&(r.duration in k.fx.speeds?r.duration=k.fx.speeds[r.duration]:r.duration=k.fx.speeds._default),null!=r.queue&&!0!==r.queue||(r.queue="fx"),r.old=r.complete,r.complete=function(){m(r.old)&&r.old.call(this),r.queue&&k.dequeue(this,r.queue)},r},k.fn.extend({fadeTo:function(e,t,n,r){return this.filter(se).css("opacity",0).show().end().animate({opacity:t},e,n,r)},animate:function(t,e,n,r){var i=k.isEmptyObject(t),o=k.speed(e,n,r),a=function(){var e=dt(this,k.extend({},t),o);(i||Q.get(this,"finish"))&&e.stop(!0)};return a.finish=a,i||!1===o.queue?this.each(a):this.queue(o.queue,a)},stop:function(i,e,o){var a=function(e){var t=e.stop;delete e.stop,t(o)};return"string"!=typeof i&&(o=e,e=i,i=void 0),e&&!1!==i&&this.queue(i||"fx",[]),this.each(function(){var e=!0,t=null!=i&&i+"queueHooks",n=k.timers,r=Q.get(this);if(t)r[t]&&r[t].stop&&a(r[t]);else for(t in r)r[t]&&r[t].stop&&ut.test(t)&&a(r[t]);for(t=n.length;t--;)n[t].elem!==this||null!=i&&n[t].queue!==i||(n[t].anim.stop(o),e=!1,n.splice(t,1));!e&&o||k.dequeue(this,i)})},finish:function(a){return!1!==a&&(a=a||"fx"),this.each(function(){var e,t=Q.get(this),n=t[a+"queue"],r=t[a+"queueHooks"],i=k.timers,o=n?n.length:0;for(t.finish=!0,k.queue(this,a,[]),r&&r.stop&&r.stop.call(this,!0),e=i.length;e--;)i[e].elem===this&&i[e].queue===a&&(i[e].anim.stop(!0),i.splice(e,1));for(e=0;e<o;e++)n[e]&&n[e].finish&&n[e].finish.call(this);delete t.finish})}}),k.each(["toggle","show","hide"],function(e,r){var i=k.fn[r];k.fn[r]=function(e,t,n){return null==e||"boolean"==typeof e?i.apply(this,arguments):this.animate(ft(r,!0),e,t,n)}}),k.each({slideDown:ft("show"),slideUp:ft("hide"),slideToggle:ft("toggle"),fadeIn:{opacity:"show"},fadeOut:{opacity:"hide"},fadeToggle:{opacity:"toggle"}},function(e,r){k.fn[e]=function(e,t,n){return this.animate(r,e,t,n)}}),k.timers=[],k.fx.tick=function(){var e,t=0,n=k.timers;for(rt=Date.now();t<n.length;t++)(e=n[t])()||n[t]!==e||n.splice(t--,1);n.length||k.fx.stop(),rt=void 0},k.fx.timer=function(e){k.timers.push(e),k.fx.start()},k.fx.interval=13,k.fx.start=function(){it||(it=!0,lt())},k.fx.stop=function(){it=null},k.fx.speeds={slow:600,fast:200,_default:400},k.fn.delay=function(r,e){return r=k.fx&&k.fx.speeds[r]||r,e=e||"fx",this.queue(e,function(e,t){var n=C.setTimeout(e,r);t.stop=function(){C.clearTimeout(n)}})},ot=E.createElement("input"),at=E.createElement("select").appendChild(E.createElement("option")),ot.type="checkbox",y.checkOn=""!==ot.value,y.optSelected=at.selected,(ot=E.createElement("input")).value="t",ot.type="radio",y.radioValue="t"===ot.value;var ht,gt=k.expr.attrHandle;k.fn.extend({attr:function(e,t){return _(this,k.attr,e,t,1<arguments.length)},removeAttr:function(e){return this.each(function(){k.removeAttr(this,e)})}}),k.extend({attr:function(e,t,n){var r,i,o=e.nodeType;if(3!==o&&8!==o&&2!==o)return"undefined"==typeof e.getAttribute?k.prop(e,t,n):(1===o&&k.isXMLDoc(e)||(i=k.attrHooks[t.toLowerCase()]||(k.expr.match.bool.test(t)?ht:void 0)),void 0!==n?null===n?void k.removeAttr(e,t):i&&"set"in i&&void 0!==(r=i.set(e,n,t))?r:(e.setAttribute(t,n+""),n):i&&"get"in i&&null!==(r=i.get(e,t))?r:null==(r=k.find.attr(e,t))?void 0:r)},attrHooks:{type:{set:function(e,t){if(!y.radioValue&&"radio"===t&&A(e,"input")){var n=e.value;return e.setAttribute("type",t),n&&(e.value=n),t}}}},removeAttr:function(e,t){var n,r=0,i=t&&t.match(R);if(i&&1===e.nodeType)while(n=i[r++])e.removeAttribute(n)}}),ht={set:function(e,t,n){return!1===t?k.removeAttr(e,n):e.setAttribute(n,n),n}},k.each(k.expr.match.bool.source.match(/\w+/g),function(e,t){var a=gt[t]||k.find.attr;gt[t]=function(e,t,n){var r,i,o=t.toLowerCase();return n||(i=gt[o],gt[o]=r,r=null!=a(e,t,n)?o:null,gt[o]=i),r}});var vt=/^(?:input|select|textarea|button)$/i,yt=/^(?:a|area)$/i;function mt(e){return(e.match(R)||[]).join(" ")}function xt(e){return e.getAttribute&&e.getAttribute("class")||""}function bt(e){return Array.isArray(e)?e:"string"==typeof e&&e.match(R)||[]}k.fn.extend({prop:function(e,t){return _(this,k.prop,e,t,1<arguments.length)},removeProp:function(e){return this.each(function(){delete this[k.propFix[e]||e]})}}),k.extend({prop:function(e,t,n){var r,i,o=e.nodeType;if(3!==o&&8!==o&&2!==o)return 1===o&&k.isXMLDoc(e)||(t=k.propFix[t]||t,i=k.propHooks[t]),void 0!==n?i&&"set"in i&&void 0!==(r=i.set(e,n,t))?r:e[t]=n:i&&"get"in i&&null!==(r=i.get(e,t))?r:e[t]},propHooks:{tabIndex:{get:function(e){var t=k.find.attr(e,"tabindex");return t?parseInt(t,10):vt.test(e.nodeName)||yt.test(e.nodeName)&&e.href?0:-1}}},propFix:{"for":"htmlFor","class":"className"}}),y.optSelected||(k.propHooks.selected={get:function(e){var t=e.parentNode;return t&&t.parentNode&&t.parentNode.selectedIndex,null},set:function(e){var t=e.parentNode;t&&(t.selectedIndex,t.parentNode&&t.parentNode.selectedIndex)}}),k.each(["tabIndex","readOnly","maxLength","cellSpacing","cellPadding","rowSpan","colSpan","useMap","frameBorder","contentEditable"],function(){k.propFix[this.toLowerCase()]=this}),k.fn.extend({addClass:function(t){var e,n,r,i,o,a,s,u=0;if(m(t))return this.each(function(e){k(this).addClass(t.call(this,e,xt(this)))});if((e=bt(t)).length)while(n=this[u++])if(i=xt(n),r=1===n.nodeType&&" "+mt(i)+" "){a=0;while(o=e[a++])r.indexOf(" "+o+" ")<0&&(r+=o+" ");i!==(s=mt(r))&&n.setAttribute("class",s)}return this},removeClass:function(t){var e,n,r,i,o,a,s,u=0;if(m(t))return this.each(function(e){k(this).removeClass(t.call(this,e,xt(this)))});if(!arguments.length)return this.attr("class","");if((e=bt(t)).length)while(n=this[u++])if(i=xt(n),r=1===n.nodeType&&" "+mt(i)+" "){a=0;while(o=e[a++])while(-1<r.indexOf(" "+o+" "))r=r.replace(" "+o+" "," ");i!==(s=mt(r))&&n.setAttribute("class",s)}return this},toggleClass:function(i,t){var o=typeof i,a="string"===o||Array.isArray(i);return"boolean"==typeof t&&a?t?this.addClass(i):this.removeClass(i):m(i)?this.each(function(e){k(this).toggleClass(i.call(this,e,xt(this),t),t)}):this.each(function(){var e,t,n,r;if(a){t=0,n=k(this),r=bt(i);while(e=r[t++])n.hasClass(e)?n.removeClass(e):n.addClass(e)}else void 0!==i&&"boolean"!==o||((e=xt(this))&&Q.set(this,"__className__",e),this.setAttribute&&this.setAttribute("class",e||!1===i?"":Q.get(this,"__className__")||""))})},hasClass:function(e){var t,n,r=0;t=" "+e+" ";while(n=this[r++])if(1===n.nodeType&&-1<(" "+mt(xt(n))+" ").indexOf(t))return!0;return!1}});var wt=/\r/g;k.fn.extend({val:function(n){var r,e,i,t=this[0];return arguments.length?(i=m(n),this.each(function(e){var t;1===this.nodeType&&(null==(t=i?n.call(this,e,k(this).val()):n)?t="":"number"==typeof t?t+="":Array.isArray(t)&&(t=k.map(t,function(e){return null==e?"":e+""})),(r=k.valHooks[this.type]||k.valHooks[this.nodeName.toLowerCase()])&&"set"in r&&void 0!==r.set(this,t,"value")||(this.value=t))})):t?(r=k.valHooks[t.type]||k.valHooks[t.nodeName.toLowerCase()])&&"get"in r&&void 0!==(e=r.get(t,"value"))?e:"string"==typeof(e=t.value)?e.replace(wt,""):null==e?"":e:void 0}}),k.extend({valHooks:{option:{get:function(e){var t=k.find.attr(e,"value");return null!=t?t:mt(k.text(e))}},select:{get:function(e){var t,n,r,i=e.options,o=e.selectedIndex,a="select-one"===e.type,s=a?null:[],u=a?o+1:i.length;for(r=o<0?u:a?o:0;r<u;r++)if(((n=i[r]).selected||r===o)&&!n.disabled&&(!n.parentNode.disabled||!A(n.parentNode,"optgroup"))){if(t=k(n).val(),a)return t;s.push(t)}return s},set:function(e,t){var n,r,i=e.options,o=k.makeArray(t),a=i.length;while(a--)((r=i[a]).selected=-1<k.inArray(k.valHooks.option.get(r),o))&&(n=!0);return n||(e.selectedIndex=-1),o}}}}),k.each(["radio","checkbox"],function(){k.valHooks[this]={set:function(e,t){if(Array.isArray(t))return e.checked=-1<k.inArray(k(e).val(),t)}},y.checkOn||(k.valHooks[this].get=function(e){return null===e.getAttribute("value")?"on":e.value})}),y.focusin="onfocusin"in C;var Tt=/^(?:focusinfocus|focusoutblur)$/,Ct=function(e){e.stopPropagation()};k.extend(k.event,{trigger:function(e,t,n,r){var i,o,a,s,u,l,c,f,p=[n||E],d=v.call(e,"type")?e.type:e,h=v.call(e,"namespace")?e.namespace.split("."):[];if(o=f=a=n=n||E,3!==n.nodeType&&8!==n.nodeType&&!Tt.test(d+k.event.triggered)&&(-1<d.indexOf(".")&&(d=(h=d.split(".")).shift(),h.sort()),u=d.indexOf(":")<0&&"on"+d,(e=e[k.expando]?e:new k.Event(d,"object"==typeof e&&e)).isTrigger=r?2:3,e.namespace=h.join("."),e.rnamespace=e.namespace?new RegExp("(^|\\.)"+h.join("\\.(?:.*\\.|)")+"(\\.|$)"):null,e.result=void 0,e.target||(e.target=n),t=null==t?[e]:k.makeArray(t,[e]),c=k.event.special[d]||{},r||!c.trigger||!1!==c.trigger.apply(n,t))){if(!r&&!c.noBubble&&!x(n)){for(s=c.delegateType||d,Tt.test(s+d)||(o=o.parentNode);o;o=o.parentNode)p.push(o),a=o;a===(n.ownerDocument||E)&&p.push(a.defaultView||a.parentWindow||C)}i=0;while((o=p[i++])&&!e.isPropagationStopped())f=o,e.type=1<i?s:c.bindType||d,(l=(Q.get(o,"events")||{})[e.type]&&Q.get(o,"handle"))&&l.apply(o,t),(l=u&&o[u])&&l.apply&&G(o)&&(e.result=l.apply(o,t),!1===e.result&&e.preventDefault());return e.type=d,r||e.isDefaultPrevented()||c._default&&!1!==c._default.apply(p.pop(),t)||!G(n)||u&&m(n[d])&&!x(n)&&((a=n[u])&&(n[u]=null),k.event.triggered=d,e.isPropagationStopped()&&f.addEventListener(d,Ct),n[d](),e.isPropagationStopped()&&f.removeEventListener(d,Ct),k.event.triggered=void 0,a&&(n[u]=a)),e.result}},simulate:function(e,t,n){var r=k.extend(new k.Event,n,{type:e,isSimulated:!0});k.event.trigger(r,null,t)}}),k.fn.extend({trigger:function(e,t){return this.each(function(){k.event.trigger(e,t,this)})},triggerHandler:function(e,t){var n=this[0];if(n)return k.event.trigger(e,t,n,!0)}}),y.focusin||k.each({focus:"focusin",blur:"focusout"},function(n,r){var i=function(e){k.event.simulate(r,e.target,k.event.fix(e))};k.event.special[r]={setup:function(){var e=this.ownerDocument||this,t=Q.access(e,r);t||e.addEventListener(n,i,!0),Q.access(e,r,(t||0)+1)},teardown:function(){var e=this.ownerDocument||this,t=Q.access(e,r)-1;t?Q.access(e,r,t):(e.removeEventListener(n,i,!0),Q.remove(e,r))}}});var Et=C.location,kt=Date.now(),St=/\?/;k.parseXML=function(e){var t;if(!e||"string"!=typeof e)return null;try{t=(new C.DOMParser).parseFromString(e,"text/xml")}catch(e){t=void 0}return t&&!t.getElementsByTagName("parsererror").length||k.error("Invalid XML: "+e),t};var Nt=/\[\]$/,At=/\r?\n/g,Dt=/^(?:submit|button|image|reset|file)$/i,jt=/^(?:input|select|textarea|keygen)/i;function qt(n,e,r,i){var t;if(Array.isArray(e))k.each(e,function(e,t){r||Nt.test(n)?i(n,t):qt(n+"["+("object"==typeof t&&null!=t?e:"")+"]",t,r,i)});else if(r||"object"!==w(e))i(n,e);else for(t in e)qt(n+"["+t+"]",e[t],r,i)}k.param=function(e,t){var n,r=[],i=function(e,t){var n=m(t)?t():t;r[r.length]=encodeURIComponent(e)+"="+encodeURIComponent(null==n?"":n)};if(null==e)return"";if(Array.isArray(e)||e.jquery&&!k.isPlainObject(e))k.each(e,function(){i(this.name,this.value)});else for(n in e)qt(n,e[n],t,i);return r.join("&")},k.fn.extend({serialize:function(){return k.param(this.serializeArray())},serializeArray:function(){return this.map(function(){var e=k.prop(this,"elements");return e?k.makeArray(e):this}).filter(function(){var e=this.type;return this.name&&!k(this).is(":disabled")&&jt.test(this.nodeName)&&!Dt.test(e)&&(this.checked||!pe.test(e))}).map(function(e,t){var n=k(this).val();return null==n?null:Array.isArray(n)?k.map(n,function(e){return{name:t.name,value:e.replace(At,"\r\n")}}):{name:t.name,value:n.replace(At,"\r\n")}}).get()}});var Lt=/%20/g,Ht=/#.*$/,Ot=/([?&])_=[^&]*/,Pt=/^(.*?):[ \t]*([^\r\n]*)$/gm,Rt=/^(?:GET|HEAD)$/,Mt=/^\/\//,It={},Wt={},$t="*/".concat("*"),Ft=E.createElement("a");function Bt(o){return function(e,t){"string"!=typeof e&&(t=e,e="*");var n,r=0,i=e.toLowerCase().match(R)||[];if(m(t))while(n=i[r++])"+"===n[0]?(n=n.slice(1)||"*",(o[n]=o[n]||[]).unshift(t)):(o[n]=o[n]||[]).push(t)}}function _t(t,i,o,a){var s={},u=t===Wt;function l(e){var r;return s[e]=!0,k.each(t[e]||[],function(e,t){var n=t(i,o,a);return"string"!=typeof n||u||s[n]?u?!(r=n):void 0:(i.dataTypes.unshift(n),l(n),!1)}),r}return l(i.dataTypes[0])||!s["*"]&&l("*")}function zt(e,t){var n,r,i=k.ajaxSettings.flatOptions||{};for(n in t)void 0!==t[n]&&((i[n]?e:r||(r={}))[n]=t[n]);return r&&k.extend(!0,e,r),e}Ft.href=Et.href,k.extend({active:0,lastModified:{},etag:{},ajaxSettings:{url:Et.href,type:"GET",isLocal:/^(?:about|app|app-storage|.+-extension|file|res|widget):$/.test(Et.protocol),global:!0,processData:!0,async:!0,contentType:"application/x-www-form-urlencoded; charset=UTF-8",accepts:{"*":$t,text:"text/plain",html:"text/html",xml:"application/xml, text/xml",json:"application/json, text/javascript"},contents:{xml:/\bxml\b/,html:/\bhtml/,json:/\bjson\b/},responseFields:{xml:"responseXML",text:"responseText",json:"responseJSON"},converters:{"* text":String,"text html":!0,"text json":JSON.parse,"text xml":k.parseXML},flatOptions:{url:!0,context:!0}},ajaxSetup:function(e,t){return t?zt(zt(e,k.ajaxSettings),t):zt(k.ajaxSettings,e)},ajaxPrefilter:Bt(It),ajaxTransport:Bt(Wt),ajax:function(e,t){"object"==typeof e&&(t=e,e=void 0),t=t||{};var c,f,p,n,d,r,h,g,i,o,v=k.ajaxSetup({},t),y=v.context||v,m=v.context&&(y.nodeType||y.jquery)?k(y):k.event,x=k.Deferred(),b=k.Callbacks("once memory"),w=v.statusCode||{},a={},s={},u="canceled",T={readyState:0,getResponseHeader:function(e){var t;if(h){if(!n){n={};while(t=Pt.exec(p))n[t[1].toLowerCase()+" "]=(n[t[1].toLowerCase()+" "]||[]).concat(t[2])}t=n[e.toLowerCase()+" "]}return null==t?null:t.join(", ")},getAllResponseHeaders:function(){return h?p:null},setRequestHeader:function(e,t){return null==h&&(e=s[e.toLowerCase()]=s[e.toLowerCase()]||e,a[e]=t),this},overrideMimeType:function(e){return null==h&&(v.mimeType=e),this},statusCode:function(e){var t;if(e)if(h)T.always(e[T.status]);else for(t in e)w[t]=[w[t],e[t]];return this},abort:function(e){var t=e||u;return c&&c.abort(t),l(0,t),this}};if(x.promise(T),v.url=((e||v.url||Et.href)+"").replace(Mt,Et.protocol+"//"),v.type=t.method||t.type||v.method||v.type,v.dataTypes=(v.dataType||"*").toLowerCase().match(R)||[""],null==v.crossDomain){r=E.createElement("a");try{r.href=v.url,r.href=r.href,v.crossDomain=Ft.protocol+"//"+Ft.host!=r.protocol+"//"+r.host}catch(e){v.crossDomain=!0}}if(v.data&&v.processData&&"string"!=typeof v.data&&(v.data=k.param(v.data,v.traditional)),_t(It,v,t,T),h)return T;for(i in(g=k.event&&v.global)&&0==k.active++&&k.event.trigger("ajaxStart"),v.type=v.type.toUpperCase(),v.hasContent=!Rt.test(v.type),f=v.url.replace(Ht,""),v.hasContent?v.data&&v.processData&&0===(v.contentType||"").indexOf("application/x-www-form-urlencoded")&&(v.data=v.data.replace(Lt,"+")):(o=v.url.slice(f.length),v.data&&(v.processData||"string"==typeof v.data)&&(f+=(St.test(f)?"&":"?")+v.data,delete v.data),!1===v.cache&&(f=f.replace(Ot,"$1"),o=(St.test(f)?"&":"?")+"_="+kt+++o),v.url=f+o),v.ifModified&&(k.lastModified[f]&&T.setRequestHeader("If-Modified-Since",k.lastModified[f]),k.etag[f]&&T.setRequestHeader("If-None-Match",k.etag[f])),(v.data&&v.hasContent&&!1!==v.contentType||t.contentType)&&T.setRequestHeader("Content-Type",v.contentType),T.setRequestHeader("Accept",v.dataTypes[0]&&v.accepts[v.dataTypes[0]]?v.accepts[v.dataTypes[0]]+("*"!==v.dataTypes[0]?", "+$t+"; q=0.01":""):v.accepts["*"]),v.headers)T.setRequestHeader(i,v.headers[i]);if(v.beforeSend&&(!1===v.beforeSend.call(y,T,v)||h))return T.abort();if(u="abort",b.add(v.complete),T.done(v.success),T.fail(v.error),c=_t(Wt,v,t,T)){if(T.readyState=1,g&&m.trigger("ajaxSend",[T,v]),h)return T;v.async&&0<v.timeout&&(d=C.setTimeout(function(){T.abort("timeout")},v.timeout));try{h=!1,c.send(a,l)}catch(e){if(h)throw e;l(-1,e)}}else l(-1,"No Transport");function l(e,t,n,r){var i,o,a,s,u,l=t;h||(h=!0,d&&C.clearTimeout(d),c=void 0,p=r||"",T.readyState=0<e?4:0,i=200<=e&&e<300||304===e,n&&(s=function(e,t,n){var r,i,o,a,s=e.contents,u=e.dataTypes;while("*"===u[0])u.shift(),void 0===r&&(r=e.mimeType||t.getResponseHeader("Content-Type"));if(r)for(i in s)if(s[i]&&s[i].test(r)){u.unshift(i);break}if(u[0]in n)o=u[0];else{for(i in n){if(!u[0]||e.converters[i+" "+u[0]]){o=i;break}a||(a=i)}o=o||a}if(o)return o!==u[0]&&u.unshift(o),n[o]}(v,T,n)),s=function(e,t,n,r){var i,o,a,s,u,l={},c=e.dataTypes.slice();if(c[1])for(a in e.converters)l[a.toLowerCase()]=e.converters[a];o=c.shift();while(o)if(e.responseFields[o]&&(n[e.responseFields[o]]=t),!u&&r&&e.dataFilter&&(t=e.dataFilter(t,e.dataType)),u=o,o=c.shift())if("*"===o)o=u;else if("*"!==u&&u!==o){if(!(a=l[u+" "+o]||l["* "+o]))for(i in l)if((s=i.split(" "))[1]===o&&(a=l[u+" "+s[0]]||l["* "+s[0]])){!0===a?a=l[i]:!0!==l[i]&&(o=s[0],c.unshift(s[1]));break}if(!0!==a)if(a&&e["throws"])t=a(t);else try{t=a(t)}catch(e){return{state:"parsererror",error:a?e:"No conversion from "+u+" to "+o}}}return{state:"success",data:t}}(v,s,T,i),i?(v.ifModified&&((u=T.getResponseHeader("Last-Modified"))&&(k.lastModified[f]=u),(u=T.getResponseHeader("etag"))&&(k.etag[f]=u)),204===e||"HEAD"===v.type?l="nocontent":304===e?l="notmodified":(l=s.state,o=s.data,i=!(a=s.error))):(a=l,!e&&l||(l="error",e<0&&(e=0))),T.status=e,T.statusText=(t||l)+"",i?x.resolveWith(y,[o,l,T]):x.rejectWith(y,[T,l,a]),T.statusCode(w),w=void 0,g&&m.trigger(i?"ajaxSuccess":"ajaxError",[T,v,i?o:a]),b.fireWith(y,[T,l]),g&&(m.trigger("ajaxComplete",[T,v]),--k.active||k.event.trigger("ajaxStop")))}return T},getJSON:function(e,t,n){return k.get(e,t,n,"json")},getScript:function(e,t){return k.get(e,void 0,t,"script")}}),k.each(["get","post"],function(e,i){k[i]=function(e,t,n,r){return m(t)&&(r=r||n,n=t,t=void 0),k.ajax(k.extend({url:e,type:i,dataType:r,data:t,success:n},k.isPlainObject(e)&&e))}}),k._evalUrl=function(e,t){return k.ajax({url:e,type:"GET",dataType:"script",cache:!0,async:!1,global:!1,converters:{"text script":function(){}},dataFilter:function(e){k.globalEval(e,t)}})},k.fn.extend({wrapAll:function(e){var t;return this[0]&&(m(e)&&(e=e.call(this[0])),t=k(e,this[0].ownerDocument).eq(0).clone(!0),this[0].parentNode&&t.insertBefore(this[0]),t.map(function(){var e=this;while(e.firstElementChild)e=e.firstElementChild;return e}).append(this)),this},wrapInner:function(n){return m(n)?this.each(function(e){k(this).wrapInner(n.call(this,e))}):this.each(function(){var e=k(this),t=e.contents();t.length?t.wrapAll(n):e.append(n)})},wrap:function(t){var n=m(t);return this.each(function(e){k(this).wrapAll(n?t.call(this,e):t)})},unwrap:function(e){return this.parent(e).not("body").each(function(){k(this).replaceWith(this.childNodes)}),this}}),k.expr.pseudos.hidden=function(e){return!k.expr.pseudos.visible(e)},k.expr.pseudos.visible=function(e){return!!(e.offsetWidth||e.offsetHeight||e.getClientRects().length)},k.ajaxSettings.xhr=function(){try{return new C.XMLHttpRequest}catch(e){}};var Ut={0:200,1223:204},Xt=k.ajaxSettings.xhr();y.cors=!!Xt&&"withCredentials"in Xt,y.ajax=Xt=!!Xt,k.ajaxTransport(function(i){var o,a;if(y.cors||Xt&&!i.crossDomain)return{send:function(e,t){var n,r=i.xhr();if(r.open(i.type,i.url,i.async,i.username,i.password),i.xhrFields)for(n in i.xhrFields)r[n]=i.xhrFields[n];for(n in i.mimeType&&r.overrideMimeType&&r.overrideMimeType(i.mimeType),i.crossDomain||e["X-Requested-With"]||(e["X-Requested-With"]="XMLHttpRequest"),e)r.setRequestHeader(n,e[n]);o=function(e){return function(){o&&(o=a=r.onload=r.onerror=r.onabort=r.ontimeout=r.onreadystatechange=null,"abort"===e?r.abort():"error"===e?"number"!=typeof r.status?t(0,"error"):t(r.status,r.statusText):t(Ut[r.status]||r.status,r.statusText,"text"!==(r.responseType||"text")||"string"!=typeof r.responseText?{binary:r.response}:{text:r.responseText},r.getAllResponseHeaders()))}},r.onload=o(),a=r.onerror=r.ontimeout=o("error"),void 0!==r.onabort?r.onabort=a:r.onreadystatechange=function(){4===r.readyState&&C.setTimeout(function(){o&&a()})},o=o("abort");try{r.send(i.hasContent&&i.data||null)}catch(e){if(o)throw e}},abort:function(){o&&o()}}}),k.ajaxPrefilter(function(e){e.crossDomain&&(e.contents.script=!1)}),k.ajaxSetup({accepts:{script:"text/javascript, application/javascript, application/ecmascript, application/x-ecmascript"},contents:{script:/\b(?:java|ecma)script\b/},converters:{"text script":function(e){return k.globalEval(e),e}}}),k.ajaxPrefilter("script",function(e){void 0===e.cache&&(e.cache=!1),e.crossDomain&&(e.type="GET")}),k.ajaxTransport("script",function(n){var r,i;if(n.crossDomain||n.scriptAttrs)return{send:function(e,t){r=k("<script>").attr(n.scriptAttrs||{}).prop({charset:n.scriptCharset,src:n.url}).on("load error",i=function(e){r.remove(),i=null,e&&t("error"===e.type?404:200,e.type)}),E.head.appendChild(r[0])},abort:function(){i&&i()}}});var Vt,Gt=[],Yt=/(=)\?(?=&|$)|\?\?/;k.ajaxSetup({jsonp:"callback",jsonpCallback:function(){var e=Gt.pop()||k.expando+"_"+kt++;return this[e]=!0,e}}),k.ajaxPrefilter("json jsonp",function(e,t,n){var r,i,o,a=!1!==e.jsonp&&(Yt.test(e.url)?"url":"string"==typeof e.data&&0===(e.contentType||"").indexOf("application/x-www-form-urlencoded")&&Yt.test(e.data)&&"data");if(a||"jsonp"===e.dataTypes[0])return r=e.jsonpCallback=m(e.jsonpCallback)?e.jsonpCallback():e.jsonpCallback,a?e[a]=e[a].replace(Yt,"$1"+r):!1!==e.jsonp&&(e.url+=(St.test(e.url)?"&":"?")+e.jsonp+"="+r),e.converters["script json"]=function(){return o||k.error(r+" was not called"),o[0]},e.dataTypes[0]="json",i=C[r],C[r]=function(){o=arguments},n.always(function(){void 0===i?k(C).removeProp(r):C[r]=i,e[r]&&(e.jsonpCallback=t.jsonpCallback,Gt.push(r)),o&&m(i)&&i(o[0]),o=i=void 0}),"script"}),y.createHTMLDocument=((Vt=E.implementation.createHTMLDocument("").body).innerHTML="<form></form><form></form>",2===Vt.childNodes.length),k.parseHTML=function(e,t,n){return"string"!=typeof e?[]:("boolean"==typeof t&&(n=t,t=!1),t||(y.createHTMLDocument?((r=(t=E.implementation.createHTMLDocument("")).createElement("base")).href=E.location.href,t.head.appendChild(r)):t=E),o=!n&&[],(i=D.exec(e))?[t.createElement(i[1])]:(i=we([e],t,o),o&&o.length&&k(o).remove(),k.merge([],i.childNodes)));var r,i,o},k.fn.load=function(e,t,n){var r,i,o,a=this,s=e.indexOf(" ");return-1<s&&(r=mt(e.slice(s)),e=e.slice(0,s)),m(t)?(n=t,t=void 0):t&&"object"==typeof t&&(i="POST"),0<a.length&&k.ajax({url:e,type:i||"GET",dataType:"html",data:t}).done(function(e){o=arguments,a.html(r?k("<div>").append(k.parseHTML(e)).find(r):e)}).always(n&&function(e,t){a.each(function(){n.apply(this,o||[e.responseText,t,e])})}),this},k.each(["ajaxStart","ajaxStop","ajaxComplete","ajaxError","ajaxSuccess","ajaxSend"],function(e,t){k.fn[t]=function(e){return this.on(t,e)}}),k.expr.pseudos.animated=function(t){return k.grep(k.timers,function(e){return t===e.elem}).length},k.offset={setOffset:function(e,t,n){var r,i,o,a,s,u,l=k.css(e,"position"),c=k(e),f={};"static"===l&&(e.style.position="relative"),s=c.offset(),o=k.css(e,"top"),u=k.css(e,"left"),("absolute"===l||"fixed"===l)&&-1<(o+u).indexOf("auto")?(a=(r=c.position()).top,i=r.left):(a=parseFloat(o)||0,i=parseFloat(u)||0),m(t)&&(t=t.call(e,n,k.extend({},s))),null!=t.top&&(f.top=t.top-s.top+a),null!=t.left&&(f.left=t.left-s.left+i),"using"in t?t.using.call(e,f):c.css(f)}},k.fn.extend({offset:function(t){if(arguments.length)return void 0===t?this:this.each(function(e){k.offset.setOffset(this,t,e)});var e,n,r=this[0];return r?r.getClientRects().length?(e=r.getBoundingClientRect(),n=r.ownerDocument.defaultView,{top:e.top+n.pageYOffset,left:e.left+n.pageXOffset}):{top:0,left:0}:void 0},position:function(){if(this[0]){var e,t,n,r=this[0],i={top:0,left:0};if("fixed"===k.css(r,"position"))t=r.getBoundingClientRect();else{t=this.offset(),n=r.ownerDocument,e=r.offsetParent||n.documentElement;while(e&&(e===n.body||e===n.documentElement)&&"static"===k.css(e,"position"))e=e.parentNode;e&&e!==r&&1===e.nodeType&&((i=k(e).offset()).top+=k.css(e,"borderTopWidth",!0),i.left+=k.css(e,"borderLeftWidth",!0))}return{top:t.top-i.top-k.css(r,"marginTop",!0),left:t.left-i.left-k.css(r,"marginLeft",!0)}}},offsetParent:function(){return this.map(function(){var e=this.offsetParent;while(e&&"static"===k.css(e,"position"))e=e.offsetParent;return e||ie})}}),k.each({scrollLeft:"pageXOffset",scrollTop:"pageYOffset"},function(t,i){var o="pageYOffset"===i;k.fn[t]=function(e){return _(this,function(e,t,n){var r;if(x(e)?r=e:9===e.nodeType&&(r=e.defaultView),void 0===n)return r?r[i]:e[t];r?r.scrollTo(o?r.pageXOffset:n,o?n:r.pageYOffset):e[t]=n},t,e,arguments.length)}}),k.each(["top","left"],function(e,n){k.cssHooks[n]=ze(y.pixelPosition,function(e,t){if(t)return t=_e(e,n),$e.test(t)?k(e).position()[n]+"px":t})}),k.each({Height:"height",Width:"width"},function(a,s){k.each({padding:"inner"+a,content:s,"":"outer"+a},function(r,o){k.fn[o]=function(e,t){var n=arguments.length&&(r||"boolean"!=typeof e),i=r||(!0===e||!0===t?"margin":"border");return _(this,function(e,t,n){var r;return x(e)?0===o.indexOf("outer")?e["inner"+a]:e.document.documentElement["client"+a]:9===e.nodeType?(r=e.documentElement,Math.max(e.body["scroll"+a],r["scroll"+a],e.body["offset"+a],r["offset"+a],r["client"+a])):void 0===n?k.css(e,t,i):k.style(e,t,n,i)},s,n?e:void 0,n)}})}),k.each("blur focus focusin focusout resize scroll click dblclick mousedown mouseup mousemove mouseover mouseout mouseenter mouseleave change select submit keydown keypress keyup contextmenu".split(" "),function(e,n){k.fn[n]=function(e,t){return 0<arguments.length?this.on(n,null,e,t):this.trigger(n)}}),k.fn.extend({hover:function(e,t){return this.mouseenter(e).mouseleave(t||e)}}),k.fn.extend({bind:function(e,t,n){return this.on(e,null,t,n)},unbind:function(e,t){return this.off(e,null,t)},delegate:function(e,t,n,r){return this.on(t,e,n,r)},undelegate:function(e,t,n){return 1===arguments.length?this.off(e,"**"):this.off(t,e||"**",n)}}),k.proxy=function(e,t){var n,r,i;if("string"==typeof t&&(n=e[t],t=e,e=n),m(e))return r=s.call(arguments,2),(i=function(){return e.apply(t||this,r.concat(s.call(arguments)))}).guid=e.guid=e.guid||k.guid++,i},k.holdReady=function(e){e?k.readyWait++:k.ready(!0)},k.isArray=Array.isArray,k.parseJSON=JSON.parse,k.nodeName=A,k.isFunction=m,k.isWindow=x,k.camelCase=V,k.type=w,k.now=Date.now,k.isNumeric=function(e){var t=k.type(e);return("number"===t||"string"===t)&&!isNaN(e-parseFloat(e))},"function"==typeof define&&define.amd&&define("jquery",[],function(){return k});var Qt=C.jQuery,Jt=C.$;return k.noConflict=function(e){return C.$===k&&(C.$=Jt),e&&C.jQuery===k&&(C.jQuery=Qt),k},e||(C.jQuery=C.$=k),k});

/*! jQuery UI - v1.12.1 - 2019-12-23
* http://jqueryui.com
* Includes: widget.js, data.js, focusable.js, scroll-parent.js, widgets/draggable.js, widgets/droppable.js, widgets/sortable.js, widgets/mouse.js
* Copyright jQuery Foundation and other contributors; Licensed MIT */

(function(t){"function"==typeof define&&define.amd?define(["jquery"],t):t(jQuery)})(function(t){function e(t){for(var e=t.css("visibility");"inherit"===e;)t=t.parent(),e=t.css("visibility");return"hidden"!==e}t.ui=t.ui||{},t.ui.version="1.12.1";var i=0,s=Array.prototype.slice;t.cleanData=function(e){return function(i){var s,n,o;for(o=0;null!=(n=i[o]);o++)try{s=t._data(n,"events"),s&&s.remove&&t(n).triggerHandler("remove")}catch(a){}e(i)}}(t.cleanData),t.widget=function(e,i,s){var n,o,a,r={},h=e.split(".")[0];e=e.split(".")[1];var l=h+"-"+e;return s||(s=i,i=t.Widget),t.isArray(s)&&(s=t.extend.apply(null,[{}].concat(s))),t.expr[":"][l.toLowerCase()]=function(e){return!!t.data(e,l)},t[h]=t[h]||{},n=t[h][e],o=t[h][e]=function(t,e){return this._createWidget?(arguments.length&&this._createWidget(t,e),void 0):new o(t,e)},t.extend(o,n,{version:s.version,_proto:t.extend({},s),_childConstructors:[]}),a=new i,a.options=t.widget.extend({},a.options),t.each(s,function(e,s){return t.isFunction(s)?(r[e]=function(){function t(){return i.prototype[e].apply(this,arguments)}function n(t){return i.prototype[e].apply(this,t)}return function(){var e,i=this._super,o=this._superApply;return this._super=t,this._superApply=n,e=s.apply(this,arguments),this._super=i,this._superApply=o,e}}(),void 0):(r[e]=s,void 0)}),o.prototype=t.widget.extend(a,{widgetEventPrefix:n?a.widgetEventPrefix||e:e},r,{constructor:o,namespace:h,widgetName:e,widgetFullName:l}),n?(t.each(n._childConstructors,function(e,i){var s=i.prototype;t.widget(s.namespace+"."+s.widgetName,o,i._proto)}),delete n._childConstructors):i._childConstructors.push(o),t.widget.bridge(e,o),o},t.widget.extend=function(e){for(var i,n,o=s.call(arguments,1),a=0,r=o.length;r>a;a++)for(i in o[a])n=o[a][i],o[a].hasOwnProperty(i)&&void 0!==n&&(e[i]=t.isPlainObject(n)?t.isPlainObject(e[i])?t.widget.extend({},e[i],n):t.widget.extend({},n):n);return e},t.widget.bridge=function(e,i){var n=i.prototype.widgetFullName||e;t.fn[e]=function(o){var a="string"==typeof o,r=s.call(arguments,1),h=this;return a?this.length||"instance"!==o?this.each(function(){var i,s=t.data(this,n);return"instance"===o?(h=s,!1):s?t.isFunction(s[o])&&"_"!==o.charAt(0)?(i=s[o].apply(s,r),i!==s&&void 0!==i?(h=i&&i.jquery?h.pushStack(i.get()):i,!1):void 0):t.error("no such method '"+o+"' for "+e+" widget instance"):t.error("cannot call methods on "+e+" prior to initialization; "+"attempted to call method '"+o+"'")}):h=void 0:(r.length&&(o=t.widget.extend.apply(null,[o].concat(r))),this.each(function(){var e=t.data(this,n);e?(e.option(o||{}),e._init&&e._init()):t.data(this,n,new i(o,this))})),h}},t.Widget=function(){},t.Widget._childConstructors=[],t.Widget.prototype={widgetName:"widget",widgetEventPrefix:"",defaultElement:"<div>",options:{classes:{},disabled:!1,create:null},_createWidget:function(e,s){s=t(s||this.defaultElement||this)[0],this.element=t(s),this.uuid=i++,this.eventNamespace="."+this.widgetName+this.uuid,this.bindings=t(),this.hoverable=t(),this.focusable=t(),this.classesElementLookup={},s!==this&&(t.data(s,this.widgetFullName,this),this._on(!0,this.element,{remove:function(t){t.target===s&&this.destroy()}}),this.document=t(s.style?s.ownerDocument:s.document||s),this.window=t(this.document[0].defaultView||this.document[0].parentWindow)),this.options=t.widget.extend({},this.options,this._getCreateOptions(),e),this._create(),this.options.disabled&&this._setOptionDisabled(this.options.disabled),this._trigger("create",null,this._getCreateEventData()),this._init()},_getCreateOptions:function(){return{}},_getCreateEventData:t.noop,_create:t.noop,_init:t.noop,destroy:function(){var e=this;this._destroy(),t.each(this.classesElementLookup,function(t,i){e._removeClass(i,t)}),this.element.off(this.eventNamespace).removeData(this.widgetFullName),this.widget().off(this.eventNamespace).removeAttr("aria-disabled"),this.bindings.off(this.eventNamespace)},_destroy:t.noop,widget:function(){return this.element},option:function(e,i){var s,n,o,a=e;if(0===arguments.length)return t.widget.extend({},this.options);if("string"==typeof e)if(a={},s=e.split("."),e=s.shift(),s.length){for(n=a[e]=t.widget.extend({},this.options[e]),o=0;s.length-1>o;o++)n[s[o]]=n[s[o]]||{},n=n[s[o]];if(e=s.pop(),1===arguments.length)return void 0===n[e]?null:n[e];n[e]=i}else{if(1===arguments.length)return void 0===this.options[e]?null:this.options[e];a[e]=i}return this._setOptions(a),this},_setOptions:function(t){var e;for(e in t)this._setOption(e,t[e]);return this},_setOption:function(t,e){return"classes"===t&&this._setOptionClasses(e),this.options[t]=e,"disabled"===t&&this._setOptionDisabled(e),this},_setOptionClasses:function(e){var i,s,n;for(i in e)n=this.classesElementLookup[i],e[i]!==this.options.classes[i]&&n&&n.length&&(s=t(n.get()),this._removeClass(n,i),s.addClass(this._classes({element:s,keys:i,classes:e,add:!0})))},_setOptionDisabled:function(t){this._toggleClass(this.widget(),this.widgetFullName+"-disabled",null,!!t),t&&(this._removeClass(this.hoverable,null,"ui-state-hover"),this._removeClass(this.focusable,null,"ui-state-focus"))},enable:function(){return this._setOptions({disabled:!1})},disable:function(){return this._setOptions({disabled:!0})},_classes:function(e){function i(i,o){var a,r;for(r=0;i.length>r;r++)a=n.classesElementLookup[i[r]]||t(),a=e.add?t(t.unique(a.get().concat(e.element.get()))):t(a.not(e.element).get()),n.classesElementLookup[i[r]]=a,s.push(i[r]),o&&e.classes[i[r]]&&s.push(e.classes[i[r]])}var s=[],n=this;return e=t.extend({element:this.element,classes:this.options.classes||{}},e),this._on(e.element,{remove:"_untrackClassesElement"}),e.keys&&i(e.keys.match(/\S+/g)||[],!0),e.extra&&i(e.extra.match(/\S+/g)||[]),s.join(" ")},_untrackClassesElement:function(e){var i=this;t.each(i.classesElementLookup,function(s,n){-1!==t.inArray(e.target,n)&&(i.classesElementLookup[s]=t(n.not(e.target).get()))})},_removeClass:function(t,e,i){return this._toggleClass(t,e,i,!1)},_addClass:function(t,e,i){return this._toggleClass(t,e,i,!0)},_toggleClass:function(t,e,i,s){s="boolean"==typeof s?s:i;var n="string"==typeof t||null===t,o={extra:n?e:i,keys:n?t:e,element:n?this.element:t,add:s};return o.element.toggleClass(this._classes(o),s),this},_on:function(e,i,s){var n,o=this;"boolean"!=typeof e&&(s=i,i=e,e=!1),s?(i=n=t(i),this.bindings=this.bindings.add(i)):(s=i,i=this.element,n=this.widget()),t.each(s,function(s,a){function r(){return e||o.options.disabled!==!0&&!t(this).hasClass("ui-state-disabled")?("string"==typeof a?o[a]:a).apply(o,arguments):void 0}"string"!=typeof a&&(r.guid=a.guid=a.guid||r.guid||t.guid++);var h=s.match(/^([\w:-]*)\s*(.*)$/),l=h[1]+o.eventNamespace,u=h[2];u?n.on(l,u,r):i.on(l,r)})},_off:function(e,i){i=(i||"").split(" ").join(this.eventNamespace+" ")+this.eventNamespace,e.off(i).off(i),this.bindings=t(this.bindings.not(e).get()),this.focusable=t(this.focusable.not(e).get()),this.hoverable=t(this.hoverable.not(e).get())},_delay:function(t,e){function i(){return("string"==typeof t?s[t]:t).apply(s,arguments)}var s=this;return setTimeout(i,e||0)},_hoverable:function(e){this.hoverable=this.hoverable.add(e),this._on(e,{mouseenter:function(e){this._addClass(t(e.currentTarget),null,"ui-state-hover")},mouseleave:function(e){this._removeClass(t(e.currentTarget),null,"ui-state-hover")}})},_focusable:function(e){this.focusable=this.focusable.add(e),this._on(e,{focusin:function(e){this._addClass(t(e.currentTarget),null,"ui-state-focus")},focusout:function(e){this._removeClass(t(e.currentTarget),null,"ui-state-focus")}})},_trigger:function(e,i,s){var n,o,a=this.options[e];if(s=s||{},i=t.Event(i),i.type=(e===this.widgetEventPrefix?e:this.widgetEventPrefix+e).toLowerCase(),i.target=this.element[0],o=i.originalEvent)for(n in o)n in i||(i[n]=o[n]);return this.element.trigger(i,s),!(t.isFunction(a)&&a.apply(this.element[0],[i].concat(s))===!1||i.isDefaultPrevented())}},t.each({show:"fadeIn",hide:"fadeOut"},function(e,i){t.Widget.prototype["_"+e]=function(s,n,o){"string"==typeof n&&(n={effect:n});var a,r=n?n===!0||"number"==typeof n?i:n.effect||i:e;n=n||{},"number"==typeof n&&(n={duration:n}),a=!t.isEmptyObject(n),n.complete=o,n.delay&&s.delay(n.delay),a&&t.effects&&t.effects.effect[r]?s[e](n):r!==e&&s[r]?s[r](n.duration,n.easing,o):s.queue(function(i){t(this)[e](),o&&o.call(s[0]),i()})}}),t.widget,t.extend(t.expr[":"],{data:t.expr.createPseudo?t.expr.createPseudo(function(e){return function(i){return!!t.data(i,e)}}):function(e,i,s){return!!t.data(e,s[3])}}),t.ui.focusable=function(i,s){var n,o,a,r,h,l=i.nodeName.toLowerCase();return"area"===l?(n=i.parentNode,o=n.name,i.href&&o&&"map"===n.nodeName.toLowerCase()?(a=t("img[usemap='#"+o+"']"),a.length>0&&a.is(":visible")):!1):(/^(input|select|textarea|button|object)$/.test(l)?(r=!i.disabled,r&&(h=t(i).closest("fieldset")[0],h&&(r=!h.disabled))):r="a"===l?i.href||s:s,r&&t(i).is(":visible")&&e(t(i)))},t.extend(t.expr[":"],{focusable:function(e){return t.ui.focusable(e,null!=t.attr(e,"tabindex"))}}),t.ui.focusable,t.fn.scrollParent=function(e){var i=this.css("position"),s="absolute"===i,n=e?/(auto|scroll|hidden)/:/(auto|scroll)/,o=this.parents().filter(function(){var e=t(this);return s&&"static"===e.css("position")?!1:n.test(e.css("overflow")+e.css("overflow-y")+e.css("overflow-x"))}).eq(0);return"fixed"!==i&&o.length?o:t(this[0].ownerDocument||document)},t.ui.ie=!!/msie [\w.]+/.exec(navigator.userAgent.toLowerCase());var n=!1;t(document).on("mouseup",function(){n=!1}),t.widget("ui.mouse",{version:"1.12.1",options:{cancel:"input, textarea, button, select, option",distance:1,delay:0},_mouseInit:function(){var e=this;this.element.on("mousedown."+this.widgetName,function(t){return e._mouseDown(t)}).on("click."+this.widgetName,function(i){return!0===t.data(i.target,e.widgetName+".preventClickEvent")?(t.removeData(i.target,e.widgetName+".preventClickEvent"),i.stopImmediatePropagation(),!1):void 0}),this.started=!1},_mouseDestroy:function(){this.element.off("."+this.widgetName),this._mouseMoveDelegate&&this.document.off("mousemove."+this.widgetName,this._mouseMoveDelegate).off("mouseup."+this.widgetName,this._mouseUpDelegate)},_mouseDown:function(e){if(!n){this._mouseMoved=!1,this._mouseStarted&&this._mouseUp(e),this._mouseDownEvent=e;var i=this,s=1===e.which,o="string"==typeof this.options.cancel&&e.target.nodeName?t(e.target).closest(this.options.cancel).length:!1;return s&&!o&&this._mouseCapture(e)?(this.mouseDelayMet=!this.options.delay,this.mouseDelayMet||(this._mouseDelayTimer=setTimeout(function(){i.mouseDelayMet=!0},this.options.delay)),this._mouseDistanceMet(e)&&this._mouseDelayMet(e)&&(this._mouseStarted=this._mouseStart(e)!==!1,!this._mouseStarted)?(e.preventDefault(),!0):(!0===t.data(e.target,this.widgetName+".preventClickEvent")&&t.removeData(e.target,this.widgetName+".preventClickEvent"),this._mouseMoveDelegate=function(t){return i._mouseMove(t)},this._mouseUpDelegate=function(t){return i._mouseUp(t)},this.document.on("mousemove."+this.widgetName,this._mouseMoveDelegate).on("mouseup."+this.widgetName,this._mouseUpDelegate),e.preventDefault(),n=!0,!0)):!0}},_mouseMove:function(e){if(this._mouseMoved){if(t.ui.ie&&(!document.documentMode||9>document.documentMode)&&!e.button)return this._mouseUp(e);if(!e.which)if(e.originalEvent.altKey||e.originalEvent.ctrlKey||e.originalEvent.metaKey||e.originalEvent.shiftKey)this.ignoreMissingWhich=!0;else if(!this.ignoreMissingWhich)return this._mouseUp(e)}return(e.which||e.button)&&(this._mouseMoved=!0),this._mouseStarted?(this._mouseDrag(e),e.preventDefault()):(this._mouseDistanceMet(e)&&this._mouseDelayMet(e)&&(this._mouseStarted=this._mouseStart(this._mouseDownEvent,e)!==!1,this._mouseStarted?this._mouseDrag(e):this._mouseUp(e)),!this._mouseStarted)},_mouseUp:function(e){this.document.off("mousemove."+this.widgetName,this._mouseMoveDelegate).off("mouseup."+this.widgetName,this._mouseUpDelegate),this._mouseStarted&&(this._mouseStarted=!1,e.target===this._mouseDownEvent.target&&t.data(e.target,this.widgetName+".preventClickEvent",!0),this._mouseStop(e)),this._mouseDelayTimer&&(clearTimeout(this._mouseDelayTimer),delete this._mouseDelayTimer),this.ignoreMissingWhich=!1,n=!1,e.preventDefault()},_mouseDistanceMet:function(t){return Math.max(Math.abs(this._mouseDownEvent.pageX-t.pageX),Math.abs(this._mouseDownEvent.pageY-t.pageY))>=this.options.distance},_mouseDelayMet:function(){return this.mouseDelayMet},_mouseStart:function(){},_mouseDrag:function(){},_mouseStop:function(){},_mouseCapture:function(){return!0}}),t.ui.plugin={add:function(e,i,s){var n,o=t.ui[e].prototype;for(n in s)o.plugins[n]=o.plugins[n]||[],o.plugins[n].push([i,s[n]])},call:function(t,e,i,s){var n,o=t.plugins[e];if(o&&(s||t.element[0].parentNode&&11!==t.element[0].parentNode.nodeType))for(n=0;o.length>n;n++)t.options[o[n][0]]&&o[n][1].apply(t.element,i)}},t.ui.safeActiveElement=function(t){var e;try{e=t.activeElement}catch(i){e=t.body}return e||(e=t.body),e.nodeName||(e=t.body),e},t.ui.safeBlur=function(e){e&&"body"!==e.nodeName.toLowerCase()&&t(e).trigger("blur")},t.widget("ui.draggable",t.ui.mouse,{version:"1.12.1",widgetEventPrefix:"drag",options:{addClasses:!0,appendTo:"parent",axis:!1,connectToSortable:!1,containment:!1,cursor:"auto",cursorAt:!1,grid:!1,handle:!1,helper:"original",iframeFix:!1,opacity:!1,refreshPositions:!1,revert:!1,revertDuration:500,scope:"default",scroll:!0,scrollSensitivity:20,scrollSpeed:20,snap:!1,snapMode:"both",snapTolerance:20,stack:!1,zIndex:!1,drag:null,start:null,stop:null},_create:function(){"original"===this.options.helper&&this._setPositionRelative(),this.options.addClasses&&this._addClass("ui-draggable"),this._setHandleClassName(),this._mouseInit()},_setOption:function(t,e){this._super(t,e),"handle"===t&&(this._removeHandleClassName(),this._setHandleClassName())},_destroy:function(){return(this.helper||this.element).is(".ui-draggable-dragging")?(this.destroyOnClear=!0,void 0):(this._removeHandleClassName(),this._mouseDestroy(),void 0)},_mouseCapture:function(e){var i=this.options;return this.helper||i.disabled||t(e.target).closest(".ui-resizable-handle").length>0?!1:(this.handle=this._getHandle(e),this.handle?(this._blurActiveElement(e),this._blockFrames(i.iframeFix===!0?"iframe":i.iframeFix),!0):!1)},_blockFrames:function(e){this.iframeBlocks=this.document.find(e).map(function(){var e=t(this);return t("<div>").css("position","absolute").appendTo(e.parent()).outerWidth(e.outerWidth()).outerHeight(e.outerHeight()).offset(e.offset())[0]})},_unblockFrames:function(){this.iframeBlocks&&(this.iframeBlocks.remove(),delete this.iframeBlocks)},_blurActiveElement:function(e){var i=t.ui.safeActiveElement(this.document[0]),s=t(e.target);s.closest(i).length||t.ui.safeBlur(i)},_mouseStart:function(e){var i=this.options;return this.helper=this._createHelper(e),this._addClass(this.helper,"ui-draggable-dragging"),this._cacheHelperProportions(),t.ui.ddmanager&&(t.ui.ddmanager.current=this),this._cacheMargins(),this.cssPosition=this.helper.css("position"),this.scrollParent=this.helper.scrollParent(!0),this.offsetParent=this.helper.offsetParent(),this.hasFixedAncestor=this.helper.parents().filter(function(){return"fixed"===t(this).css("position")}).length>0,this.positionAbs=this.element.offset(),this._refreshOffsets(e),this.originalPosition=this.position=this._generatePosition(e,!1),this.originalPageX=e.pageX,this.originalPageY=e.pageY,i.cursorAt&&this._adjustOffsetFromHelper(i.cursorAt),this._setContainment(),this._trigger("start",e)===!1?(this._clear(),!1):(this._cacheHelperProportions(),t.ui.ddmanager&&!i.dropBehaviour&&t.ui.ddmanager.prepareOffsets(this,e),this._mouseDrag(e,!0),t.ui.ddmanager&&t.ui.ddmanager.dragStart(this,e),!0)},_refreshOffsets:function(t){this.offset={top:this.positionAbs.top-this.margins.top,left:this.positionAbs.left-this.margins.left,scroll:!1,parent:this._getParentOffset(),relative:this._getRelativeOffset()},this.offset.click={left:t.pageX-this.offset.left,top:t.pageY-this.offset.top}},_mouseDrag:function(e,i){if(this.hasFixedAncestor&&(this.offset.parent=this._getParentOffset()),this.position=this._generatePosition(e,!0),this.positionAbs=this._convertPositionTo("absolute"),!i){var s=this._uiHash();if(this._trigger("drag",e,s)===!1)return this._mouseUp(new t.Event("mouseup",e)),!1;this.position=s.position}return this.helper[0].style.left=this.position.left+"px",this.helper[0].style.top=this.position.top+"px",t.ui.ddmanager&&t.ui.ddmanager.drag(this,e),!1},_mouseStop:function(e){var i=this,s=!1;return t.ui.ddmanager&&!this.options.dropBehaviour&&(s=t.ui.ddmanager.drop(this,e)),this.dropped&&(s=this.dropped,this.dropped=!1),"invalid"===this.options.revert&&!s||"valid"===this.options.revert&&s||this.options.revert===!0||t.isFunction(this.options.revert)&&this.options.revert.call(this.element,s)?t(this.helper).animate(this.originalPosition,parseInt(this.options.revertDuration,10),function(){i._trigger("stop",e)!==!1&&i._clear()}):this._trigger("stop",e)!==!1&&this._clear(),!1},_mouseUp:function(e){return this._unblockFrames(),t.ui.ddmanager&&t.ui.ddmanager.dragStop(this,e),this.handleElement.is(e.target)&&this.element.trigger("focus"),t.ui.mouse.prototype._mouseUp.call(this,e)},cancel:function(){return this.helper.is(".ui-draggable-dragging")?this._mouseUp(new t.Event("mouseup",{target:this.element[0]})):this._clear(),this},_getHandle:function(e){return this.options.handle?!!t(e.target).closest(this.element.find(this.options.handle)).length:!0},_setHandleClassName:function(){this.handleElement=this.options.handle?this.element.find(this.options.handle):this.element,this._addClass(this.handleElement,"ui-draggable-handle")},_removeHandleClassName:function(){this._removeClass(this.handleElement,"ui-draggable-handle")},_createHelper:function(e){var i=this.options,s=t.isFunction(i.helper),n=s?t(i.helper.apply(this.element[0],[e])):"clone"===i.helper?this.element.clone().removeAttr("id"):this.element;return n.parents("body").length||n.appendTo("parent"===i.appendTo?this.element[0].parentNode:i.appendTo),s&&n[0]===this.element[0]&&this._setPositionRelative(),n[0]===this.element[0]||/(fixed|absolute)/.test(n.css("position"))||n.css("position","absolute"),n},_setPositionRelative:function(){/^(?:r|a|f)/.test(this.element.css("position"))||(this.element[0].style.position="relative")},_adjustOffsetFromHelper:function(e){"string"==typeof e&&(e=e.split(" ")),t.isArray(e)&&(e={left:+e[0],top:+e[1]||0}),"left"in e&&(this.offset.click.left=e.left+this.margins.left),"right"in e&&(this.offset.click.left=this.helperProportions.width-e.right+this.margins.left),"top"in e&&(this.offset.click.top=e.top+this.margins.top),"bottom"in e&&(this.offset.click.top=this.helperProportions.height-e.bottom+this.margins.top)},_isRootNode:function(t){return/(html|body)/i.test(t.tagName)||t===this.document[0]},_getParentOffset:function(){var e=this.offsetParent.offset(),i=this.document[0];return"absolute"===this.cssPosition&&this.scrollParent[0]!==i&&t.contains(this.scrollParent[0],this.offsetParent[0])&&(e.left+=this.scrollParent.scrollLeft(),e.top+=this.scrollParent.scrollTop()),this._isRootNode(this.offsetParent[0])&&(e={top:0,left:0}),{top:e.top+(parseInt(this.offsetParent.css("borderTopWidth"),10)||0),left:e.left+(parseInt(this.offsetParent.css("borderLeftWidth"),10)||0)}},_getRelativeOffset:function(){if("relative"!==this.cssPosition)return{top:0,left:0};var t=this.element.position(),e=this._isRootNode(this.scrollParent[0]);return{top:t.top-(parseInt(this.helper.css("top"),10)||0)+(e?0:this.scrollParent.scrollTop()),left:t.left-(parseInt(this.helper.css("left"),10)||0)+(e?0:this.scrollParent.scrollLeft())}},_cacheMargins:function(){this.margins={left:parseInt(this.element.css("marginLeft"),10)||0,top:parseInt(this.element.css("marginTop"),10)||0,right:parseInt(this.element.css("marginRight"),10)||0,bottom:parseInt(this.element.css("marginBottom"),10)||0}},_cacheHelperProportions:function(){this.helperProportions={width:this.helper.outerWidth(),height:this.helper.outerHeight()}},_setContainment:function(){var e,i,s,n=this.options,o=this.document[0];return this.relativeContainer=null,n.containment?"window"===n.containment?(this.containment=[t(window).scrollLeft()-this.offset.relative.left-this.offset.parent.left,t(window).scrollTop()-this.offset.relative.top-this.offset.parent.top,t(window).scrollLeft()+t(window).width()-this.helperProportions.width-this.margins.left,t(window).scrollTop()+(t(window).height()||o.body.parentNode.scrollHeight)-this.helperProportions.height-this.margins.top],void 0):"document"===n.containment?(this.containment=[0,0,t(o).width()-this.helperProportions.width-this.margins.left,(t(o).height()||o.body.parentNode.scrollHeight)-this.helperProportions.height-this.margins.top],void 0):n.containment.constructor===Array?(this.containment=n.containment,void 0):("parent"===n.containment&&(n.containment=this.helper[0].parentNode),i=t(n.containment),s=i[0],s&&(e=/(scroll|auto)/.test(i.css("overflow")),this.containment=[(parseInt(i.css("borderLeftWidth"),10)||0)+(parseInt(i.css("paddingLeft"),10)||0),(parseInt(i.css("borderTopWidth"),10)||0)+(parseInt(i.css("paddingTop"),10)||0),(e?Math.max(s.scrollWidth,s.offsetWidth):s.offsetWidth)-(parseInt(i.css("borderRightWidth"),10)||0)-(parseInt(i.css("paddingRight"),10)||0)-this.helperProportions.width-this.margins.left-this.margins.right,(e?Math.max(s.scrollHeight,s.offsetHeight):s.offsetHeight)-(parseInt(i.css("borderBottomWidth"),10)||0)-(parseInt(i.css("paddingBottom"),10)||0)-this.helperProportions.height-this.margins.top-this.margins.bottom],this.relativeContainer=i),void 0):(this.containment=null,void 0)},_convertPositionTo:function(t,e){e||(e=this.position);var i="absolute"===t?1:-1,s=this._isRootNode(this.scrollParent[0]);return{top:e.top+this.offset.relative.top*i+this.offset.parent.top*i-("fixed"===this.cssPosition?-this.offset.scroll.top:s?0:this.offset.scroll.top)*i,left:e.left+this.offset.relative.left*i+this.offset.parent.left*i-("fixed"===this.cssPosition?-this.offset.scroll.left:s?0:this.offset.scroll.left)*i}},_generatePosition:function(t,e){var i,s,n,o,a=this.options,r=this._isRootNode(this.scrollParent[0]),h=t.pageX,l=t.pageY;return r&&this.offset.scroll||(this.offset.scroll={top:this.scrollParent.scrollTop(),left:this.scrollParent.scrollLeft()}),e&&(this.containment&&(this.relativeContainer?(s=this.relativeContainer.offset(),i=[this.containment[0]+s.left,this.containment[1]+s.top,this.containment[2]+s.left,this.containment[3]+s.top]):i=this.containment,t.pageX-this.offset.click.left<i[0]&&(h=i[0]+this.offset.click.left),t.pageY-this.offset.click.top<i[1]&&(l=i[1]+this.offset.click.top),t.pageX-this.offset.click.left>i[2]&&(h=i[2]+this.offset.click.left),t.pageY-this.offset.click.top>i[3]&&(l=i[3]+this.offset.click.top)),a.grid&&(n=a.grid[1]?this.originalPageY+Math.round((l-this.originalPageY)/a.grid[1])*a.grid[1]:this.originalPageY,l=i?n-this.offset.click.top>=i[1]||n-this.offset.click.top>i[3]?n:n-this.offset.click.top>=i[1]?n-a.grid[1]:n+a.grid[1]:n,o=a.grid[0]?this.originalPageX+Math.round((h-this.originalPageX)/a.grid[0])*a.grid[0]:this.originalPageX,h=i?o-this.offset.click.left>=i[0]||o-this.offset.click.left>i[2]?o:o-this.offset.click.left>=i[0]?o-a.grid[0]:o+a.grid[0]:o),"y"===a.axis&&(h=this.originalPageX),"x"===a.axis&&(l=this.originalPageY)),{top:l-this.offset.click.top-this.offset.relative.top-this.offset.parent.top+("fixed"===this.cssPosition?-this.offset.scroll.top:r?0:this.offset.scroll.top),left:h-this.offset.click.left-this.offset.relative.left-this.offset.parent.left+("fixed"===this.cssPosition?-this.offset.scroll.left:r?0:this.offset.scroll.left)}},_clear:function(){this._removeClass(this.helper,"ui-draggable-dragging"),this.helper[0]===this.element[0]||this.cancelHelperRemoval||this.helper.remove(),this.helper=null,this.cancelHelperRemoval=!1,this.destroyOnClear&&this.destroy()},_trigger:function(e,i,s){return s=s||this._uiHash(),t.ui.plugin.call(this,e,[i,s,this],!0),/^(drag|start|stop)/.test(e)&&(this.positionAbs=this._convertPositionTo("absolute"),s.offset=this.positionAbs),t.Widget.prototype._trigger.call(this,e,i,s)},plugins:{},_uiHash:function(){return{helper:this.helper,position:this.position,originalPosition:this.originalPosition,offset:this.positionAbs}}}),t.ui.plugin.add("draggable","connectToSortable",{start:function(e,i,s){var n=t.extend({},i,{item:s.element});s.sortables=[],t(s.options.connectToSortable).each(function(){var i=t(this).sortable("instance");i&&!i.options.disabled&&(s.sortables.push(i),i.refreshPositions(),i._trigger("activate",e,n))})},stop:function(e,i,s){var n=t.extend({},i,{item:s.element});s.cancelHelperRemoval=!1,t.each(s.sortables,function(){var t=this;t.isOver?(t.isOver=0,s.cancelHelperRemoval=!0,t.cancelHelperRemoval=!1,t._storedCSS={position:t.placeholder.css("position"),top:t.placeholder.css("top"),left:t.placeholder.css("left")},t._mouseStop(e),t.options.helper=t.options._helper):(t.cancelHelperRemoval=!0,t._trigger("deactivate",e,n))})},drag:function(e,i,s){t.each(s.sortables,function(){var n=!1,o=this;o.positionAbs=s.positionAbs,o.helperProportions=s.helperProportions,o.offset.click=s.offset.click,o._intersectsWith(o.containerCache)&&(n=!0,t.each(s.sortables,function(){return this.positionAbs=s.positionAbs,this.helperProportions=s.helperProportions,this.offset.click=s.offset.click,this!==o&&this._intersectsWith(this.containerCache)&&t.contains(o.element[0],this.element[0])&&(n=!1),n})),n?(o.isOver||(o.isOver=1,s._parent=i.helper.parent(),o.currentItem=i.helper.appendTo(o.element).data("ui-sortable-item",!0),o.options._helper=o.options.helper,o.options.helper=function(){return i.helper[0]},e.target=o.currentItem[0],o._mouseCapture(e,!0),o._mouseStart(e,!0,!0),o.offset.click.top=s.offset.click.top,o.offset.click.left=s.offset.click.left,o.offset.parent.left-=s.offset.parent.left-o.offset.parent.left,o.offset.parent.top-=s.offset.parent.top-o.offset.parent.top,s._trigger("toSortable",e),s.dropped=o.element,t.each(s.sortables,function(){this.refreshPositions()}),s.currentItem=s.element,o.fromOutside=s),o.currentItem&&(o._mouseDrag(e),i.position=o.position)):o.isOver&&(o.isOver=0,o.cancelHelperRemoval=!0,o.options._revert=o.options.revert,o.options.revert=!1,o._trigger("out",e,o._uiHash(o)),o._mouseStop(e,!0),o.options.revert=o.options._revert,o.options.helper=o.options._helper,o.placeholder&&o.placeholder.remove(),i.helper.appendTo(s._parent),s._refreshOffsets(e),i.position=s._generatePosition(e,!0),s._trigger("fromSortable",e),s.dropped=!1,t.each(s.sortables,function(){this.refreshPositions()}))})}}),t.ui.plugin.add("draggable","cursor",{start:function(e,i,s){var n=t("body"),o=s.options;n.css("cursor")&&(o._cursor=n.css("cursor")),n.css("cursor",o.cursor)},stop:function(e,i,s){var n=s.options;n._cursor&&t("body").css("cursor",n._cursor)}}),t.ui.plugin.add("draggable","opacity",{start:function(e,i,s){var n=t(i.helper),o=s.options;n.css("opacity")&&(o._opacity=n.css("opacity")),n.css("opacity",o.opacity)},stop:function(e,i,s){var n=s.options;n._opacity&&t(i.helper).css("opacity",n._opacity)}}),t.ui.plugin.add("draggable","scroll",{start:function(t,e,i){i.scrollParentNotHidden||(i.scrollParentNotHidden=i.helper.scrollParent(!1)),i.scrollParentNotHidden[0]!==i.document[0]&&"HTML"!==i.scrollParentNotHidden[0].tagName&&(i.overflowOffset=i.scrollParentNotHidden.offset())},drag:function(e,i,s){var n=s.options,o=!1,a=s.scrollParentNotHidden[0],r=s.document[0];a!==r&&"HTML"!==a.tagName?(n.axis&&"x"===n.axis||(s.overflowOffset.top+a.offsetHeight-e.pageY<n.scrollSensitivity?a.scrollTop=o=a.scrollTop+n.scrollSpeed:e.pageY-s.overflowOffset.top<n.scrollSensitivity&&(a.scrollTop=o=a.scrollTop-n.scrollSpeed)),n.axis&&"y"===n.axis||(s.overflowOffset.left+a.offsetWidth-e.pageX<n.scrollSensitivity?a.scrollLeft=o=a.scrollLeft+n.scrollSpeed:e.pageX-s.overflowOffset.left<n.scrollSensitivity&&(a.scrollLeft=o=a.scrollLeft-n.scrollSpeed))):(n.axis&&"x"===n.axis||(e.pageY-t(r).scrollTop()<n.scrollSensitivity?o=t(r).scrollTop(t(r).scrollTop()-n.scrollSpeed):t(window).height()-(e.pageY-t(r).scrollTop())<n.scrollSensitivity&&(o=t(r).scrollTop(t(r).scrollTop()+n.scrollSpeed))),n.axis&&"y"===n.axis||(e.pageX-t(r).scrollLeft()<n.scrollSensitivity?o=t(r).scrollLeft(t(r).scrollLeft()-n.scrollSpeed):t(window).width()-(e.pageX-t(r).scrollLeft())<n.scrollSensitivity&&(o=t(r).scrollLeft(t(r).scrollLeft()+n.scrollSpeed)))),o!==!1&&t.ui.ddmanager&&!n.dropBehaviour&&t.ui.ddmanager.prepareOffsets(s,e)}}),t.ui.plugin.add("draggable","snap",{start:function(e,i,s){var n=s.options;s.snapElements=[],t(n.snap.constructor!==String?n.snap.items||":data(ui-draggable)":n.snap).each(function(){var e=t(this),i=e.offset();this!==s.element[0]&&s.snapElements.push({item:this,width:e.outerWidth(),height:e.outerHeight(),top:i.top,left:i.left})})},drag:function(e,i,s){var n,o,a,r,h,l,u,c,d,p,f=s.options,m=f.snapTolerance,g=i.offset.left,v=g+s.helperProportions.width,_=i.offset.top,b=_+s.helperProportions.height;for(d=s.snapElements.length-1;d>=0;d--)h=s.snapElements[d].left-s.margins.left,l=h+s.snapElements[d].width,u=s.snapElements[d].top-s.margins.top,c=u+s.snapElements[d].height,h-m>v||g>l+m||u-m>b||_>c+m||!t.contains(s.snapElements[d].item.ownerDocument,s.snapElements[d].item)?(s.snapElements[d].snapping&&s.options.snap.release&&s.options.snap.release.call(s.element,e,t.extend(s._uiHash(),{snapItem:s.snapElements[d].item})),s.snapElements[d].snapping=!1):("inner"!==f.snapMode&&(n=m>=Math.abs(u-b),o=m>=Math.abs(c-_),a=m>=Math.abs(h-v),r=m>=Math.abs(l-g),n&&(i.position.top=s._convertPositionTo("relative",{top:u-s.helperProportions.height,left:0}).top),o&&(i.position.top=s._convertPositionTo("relative",{top:c,left:0}).top),a&&(i.position.left=s._convertPositionTo("relative",{top:0,left:h-s.helperProportions.width}).left),r&&(i.position.left=s._convertPositionTo("relative",{top:0,left:l}).left)),p=n||o||a||r,"outer"!==f.snapMode&&(n=m>=Math.abs(u-_),o=m>=Math.abs(c-b),a=m>=Math.abs(h-g),r=m>=Math.abs(l-v),n&&(i.position.top=s._convertPositionTo("relative",{top:u,left:0}).top),o&&(i.position.top=s._convertPositionTo("relative",{top:c-s.helperProportions.height,left:0}).top),a&&(i.position.left=s._convertPositionTo("relative",{top:0,left:h}).left),r&&(i.position.left=s._convertPositionTo("relative",{top:0,left:l-s.helperProportions.width}).left)),!s.snapElements[d].snapping&&(n||o||a||r||p)&&s.options.snap.snap&&s.options.snap.snap.call(s.element,e,t.extend(s._uiHash(),{snapItem:s.snapElements[d].item})),s.snapElements[d].snapping=n||o||a||r||p)}}),t.ui.plugin.add("draggable","stack",{start:function(e,i,s){var n,o=s.options,a=t.makeArray(t(o.stack)).sort(function(e,i){return(parseInt(t(e).css("zIndex"),10)||0)-(parseInt(t(i).css("zIndex"),10)||0)});a.length&&(n=parseInt(t(a[0]).css("zIndex"),10)||0,t(a).each(function(e){t(this).css("zIndex",n+e)}),this.css("zIndex",n+a.length))}}),t.ui.plugin.add("draggable","zIndex",{start:function(e,i,s){var n=t(i.helper),o=s.options;n.css("zIndex")&&(o._zIndex=n.css("zIndex")),n.css("zIndex",o.zIndex)},stop:function(e,i,s){var n=s.options;n._zIndex&&t(i.helper).css("zIndex",n._zIndex)}}),t.ui.draggable,t.widget("ui.droppable",{version:"1.12.1",widgetEventPrefix:"drop",options:{accept:"*",addClasses:!0,greedy:!1,scope:"default",tolerance:"intersect",activate:null,deactivate:null,drop:null,out:null,over:null},_create:function(){var e,i=this.options,s=i.accept;this.isover=!1,this.isout=!0,this.accept=t.isFunction(s)?s:function(t){return t.is(s)},this.proportions=function(){return arguments.length?(e=arguments[0],void 0):e?e:e={width:this.element[0].offsetWidth,height:this.element[0].offsetHeight}},this._addToManager(i.scope),i.addClasses&&this._addClass("ui-droppable")},_addToManager:function(e){t.ui.ddmanager.droppables[e]=t.ui.ddmanager.droppables[e]||[],t.ui.ddmanager.droppables[e].push(this)},_splice:function(t){for(var e=0;t.length>e;e++)t[e]===this&&t.splice(e,1)},_destroy:function(){var e=t.ui.ddmanager.droppables[this.options.scope];this._splice(e)
},_setOption:function(e,i){if("accept"===e)this.accept=t.isFunction(i)?i:function(t){return t.is(i)};else if("scope"===e){var s=t.ui.ddmanager.droppables[this.options.scope];this._splice(s),this._addToManager(i)}this._super(e,i)},_activate:function(e){var i=t.ui.ddmanager.current;this._addActiveClass(),i&&this._trigger("activate",e,this.ui(i))},_deactivate:function(e){var i=t.ui.ddmanager.current;this._removeActiveClass(),i&&this._trigger("deactivate",e,this.ui(i))},_over:function(e){var i=t.ui.ddmanager.current;i&&(i.currentItem||i.element)[0]!==this.element[0]&&this.accept.call(this.element[0],i.currentItem||i.element)&&(this._addHoverClass(),this._trigger("over",e,this.ui(i)))},_out:function(e){var i=t.ui.ddmanager.current;i&&(i.currentItem||i.element)[0]!==this.element[0]&&this.accept.call(this.element[0],i.currentItem||i.element)&&(this._removeHoverClass(),this._trigger("out",e,this.ui(i)))},_drop:function(e,i){var s=i||t.ui.ddmanager.current,n=!1;return s&&(s.currentItem||s.element)[0]!==this.element[0]?(this.element.find(":data(ui-droppable)").not(".ui-draggable-dragging").each(function(){var i=t(this).droppable("instance");return i.options.greedy&&!i.options.disabled&&i.options.scope===s.options.scope&&i.accept.call(i.element[0],s.currentItem||s.element)&&o(s,t.extend(i,{offset:i.element.offset()}),i.options.tolerance,e)?(n=!0,!1):void 0}),n?!1:this.accept.call(this.element[0],s.currentItem||s.element)?(this._removeActiveClass(),this._removeHoverClass(),this._trigger("drop",e,this.ui(s)),this.element):!1):!1},ui:function(t){return{draggable:t.currentItem||t.element,helper:t.helper,position:t.position,offset:t.positionAbs}},_addHoverClass:function(){this._addClass("ui-droppable-hover")},_removeHoverClass:function(){this._removeClass("ui-droppable-hover")},_addActiveClass:function(){this._addClass("ui-droppable-active")},_removeActiveClass:function(){this._removeClass("ui-droppable-active")}});var o=t.ui.intersect=function(){function t(t,e,i){return t>=e&&e+i>t}return function(e,i,s,n){if(!i.offset)return!1;var o=(e.positionAbs||e.position.absolute).left+e.margins.left,a=(e.positionAbs||e.position.absolute).top+e.margins.top,r=o+e.helperProportions.width,h=a+e.helperProportions.height,l=i.offset.left,u=i.offset.top,c=l+i.proportions().width,d=u+i.proportions().height;switch(s){case"fit":return o>=l&&c>=r&&a>=u&&d>=h;case"intersect":return o+e.helperProportions.width/2>l&&c>r-e.helperProportions.width/2&&a+e.helperProportions.height/2>u&&d>h-e.helperProportions.height/2;case"pointer":return t(n.pageY,u,i.proportions().height)&&t(n.pageX,l,i.proportions().width);case"touch":return(a>=u&&d>=a||h>=u&&d>=h||u>a&&h>d)&&(o>=l&&c>=o||r>=l&&c>=r||l>o&&r>c);default:return!1}}}();t.ui.ddmanager={current:null,droppables:{"default":[]},prepareOffsets:function(e,i){var s,n,o=t.ui.ddmanager.droppables[e.options.scope]||[],a=i?i.type:null,r=(e.currentItem||e.element).find(":data(ui-droppable)").addBack();t:for(s=0;o.length>s;s++)if(!(o[s].options.disabled||e&&!o[s].accept.call(o[s].element[0],e.currentItem||e.element))){for(n=0;r.length>n;n++)if(r[n]===o[s].element[0]){o[s].proportions().height=0;continue t}o[s].visible="none"!==o[s].element.css("display"),o[s].visible&&("mousedown"===a&&o[s]._activate.call(o[s],i),o[s].offset=o[s].element.offset(),o[s].proportions({width:o[s].element[0].offsetWidth,height:o[s].element[0].offsetHeight}))}},drop:function(e,i){var s=!1;return t.each((t.ui.ddmanager.droppables[e.options.scope]||[]).slice(),function(){this.options&&(!this.options.disabled&&this.visible&&o(e,this,this.options.tolerance,i)&&(s=this._drop.call(this,i)||s),!this.options.disabled&&this.visible&&this.accept.call(this.element[0],e.currentItem||e.element)&&(this.isout=!0,this.isover=!1,this._deactivate.call(this,i)))}),s},dragStart:function(e,i){e.element.parentsUntil("body").on("scroll.droppable",function(){e.options.refreshPositions||t.ui.ddmanager.prepareOffsets(e,i)})},drag:function(e,i){e.options.refreshPositions&&t.ui.ddmanager.prepareOffsets(e,i),t.each(t.ui.ddmanager.droppables[e.options.scope]||[],function(){if(!this.options.disabled&&!this.greedyChild&&this.visible){var s,n,a,r=o(e,this,this.options.tolerance,i),h=!r&&this.isover?"isout":r&&!this.isover?"isover":null;h&&(this.options.greedy&&(n=this.options.scope,a=this.element.parents(":data(ui-droppable)").filter(function(){return t(this).droppable("instance").options.scope===n}),a.length&&(s=t(a[0]).droppable("instance"),s.greedyChild="isover"===h)),s&&"isover"===h&&(s.isover=!1,s.isout=!0,s._out.call(s,i)),this[h]=!0,this["isout"===h?"isover":"isout"]=!1,this["isover"===h?"_over":"_out"].call(this,i),s&&"isout"===h&&(s.isout=!1,s.isover=!0,s._over.call(s,i)))}})},dragStop:function(e,i){e.element.parentsUntil("body").off("scroll.droppable"),e.options.refreshPositions||t.ui.ddmanager.prepareOffsets(e,i)}},t.uiBackCompat!==!1&&t.widget("ui.droppable",t.ui.droppable,{options:{hoverClass:!1,activeClass:!1},_addActiveClass:function(){this._super(),this.options.activeClass&&this.element.addClass(this.options.activeClass)},_removeActiveClass:function(){this._super(),this.options.activeClass&&this.element.removeClass(this.options.activeClass)},_addHoverClass:function(){this._super(),this.options.hoverClass&&this.element.addClass(this.options.hoverClass)},_removeHoverClass:function(){this._super(),this.options.hoverClass&&this.element.removeClass(this.options.hoverClass)}}),t.ui.droppable,t.widget("ui.sortable",t.ui.mouse,{version:"1.12.1",widgetEventPrefix:"sort",ready:!1,options:{appendTo:"parent",axis:!1,connectWith:!1,containment:!1,cursor:"auto",cursorAt:!1,dropOnEmpty:!0,forcePlaceholderSize:!1,forceHelperSize:!1,grid:!1,handle:!1,helper:"original",items:"> *",opacity:!1,placeholder:!1,revert:!1,scroll:!0,scrollSensitivity:20,scrollSpeed:20,scope:"default",tolerance:"intersect",zIndex:1e3,activate:null,beforeStop:null,change:null,deactivate:null,out:null,over:null,receive:null,remove:null,sort:null,start:null,stop:null,update:null},_isOverAxis:function(t,e,i){return t>=e&&e+i>t},_isFloating:function(t){return/left|right/.test(t.css("float"))||/inline|table-cell/.test(t.css("display"))},_create:function(){this.containerCache={},this._addClass("ui-sortable"),this.refresh(),this.offset=this.element.offset(),this._mouseInit(),this._setHandleClassName(),this.ready=!0},_setOption:function(t,e){this._super(t,e),"handle"===t&&this._setHandleClassName()},_setHandleClassName:function(){var e=this;this._removeClass(this.element.find(".ui-sortable-handle"),"ui-sortable-handle"),t.each(this.items,function(){e._addClass(this.instance.options.handle?this.item.find(this.instance.options.handle):this.item,"ui-sortable-handle")})},_destroy:function(){this._mouseDestroy();for(var t=this.items.length-1;t>=0;t--)this.items[t].item.removeData(this.widgetName+"-item");return this},_mouseCapture:function(e,i){var s=null,n=!1,o=this;return this.reverting?!1:this.options.disabled||"static"===this.options.type?!1:(this._refreshItems(e),t(e.target).parents().each(function(){return t.data(this,o.widgetName+"-item")===o?(s=t(this),!1):void 0}),t.data(e.target,o.widgetName+"-item")===o&&(s=t(e.target)),s?!this.options.handle||i||(t(this.options.handle,s).find("*").addBack().each(function(){this===e.target&&(n=!0)}),n)?(this.currentItem=s,this._removeCurrentsFromItems(),!0):!1:!1)},_mouseStart:function(e,i,s){var n,o,a=this.options;if(this.currentContainer=this,this.refreshPositions(),this.helper=this._createHelper(e),this._cacheHelperProportions(),this._cacheMargins(),this.scrollParent=this.helper.scrollParent(),this.offset=this.currentItem.offset(),this.offset={top:this.offset.top-this.margins.top,left:this.offset.left-this.margins.left},t.extend(this.offset,{click:{left:e.pageX-this.offset.left,top:e.pageY-this.offset.top},parent:this._getParentOffset(),relative:this._getRelativeOffset()}),this.helper.css("position","absolute"),this.cssPosition=this.helper.css("position"),this.originalPosition=this._generatePosition(e),this.originalPageX=e.pageX,this.originalPageY=e.pageY,a.cursorAt&&this._adjustOffsetFromHelper(a.cursorAt),this.domPosition={prev:this.currentItem.prev()[0],parent:this.currentItem.parent()[0]},this.helper[0]!==this.currentItem[0]&&this.currentItem.hide(),this._createPlaceholder(),a.containment&&this._setContainment(),a.cursor&&"auto"!==a.cursor&&(o=this.document.find("body"),this.storedCursor=o.css("cursor"),o.css("cursor",a.cursor),this.storedStylesheet=t("<style>*{ cursor: "+a.cursor+" !important; }</style>").appendTo(o)),a.opacity&&(this.helper.css("opacity")&&(this._storedOpacity=this.helper.css("opacity")),this.helper.css("opacity",a.opacity)),a.zIndex&&(this.helper.css("zIndex")&&(this._storedZIndex=this.helper.css("zIndex")),this.helper.css("zIndex",a.zIndex)),this.scrollParent[0]!==this.document[0]&&"HTML"!==this.scrollParent[0].tagName&&(this.overflowOffset=this.scrollParent.offset()),this._trigger("start",e,this._uiHash()),this._preserveHelperProportions||this._cacheHelperProportions(),!s)for(n=this.containers.length-1;n>=0;n--)this.containers[n]._trigger("activate",e,this._uiHash(this));return t.ui.ddmanager&&(t.ui.ddmanager.current=this),t.ui.ddmanager&&!a.dropBehaviour&&t.ui.ddmanager.prepareOffsets(this,e),this.dragging=!0,this._addClass(this.helper,"ui-sortable-helper"),this._mouseDrag(e),!0},_mouseDrag:function(e){var i,s,n,o,a=this.options,r=!1;for(this.position=this._generatePosition(e),this.positionAbs=this._convertPositionTo("absolute"),this.lastPositionAbs||(this.lastPositionAbs=this.positionAbs),this.options.scroll&&(this.scrollParent[0]!==this.document[0]&&"HTML"!==this.scrollParent[0].tagName?(this.overflowOffset.top+this.scrollParent[0].offsetHeight-e.pageY<a.scrollSensitivity?this.scrollParent[0].scrollTop=r=this.scrollParent[0].scrollTop+a.scrollSpeed:e.pageY-this.overflowOffset.top<a.scrollSensitivity&&(this.scrollParent[0].scrollTop=r=this.scrollParent[0].scrollTop-a.scrollSpeed),this.overflowOffset.left+this.scrollParent[0].offsetWidth-e.pageX<a.scrollSensitivity?this.scrollParent[0].scrollLeft=r=this.scrollParent[0].scrollLeft+a.scrollSpeed:e.pageX-this.overflowOffset.left<a.scrollSensitivity&&(this.scrollParent[0].scrollLeft=r=this.scrollParent[0].scrollLeft-a.scrollSpeed)):(e.pageY-this.document.scrollTop()<a.scrollSensitivity?r=this.document.scrollTop(this.document.scrollTop()-a.scrollSpeed):this.window.height()-(e.pageY-this.document.scrollTop())<a.scrollSensitivity&&(r=this.document.scrollTop(this.document.scrollTop()+a.scrollSpeed)),e.pageX-this.document.scrollLeft()<a.scrollSensitivity?r=this.document.scrollLeft(this.document.scrollLeft()-a.scrollSpeed):this.window.width()-(e.pageX-this.document.scrollLeft())<a.scrollSensitivity&&(r=this.document.scrollLeft(this.document.scrollLeft()+a.scrollSpeed))),r!==!1&&t.ui.ddmanager&&!a.dropBehaviour&&t.ui.ddmanager.prepareOffsets(this,e)),this.positionAbs=this._convertPositionTo("absolute"),this.options.axis&&"y"===this.options.axis||(this.helper[0].style.left=this.position.left+"px"),this.options.axis&&"x"===this.options.axis||(this.helper[0].style.top=this.position.top+"px"),i=this.items.length-1;i>=0;i--)if(s=this.items[i],n=s.item[0],o=this._intersectsWithPointer(s),o&&s.instance===this.currentContainer&&n!==this.currentItem[0]&&this.placeholder[1===o?"next":"prev"]()[0]!==n&&!t.contains(this.placeholder[0],n)&&("semi-dynamic"===this.options.type?!t.contains(this.element[0],n):!0)){if(this.direction=1===o?"down":"up","pointer"!==this.options.tolerance&&!this._intersectsWithSides(s))break;this._rearrange(e,s),this._trigger("change",e,this._uiHash());break}return this._contactContainers(e),t.ui.ddmanager&&t.ui.ddmanager.drag(this,e),this._trigger("sort",e,this._uiHash()),this.lastPositionAbs=this.positionAbs,!1},_mouseStop:function(e,i){if(e){if(t.ui.ddmanager&&!this.options.dropBehaviour&&t.ui.ddmanager.drop(this,e),this.options.revert){var s=this,n=this.placeholder.offset(),o=this.options.axis,a={};o&&"x"!==o||(a.left=n.left-this.offset.parent.left-this.margins.left+(this.offsetParent[0]===this.document[0].body?0:this.offsetParent[0].scrollLeft)),o&&"y"!==o||(a.top=n.top-this.offset.parent.top-this.margins.top+(this.offsetParent[0]===this.document[0].body?0:this.offsetParent[0].scrollTop)),this.reverting=!0,t(this.helper).animate(a,parseInt(this.options.revert,10)||500,function(){s._clear(e)})}else this._clear(e,i);return!1}},cancel:function(){if(this.dragging){this._mouseUp(new t.Event("mouseup",{target:null})),"original"===this.options.helper?(this.currentItem.css(this._storedCSS),this._removeClass(this.currentItem,"ui-sortable-helper")):this.currentItem.show();for(var e=this.containers.length-1;e>=0;e--)this.containers[e]._trigger("deactivate",null,this._uiHash(this)),this.containers[e].containerCache.over&&(this.containers[e]._trigger("out",null,this._uiHash(this)),this.containers[e].containerCache.over=0)}return this.placeholder&&(this.placeholder[0].parentNode&&this.placeholder[0].parentNode.removeChild(this.placeholder[0]),"original"!==this.options.helper&&this.helper&&this.helper[0].parentNode&&this.helper.remove(),t.extend(this,{helper:null,dragging:!1,reverting:!1,_noFinalSort:null}),this.domPosition.prev?t(this.domPosition.prev).after(this.currentItem):t(this.domPosition.parent).prepend(this.currentItem)),this},serialize:function(e){var i=this._getItemsAsjQuery(e&&e.connected),s=[];return e=e||{},t(i).each(function(){var i=(t(e.item||this).attr(e.attribute||"id")||"").match(e.expression||/(.+)[\-=_](.+)/);i&&s.push((e.key||i[1]+"[]")+"="+(e.key&&e.expression?i[1]:i[2]))}),!s.length&&e.key&&s.push(e.key+"="),s.join("&")},toArray:function(e){var i=this._getItemsAsjQuery(e&&e.connected),s=[];return e=e||{},i.each(function(){s.push(t(e.item||this).attr(e.attribute||"id")||"")}),s},_intersectsWith:function(t){var e=this.positionAbs.left,i=e+this.helperProportions.width,s=this.positionAbs.top,n=s+this.helperProportions.height,o=t.left,a=o+t.width,r=t.top,h=r+t.height,l=this.offset.click.top,u=this.offset.click.left,c="x"===this.options.axis||s+l>r&&h>s+l,d="y"===this.options.axis||e+u>o&&a>e+u,p=c&&d;return"pointer"===this.options.tolerance||this.options.forcePointerForContainers||"pointer"!==this.options.tolerance&&this.helperProportions[this.floating?"width":"height"]>t[this.floating?"width":"height"]?p:e+this.helperProportions.width/2>o&&a>i-this.helperProportions.width/2&&s+this.helperProportions.height/2>r&&h>n-this.helperProportions.height/2},_intersectsWithPointer:function(t){var e,i,s="x"===this.options.axis||this._isOverAxis(this.positionAbs.top+this.offset.click.top,t.top,t.height),n="y"===this.options.axis||this._isOverAxis(this.positionAbs.left+this.offset.click.left,t.left,t.width),o=s&&n;return o?(e=this._getDragVerticalDirection(),i=this._getDragHorizontalDirection(),this.floating?"right"===i||"down"===e?2:1:e&&("down"===e?2:1)):!1},_intersectsWithSides:function(t){var e=this._isOverAxis(this.positionAbs.top+this.offset.click.top,t.top+t.height/2,t.height),i=this._isOverAxis(this.positionAbs.left+this.offset.click.left,t.left+t.width/2,t.width),s=this._getDragVerticalDirection(),n=this._getDragHorizontalDirection();return this.floating&&n?"right"===n&&i||"left"===n&&!i:s&&("down"===s&&e||"up"===s&&!e)},_getDragVerticalDirection:function(){var t=this.positionAbs.top-this.lastPositionAbs.top;return 0!==t&&(t>0?"down":"up")},_getDragHorizontalDirection:function(){var t=this.positionAbs.left-this.lastPositionAbs.left;return 0!==t&&(t>0?"right":"left")},refresh:function(t){return this._refreshItems(t),this._setHandleClassName(),this.refreshPositions(),this},_connectWith:function(){var t=this.options;return t.connectWith.constructor===String?[t.connectWith]:t.connectWith},_getItemsAsjQuery:function(e){function i(){r.push(this)}var s,n,o,a,r=[],h=[],l=this._connectWith();if(l&&e)for(s=l.length-1;s>=0;s--)for(o=t(l[s],this.document[0]),n=o.length-1;n>=0;n--)a=t.data(o[n],this.widgetFullName),a&&a!==this&&!a.options.disabled&&h.push([t.isFunction(a.options.items)?a.options.items.call(a.element):t(a.options.items,a.element).not(".ui-sortable-helper").not(".ui-sortable-placeholder"),a]);for(h.push([t.isFunction(this.options.items)?this.options.items.call(this.element,null,{options:this.options,item:this.currentItem}):t(this.options.items,this.element).not(".ui-sortable-helper").not(".ui-sortable-placeholder"),this]),s=h.length-1;s>=0;s--)h[s][0].each(i);return t(r)},_removeCurrentsFromItems:function(){var e=this.currentItem.find(":data("+this.widgetName+"-item)");this.items=t.grep(this.items,function(t){for(var i=0;e.length>i;i++)if(e[i]===t.item[0])return!1;return!0})},_refreshItems:function(e){this.items=[],this.containers=[this];var i,s,n,o,a,r,h,l,u=this.items,c=[[t.isFunction(this.options.items)?this.options.items.call(this.element[0],e,{item:this.currentItem}):t(this.options.items,this.element),this]],d=this._connectWith();if(d&&this.ready)for(i=d.length-1;i>=0;i--)for(n=t(d[i],this.document[0]),s=n.length-1;s>=0;s--)o=t.data(n[s],this.widgetFullName),o&&o!==this&&!o.options.disabled&&(c.push([t.isFunction(o.options.items)?o.options.items.call(o.element[0],e,{item:this.currentItem}):t(o.options.items,o.element),o]),this.containers.push(o));for(i=c.length-1;i>=0;i--)for(a=c[i][1],r=c[i][0],s=0,l=r.length;l>s;s++)h=t(r[s]),h.data(this.widgetName+"-item",a),u.push({item:h,instance:a,width:0,height:0,left:0,top:0})},refreshPositions:function(e){this.floating=this.items.length?"x"===this.options.axis||this._isFloating(this.items[0].item):!1,this.offsetParent&&this.helper&&(this.offset.parent=this._getParentOffset());var i,s,n,o;for(i=this.items.length-1;i>=0;i--)s=this.items[i],s.instance!==this.currentContainer&&this.currentContainer&&s.item[0]!==this.currentItem[0]||(n=this.options.toleranceElement?t(this.options.toleranceElement,s.item):s.item,e||(s.width=n.outerWidth(),s.height=n.outerHeight()),o=n.offset(),s.left=o.left,s.top=o.top);if(this.options.custom&&this.options.custom.refreshContainers)this.options.custom.refreshContainers.call(this);else for(i=this.containers.length-1;i>=0;i--)o=this.containers[i].element.offset(),this.containers[i].containerCache.left=o.left,this.containers[i].containerCache.top=o.top,this.containers[i].containerCache.width=this.containers[i].element.outerWidth(),this.containers[i].containerCache.height=this.containers[i].element.outerHeight();return this},_createPlaceholder:function(e){e=e||this;var i,s=e.options;s.placeholder&&s.placeholder.constructor!==String||(i=s.placeholder,s.placeholder={element:function(){var s=e.currentItem[0].nodeName.toLowerCase(),n=t("<"+s+">",e.document[0]);return e._addClass(n,"ui-sortable-placeholder",i||e.currentItem[0].className)._removeClass(n,"ui-sortable-helper"),"tbody"===s?e._createTrPlaceholder(e.currentItem.find("tr").eq(0),t("<tr>",e.document[0]).appendTo(n)):"tr"===s?e._createTrPlaceholder(e.currentItem,n):"img"===s&&n.attr("src",e.currentItem.attr("src")),i||n.css("visibility","hidden"),n},update:function(t,n){(!i||s.forcePlaceholderSize)&&(n.height()||n.height(e.currentItem.innerHeight()-parseInt(e.currentItem.css("paddingTop")||0,10)-parseInt(e.currentItem.css("paddingBottom")||0,10)),n.width()||n.width(e.currentItem.innerWidth()-parseInt(e.currentItem.css("paddingLeft")||0,10)-parseInt(e.currentItem.css("paddingRight")||0,10)))}}),e.placeholder=t(s.placeholder.element.call(e.element,e.currentItem)),e.currentItem.after(e.placeholder),s.placeholder.update(e,e.placeholder)},_createTrPlaceholder:function(e,i){var s=this;e.children().each(function(){t("<td>&#160;</td>",s.document[0]).attr("colspan",t(this).attr("colspan")||1).appendTo(i)})},_contactContainers:function(e){var i,s,n,o,a,r,h,l,u,c,d=null,p=null;for(i=this.containers.length-1;i>=0;i--)if(!t.contains(this.currentItem[0],this.containers[i].element[0]))if(this._intersectsWith(this.containers[i].containerCache)){if(d&&t.contains(this.containers[i].element[0],d.element[0]))continue;d=this.containers[i],p=i}else this.containers[i].containerCache.over&&(this.containers[i]._trigger("out",e,this._uiHash(this)),this.containers[i].containerCache.over=0);if(d)if(1===this.containers.length)this.containers[p].containerCache.over||(this.containers[p]._trigger("over",e,this._uiHash(this)),this.containers[p].containerCache.over=1);else{for(n=1e4,o=null,u=d.floating||this._isFloating(this.currentItem),a=u?"left":"top",r=u?"width":"height",c=u?"pageX":"pageY",s=this.items.length-1;s>=0;s--)t.contains(this.containers[p].element[0],this.items[s].item[0])&&this.items[s].item[0]!==this.currentItem[0]&&(h=this.items[s].item.offset()[a],l=!1,e[c]-h>this.items[s][r]/2&&(l=!0),n>Math.abs(e[c]-h)&&(n=Math.abs(e[c]-h),o=this.items[s],this.direction=l?"up":"down"));if(!o&&!this.options.dropOnEmpty)return;if(this.currentContainer===this.containers[p])return this.currentContainer.containerCache.over||(this.containers[p]._trigger("over",e,this._uiHash()),this.currentContainer.containerCache.over=1),void 0;o?this._rearrange(e,o,null,!0):this._rearrange(e,null,this.containers[p].element,!0),this._trigger("change",e,this._uiHash()),this.containers[p]._trigger("change",e,this._uiHash(this)),this.currentContainer=this.containers[p],this.options.placeholder.update(this.currentContainer,this.placeholder),this.containers[p]._trigger("over",e,this._uiHash(this)),this.containers[p].containerCache.over=1}},_createHelper:function(e){var i=this.options,s=t.isFunction(i.helper)?t(i.helper.apply(this.element[0],[e,this.currentItem])):"clone"===i.helper?this.currentItem.clone():this.currentItem;return s.parents("body").length||t("parent"!==i.appendTo?i.appendTo:this.currentItem[0].parentNode)[0].appendChild(s[0]),s[0]===this.currentItem[0]&&(this._storedCSS={width:this.currentItem[0].style.width,height:this.currentItem[0].style.height,position:this.currentItem.css("position"),top:this.currentItem.css("top"),left:this.currentItem.css("left")}),(!s[0].style.width||i.forceHelperSize)&&s.width(this.currentItem.width()),(!s[0].style.height||i.forceHelperSize)&&s.height(this.currentItem.height()),s},_adjustOffsetFromHelper:function(e){"string"==typeof e&&(e=e.split(" ")),t.isArray(e)&&(e={left:+e[0],top:+e[1]||0}),"left"in e&&(this.offset.click.left=e.left+this.margins.left),"right"in e&&(this.offset.click.left=this.helperProportions.width-e.right+this.margins.left),"top"in e&&(this.offset.click.top=e.top+this.margins.top),"bottom"in e&&(this.offset.click.top=this.helperProportions.height-e.bottom+this.margins.top)},_getParentOffset:function(){this.offsetParent=this.helper.offsetParent();var e=this.offsetParent.offset();return"absolute"===this.cssPosition&&this.scrollParent[0]!==this.document[0]&&t.contains(this.scrollParent[0],this.offsetParent[0])&&(e.left+=this.scrollParent.scrollLeft(),e.top+=this.scrollParent.scrollTop()),(this.offsetParent[0]===this.document[0].body||this.offsetParent[0].tagName&&"html"===this.offsetParent[0].tagName.toLowerCase()&&t.ui.ie)&&(e={top:0,left:0}),{top:e.top+(parseInt(this.offsetParent.css("borderTopWidth"),10)||0),left:e.left+(parseInt(this.offsetParent.css("borderLeftWidth"),10)||0)}},_getRelativeOffset:function(){if("relative"===this.cssPosition){var t=this.currentItem.position();return{top:t.top-(parseInt(this.helper.css("top"),10)||0)+this.scrollParent.scrollTop(),left:t.left-(parseInt(this.helper.css("left"),10)||0)+this.scrollParent.scrollLeft()}}return{top:0,left:0}},_cacheMargins:function(){this.margins={left:parseInt(this.currentItem.css("marginLeft"),10)||0,top:parseInt(this.currentItem.css("marginTop"),10)||0}},_cacheHelperProportions:function(){this.helperProportions={width:this.helper.outerWidth(),height:this.helper.outerHeight()}},_setContainment:function(){var e,i,s,n=this.options;"parent"===n.containment&&(n.containment=this.helper[0].parentNode),("document"===n.containment||"window"===n.containment)&&(this.containment=[0-this.offset.relative.left-this.offset.parent.left,0-this.offset.relative.top-this.offset.parent.top,"document"===n.containment?this.document.width():this.window.width()-this.helperProportions.width-this.margins.left,("document"===n.containment?this.document.height()||document.body.parentNode.scrollHeight:this.window.height()||this.document[0].body.parentNode.scrollHeight)-this.helperProportions.height-this.margins.top]),/^(document|window|parent)$/.test(n.containment)||(e=t(n.containment)[0],i=t(n.containment).offset(),s="hidden"!==t(e).css("overflow"),this.containment=[i.left+(parseInt(t(e).css("borderLeftWidth"),10)||0)+(parseInt(t(e).css("paddingLeft"),10)||0)-this.margins.left,i.top+(parseInt(t(e).css("borderTopWidth"),10)||0)+(parseInt(t(e).css("paddingTop"),10)||0)-this.margins.top,i.left+(s?Math.max(e.scrollWidth,e.offsetWidth):e.offsetWidth)-(parseInt(t(e).css("borderLeftWidth"),10)||0)-(parseInt(t(e).css("paddingRight"),10)||0)-this.helperProportions.width-this.margins.left,i.top+(s?Math.max(e.scrollHeight,e.offsetHeight):e.offsetHeight)-(parseInt(t(e).css("borderTopWidth"),10)||0)-(parseInt(t(e).css("paddingBottom"),10)||0)-this.helperProportions.height-this.margins.top])},_convertPositionTo:function(e,i){i||(i=this.position);var s="absolute"===e?1:-1,n="absolute"!==this.cssPosition||this.scrollParent[0]!==this.document[0]&&t.contains(this.scrollParent[0],this.offsetParent[0])?this.scrollParent:this.offsetParent,o=/(html|body)/i.test(n[0].tagName);return{top:i.top+this.offset.relative.top*s+this.offset.parent.top*s-("fixed"===this.cssPosition?-this.scrollParent.scrollTop():o?0:n.scrollTop())*s,left:i.left+this.offset.relative.left*s+this.offset.parent.left*s-("fixed"===this.cssPosition?-this.scrollParent.scrollLeft():o?0:n.scrollLeft())*s}},_generatePosition:function(e){var i,s,n=this.options,o=e.pageX,a=e.pageY,r="absolute"!==this.cssPosition||this.scrollParent[0]!==this.document[0]&&t.contains(this.scrollParent[0],this.offsetParent[0])?this.scrollParent:this.offsetParent,h=/(html|body)/i.test(r[0].tagName);return"relative"!==this.cssPosition||this.scrollParent[0]!==this.document[0]&&this.scrollParent[0]!==this.offsetParent[0]||(this.offset.relative=this._getRelativeOffset()),this.originalPosition&&(this.containment&&(e.pageX-this.offset.click.left<this.containment[0]&&(o=this.containment[0]+this.offset.click.left),e.pageY-this.offset.click.top<this.containment[1]&&(a=this.containment[1]+this.offset.click.top),e.pageX-this.offset.click.left>this.containment[2]&&(o=this.containment[2]+this.offset.click.left),e.pageY-this.offset.click.top>this.containment[3]&&(a=this.containment[3]+this.offset.click.top)),n.grid&&(i=this.originalPageY+Math.round((a-this.originalPageY)/n.grid[1])*n.grid[1],a=this.containment?i-this.offset.click.top>=this.containment[1]&&i-this.offset.click.top<=this.containment[3]?i:i-this.offset.click.top>=this.containment[1]?i-n.grid[1]:i+n.grid[1]:i,s=this.originalPageX+Math.round((o-this.originalPageX)/n.grid[0])*n.grid[0],o=this.containment?s-this.offset.click.left>=this.containment[0]&&s-this.offset.click.left<=this.containment[2]?s:s-this.offset.click.left>=this.containment[0]?s-n.grid[0]:s+n.grid[0]:s)),{top:a-this.offset.click.top-this.offset.relative.top-this.offset.parent.top+("fixed"===this.cssPosition?-this.scrollParent.scrollTop():h?0:r.scrollTop()),left:o-this.offset.click.left-this.offset.relative.left-this.offset.parent.left+("fixed"===this.cssPosition?-this.scrollParent.scrollLeft():h?0:r.scrollLeft())}},_rearrange:function(t,e,i,s){i?i[0].appendChild(this.placeholder[0]):e.item[0].parentNode.insertBefore(this.placeholder[0],"down"===this.direction?e.item[0]:e.item[0].nextSibling),this.counter=this.counter?++this.counter:1;var n=this.counter;this._delay(function(){n===this.counter&&this.refreshPositions(!s)})},_clear:function(t,e){function i(t,e,i){return function(s){i._trigger(t,s,e._uiHash(e))}}this.reverting=!1;var s,n=[];if(!this._noFinalSort&&this.currentItem.parent().length&&this.placeholder.before(this.currentItem),this._noFinalSort=null,this.helper[0]===this.currentItem[0]){for(s in this._storedCSS)("auto"===this._storedCSS[s]||"static"===this._storedCSS[s])&&(this._storedCSS[s]="");this.currentItem.css(this._storedCSS),this._removeClass(this.currentItem,"ui-sortable-helper")}else this.currentItem.show();for(this.fromOutside&&!e&&n.push(function(t){this._trigger("receive",t,this._uiHash(this.fromOutside))}),!this.fromOutside&&this.domPosition.prev===this.currentItem.prev().not(".ui-sortable-helper")[0]&&this.domPosition.parent===this.currentItem.parent()[0]||e||n.push(function(t){this._trigger("update",t,this._uiHash())}),this!==this.currentContainer&&(e||(n.push(function(t){this._trigger("remove",t,this._uiHash())}),n.push(function(t){return function(e){t._trigger("receive",e,this._uiHash(this))}}.call(this,this.currentContainer)),n.push(function(t){return function(e){t._trigger("update",e,this._uiHash(this))}}.call(this,this.currentContainer)))),s=this.containers.length-1;s>=0;s--)e||n.push(i("deactivate",this,this.containers[s])),this.containers[s].containerCache.over&&(n.push(i("out",this,this.containers[s])),this.containers[s].containerCache.over=0);if(this.storedCursor&&(this.document.find("body").css("cursor",this.storedCursor),this.storedStylesheet.remove()),this._storedOpacity&&this.helper.css("opacity",this._storedOpacity),this._storedZIndex&&this.helper.css("zIndex","auto"===this._storedZIndex?"":this._storedZIndex),this.dragging=!1,e||this._trigger("beforeStop",t,this._uiHash()),this.placeholder[0].parentNode.removeChild(this.placeholder[0]),this.cancelHelperRemoval||(this.helper[0]!==this.currentItem[0]&&this.helper.remove(),this.helper=null),!e){for(s=0;n.length>s;s++)n[s].call(this,t);this._trigger("stop",t,this._uiHash())}return this.fromOutside=!1,!this.cancelHelperRemoval},_trigger:function(){t.Widget.prototype._trigger.apply(this,arguments)===!1&&this.cancel()},_uiHash:function(e){var i=e||this;return{helper:i.helper,placeholder:i.placeholder||t([]),position:i.position,originalPosition:i.originalPosition,offset:i.positionAbs,item:i.currentItem,sender:e?e.element:null}}})});
EOT;
}

function encodeJsonSafe($data){
	$data1=json_encode($data);
	session_write_close();
	if ($data1===FALSE){
		$res2=array();
		$res2['stat']='fail';
		$res2['error']='json_error';
		return json_encode($res2);
	}
	else return $data1;
}
session_start();
//GenInstance
if (isset($_SESSION['userdb'])){
	if (!isset($_GET['instance'])||!isset($_SESSION['instancedb'][$_GET['instance']])){
		$instance=bin2hex(random_bytes(20));
		while(isset($_SESSION['instancedb'][$instance])){
			$instance=bin2hex(random_bytes(20));
		}
		$_SESSION['instancedb'][$instance]=array();
		header("Location: ".$_SERVER['PHP_SELF'].'?instance='.$instance);
		die();
	}
	$PHP_SELF_INSTANCE=$_SERVER['PHP_SELF'].'?instance='.$_GET['instance'];
}
//*GenInstance

//IniSettings
if(isset($_SESSION['instancedb'][$_GET['instance']]['mysettings'])){
	$SETTINGS=json_decode($_SESSION['instancedb'][$_GET['instance']]['mysettings'],TRUE);
}
else $SETTINGS=$DEFAULTSET;
if(isset($_SESSION['instancedb'][$_GET['instance']]['myencoding'])){
	$CHARSET=$_SESSION['instancedb'][$_GET['instance']]['myencoding'];
}
else $CHARSET=$defaultCharset;
if(isset($_COOKIE['mylanguage'])){
	$LANG=$_COOKIE['mylanguage'];
}
else $LANG=$defaultLanguage;
//*IniSettings
//Logout
if ($_GET['act']=='logout'){
	logout();
	echo 1;
	die();
}
if ($_GET['act']=='logoutdb'&&$_POST['CSRF']==$_SESSION['CSRFdb']){
	logout_db();
	echo 1;
	die();
}
//*Logout
//Encoding,settings,orderSet

if ($_GET['act']=='enc_change'&&$_POST['CSRF']==$_SESSION['CSRFdb']){
	$res=array();
	if (!isset($_POST['newEnc'])){
		$res['stat']='con_err';
		$res['con_err']='login';
	}
	else {
		if (set_instance_key('myencoding',$_POST['newEnc'])) $res['stat']='success';
		else {
			$res['stat']='con_err';
		$res['con_err']='login';
		}
	}
	echo encodeJsonSafe($res);
	die();
}

if ($_GET['act']=='enc_switch'&&$_POST['CSRF']==$_SESSION['CSRFdb']){
	$res=array();
	if (!isset($_POST['newState'])){
		$res['stat']='con_err';
		$res['con_err']='login';
	}
	else {
		if (set_instance_key('myencstate',$_POST['newState'])) $res['stat']='success';
		else {
			$res['stat']='con_err';
		$res['con_err']='login';
		}
	}
	echo encodeJsonSafe($res);
	die();
}

if ($_GET['act']=='save_settings'&&$_POST['CSRF']==$_SESSION['CSRFdb']){
	$res=array();
	if (!isset($_POST['newSettings'])){
		$res['stat']='con_err';
		$res['con_err']='login';
	}
	else {
		if (set_instance_key('mysettings',$_POST['newSettings'])) $res['stat']='success';
		else {
			$res['stat']='con_err';
		$res['con_err']='login';
		}
	}
	echo encodeJsonSafe($res);
	die();
}
//*Encoding,settings,orderSet

//BACKUP
$backupDatabaseTexts=array('initial'=>"/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

",'final'=>"

/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
");
if ($_GET['act']=='backup'&&$_POST['CSRF']==$_SESSION['CSRFdb']){
	register_shutdown_function(function(){
	if ($err=error_get_last()){
		if ($err['type']==E_ERROR) {
		header("Content-Type: text/html;charset=utf-8");
		echo create_error_page($GLOBALS["TR"]["Backup_error"][$GLOBALS["LANG"]]);}
	}
	});
	if ($_POST['backupWholeDb']=='no'){
		$tables=array();
		$seltabNr=intval($_POST['selTabNumber']);
	for ($i=0;$i<$seltabNr;$i++){
		if(isset($_POST['selTab'.$i])) array_push($tables,$_POST['selTab'.$i]);
	}
	}
	else $tables=NULL;
	if ($conn=create_connection()){
		if (select_database($conn)){
	$k=($tables===NULL)?generateBackupDb($conn,$_SESSION['instancedb'][$_GET['instance']]['actdb']):generateBackupTables($conn,$tables);
	if ($k===FALSE) {
		header("Content-Type: text/html;charset=utf-8");
		echo create_error_page($GLOBALS["TR"]["Backup_error"][$GLOBALS["LANG"]]);
	}
	else {
	header('Content-Type: application/force-download');
	header('Content-Disposition: attachment; filename="'.(($tables!==NULL)?(urlencode($_SESSION['instancedb'][$_GET['instance']]['actdb']).'_tables'):urlencode($_SESSION['instancedb'][$_GET['instance']]['actdb'])).'.sql"');
	echo $k;
	}
		}
		else {
		header("Content-Type: text/html;charset=utf-8");
		echo create_error_page($GLOBALS["TR"]["DB_load_error"][$GLOBALS["LANG"]]);
		}
	}
	else {
		header("Content-Type: text/html;charset=utf-8");
		echo create_error_page($GLOBALS["TR"]["conn_err"][$GLOBALS["LANG"]]);
	}
	die();
}
//*BACKUP
header("Content-Type: text/html;charset=utf-8");
//IMPORT
if ($_GET['act']=='import'&&$_POST['CSRF']==$_SESSION['CSRFdb']){
register_shutdown_function(function(){
	if ($err=error_get_last()){
		if ($err['type']==E_ERROR) {
		header("Content-Type: text/html;charset=utf-8");
		echo create_error_page($GLOBALS["TR"]["Import_error"][$GLOBALS["LANG"]]);}
	}
	});
	if (!isset($_POST['is_upload'])) echo create_error_page('Import error');
	else if (isset($_POST['is_upload']) && !($_FILES['import_file']['size'] > 0)) echo create_error_page($GLOBALS["TR"]["File_too_big"][$GLOBALS["LANG"]]);
	else{
		if ($conn=create_connection()){
			if (isset($_SESSION['instancedb'][$_GET['instance']]['actdb'])) mysqli_select_db($conn,$_SESSION['instancedb'][$_GET['instance']]['actdb']);
			$cont=file_get_contents($_FILES['import_file']['tmp_name']);
			 $bom = pack('H*','EFBBBF');
			$cont = preg_replace("/^$bom/", '', $cont);
			mysqli_multi_query($conn,$cont);
		do{
			if (mysqli_errno($conn)) {echo create_error_page('<span style="color:red">'.$GLOBALS["TR"]["Mysl"][$GLOBALS["LANG"]].': </span>'.htmlspecialchars(mysqli_error($conn)));
			mysqli_close($conn);
			die();
			}
		}while(mysqli_next_result($conn));
		if (mysqli_errno($conn)) echo create_error_page('<span style="color:red">'.$GLOBALS["TR"]["Mysl"][$GLOBALS["LANG"]].': </span>'.htmlspecialchars(mysqli_error($conn)));
		else echo create_info_page($GLOBALS["TR"]["Import_done"][$GLOBALS["LANG"]]);
		mysqli_close($conn);
		}
		else{
			echo create_error_page($GLOBALS["TR"]["conn_err"][$GLOBALS["LANG"]]);
		}
	}
	die();
}
//*IMPORT
//PQUERY
if ($_GET['act']=='pquery'&&$_POST['CSRF']==$_SESSION['CSRFdb']){
	$conn=create_connection();
	$ok=1;
	if(!$conn){
		$res['stat']='con_err';
		$res['con_err']='login';
		$ok=0;
	}
	else if (isset($_SESSION['instancedb'][$_GET['instance']]['actdb'])){
		if (!select_database($conn)){
			$res['stat']='con_err';
		$res['con_err']='dbmiss';
		$ok=0;
		}
	}
	if ($ok){
		$res['stat']='success';
		if ($result=mysqli_query($conn,$_POST['query'])){
			if (mysqli_num_fields($result)==0) $res['result']=$GLOBALS["TR"]["Query_void"][$GLOBALS["LANG"]].'<br>'.$GLOBALS["TR"]["Affected_rows"][$GLOBALS["LANG"]].' '.mysqli_affected_rows($conn);
			else {
				$res['result']='<table border="3" style="margin-left:auto;margin-right:auto;"><tr>';
				while($fieldinfo=mysqli_fetch_field($result)){
					$res['result'].='<th>'.htmlspecialchars($fieldinfo->name).'</th>';
				}
				$res['result'].='</tr>';
				while ($row=mysqli_fetch_row($result)){
					$res['result'].='<tr>';
					foreach($row as $rr) $res['result'].='<td>'.htmlspecialchars($rr).'</td>';
					$res['result'].='</tr>';
				}
				$res['result'].='</table>';
			}
		}
		else {
			$res['stat']='fail';
			$res['error']=htmlspecialchars(mysqli_error($conn));
		}
	}
		echo encodeJsonSafe($res);
		die();
}
//*PQUERY
//Log in
//Creare db
if ($_GET['act']=='createdb'&&$_POST['CSRF']==$_SESSION['CSRFdb']){
	$conn=create_connection();
	$res=array();
	if ($conn===FALSE){
		$res['stat']='con_err';
		$res['con_err']='login';
	}
	else {
		$sql='CREATE DATABASE '.pname($_POST['newdb'],FALSE);
		if (mysqli_query($conn,$sql)){
			$res['stat']='success';
		}
		else{ $res['stat']='fail';
		$res['error']=htmlspecialchars(mysqli_error($conn));
		}
	}
	echo encodeJsonSafe($res);
	die();
}
//*Creare db
//Creare selectie db
if ($_GET['act']=='dbselectcreate'&&$_POST['CSRF']==$_SESSION['CSRFdb']){
	$res=array();
	if ($conn=create_connection()){
		$res['stat']='success';
		$res['all']=create_database_select($conn);
	}
	else {
		$res['stat']='con_err';
		$res['con_err']='login';
	}
	echo encodeJsonSafe($res);
	die();
}
//*Creare selectie db
//Selectie db
if ($_GET['act']=='selectdb'&&$_POST['CSRF']==$_SESSION['CSRFdb']){
	$res=array();
	if ($conn=create_connection()){
		$_SESSION['instancedb'][$_GET['instance']]['actdb']=$_POST['db'];
		if (select_database($conn)){
			$res['stat']='success';
			$res['all']=create_table_select($conn);
		}
		else {
			$res['stat']='con_err';
			$res['con_err']='dbmiss';
		}
	}
	else{
		$res['stat']='con_err';
		$res['con_err']='login';
	}
	echo encodeJsonSafe($res);
	die();
}
if ($_GET['act']=='showactdb'&&$_POST['CSRF']==$_SESSION['CSRFdb']){
	$res=array();
	if (isset($_SESSION['instancedb'][$_GET['instance']]['actdb'])){
		$res['stat']='success';
		$res['db']=$_SESSION['instancedb'][$_GET['instance']]['actdb'];
	}
	else {
		$res['stat']='con_err';
		$res['con_err']='dbmiss';
	}
	echo encodeJsonSafe($res);
	die();
}
//*Selectie db
//Stergere db
if ($_GET['act']=='dropdb'&&$_POST['check']=="DA"&&$_POST['CSRF']==$_SESSION['CSRFdb']){
	$res=array();
	if ($conn=create_connection()){
		if (select_database($conn)){
			$SQL='DROP DATABASE '.pname($_SESSION['instancedb'][$_GET['instance']]['actdb'],FALSE);
			if (mysqli_query($conn,$SQL)){
				$res['stat']='success';
				$res['db']=htmlspecialchars($_SESSION['instancedb'][$_GET['instance']]['actdb']);
				logout_db();
			}
			else{
				$res['stat']='fail';
				$res['error']=htmlspecialchars(mysqli_error($conn));
			}
		}
		else {
			$res['stat']='con_err';
			$res['con_err']='dbmiss';
		}
	}
	else {
		$res['stat']='con_err';
		$res['con_err']='login';
	}
	echo encodeJsonSafe($res);
	die();
}
//*Stergere db
//Creare tabel
if ($_GET['act']=='createtbl'&&$_POST['CSRF']==$_SESSION['CSRFdb']){
		$res=array();
	if ($conn=create_connection()){
		if (select_database($conn)){
			$SQL='CREATE TABLE '.pname($_POST['newname'],FALSE).'('.pname($_POST['newcolname'],FALSE).' '.$_POST['newdatatype'].');';
			if (mysqli_query($conn,$SQL)){
				$res['stat']='success';
			}
			else{
				$res['stat']='fail';
				$res['error']=htmlspecialchars(mysqli_error($conn));
			}
		}
		else {
			$res['stat']='con_err';
			$res['con_err']='dbmiss';
		}
	}
	else {
		$res['stat']='con_err';
		$res['con_err']='login';
	}
	echo encodeJsonSafe($res);
	die();
}
//*Creare tabel
//Creare selectie tabel
if ($_GET['act']=='tblselectcreate'&&$_POST['CSRF']==$_SESSION['CSRFdb']){
	$res=array();
	if ($conn=create_connection()){
		if (select_database($conn)){
		$res['stat']='success';
		$res['all']=create_table_select($conn);}
		else {
			$res['stat']='con_err';
		$res['con_err']='dbmiss';
		}
	}
	else {
		$res['stat']='con_err';
		$res['con_err']='login';
	}
	echo encodeJsonSafe($res);
	die();
}
//*Creare selectie tabel
//Selectare tabel
if ($_GET['act']=='selecttbl'&&$_POST['CSRF']==$_SESSION['CSRFdb']){
	$res=array();
	if ($conn=create_connection()){
		if (select_database($conn)){
			$_SESSION['instancedb'][$_GET['instance']]['acttab']=$_POST['tbl'];
			if (check_table_exist($conn)){
				$res['stat']='success';
			}
			else {$res['stat']='con_err';
			$res['con_err']='tblmiss';
			}
		}
		else {
			$res['stat']='con_err';
			$res['con_err']='dbmiss';
		}
	}
	else{
		$res['stat']='con_err';
		$res['con_err']='login';
	}
	echo encodeJsonSafe($res);
	die();
}
//*Selectare tabel
//LISTA_TABELE
if ($_GET['act']=='tables_list'&&$_POST['CSRF']==$_SESSION['CSRFdb']){
	$res=array();
	if ($conn=create_connection()){
		if (select_database($conn)){
		if(isset($GLOBALS['DEFAULTDBS'])&&isset($GLOBALS['DEFAULTDBS']['tables'][$_SESSION['instancedb'][$_GET['instance']]['actdb']])&&$GLOBALS['DEFAULTDBS']['tables'][$_SESSION['instancedb'][$_GET['instance']]['actdb']]!=NULL){
		if (count($GLOBALS['DEFAULTDBS']['tables'][$_SESSION['instancedb'][$_GET['instance']]['actdb']])>0){
			$res['stat']='success';
			$res['cnt']=array();
		foreach ($GLOBALS['DEFAULTDBS']['tables'][$_SESSION['instancedb'][$_GET['instance']]['actdb']] as $tbll){
			array_push($res['cnt'],htmlspecialchars($tbll));
		}
		}
		else {
			$res['stat']='fail';
			$res['error']=$GLOBALS["TR"]["No_tableLarge"][$GLOBALS["LANG"]];
		}
	}
	else{
$sql='SHOW tables';
if (($result=mysqli_query($conn,$sql))===FALSE||mysqli_num_rows($result)==0){
	$res['stat']='fail';
	$res['error']=$GLOBALS["TR"]["No_tableLarge"][$GLOBALS["LANG"]];
}
else{
	$res['stat']='success';
			$res['cnt']=array();
	while ($row=mysqli_fetch_row($result)){
		array_push($res['cnt'],htmlspecialchars($row[0]));
	}
	}
	}
		}
		else {
			$res['stat']='con_err';
			$res['con_err']='dbmiss';
		}
	}
	else{
		$res['stat']='con_err';
		$res['con_err']='login';
	}

	echo encodeJsonSafe($res);
	die();
}
//*LISTA_TABELE
if (($conn=create_connection())===FALSE||!($sldb=select_database($conn))||!($sltab=check_table_exist($conn))){
	if ($_GET['act']=='checkuser'){
	$connver=mysqli_connect('localhost',$_POST['usr'],$_POST['pwd']);
if (!$connver) $connver=mysqli_connect('127.0.0.1',$_POST['usr'],$_POST['pwd']);
	$res=array();
	if (!$connver){
	$res['stat']='fail';
	}
		else {
		if (mysqli_query($connver,"SET NAMES ".$CHARSET)){
		$res['stat']='success';
		$_SESSION['userdb']=$_POST['usr'];
		$_SESSION['pwddb']=$_POST['pwd'];
		$_SESSION['CSRFdb']=bin2hex(random_bytes(40));
		$instance=bin2hex(random_bytes(20));
		while(isset($_SESSION['instancedb'][$instance])){
			$instance=bin2hex(random_bytes(20));
		}
		$_SESSION['instancedb'][$instance]=array();
		$res['instance']=$instance;
		}
		else $res['stat']='fail';
		mysqli_close($connver);
		}
	echo encodeJsonSafe($res);
	die();
}
	if (isset($_GET['ajax'])){
		$res=array();
		$res['stat']='con_err';
		if (!$conn) $res['con_err']='login';
		else if (!$sldb) $res['con_err']='dbmiss';
		else if (!$sltab) $res['con_err']='tblmiss';
		echo encodeJsonSafe($res);
		die();
	}
	
	meta_build();
	echo '<style type="text/css">
body{
	background-color:#FDFDFD;
}
#logindiv{
	position:absolute;
	top:150px;
	left:50%;
	width:260px;
	height:260px;
	margin-left:-150px;
	background-color:#4F4FFF;
	border-radius:10px;
	padding:20px;
	color:#FFFFFF;
	overflow:hidden;
	text-overflow:ellipsis;
	white-space:nowrap;
}
.input_container{
	background-color:#FFFFFF;
	border-radius:5px;
	width:200px;
	height:26px;
	padding-left:5px;
	padding-right:5px;
	padding-top:1px;
	margin-left:auto;
	margin-right:auto;
}
.input_element{
	width:200px;
	height:23px;
	border:0px;
	color:#679596;
}
.but{
	background-color:#4F4F80;
	color:#FFFFFF;
	font-size:20px;
	border:none;
	border-radius:5px;
	min-width:70px;
	height:30px;
	cursor:pointer;
}
#banner{
	position:absolute;
	width:200px;
	left:50%;
	margin-left:-120px;
	top:20px;
	padding:20px;vertical-align:middle;text-align:center;
	font-family: sans-serif,cursive;
	font-size:26px;
	color:#0000EE;
}
.brush_mt{
	font-family: sans-serif,cursive;
}
.closing{
	font-family: sans-serif;
	text-decoration:none;
	color:#777;
	font-weight:bold;
}
.closing:hover{
	color:#999;
}
.sldb{
	border-radius:5px;
	background-color:#C8F2FF;
	max-width:140px;
}
.chkbox{
	cursor:pointer;
}
.butCols{
	background-color:#FFFFFF;
	border:solid 1px #BDC2CC;
	border-radius:5px;
	cursor:pointer;
}
#selectTables{
	display:inline-block;
	height:155px;
	border-radius:5px;
	border: solid 1px #BDC2CC;
	overflow:auto;
	width:270px;
}
.butTables{
	background-color:#CC8D00;
	color:#fff;
	border:solid 1px #BDC2CC;
	border-radius:5px;
	cursor:pointer;
}
	</style></head>';
	enc_build();
	echo '<body>
	<div id="banner">
	Access MySQLi <br>
	'.$GLOBALS["TR"]["Version"][$GLOBALS["LANG"]].' '.$VERSION.'
	</div>
	<div id="logindiv">';
	if (!$conn){
	echo<<<EOT
	<br>
	<span style="font-weight:bold;font-size:20px;padding-left:30px;">{$GLOBALS["TR"]["Log_in"][$GLOBALS["LANG"]]}</span><br><br><br>
	<div class="input_container">
	<input type="text" class="input_element" id="User" value="{$GLOBALS["TR"]["User"][$GLOBALS["LANG"]]}" my_old_val="{$GLOBALS["TR"]["User"][$GLOBALS["LANG"]]}"></input>
	</div><br><br>
	<div class="input_container">
	<input type="text" class="input_element" id="Password" value="{$GLOBALS["TR"]["Password"][$GLOBALS["LANG"]]}" my_old_val="{$GLOBALS["TR"]["Password"][$GLOBALS["LANG"]]}"></input>
	</div><br>
	<div style="padding-right:25px;"><br>
	<button type="button" onclick="login_attempt()" class="but" style="float:right;">{$GLOBALS["TR"]["Log_in"][$GLOBALS["LANG"]]}</button></div>
	<div style="color:#FFFFFF;font-size:20px;font-weight:bold;padding-left:25px;" id="error"></div>
	<script>
	function login_attempt(){
		$('#error').html('');
		var usInp=document.getElementById("User");
		var pInp=document.getElementById("Password");
		var us,pas;
		if (usInp.style.color!="#000000"&&usInp.style.color!="rgb(0, 0, 0)"&&usInp.style.color!="rgb(0,0,0)"&&usInp.style.color!="RGB(0,0,0)"&&usInp.style.color!="RGB(0, 0, 0)"&&usInp.style.color!="black"&&usInp.style.color!="BLACK"){
			us="";
		}
		else us=$("#User").val();
		if (pInp.style.color!="#000000"&&pInp.style.color!="rgb(0, 0, 0)"&&pInp.style.color!="rgb(0,0,0)"&&pInp.style.color!="RGB(0,0,0)"&&pInp.style.color!="RGB(0, 0, 0)"&&pInp.style.color!="black"&&pInp.style.color!="BLACK"){
			pas="";
		}
		else pas=$("#Password").val();
		document.getElementById("logindiv").createPreloader();
		$.post("{$_SERVER['PHP_SELF']}?act=checkuser&ajax=true",{usr:us,pwd:pas},function(result){
			var res=JSON.parse(result);
			if (res["stat"]=="fail"){
				document.getElementById("logindiv").removePreloader();
				$("#error").html("Wrong data!");
			}
			else {
				document.getElementById("logindiv").removePreloader();
				window.location.href='{$_SERVER['PHP_SELF']}?instance='+res["instance"];
			}
		});
	}
	$("document").ready(function(){
		$(".input_element").focus(function(){
			if (this.style.color!="#000000"&&this.style.color!="rgb(0, 0, 0)"&&this.style.color!="rgb(0,0,0)"&&this.style.color!="RGB(0,0,0)"&&this.style.color!="RGB(0, 0, 0)"&&this.style.color!="black"&&this.style.color!="BLACK"){
				this.style.color="#000000";
				this.value="";
				if (this.getAttribute("id")=="Password") this.type="password";
			}
		});
		$(".input_element").blur(function(){
			if (this.value==""){
				this.style.color="#679596";
				this.value=this.getAttribute("my_old_val");
				this.type="text";
			}
		});
		$(".input_element").keypress(function(e){
				if (e.keyCode==13) login_attempt();
		})
	})
	</script>
EOT;
}
	else if (!$sldb){
		echo create_database_select($conn);
	}
	else if (!$sltab){
		echo create_table_select($conn);
	}
	die('</div></body></html>');
}
//*Log in
//Functions
function create_connection(){
	if (!isset($_SESSION['userdb'])) return FALSE;
	$conn=mysqli_connect('localhost',$_SESSION['userdb'],$_SESSION['pwddb']);
if (!$conn)	$conn=mysqli_connect('127.0.0.1',$_SESSION['userdb'],$_SESSION['pwddb']);
	if ($conn!==NULL) {
	if (mysqli_query($conn,"SET NAMES ".$GLOBALS['CHARSET'])){
		return $conn;
	}
	logout();
	return FALSE;
}
	

}
function enc_build(){
if (isset($_SESSION['instancedb'][$_GET['instance']]['myencstate'])&&$_SESSION['instancedb'][$_GET['instance']]['myencstate']=="close")
echo '<div id="up_encoding" style="position:fixed;z-index:12;left:50%;width:800px;margin-left:-400px;top:-40px;" my_state="close">';
else
echo '<div id="up_encoding" style="position:fixed;z-index:12;left:50%;width:800px;margin-left:-400px;top:-10px;" my_state="open">';
if (isset($_SESSION['instancedb'][$_GET['instance']]))  echo '<div title="'.$GLOBALS["TR"]["Change_encoding_language"][$GLOBALS["LANG"]].'" style="background-color:#4F4FFF;width:40px;height:30px;margin-left:auto;margin-right:auto;border-radius:4px;position:absolute;top:25px;left:50%;margin-left:-20px;z-index:-1;cursor:pointer;" onclick="switchEncDiv()">
	<div style="height:15px">&nbsp;</div>
	<svg viewBox="0 0 100 50" style="width:30px;height:15px;margin-left:5px">
	<path d="M 10,10 L 50,40 L 90,10 L 80,10 L 50,30 L 20,10 Z" stroke="#FFFFFF" stroke-width="2" fill="#000000"/>
	</svg>
	</div>';
echo '<div style="background-color:#E88435;width:780px;height:40px;margin-left:auto;margin-right:auto;border-radius:5px;z-index:11;color:white;padding-left:10px;padding-right:10px;"><div style="height:15px;"></div>
	<div style="float:left">&nbsp;&nbsp;&nbsp;&nbsp;Language: &nbsp;<select id="lang_select" onchange="lang_change()" style="border:solid #999 1px;border-radius:5px;">';
	for ($i=0;$i<count($GLOBALS['languages']);$i++){
		echo '<option value="'.$GLOBALS['languages'][$i].'">'.$GLOBALS['languages'][$i].'</option>';
	}
	echo'</select></div>';
if (isset($_SESSION['instancedb'][$_GET['instance']])){
	echo '<div style="float:right">
	'.$GLOBALS["TR"]["Encoding_used"][$GLOBALS["LANG"]].'&nbsp;<select id="enc_select" onchange="enc_change()" style="border:solid #999 1px;border-radius:5px;">';
	for ($i=0;$i<count($GLOBALS['encodings']);$i++){
		echo '<option value="'.$GLOBALS['encodings'][$i].'">'.$GLOBALS['encodings'][$i].'</option>';
	}
	echo'</select>&nbsp;&nbsp;&nbsp;&nbsp;</div>
	<script>
	var currentEnc=';
	if (isset($_SESSION['instancedb'][$_GET['instance']]['myencoding'])) echo "'".$_SESSION['instancedb'][$_GET['instance']]['myencoding']."';";
	else echo "'".$GLOBALS['defaultCharset']."';";
	echo ' $("#enc_select").val(currentEnc);
	</script>';
}
	echo '<script>
	var currentLang=getCookie("mylanguage");
	if (currentLang!=null&&currentLang!="") $("#lang_select").val(currentLang);
	else {
		$("#lang_select").val("';
		echo $GLOBALS['defaultLanguage'];
	echo'");
	}
	</script>';
	echo '</div></div>';
}
function set_instance_key($key,$value){
	if (!isset($_SESSION['instancedb'][$_GET['instance']])){
		return 0;
	}
		$_SESSION['instancedb'][$_GET['instance']][$key]=$value;
		return 1;
}

function meta_build(){
	echo '<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8">
<meta name="viewport" content="width=1550,height=872">
<title>Access MySQLi v'.$GLOBALS['VERSION'].'</title>
<script>';
echo_jquery();
echo '</script>';
echo <<<EOT
<script>
var active=0;
function wait(arg){
	if (active==0) arg();
	else{
	var timWait=setInterval(function(){
		if (active==0){
			arg();
			clearInterval(timWait);
		}
	},1);}
}
function shaddowRun(elem,arg,clb){
	clb=clb||1;
	if (clb==1){
	elem.createShaddow();
	}
	else elem.createShaddow(clb);
	setTimeout(function(){arg();},0);
	setTimeout(function(){elem.removeShaddow();},0);
}
function svgSpin(ull){
	if (typeof ull !=='undefined'&&ull!=null){
	var arr=ull.getElementsByTagName('path');
var len=arr.length;
var init=0;
function spinStep(){
for(var i=0;i<len;i++){
if (init==i){
if (typeof arr[i] !=='undefined'&&arr[i]!=null)	arr[i].setAttribute("fill","#787878");
else if (typeof intspin !=='undefined'&&intspin!=null){ clearInterval(intspin);}
}
else{ if (typeof arr[i] !=='undefined'&&arr[i]!=null) arr[i].setAttribute("fill","#E3E3E3");
else if (typeof intspin !=='undefined'&&intspin!=null) { clearInterval(intspin);}
}
}
init++;
if (init==len) init=0;
}
spinStep();
	var intspin=setInterval(function(){spinStep();},110);
	}}
Element.prototype.createPreloader=function(){
	var x=this;
	if (x.getElementsByClassName("svgspin").length==0){
	var ch=document.createElement('div');
x.appendChild(ch);
ch.innerHTML='<div style="text-align:center;position:absolute;top:50%;left:50%;margin-left:-25px;margin-top:-25px;width:50px;height:50px;">\
<svg viewBox="0 0 200 200" style="width:50px;height:50px;" version="1.1">\
<path  d="M 168.944,42.14912 A 90,90 0 0 1 189.65752,92.15598 L 159.77168,94.77066  A 60,60 0 0 0 145.96267,61.43274 Z"  fill="#E3E3E3" />\
<path  d="M 189.65752,107.84402 A 90,90 0 0 1 168.944,157.85088 L 145.96267,138.56726 A 60,60 0 0 0 159.77168,105.22934 Z"  fill="#E3E3E3" />\
<path  d="M 157.85088,168.944 A 90,90 0 0 1 107.84402,189.65752 L 105.22934,159.77168 A 60,60 0 0 0 138.56726,145.96267 Z"  fill="#E3E3E3" />\
<path  d="M 92.15598,189.65752 A 90,90 0 0 1 42.14912,168.944 L 61.43274,145.96267 A 60,60 0 0 0 94.77066,159.77168 Z"  fill="#E3E3E3" />\
<path  d="M 31.056,157.85088 A 90,90 0 0 1 10.34248,107.84402 L 40.22832,105.22934 A 60,60 0 0 0 54.03733,138.56726 Z"  fill="#E3E3E3" />\
<path  d="M 10.34248,92.15598 A 90,90 0 0 1 31.056,42.14912 L 54.03733,61.43274 A 60,60 0 0 0 40.22832,94.77066 Z"  fill="#E3E3E3" />\
<path  d="M 42.14912,31.056 A 90,90 0 0 1 92.15598,10.34248 L 94.77066,40.22832 A 60,60 0 0 0 61.43274,54.03733 Z"  fill="#E3E3E3" />\
<path  d="M 107.84402,10.34248 A 90,90 0 0 1 157.85088,31.056 L 138.56726,54.03733 A 60,60 0 0 0 105.22934,40.22832 Z"  fill="#E3E3E3" />\
</svg></div>'
;
ch.style.borderRadius="inherit";
ch.setAttribute('class','svgspin');
ch.style.width="100%";
ch.style.height="100%";
ch.style.backgroundColor="black";
ch.style.opacity="0.8";
if (x.tagName.toLowerCase()=='body'){

	ch.style.position="fixed";
}
else{
ch.style.position="absolute";}
ch.style.left="0px";
ch.style.top="0px";
svgSpin(ch);
return ch;
}
}
Element.prototype.removePreloader=function(){
	var x=this;
	var arr=x.getElementsByClassName("svgspin");
	for(var i=0;i<arr.length;i++){
		x.removeChild(arr[i]);
	}
}
Element.prototype.createShaddow=function(callback){
	callback=callback||1;
	var x=this;
	if (x.getElementsByClassName("darkShaddow").length==0){
	var ch=document.createElement('div');
x.appendChild(ch);
ch.innerHTML='&nbsp;';
ch.style.borderRadius="inherit";
ch.setAttribute('class','darkShaddow');
ch.style.width="100%";
ch.style.height="100%";
ch.style.backgroundColor="black";
ch.style.opacity="0.8";
if (callback!==1){
$(ch).click(callback);}
if (x.tagName.toLowerCase()=='body'){
	ch.style.position="fixed";
}
else{
ch.style.position="absolute";}
ch.style.left="0px";
ch.style.top="0px";
return ch;
}
}
Element.prototype.removeShaddow=function(){
	var x=this;
	var arr=x.getElementsByClassName("darkShaddow");
	for(var i=0;i<arr.length;i++){
		arr[i].parentNode.removeChild(arr[i]);
	}
}
EOT;
echo<<<'EOT'

function escapeForRegex(str){
	/*https://developer.mozilla.org/en-US/docs/Web/JavaScript/Guide/Regular_Expressions*/
	return str.replace(/[.*+?!^${}()|\[\]\\]/g,function(x){return '\\'+x;});
}
</script>
<script>
//PHPJS.ORG
//LICENCE ONLY FOR THIS SCRIPT:
/*Copyright (c) 2013 Kevin van Zonneveld (http://kvz.io)
and Contributors (http://phpjs.org/authors)

Permission is hereby granted, free of charge, to any person obtaining a copy of
this software and associated documentation files (the "Software"), to deal in
the Software without restriction, including without limitation the rights to
use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies
of the Software, and to permit persons to whom the Software is furnished to do
so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all
copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
SOFTWARE.*/

function htmlspecialchars(string, quote_style, charset, double_encode) {
  //       discuss at: http://phpjs.org/functions/htmlspecialchars/
  //      original by: Mirek Slugen
  //      improved by: Kevin van Zonneveld (http://kevin.vanzonneveld.net)
  //      bugfixed by: Nathan
  //      bugfixed by: Arno
  //      bugfixed by: Brett Zamir (http://brett-zamir.me)
  //      bugfixed by: Brett Zamir (http://brett-zamir.me)
  //       revised by: Kevin van Zonneveld (http://kevin.vanzonneveld.net)
  //         input by: Ratheous
  //         input by: Mailfaker (http://www.weedem.fr/)
  //         input by: felix
  // reimplemented by: Brett Zamir (http://brett-zamir.me)
  //             note: charset argument not supported
  //        example 1: htmlspecialchars("<a href='test'>Test</a>", 'ENT_QUOTES');
  //        returns 1: '&lt;a href=&#039;test&#039;&gt;Test&lt;/a&gt;'
  //        example 2: htmlspecialchars("ab\"c'd", ['ENT_NOQUOTES', 'ENT_QUOTES']);
  //        returns 2: 'ab"c&#039;d'
  //        example 3: htmlspecialchars('my "&entity;" is still here', null, null, false);
  //        returns 3: 'my &quot;&entity;&quot; is still here'

  var optTemp = 0,
    i = 0,
    noquotes = false;
  if (typeof quote_style === 'undefined' || quote_style === null) {
    quote_style = 2;
  }
  string = string.toString();
  if (double_encode !== false) { // Put this first to avoid double-encoding
    string = string.replace(/&/g, '&amp;');
  }
  string = string.replace(/</g, '&lt;')
    .replace(/>/g, '&gt;');

  var OPTS = {
    'ENT_NOQUOTES': 0,
    'ENT_HTML_QUOTE_SINGLE': 1,
    'ENT_HTML_QUOTE_DOUBLE': 2,
    'ENT_COMPAT': 2,
    'ENT_QUOTES': 3,
    'ENT_IGNORE': 4
  };
  if (quote_style === 0) {
    noquotes = true;
  }
  if (typeof quote_style !== 'number') { // Allow for a single string or an array of string flags
    quote_style = [].concat(quote_style);
    for (i = 0; i < quote_style.length; i++) {
      // Resolve string input to bitwise e.g. 'ENT_IGNORE' becomes 4
      if (OPTS[quote_style[i]] === 0) {
        noquotes = true;
      } else if (OPTS[quote_style[i]]) {
        optTemp = optTemp | OPTS[quote_style[i]];
      }
    }
    quote_style = optTemp;
  }
  if (quote_style & OPTS.ENT_HTML_QUOTE_SINGLE) {
    string = string.replace(/'/g, '&#039;');
  }
  if (!noquotes) {
    string = string.replace(/"/g, '&quot;');
  }

  return string;
}
function htmlspecialchars_decode(string, quote_style) {
  //       discuss at: http://phpjs.org/functions/htmlspecialchars_decode/
  //      original by: Mirek Slugen
  //      improved by: Kevin van Zonneveld (http://kevin.vanzonneveld.net)
  //      bugfixed by: Mateusz "loonquawl" Zalega
  //      bugfixed by: Onno Marsman
  //      bugfixed by: Brett Zamir (http://brett-zamir.me)
  //      bugfixed by: Brett Zamir (http://brett-zamir.me)
  //         input by: ReverseSyntax
  //         input by: Slawomir Kaniecki
  //         input by: Scott Cariss
  //         input by: Francois
  //         input by: Ratheous
  //         input by: Mailfaker (http://www.weedem.fr/)
  //       revised by: Kevin van Zonneveld (http://kevin.vanzonneveld.net)
  // reimplemented by: Brett Zamir (http://brett-zamir.me)
  //        example 1: htmlspecialchars_decode("<p>this -&gt; &quot;</p>", 'ENT_NOQUOTES');
  //        returns 1: '<p>this -> &quot;</p>'
  //        example 2: htmlspecialchars_decode("&amp;quot;");
  //        returns 2: '&quot;'

  var optTemp = 0,
    i = 0,
    noquotes = false;
  if (typeof quote_style === 'undefined') {
    quote_style = 2;
  }
  string = string.toString()
    .replace(/&lt;/g, '<')
    .replace(/&gt;/g, '>');
  var OPTS = {
    'ENT_NOQUOTES': 0,
    'ENT_HTML_QUOTE_SINGLE': 1,
    'ENT_HTML_QUOTE_DOUBLE': 2,
    'ENT_COMPAT': 2,
    'ENT_QUOTES': 3,
    'ENT_IGNORE': 4
  };
  if (quote_style === 0) {
    noquotes = true;
  }
  if (typeof quote_style !== 'number') { // Allow for a single string or an array of string flags
    quote_style = [].concat(quote_style);
    for (i = 0; i < quote_style.length; i++) {
      // Resolve string input to bitwise e.g. 'PATHINFO_EXTENSION' becomes 4
      if (OPTS[quote_style[i]] === 0) {
        noquotes = true;
      } else if (OPTS[quote_style[i]]) {
        optTemp = optTemp | OPTS[quote_style[i]];
      }
    }
    quote_style = optTemp;
  }
  if (quote_style & OPTS.ENT_HTML_QUOTE_SINGLE) {
    string = string.replace(/&#0*39;/g, "'"); // PHP doesn't currently escape if more than one 0, but it should
    // string = string.replace(/&apos;|&#x0*27;/g, "'"); // This would also be useful here, but not a part of PHP
  }
  if (!noquotes) {
    string = string.replace(/&quot;/g, '"');
  }
  // Put this in last place to avoid escape being double-decoded
  string = string.replace(/&amp;/g, '&');

  return string;
}
//*PHPJS.ORG
EOT;
echo<<<EOT
</script>
<script>
function gen_error(arg){
	var text,cls;
	switch(arg){
		case 'login':
		text='{$GLOBALS["TR"]["conn_err"][$GLOBALS["LANG"]]}';
		cls=2;
		break;
		case 'dbmiss':
		text='{$GLOBALS["TR"]["dbmiss"][$GLOBALS["LANG"]]}';
		cls=0;
		break;
		case 'tblmiss':
		text='{$GLOBALS["TR"]["tblmiss"][$GLOBALS["LANG"]]}';
		cls=0;
		break;
		case 'colmiss':
		text='{$GLOBALS["TR"]["colmiss"][$GLOBALS["LANG"]]}';
		cls=0;
		break;
		case 'json_error':
		text='{$GLOBALS["TR"]["json_error"][$GLOBALS["LANG"]]}';
		cls=1;
		break;
		default:
		text=false;
		cls=1;
		break;
		}
		if (text===false) text='<span style="font-weight:bold;color:red">{$GLOBALS["TR"]["MySQL_error"][$GLOBALS["LANG"]]}:</span><br>'+arg;
		conerdiv=document.createElement('div');
		conerdiv.style.position="fixed";
		conerdiv.style.top="0px";
		conerdiv.style.left="0px"
		conerdiv.style.width="100%";
		conerdiv.style.height="100%";
		conerdiv.style.zIndex="10";
		conerdiv.setAttribute('class','conerdiv');
		conerdiv.innerHTML='\
		<div style="position:absolute;top:0px;left:0px;width:100%;height:100%;background-color:#000000;opacity:0.5;">&nbsp;</div>\
		<div style="opacity:1;position:absolute;top:50%;left:50%;width:350px;height:200px;padding:20px;margin-left:-195px;margin-top:-120px;background-color:#FFF2A0;border-radius:5px;">\
		<div style="height:30px;">\
		<svg style="width:30px;height:30px;" viewBox="0 0 110 110">\
		<path d="M 90,50 L 78.28,78.28 L 50,90 L 21.72,78.28 L 10,50 L 21.72,21.72 L 50,10 L 78.28,21.72 Z" fill="red"/>\
		<path d="M 65.95,27.75 L 72.25,34.05 L 34.05,72.25 L 27.75,65.95 Z" fill="#FFFFFF"/>\
		<path d="M 34.05,27.75 L 27.75,34.05 L 65.95,72.25 L 72.25,65.95 Z" fill="#FFFFFF"/>\
		</svg>&nbsp;&nbsp;&nbsp;<span style="color:red;font-weight:bold;position:relative;top:-10px">ERROR!</span>\
		</div><br>\
		<div style="overflow:auto;height:130px">'+text+'</div>\
		<div style="height:50px;">{$GLOBALS["TR"]["OK_to_close"][$GLOBALS["LANG"]]}<button type="button" style="cursor:pointer;position:relative;top:-5px;float:right;margin-right:25px;color:#FFFFFF;background-color:#CC8D00;width:75px;font-size:18px;" onclick="close_error(\''+cls+'\')">{$GLOBALS["TR"]["OK"][$GLOBALS["LANG"]]}</button></div>\
		</div>';
		if (document.getElementsByTagName('body')[0].getElementsByClassName('conerdiv').length==0){
			document.getElementsByTagName('body')[0].appendChild(conerdiv);
		}
}
function close_error(arg){
	if (arg=='0'||arg==0){
		window.location.href="{$GLOBALS['PHP_SELF_INSTANCE']}";
	}
	else if (arg=='1'||arg==1) {
		arr=document.getElementsByTagName('body')[0].getElementsByClassName('conerdiv');
		if (arr.length!=0){
			document.getElementsByTagName('body')[0].removeChild(arr[0]);
	}}
	else {
		window.location.href="{$_SERVER['PHP_SELF']}";
		}
	}
EOT;

if ($GLOBALS['conn']){
echo<<<EOT
function gen_pquery(){
	pqrm=document.createElement('div');
	pqrm.setAttribute('class','pqr');
	pqrm.setAttribute('style','position:fixed;left:0px;top:0px;width:100%;height:100%;background-color:#000000;opacity:0.2;z-index:8;');
	pqr=document.createElement('div');
	pqr.setAttribute('style','text-align:center;background-color:#FFF2A0;width:98%;height:98%;position:fixed;top:1%;left:1%;z-index:9;border-radius:10px;overflow:hidden;');
	pqr.setAttribute('class','pqr');
	var inr='\
	<a href="javascript:close_pquery()" class="closing" style="font-size:26px;position:absolute;right:20px;top:10px;" title="{$GLOBALS["TR"]["Close"][$GLOBALS["LANG"]]}">x</a>\
	<div><h3 style="text-align:center">{$GLOBALS["TR"]["Insert_query"][$GLOBALS["LANG"]]}</h3></div>\
	<div style="border:solid 1px #999;border-radius:5px;width:1000px;margin-left:auto;margin-right:auto;padding:20px;position:relative;" id="pqueries">\
	<textarea  rows="3" cols="60" style="resize: none;border-radius:5px;" id="pqueryquery"></textarea>&nbsp;\
	<a href="javascript:clear_pquery()" class="closing" style="font-size:26px;position:relative;top:-17px;" title="{$GLOBALS["TR"]["Empty_field"][$GLOBALS["LANG"]]}">x</a>\
	<button type="button" style="float:right;background-color:#4F4F80;color:#FFFFFF;font-size:16px;border:none;border-radius:5px;height:25px;cursor:pointer;position:relative;left:-200px;top:12px;" onclick="send_pquery()">{$GLOBALS["TR"]["Send"][$GLOBALS["LANG"]]}</button></div>\
	<div style="position:relative;margin-top:20px;height:60%;border-radius:5px;overflow:auto;width:1000px;margin-left:auto;margin-right:auto;background-color:#FFFFFF;padding:20px;" id="pqresult">&nbsp;</div>\
	';
	pqr.innerHTML=inr;
	if (document.getElementsByTagName('body')[0].getElementsByClassName('pqr').length==0){
		document.getElementsByTagName('body')[0].appendChild(pqrm);
		document.getElementsByTagName('body')[0].appendChild(pqr);
		document.getElementsByTagName('body')[0].style.overflow="hidden";
	}
}
function close_pquery(){
	var arr=document.getElementsByTagName('body')[0].getElementsByClassName('pqr');
	if (arr.length>0){
		window.location.href="{$GLOBALS['PHP_SELF_INSTANCE']}";
	}

}
function clear_pquery(){
	$('#pqueryquery').val('');
}
function send_pquery(){
	var query=$('#pqueryquery').val();
	if (query!=''){
		document.getElementById('pqresult').createPreloader();
		document.getElementById('pqueries').createPreloader();
		$.post('{$GLOBALS['PHP_SELF_INSTANCE']}&act=pquery&ajax=true',{query:query,CSRF:(typeof MY_CSRF !='undefined')?MY_CSRF:''},function(result){
		document.getElementById('pqresult').removePreloader();
			document.getElementById('pqueries').removePreloader();
			var ree=JSON.parse(result);
			if (ree['stat']=='success'){
				$('#pqresult').html(ree['result']);
			}
			if (ree['stat']=='fail') {
				gen_error(ree['error']);
				$('#pqresult').html('&nbsp;');
			}
			if (ree['stat']=='con_err'){
				gen_error(ree['con_err']);
				$('#pqresult').html('&nbsp;');
			}
		})
	}
}
EOT;
}
echo <<<EOT
function color_change(w,cl){
	w.setAttribute('fill',cl);
}
function change_color2(w){
	var arr=w.getElementsByTagName('path');
	var arr2=w.getElementsByTagName('text');
	var arr3=w.getElementsByTagName('rect');
	var arr4=w.getElementsByTagName('circle');
	for (var i=0;i<arr.length;i++){
		if (arr[i].getAttribute('my_change_color')!=null)
		arr[i].setAttribute('fill',arr[i].getAttribute('my_change_color'));
	}
	for (var i=0;i<arr2.length;i++){
		if (arr2[i].getAttribute('my_change_color')!=null)
		arr2[i].setAttribute('fill',arr2[i].getAttribute('my_change_color'));
	}
	for (var i=0;i<arr3.length;i++){
		if (arr3[i].getAttribute('my_change_color')!=null)
		arr3[i].setAttribute('fill',arr3[i].getAttribute('my_change_color'));
	}
	for (var i=0;i<arr4.length;i++){
		if (arr4[i].getAttribute('my_change_color')!=null)
		arr4[i].setAttribute('stroke',arr4[i].getAttribute('my_change_color'));
	}

}
function change_color3(w){
	var arr=w.getElementsByTagName('path');
	var arr2=w.getElementsByTagName('circle');
	for (var i=0;i<arr.length;i++){
		if (arr[i].getAttribute('my_change_color')!=null)
		arr[i].setAttribute('fill',arr[i].getAttribute('my_change_color'));
	}
	for (var i=0;i<arr2.length;i++){
		if (arr2[i].getAttribute('my_change_color')!=null)
		arr2[i].setAttribute('fill',arr2[i].getAttribute('my_change_color'));
	}

}
function reset_color3(w){
	var arr=w.getElementsByTagName('path');
	var arr2=w.getElementsByTagName('circle');
	for (var i=0;i<arr.length;i++){
		if (arr[i].getAttribute('my_orig_color')!=null)
		arr[i].setAttribute('fill',arr[i].getAttribute('my_orig_color'));
	}
	for (var i=0;i<arr2.length;i++){
		if (arr2[i].getAttribute('my_orig_color')!=null)
		arr2[i].setAttribute('fill',arr2[i].getAttribute('my_orig_color'));
	}
}
function reset_color(w){
	var arr=w.getElementsByTagName('path');
	var arr2=w.getElementsByTagName('text');
	var arr3=w.getElementsByTagName('rect');
	var arr4=w.getElementsByTagName('circle');
	for (var i=0;i<arr.length;i++){
		if (arr[i].getAttribute('my_orig_color')!=null)
		arr[i].setAttribute('fill',arr[i].getAttribute('my_orig_color'));
	}
	for (var i=0;i<arr2.length;i++){
		if (arr2[i].getAttribute('my_orig_color')!=null)
		arr2[i].setAttribute('fill',arr2[i].getAttribute('my_orig_color'));
	}
	for (var i=0;i<arr3.length;i++){
		if (arr3[i].getAttribute('my_orig_color')!=null)
		arr3[i].setAttribute('fill',arr3[i].getAttribute('my_orig_color'));
	}
	for (var i=0;i<arr4.length;i++){
		if (arr4[i].getAttribute('my_orig_color')!=null)
		arr4[i].setAttribute('stroke',arr4[i].getAttribute('my_orig_color'));
	}
}
function change_child_color(w,cl){
	var arr=w.getElementsByTagName('path');
	var arr2=w.getElementsByTagName('text');
	for (var i=0;i<arr.length;i++){
		arr[i].setAttribute('fill',cl);
	}
	for (var i=0;i<arr2.length;i++){
		arr2[i].setAttribute('fill',cl);
	}
}
function logout(){
	$.get('{$GLOBALS['PHP_SELF_INSTANCE']}&act=logout',function(result){
		window.location.href='{$_SERVER['PHP_SELF']}';
	});
}
function ge_cr(arg){
	var cr=document.createElement('div');
	cr.setAttribute('style','position:fixed;left:0px;top:0px;width:100%;height:100%;z-index:9;');
	cr.setAttribute('class','create');
	var inner='<div style="position:absolute;top:0px;left:0px;width:100%;height:100%;background-color:#000000;opacity:0.5;">&nbsp;</div>\
	<div id="create" style="opacity:1;position:absolute;top:50%;left:50%;width:500px;height:400px;padding:20px;margin-left:-270px;margin-top:-220px;background-color:#FFF2A0;border-radius:5px;">\
	<a href="javascript:close_cr(\''+arg+'\')" class="closing" style="font-size:24px;position:absolute;right:20px;top:10px;" title="{$GLOBALS["TR"]["Close"][$GLOBALS["LANG"]]}">x</a>';
	if (arg=='db'){
	inner=inner+'<div><h3 style="text-align:center;">{$GLOBALS["TR"]["Create_db"][$GLOBALS["LANG"]]}</h3></div>\
	<br><br>\
	<div style="padding-left:50px">Insert database name:<br><br>\
	<div style="margin-left:10px;background-color:#FFFFFF;border-radius:5px;width:250px;padding-left:5px;height:25px;"><input type="text" id="newname" style="margin-top:2px;height:19px;border:none;width:245px;"></input></div></div>';
}
if (arg=='tbl1'||arg=='tbl2'){
	inner=inner+'<div><h3 style="text-align:center;">{$GLOBALS["TR"]["Create_tbl"][$GLOBALS["LANG"]]}</h3></div>\
	<br id="crbr">\
	<div style="padding-left:50px">{$GLOBALS["TR"]["Insert_tbl_name"][$GLOBALS["LANG"]]}<br><br>\
	<div style="margin-left:10px;background-color:#FFFFFF;border-radius:5px;width:250px;padding-left:5px;height:25px;"><input type="text" id="newname" style="margin-top:2px;height:19px;border:none;width:245px;"></input></div></div>\
	<br><div style="padding-left:50px">{$GLOBALS["TR"]["Insert_first_col_name"][$GLOBALS["LANG"]]}<br><br>\
	<div style="margin-left:10px;background-color:#FFFFFF;border-radius:5px;width:250px;padding-left:5px;height:25px;"><input type="text" id="newcolname" style="margin-top:2px;height:19px;border:none;width:245px;"></input></div></div>\
	<br><div style="padding-left:50px">{$GLOBALS["TR"]["Choose_first_col_data_type"][$GLOBALS["LANG"]]}<br><br>\
	<select onchange="newdatashow(this)" style="border-radius:5px;color:#FFFFFF;background-color:#CC8D00;font-size:14px;" id="newdatatye"><option value="int unique key auto_increment">Autoincrement</option>\
	<option value="int">int</option>\
	<option value="float">float</option>\
	<option value="text">text</option>\
	<option value="date">date</option>\
	<option value="0">{$GLOBALS["TR"]["Other"][$GLOBALS["LANG"]]}</option>\
	</select></div>\
	<br><div style="padding-left:50px;display:none;" id="newdatadiv">{$GLOBALS["TR"]["Insert_data_type"][$GLOBALS["LANG"]]}<br><br>\
	<div style="margin-left:10px;background-color:#FFFFFF;border-radius:5px;width:250px;padding-left:5px;height:25px;"><input type="text" id="newdatatype2" style="margin-top:2px;height:19px;border:none;width:245px;"></input></div>\
	</div>\
';
}
inner=inner+'<div style="height:50px;position:absolute;bottom:0px;right:10px;width:350px;">{$GLOBALS["TR"]["OK_to_save"][$GLOBALS["LANG"]]}<button type="button" style="cursor:pointer;position:relative;top:-5px;float:right;margin-right:25px;color:#FFFFFF;background-color:#CC8D00;width:75px;font-size:18px;" onclick="send_cr(\''+arg+'\')">{$GLOBALS["TR"]["OK"][$GLOBALS["LANG"]]}</button></div>\
</div>';
cr.innerHTML=inner;
if (document.getElementsByClassName('create').length==0)
	document.getElementsByTagName('body')[0].appendChild(cr);
}
function close_cr(arg){
	var arr=document.getElementsByClassName('create');
	if (arr.length>0) arr[0].parentNode.removeChild(arr[0]);
	if (arg=='db'){
		document.getElementById('logindiv').createPreloader();
		$.post('{$GLOBALS['PHP_SELF_INSTANCE']}&act=dbselectcreate&ajax=true',{CSRF:(typeof MY_CSRF!='undefined')?MY_CSRF:''},function(result){
			document.getElementById('logindiv').removePreloader();
			var ree=JSON.parse(result);
			if (ree['stat']=='con_err') gen_error(ree['con_err']);
		if (ree['stat']=='fail') gen_error(ree['error']);
		if(ree['stat']=='success') $('#logindiv').html(ree['all']);
		});
	}
	if (arg=='tbl1'){
		document.getElementById('logindiv').createPreloader();
		$.post('{$GLOBALS['PHP_SELF_INSTANCE']}&act=tblselectcreate&ajax=true',{CSRF:(typeof MY_CSRF !='undefined')?MY_CSRF:''},function(result){
			document.getElementById('logindiv').removePreloader();
			var ree=JSON.parse(result);
			if (ree['stat']=='con_err') gen_error(ree['con_err']);
		if (ree['stat']=='fail') gen_error(ree['error']);
		if(ree['stat']=='success') $('#logindiv').html(ree['all']);
		});
	}
	if (arg=='tbl2'){
		refreshTableScrollbar();
	}
}
function send_cr(arg){
	if (arg=='db'){
		document.getElementById('create').createPreloader();
		var h=$('#newname').val();
		$.post('{$GLOBALS['PHP_SELF_INSTANCE']}&act=createdb&ajax=true',{newdb:h,CSRF:(typeof MY_CSRF !='undefined')?MY_CSRF:''},function(result){
			document.getElementById('create').removePreloader();
			var ree=JSON.parse(result);
			if (ree['stat']=='con_err') gen_error(ree['con_err']);
			else if (ree['stat']=='fail') gen_error(ree['error']);
			else if (ree['stat']=='success') gen_info('{$GLOBALS["TR"]["Database"][$GLOBALS["LANG"]]} '+htmlspecialchars(h)+' {$GLOBALS["TR"]["Dhas_been_created"][$GLOBALS["LANG"]]}.');
		});
	}
	if (arg=='tbl1'||arg=='tbl2'){
		document.getElementById('create').createPreloader();
		var h=$('#newname').val();
		var coln=$('#newcolname').val();
		var dt=$('#newdatatye').val();
		if (dt==0||dt=='0'||dt=='') dt=$('#newdatatype2').val();
		$.post('{$GLOBALS['PHP_SELF_INSTANCE']}&act=createtbl&ajax=true',{newname:h,newcolname:coln,newdatatype:dt,CSRF:(typeof MY_CSRF !='undefined')?MY_CSRF:''},function(result){
			document.getElementById('create').removePreloader();
			var ree=JSON.parse(result);
			if (ree['stat']=='con_err') gen_error(ree['con_err']);
			else if (ree['stat']=='fail') gen_error(ree['error']);
			else if (ree['stat']=='success') gen_info('{$GLOBALS["TR"]["Table"][$GLOBALS["LANG"]]} '+htmlspecialchars(h)+' {$GLOBALS["TR"]["Thas_been_created"][$GLOBALS["LANG"]]}.');
		});
		$('#newcolname').val('');
		$('#newdatatype').val('int unique key auto_increment');
		$('#newdatatype2').val('');
	}
	$('#newname').val('');
}
function gen_info(text,closem){
	closem=closem||0;
		conerdiv=document.createElement('div');
		conerdiv.style.position="fixed";
		conerdiv.style.top="0px";
		conerdiv.style.left="0px"
		conerdiv.style.width="100%";
		conerdiv.style.height="100%";
		conerdiv.style.zIndex="10";
		conerdiv.setAttribute('class','infodiv');
		conerdiv.innerHTML='\
		<div style="position:absolute;top:0px;left:0px;width:100%;height:100%;background-color:#000000;opacity:0.5;">&nbsp;</div>\
		<div style="opacity:1;position:absolute;top:50%;left:50%;width:350px;height:200px;padding:20px;margin-left:-195px;margin-top:-120px;background-color:#FFF2A0;border-radius:5px;">\
		<div style="height:30px;">\
		<svg style="width:30px;height:30px;" viewBox="0 0 110 110">\
		<circle cx="55" cy="55" r="45" fill="#0000FF"/>\
		<circle cx="55" cy="30" r="7" fill="#FFFFFF"/>\
		<path d="M 50,47 L 60,47 L 60,90 L 50,90 Z" fill="#FFFFFF"/>\
		</svg>&nbsp;&nbsp;&nbsp;<span style="color:blue;font-weight:bold;position:relative;top:-10px">{$GLOBALS["TR"]["INFO"][$GLOBALS["LANG"]]}</span>\
		</div><br>\
		<div style="overflow:auto;height:130px">'+text+'</div>\
		<div style="height:50px;">{$GLOBALS["TR"]["OK_to_close"][$GLOBALS["LANG"]]}<button type="button" style="cursor:pointer;position:relative;top:-5px;float:right;margin-right:25px;color:#FFFFFF;background-color:#CC8D00;width:75px;font-size:18px;" onclick="close_info('+closem+')">{$GLOBALS["TR"]["OK"][$GLOBALS["LANG"]]}</button></div>\
		</div>';
		if (document.getElementsByTagName('body')[0].getElementsByClassName('infodiv').length==0){
			document.getElementsByTagName('body')[0].appendChild(conerdiv);
		}
}
function close_info(closem){
	if (closem==0){
		var arr=document.getElementsByTagName('body')[0].getElementsByClassName('infodiv');
		if (arr.length!=0){
			document.getElementsByTagName('body')[0].removeChild(arr[0]);
}}
else window.location.href='{$GLOBALS['PHP_SELF_INSTANCE']}';
}
function selectDb(){
	var db=$('#select_db').val();
	document.getElementById('logindiv').createPreloader();
	$.post('{$GLOBALS['PHP_SELF_INSTANCE']}&act=selectdb&ajax=true',{db:db,CSRF:(typeof MY_CSRF !='undefined')?MY_CSRF:''},function(result){
		document.getElementById('logindiv').removePreloader();
		var ree=JSON.parse(result);
		if (ree['stat']=='con_err') gen_error(ree['con_err']);
		if (ree['stat']=='fail') gen_error(ree['error']);
		if (ree['stat']=='success'){
			$('#logindiv').html(ree['all']);
		}
	});
}
function dropdb(){
	var x;
	$.post('{$GLOBALS['PHP_SELF_INSTANCE']}&act=showactdb&ajax=true',{CSRF:(typeof MY_CSRF !='undefined')?MY_CSRF:''},function(result){
		var ree=JSON.parse(result);
		if (ree['stat']=='con_err') gen_error(ree['con_err']);
		if (ree['stat']=='success'){x=ree['db'];
		gen_prompt('dropdb2()','{$GLOBALS["TR"]["Really_delete_db"][$GLOBALS["LANG"]]} '+htmlspecialchars(x)+' ?');
		}
	});

}
function gen_prompt(fun,text){
	var conerdiv=document.createElement('div');
		conerdiv.style.position="fixed";
		conerdiv.style.top="0px";
		conerdiv.style.left="0px"
		conerdiv.style.width="100%";
		conerdiv.style.height="100%";
		conerdiv.style.zIndex="8";
		conerdiv.setAttribute('class','promptdiv');
		conerdiv.innerHTML='\
		<div style="position:absolute;top:0px;left:0px;width:100%;height:100%;background-color:#000000;opacity:0.5;">&nbsp;</div>\
		<div style="opacity:1;position:absolute;top:50%;left:50%;width:300px;height:200px;padding:20px;margin-left:-170px;margin-top:-120px;background-color:#FFF2A0;border-radius:5px;" class="promptdivcont">\
		<div style="height:30px;">\
		<svg style="width:30px;height:30px;" viewBox="0 0 110 110">\
		<circle cx="55" cy="55" r="45" fill="#FFB800"/>\
		<text x="30" y="90" fill="#FFFFFF" style="font-size:100px;">?</text>\
		</svg>&nbsp;&nbsp;&nbsp;<span style="color:#FFB800;font-weight:bold;position:relative;top:-10px">{$GLOBALS["TR"]["CONFIRM"][$GLOBALS["LANG"]]}</span>\
		</div><br>\
		<div style="overflow:auto;height:130px">'+text+'</div>\
		<div style="height:50px;"><button type="button" style="cursor:pointer;position:relative;top:-5px;left:40px;color:#FFFFFF;background-color:#CC8D00;width:75px;font-size:18px;" onclick="'+fun+'">{$GLOBALS["TR"]["YES"][$GLOBALS["LANG"]]}</button><button type="button" style="cursor:pointer;position:relative;top:-5px;left:103px;color:#FFFFFF;background-color:#CC8D00;width:75px;font-size:18px;" onclick="close_prompt()">{$GLOBALS["TR"]["NO"][$GLOBALS["LANG"]]}</button></div>\
		</div>';
		if (document.getElementsByTagName('body')[0].getElementsByClassName('promptdiv').length==0){
			document.getElementsByTagName('body')[0].appendChild(conerdiv);
		}
}
function close_prompt(){
		var arr=document.getElementsByTagName('body')[0].getElementsByClassName('promptdiv');
		if (arr.length!=0){
		document.getElementsByTagName('body')[0].removeChild(arr[0]);}
}
function dropdb2(){
	var pr=document.getElementsByClassName('promptdivcont')[0];
	if (typeof pr !='undefined'&&pr!=null){
		pr.createPreloader();
	}
	$.post('{$GLOBALS['PHP_SELF_INSTANCE']}&act=dropdb',{check:'DA',CSRF:(typeof MY_CSRF !='undefined')?MY_CSRF:''},function(result){
	var ree=JSON.parse(result);
	pr.removePreloader();
	close_prompt();
		if (ree['stat']=='con_err') gen_error(ree['con_err']);
		if (ree['stat']=='fail') gen_error(ree['error']);
		if (ree['stat']=='success') gen_info('{$GLOBALS["TR"]["Database"][$GLOBALS["LANG"]]} '+ree['db']+' {$GLOBALS["TR"]["Dhas_been_deleted"][$GLOBALS["LANG"]]}.',1);
	});
}
function newdatashow(x){
	var v=x.value;
	if (v==0||v=='0'||v==''){
		$('#crbr').hide();
		$('#newdatadiv').slideDown();
	}
	else {
	$('#newdatadiv').slideUp();
	$('#crbr').show();
	$('#newdatatype2').val('');
	}
}
function logoutdb(){
	$.post('{$GLOBALS['PHP_SELF_INSTANCE']}&act=logoutdb',{CSRF:(typeof MY_CSRF !='undefined')?MY_CSRF:''},function(result){
		window.location.href='{$GLOBALS['PHP_SELF_INSTANCE']}';
	})
}
function selectTbl(){
	var t=$('#select_tbl').val();
	document.getElementById('logindiv').createPreloader();
	$.post('{$GLOBALS['PHP_SELF_INSTANCE']}&act=selecttbl&ajax=true',{tbl:t,CSRF:(typeof MY_CSRF !='undefined')?MY_CSRF:''},function(result){

		var ree=JSON.parse(result);
		if (ree['stat']=='con_err'){
		document.getElementById('logindiv').removePreloader();
		gen_error(ree['con_err']);
		}
		if (ree['stat']=='fail'){ gen_error(ree['error']);
		document.getElementById('logindiv').removePreloader();
		}
		if (ree['stat']=='success'){
			window.location.href="{$GLOBALS['PHP_SELF_INSTANCE']}";
		}
	});
}
function refreshTableScrollbar(){
	document.getElementById('db_and_table').createPreloader();
	active++;
	$.post('{$GLOBALS['PHP_SELF_INSTANCE']}&act=refrtblscroll&ajax=true',{CSRF:(typeof MY_CSRF !='undefined')?MY_CSRF:''},function(result){
		active--;
		document.getElementById('db_and_table').removePreloader();
		var ree=JSON.parse(result);
		if (ree['stat']=='con_err'){
		gen_error(ree['con_err']);
		}
		if (ree['stat']=='fail')gen_error(ree['error']);
		if (ree['stat']=='success'){
			$('#table_sel').html('{$GLOBALS["TR"]["Tbl_is"][$GLOBALS["LANG"]]}\
			'+ree['all']);
		}
	});
}
function droptbl(){
	gen_prompt('droptbl2()','{$GLOBALS["TR"]["Really_delete_tbl"][$GLOBALS["LANG"]]} '+htmlspecialchars($('#tabel_select').val())+' ?');
}
function droptbl2(){
	var pr=document.getElementsByClassName('promptdivcont')[0];
	if (typeof pr !='undefined'&&pr!=null){
		pr.createPreloader();
	}
	$.post('{$GLOBALS['PHP_SELF_INSTANCE']}&act=droptbl&ajax=true',{confirm:'da',CSRF:(typeof MY_CSRF !='undefined')?MY_CSRF:''},function(result){
		pr.removePreloader();
		close_prompt();
		var ree=JSON.parse(result);
		if (ree['stat']=='con_err') gen_error(ree['con_err']);
		if (ree['stat']=='fail') gen_error(ree['error']);
		if (ree['stat']=='success'){
			gen_info('{$GLOBALS["TR"]["Table"][$GLOBALS["LANG"]]} '+ree['tbl']+' {$GLOBALS["TR"]["Thas_been_deleted"][$GLOBALS["LANG"]]}.',1);
		}
	});
}
function setCookie(cname, cvalue, exdays) {
    var d = new Date();
    d.setTime(d.getTime() + (exdays*24*60*60*1000));
    var expires = "expires="+d.toUTCString();
    document.cookie = cname + "=" + cvalue + "; " + expires+' ; path=/';
}
function getCookie(cname) {
    var name = cname + "=";
    var ca = document.cookie.split(';');
    for(var i=0; i<ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0)==' ') c = c.substring(1);
        if (c.indexOf(name) == 0) return c.substring(name.length,c.length);
    }
    return "";
}
function enc_change(){
	var newEnc=$('#enc_select').val();
	wait(function(){
		document.getElementsByTagName('body')[0].createPreloader();
		active++;
	$.post('{$GLOBALS['PHP_SELF_INSTANCE']}&act=enc_change&ajax=true',{newEnc:newEnc,CSRF:(typeof MY_CSRF !='undefined')?MY_CSRF:''},function(result){
		active--;
		document.getElementsByTagName('body')[0].removePreloader();
		var ree=JSON.parse(result);
		if (ree['stat']=='con_err') gen_error(ree['con_err']);
		if (ree['stat']=='fail') gen_error(ree['error']);
		if (ree['stat']=='success'){
		window.location.href="{$GLOBALS['PHP_SELF_INSTANCE']}";
		}
	});
	});
}
function lang_change(){
	var newLang=$('#lang_select').val();
	wait(function(){
	setCookie('mylanguage',newLang,30);
	window.location.href="
EOT;
if (isset($GLOBALS['PHP_SELF_INSTANCE'])) echo $GLOBALS['PHP_SELF_INSTANCE'];
else echo $_SERVER['PHP_SELF'];
echo<<<EOT
";});
}
function switchEncDiv(){
	var encDiv=$('#up_encoding');
	if (encDiv.attr('my_state')=='open') {
		encDiv.attr('my_state','close');
		encDiv.animate({
		top:-40
		},500);
	$.post('{$GLOBALS['PHP_SELF_INSTANCE']}&act=enc_switch&ajax=true',{newState:'close',CSRF:(typeof MY_CSRF !='undefined')?MY_CSRF:''},function(result){
		var ree=JSON.parse(result);
		if (ree['stat']=='con_err') gen_error(ree['con_err']);
		if (ree['stat']=='fail') gen_error(ree['error']);
	});
	}
	else if (encDiv.attr('my_state')=='close') {
		encDiv.attr('my_state','open');
		encDiv.animate({
		top:-10
		},500);
	$.post('{$GLOBALS['PHP_SELF_INSTANCE']}&act=enc_switch&ajax=true',{newState:'open',CSRF:(typeof MY_CSRF !='undefined')?MY_CSRF:''},function(result){
		var ree=JSON.parse(result);
		if (ree['stat']=='con_err') gen_error(ree['con_err']);
		if (ree['stat']=='fail') gen_error(ree['error']);
	});
	}
}
//BACKUP
function create_backup(){
	var cr=document.createElement('div');
	cr.setAttribute('style','position:fixed;left:0px;top:0px;width:100%;height:100%;z-index:7;');
	cr.setAttribute('class','backupDiv');
	var inner='<div style="position:absolute;top:0px;left:0px;width:100%;height:100%;background-color:#000000;opacity:0.5;">&nbsp;</div>\
	<div id="backupDivInter" style="opacity:1;position:absolute;top:50%;left:50%;width:500px;height:400px;padding:20px;margin-left:-270px;margin-top:-220px;background-color:#FFF2A0;border-radius:5px;">\
	<form method="post" action="{$GLOBALS['PHP_SELF_INSTANCE']}&act=backup">\
	<a href="javascript:closeBackupDiv()" class="closing" style="font-size:24px;position:absolute;right:20px;top:10px;" title="{$GLOBALS["TR"]["Close"][$GLOBALS["LANG"]]}">x</a>\
	<div><h3 style="text-align:center;">{$GLOBALS["TR"]["Backup_db_tbl"][$GLOBALS["LANG"]]}</h3></div>\
	<br id="crbr">\
	<br><div style="padding-left:50px"><input type="radio" style="cursor:pointer;" name="backupWholeDb" value="yes" id="backupWholeDb1" checked="true" onchange="backupGetTables()">{$GLOBALS["TR"]["Whole_db"][$GLOBALS["LANG"]]}</input><br><br>\
	<input type="radio" style="cursor:pointer;" name="backupWholeDb" id="backupWholeDb0" value="no" onchange="backupGetTables()">{$GLOBALS["TR"]["Only_tables"][$GLOBALS["LANG"]]}</input><br><br>\
	<table style="display:none;" id="backupTableSelectTable"><tr><td style="vertical-align:text-top;padding-right:10px;text-align:center;"><span style="font-weight:bold">{$GLOBALS["TR"]["Select_tables"][$GLOBALS["LANG"]]}<br><br>\
	<button type="button" class="butTables" onclick="allTables()" style="margin-bottom:10px;margin-top:4px;">{$GLOBALS["TR"]["All_tables"][$GLOBALS["LANG"]]}</button><br>\
	<button type="button" class="butTables" onclick="noTable()">{$GLOBALS["TR"]["No_table"][$GLOBALS["LANG"]]}</button>\
	</span></td><td><span id="selectTables"></span></td></tr></table>\
	</div>\
	<div style="height:50px;position:absolute;bottom:0px;right:10px;">{$GLOBALS["TR"]["OK_to_backup"][$GLOBALS["LANG"]]}&nbsp;&nbsp;&nbsp;<input type="submit" style="cursor:pointer;position:relative;top:-5px;float:right;margin-right:25px;color:#FFFFFF;background-color:#CC8D00;width:75px;font-size:18px;" value="{$GLOBALS["TR"]["OK"][$GLOBALS["LANG"]]}"/></div>\
	<input type="hidden" name="CSRF" value="{$_SESSION['CSRFdb']}"/>\
	</form>\
</div>';
cr.innerHTML=inner;
if (document.getElementsByClassName('create').length==0)
	document.getElementsByTagName('body')[0].appendChild(cr);
}
function closeBackupDiv(){
		var arr=document.getElementsByClassName('backupDiv');
	if (arr.length>0) arr[0].parentNode.removeChild(arr[0]);
}
function backupGetTables(){
		if ($('#backupWholeDb0').get(0).checked){
			$('#backupDivInter').get(0).createPreloader();
			active++;
			$.post('{$GLOBALS['PHP_SELF_INSTANCE']}&act=tables_list',{CSRF:(typeof MY_CSRF !='undefined')?MY_CSRF:''},function(result){
			active--;
			$('#backupDivInter').get(0).removePreloader();
			var ree=JSON.parse(result);
			if (ree['stat']=='con_err') gen_error(ree['con_err']);
			if (ree['stat']=='fail') {gen_error(ree['error']);
			$('#backupWholeDb0').get(0).checked=false;
			$('#backupWholeDb1').get(0).checked=true;
			}
			if (ree['stat']=='success'){
			var sel=ree['cnt'];
			var inn='<input type="hidden" name="selTabNumber" value="'+sel.length+'"/>';
			for (var i=0;i<sel.length;i++){
				inn+='<div><input class="selTable chkbox" type="checkbox" checked="true" id="selTab'+i+'" name="selTab'+i+'" value="'+sel[i]+'"></input>&nbsp;&nbsp;'+sel[i]+'</div>'
			}
			$('#selectTables').html(inn);
			$('#backupTableSelectTable').show();
		}
		});


	}
	else {
		$('#backupTableSelectTable').hide();
	}
}
function allTables(){
	$('.selTable').each(function(){
		$(this).get(0).checked=true;
	});
}
function noTable(){
	$('.selTable').each(function(){
		$(this).get(0).checked=false;
	});
}
//*BACKUP
//IMPORT
function create_upload(){
	var cr=document.createElement('div');
	cr.setAttribute('style','position:fixed;left:0px;top:0px;width:100%;height:100%;z-index:7;');
	cr.setAttribute('class','uploadDiv');
	var inner='<div style="position:absolute;top:0px;left:0px;width:100%;height:100%;background-color:#000000;opacity:0.5;">&nbsp;</div>\
	<div id="uploadDivInter" style="opacity:1;position:absolute;top:50%;left:50%;width:500px;height:400px;padding:20px;margin-left:-270px;margin-top:-220px;background-color:#FFF2A0;border-radius:5px;">\
	<form method="post" action="{$GLOBALS['PHP_SELF_INSTANCE']}&act=import" enctype="multipart/form-data">\
	<a href="javascript:closeUploadDiv()" class="closing" style="font-size:24px;position:absolute;right:20px;top:10px;" title="{$GLOBALS["TR"]["Close"][$GLOBALS["LANG"]]}">x</a>\
	<div><h3 style="text-align:center;">{$GLOBALS["TR"]["Import_sql"][$GLOBALS["LANG"]]}</h3></div>\
	<br id="crbr">\
	<br><div style="padding-left:50px" id="upload_dbName"></div><br><br>\
	<div style="padding-left:50px">\
	<input type="hidden" name="is_upload" value="yes"/>\
	<input type="file" name="import_file" id="import_file" accept=".sql"/>\
	</div>\
	<div style="height:50px;position:absolute;bottom:0px;right:10px;">{$GLOBALS["TR"]["OK_to_import"][$GLOBALS["LANG"]]}&nbsp;&nbsp;&nbsp;<input type="submit" style="cursor:pointer;position:relative;top:-5px;float:right;margin-right:25px;color:#FFFFFF;background-color:#CC8D00;width:75px;font-size:18px;" value="{$GLOBALS["TR"]["OK"][$GLOBALS["LANG"]]}"/></div>\
	<input type="hidden" name="CSRF" value="{$_SESSION['CSRFdb']}"/>\
	</form>\
</div>';
cr.innerHTML=inner;
if (document.getElementsByClassName('create').length==0)
	document.getElementsByTagName('body')[0].appendChild(cr);
$('#uploadDivInter').get(0).createPreloader();
			active++;
			$.post('{$GLOBALS['PHP_SELF_INSTANCE']}&act=showactdb',{CSRF:(typeof MY_CSRF !='undefined')?MY_CSRF:''},function(result){
			active--;
			$('#uploadDivInter').get(0).removePreloader();
			var ree=JSON.parse(result);
			if (ree['stat']=='con_err') {
			$('#upload_dbName').html('{$GLOBALS["TR"]["Import_no_db_selected"][$GLOBALS["LANG"]]}');
			}
			if (ree['stat']=='success'){
			$('#upload_dbName').html('{$GLOBALS["TR"]["Import_default_db"][$GLOBALS["LANG"]]} <span style="font-weight:bold">'+ree['db']+'</span>');
			}
			});
}
function closeUploadDiv(){
		var arr=document.getElementsByClassName('uploadDiv');
	if (arr.length>0) arr[0].parentNode.removeChild(arr[0]);
}
//*IMPORT
</script>
EOT;
}
function create_database_select($conn){
	$res='<br>';
	if (isset($_SESSION['CSRFdb'])) $res.="<script> MY_CSRF='".$_SESSION['CSRFdb']."';</script>";
	$res.= '<span style="font-weight:bold;font-size:20px;padding-left:30px;" title="'.$GLOBALS["TR"]["Choose_db"][$GLOBALS["LANG"]].'">'.$GLOBALS["TR"]["Choose_db"][$GLOBALS["LANG"]].' </span><br><br><br>';
	if (isset($GLOBALS['DEFAULTDBS'])){
		if (count($GLOBALS['DEFAULTDBS']['databases'])>0){
		$res.= '<select class="sldb" id="select_db" style="margin-left:25px;">';
			foreach ($GLOBALS['DEFAULTDBS']['databases'] as $dbss){
			$res.= '<option value="'.htmlspecialchars($dbss).'">'.htmlspecialchars($dbss).'</option>';
			}
			$res.= '</select>';
	$res.='<button class="but" style="font-size:16px;width:50px;height:25px;position:relative;left:10px;" onclick="selectDb()">'.$GLOBALS["TR"]["Choose"][$GLOBALS["LANG"]].'</button>';
		}
		else $res.=$GLOBALS["TR"]["No_dbLarge"][$GLOBALS["LANG"]];
	}
	else{
	$sql="SHOW databases";
	if($result=mysqli_query($conn,$sql)){
		if (mysqli_num_rows($result)>0){
			$res.= '<select class="sldb" id="select_db" style="margin-left:25px;">';
	while ($row=mysqli_fetch_assoc($result)){
		$res.= '<option value="'.htmlspecialchars($row['Database']).'">'.htmlspecialchars($row['Database']).'</option>';
	}
	$res.= '</select>';
	$res.='<button class="but" style="font-size:16px;width:50px;height:25px;position:relative;left:10px;" onclick="selectDb()">'.$GLOBALS["TR"]["Choose"][$GLOBALS["LANG"]].'</button>';
	}
	else $res.=$GLOBALS["TR"]["No_dbLarge"][$GLOBALS["LANG"]];
	}
	else
	$res.='<script>gen_error("login")</script>';}
if (isset($GLOBALS['DEFAULTDBS'])) $res.='<div style="margin-top:30px;margin-left:20px;">';
else
$res.='<div style="margin-top:30px;margin-left:20px;"><span title="'.$GLOBALS["TR"]["Create_db"][$GLOBALS["LANG"]].'">'.create_plus_button("ge_cr('db')",'width:40px;height:40px;').'</span>'.str_repeat('&nbsp;',3);
$res.='<span title="'.$GLOBALS["TR"]["Import_db"][$GLOBALS["LANG"]].'">'.create_upload_logo('create_upload()','width:40px;height:40px;cursor:pointer;').'</span>';
	$res.='<div style="margin-top:10px;">'.create_pquery_button().str_repeat('&nbsp;',3).'<span title="Log out">'.create_logout_button(FALSE,'width:40px;height:40px;position:relative;top:10px;cursor:pointer;','logout()').'</span></div></div>';

	return $res;
}
function select_database($conn){
	if (!isset($_SESSION['instancedb'][$_GET['instance']]['actdb'])||$conn===FALSE) return FALSE;
	if (mysqli_select_db($conn,$_SESSION['instancedb'][$_GET['instance']]['actdb'])) return TRUE;
	else {
		logout_db();
		return FALSE;
	}
}
function create_pquery_button($style='width:50px;height:25px;'){
	$res='<button type="button" onclick="gen_pquery()" style="border-radius:5px;background-color:#FFFFFF;border:solid 1px #0F00CC;cursor:pointer;" title="'.$GLOBALS["TR"]["Create_pquery"][$GLOBALS["LANG"]].'">
	<svg viewBox="0 0 1000 500" style="'.$style.'">
	<text x="0" y="400" fill="black" style="font-size:320px;" class="brush_mt">SQL</text>
	<path d="M 677.78,351.26 L 827.78,45.47 L 914.59,88.05 L 764.59,393.84 Z" fill="#FFD753"/>
	<path d="M 677.78,351.26 L 764.59,393.84 L 709.09,440.48 L 674.86,423.68 Z" fill="#FFEDB8"/>
	<path d="M 709.09,440.48 L 674.86,423.68 L 672.96,470.84 Z" fill="#000000"/>
	<path d="M 672.96,470.84 L 0,470.84 L 0,490.84 L 672.96,490.84 Z" fill="#000000"/>
	</svg>
	</button>';
	return $res;
}
function create_plus_button($function,$style){
	$res='
	<svg viewBox="0 0 100 100" style="'.$style.'">
	<path onclick="'.$function.'" style="cursor:pointer;" d="M 59.08,93.83 L 59.08,59.08 L 93.83,59.08 L 93.83,40.92 L 59.08,40.92 L 59.08,6.17 L 40.92,6.17 L 40.92,40.92 L 6.17,40.92 L 6.17,59.08 L 40.92,59.08 L 40.92,93.83 Z" fill="#00FF00" stroke="#FFFFFF" stroke-width="2" onmouseover="color_change(this,\'#51F751\')" onmouseout="color_change(this,\'#00FF00\')"/>
	</svg>
	';
	return $res;
}
function create_plus_row_button($function){
	$res='
	<svg viewBox="0 0 120 90" onclick="'.$function.'" style="cursor:pointer;height:45px;width:60px;"onmouseover="change_color2(this)" onmouseout="reset_color(this)">
	<rect x="10" y="29" width="90" height="10"  fill="#AA9800" my_orig_color="#AA9800" my_change_color="#E8CE00"/>
	<rect x="10" y="10" width="90" height="63" rx="5" ry="5" fill="transparent" stroke="#8288FF" stroke-width="8" "/>
	<rect x="24" y="10" width="7" height="63"  fill="#8288FF" />
	<rect x="42" y="10" width="7" height="63"  fill="#8288FF" />
	<rect x="60" y="10" width="7" height="63"  fill="#8288FF" />
	<rect x="78" y="10" width="7" height="63"  fill="#8288FF" />
	<rect x="10" y="22" width="90" height="7"  fill="#8288FF" />
	<rect x="10" y="38" width="90" height="7"  fill="#8288FF" />
	<rect x="10" y="54" width="90" height="7"  fill="#8288FF" />
	<circle cx="93" cy="66" r="19" stroke="#AA2900" stroke-width="7" fill="transparent" my_orig_color="#AA2900" my_change_color="#EB3800"/>
	<rect x="81" y="63" width="25" height="8" fill="#AA2900" my_orig_color="#AA2900" my_change_color="#EB3800"/>
	<rect x="89.5" y="54" width="8" height="25" fill="#AA2900" my_orig_color="#AA2900" my_change_color="#EB3800"/>
	</svg>
	';
	return $res;
}
function create_logout_button($db,$style,$function){
	if (!$db){
	$res='
	<svg viewBox="0 0 100 100" style="'.$style.'" onclick="'.$function.'" onmouseover="change_child_color(this,\'#51F751\')" onmouseout="change_child_color(this,\'#00FF00\')">
	<path  d="M 24.77,89.62 L 24.77,10.38 L 62.61,10.38 L 62.61,18.24 L 33.5,18.24 L 33.5,81.76 L 62.61,81.76 L 62.61,89.62 Z" fill="#00FF00" stroke="#FFFFFF" stroke-width="2"/>
	<path  d="M 45,57.64 L 45, 42.36 L 72.7,42.36 L 72.7,31.25 L 97.91,50 L 72.7,68.75 L 72.7,57.64 Z" fill="#00FF00" stroke="#FFFFFF" stroke-width="2"/>
	</svg>
	';}
	else {
	$res='<svg viewBox="0 0 100 100" style="'.$style.'" onclick="'.$function.'" onmouseover="change_child_color(this,\'#FF6261\')" onmouseout="change_child_color(this,\'#FF4F00\')">
	<path d="M 10.05,63.56 A 42.19,42.19 0 0 0 90.35,62.32 L 81.87,62.32 A 34.17,34.17 0 0 1 18.64,63.56 Z" fill="#FF4F00" stroke="#FFFFFF" stroke-width="2"/>
	<path d="M 96.28,63.57 L 73.72,63.57 L 85,45 Z" fill="#FF4F00" stroke="#FFFFFF" stroke-width="2" />
	<path d="M 89.95,36.44 A 42.19,42.19 0 0 0 9.65,37.68 L 18.13,37.68 A 34.17,34.17 0 0 1 81.36,36.44 Z" fill="#FF4F00" stroke="#FFFFFF" stroke-width="2"/>
	<path d="M 3.72, 36.43 L 26.28,36.43 L 15,55 Z" fill="#FF4F00" stroke="#FFFFFF" stroke-width="2"/>
	<text x="23" y="63" fill="#FF4F00" style="font-size:34px;font-weight:bold;" stroke="#FFFFFF" stroke-width="1">DB</text>
	';
	}
	return $res;
}
function prepare($arg){
		return addslashes($arg);
}
function logout(){
	unset($_SESSION['userdb'],$_SESSION['pwddb'],$_SESSION['instancedb'][$_GET['instance']],$_SESSION['CSRFdb']);
}
function logout_db(){
	unset($_SESSION['instancedb'][$_GET['instance']]['actdb'],$_SESSION['instancedb'][$_GET['instance']]['acttab'],$_SESSION['instancedb'][$_GET['instance']]['myorder']);
}
function logout_tbl(){
	unset($_SESSION['instancedb'][$_GET['instance']]['acttab'],$_SESSION['instancedb'][$_GET['instance']]['myorder']);
}
function check_table_exist($conn){

	if (!select_database($conn)||!$conn||!isset($_SESSION['instancedb'][$_GET['instance']]['acttab'])) return FALSE;
	$SQL='SHOW TABLES';
	$result=mysqli_query($conn,$SQL);
	if (!$result){ logout_tbl();
	return FALSE;
	}
	$ok=FALSE;
	 while ($row=mysqli_fetch_row($result)){
	 if ($row[0]==$_SESSION['instancedb'][$_GET['instance']]['acttab']) $ok=TRUE;}
	if ($ok===FALSE) logout_tbl();
		return $ok;
}
function create_table_select($conn){
		$res='<br>';
		if (isset($_SESSION['CSRFdb'])) $res.="<script> MY_CSRF='".$_SESSION['CSRFdb']."';</script>";
	$res.= '<span style="font-weight:bold;font-size:20px;padding-left:30px;">'.$GLOBALS["TR"]["Choose_tbl"][$GLOBALS["LANG"]].'</span><br><br>
	<span style="font-weight:bold;font-size:16px;padding-left:30px;" title="'.htmlspecialchars($_SESSION['instancedb'][$_GET['instance']]['actdb']).'">'.$GLOBALS["TR"]["Database:"][$GLOBALS["LANG"]].' '.htmlspecialchars($_SESSION['instancedb'][$_GET['instance']]['actdb']).'</span><br><br>';
	if(isset($GLOBALS['DEFAULTDBS'])&&isset($GLOBALS['DEFAULTDBS']['tables'][$_SESSION['instancedb'][$_GET['instance']]['actdb']])&&$GLOBALS['DEFAULTDBS']['tables'][$_SESSION['instancedb'][$_GET['instance']]['actdb']]!==NULL){
		if (count($GLOBALS['DEFAULTDBS']['tables'][$_SESSION['instancedb'][$_GET['instance']]['actdb']])>0){
			$res.= '<select class="sldb" id="select_tbl" style="margin-left:25px;">';
		foreach ($GLOBALS['DEFAULTDBS']['tables'][$_SESSION['instancedb'][$_GET['instance']]['actdb']] as $tbll){
			$res.= '<option value="'.htmlspecialchars($tbll).'">'.htmlspecialchars($tbll).'</option>';
		}
		$res.= '</select>';
		$res.='<button class="but" style="font-size:16px;width:50px;height:25px;position:relative;left:10px;" onclick="selectTbl()">'.$GLOBALS["TR"]["Choose"][$GLOBALS["LANG"]].'</button>';
		}
		else $res.=$GLOBALS["TR"]["No_tableLarge"][$GLOBALS["LANG"]];
	}
	else{
	$sql="SHOW tables";
	if($result=mysqli_query($conn,$sql)){
		if (mysqli_num_rows($result)>0){
			$res.= '<select class="sldb" id="select_tbl" style="margin-left:25px;">';
	while ($row=mysqli_fetch_row($result)){
		$res.= '<option value="'.htmlspecialchars($row[0]).'">'.htmlspecialchars($row[0]).'</option>';
	}
	$res.= '</select>';
	$res.='<button class="but" style="font-size:16px;width:50px;height:25px;position:relative;left:10px;" onclick="selectTbl()">'.$GLOBALS["TR"]["Choose"][$GLOBALS["LANG"]].'</button>';
	}
	else $res.=$GLOBALS["TR"]["No_table"][$GLOBALS["LANG"]];
	}
	else
$res.='<script>gen_error("login")</script>';}
if (isset($GLOBALS['DEFAULTDBS'])&&isset($GLOBALS['DEFAULTDBS']['tables'][$_SESSION['instancedb'][$_GET['instance']]['actdb']])&&$GLOBALS['DEFAULTDBS']['tables'][$_SESSION['instancedb'][$_GET['instance']]['actdb']]!==NULL) $res.='<div style="margin-top:30px;margin-left:20px;">';
else
$res.='<div style="margin-top:30px;margin-left:20px;"><span title="'.$GLOBALS["TR"]["Create_tbl"][$GLOBALS["LANG"]].'">'.create_plus_button("ge_cr('tbl1')",'width:40px;height:40px;').'</span>'.str_repeat('&nbsp;',3).'<span title="'.$GLOBALS["TR"]["Del_db"][$GLOBALS["LANG"]].'">'.create_x_button('dropdb()','width:40px;height:40px;').'</span>'.str_repeat('&nbsp;',3);
$res.='<span title="'.$GLOBALS["TR"]["Backup_db_tbl"][$GLOBALS["LANG"]].'">'.create_download_logo('create_backup()','width:40px;height:40px;cursor:pointer;').'</span>'.str_repeat('&nbsp;',3).'<span title="'.$GLOBALS["TR"]["Import_db_tbl"][$GLOBALS["LANG"]].'">'.create_upload_logo('create_upload()','width:40px;height:40px;cursor:pointer;').'</span>';
	$res.='<div style="margin-top:10px;">'.create_pquery_button().str_repeat('&nbsp;',3).'<span title="'.$GLOBALS["TR"]["Log_out"][$GLOBALS["LANG"]].'">'.create_logout_button(FALSE,'width:40px;height:40px;position:relative;top:10px;cursor:pointer;','logout()').'</span>'.str_repeat('&nbsp;',5).'<span title="'.$GLOBALS["TR"]["Change_db"][$GLOBALS["LANG"]].'">'.create_logout_button(TRUE,'width:40px;height:40px;position:relative;top:10px;cursor:pointer;','logoutdb()').'</span></div></div>';
	return $res;
}
function create_x_button($function,$style){
	if ($function===FALSE) $r='';
	else $r='onclick="'.$function.'"';
	$res='<svg viewBox="0 0 100 100" style="'.$style.'">
	<path d="M 83.34,93.69 L 50,60.35 L 16.66,93.69 L 6.31,83.34 L 39.65,50 L 6.31,16.66 L 16.66,6.31 L 50,39.65 L 83.34,6.31 L 93.69, 16.66 L 60.35,50 L 93.69,83.34 Z" fill="#FF0000" stroke="#FFFFFF" stroke-width="2" onmouseover="this.setAttribute(\'fill\',\'#FF2423\')" onmouseout="this.setAttribute(\'fill\',\'#FF0000\')" '.$r.' style="cursor:pointer"/>
	</svg>';
	return $res;
}
function escapenl($arg){
	$res=addcslashes ( $arg , '
	' );
	return $res;
}
function pname($str,$spc=TRUE){
	$res=$str;
	if ($spc) $res=htmlspecialchars($res);
	$res=str_replace('`','``',$res);
	$res='`'.$res.'`';
	return $res;
}
function create_table_scrollbar($conn){
	$re='<select id="tabel_select" onchange="tabelSelectChange()">';
	if(isset($GLOBALS['DEFAULTDBS'])&&isset($GLOBALS['DEFAULTDBS']['tables'][$_SESSION['instancedb'][$_GET['instance']]['actdb']])&&$GLOBALS['DEFAULTDBS']['tables'][$_SESSION['instancedb'][$_GET['instance']]['actdb']]!=NULL){
		if (count($GLOBALS['DEFAULTDBS']['tables'][$_SESSION['instancedb'][$_GET['instance']]['actdb']])>0){
		foreach ($GLOBALS['DEFAULTDBS']['tables'][$_SESSION['instancedb'][$_GET['instance']]['actdb']] as $tbll){
			$re.= '<option value="'.htmlspecialchars($tbll).'">'.htmlspecialchars($tbll).'</option>';
		}
		$re.= '</select>';
		$re.='<script> $("#tabel_select").val(\''.escapenl(prepare($_SESSION['instancedb'][$_GET['instance']]['acttab'])).'\');</script>';
		}
		else {
			$re.='<script>gen_error("tblmiss")</script>';
		}
	}
	else{
$sql='SHOW tables';
if (($result=mysqli_query($conn,$sql))===FALSE||mysqli_num_rows($result)==0){
	$re.='<script>gen_error("tblmiss")</script>';
}
else{
	while ($row=mysqli_fetch_row($result)){
		$re.='<option value="'.htmlspecialchars($row[0]).'">'.htmlspecialchars($row[0]).'</option>';
	}
	$re.='</select>';
	$re.='<script> $("#tabel_select").val(\''.escapenl(prepare($_SESSION['instancedb'][$_GET['instance']]['acttab'])).'\');</script>';
}
	}
return $re;
}
function create_order_logo($function,$style,$button){
	if ($button) $change='onclick="'.$function.'" onmouseover="change_child_color(this,\'#D8000E\')" onmouseout="change_child_color(this,\'#A1000E\')"';
	else $change='';
	$res='<svg style="'.$style.'" viewBox="0 0 100 100" '.$change.'>
	<path d="M 71.52,91.27 L 85.52,91.27 L 85.52,39.4 L 94.3, 39.4 L 78.52,7.17 L 62.74,39.4 L 71.52,39.4 Z" fill="#A1000E" stroke="#FFFFFF" stroke-width="2"/>
	<text x="20" y="40" style="font-size:40px;font-weight:bold;" fill="#A1000E" stroke="#FFFFFF" stroke-width="0.5">A</text>
	<text x="20" y="90" style="font-size:40px;font-weight:bold;" fill="#A1000E" stroke="#FFFFFF" stroke-width="0.5">Z</text>
	</svg>';
	return $res;
}
function check_column_exist($conn,$columns){
	$sql='SHOW COLUMNS FROM '.pname($_SESSION['instancedb'][$_GET['instance']]['acttab'],FALSE);
	$result=mysqli_query($conn,$sql);
	if ($result===FALSE) return FALSE;
	if (mysqli_num_rows($result)==0) return FALSE;
	$co=array();
while ($row=mysqli_fetch_row($result)){
	array_push($co,$row[0]);
}
	for ($i=0;$i<count($columns);$i++){
		$ok=FALSE;
		for($j=0;$j<count($co);$j++){
			if ($co[$j]==$columns[$i]){ $ok=TRUE;
			break;}
		}
			if (!$ok) return FALSE;
	}
	return TRUE;
}
function create_settings_logo($function,$style,$button){
	if ($button) $change='onclick="'.$function.'" onmouseover="change_child_color(this,\'#A4B9C2\')" onmouseout="change_child_color(this,\'#8899A1\')"';
	else $change='';
	$res='<svg style="'.$style.'" viewBox="0 0 100 100" '.$change.'>
	<path d="M 41.57,80.38 A 31.53,31.53 0 0 1 34.48,77.45 L 24.73,87.2 L 12.8,75.27 L 22.55,65.52 A 31.53,31.53 0 0 1 19.62,58.43 L 5.82,58.43 L 5.82,41.57 L 19.62,41.57 A 31.53,31.53 0 0 1 22.55,34.48 L 12.8,24.73 L 24.73,12.8 L 34.48,22.55 A 31.53,31.53 0 0 1 41.57,19.62 L 41.57,5.82 L 58.43,5.82 L 58.43,19.62 L 54.38,34.22 A 16.37,16.37 0 0 0 45.62,65.78 L 41.57,80.38 L 41.57,94.18 L 58.43,94.18 L 58.43,80.38 A 31.53,31.53 0 0 0 65.52,77.45 L 75.27,87.2 L 87.2,75.27 L 77.45,65.52 A 31.53,31.53 0 0 0 80.38,58.43 L 94.18,58.43 L 94.18,41.57 L 80.38,41.57 A 31.53,31.53 0 0 0 77.45,34.48 L 87.2,24.73 L 75.27,12.8 L 65.52,22.55 A 31.53,31.53 0 0 0 58.43,19.62 L 54.38,34.22 A 16.37,16.37 0 0 1 45.62,65.78 Z" fill="#8899A1"/>
	</svg>';
	return $res;
}
function create_info_logo($function,$style){
	echo '<svg onclick="'.$function.'" style="'.$style.'" viewBox="0 0 110 110">\
		<circle cx="55" cy="55" r="45" fill="#0000FF"/>\
		<circle cx="55" cy="30" r="7" fill="#FFFFFF"/>\
		<path d="M 50,47 L 60,47 L 60,90 L 50,90 Z" fill="#FFFFFF"/>\
		</svg>';
}
function new_position($conn,$primaryName=NULL,$primaryValue=NULL){
	if ($primaryName===NULL) return FALSE;
	if (isset($_SESSION['instancedb'][$_GET['instance']]['myorder'])) $orderar=$_SESSION['instancedb'][$_GET['instance']]['myorder'];
		if (!isset($orderar)||!is_array($orderar)) $orderar=array();
		$ok1=FALSE;
		$orderQ=' ';
		for ($k=0;$k<count($orderar);$k+=2){
			$orderQ.=pname($orderar[$k],FALSE).' '.$orderar[$k+1];
			if ($k<count($orderar)-2) $orderQ.=', ';
			$ok1=TRUE;
		}
		if ($ok1===TRUE) $orderQ=' ORDER BY'.$orderQ;
		$sql="SELECT * FROM ".pname($_SESSION['instancedb'][$_GET['instance']]['acttab'],FALSE).$orderQ;
		if (($result=mysqli_query($conn,$sql))===FALSE) return FALSE;
		else{
			if ($primaryValue===NULL){
				if (($primaryValue=mysqli_insert_id($conn))==0){
					$maxim=-1;
					$ord=0;
					$i=0;
					while($row=mysqli_fetch_assoc($result)){
						if ($row[$primaryName]>$maxim){
							$maxim=$row[$primaryName];
							$ord=$i;
						}
						$i++;
					}
					return $ord;
				}
			}
			$i=0;
			while($row=mysqli_fetch_assoc($result)){
				if ($row[$primaryName]==$primaryValue){
					return $i;
				}
				$i++;
			}
		}
		return FALSE;
}
function removenl($output){
$output = str_replace(array("\r\n", "\r"), "\n", $output);
$lines = explode("\n", $output);
$new_lines = array();

foreach ($lines as $line) {
    if(!empty($line))
        $new_lines[] = trim($line);
}
return implode($new_lines);
}
function removeBrFromEnd($k){
	if (substr($k,-4)=='<br>') {
		return substr($k,0,-4);
	}
	if (substr($k,-5)=='<br/>') {
		return substr($k,0,-5);
	}
	return $k;
}
function removePFromBeg($k){
	if (substr($k,0,20)=='<div><br></div><div>'&&substr($k,0,21)!='<div><br></div><div><'){
		return  substr($k,15);
	}
	if (substr($k,0,7)=='<p></p>'){
		return  substr($k,7);
	}
	if (substr($k,0,11)=='<p><br></p>'){
		return  substr($k,11);
	}
	if (substr($k,0,12)=='<p><br/></p>'){
		return  substr($k,12);
	}
	if (substr($k,0,13)=='<p><br /></p>'){
		return  substr($k,13);
	}
	return $k;
}
function prepare_to_add($k){
	if ($k===FALSE) $k='';
	$nl='
';
	$k=preg_replace("/(\r)?\n/i",$nl,$k);
	$k=strip_tags($k);
	$k=html_entity_decode($k);
	return $k;
}
function get_primary($conn){
	$sql="SHOW FIELDS FROM ".pname($_SESSION['instancedb'][$_GET['instance']]['acttab'],FALSE);
	$result=mysqli_query($conn,$sql);
	$key=FALSE;
	if ($result===FALSE) return FALSE;
	else {
		while ($row=mysqli_fetch_assoc($result)){
			if ($row['Key']=='PRI') $key=$row['Field'];
		}
	}
	return $key;
}
function create_view_logo($function,$style){
	return '<svg style="'.$style.'" onclick="'.$function.'" id="eye_button" viewBox="0 0 100 70" onmouseover="change_color3(this)" onmouseout="reset_color3(this)">\
	<path d="M 10.53581,34.44 A 54.06,54.06 1 0 1 87.23,34.44 A 54.06,54.06 0 0 1 10.53581,34.44" fill="#0C7C7F" my_change_color="#557E7F" my_orig_color="#0C7C7F"/>\
	<circle cx="48.88" cy="34.44" r="8.5" fill="#F1F1F1" my_change_color="#F1F1F1" my_orig_color="#F1F1F1"/>
	<circle cx="47" cy="35" r="5" fill="#0C7C7F" my_change_color="#557E7F" my_orig_color="#0C7C7F"/>
	<path id="eye_bar" d="M 31.90101,64.81947 L 71.77,8.23 L 65.89,4.06 L 25.99,60.65 Z" fill="#CC1C0B" my_change_color="#FF230E" my_orig_color="#CC1C0B"/>
	</svg>';
}
function create_home_logo($function,$style){
	return '<svg style="'.$style.'" onclick="'.$function.'"  viewBox="0 0 60 70" onmouseover="change_color3(this)" onmouseout="reset_color3(this)">\
	<path d="M 10,68.3 L 10,28.3 L 50,28.3 L 50,68.3 Z" fill="#00FF00" my_change_color="#51F751" my_orig_color="#00FF00"/>
	<path d="M 4.35,29.3 L 55.65,29.3 L 30,2.62 Z" fill="#CC1C0B" my_change_color="#FF230E" my_orig_color="#CC1C0B"/>
	<path d="M 22.38,3.69 L 15.52,3.69 L 15.52,17.92 L 22.38,11.05 Z" fill="#CC1C0B" my_change_color="#FF230E" my_orig_color="#CC1C0B"/>
	<path d="M 30,44.77 L 40.94,44.77 L 40.94,68.3 L 30,68.3 Z" fill="#F1F1F1" my_change_color="#F1F1F1" my_orig_color="#F1F1F1"/>
	</svg>';
}
function is_auto_increment($conn,$col){
	$sql='SHOW FIELDS FROM '.pname($_SESSION['instancedb'][$_GET['instance']]['acttab'],FALSE)." WHERE `Field`='".$col."'";
	$res=mysqli_query($conn,$sql);
	if ($res===FALSE) return FALSE;
	if (mysqli_num_rows($res)!=1) return FALSE;
	$row=mysqli_fetch_assoc($res);
	if (stripos($row['Extra'],'auto_increment')!==FALSE) return TRUE;
	return FALSE;
}
function create_download_logo($function,$style){
	return '<svg style="'.$style.'" viewBox="0 0 100 100" onmouseover="change_color2(this)" onmouseout="reset_color(this)" onclick="'.$function.'">
<path d="M 90,68 L 90,92.45 L 10,92.45 L 10,68 L 22.44,68 L 22.44,81.5 L 77.56,81.5 L 77.56,68 Z" fill="#8DB23A" stroke="#fff" stroke-width="2" my_orig_color="#8DB23A" my_change_color="#759430"/>
<path d="M 50,73.71 L 34.2,58.03 L 44.47,58.03 L 44.47,12.35 L 55.53,12.35 L 55.53,58.03 L 65.8,58.03 Z" fill="#8DB23A" stroke="#fff" stroke-width="2" my_orig_color="#8DB23A" my_change_color="#759430"/>
</svg>';
}
function  create_upload_logo($function,$style){
	return '<svg style="'.$style.'" viewBox="0 0 100 100" onmouseover="change_color2(this)" onmouseout="reset_color(this)" onclick="'.$function.'">
<path d="M 90,68 L 90,92.45 L 10,92.45 L 10,68 L 22.44,68 L 22.44,81.5 L 77.56,81.5 L 77.56,68 Z" fill="#8DB23A" stroke="#fff" stroke-width="2" my_orig_color="#8DB23A" my_change_color="#759430"/>
<path d="M 50,13.33 L 34.2,30.01 L 44.47,30.01 L 44.47,72.57 L 55.53,72.57 L 55.53,30.01 L 65.8,30.01 Z" fill="#8DB23A" stroke="#fff" stroke-width="2" my_orig_color="#8DB23A" my_change_color="#759430"/>
</svg>';
}
function create_double_row_logo($style){
	return '<svg style="'.$style.'" viewBox="0 0 100 50" onmouseover="change_color2(this)" onmouseout="reset_color(this)">
<rect x="4.44" y="5.03" width="73.2" height="16.22" fill="#fff" my_change_color="#F4F4FF" my_orig_color="#fff" stroke="#6E74D9" stroke-width="3" rx="1" ry="1"/>
<rect x="4.44" y="29.93" width="73.2" height="16.22" fill="#fff" my_change_color="#F4F4FF" my_orig_color="#fff" stroke="#6E74D9" stroke-width="3" rx="1" ry="1"/>
<path d="M 81.42,14.38 A 12.59,12.59 0 0 1 85.73,38.48" fill="none" stroke="#735F0E" stroke-width="2"/>
<path d="M 85.8,33.36 L 85.66,43.61 L 80.32,38.41 Z" stroke="#735F0E" stroke-width="1" fill="#735F0E"/>
<path d="M 78.75,25.89 L 90.26,25.89" stroke="#73AD0E" stroke-width="2"/>
<path d="M 84.51,20.14 L 84.51,31.65" stroke="#73AD0E" stroke-width="2"/>
</svg>';
}
function create_double_table_logo($function,$style){
	return '<svg style="'.$style.'" viewBox="0 0 100 100" onmouseover="change_color2(this)" onmouseout="reset_color(this)" onclick="'.$function.'">
<rect x="43.64" y="14.56" width="43.45" height="66.1" fill="#fff" stroke="#6E74D9" stroke-width="2" rx="5" ry="5" my_change_color="#F4F4FF" my_orig_color="#fff"/>
<path d="M 48.09,22.83 L 60.44,22.83" stroke="#777" stroke-width="2"/>
<path d="M 48.09,39.35 L 60.44,39.35" stroke="#777" stroke-width="2"/>
<path d="M 48.09,55.88 L 60.44,55.88" stroke="#777" stroke-width="2"/>
<path d="M 48.09,72.4 L 60.44,72.4" stroke="#777" stroke-width="2"/>
<path d="M 70.29,22.83 L 82.65,22.83" stroke="#777" stroke-width="2"/>
<path d="M 70.29,39.35 L 82.65,39.35" stroke="#777" stroke-width="2"/>
<path d="M 70.29,55.88 L 82.65,55.88" stroke="#777" stroke-width="2"/>
<path d="M 70.29,72.4 L 82.65,72.4" stroke="#777" stroke-width="2"/>
<rect x="14.28" y="25.2" width="43.45" height="66.1" fill="#fff" stroke="#6E74D9" stroke-width="2" rx="5" ry="5" my_change_color="#F4F4FF" my_orig_color="#fff"/>
<path d="M 18.73,33.47 L 31.09,33.47" stroke="#777" stroke-width="2"/>
<path d="M 18.73,49.99 L 31.09,49.99" stroke="#777" stroke-width="2"/>
<path d="M 18.73,66.51 L 31.09,66.51" stroke="#777" stroke-width="2"/>
<path d="M 18.73,83.04 L 31.09,83.04" stroke="#777" stroke-width="2"/>
<path d="M 40.93,33.47 L 53.29,33.47" stroke="#777" stroke-width="2"/>
<path d="M 40.93,49.99 L 53.29,49.99" stroke="#777" stroke-width="2"/>
<path d="M 40.93,66.51 L 53.29,66.51" stroke="#777" stroke-width="2"/>
<path d="M 40.93,83.04 L 53.29,83.04" stroke="#777" stroke-width="2"/>
<path d="M 18.68,21.75 A 18.73,18.73 0 0 1 49.47,9.35" fill="none" stroke="#735F0E" stroke-width="2"/>
<path d="M 46.48,12.89 L 52.46,5.81 L 54.47,13.56 Z" fill="#735F0E"/>
<path d="M 26.14,15.23 L 37.64,15.23" stroke="#73AD0E" stroke-width="2"/>
<path d="M 31.89,9.48 L 31.89,20.98" stroke="#73AD0E" stroke-width="2"/>
</svg>';
}
function create_rename_logo($function,$style){
	return '<svg style="'.$style.'" viewBox="0 0 100 90" onmouseover="change_color2(this)" onmouseout="reset_color(this)" onclick="'.$function.'">
<rect x="4.82" y="57.88" width="76.84" height="22.44" fill="#fff" stroke="#6E74D9" stroke-width="2" rx="5" ry="5" my_change_color="#F4F4FF" my_orig_color="#fff"/>
<text x="8" y="76.5"  style="font-size:20px;user-select:none;" class="brush_mt">Abc...</text>
<path d="M 57.28,72.9 L 57.61,64.7 L 63.45,67.48 Z" fill="#000000"/>
<path d="M 63.45,67.48 L 73.07,59.02 L 58.13,51.9 L 57.61,64.7 Z" fill="#FFEDB8"/>
<path d="M 58.15,51.93 L 72.7,59.4 L 92.83,17.56 L 77.89,10.44" fill="#FFD753" stroke="#FFD753" stroke-width="0.3"/>
</svg>';
}
function prepareForBackup($str){
	if ($str===NULL) return 'NULL';
	$str=addslashes($str);
	$str=str_replace('
','\r\n',$str);
return "'".$str."'";
}
function generateBackupDb($conn,$db){
$res=$GLOBALS['backupDatabaseTexts']['initial'];
$res.= 'DROP DATABASE IF EXISTS ';
$res.= pname($db,FALSE);
$res.= ';

';
$result=mysqli_query($conn,'SHOW CREATE DATABASE '.pname($db,FALSE));
if ($result&&mysqli_num_rows($result)) $res.=mysqli_fetch_assoc($result)['Create Database'];
else return FALSE;
$res.= ';

';
$res.= 'USE '.pname($db,FALSE).';

';
$tables=array();
$result=mysqli_query($conn,'SHOW TABLES');
if ($result===FALSE) return FALSE;
while($row=mysqli_fetch_row($result)){
$tables[]=$row[0];
}
	foreach ($tables as $tab){
	$kTab=backupTable($conn,$tab);
	if ($ktab===FALSE) return FALSE;
	$res.=$kTab;
	}
$res.=$GLOBALS['backupDatabaseTexts']['final'];
	return $res;
}
function backupTable($conn,$tab){
	$res.= 'DROP TABLE IF EXISTS '.pname($tab,FALSE).';
	/*!40101 SET @saved_cs_client     = @@character_set_client */;
	/*!40101 SET character_set_client = utf8 */;
	';
	$result=mysqli_query($conn,'SHOW CREATE TABLE '.pname($tab,FALSE));
	if ($result===FALSE||mysqli_num_rows($result)==0) return FALSE;
	$res.= mysqli_fetch_assoc($result)['Create Table'].';
	/*!40101 SET character_set_client = @saved_cs_client */;

	';
	$res.= 'LOCK TABLES '.pname($tab,FALSE).' WRITE;
	/*!40000 ALTER TABLE '.pname($tab,FALSE).' DISABLE KEYS */;
	';
	$result=mysqli_query($conn,'SELECT * FROM '.pname($tab,FALSE));
	if ($result===FALSE) return FALSE;
	$first=TRUE;
	$number=0;
	if (mysqli_num_rows($result)>0){
	while($row=mysqli_fetch_row($result)){
	if ($number%50==0) {
	if ($number!=0)  $res.=');
	';
	$res.= 'INSERT INTO '.pname($tab,FALSE).' VALUES(';
	$first=TRUE;}
	if (!$first) $res.= '),(';
	else {
	$first=FALSE;
	}
	for ($i=0;$i<count($row)-1;$i++) $res.=prepareForBackup($row[$i]).",";
	if (count($row)>0) $res.=prepareForBackup($row[count($row)-1]);
	$number++;
	}
	$res.= ');';}
	$res.='
	/*!40000 ALTER TABLE '.pname($tab,FALSE).' ENABLE KEYS */;
	';
	$res.= 'UNLOCK TABLES;
	';
	return $res;
}
function generateBackupTables($conn,$tables){
	$res=$GLOBALS['backupDatabaseTexts']['initial'];
	foreach ($tables as $tab){
	$kTab=backupTable($conn,$tab);
	if ($kTab===FALSE) return FALSE;
	$res.=$kTab;
	}
	$res.=$GLOBALS['backupDatabaseTexts']['final'];
	return $res;
}
function create_error_page($error){
	$res=<<<'EOT'
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8">
EOT;
$res.='<title>Access MySQLi v'.$GLOBALS['VERSION'].'</title>';
$res.=<<<EOT
<style type="text/css">
body{
	background-color:#FDFDFD;
}
</style>
</head>
<body>
	<div class="conerdiv" style="position: fixed; top: 0px; left: 0px; width: 100%; height: 100%; z-index: 10;">
	<div style="position:absolute;top:0px;left:0px;width:100%;height:100%;background-color:#000000;opacity:0.5;">&nbsp;</div>
	<div style="opacity:1;position:absolute;top:50%;left:50%;width:300px;height:200px;padding:20px;margin-left:-170px;margin-top:-120px;background-color:#FFF2A0;border-radius:5px;">
	<div style="height:30px;">
	<svg style="width:30px;height:30px;" viewBox="0 0 110 110">
	<path d="M 90,50 L 78.28,78.28 L 50,90 L 21.72,78.28 L 10,50 L 21.72,21.72 L 50,10 L 78.28,21.72 Z" fill="red">
	</path><path d="M 65.95,27.75 L 72.25,34.05 L 34.05,72.25 L 27.75,65.95 Z" fill="#FFFFFF"></path>
	<path d="M 34.05,27.75 L 27.75,34.05 L 65.95,72.25 L 72.25,65.95 Z" fill="#FFFFFF"></path></svg>&nbsp;&nbsp;&nbsp;<span style="color:red;font-weight:bold;position:relative;top:-10px">{$GLOBALS["TR"]["ERROR"][$GLOBALS["LANG"]]}</span>
	</div><br>
	<div style="overflow:auto;height:130px">
EOT;
$res.=$error;
$res.=<<<EOT
	</div>
	<div style="height:50px;">Click OK to close:<button type="button" style="cursor:pointer;position:relative;top:-5px;float:right;margin-right:25px;color:#FFFFFF;background-color:#CC8D00;width:75px;font-size:18px;" onclick="close_error('0')">OK</button></div>
	</div></div>
	<script>
	function close_error(arg){
		window.location.href="{$GLOBALS['PHP_SELF_INSTANCE']}";
	}
	</script>
</body>
</html>
EOT;
 return $res;
}
function create_info_page($text){
		$res=<<<'EOT'
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8">
EOT;
$res.='<title>Access MySQLi v'.$GLOBALS['VERSION'].'</title>';
$res.=<<<EOT
<style type="text/css">
body{
	background-color:#FDFDFD;
}
</style>
</head>
<body>
	<div class="infodiv" style="position: fixed; top: 0px; left: 0px; width: 100%; height: 100%; z-index: 10;">
	<div style="position:absolute;top:0px;left:0px;width:100%;height:100%;background-color:#000000;opacity:0.5;">&nbsp;</div>
	<div style="opacity:1;position:absolute;top:50%;left:50%;width:300px;height:200px;padding:20px;margin-left:-170px;margin-top:-120px;background-color:#FFF2A0;border-radius:5px;">
	<div style="height:30px;">
	<svg style="width:30px;height:30px;" viewBox="0 0 110 110">
	<circle cx="55" cy="55" r="45" fill="#0000FF"></circle>
	<circle cx="55" cy="30" r="7" fill="#FFFFFF"></circle>
	<path d="M 50,47 L 60,47 L 60,90 L 50,90 Z" fill="#FFFFFF"></path></svg>&nbsp;&nbsp;&nbsp;<span style="color:blue;font-weight:bold;position:relative;top:-10px">{$GLOBALS["TR"]["INFO"][$GLOBALS["LANG"]]}</span></div><br>
	<div style="overflow:auto;height:130px">
EOT;
$res.=$text;
$res.=<<<EOT
</div>
	<div style="height:50px;">{$GLOBALS["TR"]["OK_to_close"][$GLOBALS["LANG"]]}<button type="button" style="cursor:pointer;position:relative;top:-5px;float:right;margin-right:25px;color:#FFFFFF;background-color:#CC8D00;width:75px;font-size:18px;" onclick="close_info(1)">{$GLOBALS["TR"]["OK"][$GLOBALS["LANG"]]}</button></div>
	</div></div>
	<script>
	function close_info(arg){
		window.location.href="{$GLOBALS['PHP_SELF_INSTANCE']}";
	}
	</script>
</body>
</html>
EOT;
 return $res;
}
//*Functions
//Before output (AJAX)
if($_POST['CSRF']==$_SESSION['CSRFdb']){
if ($_GET['act']=='get_contents'){
	$res=array();
	$ok=0;
	if (isset($_SESSION['instancedb'][$_GET['instance']]['myorder'])) $orderar=$_SESSION['instancedb'][$_GET['instance']]['myorder'];
		if (!isset($orderar)||!is_array($orderar)) $orderar=array();
		$ok1=FALSE;
		$orderQ=' ';
		for ($k=0;$k<count($orderar);$k+=2){
			$orderQ.=pname($orderar[$k],FALSE).' '.$orderar[$k+1];
			if ($k<count($orderar)-2) $orderQ.=', ';
			$ok1=TRUE;
		}
		if ($ok1===TRUE) $orderQ=' ORDER BY'.$orderQ;
		$sql="SELECT * FROM ".pname($_SESSION['instancedb'][$_GET['instance']]['acttab'],FALSE).$orderQ;
	if (($result=mysqli_query($conn,$sql))===FALSE){
		$res['stat']='fail';
		$res['error']=htmlspecialchars(mysqli_error($conn));
	}
	else {
		$ok=1;
		$res['stat']='success';
$tot=array(array(array()));
$i=0;
if (mysqli_num_rows($result)==0) $tot=array();
while($row=mysqli_fetch_assoc($result)){
	$tot[$i][0]=$row;
	$i++;
	}
	$res['all']['rows']=$tot;
	}
	if ($ok==1){
		$sql='SHOW FIELDS FROM '.pname($_SESSION['instancedb'][$_GET['instance']]['acttab'],FALSE);
		if (($result=mysqli_query($conn,$sql))===FALSE){
		$res['stat']='fail';
		unset($res['all']);
		$res['error']=htmlspecialchars(mysqli_error($conn));
	}
	else {
		$res['all']['columns']=array();
		$i=0;
		while ($row=mysqli_fetch_assoc($result)){
			$res['all']['columns'][$i]=$row['Field'];
			$res['all']['data-types'][$i]=$row['Type'];
			if (strpos($row['Extra'],'auto_increment')!==FALSE)
			$res['all']['data-types'][$i].=' auto_increment';
			if ($row['Key']=='PRI') $res['all']['primary']=$row['Field'];
			$i++;
		}
	}
}
	echo encodeJsonSafe($res);
	die();
}
if ($_GET['act']=='set_acttab'){
	$res=array();
	logout_tbl();
	$_SESSION['instancedb'][$_GET['instance']]['acttab']=$_POST['tbl'];
	if (check_table_exist($conn)) $res['stat']='success';
	else {$res['stat']='con_err';
	$res['con_err']='tblmiss';
	}
	echo encodeJsonSafe($res);
	die();
}
if ($_GET['act']=='refrtblscroll'){
$res=array();
$res['stat']='success';
$res['all']=create_table_scrollbar($conn);
echo encodeJsonSafe($res);
die();
}
if ($_GET['act']=='droptbl'&&$_POST['confirm']=='da'){
	$res=array();
	$k=htmlspecialchars($_SESSION['instancedb'][$_GET['instance']]['acttab']);
	$sql='DROP TABLE '.pname($_SESSION['instancedb'][$_GET['instance']]['acttab'],FALSE);
	if (mysqli_query($conn,$sql)){
		if (check_table_exist($conn)!==FALSE){
			$res['stat']='con_err';
			$res['con_err']='tblmiss';
		}
		else {
			$res['stat']='success';
			$res['tbl']=$k;
		}
	}
	else{ $res['stat']='fail';
	$res['error']=htmlspecialchars(mysqli_error($conn));
	}
	echo encodeJsonSafe($res);
	die();
}
if ($_GET['act']=='getorder'){
	$res=array();
	$res['stat']='success';
	if (!isset($_SESSION['instancedb'][$_GET['instance']]['myorder'])||$_SESSION['instancedb'][$_GET['instance']]['myorder']==''||$_SESSION['instancedb'][$_GET['instance']]['myorder']==0||$_SESSION['instancedb'][$_GET['instance']]['myorder']==FALSE){
		$res['all']='nimic';
	}
	else $res['all']=$_SESSION['instancedb'][$_GET['instance']]['myorder'];
	echo encodeJsonSafe($res);
	die();
}
if($_GET['act']=='saveorder'){
	$res=array();
	$ord=$_POST['order'];
	$co=array();
	if (is_array($ord)){
	for($i=0;$i<count($ord);$i+=2){
		array_push($co,$ord[$i]);
	}
	if (!check_column_exist($conn,$co)){
		$res['stat']='con_err';
		$res['con_err']='colmiss';
	}
	else{
		$_SESSION['instancedb'][$_GET['instance']]['myorder']=$ord;
		$res['stat']='success';
	}
	}
	else {
		unset($_SESSION['instancedb'][$_GET['instance']]['myorder']);
		$res['stat']='success';
	}
	echo encodeJsonSafe($res);
	die();
}
if ($_GET['act']=='change_columns_order'){
	$res=array();
	$sql='ALTER TABLE '.pname($_SESSION['instancedb'][$_GET['instance']]['acttab'],FALSE).' MODIFY '.pname($_POST['cine'],FALSE).' '.$_POST['cumECine'].' ';
	if ($_POST['primul']=='DA') $sql.='FIRST';
	else {
		$sql.='AFTER '.pname($_POST['dupaCine'],FALSE);
	}
	if (mysqli_query($conn,$sql)){
		$res['stat']='success';
	}
	else {
		$res['stat']='con_err';
		$res['con_err']='colmiss';
	}
	echo encodeJsonSafe($res);
	die();
}
//ADD COLUMN
if ($_GET['act']=='addCol'){
	$res=array();
	$sql='ALTER TABLE '.pname($_SESSION['instancedb'][$_GET['instance']]['acttab'],FALSE).' ADD '.pname($_POST['name'],FALSE).' '.$_POST['type'].' ;';
	if(mysqli_query($conn,$sql)){
		$res['stat']='success';
	}
	else {
		$res['stat']='fail';
		$res['error']=htmlspecialchars(mysqli_error($conn));
	}
	echo encodeJsonSafe($res);
	die();
}
//*ADD COLUMN
//DELETE COLUMN
if ($_GET['act']=='drop_column'&&$_POST['check']=='DA'){
	$res=array();
	if (check_column_exist($conn,array($_POST['column']))){
		$sql='ALTER TABLE '.pname($_SESSION['instancedb'][$_GET['instance']]['acttab'],FALSE).' DROP COLUMN '.pname($_POST['column'],FALSE).' ;';
		if (mysqli_query($conn,$sql)){
			if (isset($_SESSION['instancedb'][$_GET['instance']]['myorder'])&&is_array($_SESSION['instancedb'][$_GET['instance']]['myorder'])){
			for ($i=0;$i<count($_SESSION['instancedb'][$_GET['instance']]['myorder']);$i+=2){
				if ($_SESSION['instancedb'][$_GET['instance']]['myorder'][$i]==$_POST['column']){
					array_splice($_SESSION['instancedb'][$_GET['instance']]['myorder'],$i,2);
				}
			}
			}
			$res['stat']='success';
		}
		else {
			$res['stat']='fail';
			$res['error']=htmlspecialchars(mysqli_error($conn));
		}
	}
	else{
		$res['stat']='con_err';
		$res['con_err']='colmiss';
	}
	echo encodeJsonSafe($res);
	die();
}
//*DELETE COLUMN
//EDIT COLUMN
if ($_GET['act']=='editCol'){
	$res=array();
	if (check_column_exist($conn,array($_POST['oldName']))){
	$sql='SHOW FIELDS FROM '.pname($_SESSION['instancedb'][$_GET['instance']]['acttab'],FALSE)." WHERE Field='".prepare($_POST['oldName'])."';";
	$result=mysqli_query($conn,$sql);
			if ($result!==FALSE&&mysqli_num_rows($result)>0){
				$row=mysqli_fetch_assoc($result);
				$sql='ALTER TABLE '.pname($_SESSION['instancedb'][$_GET['instance']]['acttab'],FALSE).' MODIFY '.pname($_POST['oldName'],FALSE).''.$row['Type'];
				mysqli_query($conn,$sql);
			}
	$sql='SHOW INDEX FROM '.pname($_SESSION['instancedb'][$_GET['instance']]['acttab'],FALSE)." WHERE Column_name='".prepare($_POST['oldName'])."';";
			$result=mysqli_query($conn,$sql);
			if ($result!==FALSE&&mysqli_num_rows($result)>0){
				while($row=mysqli_fetch_assoc($result)){
			$sql='ALTER TABLE '.pname($_SESSION['instancedb'][$_GET['instance']]['acttab'],FALSE).' DROP INDEX '.pname($row['Key_name']);
			mysqli_query($conn,$sql);}}
	$sql='ALTER TABLE '.pname($_SESSION['instancedb'][$_GET['instance']]['acttab'],FALSE).' CHANGE COLUMN '.pname($_POST['oldName'],FALSE).' '.pname($_POST['newName'],FALSE).' '.$_POST['newDataType'].' ;';
	if (mysqli_query($conn,$sql)){
		$res['stat']='success';
	}
	else {
		$res['stat']='fail';
		$res['error']=htmlspecialchars(mysqli_error($conn));
	}
	}
	else{
		$res['stat']='con_err';
		$res['con_err']='colmiss';
	}
	echo encodeJsonSafe($res);
	die();
}
//*EDIT COLUMN
//DELETE ROW
if ($_GET['act']=='delete_row'&&$_POST['check']=='DA'){
	$res=array();
	$pac=json_decode($_POST['packet'],true);
	if ($pac===FALSE){
		$res['stat']='fail';
		$res['error']='json_error';
		echo encodeJsonSafe($res);
		die();
	}
	$sql='DELETE FROM '.pname($_SESSION['instancedb'][$_GET['instance']]['acttab'],FALSE).' WHERE 1=1 ';
	foreach ($pac['columns'] as $col){
		if ($pac['rowContent'][$col]===NULL){
			$sql.=' AND '.pname($col,FALSE).' IS NULL';
		}
		else
		$sql.=' AND CAST('.pname($col,FALSE)." AS CHAR CHARACTER SET utf8) COLLATE utf8_bin = CAST('".prepare($pac['rowContent'][$col])."' AS CHAR CHARACTER SET utf8 ) COLLATE utf8_bin";
		}
		$sql.=' LIMIT 1';
	if (mysqli_query($conn,$sql)){
		if (mysqli_affected_rows($conn)==1) {
			$res['stat']='success';
			if ($_POST['primary']===NULL) $res['fol_action']='getContents';
			else {
				$res['fol_action']='putContents';
			}
		}
		else{
		$res['stat']='con_err';
		$res['con_err']='colmiss';
		}
	}
	else {
		$res['stat']='con_err';
		$res['con_err']=htmlspecialchars(mysqli_error($conn));
	}
	echo encodeJsonSafe($res);
	die();
}
//*DELETE ROW
//ADD ROW
if ($_GET['act']=='new_row'){
	$res=array();
	if (!check_column_exist($conn,json_decode($_POST['columns'],TRUE))){
		$res['stat']='con_err';
		$res['con_err']='colmiss';
		echo encodeJsonSafe($res);
		die();
	}
	$sql="INSERT INTO ".pname($_SESSION['instancedb'][$_GET['instance']]['acttab'],FALSE)." () VALUES();";
	if (mysqli_query($conn,$sql)===FALSE){
		$res['stat']='fail';
		$res['error']=htmlspecialchars(mysqli_error($conn));
	}
	else {
		$primary=get_primary($conn);
		if ($primary===FALSE||!is_auto_increment($conn,$primary)){
		$res['stat']='success';
		$res['fol_action']='getContents';
		$res['test']='e0';
		}
		else {
		$position=new_position($conn,$primary);
		if ($position!==FALSE){
		$sql="SELECT * FROM ".pname($_SESSION['instancedb'][$_GET['instance']]['acttab'],FALSE)." WHERE ".pname($primary,FALSE)."=LAST_INSERT_ID()";
		$result=mysqli_query($conn,$sql);
		if ($result===FALSE){
			$res['stat']='success';
			$res['fol_action']='getContents';
			$res['test']='e1';
		}else{
			if (mysqli_num_rows($result)==1){
			$row=mysqli_fetch_assoc($result);
		$rowToAdd=array();
		$rowToAdd[0]=$row;
		$res['stat']='success';
		$res['rowToAdd']=$rowToAdd;
		$res['where']=$position;
		$res['fol_action']=='putContents';
		}
		else{
			$res['stat']='success';
			$res['fol_action']='getContents';
			$res['test']=mysqli_num_rows($result).';'.$primary;
		}
		}
		}
		else{
			$res['stat']='success';
			$res['fol_action']='getContents';
			$res['test']='e3';
		}}
	}
	echo encodeJsonSafe($res);
	die();
}
//*ADD ROW
//DUPLICATE ROW
if ($_GET['act']=='double_row'){
	$res=array();
	$pack=json_decode($_POST['packet'],true);
	if ($pack===FALSE||$pack===NULL){ $res['stat']='fail';
	$res['error']='json_error';
	die();
	}
	$sql="SHOW FIELDS FROM ".pname($_SESSION['instancedb'][$_GET['instance']]['acttab'],FALSE);
	$result=mysqli_query($conn,$sql);
	$cols=array();
	while($row=mysqli_fetch_assoc($result)){
		if (in_array($row['Field'],$pack['columns'])){
			if (!(strtoupper($row['Key']=='PRI')||strtoupper($row['Key']=='UNI'))){
				array_push($cols,$row['Field']);
			}
		}
		else {
		$res['stat']='con_err';
		$res['con_err']='colmiss';
		echo encodeJsonSafe($res);
		die();
		}
	}
	$colCsv='';
	$valuesCsv='';
	foreach ($cols as $col){
		$colCsv.=pname($col,FALSE).',';
		if ($pack['rowContent'][$col]===NULL) $valuesCsv.='NULL,';
		else $valuesCsv.="'".prepare($pack['rowContent'][$col])."',";
	}
	$colCsv=rtrim($colCsv,',');
	$valuesCsv=rtrim($valuesCsv,',');
	$sql="INSERT INTO ".pname($_SESSION['instancedb'][$_GET['instance']]['acttab'],FALSE)." (".$colCsv.") VALUES(".$valuesCsv.");";
	if (mysqli_query($conn,$sql)===FALSE){
		$res['stat']='fail';
		$res['error']=htmlspecialchars(mysqli_error($conn));
	}
	else {
		$primary=get_primary($conn);
		if ($primary===FALSE||!is_auto_increment($conn,$primary)){
		$res['stat']='success';
		$res['fol_action']='getContents';
		$res['test']='e0';
		}
		else {
		$position=new_position($conn,$primary);
		if ($position!==FALSE){
		$sql="SELECT * FROM ".pname($_SESSION['instancedb'][$_GET['instance']]['acttab'],FALSE)." WHERE ".pname($primary,FALSE)."=LAST_INSERT_ID()";
		$result=mysqli_query($conn,$sql);
		if ($result===FALSE){
			$res['stat']='success';
			$res['fol_action']='getContents';
			$res['test']='e1';
		}else{
			if (mysqli_num_rows($result)==1){
			$row=mysqli_fetch_assoc($result);
		$rowToAdd=array();
		$rowToAdd[0]=$row;
		$res['stat']='success';
		$res['rowToAdd']=$rowToAdd;
		$res['where']=$position;
		$res['fol_action']=='putContents';
		}
		else{
			$res['stat']='success';
			$res['fol_action']='getContents';
			$res['test']=mysqli_num_rows($result).';'.$primary;
		}
		}
		}
		else{
			$res['stat']='success';
			$res['fol_action']='getContents';
			$res['test']='e3';
		}}
	}
	echo encodeJsonSafe($res);
	die();
}
//*DUPLICATE ROW
//EDIT
if ($_GET['act']=='updateCell'&&isset($_POST['packet'])){
	$res=array();
	$pack=json_decode($_POST['packet'],true);
	if ($pack===FALSE||$pack===NULL){ $res['stat']='fail';
	$res['error']='json_error';
	}
	else {
		$newText=$pack['newContent'];
		if (strtolower($pack['dataType'])=="date"&&isset($SETTINGS['editDate'])&&$SETTINGS['editDate']==1&&trim(prepare_to_add($newText))=='$'){
			$newText='NOW()';
		}
		else if (strtolower($pack['dataType'])=="datetime"&&isset($SETTINGS['editDateTime'])&&$SETTINGS['editDateTime']==1&&trim(prepare_to_add($newText))=='$'){
			 $newText='NOW()';
		}
		else if (strtolower($pack['dataType'])=="time"&&isset($SETTINGS['editTime'])&&$SETTINGS['editTime']==1&&trim(prepare_to_add($newText))=='$'){
		 $newText='NOW()';
		}
		else if (isset($pack['isHtml'])&&$pack['isHtml']=='yes') $newText="'".prepare($newText)."'";
		else {
			if (isset($pack['isAdvanced'])&&$pack['isAdvanced']=='yes') $newText=prepare_to_add($newText);
			else{
				$newText="'".prepare(prepare_to_add($newText))."'";
			}
		}
	$sql='UPDATE '.pname($_SESSION['instancedb'][$_GET['instance']]['acttab'],FALSE).' SET '.pname($pack['columns'][$pack['column']],FALSE)."=".$newText." WHERE 1=1";
	foreach ($pack['columns'] as $col){
		if ($pack['initRowContent'][$col]===null){
			$sql.=' AND '.pname($col,FALSE).' IS NULL';
		}
		else
		$sql.=' AND CAST('.pname($col,FALSE)." AS CHAR CHARACTER SET utf8) COLLATE utf8_bin = CAST('".prepare($pack['initRowContent'][$col])."' AS CHAR CHARACTER SET utf8 ) COLLATE utf8_bin";
		}
		$sql.=' LIMIT 1';
	if (mysqli_query($conn,$sql)){
				if ($pack['primary']!==NULL&&$pack['rowNumber']!==NULL){
				$sql="SELECT * FROM ".pname($_SESSION['instancedb'][$_GET['instance']]['acttab'],FALSE)." WHERE CAST(".pname($pack['primary'],FALSE)." AS CHAR CHARACTER SET utf8 ) COLLATE utf8_bin =CAST('".prepare($pack['rowNumber'])."' AS CHAR CHARACTER SET utf8) COLLATE utf8_bin";
				$result=mysqli_query($conn,$sql);
				if ($result===FALSE) {
				$res['stat']='success';
				$res['fol_action']='getContents';
				}
				else {
					if (mysqli_num_rows($result)==1){
					$row=mysqli_fetch_assoc($result);
					$res['newContentResult']=$row;
					$res['new_pos']=new_position($conn,$pack['primary'],$pack['rowNumber']);
					$res['stat']='success';
					$res['fol_action']='putContents';
					}
					else {
						$res['stat']='success';
						$res['fol_action']='getContents';
					}
				}
				}
				else{
					$res['stat']='success';
					$res['fol_action']='getContents';
				}
	}
	else {
		$res['stat']='fail';
		$res['error']=htmlspecialchars(mysqli_error($conn));
	}
	}
	echo encodeJsonSafe($res);
	die();
}
//*EDIT
//RENAME TABLE
if ($_GET['act']=='rename_table'){
	$res=array();
	$sql="RENAME TABLE ".pname($_SESSION['instancedb'][$_GET['instance']]['acttab'],FALSE).' TO '.pname($_POST['newName'],FALSE);
	if (mysqli_query($conn,$sql)===FALSE)
	{
		$res['stat']='fail';
		$res['error']=htmlspecialchars(mysqli_error($conn));
	}
	else{
		$_SESSION['instancedb'][$_GET['instance']]['acttab']=$_POST['newName'];
		$res['stat']='success';
	}
	echo encodeJsonSafe($res);
	die();
}
//*RENAME TABLE
//LIST DATABASES
if ($_GET['act']=='db_option_list'){
	$res=array();
	if (isset($GLOBALS['DEFAULTDBS'])){
		$res['stat']='success';
		$res['cnt']='';
		if (count($GLOBALS['DEFAULTDBS']['databases'])>0){
			foreach ($GLOBALS['DEFAULTDBS']['databases'] as $dbss){
			$res['cnt'].= '<option value="'.htmlspecialchars($dbss).'">'.htmlspecialchars($dbss).'</option>';
			}
		}
	}
	else{
	$sql="SHOW databases";
	if($result=mysqli_query($conn,$sql)){
		$res['stat']='success';
		$res['cnt']='';
	while ($row=mysqli_fetch_assoc($result)){
		$res['cnt'].= '<option value="'.htmlspecialchars($row['Database']).'">'.htmlspecialchars($row['Database']).'</option>';
	}
	}
	else {
		$res['stat']='fail';
		$res['error']=htmlspecialchars(mysqli_error($conn));
	}
	}
	echo encodeJsonSafe($res);
	die();
}
//*LIST DATABASES
//COPY TABLE
if ($_GET['act']=='copy_table'){
	$res=array();
	if ($_POST['thisDb']=='yes') $newName=pname($_POST['newName'],FALSE);
	else $newName=pname($_POST['dbName']).'.'.pname($_POST['newName'],FALSE);
	$sql="CREATE TABLE ".$newName." LIKE ".pname($_SESSION['instancedb'][$_GET['instance']]['acttab'],FALSE);
	if (mysqli_query($conn,$sql)===FALSE)
	{
		$res['stat']='fail';
		$res['error']=htmlspecialchars(mysqli_error($conn));
	}
	else{
		$sql="INSERT INTO ".$newName." SELECT * FROM ".pname($_SESSION['instancedb'][$_GET['instance']]['acttab'],FALSE);
		if (mysqli_query($conn,$sql)===FALSE)
	{
		$res['stat']='fail';
		$res['error']=htmlspecialchars(mysqli_error($conn)).'<br>'.'<span style="color:red">'.$GLOBALS["TR"]["Tbl_created_content_not_copied"][$GLOBALS["LANG"]].'</span>';
	}
	else{
		$res['stat']='success';
	}
	}
	echo encodeJsonSafe($res);
	die();
}
}
//*COPY TABLE

if (isset($_GET['ajax'])&&(!isset($_POST['CSRF'])||$_POST['CSRF']!=$_SESSION['CSRFdb'])){
	$res=array();
	$res['stat']='con_err';
	$res['con_err']='login';
	echo encodeJsonSafe($res);
	die();
}
//*AJAX
?>
<?php meta_build(); ?>
<style type="text/css">
html{
	height:100%;
	min-width:100%;
	position:absolute;
	top:0;
	left:0;
	margin:0;
	overflow:auto;
}
body{
	margin:0;
	background-color:#FDFDFD;
	min-height:100%;
	min-width:100%;
}
#top{
	position:fixed;
	top:0px;
	left:0px;
	width:100%;
	height:135px;
	background-color:#F1F1F1;
	border-bottom:1px solid #666;
	z-index:+3;
	zoom:1;
}
#banner{
	width:12%;
	padding-left:15px;
	padding-right:15px;
	vertical-align:middle;
	text-align:center;
	font-family: sans-serif,cursive;
	font-size:20px;
	color:#0000EE;
}
.brush_mt{
	font-family: sans-serif,cursive;
}
#search{
	background-color:#FFFFFF;
	border-radius:5px;
	width:500px;
	height:30px;
	text-align:left;
	padding-left:5px;
	margin:0px;
	position:relative;top:0px;left:0px;
}
#searchbar{
	position:relative;
	top:1px;
	width:460px;
	height:26px;
	border:none;
	font-size:18px;
	display:inline;
}
#advsrc{
	position:fixed;
	width:360px;
	background-color:#F1F1F1;
	z-index:+4;
	display:none;
	border:solid 1px #BDC2CC;
	border-radius:5px;
	padding:20px;
	padding-bottom:5px;

}
.closing{
	font-family: sans-serif;
	text-decoration:none !important;
	color:#777 !important;
	font-weight:bold;
	font-size:18px;
}
.closing:hover{
	color:#999 !important;
}
#settings_td{
	position:relative;
	width:9%;
	text-align:center;
}
#table_html_td{
	position:relative;
}
#fill_div{
	height:150px;
}
#main_table{
	text-align:center;
	padding-bottom:30px;
}
#tabel_select{
	max-width:160px;
	border-radius:5px;
	border:solid #999 1px;
	background-color:#FFFFFF;
}
.htmlToggle{
	position:relative;top:14.5px;
	background-color:#D6D2F7;
	border:solid #C5C0E3 1px;
	border-radius:2px;
	margin:3px;
	min-width:18px;
	cursor:pointer;
}
.htmlSelect{
	position:relative;top:14.5px;
	background-color:#FFFFFF;
	border-radius:2px;
	border:solid #999 1px;
	margin-top:4px;
	margin-bottom:4px;
	margin-left:1px;
	margin-right:1px;
}
.htmlEditPanel{
	width:120px;
	height:80px;
	border-radius:5px;
	position:absolute;
	top:39px;
	left:-25px;
	background-color:#F1F1F1;
	border:solid 1px #BDC2CC;
	display:none;
	padding-top:8px;
}
.input_container{
	background-color:#FFFFFF;
	border-radius:5px;
	width:200px;
	height:26px;
	padding-left:5px;
	padding-right:5px;
	padding-top:1px;
	margin-left:auto;
	margin-right:auto;
}
.input_element{
	width:200px;
	height:23px;
	border:0px;
	color:#679596;
}
.row{
height:100%;
}
.tableCell{
height:1px;
}
.cell{
min-height:100%;
display:inline-block;
width:100%;
max-width:1000px;
overflow-x:auto;
word-wrap:normal;
position:relative;
top:2px;
}
@-moz-document url-prefix(){
html{
	position:absolute;
	top:0;
	left:0;
	width:100%;
	height:100%;
	margin:0;
	overflow:auto;
}
body{
	margin:0;
	position:absolute;
	top:0;
	left:0;
	background-color:#FDFDFD;
}
.tableCell{
height:100%;
}
.cell{
	min-height:100%;
display:inline-block;
width:100%;
max-width:1000px;
overflow-x:auto;
word-wrap:normal;
position:relative;
top:0px;
}
}
p{
margin:0px;
}
.pseudo_link{
	text-decoration:underline;
	color:#226CEB;
	cursor:pointer;
}
.selectColumns{
	max-width:160px;
	border-radius:5px;
	border:solid #999 1px;
	background-color:#FFFFFF;
}
#rows_counter{
	width:250px;
	white-space:nowrap;
	display:inline-block;
	overflow:hidden;
	text-overflow:ellipsis;
	padding-top:3px;
}
.row_cnt{
	color:#FFFFFF;
	background-color:#0E0E49;
	padding:1px;
	border-radius:3px;
	font-size:14px;
}
#selectCols{
	display:inline-block;
	height:105px;
	border-radius:5px;
	border: solid 1px #BDC2CC;
	overflow:auto;
	width:250px;
}
.chkbox{
	cursor:pointer;
}
.radI{
	cursor:pointer;
}
.butCols{
	background-color:#FFFFFF;
	border:solid 1px #BDC2CC;
	border-radius:5px;
	cursor:pointer;
}
#selectTables{
	display:inline-block;
	height:155px;
	border-radius:5px;
	border: solid 1px #BDC2CC;
	overflow:auto;
	width:270px;
}
.butTables{
	background-color:#CC8D00;
	color:#fff;
	border:solid 1px #BDC2CC;
	border-radius:5px;
	cursor:pointer;
}
</style>
<?php if (isset($_SESSION['CSRFdb'])) echo "<script> MY_CSRF='".$_SESSION['CSRFdb']."';</script>";?>
</head>
<body>
<?php enc_build()?>
<div id="top">
<table style="width:100%;height:100%">
<tr style="width:100%">
<td id="banner">
Access MySQLi <br>
<?php echo $GLOBALS["TR"]["Version"][$GLOBALS["LANG"]].' '.$VERSION;?>
</td>
<td style="width:28%;padding-left:10px;padding-right:10px;padding-top:10px;;vertical-align:text-top;" id="search_db_td">
<div id="search">
<input type="text" id="searchbar"></input>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<svg viewBox="0 0 100 110" style="width:25px;position:absolute;top:3px;right:7px;cursor:pointer;" id="searchsvg" onclick="searchTable()">
<path d="M 55.71,50.62 L 48.92,44.35 L 14.81,81.34 L 21.61,87.61 Z" fill="#CCCCCC" id="searchp"/>
<circle cx="68.26" cy="30.19" r="30" fill="#CCCCCC" id="searchc"/>
<circle cx="68.26" cy="30.19"  r="20" fill="white"/>
</svg>
<script>
$('document').ready(function(){
	$('#searchsvg').mouseover(function(){
		$('#searchp').attr('fill','#AAAAAA');
		$('#searchc').attr('fill','#AAAAAA');
	});
	$('#searchsvg').mouseout(function(){
		$('#searchp').attr('fill','#CCCCCC');
		$('#searchc').attr('fill','#CCCCCC');
	});
});
</script>
</div>
<div style="padding-left:10px;padding-right:10px;">
<span id="rows_counter"></span>
<span class="pseudo_link" onclick="advancedSearch(1)" id="advsrclink" style="float:right;"><?php echo $GLOBALS["TR"]["Search_settings"][$GLOBALS["LANG"]]?></span>
</div>
<div id="advsrc" my_state="0">
<div style="position:absolute;right:7px;top:2px;">
<span onclick="advancedSearch(0)" class="pseudo_link closing" title="<?php echo $GLOBALS["TR"]["Close"][$GLOBALS["LANG"]]?>">x</span>
</div>
<span style="font-weight:bold"><?php echo $GLOBALS["TR"]["Match"][$GLOBALS["LANG"]]?></span><br>
<input type="radio" class="radI" name="matchcr" id="radExact" value="ex"><?php echo $GLOBALS["TR"]["Exact_cell"][$GLOBALS["LANG"]]?></input><br>
<input type="radio" class="radI" name="matchcr" id="radCnt" value="cnt" checked="true"><?php echo $GLOBALS["TR"]["Contains"][$GLOBALS["LANG"]]?></input><br>
<input type="radio" class="radI" name="matchcr" id="radBgn" value="bgn"><?php echo $GLOBALS["TR"]["Begins_with"][$GLOBALS["LANG"]]?></input><br>
<input type="radio" class="radI" name="matchcr" id="radEnd" value="end"><?php echo $GLOBALS["TR"]["Ends_with"][$GLOBALS["LANG"]]?></input><br>
<input type="radio" class="radI" name="matchcr" id="radWrd" value="wrd"><?php echo $GLOBALS["TR"]["Word"][$GLOBALS["LANG"]]?></input><br>
<input type="radio" class="radI" name="matchcr" id="radRg" value="rg"><?php echo $GLOBALS["TR"]["RegEx_only"][$GLOBALS["LANG"]]?></input><br><br>
<span style="font-weight:bold"><?php echo $GLOBALS["TR"]["Only_rows_containing"][$GLOBALS["LANG"]]?>: </span><input type="checkbox" class="chkbox" name="onlyRows" id="onlyRows"><br><br>
<span style="font-weight:bold"><?php echo $GLOBALS["TR"]["Upper_lower"][$GLOBALS["LANG"]]?>: </span><input type="checkbox" checked="true" class="chkbox" name="minMaj" id="minMaj"><br><br>
<table><tr><td style="vertical-align:text-top;padding-right:10px;text-align:center;"><span style="font-weight:bold"><?php echo $GLOBALS["TR"]["Search_cols"][$GLOBALS["LANG"]]?><br>
<button type="button" class="butCols" onclick="allCols()" style="margin-bottom:10px;margin-top:4px;"><?php echo $GLOBALS["TR"]["All_cols"][$GLOBALS["LANG"]]?></button><br>
<button type="button" class="butCols" onclick="noCol()"><?php echo $GLOBALS["TR"]["No_col"][$GLOBALS["LANG"]]?></button>
</span></td><td><span id="selectCols"></span></td></tr></table>
<div style="font-size:14px;"><span style="font-weight:bold"><?php echo $GLOBALS["TR"]["Note"][$GLOBALS["LANG"]]?>:</span> <?php echo $GLOBALS["TR"]["First3_settings"][$GLOBALS["LANG"]]?></div>
</div>
<script>
function advancedSearch(arg){
		wait(function(){
			setTimeout(function(){
		if (arg==0){ $('#advsrc').slideUp();
		$('#advsrclink').attr('onclick','advancedSearch(1)');
		document.getElementsByTagName('body')[0].removeShaddow();
		document.getElementById('table_html_td').removeShaddow();
		document.getElementById('settings_td').removeShaddow();
		$('#advsrc').attr('my_state',0);
		}
		else{
		$('#advsrc').slideDown();
		$('#advsrclink').attr('onclick','advancedSearch(0)');
		document.getElementsByTagName('body')[0].createShaddow(function(){
			advancedSearch(0);
		});
		document.getElementById('table_html_td').createShaddow(function(){
			advancedSearch(0);
		});
		document.getElementById('settings_td').createShaddow(function(){
			advancedSearch(0);
		});
		$('#advsrc').attr('my_state',1);
		}
			});
		});
	}
function allCols(){
	for (var i=0;i<tot['columns'].length;i++){
		document.getElementById('selcol'+i).checked=true;
	}
}
function noCol(){
	for (var i=0;i<tot['columns'].length;i++){
		document.getElementById('selcol'+i).checked=false;
	}
}
function checkChecked(id){
	if (document.getElementById(id).checked==true) return true;
	return false;
}
function buildSearchObject(){
	var theString=$('#searchbar').val();
	var reg;
	if (theString==null||theString=='') reg=false;
	else{
	if (checkChecked('radExact')) reg='^'+escapeForRegex(theString)+'$';
	else if (checkChecked('radCnt')) reg=''+escapeForRegex(theString)+'';
	else if (checkChecked('radEnd')) reg=''+escapeForRegex(theString)+'$';
	else if (checkChecked('radBgn')) reg='^'+escapeForRegex(theString)+'';
	else if (checkChecked('radWrd')) reg='(\\s|^)'+escapeForRegex(theString)+'(\\s|$)';
	else if (checkChecked('radRg')) reg=''+theString;
	else reg=''+escapeForRegex(theString)+'';
	reg=reg.replace(/\s/g,'(\\s)+');
	var flag;
	if (!(checkChecked('minMaj'))) flag='gi';
	else flag='g';
	reg=new RegExp(reg,flag);
	}
	var cols;
	if (typeof tot['columns']==='undefinded'||tot['columns']==null||!(tot['columns'].length>0)) cols=false;
	else {
	cols=[];
	for (var i=0;i<tot['columns'].length;i++) {
		if (checkChecked('selcol'+i)) cols.push(i);
	}
	}
	if (!(checkChecked('onlyRows'))) rowsOnly=false;
	else rowsOnly=true;
	return { 'regex':reg,
	'columns':cols,
	'rowsOnly':rowsOnly
	}
}
</script>
<div id="db_and_table" style="border:solid 1px #BDC2CC;border-radius:5px;height:60px;width:500px;"><table><tr><td>
<div style="margin-top:5px;padding-left:20px;width:350px;white-space:nowrap;text-overflow:ellipsis;overflow-x:hidden;"><?php echo $GLOBALS["TR"]["Current_db"][$GLOBALS["LANG"]]?>: <span title="<?php echo htmlspecialchars($_SESSION['instancedb'][$_GET['instance']]['actdb']);?>" style="font-weight:bold;"><?php echo htmlspecialchars($_SESSION['instancedb'][$_GET['instance']]['actdb']);?></span></div>
<div style="padding-left:20px;margin-top:5px;" id="table_sel"><?php echo $GLOBALS["TR"]["Current_tbl"][$GLOBALS["LANG"]]?>:
<?php
echo create_table_scrollbar($conn);
?></div>
</div></td><td style="padding-top:5px;padding-left:12px;"><span title="<?php echo $GLOBALS["TR"]["Change_db"][$GLOBALS["LANG"]]; ?>">
<?php echo create_logout_button(TRUE,'width:40px;height:40px;cursor:pointer;','logoutdb()');?></span>
</td><td style="padding-left:12px;padding-top:5px;"><span title="Log out"><?php echo create_logout_button(FALSE,'width:40px;height:40px;cursor:pointer;','logout()');?></span>
</td></tr></table>
</td>
<td style="width:55%;vertical-align:top;padding-top:3px;padding-left:5px;padding-right:5px;border-radius:10px;" id="table_html_td">
<div style="text-align:center;border:solid 1px #BDC2CC;border-radius:5px;height:60px;">
<div id="act_tabel_buttons">
<div style="font-weight:bold;margin-bottom:2px;"><?php echo $GLOBALS["TR"]["Tbl_actions"][$GLOBALS["LANG"]]?>:</div>
<?php
if(!(isset($GLOBALS['DEFAULTDBS'])&&isset($GLOBALS['DEFAULTDBS']['tables'][$_SESSION['instancedb'][$_GET['instance']]['actdb']])&&$GLOBALS['DEFAULTDBS']['tables'][$_SESSION['instancedb'][$_GET['instance']]['actdb']]!==NULL)){
 echo '<span title="'.$GLOBALS["TR"]["Create_tbl"][$GLOBALS["LANG"]].'">'.create_plus_button("ge_cr('tbl2')",'width:35px;height:35px;').'</span>'.str_repeat('&nbsp;',5).'<span title="'.$GLOBALS["TR"]["Delete_tbl"][$GLOBALS["LANG"]].'">'.create_x_button('droptbl()','width:35px;height:35px;').'</span>'.str_repeat('&nbsp;',5);
 echo '<span title="'.$GLOBALS["TR"]["Rename_tbl"][$GLOBALS["LANG"]].'">'.create_rename_logo("create_rename_table()",'width:39px;height:35px;cursor:pointer').str_repeat('&nbsp;',5);
echo '<span title="'.$GLOBALS["TR"]["Copy_tbl"][$GLOBALS["LANG"]].'">'.create_double_table_logo("create_copy_table()",'width:35px;height:35px;cursor:pointer').str_repeat('&nbsp',5);
}
echo '<span title="'.$GLOBALS["TR"]["Order"][$GLOBALS["LANG"]].'">'.create_order_logo("createOrder()",'width:35px;height:35px;cursor:pointer',TRUE).'</span>'.str_repeat('&nbsp;',5);
echo '<span title="'.$GLOBALS["TR"]["Backup_db_tbl"][$GLOBALS["LANG"]].'">'.create_download_logo("create_backup()",'width:35px;height:35px;cursor:pointer').str_repeat('&nbsp;',5);
echo '<span title="'.$GLOBALS["TR"]["Import_db_tbl"][$GLOBALS["LANG"]].'">'.create_upload_logo("create_upload()",'width:35px;height:35px;cursor:pointer').str_repeat('&nbsp;',5);
?>
</div>
<div id="act_search_buttons" style="display:none">
<div style="font-weight:bold;margin-bottom:2px;"><?php echo $GLOBALS["TR"]["Search_actions"][$GLOBALS["LANG"]]?>:</div>
<?php
echo '<span title="'.$GLOBALS["TR"]["Back"][$GLOBALS["LANG"]].'">'.create_home_logo("closeSearch()",'width:45px;height:31.5px;cursor:pointer').'</span>'.str_repeat('&nbsp;',2);
echo '<span title="'.$GLOBALS["TR"]["Only_rows_containing"][$GLOBALS["LANG"]].'" id="eye_button_span">'.create_view_logo("showResults(1)",'width:45px;height:31.5px;cursor:pointer').'</span>'.str_repeat('&nbsp;',2);
echo '<span title="'.$GLOBALS["TR"]["Order"][$GLOBALS["LANG"]].'">'.create_order_logo("createOrder()",'width:35px;height:35px;cursor:pointer',TRUE).'</span>';?>
</div>
</div>
</div><div style="height:5px;"></div><table style="width:100%"><tr><td style="width:90%">
<!--HTML edit-->
<div style="text-align:center;border:solid 1px #BDC2CC;border-radius:5px;height:53px;position:relative;" tabindex="2" id="editHtmlDiv" onmousedown="htmlEditor.focusedDiv(event)">
<span title="<?php echo $GLOBALS["TR"]["Style_CSS"][$GLOBALS["LANG"]]?>" style="position:relative;top:16px;margin:3px;font-weight:bold;">CSS<input type="checkbox" style="position:relative;top:1px;cursor:pointer;" id="htmlUseCss" onchange="htmlEditor.useCss(this)"/></span>
<button class="htmlToggle" id="htmlBold" onclick="htmlEditor.bold(this)" style="font-weight:700;" title="<?php echo $GLOBALS["TR"]["Bold"][$GLOBALS["LANG"]]?>">B</button>
<button class="htmlToggle" id="htmlItalic" onclick="htmlEditor.italic(this)" style="font-style:italic;font-weight:bold;" title="<?php echo $GLOBALS["TR"]["Italic"][$GLOBALS["LANG"]]?>">I</button>
<button class="htmlToggle" id="htmlUnder" onclick="htmlEditor.under(this)" style="text-decoration:underline;font-weight:bold;" title="<?php echo $GLOBALS["TR"]["Underline"][$GLOBALS["LANG"]]?>">U</button>
<div style="display:inline;position:relative;"><button class="htmlToggle" onclick="htmlEditor.link()" style="text-decoration:underline;font-weight:bold;" title="<?php echo $GLOBALS["TR"]["Add_link"][$GLOBALS["LANG"]]?>"><?php echo $GLOBALS["TR"]["Link"][$GLOBALS["LANG"]]?></button>
<div id="linkPanel" class="htmlEditPanel" style="height:160px;padding-top:0px;left:-125px;width:300px;"><br>
<div class="input_container"><input type="text" id="htmlLink" myval="<?php echo $GLOBALS["TR"]["Link_addr"][$GLOBALS["LANG"]]?>" value="<?php echo $GLOBALS["TR"]["Link_addr"][$GLOBALS["LANG"]]?>" class="input_element"></input></div>
<a href="javascript:htmlEditor.followLink()" style="float:left;margin-left:50px;position:"><?php echo $GLOBALS["TR"]["Follow_link"][$GLOBALS["LANG"]]?></a><br>
<div class="input_container" style="position:relative;top:5px;"><input type="text" id="htmlLinkText" myval="<?php echo $GLOBALS["TR"]["Link_txt"][$GLOBALS["LANG"]]?>" value="<?php echo $GLOBALS["TR"]["Link_txt"][$GLOBALS["LANG"]]?>" class="input_element"></input></div><br>
<span style="position:relative;top:-6px;"><?php echo $GLOBALS["TR"]["Link_new_tab"][$GLOBALS["LANG"]];?><input style="position:relative;top:1px;cursor:pointer;" type="checkbox" id="htmlLinkBlank"/></span><br>
<button class="htmlToggle" onclick="htmlEditor.linkSave()" style="font-weight:bold;position:relative;top:0px;" title="<?php echo $GLOBALS["TR"]["Add_link"][$GLOBALS["LANG"]]?>"><?php echo $GLOBALS["TR"]["Add_link"][$GLOBALS["LANG"]]?></button>
</div></div>
<select onchange="htmlEditor.color()" id="htmlColor" title="<?php echo $GLOBALS["TR"]["Text_color"][$GLOBALS["LANG"]]?>" class="htmlSelect"><option value="rgb(0, 0, 0)"><?php echo $GLOBALS["TR"]["Black"][$GLOBALS["LANG"]]?></option><option value="rgb(255, 0, 0)"><?php echo $GLOBALS["TR"]["Red"][$GLOBALS["LANG"]]?></option><option value="rgb(0, 0, 255)"><?php echo $GLOBALS["TR"]["Blue"][$GLOBALS["LANG"]]?></option><option value="rgb(0, 255, 0)"><?php echo $GLOBALS["TR"]["Green"][$GLOBALS["LANG"]]?></option><option value="rgb(255, 255, 0)"><?php echo $GLOBALS["TR"]["Yellow"][$GLOBALS["LANG"]]?></option></select>
<select onchange="htmlEditor.dim()" id="htmlDim" title="<?php echo $GLOBALS["TR"]["Text_size"][$GLOBALS["LANG"]]?>" class="htmlSelect" value="3"><option value="2"><?php echo $GLOBALS["TR"]["Small"][$GLOBALS["LANG"]]?></option><option value="3"><?php echo $GLOBALS["TR"]["Normal"][$GLOBALS["LANG"]]?></option><option value="5"><?php echo $GLOBALS["TR"]["Big"][$GLOBALS["LANG"]]?></option><option value="7"><?php echo $GLOBALS["TR"]["Huge"][$GLOBALS["LANG"]]?></option></select>
<div style="display:inline;position:relative;"><button class="htmlToggle" onclick="htmlEditor.list()" style="font-weight:bold;" title="<?php echo $GLOBALS["TR"]["Add_list"][$GLOBALS["LANG"]]?>"><?php echo $GLOBALS["TR"]["List"][$GLOBALS["LANG"]]?></button>
<div id="listPanel" class="htmlEditPanel" ><button class="htmlToggle" id="htmlOl" onclick="htmlEditor.ol()" style="font-weight:bold;" title="<?php echo $GLOBALS["TR"]["Ord_list"][$GLOBALS["LANG"]]?>"><?php echo $GLOBALS["TR"]["Ordered"][$GLOBALS["LANG"]]?></button><br>
<button class="htmlToggle" id="htmlUl" onclick="htmlEditor.ul()" style="font-weight:bold;" title="<?php echo $GLOBALS["TR"]["Unord_list"][$GLOBALS["LANG"]]?>"><?php echo $GLOBALS["TR"]["Unordered"][$GLOBALS["LANG"]]?></button></div></div>
<div style="display:inline;position:relative;"><button class="htmlToggle" onclick="htmlEditor.align()" style="font-weight:bold;" title="<?php echo $GLOBALS["TR"]["Align"][$GLOBALS["LANG"]]?>"><?php echo $GLOBALS["TR"]["Align"][$GLOBALS["LANG"]]?></button>
<div id="alignPanel" class="htmlEditPanel" style="height:100px;padding-top:0px;left:-15px;"><button class="htmlToggle" id="htmlLeft" onclick="htmlEditor.left()" style="font-weight:bold;" title="<?php echo $GLOBALS["TR"]["Left"][$GLOBALS["LANG"]]?>"><?php echo $GLOBALS["TR"]["Left"][$GLOBALS["LANG"]]?></button><br>
<button class="htmlToggle" id="htmlCenter" onclick="htmlEditor.center()" style="font-weight:bold;" title="<?php echo $GLOBALS["TR"]["Centre"][$GLOBALS["LANG"]]?>"><?php echo $GLOBALS["TR"]["Centre"][$GLOBALS["LANG"]]?></button><br>
<button class="htmlToggle" id="htmlRight" onclick="htmlEditor.right()" style="font-weight:bold;" title="<?php echo $GLOBALS["TR"]["Right"][$GLOBALS["LANG"]]?>"><?php echo $GLOBALS["TR"]["Right"][$GLOBALS["LANG"]]?></button>
</div></div>
<div id="editHTMLMask" style="position:absolute;top:0px;left:0px;width:100%;height:100%;border-radius:inherit;background-color:#FFFFFF;opacity:0.5;" onclick="gen_info('<?php echo $GLOBALS["TR"]["HTML_disabled"][$GLOBALS["LANG"]]?>')"></div>
</div>
<!-- *HTML edit-->
</td>
<td style="text-align:right;"><?php echo create_pquery_button('height:35px;width:70px;');?></td></tr></table>
</td>
<td id="settings_td" style="border-radius:10px;"><div><span title="<?php echo $GLOBALS["TR"]["Settings"][$GLOBALS["LANG"]]?>"><?php echo create_settings_logo('gen_settings()','width:50px;height:50px;cursor:pointer;',TRUE)?></span></div>
<div style="padding-top:10px;" title="<?php echo $GLOBALS["TR"]["New_row"][$GLOBALS["LANG"]]?>">
<?php echo create_plus_row_button('newRow()') ?>
</div>
</td>
</tr>
</table>
</div>
<div id="fill_div">&nbsp;</div>
<div id="main_table">
</div>
<script>
//HTML Edit
var isHtmlClicked=false;
var currentFocusedCell=null;
var isHtmlActive=false;
var pendingSearch=null;
var nextToFocus=null;
var pendingRowMove=0;
$(document).ready(function(){
	setInterval(function(){
		if (isHtmlActive){
		if (document.queryCommandState('styleWithCss')==true){
			$('#htmlUseCss').prop('checked',true);
		}
		else{
			$('#htmlUseCss').prop('checked',false);
		}
		if (document.queryCommandState('bold')==true){
			$('#htmlBold').css('background-color','#F1F0FF');
		}
		else $('#htmlBold').css('background-color','#D6D2F7');
		if (document.queryCommandState('italic')==true){
			$('#htmlItalic').css('background-color','#F1F0FF');
		}
		else $('#htmlItalic').css('background-color','#D6D2F7');
		if (document.queryCommandState('underline')==true){
			$('#htmlUnder').css('background-color','#F1F0FF');
		}
		else $('#htmlUnder').css('background-color','#D6D2F7');
		var colorValue=document.queryCommandValue('foreColor');
		if (colorValue!=null) $('#htmlColor').val(colorValue);
		var dimValue=document.queryCommandValue('fontSize');
		if (dimValue!=null) $('#htmlDim').val(dimValue);
		if (document.queryCommandState('insertUnorderedList')==true){
			$('#htmlUl').css('background-color','#F1F0FF');
		}
		else $('#htmlUl').css('background-color','#D6D2F7');
		if (document.queryCommandState('insertOrderedList')==true){
			$('#htmlOl').css('background-color','#F1F0FF');
		}
		else $('#htmlOl').css('background-color','#D6D2F7');
		if (document.queryCommandState('justifyLeft')==true){
			$('#htmlLeft').css('background-color','#F1F0FF');
		}
		else $('#htmlLeft').css('background-color','#D6D2F7');
		if (document.queryCommandState('justifyCenter')==true){
			$('#htmlCenter').css('background-color','#F1F0FF');
		}
		else $('#htmlCenter').css('background-color','#D6D2F7');
		if (document.queryCommandState('justifyRight')==true){
			$('#htmlRight').css('background-color','#F1F0FF');
		}
		else $('#htmlRight').css('background-color','#D6D2F7');
		}
	},10);
});
$(document).ready(function(){
	$('#searchbar').keydown(function(event){
		if (event.keyCode=='13') searchTable();
	});
});
var htmlEditor={
	selection:null,
	useCss(bu){
		if (bu.checked){
			document.execCommand('styleWithCss',false,true);
		}
		else{
			document.execCommand('styleWithCss',false,false);
		}
	},
	bold:function(bu){
		document.execCommand('bold',false,null);
	},
	italic:function(bu){
		document.execCommand('italic',false,null);
	},
	under:function(bu){
		document.execCommand('underline',false,null);
	},
	color:function(bu){
	var color=$('#htmlColor').val();
		document.execCommand('foreColor',false,color);
	},
	dim:function(){
		var dimen=$('#htmlDim').val();
		document.execCommand('fontSize',false,dimen);
	},
	link:function(){
		htmlEditor.saveSelection();
			$('#alignPanel').slideUp();
		$('#listPanel').slideUp();
		$('#linkPanel').slideToggle();
	},
	colorChange:function(buu){
		if (typeof buu.style.backgroundColor!='undefined'&&buu.style.backgroundColor!=' '&&buu.style.backgroundColor!=null&&buu.style.backgroundColor!=''&&buu.style.backgroundColor!='#D6D2F7'&&buu.style.backgroundColor!='rgba(214, 210, 247, 1)'&&buu.style.backgroundColor!='rgba(214,210,247,1)'&&buu.style.backgroundColor!='rgb(214, 210, 247)'&&buu.style.backgroundColor!='rgb(214,210,247)'){
			buu.style.backgroundColor='#D6D2F7';
		}
		else buu.style.backgroundColor='#F1F0FF';
	},
	init:function(){
		$('#editHTMLMask').hide();
		isHtmlActive=true;
		document.execCommand('styleWithCss',false,true);
	},
	exit:function(){
		htmlEditor.selection=null;
		isHtmlActive=false;
		$('.htmlEditPanel').slideUp();
		$('#editHTMLMask').show();
	},
	list:function(){
		htmlEditor.saveSelection();
		$('#alignPanel').slideUp();
		$('#linkPanel').slideUp();
		$('#listPanel').slideToggle();
	},
	ul:function(){
		htmlEditor.restoreSelection();
		document.execCommand('insertUnorderedList',false,null);
	},
	ol:function(){
		htmlEditor.restoreSelection();
		document.execCommand('insertOrderedList',false,null);
	},
	align:function(){
		htmlEditor.saveSelection();
		$('#linkPanel').slideUp();
		$('#listPanel').slideUp();
		$('#alignPanel').slideToggle();
	},
	left:function(){
		htmlEditor.restoreSelection();
		document.execCommand('justifyLeft',false,null);
	},
	center:function(){
		htmlEditor.restoreSelection();
		document.execCommand('justifyCenter',false,null);
	},
	right:function(){
		htmlEditor.restoreSelection();
		document.execCommand('justifyRight',false,null);
	},
	saveSelection:function(){
		 if (window.getSelection) {
        sel = window.getSelection();
        if (sel.getRangeAt && sel.rangeCount) {
            var ranges = [];
            for (var i = 0, len = sel.rangeCount; i < len; ++i) {
                ranges.push(sel.getRangeAt(i));
            }
            htmlEditor.selection=ranges;
        }
    } else if (document.selection && document.selection.createRange) {
        htmlEditor.selection=document.selection.createRange();
    }
	},
	restoreSelection:function(){
		savedSel=htmlEditor.selection;
		if (savedSel) {
        if (window.getSelection) {
            sel = window.getSelection();
            sel.removeAllRanges();
            for (var i = 0, len = savedSel.length; i < len; ++i) {
                sel.addRange(savedSel[i]);
            }
        } else if (document.selection && savedSel.select) {
            savedSel.select();
        }
    }
	},
	buildLink:function(){
		var input1=document.getElementById('htmlLink');
		if (input1.style.color!="#000000"&&input1.style.color!="rgb(0, 0, 0)"&&input1.style.color!="rgb(0,0,0)"&&input1.style.color!="RGB(0,0,0)"&&input1.style.color!="RGB(0, 0, 0)"&&input1.style.color!="black"&&input1.style.color!="BLACK"){
			return {adr:false,txt:false};
		}
		else{
			var addr=input1.value;
		if (!((/^\w+:\/\//).test(addr))) addr='http://'+addr;
		var input2=document.getElementById('htmlLinkText');
		var text;
		if (input2.style.color!="#000000"&&input2.style.color!="rgb(0, 0, 0)"&&input2.style.color!="rgb(0,0,0)"&&input2.style.color!="RGB(0,0,0)"&&input2.style.color!="RGB(0, 0, 0)"&&input2.style.color!="black"&&input2.style.color!="BLACK"){
		text=addr
		}
		else text=input2.value;
		return {adr:addr,txt:text};
	}},
	followLink:function(){
		var lnk=htmlEditor.buildLink();
		if (lnk.adr!=false) window.open(lnk.adr);
		else alert('<?php echo $GLOBALS["TR"]["bad_link"][$GLOBALS["LANG"]]?>');
	},
	linkSave:function(){
		var lnk=htmlEditor.buildLink();
		if (lnk.adr!=false){
		var targetBlank='';
		if ($('#htmlLinkBlank').prop('checked')) targetBlank='target="_blank"';
		var linkHtml='<a href="'+lnk.adr+'" '+targetBlank+' >'+lnk.txt+'</a>';
		htmlEditor.restoreSelection();
		document.execCommand('insertHTML',false,linkHtml);
		htmlEditor.link();
		}
		else alert('<?php echo $GLOBALS["TR"]["bad_link"][$GLOBALS["LANG"]]?>');
	},
	focusedDiv:function(event){
		isHtmlClicked=true;
	},
	blurredDiv:function(event){
		isHtmlClicked=false;
		if (currentFocusedCell!=null){
			blurdiv(currentFocusedCell,'nimic');
		}
	}
};
$.fn.clickOff = function(callback, selfDestroy) {
    var clicked = false;
    var parent = this;
    var destroy = selfDestroy || true;
    parent.mousedown(function() {
        clicked = true;
    });

    $(document).mousedown(function(event) {
	if(event.target == $('html')[0]) clicked=true;
		if ($(event.target).parents('.tableCell2').length==0&&$(event.target).attr('class')!='tableCell2'&&!clicked){
			 callback(parent, event);
        }
        clicked = false;
    });
};
$('#editHtmlDiv').clickOff(function(){
	htmlEditor.blurredDiv();
});
//*HTML Edit
var tot;
var order;
var settings;
$('document').ready(function(){
	settings=JSON.parse('<?php
	if (isset($_SESSION['instancedb'][$_GET['instance']]['mysettings'])) echo escapenl(addslashes(json_encode($SETTINGS)));
	else echo escapenl(addslashes(json_encode($DEFAULTSET)));?>');
	getContents();
});
function getContents(){
document.getElementsByTagName('body')[0].createPreloader();
	$.post('<?php echo $GLOBALS['PHP_SELF_INSTANCE'];?>&act=get_contents&ajax=true',{CSRF:(typeof MY_CSRF !='undefined')?MY_CSRF:''},function(result){
		document.getElementsByTagName('body')[0].removePreloader();
		var ree=JSON.parse(result);
		if (ree['stat']=='con_err') gen_error(ree['con_err']);
		if (ree['stat']=='fail') gen_error(ree['error']);
		if (ree['stat']=='success') {
		tot=ree['all'];
		putContents();
		}
	});
}
function putContents(){
	document.getElementsByTagName('body')[0].createShaddow();
	setTimeout(function(){
	var additionalStyle='style="border:solid 1px transparent;"';
	var contentEditable='';
	var tabCellType='';
	if (typeof settings['editDimension']!='undefined'&&settings['editDimension']=="1"){ additionalStyle='style="border:solid 1px transparent;max-height:100px;overflow:hidden;max-width:150px;word-wrap:break-word;"';
	}
	var cnt='<table border="3" style="margin-left:auto;margin-right:auto;"><tr id="tableHead">';
	var i,j;
	for(i=0;i<tot['columns'].length;i++){
		cnt+='<th id="col'+i+'" style="cursor:move;"><table border="0" style="margin-left:auto;margin-right:auto;"><td title="<?php echo $GLOBALS["TR"]["Del_col"][$GLOBALS["LANG"]]?>"><svg viewBox="0 0 100 100" style="width:15px;height:15px;cursor:pointer;position:relative;top:2px;" onclick="deleteColumn('+i+')">\
	<path d="M 83.34,93.69 L 50,60.35 L 16.66,93.69 L 6.31,83.34 L 39.65,50 L 6.31,16.66 L 16.66,6.31 L 50,39.65 L 83.34,6.31 L 93.69, 16.66 L 60.35,50 L 93.69,83.34 Z" fill="#FF0000" stroke="#FFFFFF" stroke-width="2" onmouseover="this.setAttribute(\'fill\',\'#FF2423\')" onmouseout="this.setAttribute(\'fill\',\'#FF0000\')" />\
	</svg></td><td>'+htmlspecialchars(tot['columns'][i])+'</td><td title="<?php echo $GLOBALS["TR"]["Edit_col"][$GLOBALS["LANG"]]?>"><svg viewBox="0 0 300 500" onclick="createAddChangeColumn(1,'+i+')" style="width:15px;height:25px;cursor:pointer;">\
	<path d="M 27.78,351.26 L 177.78,45.47 L 264.59,88.05 L 114.59,393.84 Z" fill="#FFD753"/>\
	<path d="M 27.78,351.26 L 114.59,393.84 L 59.09,440.48 L 24.86,423.68 Z" fill="#FFEDB8"/>\
	<path d="M 59.09,440.48 L 24.86,423.68 L 22.96,470.84 Z" fill="#000000"/>\
	</svg></td></table></th>';
	}
	cnt+='<td id="addColumnTd" style="vertical-align:middle;"><span title="<?php echo $GLOBALS["TR"]["New_col"][$GLOBALS["LANG"]]?>" style="width:30px;height:30px;position:relative;top:1px;"><?php echo escapenl(addslashes(create_plus_button('createAddChangeColumn(0,0)','width:30px;height:30px;'))); ?></span></td>';
	cnt+='</tr>';
	for (i=0;i<tot['rows'].length;i++){
		cnt+='<tr id="row'+i+'" class="row">';
		for (j=0;j<tot['columns'].length;j++){
			if (tot['data-types'][j].toLowerCase().indexOf("auto_increment")!=-1) {contentEditable='contenteditable="false"';
			tabCellType='tableCell1';
			}
			else {contentEditable=' contenteditable="true" onfocus="focusdiv(this,event)" ';
			tabCellType='tableCell2';
			}
			if (typeof tot['rows'][i][0][tot['columns'][j]] =='undefined'|| tot['rows'][i][0][tot['columns'][j]]==null){
				if (typeof settings['editHTML']!='undefined'&&settings['editHTML']=="1"&&(tot['data-types'][j].toUpperCase()=='TEXT'||tot['data-types'][j].toUpperCase()=='TINYTEXT'||tot['data-types'][j].toUpperCase()=='MEDIUMTEXT'||tot['data-types'][j].toUpperCase()=='LONGTEXT')){
			cnt+='<td class="tableCell '+tabCellType+'"><div class="cell" my_html="yes" onpaste="pastePaste(this,event)" '+additionalStyle+contentEditable+' id="cell'+i+';'+j+'"></div></td>';}
			else
				cnt+='<td class="tableCell '+tabCellType+'"><div class="cell" onpaste="pastePaste(this,event)" '+additionalStyle+contentEditable+' id="cell'+i+';'+j+'"></div></td>';
			}
			else{ if (settings['editHTML']=="1"&&(tot['data-types'][j].toUpperCase()=='TEXT'||tot['data-types'][j].toUpperCase()=='TINYTEXT'||tot['data-types'][j].toUpperCase()=='MEDIUMTEXT'||tot['data-types'][j].toUpperCase()=='LONGTEXT')){
			cnt+='<td class="tableCell '+tabCellType+'"><div class="cell" onpaste="pastePaste(this,event)" my_html="yes" '+additionalStyle+contentEditable+' id="cell'+i+';'+j+'">'+prepareHtml(tot['rows'][i][0][tot['columns'][j]])+'</div></td>';}
			else
			cnt+='<td class="tableCell '+tabCellType+'"><div class="cell" onpaste="pastePaste(this,event)" '+additionalStyle+contentEditable+' id="cell'+i+';'+j+'">'+prepareToShow(tot['rows'][i][0][tot['columns'][j]])+'</div></td>';}
		}
		cnt+='<td style="vertical-align:middle">&nbsp;<span title="<?php echo $GLOBALS["TR"]["Del_row"][$GLOBALS["LANG"]]?>" style="height:20px;width:20px;position:relative;top:1px;cursor:pointer;" onclick="delRow('+i+')"><?php echo escapenl(addslashes(create_x_button(FALSE,'width:20px;height:20px;'))); ?></span>&nbsp;&nbsp;<span title="<?php echo $GLOBALS["TR"]["Duplicate_row"][$GLOBALS["LANG"]]?>" style="height:20px;width:20px;position:relative;top:1px;cursor:pointer;" onclick="doubleRow('+i+')"><?php echo escapenl(addslashes(create_double_row_logo('width:40px;height:20px;'))); ?></span></td></tr>';
	}
	cnt+='</table>';
	$('#main_table').html(cnt);
	$('#rows_counter').html('<span title="<?php echo $GLOBALS["TR"]["Rows_count"][$GLOBALS["LANG"]]?>: '+tot['rows'].length+'"><?php echo $GLOBALS["TR"]["Rows_count"][$GLOBALS["LANG"]]?>: <span class="row_cnt">'+tot['rows'].length+'</span></span>');
	$('.cell[contenteditable=true]').keydown(function(event){
		if (event.keyCode=='9'){
			event.preventDefault();
		var col=getColumnFromCell(event.target);
		var row=getRowFromCell(event.target);
		if (col<tot['columns'].length-1){ col++;
		if (typeof tot['primary']=='undefinded'||tot['primary']==null) nextToFocus={method:0,cell:'cell'+row+';'+col};
		else nextToFocus={method:1,column:col,primVal:tot['rows'][row][0][tot['primary']],cell:'cell'+row+';'+col}
		htmlEditor.blurredDiv();
		}
		return true;
	}
	if (event.keyCode==13){
		event.preventDefault();
		document.execCommand('insertText',false,'\n');
	}
});
	if (typeof tot!='undefined'&& typeof tot['columns']!='undefined'){
			var selCols='';
			for (var i=0;i<tot['columns'].length;i++){
				selCols+='<div class="selC"><input type="checkbox" class="chkbox" checked="true" id="selcol'+i+'"></input>&nbsp;&nbsp;'+htmlspecialchars(tot['columns'][i])+'</div>';
			}
			$('#selectCols').html(selCols);
		}
		else $('#selectCols').html('No column');
	$('#tableHead').sortable({cursor:'move',items:'> th',
	stop:function(e,ui){
		var mutat=+ui.item.attr('id').substring(3);
		var dupaCine=-1;
		var arr=document.getElementById('tableHead').getElementsByTagName('th');
	for (var i=0;i<arr.length-1;i++){
		if (+arr[i+1].getAttribute('id').substring(3)==mutat) dupaCine=+arr[i].getAttribute('id').substring(3);
	}
	var primul;
	if (dupaCine==-1) primul='DA';
	else primul='NU';
	wait(function(){
		active++;
		document.getElementsByTagName('body')[0].createPreloader();
		$.post('<?php echo $GLOBALS['PHP_SELF_INSTANCE'];?>&act=change_columns_order',{cine:tot['columns'][mutat],
		cumECine:tot['data-types'][mutat],primul:primul,dupaCine:tot['columns'][dupaCine],CSRF:(typeof MY_CSRF !='undefined')?MY_CSRF:''},
		function(result){
			var ree=JSON.parse(result);
			if (ree['stat']=='con_err'){ gen_error(ree['con_err']);
			document.getElementsByTagName('body')[0].removePreloader();
			}
			if (ree['stat']=='fail'){ gen_error(ree['error']);
			document.getElementsByTagName('body')[0].removePreloader();
			}
			if(ree['stat']=='success') getContents();
			active--;
		});
	});
	},
	helper:function(e,el){
		$('#tableHead').sortable('option','cursorAt',{left:e.offsetX,top:e.offsetY});
		var newEl=document.createElement('div');
		newEl.innerHTML='<span style="display:table-cell;vertical-align:middle">'+el[0].innerHTML+'</span>';
		newEl.style.border='solid 1px #000';
		newEl.style.backgroundColor='#FDFDFD';
		newEl.style.display="table";
		newEl.style.fontWeight="bold";
		return newEl;
	}
	,forcePlaceHolderSize:true,axis:'x',cursorAt:false,start:function(e,ui){
		ui.placeholder.css('min-width','50px');
	}
	});
	},0);
	setTimeout(function(){document.getElementsByTagName('body')[0].removeShaddow();
	if (pendingSearch!=null) doSearch(pendingSearch);
	if (nextToFocus!=null){
		if (nextToFocus.method==0){var nextToFocusT=nextToFocus.cell;
		if (document.getElementById(nextToFocusT)!=null&&$(document.getElementById(nextToFocusT)).attr('contenteditable')==true||$(document.getElementById(nextToFocusT)).attr('contenteditable')=='true') {focusAtEnd(document.getElementById(nextToFocusT));
		if (pendingRowMove!=0){
		setTimeout(function(){
			var id=nextToFocusT.substring(4);
	return id.split(';')[0];
			navigateToRow(id);},pendingRowMove);
		pendingRowMove=0;}

		}}
		else {
		var ok=false;
		for (var i=0;i<tot['rows'].length;i++){
			if (tot['rows'][i][0][tot['primary']]==nextToFocus.primVal) {
			ok=true;
			break;
			}
		}
		if (ok==true){
			var nextToFocusT='cell'+i+';'+nextToFocus.column;
			if (document.getElementById(nextToFocusT)!=null&&$(document.getElementById(nextToFocusT)).attr('contenteditable')==true||$(document.getElementById(nextToFocusT)).attr('contenteditable')=='true'){ focusAtEnd(document.getElementById(nextToFocusT));
			if (pendingRowMove!=0){setTimeout(function(){navigateToRow(i);},pendingRowMove);
			pendingRowMove=0;}
			}
		}
		else {
			var nextToFocusT=nextToFocus.cell;
		if (document.getElementById(nextToFocusT)!=null&&$(document.getElementById(nextToFocusT)).attr('contenteditable')==true||$(document.getElementById(nextToFocusT)).attr('contenteditable')=='true'){ focusAtEnd(document.getElementById(nextToFocusT));
		if (pendingRowMove!=0){
		setTimeout(function(){
			var id=nextToFocusT.substring(4);
	return id.split(';')[0];
			navigateToRow(id);},pendingRowMove);
		pendingRowMove=0;}
		}
		}}
		nextToFocus=null;
	}
	},0);
}
function tabelSelectChange(){
	wait(function(){
	var tb=$('#tabel_select').val();
	$('#main_table').html('');
	document.getElementsByTagName('body')[0].createPreloader();
	$('#act_tabel_buttons').css('display','');
	$('#act_search_buttons').css('display','none');
	pendingSearch=null;
	$.post('<?php echo $GLOBALS['PHP_SELF_INSTANCE'];?>&act=set_acttab&ajax=true',{tbl:tb,CSRF:(typeof MY_CSRF !='undefined')?MY_CSRF:''},function(result){
		ree=JSON.parse(result);
		if (ree['stat']=='con_err'){
			gen_error(ree['con_err']);
		document.getElementsByTagName('body')[0].removePreloader();
		}
		if (ree['stat']=='success'){
			getContents();
		}
	});
	});
}
//ORDER
function createOrder(){
		conerdiv=document.createElement('div');
		conerdiv.style.position="fixed";
		conerdiv.style.top="0px";
		conerdiv.style.left="0px"
		conerdiv.style.width="100%";
		conerdiv.style.height="100%";
		conerdiv.style.zIndex="6";
		conerdiv.setAttribute('class','orderdiv');
		var inne='\
		<div style="position:absolute;top:0px;left:0px;width:100%;height:100%;background-color:#000000;opacity:0.5;">&nbsp;</div>\
		<div style="opacity:1;position:absolute;top:50%;left:50%;width:600px;height:600px;padding:20px;margin-left:-320px;margin-top:-350px;background-color:#FFF2A0;border-radius:5px;">\
		<a href="javascript:closeOrder()" class="closing" style="font-size:26px;position:absolute;right:20px;top:10px;" title="<?php echo $GLOBALS["TR"]["Close"][$GLOBALS["LANG"]]?>">x</a>\
		<div style="height:30px;">\
		<?php echo escapenl(addslashes(create_order_logo(FALSE,'height:50px;width:50px;margin-left:20px;',FALSE)))?>\
		&nbsp;&nbsp;&nbsp;<span style="font-weight:bold;position:relative;top:-13px;font-size:22px;"><?php echo $GLOBALS["TR"]["ORDER"][$GLOBALS["LANG"]]?></span>\
		</div><br>\
		<div style="padding-left:20px;padding-top:20px;" id="addordercon"><span style="font-size:18px;position:relative;top:-10px;"><?php echo $GLOBALS["TR"]["Add_order_key"][$GLOBALS["LANG"]]?> </span><select id="addorder" style="position:relative;top:-10px;border-radius:5px;border:solid #999 1px;max-width:200px;background-color:#FFFFFF;">';
		inne+='</select>&nbsp; <span title="<?php echo $GLOBALS["TR"]["Add_key"][$GLOBALS["LANG"]]?>">\
		<?php echo escapenl(addslashes(create_plus_button('addOrderCr()','width:35px;height:35px;'))); ?>\
		</span></div>\
		<ul style="list-style-type:none;overflow:auto;height:420px;margin-bottom:5px;padding:20px;margin-top:0px;" id="orderMain"></ul>\
		<div style="height:50px;padding-left:150px"><?php echo $GLOBALS["TR"]["OK_to_save"][$GLOBALS["LANG"]]?><button type="button" style="cursor:pointer;position:relative;top:-5px;float:right;margin-right:25px;color:#FFFFFF;background-color:#CC8D00;width:75px;font-size:18px;" onclick="saveOrder()"><?php echo $GLOBALS["TR"]["OK"][$GLOBALS["LANG"]]?></button></div>\
		</div>';
		conerdiv.innerHTML=inne;
		if (document.getElementsByTagName('body')[0].getElementsByClassName('orderdiv').length==0){
			document.getElementsByTagName('body')[0].appendChild(conerdiv);
		}
		var ordm=document.getElementById('orderMain');
		ordm.createPreloader();
		$.post('<?php echo $GLOBALS['PHP_SELF_INSTANCE'];?>&act=getorder&ajax=true',{CSRF:(typeof MY_CSRF !='undefined')?MY_CSRF:''},function(result){
			ordm.removePreloader();
			var ree=JSON.parse(result);
			if (ree['stat']=='con_err') gen_error(ree['con_err']);
			if (ree['stat']=='fail') gen_error(ree['error']);
			if (ree['stat']=='success'){
				order=ree['all'];
			putOrder(ordm);
			}
		});
}
function putOrder(ordm){
	var inne2="",inne2num=0;
				for (var i=0;i<tot['columns'].length;i++){
			var ok=0;
			if(order!="nimic"){
			for (var j=0;j<order.length;j++){
				if (order[j]==tot['columns'][i]) ok=1;
			}}
			if (ok==0){
			inne2+='<option value="'+htmlspecialchars(tot['columns'][i])+'">'+htmlspecialchars(tot['columns'][i])+'</option>';
			inne2num++;}
		}
		if (inne2num>0){
		$('#addordercon').css('visibility','visible');
		$('#addorder').html(inne2);
			}
		else $('#addordercon').css('visibility','hidden');
		createOrder2(ordm);
}
function createOrder2(ordm){
	var intm='<br>';
	if (order!='nimic'&&order.length!=0){
				for (var i=0;i<order.length;i+=2){
					intm+='<li style="background-color:#EB0CD3;padding:20px;cursor:move;border-radius:5px;margin-bottom:30px;" class="orderfull" mycolumn="'+htmlspecialchars(order[i])+'">\
					<table><tr><td style="font-size:20px;width:400px;overflow:hidden;text-overflow:ellipsis;">'+htmlspecialchars(order[i])+'</td><td style="padding-right:5px;">\
					<select style="cursor:auto;" id="selectorder'+i+'" class="orderselect" onchange="orderChgVal(this)"><option value="ASC">ASC</option><option value="DESC">DESC</option></select>&nbsp;&nbsp;</td><td>'+'<span style="cursor:pointer;" title="<?php echo $GLOBALS["TR"]["Delete_key"][$GLOBALS["LANG"]]?>" onclick="rmOrderCr('+i+')" id="orderspan'+i+'"><?php echo escapenl(prepare(create_x_button(FALSE,'width:30px;height:30px;')));?></span>'+'</td></tr>\
					</table></li>';
				}
				intm+='<br>';
				ordm.innerHTML=intm;
				for (var i=0;i<order.length;i+=2){
					$('#selectorder'+i).val(order[i+1]);
				}
				}
				else{ intm+='<?php echo $GLOBALS["TR"]["No_order_key"][$GLOBALS["LANG"]]?>';
				ordm.innerHTML=intm;}
				$('#orderMain').sortable({axis:'y',containment:"parent",stop:function(event,ui){
					scanOrder();
					putOrder(document.getElementById('orderMain'));
				}});

}
function scanOrder(){
	var ordm=document.getElementById('orderMain');
	var arr=ordm.getElementsByClassName('orderfull');
	for (var i=0;i<arr.length;i++){
		order[2*i]=arr[i].getAttribute('mycolumn');
		order[2*i+1]=arr[i].getElementsByClassName('orderselect')[0].value;
	}
}
function closeOrder(){
	gen_prompt('closeOrder2(1)','<?php echo $GLOBALS["TR"]["Close_changes_lost"][$GLOBALS["LANG"]]?>');
}
function closeOrder2(arg){
	if (arg) close_prompt();
arr=document.getElementsByTagName('body')[0].getElementsByClassName('orderdiv');
		if (arr.length!=0){
			document.getElementsByTagName('body')[0].removeChild(arr[0]);
}
}
function addOrderCr(){
	if(order=='nimic') order=[];
	order[order.length]=$('#addorder').val();
	order[order.length]='ASC';
	putOrder(document.getElementById('orderMain'));
}
function rmOrderCr(arg){
	order.splice(arg,2);
	putOrder(document.getElementById('orderMain'));
}
function orderChgVal(t){
	var c=t.getAttribute('id');
	var d=c.split('r')[2];
	order[+d+1]=$('#'+c).val();
}
function saveOrder(){
	document.getElementsByClassName('orderdiv')[0].createPreloader();
	active++;
	$.post('<?php echo $GLOBALS['PHP_SELF_INSTANCE'];?>&act=saveorder&ajax=true',{order:order,CSRF:(typeof MY_CSRF !='undefined')?MY_CSRF:''},function(result){
		active--;
		document.getElementsByClassName('orderdiv')[0].removePreloader();
		var ree=JSON.parse(result);
		if (ree['stat']=='con_err') gen_error(ree['con_err']);
		if (ree['stat']=='fail') gen_error(ree['error']);
		if (ree['stat']=='success'){
		var arr=document.getElementsByClassName('orderdiv');
		if (arr.length!=0){
		document.getElementsByTagName('body')[0].removeChild(arr[0]);}
		}
		wait(function(){getContents();});
	});
}
//*ORDER
//SETTINGS
function gen_settings(){
	conerdiv=document.createElement('div');
		conerdiv.style.position="fixed";
		conerdiv.style.top="0px";
		conerdiv.style.left="0px"
		conerdiv.style.width="100%";
		conerdiv.style.height="100%";
		conerdiv.style.zIndex="6";
		conerdiv.setAttribute('class','settingsdiv');
		var inne='\
		<div style="position:absolute;top:0px;left:0px;width:100%;height:100%;background-color:#000000;opacity:0.5;">&nbsp;</div>\
		<div style="opacity:1;position:absolute;top:50%;left:50%;width:550px;height:600px;padding:20px;margin-left:-295px;margin-top:-305px;background-color:#FFF2A0;border-radius:5px;">\
		<a href="javascript:closeSettings()" class="closing" style="font-size:26px;position:absolute;right:20px;top:10px;" title="<?php echo $GLOBALS["TR"]["Close"][$GLOBALS["LANG"]]?>">x</a>\
		<div style="height:30px;">\
		<?php echo escapenl(addslashes(create_settings_logo(FALSE,'height:50px;width:50px;margin-left:20px;',FALSE)))?>\
		&nbsp;&nbsp;&nbsp;<span style="font-weight:bold;position:relative;top:-13px;font-size:22px;"><?php echo $GLOBALS["TR"]["SETTINGS"][$GLOBALS["LANG"]]?></span>\
		</div><br>\
		<div style="height:470px;padding:20px;padding-left:50px;">\
		<table style="width:100%">\
		<tr><td style="width:75%"><h3><?php echo $GLOBALS["TR"]["HTML_edit"][$GLOBALS["LANG"]]?></h3></td><td style="width:60px;"><div style="cursor:pointer;background-color:#847AFF;position:relative;width:50px;height:25px;border-radius:5px;border:solid #4D4694 2px;" id="settingsEditHTML" onclick="slideSwitch(this)" value="0"><div id="settingsEditHTMLIn" style="position:absolute;top:0px;left:0px;width:25px;height:25px;border-radius:3px;background-color:#FFFFFF;text-align:center;"><span style="font-size:12px;position:relative;top:2px;left:-1px;color:#4D4694;">OFF</span></div></div></td><td style="text-align:left;"><?php create_info_logo("gen_info(\\'{$GLOBALS["TR"]["HTML_edit_expl"][$GLOBALS["LANG"]]}\\')",'width:30px;height:30px;cursor:pointer;');?></td></tr>\
		<tr><td style="width:75%"><h3><?php echo $GLOBALS["TR"]["Advanced_edit"][$GLOBALS["LANG"]]?></h3></td><td style="width:60px;"><div style="cursor:pointer;background-color:#847AFF;position:relative;width:50px;height:25px;border-radius:5px;border:solid #4D4694 2px;" id="settingsEditADV" onclick="slideSwitch(this)" value="0"><div id="settingsEditADVIn" style="position:absolute;top:0px;left:0px;width:25px;height:25px;border-radius:3px;background-color:#FFFFFF;text-align:center;"><span style="font-size:12px;position:relative;top:2px;left:-1px;color:#4D4694;">OFF</span></div></div></td><td style="text-align:left;"><?php create_info_logo("gen_info(\\'{$GLOBALS["TR"]["Advanced_edit_expl"][$GLOBALS["LANG"]]}\\')",'width:30px;height:30px;cursor:pointer;');?></td></tr>\
		<tr><td style="width:75%"><h3><?php echo $GLOBALS["TR"]["Truncated_view"][$GLOBALS["LANG"]]?></h3></td><td style="width:60px;"><div style="cursor:pointer;background-color:#847AFF;position:relative;width:50px;height:25px;border-radius:5px;border:solid #4D4694 2px;" id="settingsEditDimension" onclick="slideSwitch(this)" value="0"><div id="settingsEditDimensionIn" style="position:absolute;top:0px;left:0px;width:25px;height:25px;border-radius:3px;background-color:#FFFFFF;text-align:center;"><span style="font-size:12px;position:relative;top:2px;left:-1px;color:#4D4694;">OFF</span></div></div></td><td style="text-align:left;"><?php create_info_logo("gen_info(\\'{$GLOBALS["TR"]["Truncated_view_expl"][$GLOBALS["LANG"]]}\\')",'width:30px;height:30px;cursor:pointer;');?></td></tr>\
		<tr><td style="width:75%"><h3><?php echo $GLOBALS["TR"]["Quot_for_date"][$GLOBALS["LANG"]]?></h3></td><td style="width:60px;"><div style="cursor:pointer;background-color:#847AFF;position:relative;width:50px;height:25px;border-radius:5px;border:solid #4D4694 2px;" id="settingsEditDate" onclick="slideSwitch(this)" value="0"><div id="settingsEditDateIn" style="position:absolute;top:0px;left:0px;width:25px;height:25px;border-radius:3px;background-color:#FFFFFF;text-align:center;"><span style="font-size:12px;position:relative;top:2px;left:-1px;color:#4D4694;">OFF</span></div></div></td><td style="text-align:left;"><?php create_info_logo("gen_info(\\'{$GLOBALS["TR"]["Quot_for_date_expl"][$GLOBALS["LANG"]]}\\')",'width:30px;height:30px;cursor:pointer;');?></td></tr>\
		<tr><td style="width:75%"><h3><?php echo $GLOBALS["TR"]["Quot_for_time"][$GLOBALS["LANG"]]?></h3></td><td style="width:60px;"><div style="cursor:pointer;background-color:#847AFF;position:relative;width:50px;height:25px;border-radius:5px;border:solid #4D4694 2px;" id="settingsEditTime" onclick="slideSwitch(this)" value="0"><div id="settingsEditTimeIn" style="position:absolute;top:0px;left:0px;width:25px;height:25px;border-radius:3px;background-color:#FFFFFF;text-align:center;"><span style="font-size:12px;position:relative;top:2px;left:-1px;color:#4D4694;">OFF</span></div></div></td><td style="text-align:left;"><?php create_info_logo("gen_info(\\'{$GLOBALS["TR"]["Quot_for_time_expl"][$GLOBALS["LANG"]]}\\')",'width:30px;height:30px;cursor:pointer;');?></td></tr>\
		<tr><td style="width:75%"><h3><?php echo $GLOBALS["TR"]["Quot_for_date_time"][$GLOBALS["LANG"]]?></h3></td><td style="width:60px;"><div style="cursor:pointer;background-color:#847AFF;position:relative;width:50px;height:25px;border-radius:5px;border:solid #4D4694 2px;" id="settingsEditDateTime" onclick="slideSwitch(this)" value="0"><div id="settingsEditDateTimeIn" style="position:absolute;top:0px;left:0px;width:25px;height:25px;border-radius:3px;background-color:#FFFFFF;text-align:center;"><span style="font-size:12px;position:relative;top:2px;left:-1px;color:#4D4694;">OFF</span></div></div></td><td style="text-align:left;"><?php create_info_logo("gen_info(\\'{$GLOBALS["TR"]["Quot_for_date_time_expl"][$GLOBALS["LANG"]]}\\')",'width:30px;height:30px;cursor:pointer;');?></td></tr>\
		</table></div>\
		<div style="height:50px;padding-left:150px;font-weight:bold;font-size:18px;"><?php echo $GLOBALS["TR"]["OK_to_save"][$GLOBALS["LANG"]]?><button type="button" style="cursor:pointer;position:relative;top:-5px;float:right;margin-right:25px;color:#FFFFFF;background-color:#CC8D00;width:75px;font-size:18px;" onclick="saveSettings()"><?php echo $GLOBALS["TR"]["OK"][$GLOBALS["LANG"]]?></button></div>\
		</div>';
		conerdiv.innerHTML=inne;
		if (document.getElementsByTagName('body')[0].getElementsByClassName('settingsdiv').length==0){
			document.getElementsByTagName('body')[0].appendChild(conerdiv);
		}
		var setThr=['editADV','editDate','editDateTime','editDimension','editHTML','editTime'];
	for (var i=0;i<setThr.length;i++){
		if (settings[setThr[i]]==1){
			var upLetter='E'+setThr[i].slice(1);
			var elem=document.getElementById('settings'+upLetter);
			slideSwitch(elem);
		}
	}
}
function closeSettings(){
	gen_prompt('closeSettings2(1)','<?php echo $GLOBALS["TR"]["Close_changes_lost"][$GLOBALS["LANG"]]?>');
}
function closeSettings2(arg){
	if (arg){ close_prompt();
arr=document.getElementsByTagName('body')[0].getElementsByClassName('settingsdiv');
		if (arr.length!=0){
			document.getElementsByTagName('body')[0].removeChild(arr[0]);
	}}
	else{
	wait(function(){
	window.location.href="<?php echo $GLOBALS['PHP_SELF_INSTANCE'];?>";});
	}
}
function slideSwitch(x){
	var inId=x.getAttribute('id');
	var innerSpan=document.getElementById(inId+'In').getElementsByTagName('span')[0];
	if (x.getAttribute('value')==0){
		innerSpan.innerHTML='';
	$('#'+inId+'In').animate({
		left:'25px'
	},function(){
		innerSpan.style.left="0px";
		innerSpan.innerHTML='ON';
	});
	x.setAttribute('value','1');
	}
	else{
		innerSpan.innerHTML='';
		$('#'+inId+'In').animate({
		left:'0px'
	},function(){
		innerSpan.style.left="-1px";
		innerSpan.innerHTML='OFF';
	});
	x.setAttribute('value','0');
	}
	slideSwitchEvent(x);
}
function slideSwitchEvent(x){
	if (x.getAttribute('id')=='settingsEditHTML'&&x.getAttribute('value')=='1'){
		var altul=document.getElementById('settingsEditADV');
		if (altul.getAttribute('value')==1) slideSwitch(altul);
	}
	if (x.getAttribute('id')=='settingsEditADV'&&x.getAttribute('value')=='1'){
		var altul=document.getElementById('settingsEditHTML');
		if (altul.getAttribute('value')==1) slideSwitch(altul);
	}
}
function saveSettings(){
	var setarr={};
	setarr['editHTML']=document.getElementById('settingsEditHTML').getAttribute('value');
	setarr['editADV']=document.getElementById('settingsEditADV').getAttribute('value');
	setarr['editDimension']=document.getElementById('settingsEditDimension').getAttribute('value');
	setarr['editDate']=document.getElementById('settingsEditDate').getAttribute('value');
	setarr['editTime']=document.getElementById('settingsEditTime').getAttribute('value');
	setarr['editDateTime']=document.getElementById('settingsEditDateTime').getAttribute('value');
	var setarrTxt=JSON.stringify(setarr);
	wait(function(){
		active++;
		document.getElementsByClassName('settingsdiv')[0].createPreloader();
	$.post('<?php echo $GLOBALS['PHP_SELF_INSTANCE'];?>&act=save_settings&ajax=true',{newSettings:setarrTxt,CSRF:(typeof MY_CSRF !='undefined')?MY_CSRF:''},function(result){
		active--;
		document.getElementsByClassName('settingsdiv')[0].removePreloader();
		var ree=JSON.parse(result);
		if (ree['stat']=='con_err') gen_error(ree['con_err']);
		if (ree['stat']=='fail') gen_error(ree['error']);
		if (ree['stat']=='success'){
		settings=JSON.parse(setarrTxt);
		closeSettings2(0);
		}
	});

	});

	
}

//*SETTINGS
$("document").ready(function(){
		$(".input_element").focus(function(){
			if (this.style.color!="#000000"&&this.style.color!="rgb(0, 0, 0)"&&this.style.color!="rgb(0,0,0)"&&this.style.color!="RGB(0,0,0)"&&this.style.color!="RGB(0, 0, 0)"&&this.style.color!="black"&&this.style.color!="BLACK"){
				this.style.color="#000000";
				this.value="";
			}
		});
		$(".input_element").blur(function(){
			if (this.value==""){
				this.style.color="#679596";
				this.value=this.getAttribute("myval");
			}
		});
		$('.htmlSelect').focus(function(){
			$('.htmlEditPanel').slideUp();
		});
});
//EDIT DELETE ADD COLUMN
function createAddChangeColumn(arg1,arg2){
	var cr=document.createElement('div');
	cr.setAttribute('style','position:fixed;left:0px;top:0px;width:100%;height:100%;z-index:7;');
	cr.setAttribute('class','addChangeColumn');
	var inner='<div style="position:absolute;top:0px;left:0px;width:100%;height:100%;background-color:#000000;opacity:0.5;">&nbsp;</div>\
	<div id="addChangeColumnInter" style="opacity:1;position:absolute;top:50%;left:50%;width:500px;height:400px;padding:20px;margin-left:-270px;margin-top:-220px;background-color:#FFF2A0;border-radius:5px;">\
	<a href="javascript:closeAddChangeColumn()" class="closing" style="font-size:24px;position:absolute;right:20px;top:10px;" title="<?php echo $GLOBALS["TR"]["Close"][$GLOBALS["LANG"]]?>">x</a>';
var txt;
if (arg1==0) txt='<?php echo $GLOBALS["TR"]["Create_col"][$GLOBALS["LANG"]]?>';
else txt='Edit column '+htmlspecialchars(tot['columns'][arg2]);
	inner=inner+'<div><h3 style="text-align:center;">'+txt+'</h3></div>\
	<br id="crbr">\
	<br><div style="padding-left:50px"><?php echo $GLOBALS["TR"]["Insert_col_name"][$GLOBALS["LANG"]]?><br><br>\
	<div style="margin-left:10px;background-color:#FFFFFF;border-radius:5px;width:250px;padding-left:5px;height:25px;"><input type="text" id="newcolname" style="margin-top:2px;height:19px;border:none;width:245px;"></input></div></div>\
	<br><div style="padding-left:50px"><?php echo $GLOBALS["TR"]["Choose_col_data_type"][$GLOBALS["LANG"]]?><br><br>\
	<select onchange="newdatashow(this)" style="border-radius:5px;color:#FFFFFF;background-color:#CC8D00;font-size:14px;" id="newdatatye"><option value="int unique key auto_increment">Autoincrement</option>\
	<option value="int">int</option>\
	<option value="float">float</option>\
	<option value="text">text</option>\
	<option value="date">date</option>\
	<option value="0"><?php echo $GLOBALS["TR"]["Other"][$GLOBALS["LANG"]]?></option>\
	</select></div>\
	<br><div style="padding-left:50px;display:none;" id="newdatadiv"><?php echo $GLOBALS["TR"]["Insert_data_type"][$GLOBALS["LANG"]]?><br><br>\
	<div style="margin-left:10px;background-color:#FFFFFF;border-radius:5px;width:250px;padding-left:5px;height:25px;"><input type="text" id="newdatatype2" style="margin-top:2px;height:19px;border:none;width:245px;"></input></div>\
	</div>\
';

inner=inner+'<div style="height:50px;position:absolute;bottom:0px;right:10px;width:350px;"><?php echo $GLOBALS["TR"]["OK_to_save"][$GLOBALS["LANG"]]?><button type="button" style="cursor:pointer;position:relative;top:-5px;float:right;margin-right:25px;color:#FFFFFF;background-color:#CC8D00;width:75px;font-size:18px;" onclick="sendAddChangeColumn('+arg1+','+arg2+')"><?php echo $GLOBALS["TR"]["OK"][$GLOBALS["LANG"]]?></button></div>\
</div>';
cr.innerHTML=inner;
if (document.getElementsByClassName('create').length==0)
	document.getElementsByTagName('body')[0].appendChild(cr);
	if (arg1==1){
		$('#newcolname').val(tot['columns'][arg2]);
		var oldDataType=tot['data-types'][arg2];
		var oldVal=0;
		if (oldDataType.indexOf('auto_increment')>-1) oldVal='int unique key auto_increment';
		else {
		var dataTypesSelect=['int','float','text','date'];
		for (var j=0;j<dataTypesSelect.length;j++){
			if (oldDataType.indexOf(dataTypesSelect[j])>-1){ oldVal=dataTypesSelect[j];
			break;}
		}}
		$('#newdatatye').val(oldVal);
		if (oldVal==0){
		newdatashow(document.getElementById('newdatatye'));
		$('#newdatatype2').val(oldDataType);
		}
	}
}
function closeAddChangeColumn(){
		var arr=document.getElementsByClassName('addChangeColumn');
	if (arr.length>0) arr[0].parentNode.removeChild(arr[0]);
	wait(function(){getContents();});
}
function sendAddChangeColumn(arg1,arg2){
	wait(function(){
	active++;
	var coln=$('#newcolname').val();
	var dt=$('#newdatatye').val();
	if (dt==0) dt=$('#newdatatype2').val();
	document.getElementById('addChangeColumnInter').createPreloader();
	$('#act_tabel_buttons').css('display','');
	$('#act_search_buttons').css('display','none');
	pendingSearch=null;
	if (arg1==0){
		$.post('<?php echo $GLOBALS['PHP_SELF_INSTANCE'];?>&act=addCol&ajax=true',{name:coln,type:dt,CSRF:(typeof MY_CSRF !='undefined')?MY_CSRF:''},function(result){
			active--;
			document.getElementById('addChangeColumnInter').removePreloader();
			var ree=JSON.parse(result);
			if (ree['stat']=='con_err') gen_error(ree['con_err']);
			if (ree['stat']=='fail') gen_error(ree['error']);
			if (ree['stat']=='success') gen_info('<?php echo $GLOBALS["TR"]["Column"][$GLOBALS["LANG"]]?> '+htmlspecialchars(coln)+' <?php echo $GLOBALS["TR"]["Chas_been_created"][$GLOBALS["LANG"]]?>.',0);
		});
	}
	if (arg1==1){
		$.post('<?php echo $GLOBALS['PHP_SELF_INSTANCE'];?>&act=editCol&ajax=true',{oldName:tot['columns'][arg2],newName:coln,newDataType:dt,CSRF:(typeof MY_CSRF !='undefined')?MY_CSRF:''},
		function(result){
			active--;
			document.getElementById('addChangeColumnInter').removePreloader();
			var ree=JSON.parse(result);
			if (ree['stat']=='con_err') gen_error(ree['con_err']);
			if (ree['stat']=='fail') gen_error(ree['error']);
			if (ree['stat']=='success'){
				closeAddChangeColumn();
				gen_info('<?php echo $GLOBALS["TR"]["Edit_done"][$GLOBALS["LANG"]]?>',0);
			}
		});
	}
	});
}
function deleteColumn(arg){
	gen_prompt('deleteColumn2('+arg+')','<?php echo $GLOBALS["TR"]["Really_del_col"][$GLOBALS["LANG"]]?> '+htmlspecialchars(tot['columns'][arg])+'?');
}
function deleteColumn2(arg){
	wait(function(){
		document.getElementsByClassName('promptdivcont')[0].createPreloader();
		$('#act_tabel_buttons').css('display','');
		$('#act_search_buttons').css('display','none');
		pendingSearch=null;
		active++;
			$.post('<?php echo $GLOBALS['PHP_SELF_INSTANCE'];?>&act=drop_column&ajax=true',{column:tot['columns'][arg],check:'DA',CSRF:(typeof MY_CSRF !='undefined')?MY_CSRF:''},function(result){
				active--;
				document.getElementsByClassName('promptdivcont')[0].removePreloader();
				close_prompt();
				var ree=JSON.parse(result);
				if (ree['stat']=='con_err') gen_error(ree['con_err']);
				if (ree['stat']=='fail') gen_error(ree['error']);
				if (ree['stat']=='success'){ gen_info('<?php echo $GLOBALS["TR"]["Column"][$GLOBALS["LANG"]]?> '+htmlspecialchars(tot['columns'][arg])+' <?php echo $GLOBALS["TR"]["Chas_been_removed"][$GLOBALS["LANG"]]?>.',0);
				getContents();
				}
			});
	});
}
//*EDIT ADD DELETE COLUMN
//DELETE ROW
function delRow(row){
	var rowElement=document.getElementById('row'+row);
	rowElement.style.backgroundColor="#FF8888";
	gen_del_prompt(row);

}
function delRow2(row){
	var packet={
		primary:(typeof tot['primary']=='undefined')?null:tot['primary'],
		rowNumber:(typeof tot['primary']=='undefined'||tot['primary']==null)?null:(tot['rows'][row][0][tot['primary']]),
		columns:tot['columns'],
		rowContent:tot['rows'][row][0]
	}
	var packedPacket=JSON.stringify(packet);
	wait(function(){
	document.getElementsByClassName('promptdivcont')[0].createPreloader();
		active++;
	$.post('<?php echo $GLOBALS['PHP_SELF_INSTANCE'];?>&act=delete_row&ajax=true',{check:'DA',packet:packedPacket,CSRF:(typeof MY_CSRF !='undefined')?MY_CSRF:''},function(result){
		active--;
		document.getElementsByClassName('promptdivcont')[0].removePreloader();
		close_del_prompt(row);
		var ree=JSON.parse(result);
		if (ree['stat']=='con_err') gen_error(ree['con_err']);
		if (ree['stat']=='fail') gen_error(ree['error']);
		if (ree['stat']=='success'){
			if (ree['fol_action']=='getContents') getContents();
		else{
		tot['rows'].splice(row,1);
		putContents();}
		}
	});});

}
function gen_del_prompt(row){
	var conerdiv=document.createElement('div');
		conerdiv.style.position="fixed";
		conerdiv.style.top="0px";
		conerdiv.style.left="0px"
		conerdiv.style.width="100%";
		conerdiv.style.height="100%";
		conerdiv.style.zIndex="8";
		conerdiv.setAttribute('class','promptdiv');
		conerdiv.innerHTML='\
		<div style="position:absolute;top:0px;left:0px;width:100%;height:100%;background-color:#000000;opacity:0.5;">&nbsp;</div>\
		<div style="opacity:1;position:absolute;top:50%;left:50%;width:300px;height:200px;padding:20px;margin-left:-170px;margin-top:-120px;background-color:#FFF2A0;border-radius:5px;" class="promptdivcont">\
		<div style="height:30px;">\
		<svg style="width:30px;height:30px;" viewBox="0 0 110 110">\
		<circle cx="55" cy="55" r="45" fill="#FFB800"/>\
		<text x="30" y="90" fill="#FFFFFF" style="font-size:100px;">?</text>\
		</svg>&nbsp;&nbsp;&nbsp;<span style="color:#FFB800;font-weight:bold;position:relative;top:-10px"><?php echo $GLOBALS["TR"]["CONFIRM"][$GLOBALS["LANG"]]?></span>\
		</div><br>\
		<div style="overflow:auto;height:130px"><?php echo $GLOBALS["TR"]["Really_del_row"][$GLOBALS["LANG"]]?></div>\
		<div style="height:50px;"><button type="button" style="cursor:pointer;position:relative;top:-5px;left:40px;color:#FFFFFF;background-color:#CC8D00;width:75px;font-size:18px;" onclick="delRow2('+row+')"><?php echo $GLOBALS["TR"]["YES"][$GLOBALS["LANG"]]?></button><button type="button" style="cursor:pointer;position:relative;top:-5px;left:103px;color:#FFFFFF;background-color:#CC8D00;width:75px;font-size:18px;" onclick="close_del_prompt('+row+')"><?php echo $GLOBALS["TR"]["NO"][$GLOBALS["LANG"]]?></button></div>\
		</div>';
		if (document.getElementsByTagName('body')[0].getElementsByClassName('promptdiv').length==0){
			document.getElementsByTagName('body')[0].appendChild(conerdiv);
		}
}
function close_del_prompt(row){
		document.getElementById('row'+row).style.backgroundColor="";
		var arr=document.getElementsByTagName('body')[0].getElementsByClassName('promptdiv');
		if (arr.length!=0){
		document.getElementsByTagName('body')[0].removeChild(arr[0]);}
}
//*DELETE ROW
//NEW ROW
function newRow(){
	document.getElementsByTagName('body')[0].createPreloader();
	wait(function(){
		active++;
	$.post('<?php echo $GLOBALS['PHP_SELF_INSTANCE'];?>&act=new_row&ajax=true',{columns: JSON.stringify(tot['columns']),CSRF:(typeof MY_CSRF !='undefined')?MY_CSRF:''},function(result){
		active--;
		document.getElementsByTagName('body')[0].removePreloader();
		var ree=JSON.parse(result);
		if (ree['stat']=='con_err') gen_error(ree['con_err']);
		if (ree['stat']=='fail') gen_error(ree['error']);
		if (ree['stat']=='success'){
			if (ree['fol_action']=='getContents') getContents();
			else{
			tot['rows'].splice(ree['where'],0,ree['rowToAdd']);
			putContents();
			setTimeout(function(){navigateToRow(ree['where']);},0);
			}
		}
	});
	});
}
//*NEW ROW
//DUPLICATE ROW
function doubleRow(row){
	document.getElementsByTagName('body')[0].createPreloader();
	wait(function(){
		active++;
		var packet={
			columns: tot['columns'],
			primary:(typeof tot['primary']=='undefined')?null:tot['primary'],
			rowContent: tot['rows'][row][0]
		}
		$.post('<?php echo $GLOBALS['PHP_SELF_INSTANCE'];?>&act=double_row&ajax=true',{packet: JSON.stringify(packet),CSRF:(typeof MY_CSRF !='undefined')?MY_CSRF:''},function(result){
		active--;
		document.getElementsByTagName('body')[0].removePreloader();
		var ree=JSON.parse(result);
		if (ree['stat']=='con_err') gen_error(ree['con_err']);
		if (ree['stat']=='fail') gen_error(ree['error']);
		if (ree['stat']=='success'){
			if (ree['fol_action']=='getContents') getContents();
			else{
			tot['rows'].splice(ree['where'],0,ree['rowToAdd']);
			putContents();
			setTimeout(function(){navigateToRow(ree['where']);},0);
			}
		}
		});
	});
}
//*DUPLICATE ROW
//NAVIGATE TO ROW
Element.prototype.documentOffsetTop = function () {
    return this.offsetTop + ( this.offsetParent ? this.offsetParent.documentOffsetTop() : 0 );
};
function navigateToRow(rowNumber){
	var row=document.getElementById('row'+rowNumber);
	$(window).scrollTop(row.documentOffsetTop()-(window.innerHeight/2));
	row=$('#row'+rowNumber);
	setTimeout(function(){
		row.css('backgroundColor','#FFF253');
	},250);
	setTimeout(function(){
		row.css('backgroundColor','');
	},750);

}
//*NAVIGATE TO ROW
//PREPARE_TO_SHOW
function htmlToText(div){
div=div.replace(/(<p>)?\n/ig,'');
div=div.replace(/(<br[^>]*(\/)?>(<\/br>)?)|(<p[^>]*>(<br[^>]*><\/p>)?)|(<div[^>]*>(<br[^>]*><\/div>)?)|(<li[^>]*>(<br[^>]*><\/li>)?)/ig,'\n');
div=div.replace(/<[^>]*>/ig,'');
div=div.replace(/&nbsp;/ig,' ');
if(div.slice(-1)=='\n'){
div=div.substring(0,div.length-1);
}
return div;
}
function textToHtml(txt){
txt=txt.replace(/(\r)?\n/ig,'<br>');
txt=txt.replace(/\040\040/ig,function(match){
	return ' &nbsp';
});
txt=txt.replace(/\040\<br\>/ig,function(match){
	return '&nbsp<br>';
});
txt=txt.replace(/\<br\>\040/ig,function(match){
	return '<br>&nbsp';
});
txt=txt.replace(/^\040/ig,function(match){
	return '&nbsp';
});
txt=txt.replace(/\040$/ig,function(match){
	return '&nbsp';
});
txt=txt+'<br>';
return txt;
}
function prepareHtml(div){
	div=div+'<br>';	
	return div;
}
function htmlToHtml(div){
	if (div.slice(-4)=='<br>')
	div=div.substring(0,div.length-4);
	return div;
}
function pastePaste(div,event){
    event.preventDefault();
  text=event.clipboardData.getData('Text');
  text=text.replace(/\040\040/ig,function(match){
	return ' \u00A0';
});
   document.execCommand('insertText',false,text); 
}
function prepareToShow(val){
	if (typeof val!= 'string') return val;
		val=htmlspecialchars(val);
		val=textToHtml(val);
		return val;
}
//*PREPARE_TO_SHOW
//EDIT
function getRowFromCell(cell)
{
	var id=cell.getAttribute('id');
	id=id.substring(4);
	return id.split(';')[0];
}
function getColumnFromCell(cell){
	var id=cell.getAttribute('id');
	id=id.substring(4);
	return id.split(';')[1];
}
function focusdiv(which,event){
	if (isHtmlClicked){
		if (currentFocusedCell!=null&&currentFocusedCell.getAttribute('id')==which.getAttribute('id')) return;
		else {
		var col3=getColumnFromCell(which);
		var row3=getRowFromCell(which);
		if (typeof tot['primary']=='undefinded'||tot['primary']==null) nextToFocus={method:0,cell:'cell'+row3+';'+col3};
		else nextToFocus={method:1,column:col3,primVal:tot['rows'][row3][0][tot['primary']],cell:'cell'+row3+';'+col3}
		htmlEditor.blurredDiv();
			return;
		}
	}
	else {
		if (currentFocusedCell!=null&&currentFocusedCell.getAttribute('id')!=which.getAttribute('id')){
		var col3=getColumnFromCell(which);
		var row3=getRowFromCell(which);
		if (typeof tot['primary']=='undefinded'||tot['primary']==null) nextToFocus={method:0,cell:'cell'+row3+';'+col3};
		else nextToFocus={method:1,column:col3,primVal:tot['rows'][row3][0][tot['primary']],cell:'cell'+row3+';'+col3}
		htmlEditor.blurredDiv();
		return;
		}
	}
	currentFocusedCell=which;
	var isHtml;
	if (typeof which.getAttribute('my_html')!='undefined'&&which.getAttribute('my_html')!=null&&which.getAttribute('my_html')=='yes') isHtml='yes';
	else isHtml='no';
	if (isHtml=='yes') htmlEditor.init();

if (typeof settings['editDimension']!='undefined'&&settings['editDimension']=="1"){	which.style.maxHeight="";
	which.style.maxWidth="";
	which.style.overflow="";
which.style.wordWrap="";}
}
function blurdiv(which,event){
	if (event!='nimic'){
	event.stopImmediatePropagation();
	}
	if (!isHtmlClicked){
	var isHtml;
	if (typeof which.getAttribute('my_html')!='undefined'&&which.getAttribute('my_html')!=null&&which.getAttribute('my_html')=='yes') isHtml='yes';
	else isHtml='no';
	if (isHtml) htmlEditor.exit();
	var isAdv;
	if (typeof settings['editADV']!='undefined'&&settings['editADV']=="1") isAdv='yes';
	else isAdv='no';
	if (typeof settings['editDimension']!='undefined'&&settings['editDimension']=="1"){
	which.style.maxHeight="100px";
	which.style.maxWidth="150px";
	which.style.overflow="hidden";
	which.style.wordWrap="word-wrap";}
	var row=getRowFromCell(which);
	var col=getColumnFromCell(which);
	var newContent=$(which).html();
	if (isHtml!='yes') newContent=htmlToText(newContent);
	else newContent=htmlToHtml(newContent);
	wait(function(){
		active++;
		document.getElementsByTagName('body')[0].createPreloader();
		var packet={
		primary:(typeof tot['primary']=='undefined')?null:tot['primary'],
		rowNumber:(typeof tot['primary']=='undefined'||tot['primary']==null)?null:(tot['rows'][row][0][tot['primary']]),
		columns:tot['columns'],
		initRowContent:tot['rows'][row][0],
		newContent:newContent,
		isHtml:isHtml,
		isAdvanced:isAdv,
		column:col,
		dataType:tot['data-types'][col]
		}
	var packedPacket=JSON.stringify(packet);
	$.post('<?php echo $GLOBALS['PHP_SELF_INSTANCE'];?>&act=updateCell&ajax=true',{packet:packedPacket,CSRF:(typeof MY_CSRF !='undefined')?MY_CSRF:''},function(result){
		var ree=JSON.parse(result);
		if (ree['stat']=='success'){
			if (ree['fol_action']=='putContents'){
			tot['rows'][row][0]=ree['newContentResult'];
			if (ree['new_pos']!=row){
				var aux=tot['rows'][row];
				(tot['rows']).splice(row,1);
				(tot['rows']).splice(ree['new_pos'],0,aux);
			}
			putContents();
			if (ree['new_pos']!=row) {
				pendingRowMove=1000;
				setTimeout(function(){navigateToRow(ree['new_pos']);},0);
			}
			}
			else getContents();
		}
		setTimeout(function(){document.getElementsByTagName('body')[0].removePreloader();},100);
		if (ree['stat']=='con_err'){ gen_error(ree['con_err']);
		}
		if (ree['stat']=='fail') {gen_error(ree['error']);
		getContents();
		}
	active--;
	});
	});
	currentFocusedCell=null;
	}
}
//*EDIT
//PREVENT PAGE CLOSE
window.onbeforeunload = function() {
  if (currentFocusedCell!=null||active!=0) return '<?php echo $GLOBALS["TR"]["Leave_page"][$GLOBALS["LANG"]]?>';
}
//*PREVENT PAGE CLOSE
//SEARCH
function searchTable(){
	shaddowRun(document.getElementsByTagName('body')[0],function(){
	$('div[my_searched=DA]').css("background-color","").removeAttr('my_searched');
	$('tr[my_row_searched]').removeAttr('my_row_searched').css('display','');
	});
	pendingSearch=buildSearchObject();
	if ($('#advsrc').attr('my_state')==1) advancedSearch(0);
	setTimeout(function(){
	doSearch(pendingSearch);},0);
}
function doSearch(obj){
	wait(function(){
	shaddowRun(document.getElementsByTagName('body')[0],function(){
	var countRes=0;
	var countRow=0;
	var ok=false;
	if (obj['rowsOnly']) {
$('#eye_button').attr('onclick','showResults(0)');
$('#eye_button_span').attr('title',"Show all rows");
$('#eye_bar').css('display','none');
	}
	else {
		$('#eye_button').attr('onclick','showResults(1)');
$('#eye_button_span').attr('title',"<?php echo $GLOBALS["TR"]["Only_rows_containing"][$GLOBALS["LANG"]]?>");
$('#eye_bar').css('display','');
	}
	if (obj['columns']){
	for (var i=0;i<tot['rows'].length;i++){
		ok=false;
		for (var j=0;j<obj['columns'].length;j++){
			var mat=tot['rows'][i][0][tot['columns'][obj['columns'][j]]];
			if (typeof settings['editHTML']!='undefined'&&settings['editHTML']=="1"&&(tot['data-types'][obj['columns'][j]].toUpperCase()=='TEXT'||tot['data-types'][obj['columns'][j]].toUpperCase()=='TINYTEXT'||tot['data-types'][obj['columns'][j]].toUpperCase()=='MEDIUMTEXT'||tot['data-types'][obj['columns'][j]].toUpperCase()=='LONGTEXT')&&mat!=null)
				mat=htmlToText(String(mat));
		if (mat===null?false:String(mat).match(obj.regex)){ $('#cell'+i+'\\;'+obj['columns'][j]).css('background-color','#FFE990').attr('my_searched','DA');
			countRes++;
			ok=true;
		}
		}
		if (ok){ countRow++;
		$('#row'+i).attr('my_row_searched','DA');
		}
		else{
		if (obj['rowsOnly']) $('#row'+i).attr('my_row_searched','NU').css('display','none');
		else $('#row'+i).attr('my_row_searched','NU');
		}
	}}
	$('#rows_counter').html('<span title="'+countRes+' <?php echo $GLOBALS["TR"]["results_on"][$GLOBALS["LANG"]]?> '+countRow+' <?php echo $GLOBALS["TR"]["rows"][$GLOBALS["LANG"]]?>"><span class="row_cnt">'+countRes+'</span> <?php echo $GLOBALS["TR"]["results_on"][$GLOBALS["LANG"]]?> <span class="row_cnt">'+countRow+'</span> <?php echo $GLOBALS["TR"]["rows"][$GLOBALS["LANG"]]?></span>');
	$('#act_tabel_buttons').css('display','none');
	$('#act_search_buttons').css('display','');
	});
	});
}
function closeSearch(){
	shaddowRun(document.getElementsByTagName('body')[0],function(){
	$('tr[my_row_searched]').removeAttr('my_row_searched').css('display','');
	$('div[my_searched=DA]').css("background-color","").removeAttr('my_searched');
	$('#act_tabel_buttons').css('display','');
	$('#act_search_buttons').css('display','none');
	$('#rows_counter').html('<span title="<?php echo $GLOBALS["TR"]["Rows_count"][$GLOBALS["LANG"]]?>: '+tot['rows'].length+'"><?php echo $GLOBALS["TR"]["Rows_count"][$GLOBALS["LANG"]]?>: <span class="row_cnt">'+tot['rows'].length+'</span></span>');
	pendingSearch=null;
	});
}
function showResults(arg){
	shaddowRun(document.getElementsByTagName('body')[0],function(){
if (arg){ $('tr[my_row_searched=NU]').css('display','none');
$('#eye_button').attr('onclick','showResults(0)');
$('#eye_button_span').attr('title',"<?php echo $GLOBALS["TR"]["Show_all_rows"][$GLOBALS["LANG"]]?>");
$('#eye_bar').css('display','none');
pendingSearch.rowsOnly=true;
}
else {
$('tr[my_row_searched=NU]').css('display','');
$('#eye_button').attr('onclick','showResults(1)');
$('#eye_button_span').attr('title',"<?php echo $GLOBALS["TR"]["Only_rows_containing"][$GLOBALS["LANG"]]?>");
$('#eye_bar').css('display','');
pendingSearch.rowsOnly=false;
}
	});
}
//*SEARCH
//CONTROL_TAB
function focusAtEnd(div){
	div.focus();
	if (typeof document.getSelection !="undefined"&& typeof document.createRange !="undefined"){
		var range=document.createRange();
		range.selectNodeContents(div);
		range.collapse(false);
		var sel=document.getSelection();
		sel.removeAllRanges();
		sel.addRange(range);
	} else if (typeof document.body.createTextRange !="undefined"){
		var range=document.body.createTextRange();
		range.moveToElementText(div);
		range.collapse(false);
		range.select();
	}
}
//*CONTROL_TAB
//RENAME TABLE
function create_rename_table(){
	var cr=document.createElement('div');
	cr.setAttribute('style','position:fixed;left:0px;top:0px;width:100%;height:100%;z-index:7;');
	cr.setAttribute('class','renameTable');
	var inner='<div style="position:absolute;top:0px;left:0px;width:100%;height:100%;background-color:#000000;opacity:0.5;">&nbsp;</div>\
	<div id="renameTableInter" style="opacity:1;position:absolute;top:50%;left:50%;width:500px;height:400px;padding:20px;margin-left:-270px;margin-top:-220px;background-color:#FFF2A0;border-radius:5px;">\
	<a href="javascript:closeRenameTable()" class="closing" style="font-size:24px;position:absolute;right:20px;top:10px;" title="<?php echo $GLOBALS["TR"]["Close"][$GLOBALS["LANG"]]?>">x</a>\
	<div><h3 style="text-align:center;"><?php echo $GLOBALS["TR"]["Rename_tbl"][$GLOBALS["LANG"]]?> '+htmlspecialchars($('#tabel_select').val())+'</h3></div>\
	<br id="crbr">\
	<br><div style="padding-left:50px"><?php echo $GLOBALS["TR"]["Insert_new_name"][$GLOBALS["LANG"]]?><br><br>\
	<div style="margin-left:10px;background-color:#FFFFFF;border-radius:5px;width:250px;padding-left:5px;height:25px;"><input type="text" id="renameTableNewName" style="margin-top:2px;height:19px;border:none;width:245px;"></input></div></div>\
	<div style="height:50px;position:absolute;bottom:0px;right:10px;width:350px;"><?php echo $GLOBALS["TR"]["OK_to_save"][$GLOBALS["LANG"]]?><button type="button" style="cursor:pointer;position:relative;top:-5px;float:right;margin-right:25px;color:#FFFFFF;background-color:#CC8D00;width:75px;font-size:18px;" onclick="sendRenameTable()"><?php echo $GLOBALS["TR"]["OK"][$GLOBALS["LANG"]]?></button></div>\
</div>';
cr.innerHTML=inner;
if (document.getElementsByClassName('create').length==0)
	document.getElementsByTagName('body')[0].appendChild(cr);
}
function closeRenameTable(){
		var arr=document.getElementsByClassName('renameTable');
	if (arr.length>0) arr[0].parentNode.removeChild(arr[0]);
}
function sendRenameTable(){
	wait(function(){
	active++;
	var newName=$('#renameTableNewName').val();
	$('#renameTableInter').get(0).createPreloader();
	$.post('<?php echo $GLOBALS['PHP_SELF_INSTANCE'];?>&act=rename_table&ajax=true',{newName: newName,CSRF:(typeof MY_CSRF !='undefined')?MY_CSRF:''},function(result){
		active--;
		$('#renameTableInter').get(0).removePreloader();
		var ree=JSON.parse(result);
		if (ree['stat']=='con_err') gen_error(ree['con_err']);
		if (ree['stat']=='fail') gen_error(ree['error']);
		if (ree['stat']=='success'){
			gen_info('<?php echo $GLOBALS["TR"]["Rename_done"][$GLOBALS["LANG"]]?>',1);
		}
	});
	});
}
//*RENAME TABLE
//COPY TABLE
function create_copy_table(){
	var cr=document.createElement('div');
	cr.setAttribute('style','position:fixed;left:0px;top:0px;width:100%;height:100%;z-index:7;');
	cr.setAttribute('class','copyTable');
	var inner='<div style="position:absolute;top:0px;left:0px;width:100%;height:100%;background-color:#000000;opacity:0.5;">&nbsp;</div>\
	<div id="copyTableInter" style="opacity:1;position:absolute;top:50%;left:50%;width:500px;height:400px;padding:20px;margin-left:-270px;margin-top:-220px;background-color:#FFF2A0;border-radius:5px;">\
	<a href="javascript:closeCopyTable()" class="closing" style="font-size:24px;position:absolute;right:20px;top:10px;" title="<?php echo $GLOBALS["TR"]["Close"][$GLOBALS["LANG"]]?>">x</a>\
	<div><h3 style="text-align:center;"><?php echo $GLOBALS["TR"]["Copy_tbl"][$GLOBALS["LANG"]]?> '+htmlspecialchars($('#tabel_select').val())+'</h3></div>\
	<br id="crbr">\
	<br><div style="padding-left:50px"><?php echo $GLOBALS["TR"]["Insert_new_name"][$GLOBALS["LANG"]]?><br><br>\
	<div style="margin-left:10px;background-color:#FFFFFF;border-radius:5px;width:250px;padding-left:5px;height:25px;"><input type="text" id="copyTableNewName" style="margin-top:2px;height:19px;border:none;width:245px;"></input></div></div>\
	<br><div style="padding-left:50px"><input type="radio" style="cursor:pointer;" name="copyWhatDb" value="0" id="copyWhatDb0" checked="true" onchange="copyTableGetDbs()"><?php echo $GLOBALS["TR"]["In_this_db"][$GLOBALS["LANG"]]?></input><br><br>\
	<input type="radio" style="cursor:pointer;" name="copyWhatDb" id="copyWhatDb1" value="1" onchange="copyTableGetDbs()"><?php echo $GLOBALS["TR"]["In_other_db"][$GLOBALS["LANG"]]?></input><br><br>\
	<select id="copyWhatDbExact" style="border-radius:5px;color:#FFFFFF;background-color:#CC8D00;font-size:14px;display:none"></select>\
	</div>\
	<div style="height:50px;position:absolute;bottom:0px;right:10px;width:350px;"><?php echo $GLOBALS["TR"]["OK_to_save"][$GLOBALS["LANG"]]?><button type="button" style="cursor:pointer;position:relative;top:-5px;float:right;margin-right:25px;color:#FFFFFF;background-color:#CC8D00;width:75px;font-size:18px;" onclick="sendCopyTable()"><?php echo $GLOBALS["TR"]["OK"][$GLOBALS["LANG"]]?></button></div>\
</div>';
cr.innerHTML=inner;
if (document.getElementsByClassName('create').length==0)
	document.getElementsByTagName('body')[0].appendChild(cr);
}
function copyTableGetDbs(){
	if ($('#copyWhatDb1').get(0).checked){
		$('#copyTableInter').get(0).createPreloader();
		active++;
		$.post('<?php echo $GLOBALS['PHP_SELF_INSTANCE'];?>&act=db_option_list&ajax=true',{CSRF:(typeof MY_CSRF !='undefined')?MY_CSRF:''},function(result){
			active--;
			$('#copyTableInter').get(0).removePreloader();
			var ree=JSON.parse(result);
			if (ree['stat']=='con_err') gen_error(ree['con_err']);
			if (ree['stat']=='fail') gen_error(ree['error']);
			if (ree['stat']=='success'){
			$('#copyWhatDbExact').html(ree['cnt']);
			$('#copyWhatDbExact').show();
		}
		});
	}
	else {
		$('#copyWhatDbExact').hide();
	}
}
function closeCopyTable(){
		var arr=document.getElementsByClassName('copyTable');
	if (arr.length>0) arr[0].parentNode.removeChild(arr[0]);
	refreshTableScrollbar();
}
function sendCopyTable(){
	wait(function(){
		active++;
		var isThisDb;
		var dbName;
		if ($('#copyWhatDb1').get(0).checked){
			isThisDb='no';
			dbName=$('#copyWhatDbExact').val();
		}
		else {
		isThisDb='yes';
		dbName='';
		}
		var newName=$('#copyTableNewName').val();
		$('#copyTableInter').get(0).createPreloader();
		$.post('<?php echo $GLOBALS['PHP_SELF_INSTANCE'];?>&act=copy_table&ajax=true',{newName: newName,thisDb: isThisDb,dbName: dbName,CSRF:(typeof MY_CSRF !='undefined')?MY_CSRF:''},function(result){
			active--;
			$('#copyTableInter').get(0).removePreloader();
			var ree=JSON.parse(result);
			if (ree['stat']=='con_err') gen_error(ree['con_err']);
			if (ree['stat']=='fail') gen_error(ree['error']);
			if (ree['stat']=='success'){
			gen_info('<?php echo $GLOBALS["TR"]["Copy_done"][$GLOBALS["LANG"]]?>',0);
		}
		});
	});
}
//*COPY TABLE
</script>
</body>
</html>
