<?php
/*
Copyright (C) 2018 Dragoș Manea
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

Last edited: 2019-08-21
*/
error_reporting(0);
ini_set('memory_limit', '4095M');
set_time_limit(0);
$encodings=array('big5','dec8','cp850','hp8','koi8r','latin1','latin2','swe7','ascii','ujis','sjis','hebrew','tis620','euckr','koi8u','gb2312','greek','cp1250','gbk','latin5','armscii8','utf8','ucs2','cp866','keybcs2','macce','macroman','cp852','latin7','utf8mb4','cp1251','utf16','cp1256','cp1257','utf32','binary','geostd8','cp932','eucjpms');
//!!!START!!!
//From here you can edit the settings!!!
//Configuring variables
//CHARSET
$defaultCharset='utf8';
//*CHARSET
//DEFAULT SETTINGS
$DEFAULTSET=array();
$DEFAULTSET['editADV']=0;//0 sau 1
$DEFAULTSET['editDate']=0;//0 sau 1
$DEFAULTSET['editDateTime']=0;//0 sau 1
$DEFAULTSET['editDimension']=0;//0 sau 1
$DEFAULTSET['editHTML']=1;//0 sau 1
$DEFAULTSET['editTime']=0;//0 sau 1
//*DEFAULT SETTINGS
//PREDEFINED DATABASES
/*
$DEFAULTDBS=array('databases'=>array('bazaDeDate1','bazaDeDate2'),
'tables'=>array('nume1'=>array('tabel11','tabel12','tabel13'),'nume2'=>NULL)
);
*/
//*PREDEFINED DATABASES
//*Configuring variables
//DO NOT EDIT BELOW!!!
//!!!!STOP!!!!
$VERSION='2.0';
/*
ACCESS_MYSQLI.PHP
ACCESS_MYSQLI.PHP
*/
function echo_jquery(){
echo<<<'EOT'
/*! jQuery v3.2.1 | (c) JS Foundation and other contributors | jquery.org/license */
!function(a,b){"use strict";"object"==typeof module&&"object"==typeof module.exports?module.exports=a.document?b(a,!0):function(a){if(!a.document)throw new Error("jQuery requires a window with a document");return b(a)}:b(a)}("undefined"!=typeof window?window:this,function(a,b){"use strict";var c=[],d=a.document,e=Object.getPrototypeOf,f=c.slice,g=c.concat,h=c.push,i=c.indexOf,j={},k=j.toString,l=j.hasOwnProperty,m=l.toString,n=m.call(Object),o={};function p(a,b){b=b||d;var c=b.createElement("script");c.text=a,b.head.appendChild(c).parentNode.removeChild(c)}var q="3.2.1",r=function(a,b){return new r.fn.init(a,b)},s=/^[\s\uFEFF\xA0]+|[\s\uFEFF\xA0]+$/g,t=/^-ms-/,u=/-([a-z])/g,v=function(a,b){return b.toUpperCase()};r.fn=r.prototype={jquery:q,constructor:r,length:0,toArray:function(){return f.call(this)},get:function(a){return null==a?f.call(this):a<0?this[a+this.length]:this[a]},pushStack:function(a){var b=r.merge(this.constructor(),a);return b.prevObject=this,b},each:function(a){return r.each(this,a)},map:function(a){return this.pushStack(r.map(this,function(b,c){return a.call(b,c,b)}))},slice:function(){return this.pushStack(f.apply(this,arguments))},first:function(){return this.eq(0)},last:function(){return this.eq(-1)},eq:function(a){var b=this.length,c=+a+(a<0?b:0);return this.pushStack(c>=0&&c<b?[this[c]]:[])},end:function(){return this.prevObject||this.constructor()},push:h,sort:c.sort,splice:c.splice},r.extend=r.fn.extend=function(){var a,b,c,d,e,f,g=arguments[0]||{},h=1,i=arguments.length,j=!1;for("boolean"==typeof g&&(j=g,g=arguments[h]||{},h++),"object"==typeof g||r.isFunction(g)||(g={}),h===i&&(g=this,h--);h<i;h++)if(null!=(a=arguments[h]))for(b in a)c=g[b],d=a[b],g!==d&&(j&&d&&(r.isPlainObject(d)||(e=Array.isArray(d)))?(e?(e=!1,f=c&&Array.isArray(c)?c:[]):f=c&&r.isPlainObject(c)?c:{},g[b]=r.extend(j,f,d)):void 0!==d&&(g[b]=d));return g},r.extend({expando:"jQuery"+(q+Math.random()).replace(/\D/g,""),isReady:!0,error:function(a){throw new Error(a)},noop:function(){},isFunction:function(a){return"function"===r.type(a)},isWindow:function(a){return null!=a&&a===a.window},isNumeric:function(a){var b=r.type(a);return("number"===b||"string"===b)&&!isNaN(a-parseFloat(a))},isPlainObject:function(a){var b,c;return!(!a||"[object Object]"!==k.call(a))&&(!(b=e(a))||(c=l.call(b,"constructor")&&b.constructor,"function"==typeof c&&m.call(c)===n))},isEmptyObject:function(a){var b;for(b in a)return!1;return!0},type:function(a){return null==a?a+"":"object"==typeof a||"function"==typeof a?j[k.call(a)]||"object":typeof a},globalEval:function(a){p(a)},camelCase:function(a){return a.replace(t,"ms-").replace(u,v)},each:function(a,b){var c,d=0;if(w(a)){for(c=a.length;d<c;d++)if(b.call(a[d],d,a[d])===!1)break}else for(d in a)if(b.call(a[d],d,a[d])===!1)break;return a},trim:function(a){return null==a?"":(a+"").replace(s,"")},makeArray:function(a,b){var c=b||[];return null!=a&&(w(Object(a))?r.merge(c,"string"==typeof a?[a]:a):h.call(c,a)),c},inArray:function(a,b,c){return null==b?-1:i.call(b,a,c)},merge:function(a,b){for(var c=+b.length,d=0,e=a.length;d<c;d++)a[e++]=b[d];return a.length=e,a},grep:function(a,b,c){for(var d,e=[],f=0,g=a.length,h=!c;f<g;f++)d=!b(a[f],f),d!==h&&e.push(a[f]);return e},map:function(a,b,c){var d,e,f=0,h=[];if(w(a))for(d=a.length;f<d;f++)e=b(a[f],f,c),null!=e&&h.push(e);else for(f in a)e=b(a[f],f,c),null!=e&&h.push(e);return g.apply([],h)},guid:1,proxy:function(a,b){var c,d,e;if("string"==typeof b&&(c=a[b],b=a,a=c),r.isFunction(a))return d=f.call(arguments,2),e=function(){return a.apply(b||this,d.concat(f.call(arguments)))},e.guid=a.guid=a.guid||r.guid++,e},now:Date.now,support:o}),"function"==typeof Symbol&&(r.fn[Symbol.iterator]=c[Symbol.iterator]),r.each("Boolean Number String Function Array Date RegExp Object Error Symbol".split(" "),function(a,b){j["[object "+b+"]"]=b.toLowerCase()});function w(a){var b=!!a&&"length"in a&&a.length,c=r.type(a);return"function"!==c&&!r.isWindow(a)&&("array"===c||0===b||"number"==typeof b&&b>0&&b-1 in a)}var x=function(a){var b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u="sizzle"+1*new Date,v=a.document,w=0,x=0,y=ha(),z=ha(),A=ha(),B=function(a,b){return a===b&&(l=!0),0},C={}.hasOwnProperty,D=[],E=D.pop,F=D.push,G=D.push,H=D.slice,I=function(a,b){for(var c=0,d=a.length;c<d;c++)if(a[c]===b)return c;return-1},J="checked|selected|async|autofocus|autoplay|controls|defer|disabled|hidden|ismap|loop|multiple|open|readonly|required|scoped",K="[\\x20\\t\\r\\n\\f]",L="(?:\\\\.|[\\w-]|[^\0-\\xa0])+",M="\\["+K+"*("+L+")(?:"+K+"*([*^$|!~]?=)"+K+"*(?:'((?:\\\\.|[^\\\\'])*)'|\"((?:\\\\.|[^\\\\\"])*)\"|("+L+"))|)"+K+"*\\]",N=":("+L+")(?:\\((('((?:\\\\.|[^\\\\'])*)'|\"((?:\\\\.|[^\\\\\"])*)\")|((?:\\\\.|[^\\\\()[\\]]|"+M+")*)|.*)\\)|)",O=new RegExp(K+"+","g"),P=new RegExp("^"+K+"+|((?:^|[^\\\\])(?:\\\\.)*)"+K+"+$","g"),Q=new RegExp("^"+K+"*,"+K+"*"),R=new RegExp("^"+K+"*([>+~]|"+K+")"+K+"*"),S=new RegExp("="+K+"*([^\\]'\"]*?)"+K+"*\\]","g"),T=new RegExp(N),U=new RegExp("^"+L+"$"),V={ID:new RegExp("^#("+L+")"),CLASS:new RegExp("^\\.("+L+")"),TAG:new RegExp("^("+L+"|[*])"),ATTR:new RegExp("^"+M),PSEUDO:new RegExp("^"+N),CHILD:new RegExp("^:(only|first|last|nth|nth-last)-(child|of-type)(?:\\("+K+"*(even|odd|(([+-]|)(\\d*)n|)"+K+"*(?:([+-]|)"+K+"*(\\d+)|))"+K+"*\\)|)","i"),bool:new RegExp("^(?:"+J+")$","i"),needsContext:new RegExp("^"+K+"*[>+~]|:(even|odd|eq|gt|lt|nth|first|last)(?:\\("+K+"*((?:-\\d)?\\d*)"+K+"*\\)|)(?=[^-]|$)","i")},W=/^(?:input|select|textarea|button)$/i,X=/^h\d$/i,Y=/^[^{]+\{\s*\[native \w/,Z=/^(?:#([\w-]+)|(\w+)|\.([\w-]+))$/,$=/[+~]/,_=new RegExp("\\\\([\\da-f]{1,6}"+K+"?|("+K+")|.)","ig"),aa=function(a,b,c){var d="0x"+b-65536;return d!==d||c?b:d<0?String.fromCharCode(d+65536):String.fromCharCode(d>>10|55296,1023&d|56320)},ba=/([\0-\x1f\x7f]|^-?\d)|^-$|[^\0-\x1f\x7f-\uFFFF\w-]/g,ca=function(a,b){return b?"\0"===a?"\ufffd":a.slice(0,-1)+"\\"+a.charCodeAt(a.length-1).toString(16)+" ":"\\"+a},da=function(){m()},ea=ta(function(a){return a.disabled===!0&&("form"in a||"label"in a)},{dir:"parentNode",next:"legend"});try{G.apply(D=H.call(v.childNodes),v.childNodes),D[v.childNodes.length].nodeType}catch(fa){G={apply:D.length?function(a,b){F.apply(a,H.call(b))}:function(a,b){var c=a.length,d=0;while(a[c++]=b[d++]);a.length=c-1}}}function ga(a,b,d,e){var f,h,j,k,l,o,r,s=b&&b.ownerDocument,w=b?b.nodeType:9;if(d=d||[],"string"!=typeof a||!a||1!==w&&9!==w&&11!==w)return d;if(!e&&((b?b.ownerDocument||b:v)!==n&&m(b),b=b||n,p)){if(11!==w&&(l=Z.exec(a)))if(f=l[1]){if(9===w){if(!(j=b.getElementById(f)))return d;if(j.id===f)return d.push(j),d}else if(s&&(j=s.getElementById(f))&&t(b,j)&&j.id===f)return d.push(j),d}else{if(l[2])return G.apply(d,b.getElementsByTagName(a)),d;if((f=l[3])&&c.getElementsByClassName&&b.getElementsByClassName)return G.apply(d,b.getElementsByClassName(f)),d}if(c.qsa&&!A[a+" "]&&(!q||!q.test(a))){if(1!==w)s=b,r=a;else if("object"!==b.nodeName.toLowerCase()){(k=b.getAttribute("id"))?k=k.replace(ba,ca):b.setAttribute("id",k=u),o=g(a),h=o.length;while(h--)o[h]="#"+k+" "+sa(o[h]);r=o.join(","),s=$.test(a)&&qa(b.parentNode)||b}if(r)try{return G.apply(d,s.querySelectorAll(r)),d}catch(x){}finally{k===u&&b.removeAttribute("id")}}}return i(a.replace(P,"$1"),b,d,e)}function ha(){var a=[];function b(c,e){return a.push(c+" ")>d.cacheLength&&delete b[a.shift()],b[c+" "]=e}return b}function ia(a){return a[u]=!0,a}function ja(a){var b=n.createElement("fieldset");try{return!!a(b)}catch(c){return!1}finally{b.parentNode&&b.parentNode.removeChild(b),b=null}}function ka(a,b){var c=a.split("|"),e=c.length;while(e--)d.attrHandle[c[e]]=b}function la(a,b){var c=b&&a,d=c&&1===a.nodeType&&1===b.nodeType&&a.sourceIndex-b.sourceIndex;if(d)return d;if(c)while(c=c.nextSibling)if(c===b)return-1;return a?1:-1}function ma(a){return function(b){var c=b.nodeName.toLowerCase();return"input"===c&&b.type===a}}function na(a){return function(b){var c=b.nodeName.toLowerCase();return("input"===c||"button"===c)&&b.type===a}}function oa(a){return function(b){return"form"in b?b.parentNode&&b.disabled===!1?"label"in b?"label"in b.parentNode?b.parentNode.disabled===a:b.disabled===a:b.isDisabled===a||b.isDisabled!==!a&&ea(b)===a:b.disabled===a:"label"in b&&b.disabled===a}}function pa(a){return ia(function(b){return b=+b,ia(function(c,d){var e,f=a([],c.length,b),g=f.length;while(g--)c[e=f[g]]&&(c[e]=!(d[e]=c[e]))})})}function qa(a){return a&&"undefined"!=typeof a.getElementsByTagName&&a}c=ga.support={},f=ga.isXML=function(a){var b=a&&(a.ownerDocument||a).documentElement;return!!b&&"HTML"!==b.nodeName},m=ga.setDocument=function(a){var b,e,g=a?a.ownerDocument||a:v;return g!==n&&9===g.nodeType&&g.documentElement?(n=g,o=n.documentElement,p=!f(n),v!==n&&(e=n.defaultView)&&e.top!==e&&(e.addEventListener?e.addEventListener("unload",da,!1):e.attachEvent&&e.attachEvent("onunload",da)),c.attributes=ja(function(a){return a.className="i",!a.getAttribute("className")}),c.getElementsByTagName=ja(function(a){return a.appendChild(n.createComment("")),!a.getElementsByTagName("*").length}),c.getElementsByClassName=Y.test(n.getElementsByClassName),c.getById=ja(function(a){return o.appendChild(a).id=u,!n.getElementsByName||!n.getElementsByName(u).length}),c.getById?(d.filter.ID=function(a){var b=a.replace(_,aa);return function(a){return a.getAttribute("id")===b}},d.find.ID=function(a,b){if("undefined"!=typeof b.getElementById&&p){var c=b.getElementById(a);return c?[c]:[]}}):(d.filter.ID=function(a){var b=a.replace(_,aa);return function(a){var c="undefined"!=typeof a.getAttributeNode&&a.getAttributeNode("id");return c&&c.value===b}},d.find.ID=function(a,b){if("undefined"!=typeof b.getElementById&&p){var c,d,e,f=b.getElementById(a);if(f){if(c=f.getAttributeNode("id"),c&&c.value===a)return[f];e=b.getElementsByName(a),d=0;while(f=e[d++])if(c=f.getAttributeNode("id"),c&&c.value===a)return[f]}return[]}}),d.find.TAG=c.getElementsByTagName?function(a,b){return"undefined"!=typeof b.getElementsByTagName?b.getElementsByTagName(a):c.qsa?b.querySelectorAll(a):void 0}:function(a,b){var c,d=[],e=0,f=b.getElementsByTagName(a);if("*"===a){while(c=f[e++])1===c.nodeType&&d.push(c);return d}return f},d.find.CLASS=c.getElementsByClassName&&function(a,b){if("undefined"!=typeof b.getElementsByClassName&&p)return b.getElementsByClassName(a)},r=[],q=[],(c.qsa=Y.test(n.querySelectorAll))&&(ja(function(a){o.appendChild(a).innerHTML="<a id='"+u+"'></a><select id='"+u+"-\r\\' msallowcapture=''><option selected=''></option></select>",a.querySelectorAll("[msallowcapture^='']").length&&q.push("[*^$]="+K+"*(?:''|\"\")"),a.querySelectorAll("[selected]").length||q.push("\\["+K+"*(?:value|"+J+")"),a.querySelectorAll("[id~="+u+"-]").length||q.push("~="),a.querySelectorAll(":checked").length||q.push(":checked"),a.querySelectorAll("a#"+u+"+*").length||q.push(".#.+[+~]")}),ja(function(a){a.innerHTML="<a href='' disabled='disabled'></a><select disabled='disabled'><option/></select>";var b=n.createElement("input");b.setAttribute("type","hidden"),a.appendChild(b).setAttribute("name","D"),a.querySelectorAll("[name=d]").length&&q.push("name"+K+"*[*^$|!~]?="),2!==a.querySelectorAll(":enabled").length&&q.push(":enabled",":disabled"),o.appendChild(a).disabled=!0,2!==a.querySelectorAll(":disabled").length&&q.push(":enabled",":disabled"),a.querySelectorAll("*,:x"),q.push(",.*:")})),(c.matchesSelector=Y.test(s=o.matches||o.webkitMatchesSelector||o.mozMatchesSelector||o.oMatchesSelector||o.msMatchesSelector))&&ja(function(a){c.disconnectedMatch=s.call(a,"*"),s.call(a,"[s!='']:x"),r.push("!=",N)}),q=q.length&&new RegExp(q.join("|")),r=r.length&&new RegExp(r.join("|")),b=Y.test(o.compareDocumentPosition),t=b||Y.test(o.contains)?function(a,b){var c=9===a.nodeType?a.documentElement:a,d=b&&b.parentNode;return a===d||!(!d||1!==d.nodeType||!(c.contains?c.contains(d):a.compareDocumentPosition&&16&a.compareDocumentPosition(d)))}:function(a,b){if(b)while(b=b.parentNode)if(b===a)return!0;return!1},B=b?function(a,b){if(a===b)return l=!0,0;var d=!a.compareDocumentPosition-!b.compareDocumentPosition;return d?d:(d=(a.ownerDocument||a)===(b.ownerDocument||b)?a.compareDocumentPosition(b):1,1&d||!c.sortDetached&&b.compareDocumentPosition(a)===d?a===n||a.ownerDocument===v&&t(v,a)?-1:b===n||b.ownerDocument===v&&t(v,b)?1:k?I(k,a)-I(k,b):0:4&d?-1:1)}:function(a,b){if(a===b)return l=!0,0;var c,d=0,e=a.parentNode,f=b.parentNode,g=[a],h=[b];if(!e||!f)return a===n?-1:b===n?1:e?-1:f?1:k?I(k,a)-I(k,b):0;if(e===f)return la(a,b);c=a;while(c=c.parentNode)g.unshift(c);c=b;while(c=c.parentNode)h.unshift(c);while(g[d]===h[d])d++;return d?la(g[d],h[d]):g[d]===v?-1:h[d]===v?1:0},n):n},ga.matches=function(a,b){return ga(a,null,null,b)},ga.matchesSelector=function(a,b){if((a.ownerDocument||a)!==n&&m(a),b=b.replace(S,"='$1']"),c.matchesSelector&&p&&!A[b+" "]&&(!r||!r.test(b))&&(!q||!q.test(b)))try{var d=s.call(a,b);if(d||c.disconnectedMatch||a.document&&11!==a.document.nodeType)return d}catch(e){}return ga(b,n,null,[a]).length>0},ga.contains=function(a,b){return(a.ownerDocument||a)!==n&&m(a),t(a,b)},ga.attr=function(a,b){(a.ownerDocument||a)!==n&&m(a);var e=d.attrHandle[b.toLowerCase()],f=e&&C.call(d.attrHandle,b.toLowerCase())?e(a,b,!p):void 0;return void 0!==f?f:c.attributes||!p?a.getAttribute(b):(f=a.getAttributeNode(b))&&f.specified?f.value:null},ga.escape=function(a){return(a+"").replace(ba,ca)},ga.error=function(a){throw new Error("Syntax error, unrecognized expression: "+a)},ga.uniqueSort=function(a){var b,d=[],e=0,f=0;if(l=!c.detectDuplicates,k=!c.sortStable&&a.slice(0),a.sort(B),l){while(b=a[f++])b===a[f]&&(e=d.push(f));while(e--)a.splice(d[e],1)}return k=null,a},e=ga.getText=function(a){var b,c="",d=0,f=a.nodeType;if(f){if(1===f||9===f||11===f){if("string"==typeof a.textContent)return a.textContent;for(a=a.firstChild;a;a=a.nextSibling)c+=e(a)}else if(3===f||4===f)return a.nodeValue}else while(b=a[d++])c+=e(b);return c},d=ga.selectors={cacheLength:50,createPseudo:ia,match:V,attrHandle:{},find:{},relative:{">":{dir:"parentNode",first:!0}," ":{dir:"parentNode"},"+":{dir:"previousSibling",first:!0},"~":{dir:"previousSibling"}},preFilter:{ATTR:function(a){return a[1]=a[1].replace(_,aa),a[3]=(a[3]||a[4]||a[5]||"").replace(_,aa),"~="===a[2]&&(a[3]=" "+a[3]+" "),a.slice(0,4)},CHILD:function(a){return a[1]=a[1].toLowerCase(),"nth"===a[1].slice(0,3)?(a[3]||ga.error(a[0]),a[4]=+(a[4]?a[5]+(a[6]||1):2*("even"===a[3]||"odd"===a[3])),a[5]=+(a[7]+a[8]||"odd"===a[3])):a[3]&&ga.error(a[0]),a},PSEUDO:function(a){var b,c=!a[6]&&a[2];return V.CHILD.test(a[0])?null:(a[3]?a[2]=a[4]||a[5]||"":c&&T.test(c)&&(b=g(c,!0))&&(b=c.indexOf(")",c.length-b)-c.length)&&(a[0]=a[0].slice(0,b),a[2]=c.slice(0,b)),a.slice(0,3))}},filter:{TAG:function(a){var b=a.replace(_,aa).toLowerCase();return"*"===a?function(){return!0}:function(a){return a.nodeName&&a.nodeName.toLowerCase()===b}},CLASS:function(a){var b=y[a+" "];return b||(b=new RegExp("(^|"+K+")"+a+"("+K+"|$)"))&&y(a,function(a){return b.test("string"==typeof a.className&&a.className||"undefined"!=typeof a.getAttribute&&a.getAttribute("class")||"")})},ATTR:function(a,b,c){return function(d){var e=ga.attr(d,a);return null==e?"!="===b:!b||(e+="","="===b?e===c:"!="===b?e!==c:"^="===b?c&&0===e.indexOf(c):"*="===b?c&&e.indexOf(c)>-1:"$="===b?c&&e.slice(-c.length)===c:"~="===b?(" "+e.replace(O," ")+" ").indexOf(c)>-1:"|="===b&&(e===c||e.slice(0,c.length+1)===c+"-"))}},CHILD:function(a,b,c,d,e){var f="nth"!==a.slice(0,3),g="last"!==a.slice(-4),h="of-type"===b;return 1===d&&0===e?function(a){return!!a.parentNode}:function(b,c,i){var j,k,l,m,n,o,p=f!==g?"nextSibling":"previousSibling",q=b.parentNode,r=h&&b.nodeName.toLowerCase(),s=!i&&!h,t=!1;if(q){if(f){while(p){m=b;while(m=m[p])if(h?m.nodeName.toLowerCase()===r:1===m.nodeType)return!1;o=p="only"===a&&!o&&"nextSibling"}return!0}if(o=[g?q.firstChild:q.lastChild],g&&s){m=q,l=m[u]||(m[u]={}),k=l[m.uniqueID]||(l[m.uniqueID]={}),j=k[a]||[],n=j[0]===w&&j[1],t=n&&j[2],m=n&&q.childNodes[n];while(m=++n&&m&&m[p]||(t=n=0)||o.pop())if(1===m.nodeType&&++t&&m===b){k[a]=[w,n,t];break}}else if(s&&(m=b,l=m[u]||(m[u]={}),k=l[m.uniqueID]||(l[m.uniqueID]={}),j=k[a]||[],n=j[0]===w&&j[1],t=n),t===!1)while(m=++n&&m&&m[p]||(t=n=0)||o.pop())if((h?m.nodeName.toLowerCase()===r:1===m.nodeType)&&++t&&(s&&(l=m[u]||(m[u]={}),k=l[m.uniqueID]||(l[m.uniqueID]={}),k[a]=[w,t]),m===b))break;return t-=e,t===d||t%d===0&&t/d>=0}}},PSEUDO:function(a,b){var c,e=d.pseudos[a]||d.setFilters[a.toLowerCase()]||ga.error("unsupported pseudo: "+a);return e[u]?e(b):e.length>1?(c=[a,a,"",b],d.setFilters.hasOwnProperty(a.toLowerCase())?ia(function(a,c){var d,f=e(a,b),g=f.length;while(g--)d=I(a,f[g]),a[d]=!(c[d]=f[g])}):function(a){return e(a,0,c)}):e}},pseudos:{not:ia(function(a){var b=[],c=[],d=h(a.replace(P,"$1"));return d[u]?ia(function(a,b,c,e){var f,g=d(a,null,e,[]),h=a.length;while(h--)(f=g[h])&&(a[h]=!(b[h]=f))}):function(a,e,f){return b[0]=a,d(b,null,f,c),b[0]=null,!c.pop()}}),has:ia(function(a){return function(b){return ga(a,b).length>0}}),contains:ia(function(a){return a=a.replace(_,aa),function(b){return(b.textContent||b.innerText||e(b)).indexOf(a)>-1}}),lang:ia(function(a){return U.test(a||"")||ga.error("unsupported lang: "+a),a=a.replace(_,aa).toLowerCase(),function(b){var c;do if(c=p?b.lang:b.getAttribute("xml:lang")||b.getAttribute("lang"))return c=c.toLowerCase(),c===a||0===c.indexOf(a+"-");while((b=b.parentNode)&&1===b.nodeType);return!1}}),target:function(b){var c=a.location&&a.location.hash;return c&&c.slice(1)===b.id},root:function(a){return a===o},focus:function(a){return a===n.activeElement&&(!n.hasFocus||n.hasFocus())&&!!(a.type||a.href||~a.tabIndex)},enabled:oa(!1),disabled:oa(!0),checked:function(a){var b=a.nodeName.toLowerCase();return"input"===b&&!!a.checked||"option"===b&&!!a.selected},selected:function(a){return a.parentNode&&a.parentNode.selectedIndex,a.selected===!0},empty:function(a){for(a=a.firstChild;a;a=a.nextSibling)if(a.nodeType<6)return!1;return!0},parent:function(a){return!d.pseudos.empty(a)},header:function(a){return X.test(a.nodeName)},input:function(a){return W.test(a.nodeName)},button:function(a){var b=a.nodeName.toLowerCase();return"input"===b&&"button"===a.type||"button"===b},text:function(a){var b;return"input"===a.nodeName.toLowerCase()&&"text"===a.type&&(null==(b=a.getAttribute("type"))||"text"===b.toLowerCase())},first:pa(function(){return[0]}),last:pa(function(a,b){return[b-1]}),eq:pa(function(a,b,c){return[c<0?c+b:c]}),even:pa(function(a,b){for(var c=0;c<b;c+=2)a.push(c);return a}),odd:pa(function(a,b){for(var c=1;c<b;c+=2)a.push(c);return a}),lt:pa(function(a,b,c){for(var d=c<0?c+b:c;--d>=0;)a.push(d);return a}),gt:pa(function(a,b,c){for(var d=c<0?c+b:c;++d<b;)a.push(d);return a})}},d.pseudos.nth=d.pseudos.eq;for(b in{radio:!0,checkbox:!0,file:!0,password:!0,image:!0})d.pseudos[b]=ma(b);for(b in{submit:!0,reset:!0})d.pseudos[b]=na(b);function ra(){}ra.prototype=d.filters=d.pseudos,d.setFilters=new ra,g=ga.tokenize=function(a,b){var c,e,f,g,h,i,j,k=z[a+" "];if(k)return b?0:k.slice(0);h=a,i=[],j=d.preFilter;while(h){c&&!(e=Q.exec(h))||(e&&(h=h.slice(e[0].length)||h),i.push(f=[])),c=!1,(e=R.exec(h))&&(c=e.shift(),f.push({value:c,type:e[0].replace(P," ")}),h=h.slice(c.length));for(g in d.filter)!(e=V[g].exec(h))||j[g]&&!(e=j[g](e))||(c=e.shift(),f.push({value:c,type:g,matches:e}),h=h.slice(c.length));if(!c)break}return b?h.length:h?ga.error(a):z(a,i).slice(0)};function sa(a){for(var b=0,c=a.length,d="";b<c;b++)d+=a[b].value;return d}function ta(a,b,c){var d=b.dir,e=b.next,f=e||d,g=c&&"parentNode"===f,h=x++;return b.first?function(b,c,e){while(b=b[d])if(1===b.nodeType||g)return a(b,c,e);return!1}:function(b,c,i){var j,k,l,m=[w,h];if(i){while(b=b[d])if((1===b.nodeType||g)&&a(b,c,i))return!0}else while(b=b[d])if(1===b.nodeType||g)if(l=b[u]||(b[u]={}),k=l[b.uniqueID]||(l[b.uniqueID]={}),e&&e===b.nodeName.toLowerCase())b=b[d]||b;else{if((j=k[f])&&j[0]===w&&j[1]===h)return m[2]=j[2];if(k[f]=m,m[2]=a(b,c,i))return!0}return!1}}function ua(a){return a.length>1?function(b,c,d){var e=a.length;while(e--)if(!a[e](b,c,d))return!1;return!0}:a[0]}function va(a,b,c){for(var d=0,e=b.length;d<e;d++)ga(a,b[d],c);return c}function wa(a,b,c,d,e){for(var f,g=[],h=0,i=a.length,j=null!=b;h<i;h++)(f=a[h])&&(c&&!c(f,d,e)||(g.push(f),j&&b.push(h)));return g}function xa(a,b,c,d,e,f){return d&&!d[u]&&(d=xa(d)),e&&!e[u]&&(e=xa(e,f)),ia(function(f,g,h,i){var j,k,l,m=[],n=[],o=g.length,p=f||va(b||"*",h.nodeType?[h]:h,[]),q=!a||!f&&b?p:wa(p,m,a,h,i),r=c?e||(f?a:o||d)?[]:g:q;if(c&&c(q,r,h,i),d){j=wa(r,n),d(j,[],h,i),k=j.length;while(k--)(l=j[k])&&(r[n[k]]=!(q[n[k]]=l))}if(f){if(e||a){if(e){j=[],k=r.length;while(k--)(l=r[k])&&j.push(q[k]=l);e(null,r=[],j,i)}k=r.length;while(k--)(l=r[k])&&(j=e?I(f,l):m[k])>-1&&(f[j]=!(g[j]=l))}}else r=wa(r===g?r.splice(o,r.length):r),e?e(null,g,r,i):G.apply(g,r)})}function ya(a){for(var b,c,e,f=a.length,g=d.relative[a[0].type],h=g||d.relative[" "],i=g?1:0,k=ta(function(a){return a===b},h,!0),l=ta(function(a){return I(b,a)>-1},h,!0),m=[function(a,c,d){var e=!g&&(d||c!==j)||((b=c).nodeType?k(a,c,d):l(a,c,d));return b=null,e}];i<f;i++)if(c=d.relative[a[i].type])m=[ta(ua(m),c)];else{if(c=d.filter[a[i].type].apply(null,a[i].matches),c[u]){for(e=++i;e<f;e++)if(d.relative[a[e].type])break;return xa(i>1&&ua(m),i>1&&sa(a.slice(0,i-1).concat({value:" "===a[i-2].type?"*":""})).replace(P,"$1"),c,i<e&&ya(a.slice(i,e)),e<f&&ya(a=a.slice(e)),e<f&&sa(a))}m.push(c)}return ua(m)}function za(a,b){var c=b.length>0,e=a.length>0,f=function(f,g,h,i,k){var l,o,q,r=0,s="0",t=f&&[],u=[],v=j,x=f||e&&d.find.TAG("*",k),y=w+=null==v?1:Math.random()||.1,z=x.length;for(k&&(j=g===n||g||k);s!==z&&null!=(l=x[s]);s++){if(e&&l){o=0,g||l.ownerDocument===n||(m(l),h=!p);while(q=a[o++])if(q(l,g||n,h)){i.push(l);break}k&&(w=y)}c&&((l=!q&&l)&&r--,f&&t.push(l))}if(r+=s,c&&s!==r){o=0;while(q=b[o++])q(t,u,g,h);if(f){if(r>0)while(s--)t[s]||u[s]||(u[s]=E.call(i));u=wa(u)}G.apply(i,u),k&&!f&&u.length>0&&r+b.length>1&&ga.uniqueSort(i)}return k&&(w=y,j=v),t};return c?ia(f):f}return h=ga.compile=function(a,b){var c,d=[],e=[],f=A[a+" "];if(!f){b||(b=g(a)),c=b.length;while(c--)f=ya(b[c]),f[u]?d.push(f):e.push(f);f=A(a,za(e,d)),f.selector=a}return f},i=ga.select=function(a,b,c,e){var f,i,j,k,l,m="function"==typeof a&&a,n=!e&&g(a=m.selector||a);if(c=c||[],1===n.length){if(i=n[0]=n[0].slice(0),i.length>2&&"ID"===(j=i[0]).type&&9===b.nodeType&&p&&d.relative[i[1].type]){if(b=(d.find.ID(j.matches[0].replace(_,aa),b)||[])[0],!b)return c;m&&(b=b.parentNode),a=a.slice(i.shift().value.length)}f=V.needsContext.test(a)?0:i.length;while(f--){if(j=i[f],d.relative[k=j.type])break;if((l=d.find[k])&&(e=l(j.matches[0].replace(_,aa),$.test(i[0].type)&&qa(b.parentNode)||b))){if(i.splice(f,1),a=e.length&&sa(i),!a)return G.apply(c,e),c;break}}}return(m||h(a,n))(e,b,!p,c,!b||$.test(a)&&qa(b.parentNode)||b),c},c.sortStable=u.split("").sort(B).join("")===u,c.detectDuplicates=!!l,m(),c.sortDetached=ja(function(a){return 1&a.compareDocumentPosition(n.createElement("fieldset"))}),ja(function(a){return a.innerHTML="<a href='#'></a>","#"===a.firstChild.getAttribute("href")})||ka("type|href|height|width",function(a,b,c){if(!c)return a.getAttribute(b,"type"===b.toLowerCase()?1:2)}),c.attributes&&ja(function(a){return a.innerHTML="<input/>",a.firstChild.setAttribute("value",""),""===a.firstChild.getAttribute("value")})||ka("value",function(a,b,c){if(!c&&"input"===a.nodeName.toLowerCase())return a.defaultValue}),ja(function(a){return null==a.getAttribute("disabled")})||ka(J,function(a,b,c){var d;if(!c)return a[b]===!0?b.toLowerCase():(d=a.getAttributeNode(b))&&d.specified?d.value:null}),ga}(a);r.find=x,r.expr=x.selectors,r.expr[":"]=r.expr.pseudos,r.uniqueSort=r.unique=x.uniqueSort,r.text=x.getText,r.isXMLDoc=x.isXML,r.contains=x.contains,r.escapeSelector=x.escape;var y=function(a,b,c){var d=[],e=void 0!==c;while((a=a[b])&&9!==a.nodeType)if(1===a.nodeType){if(e&&r(a).is(c))break;d.push(a)}return d},z=function(a,b){for(var c=[];a;a=a.nextSibling)1===a.nodeType&&a!==b&&c.push(a);return c},A=r.expr.match.needsContext;function B(a,b){return a.nodeName&&a.nodeName.toLowerCase()===b.toLowerCase()}var C=/^<([a-z][^\/\0>:\x20\t\r\n\f]*)[\x20\t\r\n\f]*\/?>(?:<\/\1>|)$/i,D=/^.[^:#\[\.,]*$/;function E(a,b,c){return r.isFunction(b)?r.grep(a,function(a,d){return!!b.call(a,d,a)!==c}):b.nodeType?r.grep(a,function(a){return a===b!==c}):"string"!=typeof b?r.grep(a,function(a){return i.call(b,a)>-1!==c}):D.test(b)?r.filter(b,a,c):(b=r.filter(b,a),r.grep(a,function(a){return i.call(b,a)>-1!==c&&1===a.nodeType}))}r.filter=function(a,b,c){var d=b[0];return c&&(a=":not("+a+")"),1===b.length&&1===d.nodeType?r.find.matchesSelector(d,a)?[d]:[]:r.find.matches(a,r.grep(b,function(a){return 1===a.nodeType}))},r.fn.extend({find:function(a){var b,c,d=this.length,e=this;if("string"!=typeof a)return this.pushStack(r(a).filter(function(){for(b=0;b<d;b++)if(r.contains(e[b],this))return!0}));for(c=this.pushStack([]),b=0;b<d;b++)r.find(a,e[b],c);return d>1?r.uniqueSort(c):c},filter:function(a){return this.pushStack(E(this,a||[],!1))},not:function(a){return this.pushStack(E(this,a||[],!0))},is:function(a){return!!E(this,"string"==typeof a&&A.test(a)?r(a):a||[],!1).length}});var F,G=/^(?:\s*(<[\w\W]+>)[^>]*|#([\w-]+))$/,H=r.fn.init=function(a,b,c){var e,f;if(!a)return this;if(c=c||F,"string"==typeof a){if(e="<"===a[0]&&">"===a[a.length-1]&&a.length>=3?[null,a,null]:G.exec(a),!e||!e[1]&&b)return!b||b.jquery?(b||c).find(a):this.constructor(b).find(a);if(e[1]){if(b=b instanceof r?b[0]:b,r.merge(this,r.parseHTML(e[1],b&&b.nodeType?b.ownerDocument||b:d,!0)),C.test(e[1])&&r.isPlainObject(b))for(e in b)r.isFunction(this[e])?this[e](b[e]):this.attr(e,b[e]);return this}return f=d.getElementById(e[2]),f&&(this[0]=f,this.length=1),this}return a.nodeType?(this[0]=a,this.length=1,this):r.isFunction(a)?void 0!==c.ready?c.ready(a):a(r):r.makeArray(a,this)};H.prototype=r.fn,F=r(d);var I=/^(?:parents|prev(?:Until|All))/,J={children:!0,contents:!0,next:!0,prev:!0};r.fn.extend({has:function(a){var b=r(a,this),c=b.length;return this.filter(function(){for(var a=0;a<c;a++)if(r.contains(this,b[a]))return!0})},closest:function(a,b){var c,d=0,e=this.length,f=[],g="string"!=typeof a&&r(a);if(!A.test(a))for(;d<e;d++)for(c=this[d];c&&c!==b;c=c.parentNode)if(c.nodeType<11&&(g?g.index(c)>-1:1===c.nodeType&&r.find.matchesSelector(c,a))){f.push(c);break}return this.pushStack(f.length>1?r.uniqueSort(f):f)},index:function(a){return a?"string"==typeof a?i.call(r(a),this[0]):i.call(this,a.jquery?a[0]:a):this[0]&&this[0].parentNode?this.first().prevAll().length:-1},add:function(a,b){return this.pushStack(r.uniqueSort(r.merge(this.get(),r(a,b))))},addBack:function(a){return this.add(null==a?this.prevObject:this.prevObject.filter(a))}});function K(a,b){while((a=a[b])&&1!==a.nodeType);return a}r.each({parent:function(a){var b=a.parentNode;return b&&11!==b.nodeType?b:null},parents:function(a){return y(a,"parentNode")},parentsUntil:function(a,b,c){return y(a,"parentNode",c)},next:function(a){return K(a,"nextSibling")},prev:function(a){return K(a,"previousSibling")},nextAll:function(a){return y(a,"nextSibling")},prevAll:function(a){return y(a,"previousSibling")},nextUntil:function(a,b,c){return y(a,"nextSibling",c)},prevUntil:function(a,b,c){return y(a,"previousSibling",c)},siblings:function(a){return z((a.parentNode||{}).firstChild,a)},children:function(a){return z(a.firstChild)},contents:function(a){return B(a,"iframe")?a.contentDocument:(B(a,"template")&&(a=a.content||a),r.merge([],a.childNodes))}},function(a,b){r.fn[a]=function(c,d){var e=r.map(this,b,c);return"Until"!==a.slice(-5)&&(d=c),d&&"string"==typeof d&&(e=r.filter(d,e)),this.length>1&&(J[a]||r.uniqueSort(e),I.test(a)&&e.reverse()),this.pushStack(e)}});var L=/[^\x20\t\r\n\f]+/g;function M(a){var b={};return r.each(a.match(L)||[],function(a,c){b[c]=!0}),b}r.Callbacks=function(a){a="string"==typeof a?M(a):r.extend({},a);var b,c,d,e,f=[],g=[],h=-1,i=function(){for(e=e||a.once,d=b=!0;g.length;h=-1){c=g.shift();while(++h<f.length)f[h].apply(c[0],c[1])===!1&&a.stopOnFalse&&(h=f.length,c=!1)}a.memory||(c=!1),b=!1,e&&(f=c?[]:"")},j={add:function(){return f&&(c&&!b&&(h=f.length-1,g.push(c)),function d(b){r.each(b,function(b,c){r.isFunction(c)?a.unique&&j.has(c)||f.push(c):c&&c.length&&"string"!==r.type(c)&&d(c)})}(arguments),c&&!b&&i()),this},remove:function(){return r.each(arguments,function(a,b){var c;while((c=r.inArray(b,f,c))>-1)f.splice(c,1),c<=h&&h--}),this},has:function(a){return a?r.inArray(a,f)>-1:f.length>0},empty:function(){return f&&(f=[]),this},disable:function(){return e=g=[],f=c="",this},disabled:function(){return!f},lock:function(){return e=g=[],c||b||(f=c=""),this},locked:function(){return!!e},fireWith:function(a,c){return e||(c=c||[],c=[a,c.slice?c.slice():c],g.push(c),b||i()),this},fire:function(){return j.fireWith(this,arguments),this},fired:function(){return!!d}};return j};function N(a){return a}function O(a){throw a}function P(a,b,c,d){var e;try{a&&r.isFunction(e=a.promise)?e.call(a).done(b).fail(c):a&&r.isFunction(e=a.then)?e.call(a,b,c):b.apply(void 0,[a].slice(d))}catch(a){c.apply(void 0,[a])}}r.extend({Deferred:function(b){var c=[["notify","progress",r.Callbacks("memory"),r.Callbacks("memory"),2],["resolve","done",r.Callbacks("once memory"),r.Callbacks("once memory"),0,"resolved"],["reject","fail",r.Callbacks("once memory"),r.Callbacks("once memory"),1,"rejected"]],d="pending",e={state:function(){return d},always:function(){return f.done(arguments).fail(arguments),this},"catch":function(a){return e.then(null,a)},pipe:function(){var a=arguments;return r.Deferred(function(b){r.each(c,function(c,d){var e=r.isFunction(a[d[4]])&&a[d[4]];f[d[1]](function(){var a=e&&e.apply(this,arguments);a&&r.isFunction(a.promise)?a.promise().progress(b.notify).done(b.resolve).fail(b.reject):b[d[0]+"With"](this,e?[a]:arguments)})}),a=null}).promise()},then:function(b,d,e){var f=0;function g(b,c,d,e){return function(){var h=this,i=arguments,j=function(){var a,j;if(!(b<f)){if(a=d.apply(h,i),a===c.promise())throw new TypeError("Thenable self-resolution");j=a&&("object"==typeof a||"function"==typeof a)&&a.then,r.isFunction(j)?e?j.call(a,g(f,c,N,e),g(f,c,O,e)):(f++,j.call(a,g(f,c,N,e),g(f,c,O,e),g(f,c,N,c.notifyWith))):(d!==N&&(h=void 0,i=[a]),(e||c.resolveWith)(h,i))}},k=e?j:function(){try{j()}catch(a){r.Deferred.exceptionHook&&r.Deferred.exceptionHook(a,k.stackTrace),b+1>=f&&(d!==O&&(h=void 0,i=[a]),c.rejectWith(h,i))}};b?k():(r.Deferred.getStackHook&&(k.stackTrace=r.Deferred.getStackHook()),a.setTimeout(k))}}return r.Deferred(function(a){c[0][3].add(g(0,a,r.isFunction(e)?e:N,a.notifyWith)),c[1][3].add(g(0,a,r.isFunction(b)?b:N)),c[2][3].add(g(0,a,r.isFunction(d)?d:O))}).promise()},promise:function(a){return null!=a?r.extend(a,e):e}},f={};return r.each(c,function(a,b){var g=b[2],h=b[5];e[b[1]]=g.add,h&&g.add(function(){d=h},c[3-a][2].disable,c[0][2].lock),g.add(b[3].fire),f[b[0]]=function(){return f[b[0]+"With"](this===f?void 0:this,arguments),this},f[b[0]+"With"]=g.fireWith}),e.promise(f),b&&b.call(f,f),f},when:function(a){var b=arguments.length,c=b,d=Array(c),e=f.call(arguments),g=r.Deferred(),h=function(a){return function(c){d[a]=this,e[a]=arguments.length>1?f.call(arguments):c,--b||g.resolveWith(d,e)}};if(b<=1&&(P(a,g.done(h(c)).resolve,g.reject,!b),"pending"===g.state()||r.isFunction(e[c]&&e[c].then)))return g.then();while(c--)P(e[c],h(c),g.reject);return g.promise()}});var Q=/^(Eval|Internal|Range|Reference|Syntax|Type|URI)Error$/;r.Deferred.exceptionHook=function(b,c){a.console&&a.console.warn&&b&&Q.test(b.name)&&a.console.warn("jQuery.Deferred exception: "+b.message,b.stack,c)},r.readyException=function(b){a.setTimeout(function(){throw b})};var R=r.Deferred();r.fn.ready=function(a){return R.then(a)["catch"](function(a){r.readyException(a)}),this},r.extend({isReady:!1,readyWait:1,ready:function(a){(a===!0?--r.readyWait:r.isReady)||(r.isReady=!0,a!==!0&&--r.readyWait>0||R.resolveWith(d,[r]))}}),r.ready.then=R.then;function S(){d.removeEventListener("DOMContentLoaded",S),
a.removeEventListener("load",S),r.ready()}"complete"===d.readyState||"loading"!==d.readyState&&!d.documentElement.doScroll?a.setTimeout(r.ready):(d.addEventListener("DOMContentLoaded",S),a.addEventListener("load",S));var T=function(a,b,c,d,e,f,g){var h=0,i=a.length,j=null==c;if("object"===r.type(c)){e=!0;for(h in c)T(a,b,h,c[h],!0,f,g)}else if(void 0!==d&&(e=!0,r.isFunction(d)||(g=!0),j&&(g?(b.call(a,d),b=null):(j=b,b=function(a,b,c){return j.call(r(a),c)})),b))for(;h<i;h++)b(a[h],c,g?d:d.call(a[h],h,b(a[h],c)));return e?a:j?b.call(a):i?b(a[0],c):f},U=function(a){return 1===a.nodeType||9===a.nodeType||!+a.nodeType};function V(){this.expando=r.expando+V.uid++}V.uid=1,V.prototype={cache:function(a){var b=a[this.expando];return b||(b={},U(a)&&(a.nodeType?a[this.expando]=b:Object.defineProperty(a,this.expando,{value:b,configurable:!0}))),b},set:function(a,b,c){var d,e=this.cache(a);if("string"==typeof b)e[r.camelCase(b)]=c;else for(d in b)e[r.camelCase(d)]=b[d];return e},get:function(a,b){return void 0===b?this.cache(a):a[this.expando]&&a[this.expando][r.camelCase(b)]},access:function(a,b,c){return void 0===b||b&&"string"==typeof b&&void 0===c?this.get(a,b):(this.set(a,b,c),void 0!==c?c:b)},remove:function(a,b){var c,d=a[this.expando];if(void 0!==d){if(void 0!==b){Array.isArray(b)?b=b.map(r.camelCase):(b=r.camelCase(b),b=b in d?[b]:b.match(L)||[]),c=b.length;while(c--)delete d[b[c]]}(void 0===b||r.isEmptyObject(d))&&(a.nodeType?a[this.expando]=void 0:delete a[this.expando])}},hasData:function(a){var b=a[this.expando];return void 0!==b&&!r.isEmptyObject(b)}};var W=new V,X=new V,Y=/^(?:\{[\w\W]*\}|\[[\w\W]*\])$/,Z=/[A-Z]/g;function $(a){return"true"===a||"false"!==a&&("null"===a?null:a===+a+""?+a:Y.test(a)?JSON.parse(a):a)}function _(a,b,c){var d;if(void 0===c&&1===a.nodeType)if(d="data-"+b.replace(Z,"-$&").toLowerCase(),c=a.getAttribute(d),"string"==typeof c){try{c=$(c)}catch(e){}X.set(a,b,c)}else c=void 0;return c}r.extend({hasData:function(a){return X.hasData(a)||W.hasData(a)},data:function(a,b,c){return X.access(a,b,c)},removeData:function(a,b){X.remove(a,b)},_data:function(a,b,c){return W.access(a,b,c)},_removeData:function(a,b){W.remove(a,b)}}),r.fn.extend({data:function(a,b){var c,d,e,f=this[0],g=f&&f.attributes;if(void 0===a){if(this.length&&(e=X.get(f),1===f.nodeType&&!W.get(f,"hasDataAttrs"))){c=g.length;while(c--)g[c]&&(d=g[c].name,0===d.indexOf("data-")&&(d=r.camelCase(d.slice(5)),_(f,d,e[d])));W.set(f,"hasDataAttrs",!0)}return e}return"object"==typeof a?this.each(function(){X.set(this,a)}):T(this,function(b){var c;if(f&&void 0===b){if(c=X.get(f,a),void 0!==c)return c;if(c=_(f,a),void 0!==c)return c}else this.each(function(){X.set(this,a,b)})},null,b,arguments.length>1,null,!0)},removeData:function(a){return this.each(function(){X.remove(this,a)})}}),r.extend({queue:function(a,b,c){var d;if(a)return b=(b||"fx")+"queue",d=W.get(a,b),c&&(!d||Array.isArray(c)?d=W.access(a,b,r.makeArray(c)):d.push(c)),d||[]},dequeue:function(a,b){b=b||"fx";var c=r.queue(a,b),d=c.length,e=c.shift(),f=r._queueHooks(a,b),g=function(){r.dequeue(a,b)};"inprogress"===e&&(e=c.shift(),d--),e&&("fx"===b&&c.unshift("inprogress"),delete f.stop,e.call(a,g,f)),!d&&f&&f.empty.fire()},_queueHooks:function(a,b){var c=b+"queueHooks";return W.get(a,c)||W.access(a,c,{empty:r.Callbacks("once memory").add(function(){W.remove(a,[b+"queue",c])})})}}),r.fn.extend({queue:function(a,b){var c=2;return"string"!=typeof a&&(b=a,a="fx",c--),arguments.length<c?r.queue(this[0],a):void 0===b?this:this.each(function(){var c=r.queue(this,a,b);r._queueHooks(this,a),"fx"===a&&"inprogress"!==c[0]&&r.dequeue(this,a)})},dequeue:function(a){return this.each(function(){r.dequeue(this,a)})},clearQueue:function(a){return this.queue(a||"fx",[])},promise:function(a,b){var c,d=1,e=r.Deferred(),f=this,g=this.length,h=function(){--d||e.resolveWith(f,[f])};"string"!=typeof a&&(b=a,a=void 0),a=a||"fx";while(g--)c=W.get(f[g],a+"queueHooks"),c&&c.empty&&(d++,c.empty.add(h));return h(),e.promise(b)}});var aa=/[+-]?(?:\d*\.|)\d+(?:[eE][+-]?\d+|)/.source,ba=new RegExp("^(?:([+-])=|)("+aa+")([a-z%]*)$","i"),ca=["Top","Right","Bottom","Left"],da=function(a,b){return a=b||a,"none"===a.style.display||""===a.style.display&&r.contains(a.ownerDocument,a)&&"none"===r.css(a,"display")},ea=function(a,b,c,d){var e,f,g={};for(f in b)g[f]=a.style[f],a.style[f]=b[f];e=c.apply(a,d||[]);for(f in b)a.style[f]=g[f];return e};function fa(a,b,c,d){var e,f=1,g=20,h=d?function(){return d.cur()}:function(){return r.css(a,b,"")},i=h(),j=c&&c[3]||(r.cssNumber[b]?"":"px"),k=(r.cssNumber[b]||"px"!==j&&+i)&&ba.exec(r.css(a,b));if(k&&k[3]!==j){j=j||k[3],c=c||[],k=+i||1;do f=f||".5",k/=f,r.style(a,b,k+j);while(f!==(f=h()/i)&&1!==f&&--g)}return c&&(k=+k||+i||0,e=c[1]?k+(c[1]+1)*c[2]:+c[2],d&&(d.unit=j,d.start=k,d.end=e)),e}var ga={};function ha(a){var b,c=a.ownerDocument,d=a.nodeName,e=ga[d];return e?e:(b=c.body.appendChild(c.createElement(d)),e=r.css(b,"display"),b.parentNode.removeChild(b),"none"===e&&(e="block"),ga[d]=e,e)}function ia(a,b){for(var c,d,e=[],f=0,g=a.length;f<g;f++)d=a[f],d.style&&(c=d.style.display,b?("none"===c&&(e[f]=W.get(d,"display")||null,e[f]||(d.style.display="")),""===d.style.display&&da(d)&&(e[f]=ha(d))):"none"!==c&&(e[f]="none",W.set(d,"display",c)));for(f=0;f<g;f++)null!=e[f]&&(a[f].style.display=e[f]);return a}r.fn.extend({show:function(){return ia(this,!0)},hide:function(){return ia(this)},toggle:function(a){return"boolean"==typeof a?a?this.show():this.hide():this.each(function(){da(this)?r(this).show():r(this).hide()})}});var ja=/^(?:checkbox|radio)$/i,ka=/<([a-z][^\/\0>\x20\t\r\n\f]+)/i,la=/^$|\/(?:java|ecma)script/i,ma={option:[1,"<select multiple='multiple'>","</select>"],thead:[1,"<table>","</table>"],col:[2,"<table><colgroup>","</colgroup></table>"],tr:[2,"<table><tbody>","</tbody></table>"],td:[3,"<table><tbody><tr>","</tr></tbody></table>"],_default:[0,"",""]};ma.optgroup=ma.option,ma.tbody=ma.tfoot=ma.colgroup=ma.caption=ma.thead,ma.th=ma.td;function na(a,b){var c;return c="undefined"!=typeof a.getElementsByTagName?a.getElementsByTagName(b||"*"):"undefined"!=typeof a.querySelectorAll?a.querySelectorAll(b||"*"):[],void 0===b||b&&B(a,b)?r.merge([a],c):c}function oa(a,b){for(var c=0,d=a.length;c<d;c++)W.set(a[c],"globalEval",!b||W.get(b[c],"globalEval"))}var pa=/<|&#?\w+;/;function qa(a,b,c,d,e){for(var f,g,h,i,j,k,l=b.createDocumentFragment(),m=[],n=0,o=a.length;n<o;n++)if(f=a[n],f||0===f)if("object"===r.type(f))r.merge(m,f.nodeType?[f]:f);else if(pa.test(f)){g=g||l.appendChild(b.createElement("div")),h=(ka.exec(f)||["",""])[1].toLowerCase(),i=ma[h]||ma._default,g.innerHTML=i[1]+r.htmlPrefilter(f)+i[2],k=i[0];while(k--)g=g.lastChild;r.merge(m,g.childNodes),g=l.firstChild,g.textContent=""}else m.push(b.createTextNode(f));l.textContent="",n=0;while(f=m[n++])if(d&&r.inArray(f,d)>-1)e&&e.push(f);else if(j=r.contains(f.ownerDocument,f),g=na(l.appendChild(f),"script"),j&&oa(g),c){k=0;while(f=g[k++])la.test(f.type||"")&&c.push(f)}return l}!function(){var a=d.createDocumentFragment(),b=a.appendChild(d.createElement("div")),c=d.createElement("input");c.setAttribute("type","radio"),c.setAttribute("checked","checked"),c.setAttribute("name","t"),b.appendChild(c),o.checkClone=b.cloneNode(!0).cloneNode(!0).lastChild.checked,b.innerHTML="<textarea>x</textarea>",o.noCloneChecked=!!b.cloneNode(!0).lastChild.defaultValue}();var ra=d.documentElement,sa=/^key/,ta=/^(?:mouse|pointer|contextmenu|drag|drop)|click/,ua=/^([^.]*)(?:\.(.+)|)/;function va(){return!0}function wa(){return!1}function xa(){try{return d.activeElement}catch(a){}}function ya(a,b,c,d,e,f){var g,h;if("object"==typeof b){"string"!=typeof c&&(d=d||c,c=void 0);for(h in b)ya(a,h,c,d,b[h],f);return a}if(null==d&&null==e?(e=c,d=c=void 0):null==e&&("string"==typeof c?(e=d,d=void 0):(e=d,d=c,c=void 0)),e===!1)e=wa;else if(!e)return a;return 1===f&&(g=e,e=function(a){return r().off(a),g.apply(this,arguments)},e.guid=g.guid||(g.guid=r.guid++)),a.each(function(){r.event.add(this,b,e,d,c)})}r.event={global:{},add:function(a,b,c,d,e){var f,g,h,i,j,k,l,m,n,o,p,q=W.get(a);if(q){c.handler&&(f=c,c=f.handler,e=f.selector),e&&r.find.matchesSelector(ra,e),c.guid||(c.guid=r.guid++),(i=q.events)||(i=q.events={}),(g=q.handle)||(g=q.handle=function(b){return"undefined"!=typeof r&&r.event.triggered!==b.type?r.event.dispatch.apply(a,arguments):void 0}),b=(b||"").match(L)||[""],j=b.length;while(j--)h=ua.exec(b[j])||[],n=p=h[1],o=(h[2]||"").split(".").sort(),n&&(l=r.event.special[n]||{},n=(e?l.delegateType:l.bindType)||n,l=r.event.special[n]||{},k=r.extend({type:n,origType:p,data:d,handler:c,guid:c.guid,selector:e,needsContext:e&&r.expr.match.needsContext.test(e),namespace:o.join(".")},f),(m=i[n])||(m=i[n]=[],m.delegateCount=0,l.setup&&l.setup.call(a,d,o,g)!==!1||a.addEventListener&&a.addEventListener(n,g)),l.add&&(l.add.call(a,k),k.handler.guid||(k.handler.guid=c.guid)),e?m.splice(m.delegateCount++,0,k):m.push(k),r.event.global[n]=!0)}},remove:function(a,b,c,d,e){var f,g,h,i,j,k,l,m,n,o,p,q=W.hasData(a)&&W.get(a);if(q&&(i=q.events)){b=(b||"").match(L)||[""],j=b.length;while(j--)if(h=ua.exec(b[j])||[],n=p=h[1],o=(h[2]||"").split(".").sort(),n){l=r.event.special[n]||{},n=(d?l.delegateType:l.bindType)||n,m=i[n]||[],h=h[2]&&new RegExp("(^|\\.)"+o.join("\\.(?:.*\\.|)")+"(\\.|$)"),g=f=m.length;while(f--)k=m[f],!e&&p!==k.origType||c&&c.guid!==k.guid||h&&!h.test(k.namespace)||d&&d!==k.selector&&("**"!==d||!k.selector)||(m.splice(f,1),k.selector&&m.delegateCount--,l.remove&&l.remove.call(a,k));g&&!m.length&&(l.teardown&&l.teardown.call(a,o,q.handle)!==!1||r.removeEvent(a,n,q.handle),delete i[n])}else for(n in i)r.event.remove(a,n+b[j],c,d,!0);r.isEmptyObject(i)&&W.remove(a,"handle events")}},dispatch:function(a){var b=r.event.fix(a),c,d,e,f,g,h,i=new Array(arguments.length),j=(W.get(this,"events")||{})[b.type]||[],k=r.event.special[b.type]||{};for(i[0]=b,c=1;c<arguments.length;c++)i[c]=arguments[c];if(b.delegateTarget=this,!k.preDispatch||k.preDispatch.call(this,b)!==!1){h=r.event.handlers.call(this,b,j),c=0;while((f=h[c++])&&!b.isPropagationStopped()){b.currentTarget=f.elem,d=0;while((g=f.handlers[d++])&&!b.isImmediatePropagationStopped())b.rnamespace&&!b.rnamespace.test(g.namespace)||(b.handleObj=g,b.data=g.data,e=((r.event.special[g.origType]||{}).handle||g.handler).apply(f.elem,i),void 0!==e&&(b.result=e)===!1&&(b.preventDefault(),b.stopPropagation()))}return k.postDispatch&&k.postDispatch.call(this,b),b.result}},handlers:function(a,b){var c,d,e,f,g,h=[],i=b.delegateCount,j=a.target;if(i&&j.nodeType&&!("click"===a.type&&a.button>=1))for(;j!==this;j=j.parentNode||this)if(1===j.nodeType&&("click"!==a.type||j.disabled!==!0)){for(f=[],g={},c=0;c<i;c++)d=b[c],e=d.selector+" ",void 0===g[e]&&(g[e]=d.needsContext?r(e,this).index(j)>-1:r.find(e,this,null,[j]).length),g[e]&&f.push(d);f.length&&h.push({elem:j,handlers:f})}return j=this,i<b.length&&h.push({elem:j,handlers:b.slice(i)}),h},addProp:function(a,b){Object.defineProperty(r.Event.prototype,a,{enumerable:!0,configurable:!0,get:r.isFunction(b)?function(){if(this.originalEvent)return b(this.originalEvent)}:function(){if(this.originalEvent)return this.originalEvent[a]},set:function(b){Object.defineProperty(this,a,{enumerable:!0,configurable:!0,writable:!0,value:b})}})},fix:function(a){return a[r.expando]?a:new r.Event(a)},special:{load:{noBubble:!0},focus:{trigger:function(){if(this!==xa()&&this.focus)return this.focus(),!1},delegateType:"focusin"},blur:{trigger:function(){if(this===xa()&&this.blur)return this.blur(),!1},delegateType:"focusout"},click:{trigger:function(){if("checkbox"===this.type&&this.click&&B(this,"input"))return this.click(),!1},_default:function(a){return B(a.target,"a")}},beforeunload:{postDispatch:function(a){void 0!==a.result&&a.originalEvent&&(a.originalEvent.returnValue=a.result)}}}},r.removeEvent=function(a,b,c){a.removeEventListener&&a.removeEventListener(b,c)},r.Event=function(a,b){return this instanceof r.Event?(a&&a.type?(this.originalEvent=a,this.type=a.type,this.isDefaultPrevented=a.defaultPrevented||void 0===a.defaultPrevented&&a.returnValue===!1?va:wa,this.target=a.target&&3===a.target.nodeType?a.target.parentNode:a.target,this.currentTarget=a.currentTarget,this.relatedTarget=a.relatedTarget):this.type=a,b&&r.extend(this,b),this.timeStamp=a&&a.timeStamp||r.now(),void(this[r.expando]=!0)):new r.Event(a,b)},r.Event.prototype={constructor:r.Event,isDefaultPrevented:wa,isPropagationStopped:wa,isImmediatePropagationStopped:wa,isSimulated:!1,preventDefault:function(){var a=this.originalEvent;this.isDefaultPrevented=va,a&&!this.isSimulated&&a.preventDefault()},stopPropagation:function(){var a=this.originalEvent;this.isPropagationStopped=va,a&&!this.isSimulated&&a.stopPropagation()},stopImmediatePropagation:function(){var a=this.originalEvent;this.isImmediatePropagationStopped=va,a&&!this.isSimulated&&a.stopImmediatePropagation(),this.stopPropagation()}},r.each({altKey:!0,bubbles:!0,cancelable:!0,changedTouches:!0,ctrlKey:!0,detail:!0,eventPhase:!0,metaKey:!0,pageX:!0,pageY:!0,shiftKey:!0,view:!0,"char":!0,charCode:!0,key:!0,keyCode:!0,button:!0,buttons:!0,clientX:!0,clientY:!0,offsetX:!0,offsetY:!0,pointerId:!0,pointerType:!0,screenX:!0,screenY:!0,targetTouches:!0,toElement:!0,touches:!0,which:function(a){var b=a.button;return null==a.which&&sa.test(a.type)?null!=a.charCode?a.charCode:a.keyCode:!a.which&&void 0!==b&&ta.test(a.type)?1&b?1:2&b?3:4&b?2:0:a.which}},r.event.addProp),r.each({mouseenter:"mouseover",mouseleave:"mouseout",pointerenter:"pointerover",pointerleave:"pointerout"},function(a,b){r.event.special[a]={delegateType:b,bindType:b,handle:function(a){var c,d=this,e=a.relatedTarget,f=a.handleObj;return e&&(e===d||r.contains(d,e))||(a.type=f.origType,c=f.handler.apply(this,arguments),a.type=b),c}}}),r.fn.extend({on:function(a,b,c,d){return ya(this,a,b,c,d)},one:function(a,b,c,d){return ya(this,a,b,c,d,1)},off:function(a,b,c){var d,e;if(a&&a.preventDefault&&a.handleObj)return d=a.handleObj,r(a.delegateTarget).off(d.namespace?d.origType+"."+d.namespace:d.origType,d.selector,d.handler),this;if("object"==typeof a){for(e in a)this.off(e,b,a[e]);return this}return b!==!1&&"function"!=typeof b||(c=b,b=void 0),c===!1&&(c=wa),this.each(function(){r.event.remove(this,a,c,b)})}});var za=/<(?!area|br|col|embed|hr|img|input|link|meta|param)(([a-z][^\/\0>\x20\t\r\n\f]*)[^>]*)\/>/gi,Aa=/<script|<style|<link/i,Ba=/checked\s*(?:[^=]|=\s*.checked.)/i,Ca=/^true\/(.*)/,Da=/^\s*<!(?:\[CDATA\[|--)|(?:\]\]|--)>\s*$/g;function Ea(a,b){return B(a,"table")&&B(11!==b.nodeType?b:b.firstChild,"tr")?r(">tbody",a)[0]||a:a}function Fa(a){return a.type=(null!==a.getAttribute("type"))+"/"+a.type,a}function Ga(a){var b=Ca.exec(a.type);return b?a.type=b[1]:a.removeAttribute("type"),a}function Ha(a,b){var c,d,e,f,g,h,i,j;if(1===b.nodeType){if(W.hasData(a)&&(f=W.access(a),g=W.set(b,f),j=f.events)){delete g.handle,g.events={};for(e in j)for(c=0,d=j[e].length;c<d;c++)r.event.add(b,e,j[e][c])}X.hasData(a)&&(h=X.access(a),i=r.extend({},h),X.set(b,i))}}function Ia(a,b){var c=b.nodeName.toLowerCase();"input"===c&&ja.test(a.type)?b.checked=a.checked:"input"!==c&&"textarea"!==c||(b.defaultValue=a.defaultValue)}function Ja(a,b,c,d){b=g.apply([],b);var e,f,h,i,j,k,l=0,m=a.length,n=m-1,q=b[0],s=r.isFunction(q);if(s||m>1&&"string"==typeof q&&!o.checkClone&&Ba.test(q))return a.each(function(e){var f=a.eq(e);s&&(b[0]=q.call(this,e,f.html())),Ja(f,b,c,d)});if(m&&(e=qa(b,a[0].ownerDocument,!1,a,d),f=e.firstChild,1===e.childNodes.length&&(e=f),f||d)){for(h=r.map(na(e,"script"),Fa),i=h.length;l<m;l++)j=e,l!==n&&(j=r.clone(j,!0,!0),i&&r.merge(h,na(j,"script"))),c.call(a[l],j,l);if(i)for(k=h[h.length-1].ownerDocument,r.map(h,Ga),l=0;l<i;l++)j=h[l],la.test(j.type||"")&&!W.access(j,"globalEval")&&r.contains(k,j)&&(j.src?r._evalUrl&&r._evalUrl(j.src):p(j.textContent.replace(Da,""),k))}return a}function Ka(a,b,c){for(var d,e=b?r.filter(b,a):a,f=0;null!=(d=e[f]);f++)c||1!==d.nodeType||r.cleanData(na(d)),d.parentNode&&(c&&r.contains(d.ownerDocument,d)&&oa(na(d,"script")),d.parentNode.removeChild(d));return a}r.extend({htmlPrefilter:function(a){return a.replace(za,"<$1></$2>")},clone:function(a,b,c){var d,e,f,g,h=a.cloneNode(!0),i=r.contains(a.ownerDocument,a);if(!(o.noCloneChecked||1!==a.nodeType&&11!==a.nodeType||r.isXMLDoc(a)))for(g=na(h),f=na(a),d=0,e=f.length;d<e;d++)Ia(f[d],g[d]);if(b)if(c)for(f=f||na(a),g=g||na(h),d=0,e=f.length;d<e;d++)Ha(f[d],g[d]);else Ha(a,h);return g=na(h,"script"),g.length>0&&oa(g,!i&&na(a,"script")),h},cleanData:function(a){for(var b,c,d,e=r.event.special,f=0;void 0!==(c=a[f]);f++)if(U(c)){if(b=c[W.expando]){if(b.events)for(d in b.events)e[d]?r.event.remove(c,d):r.removeEvent(c,d,b.handle);c[W.expando]=void 0}c[X.expando]&&(c[X.expando]=void 0)}}}),r.fn.extend({detach:function(a){return Ka(this,a,!0)},remove:function(a){return Ka(this,a)},text:function(a){return T(this,function(a){return void 0===a?r.text(this):this.empty().each(function(){1!==this.nodeType&&11!==this.nodeType&&9!==this.nodeType||(this.textContent=a)})},null,a,arguments.length)},append:function(){return Ja(this,arguments,function(a){if(1===this.nodeType||11===this.nodeType||9===this.nodeType){var b=Ea(this,a);b.appendChild(a)}})},prepend:function(){return Ja(this,arguments,function(a){if(1===this.nodeType||11===this.nodeType||9===this.nodeType){var b=Ea(this,a);b.insertBefore(a,b.firstChild)}})},before:function(){return Ja(this,arguments,function(a){this.parentNode&&this.parentNode.insertBefore(a,this)})},after:function(){return Ja(this,arguments,function(a){this.parentNode&&this.parentNode.insertBefore(a,this.nextSibling)})},empty:function(){for(var a,b=0;null!=(a=this[b]);b++)1===a.nodeType&&(r.cleanData(na(a,!1)),a.textContent="");return this},clone:function(a,b){return a=null!=a&&a,b=null==b?a:b,this.map(function(){return r.clone(this,a,b)})},html:function(a){return T(this,function(a){var b=this[0]||{},c=0,d=this.length;if(void 0===a&&1===b.nodeType)return b.innerHTML;if("string"==typeof a&&!Aa.test(a)&&!ma[(ka.exec(a)||["",""])[1].toLowerCase()]){a=r.htmlPrefilter(a);try{for(;c<d;c++)b=this[c]||{},1===b.nodeType&&(r.cleanData(na(b,!1)),b.innerHTML=a);b=0}catch(e){}}b&&this.empty().append(a)},null,a,arguments.length)},replaceWith:function(){var a=[];return Ja(this,arguments,function(b){var c=this.parentNode;r.inArray(this,a)<0&&(r.cleanData(na(this)),c&&c.replaceChild(b,this))},a)}}),r.each({appendTo:"append",prependTo:"prepend",insertBefore:"before",insertAfter:"after",replaceAll:"replaceWith"},function(a,b){r.fn[a]=function(a){for(var c,d=[],e=r(a),f=e.length-1,g=0;g<=f;g++)c=g===f?this:this.clone(!0),r(e[g])[b](c),h.apply(d,c.get());return this.pushStack(d)}});var La=/^margin/,Ma=new RegExp("^("+aa+")(?!px)[a-z%]+$","i"),Na=function(b){var c=b.ownerDocument.defaultView;return c&&c.opener||(c=a),c.getComputedStyle(b)};!function(){function b(){if(i){i.style.cssText="box-sizing:border-box;position:relative;display:block;margin:auto;border:1px;padding:1px;top:1%;width:50%",i.innerHTML="",ra.appendChild(h);var b=a.getComputedStyle(i);c="1%"!==b.top,g="2px"===b.marginLeft,e="4px"===b.width,i.style.marginRight="50%",f="4px"===b.marginRight,ra.removeChild(h),i=null}}var c,e,f,g,h=d.createElement("div"),i=d.createElement("div");i.style&&(i.style.backgroundClip="content-box",i.cloneNode(!0).style.backgroundClip="",o.clearCloneStyle="content-box"===i.style.backgroundClip,h.style.cssText="border:0;width:8px;height:0;top:0;left:-9999px;padding:0;margin-top:1px;position:absolute",h.appendChild(i),r.extend(o,{pixelPosition:function(){return b(),c},boxSizingReliable:function(){return b(),e},pixelMarginRight:function(){return b(),f},reliableMarginLeft:function(){return b(),g}}))}();function Oa(a,b,c){var d,e,f,g,h=a.style;return c=c||Na(a),c&&(g=c.getPropertyValue(b)||c[b],""!==g||r.contains(a.ownerDocument,a)||(g=r.style(a,b)),!o.pixelMarginRight()&&Ma.test(g)&&La.test(b)&&(d=h.width,e=h.minWidth,f=h.maxWidth,h.minWidth=h.maxWidth=h.width=g,g=c.width,h.width=d,h.minWidth=e,h.maxWidth=f)),void 0!==g?g+"":g}function Pa(a,b){return{get:function(){return a()?void delete this.get:(this.get=b).apply(this,arguments)}}}var Qa=/^(none|table(?!-c[ea]).+)/,Ra=/^--/,Sa={position:"absolute",visibility:"hidden",display:"block"},Ta={letterSpacing:"0",fontWeight:"400"},Ua=["Webkit","Moz","ms"],Va=d.createElement("div").style;function Wa(a){if(a in Va)return a;var b=a[0].toUpperCase()+a.slice(1),c=Ua.length;while(c--)if(a=Ua[c]+b,a in Va)return a}function Xa(a){var b=r.cssProps[a];return b||(b=r.cssProps[a]=Wa(a)||a),b}function Ya(a,b,c){var d=ba.exec(b);return d?Math.max(0,d[2]-(c||0))+(d[3]||"px"):b}function Za(a,b,c,d,e){var f,g=0;for(f=c===(d?"border":"content")?4:"width"===b?1:0;f<4;f+=2)"margin"===c&&(g+=r.css(a,c+ca[f],!0,e)),d?("content"===c&&(g-=r.css(a,"padding"+ca[f],!0,e)),"margin"!==c&&(g-=r.css(a,"border"+ca[f]+"Width",!0,e))):(g+=r.css(a,"padding"+ca[f],!0,e),"padding"!==c&&(g+=r.css(a,"border"+ca[f]+"Width",!0,e)));return g}function $a(a,b,c){var d,e=Na(a),f=Oa(a,b,e),g="border-box"===r.css(a,"boxSizing",!1,e);return Ma.test(f)?f:(d=g&&(o.boxSizingReliable()||f===a.style[b]),"auto"===f&&(f=a["offset"+b[0].toUpperCase()+b.slice(1)]),f=parseFloat(f)||0,f+Za(a,b,c||(g?"border":"content"),d,e)+"px")}r.extend({cssHooks:{opacity:{get:function(a,b){if(b){var c=Oa(a,"opacity");return""===c?"1":c}}}},cssNumber:{animationIterationCount:!0,columnCount:!0,fillOpacity:!0,flexGrow:!0,flexShrink:!0,fontWeight:!0,lineHeight:!0,opacity:!0,order:!0,orphans:!0,widows:!0,zIndex:!0,zoom:!0},cssProps:{"float":"cssFloat"},style:function(a,b,c,d){if(a&&3!==a.nodeType&&8!==a.nodeType&&a.style){var e,f,g,h=r.camelCase(b),i=Ra.test(b),j=a.style;return i||(b=Xa(h)),g=r.cssHooks[b]||r.cssHooks[h],void 0===c?g&&"get"in g&&void 0!==(e=g.get(a,!1,d))?e:j[b]:(f=typeof c,"string"===f&&(e=ba.exec(c))&&e[1]&&(c=fa(a,b,e),f="number"),null!=c&&c===c&&("number"===f&&(c+=e&&e[3]||(r.cssNumber[h]?"":"px")),o.clearCloneStyle||""!==c||0!==b.indexOf("background")||(j[b]="inherit"),g&&"set"in g&&void 0===(c=g.set(a,c,d))||(i?j.setProperty(b,c):j[b]=c)),void 0)}},css:function(a,b,c,d){var e,f,g,h=r.camelCase(b),i=Ra.test(b);return i||(b=Xa(h)),g=r.cssHooks[b]||r.cssHooks[h],g&&"get"in g&&(e=g.get(a,!0,c)),void 0===e&&(e=Oa(a,b,d)),"normal"===e&&b in Ta&&(e=Ta[b]),""===c||c?(f=parseFloat(e),c===!0||isFinite(f)?f||0:e):e}}),r.each(["height","width"],function(a,b){r.cssHooks[b]={get:function(a,c,d){if(c)return!Qa.test(r.css(a,"display"))||a.getClientRects().length&&a.getBoundingClientRect().width?$a(a,b,d):ea(a,Sa,function(){return $a(a,b,d)})},set:function(a,c,d){var e,f=d&&Na(a),g=d&&Za(a,b,d,"border-box"===r.css(a,"boxSizing",!1,f),f);return g&&(e=ba.exec(c))&&"px"!==(e[3]||"px")&&(a.style[b]=c,c=r.css(a,b)),Ya(a,c,g)}}}),r.cssHooks.marginLeft=Pa(o.reliableMarginLeft,function(a,b){if(b)return(parseFloat(Oa(a,"marginLeft"))||a.getBoundingClientRect().left-ea(a,{marginLeft:0},function(){return a.getBoundingClientRect().left}))+"px"}),r.each({margin:"",padding:"",border:"Width"},function(a,b){r.cssHooks[a+b]={expand:function(c){for(var d=0,e={},f="string"==typeof c?c.split(" "):[c];d<4;d++)e[a+ca[d]+b]=f[d]||f[d-2]||f[0];return e}},La.test(a)||(r.cssHooks[a+b].set=Ya)}),r.fn.extend({css:function(a,b){return T(this,function(a,b,c){var d,e,f={},g=0;if(Array.isArray(b)){for(d=Na(a),e=b.length;g<e;g++)f[b[g]]=r.css(a,b[g],!1,d);return f}return void 0!==c?r.style(a,b,c):r.css(a,b)},a,b,arguments.length>1)}});function _a(a,b,c,d,e){return new _a.prototype.init(a,b,c,d,e)}r.Tween=_a,_a.prototype={constructor:_a,init:function(a,b,c,d,e,f){this.elem=a,this.prop=c,this.easing=e||r.easing._default,this.options=b,this.start=this.now=this.cur(),this.end=d,this.unit=f||(r.cssNumber[c]?"":"px")},cur:function(){var a=_a.propHooks[this.prop];return a&&a.get?a.get(this):_a.propHooks._default.get(this)},run:function(a){var b,c=_a.propHooks[this.prop];return this.options.duration?this.pos=b=r.easing[this.easing](a,this.options.duration*a,0,1,this.options.duration):this.pos=b=a,this.now=(this.end-this.start)*b+this.start,this.options.step&&this.options.step.call(this.elem,this.now,this),c&&c.set?c.set(this):_a.propHooks._default.set(this),this}},_a.prototype.init.prototype=_a.prototype,_a.propHooks={_default:{get:function(a){var b;return 1!==a.elem.nodeType||null!=a.elem[a.prop]&&null==a.elem.style[a.prop]?a.elem[a.prop]:(b=r.css(a.elem,a.prop,""),b&&"auto"!==b?b:0)},set:function(a){r.fx.step[a.prop]?r.fx.step[a.prop](a):1!==a.elem.nodeType||null==a.elem.style[r.cssProps[a.prop]]&&!r.cssHooks[a.prop]?a.elem[a.prop]=a.now:r.style(a.elem,a.prop,a.now+a.unit)}}},_a.propHooks.scrollTop=_a.propHooks.scrollLeft={set:function(a){a.elem.nodeType&&a.elem.parentNode&&(a.elem[a.prop]=a.now)}},r.easing={linear:function(a){return a},swing:function(a){return.5-Math.cos(a*Math.PI)/2},_default:"swing"},r.fx=_a.prototype.init,r.fx.step={};var ab,bb,cb=/^(?:toggle|show|hide)$/,db=/queueHooks$/;function eb(){bb&&(d.hidden===!1&&a.requestAnimationFrame?a.requestAnimationFrame(eb):a.setTimeout(eb,r.fx.interval),r.fx.tick())}function fb(){return a.setTimeout(function(){ab=void 0}),ab=r.now()}function gb(a,b){var c,d=0,e={height:a};for(b=b?1:0;d<4;d+=2-b)c=ca[d],e["margin"+c]=e["padding"+c]=a;return b&&(e.opacity=e.width=a),e}function hb(a,b,c){for(var d,e=(kb.tweeners[b]||[]).concat(kb.tweeners["*"]),f=0,g=e.length;f<g;f++)if(d=e[f].call(c,b,a))return d}function ib(a,b,c){var d,e,f,g,h,i,j,k,l="width"in b||"height"in b,m=this,n={},o=a.style,p=a.nodeType&&da(a),q=W.get(a,"fxshow");c.queue||(g=r._queueHooks(a,"fx"),null==g.unqueued&&(g.unqueued=0,h=g.empty.fire,g.empty.fire=function(){g.unqueued||h()}),g.unqueued++,m.always(function(){m.always(function(){g.unqueued--,r.queue(a,"fx").length||g.empty.fire()})}));for(d in b)if(e=b[d],cb.test(e)){if(delete b[d],f=f||"toggle"===e,e===(p?"hide":"show")){if("show"!==e||!q||void 0===q[d])continue;p=!0}n[d]=q&&q[d]||r.style(a,d)}if(i=!r.isEmptyObject(b),i||!r.isEmptyObject(n)){l&&1===a.nodeType&&(c.overflow=[o.overflow,o.overflowX,o.overflowY],j=q&&q.display,null==j&&(j=W.get(a,"display")),k=r.css(a,"display"),"none"===k&&(j?k=j:(ia([a],!0),j=a.style.display||j,k=r.css(a,"display"),ia([a]))),("inline"===k||"inline-block"===k&&null!=j)&&"none"===r.css(a,"float")&&(i||(m.done(function(){o.display=j}),null==j&&(k=o.display,j="none"===k?"":k)),o.display="inline-block")),c.overflow&&(o.overflow="hidden",m.always(function(){o.overflow=c.overflow[0],o.overflowX=c.overflow[1],o.overflowY=c.overflow[2]})),i=!1;for(d in n)i||(q?"hidden"in q&&(p=q.hidden):q=W.access(a,"fxshow",{display:j}),f&&(q.hidden=!p),p&&ia([a],!0),m.done(function(){p||ia([a]),W.remove(a,"fxshow");for(d in n)r.style(a,d,n[d])})),i=hb(p?q[d]:0,d,m),d in q||(q[d]=i.start,p&&(i.end=i.start,i.start=0))}}function jb(a,b){var c,d,e,f,g;for(c in a)if(d=r.camelCase(c),e=b[d],f=a[c],Array.isArray(f)&&(e=f[1],f=a[c]=f[0]),c!==d&&(a[d]=f,delete a[c]),g=r.cssHooks[d],g&&"expand"in g){f=g.expand(f),delete a[d];for(c in f)c in a||(a[c]=f[c],b[c]=e)}else b[d]=e}function kb(a,b,c){var d,e,f=0,g=kb.prefilters.length,h=r.Deferred().always(function(){delete i.elem}),i=function(){if(e)return!1;for(var b=ab||fb(),c=Math.max(0,j.startTime+j.duration-b),d=c/j.duration||0,f=1-d,g=0,i=j.tweens.length;g<i;g++)j.tweens[g].run(f);return h.notifyWith(a,[j,f,c]),f<1&&i?c:(i||h.notifyWith(a,[j,1,0]),h.resolveWith(a,[j]),!1)},j=h.promise({elem:a,props:r.extend({},b),opts:r.extend(!0,{specialEasing:{},easing:r.easing._default},c),originalProperties:b,originalOptions:c,startTime:ab||fb(),duration:c.duration,tweens:[],createTween:function(b,c){var d=r.Tween(a,j.opts,b,c,j.opts.specialEasing[b]||j.opts.easing);return j.tweens.push(d),d},stop:function(b){var c=0,d=b?j.tweens.length:0;if(e)return this;for(e=!0;c<d;c++)j.tweens[c].run(1);return b?(h.notifyWith(a,[j,1,0]),h.resolveWith(a,[j,b])):h.rejectWith(a,[j,b]),this}}),k=j.props;for(jb(k,j.opts.specialEasing);f<g;f++)if(d=kb.prefilters[f].call(j,a,k,j.opts))return r.isFunction(d.stop)&&(r._queueHooks(j.elem,j.opts.queue).stop=r.proxy(d.stop,d)),d;return r.map(k,hb,j),r.isFunction(j.opts.start)&&j.opts.start.call(a,j),j.progress(j.opts.progress).done(j.opts.done,j.opts.complete).fail(j.opts.fail).always(j.opts.always),r.fx.timer(r.extend(i,{elem:a,anim:j,queue:j.opts.queue})),j}r.Animation=r.extend(kb,{tweeners:{"*":[function(a,b){var c=this.createTween(a,b);return fa(c.elem,a,ba.exec(b),c),c}]},tweener:function(a,b){r.isFunction(a)?(b=a,a=["*"]):a=a.match(L);for(var c,d=0,e=a.length;d<e;d++)c=a[d],kb.tweeners[c]=kb.tweeners[c]||[],kb.tweeners[c].unshift(b)},prefilters:[ib],prefilter:function(a,b){b?kb.prefilters.unshift(a):kb.prefilters.push(a)}}),r.speed=function(a,b,c){var d=a&&"object"==typeof a?r.extend({},a):{complete:c||!c&&b||r.isFunction(a)&&a,duration:a,easing:c&&b||b&&!r.isFunction(b)&&b};return r.fx.off?d.duration=0:"number"!=typeof d.duration&&(d.duration in r.fx.speeds?d.duration=r.fx.speeds[d.duration]:d.duration=r.fx.speeds._default),null!=d.queue&&d.queue!==!0||(d.queue="fx"),d.old=d.complete,d.complete=function(){r.isFunction(d.old)&&d.old.call(this),d.queue&&r.dequeue(this,d.queue)},d},r.fn.extend({fadeTo:function(a,b,c,d){return this.filter(da).css("opacity",0).show().end().animate({opacity:b},a,c,d)},animate:function(a,b,c,d){var e=r.isEmptyObject(a),f=r.speed(b,c,d),g=function(){var b=kb(this,r.extend({},a),f);(e||W.get(this,"finish"))&&b.stop(!0)};return g.finish=g,e||f.queue===!1?this.each(g):this.queue(f.queue,g)},stop:function(a,b,c){var d=function(a){var b=a.stop;delete a.stop,b(c)};return"string"!=typeof a&&(c=b,b=a,a=void 0),b&&a!==!1&&this.queue(a||"fx",[]),this.each(function(){var b=!0,e=null!=a&&a+"queueHooks",f=r.timers,g=W.get(this);if(e)g[e]&&g[e].stop&&d(g[e]);else for(e in g)g[e]&&g[e].stop&&db.test(e)&&d(g[e]);for(e=f.length;e--;)f[e].elem!==this||null!=a&&f[e].queue!==a||(f[e].anim.stop(c),b=!1,f.splice(e,1));!b&&c||r.dequeue(this,a)})},finish:function(a){return a!==!1&&(a=a||"fx"),this.each(function(){var b,c=W.get(this),d=c[a+"queue"],e=c[a+"queueHooks"],f=r.timers,g=d?d.length:0;for(c.finish=!0,r.queue(this,a,[]),e&&e.stop&&e.stop.call(this,!0),b=f.length;b--;)f[b].elem===this&&f[b].queue===a&&(f[b].anim.stop(!0),f.splice(b,1));for(b=0;b<g;b++)d[b]&&d[b].finish&&d[b].finish.call(this);delete c.finish})}}),r.each(["toggle","show","hide"],function(a,b){var c=r.fn[b];r.fn[b]=function(a,d,e){return null==a||"boolean"==typeof a?c.apply(this,arguments):this.animate(gb(b,!0),a,d,e)}}),r.each({slideDown:gb("show"),slideUp:gb("hide"),slideToggle:gb("toggle"),fadeIn:{opacity:"show"},fadeOut:{opacity:"hide"},fadeToggle:{opacity:"toggle"}},function(a,b){r.fn[a]=function(a,c,d){return this.animate(b,a,c,d)}}),r.timers=[],r.fx.tick=function(){var a,b=0,c=r.timers;for(ab=r.now();b<c.length;b++)a=c[b],a()||c[b]!==a||c.splice(b--,1);c.length||r.fx.stop(),ab=void 0},r.fx.timer=function(a){r.timers.push(a),r.fx.start()},r.fx.interval=13,r.fx.start=function(){bb||(bb=!0,eb())},r.fx.stop=function(){bb=null},r.fx.speeds={slow:600,fast:200,_default:400},r.fn.delay=function(b,c){return b=r.fx?r.fx.speeds[b]||b:b,c=c||"fx",this.queue(c,function(c,d){var e=a.setTimeout(c,b);d.stop=function(){a.clearTimeout(e)}})},function(){var a=d.createElement("input"),b=d.createElement("select"),c=b.appendChild(d.createElement("option"));a.type="checkbox",o.checkOn=""!==a.value,o.optSelected=c.selected,a=d.createElement("input"),a.value="t",a.type="radio",o.radioValue="t"===a.value}();var lb,mb=r.expr.attrHandle;r.fn.extend({attr:function(a,b){return T(this,r.attr,a,b,arguments.length>1)},removeAttr:function(a){return this.each(function(){r.removeAttr(this,a)})}}),r.extend({attr:function(a,b,c){var d,e,f=a.nodeType;if(3!==f&&8!==f&&2!==f)return"undefined"==typeof a.getAttribute?r.prop(a,b,c):(1===f&&r.isXMLDoc(a)||(e=r.attrHooks[b.toLowerCase()]||(r.expr.match.bool.test(b)?lb:void 0)),void 0!==c?null===c?void r.removeAttr(a,b):e&&"set"in e&&void 0!==(d=e.set(a,c,b))?d:(a.setAttribute(b,c+""),c):e&&"get"in e&&null!==(d=e.get(a,b))?d:(d=r.find.attr(a,b),
null==d?void 0:d))},attrHooks:{type:{set:function(a,b){if(!o.radioValue&&"radio"===b&&B(a,"input")){var c=a.value;return a.setAttribute("type",b),c&&(a.value=c),b}}}},removeAttr:function(a,b){var c,d=0,e=b&&b.match(L);if(e&&1===a.nodeType)while(c=e[d++])a.removeAttribute(c)}}),lb={set:function(a,b,c){return b===!1?r.removeAttr(a,c):a.setAttribute(c,c),c}},r.each(r.expr.match.bool.source.match(/\w+/g),function(a,b){var c=mb[b]||r.find.attr;mb[b]=function(a,b,d){var e,f,g=b.toLowerCase();return d||(f=mb[g],mb[g]=e,e=null!=c(a,b,d)?g:null,mb[g]=f),e}});var nb=/^(?:input|select|textarea|button)$/i,ob=/^(?:a|area)$/i;r.fn.extend({prop:function(a,b){return T(this,r.prop,a,b,arguments.length>1)},removeProp:function(a){return this.each(function(){delete this[r.propFix[a]||a]})}}),r.extend({prop:function(a,b,c){var d,e,f=a.nodeType;if(3!==f&&8!==f&&2!==f)return 1===f&&r.isXMLDoc(a)||(b=r.propFix[b]||b,e=r.propHooks[b]),void 0!==c?e&&"set"in e&&void 0!==(d=e.set(a,c,b))?d:a[b]=c:e&&"get"in e&&null!==(d=e.get(a,b))?d:a[b]},propHooks:{tabIndex:{get:function(a){var b=r.find.attr(a,"tabindex");return b?parseInt(b,10):nb.test(a.nodeName)||ob.test(a.nodeName)&&a.href?0:-1}}},propFix:{"for":"htmlFor","class":"className"}}),o.optSelected||(r.propHooks.selected={get:function(a){var b=a.parentNode;return b&&b.parentNode&&b.parentNode.selectedIndex,null},set:function(a){var b=a.parentNode;b&&(b.selectedIndex,b.parentNode&&b.parentNode.selectedIndex)}}),r.each(["tabIndex","readOnly","maxLength","cellSpacing","cellPadding","rowSpan","colSpan","useMap","frameBorder","contentEditable"],function(){r.propFix[this.toLowerCase()]=this});function pb(a){var b=a.match(L)||[];return b.join(" ")}function qb(a){return a.getAttribute&&a.getAttribute("class")||""}r.fn.extend({addClass:function(a){var b,c,d,e,f,g,h,i=0;if(r.isFunction(a))return this.each(function(b){r(this).addClass(a.call(this,b,qb(this)))});if("string"==typeof a&&a){b=a.match(L)||[];while(c=this[i++])if(e=qb(c),d=1===c.nodeType&&" "+pb(e)+" "){g=0;while(f=b[g++])d.indexOf(" "+f+" ")<0&&(d+=f+" ");h=pb(d),e!==h&&c.setAttribute("class",h)}}return this},removeClass:function(a){var b,c,d,e,f,g,h,i=0;if(r.isFunction(a))return this.each(function(b){r(this).removeClass(a.call(this,b,qb(this)))});if(!arguments.length)return this.attr("class","");if("string"==typeof a&&a){b=a.match(L)||[];while(c=this[i++])if(e=qb(c),d=1===c.nodeType&&" "+pb(e)+" "){g=0;while(f=b[g++])while(d.indexOf(" "+f+" ")>-1)d=d.replace(" "+f+" "," ");h=pb(d),e!==h&&c.setAttribute("class",h)}}return this},toggleClass:function(a,b){var c=typeof a;return"boolean"==typeof b&&"string"===c?b?this.addClass(a):this.removeClass(a):r.isFunction(a)?this.each(function(c){r(this).toggleClass(a.call(this,c,qb(this),b),b)}):this.each(function(){var b,d,e,f;if("string"===c){d=0,e=r(this),f=a.match(L)||[];while(b=f[d++])e.hasClass(b)?e.removeClass(b):e.addClass(b)}else void 0!==a&&"boolean"!==c||(b=qb(this),b&&W.set(this,"__className__",b),this.setAttribute&&this.setAttribute("class",b||a===!1?"":W.get(this,"__className__")||""))})},hasClass:function(a){var b,c,d=0;b=" "+a+" ";while(c=this[d++])if(1===c.nodeType&&(" "+pb(qb(c))+" ").indexOf(b)>-1)return!0;return!1}});var rb=/\r/g;r.fn.extend({val:function(a){var b,c,d,e=this[0];{if(arguments.length)return d=r.isFunction(a),this.each(function(c){var e;1===this.nodeType&&(e=d?a.call(this,c,r(this).val()):a,null==e?e="":"number"==typeof e?e+="":Array.isArray(e)&&(e=r.map(e,function(a){return null==a?"":a+""})),b=r.valHooks[this.type]||r.valHooks[this.nodeName.toLowerCase()],b&&"set"in b&&void 0!==b.set(this,e,"value")||(this.value=e))});if(e)return b=r.valHooks[e.type]||r.valHooks[e.nodeName.toLowerCase()],b&&"get"in b&&void 0!==(c=b.get(e,"value"))?c:(c=e.value,"string"==typeof c?c.replace(rb,""):null==c?"":c)}}}),r.extend({valHooks:{option:{get:function(a){var b=r.find.attr(a,"value");return null!=b?b:pb(r.text(a))}},select:{get:function(a){var b,c,d,e=a.options,f=a.selectedIndex,g="select-one"===a.type,h=g?null:[],i=g?f+1:e.length;for(d=f<0?i:g?f:0;d<i;d++)if(c=e[d],(c.selected||d===f)&&!c.disabled&&(!c.parentNode.disabled||!B(c.parentNode,"optgroup"))){if(b=r(c).val(),g)return b;h.push(b)}return h},set:function(a,b){var c,d,e=a.options,f=r.makeArray(b),g=e.length;while(g--)d=e[g],(d.selected=r.inArray(r.valHooks.option.get(d),f)>-1)&&(c=!0);return c||(a.selectedIndex=-1),f}}}}),r.each(["radio","checkbox"],function(){r.valHooks[this]={set:function(a,b){if(Array.isArray(b))return a.checked=r.inArray(r(a).val(),b)>-1}},o.checkOn||(r.valHooks[this].get=function(a){return null===a.getAttribute("value")?"on":a.value})});var sb=/^(?:focusinfocus|focusoutblur)$/;r.extend(r.event,{trigger:function(b,c,e,f){var g,h,i,j,k,m,n,o=[e||d],p=l.call(b,"type")?b.type:b,q=l.call(b,"namespace")?b.namespace.split("."):[];if(h=i=e=e||d,3!==e.nodeType&&8!==e.nodeType&&!sb.test(p+r.event.triggered)&&(p.indexOf(".")>-1&&(q=p.split("."),p=q.shift(),q.sort()),k=p.indexOf(":")<0&&"on"+p,b=b[r.expando]?b:new r.Event(p,"object"==typeof b&&b),b.isTrigger=f?2:3,b.namespace=q.join("."),b.rnamespace=b.namespace?new RegExp("(^|\\.)"+q.join("\\.(?:.*\\.|)")+"(\\.|$)"):null,b.result=void 0,b.target||(b.target=e),c=null==c?[b]:r.makeArray(c,[b]),n=r.event.special[p]||{},f||!n.trigger||n.trigger.apply(e,c)!==!1)){if(!f&&!n.noBubble&&!r.isWindow(e)){for(j=n.delegateType||p,sb.test(j+p)||(h=h.parentNode);h;h=h.parentNode)o.push(h),i=h;i===(e.ownerDocument||d)&&o.push(i.defaultView||i.parentWindow||a)}g=0;while((h=o[g++])&&!b.isPropagationStopped())b.type=g>1?j:n.bindType||p,m=(W.get(h,"events")||{})[b.type]&&W.get(h,"handle"),m&&m.apply(h,c),m=k&&h[k],m&&m.apply&&U(h)&&(b.result=m.apply(h,c),b.result===!1&&b.preventDefault());return b.type=p,f||b.isDefaultPrevented()||n._default&&n._default.apply(o.pop(),c)!==!1||!U(e)||k&&r.isFunction(e[p])&&!r.isWindow(e)&&(i=e[k],i&&(e[k]=null),r.event.triggered=p,e[p](),r.event.triggered=void 0,i&&(e[k]=i)),b.result}},simulate:function(a,b,c){var d=r.extend(new r.Event,c,{type:a,isSimulated:!0});r.event.trigger(d,null,b)}}),r.fn.extend({trigger:function(a,b){return this.each(function(){r.event.trigger(a,b,this)})},triggerHandler:function(a,b){var c=this[0];if(c)return r.event.trigger(a,b,c,!0)}}),r.each("blur focus focusin focusout resize scroll click dblclick mousedown mouseup mousemove mouseover mouseout mouseenter mouseleave change select submit keydown keypress keyup contextmenu".split(" "),function(a,b){r.fn[b]=function(a,c){return arguments.length>0?this.on(b,null,a,c):this.trigger(b)}}),r.fn.extend({hover:function(a,b){return this.mouseenter(a).mouseleave(b||a)}}),o.focusin="onfocusin"in a,o.focusin||r.each({focus:"focusin",blur:"focusout"},function(a,b){var c=function(a){r.event.simulate(b,a.target,r.event.fix(a))};r.event.special[b]={setup:function(){var d=this.ownerDocument||this,e=W.access(d,b);e||d.addEventListener(a,c,!0),W.access(d,b,(e||0)+1)},teardown:function(){var d=this.ownerDocument||this,e=W.access(d,b)-1;e?W.access(d,b,e):(d.removeEventListener(a,c,!0),W.remove(d,b))}}});var tb=a.location,ub=r.now(),vb=/\?/;r.parseXML=function(b){var c;if(!b||"string"!=typeof b)return null;try{c=(new a.DOMParser).parseFromString(b,"text/xml")}catch(d){c=void 0}return c&&!c.getElementsByTagName("parsererror").length||r.error("Invalid XML: "+b),c};var wb=/\[\]$/,xb=/\r?\n/g,yb=/^(?:submit|button|image|reset|file)$/i,zb=/^(?:input|select|textarea|keygen)/i;function Ab(a,b,c,d){var e;if(Array.isArray(b))r.each(b,function(b,e){c||wb.test(a)?d(a,e):Ab(a+"["+("object"==typeof e&&null!=e?b:"")+"]",e,c,d)});else if(c||"object"!==r.type(b))d(a,b);else for(e in b)Ab(a+"["+e+"]",b[e],c,d)}r.param=function(a,b){var c,d=[],e=function(a,b){var c=r.isFunction(b)?b():b;d[d.length]=encodeURIComponent(a)+"="+encodeURIComponent(null==c?"":c)};if(Array.isArray(a)||a.jquery&&!r.isPlainObject(a))r.each(a,function(){e(this.name,this.value)});else for(c in a)Ab(c,a[c],b,e);return d.join("&")},r.fn.extend({serialize:function(){return r.param(this.serializeArray())},serializeArray:function(){return this.map(function(){var a=r.prop(this,"elements");return a?r.makeArray(a):this}).filter(function(){var a=this.type;return this.name&&!r(this).is(":disabled")&&zb.test(this.nodeName)&&!yb.test(a)&&(this.checked||!ja.test(a))}).map(function(a,b){var c=r(this).val();return null==c?null:Array.isArray(c)?r.map(c,function(a){return{name:b.name,value:a.replace(xb,"\r\n")}}):{name:b.name,value:c.replace(xb,"\r\n")}}).get()}});var Bb=/%20/g,Cb=/#.*$/,Db=/([?&])_=[^&]*/,Eb=/^(.*?):[ \t]*([^\r\n]*)$/gm,Fb=/^(?:about|app|app-storage|.+-extension|file|res|widget):$/,Gb=/^(?:GET|HEAD)$/,Hb=/^\/\//,Ib={},Jb={},Kb="*/".concat("*"),Lb=d.createElement("a");Lb.href=tb.href;function Mb(a){return function(b,c){"string"!=typeof b&&(c=b,b="*");var d,e=0,f=b.toLowerCase().match(L)||[];if(r.isFunction(c))while(d=f[e++])"+"===d[0]?(d=d.slice(1)||"*",(a[d]=a[d]||[]).unshift(c)):(a[d]=a[d]||[]).push(c)}}function Nb(a,b,c,d){var e={},f=a===Jb;function g(h){var i;return e[h]=!0,r.each(a[h]||[],function(a,h){var j=h(b,c,d);return"string"!=typeof j||f||e[j]?f?!(i=j):void 0:(b.dataTypes.unshift(j),g(j),!1)}),i}return g(b.dataTypes[0])||!e["*"]&&g("*")}function Ob(a,b){var c,d,e=r.ajaxSettings.flatOptions||{};for(c in b)void 0!==b[c]&&((e[c]?a:d||(d={}))[c]=b[c]);return d&&r.extend(!0,a,d),a}function Pb(a,b,c){var d,e,f,g,h=a.contents,i=a.dataTypes;while("*"===i[0])i.shift(),void 0===d&&(d=a.mimeType||b.getResponseHeader("Content-Type"));if(d)for(e in h)if(h[e]&&h[e].test(d)){i.unshift(e);break}if(i[0]in c)f=i[0];else{for(e in c){if(!i[0]||a.converters[e+" "+i[0]]){f=e;break}g||(g=e)}f=f||g}if(f)return f!==i[0]&&i.unshift(f),c[f]}function Qb(a,b,c,d){var e,f,g,h,i,j={},k=a.dataTypes.slice();if(k[1])for(g in a.converters)j[g.toLowerCase()]=a.converters[g];f=k.shift();while(f)if(a.responseFields[f]&&(c[a.responseFields[f]]=b),!i&&d&&a.dataFilter&&(b=a.dataFilter(b,a.dataType)),i=f,f=k.shift())if("*"===f)f=i;else if("*"!==i&&i!==f){if(g=j[i+" "+f]||j["* "+f],!g)for(e in j)if(h=e.split(" "),h[1]===f&&(g=j[i+" "+h[0]]||j["* "+h[0]])){g===!0?g=j[e]:j[e]!==!0&&(f=h[0],k.unshift(h[1]));break}if(g!==!0)if(g&&a["throws"])b=g(b);else try{b=g(b)}catch(l){return{state:"parsererror",error:g?l:"No conversion from "+i+" to "+f}}}return{state:"success",data:b}}r.extend({active:0,lastModified:{},etag:{},ajaxSettings:{url:tb.href,type:"GET",isLocal:Fb.test(tb.protocol),global:!0,processData:!0,async:!0,contentType:"application/x-www-form-urlencoded; charset=UTF-8",accepts:{"*":Kb,text:"text/plain",html:"text/html",xml:"application/xml, text/xml",json:"application/json, text/javascript"},contents:{xml:/\bxml\b/,html:/\bhtml/,json:/\bjson\b/},responseFields:{xml:"responseXML",text:"responseText",json:"responseJSON"},converters:{"* text":String,"text html":!0,"text json":JSON.parse,"text xml":r.parseXML},flatOptions:{url:!0,context:!0}},ajaxSetup:function(a,b){return b?Ob(Ob(a,r.ajaxSettings),b):Ob(r.ajaxSettings,a)},ajaxPrefilter:Mb(Ib),ajaxTransport:Mb(Jb),ajax:function(b,c){"object"==typeof b&&(c=b,b=void 0),c=c||{};var e,f,g,h,i,j,k,l,m,n,o=r.ajaxSetup({},c),p=o.context||o,q=o.context&&(p.nodeType||p.jquery)?r(p):r.event,s=r.Deferred(),t=r.Callbacks("once memory"),u=o.statusCode||{},v={},w={},x="canceled",y={readyState:0,getResponseHeader:function(a){var b;if(k){if(!h){h={};while(b=Eb.exec(g))h[b[1].toLowerCase()]=b[2]}b=h[a.toLowerCase()]}return null==b?null:b},getAllResponseHeaders:function(){return k?g:null},setRequestHeader:function(a,b){return null==k&&(a=w[a.toLowerCase()]=w[a.toLowerCase()]||a,v[a]=b),this},overrideMimeType:function(a){return null==k&&(o.mimeType=a),this},statusCode:function(a){var b;if(a)if(k)y.always(a[y.status]);else for(b in a)u[b]=[u[b],a[b]];return this},abort:function(a){var b=a||x;return e&&e.abort(b),A(0,b),this}};if(s.promise(y),o.url=((b||o.url||tb.href)+"").replace(Hb,tb.protocol+"//"),o.type=c.method||c.type||o.method||o.type,o.dataTypes=(o.dataType||"*").toLowerCase().match(L)||[""],null==o.crossDomain){j=d.createElement("a");try{j.href=o.url,j.href=j.href,o.crossDomain=Lb.protocol+"//"+Lb.host!=j.protocol+"//"+j.host}catch(z){o.crossDomain=!0}}if(o.data&&o.processData&&"string"!=typeof o.data&&(o.data=r.param(o.data,o.traditional)),Nb(Ib,o,c,y),k)return y;l=r.event&&o.global,l&&0===r.active++&&r.event.trigger("ajaxStart"),o.type=o.type.toUpperCase(),o.hasContent=!Gb.test(o.type),f=o.url.replace(Cb,""),o.hasContent?o.data&&o.processData&&0===(o.contentType||"").indexOf("application/x-www-form-urlencoded")&&(o.data=o.data.replace(Bb,"+")):(n=o.url.slice(f.length),o.data&&(f+=(vb.test(f)?"&":"?")+o.data,delete o.data),o.cache===!1&&(f=f.replace(Db,"$1"),n=(vb.test(f)?"&":"?")+"_="+ub++ +n),o.url=f+n),o.ifModified&&(r.lastModified[f]&&y.setRequestHeader("If-Modified-Since",r.lastModified[f]),r.etag[f]&&y.setRequestHeader("If-None-Match",r.etag[f])),(o.data&&o.hasContent&&o.contentType!==!1||c.contentType)&&y.setRequestHeader("Content-Type",o.contentType),y.setRequestHeader("Accept",o.dataTypes[0]&&o.accepts[o.dataTypes[0]]?o.accepts[o.dataTypes[0]]+("*"!==o.dataTypes[0]?", "+Kb+"; q=0.01":""):o.accepts["*"]);for(m in o.headers)y.setRequestHeader(m,o.headers[m]);if(o.beforeSend&&(o.beforeSend.call(p,y,o)===!1||k))return y.abort();if(x="abort",t.add(o.complete),y.done(o.success),y.fail(o.error),e=Nb(Jb,o,c,y)){if(y.readyState=1,l&&q.trigger("ajaxSend",[y,o]),k)return y;o.async&&o.timeout>0&&(i=a.setTimeout(function(){y.abort("timeout")},o.timeout));try{k=!1,e.send(v,A)}catch(z){if(k)throw z;A(-1,z)}}else A(-1,"No Transport");function A(b,c,d,h){var j,m,n,v,w,x=c;k||(k=!0,i&&a.clearTimeout(i),e=void 0,g=h||"",y.readyState=b>0?4:0,j=b>=200&&b<300||304===b,d&&(v=Pb(o,y,d)),v=Qb(o,v,y,j),j?(o.ifModified&&(w=y.getResponseHeader("Last-Modified"),w&&(r.lastModified[f]=w),w=y.getResponseHeader("etag"),w&&(r.etag[f]=w)),204===b||"HEAD"===o.type?x="nocontent":304===b?x="notmodified":(x=v.state,m=v.data,n=v.error,j=!n)):(n=x,!b&&x||(x="error",b<0&&(b=0))),y.status=b,y.statusText=(c||x)+"",j?s.resolveWith(p,[m,x,y]):s.rejectWith(p,[y,x,n]),y.statusCode(u),u=void 0,l&&q.trigger(j?"ajaxSuccess":"ajaxError",[y,o,j?m:n]),t.fireWith(p,[y,x]),l&&(q.trigger("ajaxComplete",[y,o]),--r.active||r.event.trigger("ajaxStop")))}return y},getJSON:function(a,b,c){return r.get(a,b,c,"json")},getScript:function(a,b){return r.get(a,void 0,b,"script")}}),r.each(["get","post"],function(a,b){r[b]=function(a,c,d,e){return r.isFunction(c)&&(e=e||d,d=c,c=void 0),r.ajax(r.extend({url:a,type:b,dataType:e,data:c,success:d},r.isPlainObject(a)&&a))}}),r._evalUrl=function(a){return r.ajax({url:a,type:"GET",dataType:"script",cache:!0,async:!1,global:!1,"throws":!0})},r.fn.extend({wrapAll:function(a){var b;return this[0]&&(r.isFunction(a)&&(a=a.call(this[0])),b=r(a,this[0].ownerDocument).eq(0).clone(!0),this[0].parentNode&&b.insertBefore(this[0]),b.map(function(){var a=this;while(a.firstElementChild)a=a.firstElementChild;return a}).append(this)),this},wrapInner:function(a){return r.isFunction(a)?this.each(function(b){r(this).wrapInner(a.call(this,b))}):this.each(function(){var b=r(this),c=b.contents();c.length?c.wrapAll(a):b.append(a)})},wrap:function(a){var b=r.isFunction(a);return this.each(function(c){r(this).wrapAll(b?a.call(this,c):a)})},unwrap:function(a){return this.parent(a).not("body").each(function(){r(this).replaceWith(this.childNodes)}),this}}),r.expr.pseudos.hidden=function(a){return!r.expr.pseudos.visible(a)},r.expr.pseudos.visible=function(a){return!!(a.offsetWidth||a.offsetHeight||a.getClientRects().length)},r.ajaxSettings.xhr=function(){try{return new a.XMLHttpRequest}catch(b){}};var Rb={0:200,1223:204},Sb=r.ajaxSettings.xhr();o.cors=!!Sb&&"withCredentials"in Sb,o.ajax=Sb=!!Sb,r.ajaxTransport(function(b){var c,d;if(o.cors||Sb&&!b.crossDomain)return{send:function(e,f){var g,h=b.xhr();if(h.open(b.type,b.url,b.async,b.username,b.password),b.xhrFields)for(g in b.xhrFields)h[g]=b.xhrFields[g];b.mimeType&&h.overrideMimeType&&h.overrideMimeType(b.mimeType),b.crossDomain||e["X-Requested-With"]||(e["X-Requested-With"]="XMLHttpRequest");for(g in e)h.setRequestHeader(g,e[g]);c=function(a){return function(){c&&(c=d=h.onload=h.onerror=h.onabort=h.onreadystatechange=null,"abort"===a?h.abort():"error"===a?"number"!=typeof h.status?f(0,"error"):f(h.status,h.statusText):f(Rb[h.status]||h.status,h.statusText,"text"!==(h.responseType||"text")||"string"!=typeof h.responseText?{binary:h.response}:{text:h.responseText},h.getAllResponseHeaders()))}},h.onload=c(),d=h.onerror=c("error"),void 0!==h.onabort?h.onabort=d:h.onreadystatechange=function(){4===h.readyState&&a.setTimeout(function(){c&&d()})},c=c("abort");try{h.send(b.hasContent&&b.data||null)}catch(i){if(c)throw i}},abort:function(){c&&c()}}}),r.ajaxPrefilter(function(a){a.crossDomain&&(a.contents.script=!1)}),r.ajaxSetup({accepts:{script:"text/javascript, application/javascript, application/ecmascript, application/x-ecmascript"},contents:{script:/\b(?:java|ecma)script\b/},converters:{"text script":function(a){return r.globalEval(a),a}}}),r.ajaxPrefilter("script",function(a){void 0===a.cache&&(a.cache=!1),a.crossDomain&&(a.type="GET")}),r.ajaxTransport("script",function(a){if(a.crossDomain){var b,c;return{send:function(e,f){b=r("<script>").prop({charset:a.scriptCharset,src:a.url}).on("load error",c=function(a){b.remove(),c=null,a&&f("error"===a.type?404:200,a.type)}),d.head.appendChild(b[0])},abort:function(){c&&c()}}}});var Tb=[],Ub=/(=)\?(?=&|$)|\?\?/;r.ajaxSetup({jsonp:"callback",jsonpCallback:function(){var a=Tb.pop()||r.expando+"_"+ub++;return this[a]=!0,a}}),r.ajaxPrefilter("json jsonp",function(b,c,d){var e,f,g,h=b.jsonp!==!1&&(Ub.test(b.url)?"url":"string"==typeof b.data&&0===(b.contentType||"").indexOf("application/x-www-form-urlencoded")&&Ub.test(b.data)&&"data");if(h||"jsonp"===b.dataTypes[0])return e=b.jsonpCallback=r.isFunction(b.jsonpCallback)?b.jsonpCallback():b.jsonpCallback,h?b[h]=b[h].replace(Ub,"$1"+e):b.jsonp!==!1&&(b.url+=(vb.test(b.url)?"&":"?")+b.jsonp+"="+e),b.converters["script json"]=function(){return g||r.error(e+" was not called"),g[0]},b.dataTypes[0]="json",f=a[e],a[e]=function(){g=arguments},d.always(function(){void 0===f?r(a).removeProp(e):a[e]=f,b[e]&&(b.jsonpCallback=c.jsonpCallback,Tb.push(e)),g&&r.isFunction(f)&&f(g[0]),g=f=void 0}),"script"}),o.createHTMLDocument=function(){var a=d.implementation.createHTMLDocument("").body;return a.innerHTML="<form></form><form></form>",2===a.childNodes.length}(),r.parseHTML=function(a,b,c){if("string"!=typeof a)return[];"boolean"==typeof b&&(c=b,b=!1);var e,f,g;return b||(o.createHTMLDocument?(b=d.implementation.createHTMLDocument(""),e=b.createElement("base"),e.href=d.location.href,b.head.appendChild(e)):b=d),f=C.exec(a),g=!c&&[],f?[b.createElement(f[1])]:(f=qa([a],b,g),g&&g.length&&r(g).remove(),r.merge([],f.childNodes))},r.fn.load=function(a,b,c){var d,e,f,g=this,h=a.indexOf(" ");return h>-1&&(d=pb(a.slice(h)),a=a.slice(0,h)),r.isFunction(b)?(c=b,b=void 0):b&&"object"==typeof b&&(e="POST"),g.length>0&&r.ajax({url:a,type:e||"GET",dataType:"html",data:b}).done(function(a){f=arguments,g.html(d?r("<div>").append(r.parseHTML(a)).find(d):a)}).always(c&&function(a,b){g.each(function(){c.apply(this,f||[a.responseText,b,a])})}),this},r.each(["ajaxStart","ajaxStop","ajaxComplete","ajaxError","ajaxSuccess","ajaxSend"],function(a,b){r.fn[b]=function(a){return this.on(b,a)}}),r.expr.pseudos.animated=function(a){return r.grep(r.timers,function(b){return a===b.elem}).length},r.offset={setOffset:function(a,b,c){var d,e,f,g,h,i,j,k=r.css(a,"position"),l=r(a),m={};"static"===k&&(a.style.position="relative"),h=l.offset(),f=r.css(a,"top"),i=r.css(a,"left"),j=("absolute"===k||"fixed"===k)&&(f+i).indexOf("auto")>-1,j?(d=l.position(),g=d.top,e=d.left):(g=parseFloat(f)||0,e=parseFloat(i)||0),r.isFunction(b)&&(b=b.call(a,c,r.extend({},h))),null!=b.top&&(m.top=b.top-h.top+g),null!=b.left&&(m.left=b.left-h.left+e),"using"in b?b.using.call(a,m):l.css(m)}},r.fn.extend({offset:function(a){if(arguments.length)return void 0===a?this:this.each(function(b){r.offset.setOffset(this,a,b)});var b,c,d,e,f=this[0];if(f)return f.getClientRects().length?(d=f.getBoundingClientRect(),b=f.ownerDocument,c=b.documentElement,e=b.defaultView,{top:d.top+e.pageYOffset-c.clientTop,left:d.left+e.pageXOffset-c.clientLeft}):{top:0,left:0}},position:function(){if(this[0]){var a,b,c=this[0],d={top:0,left:0};return"fixed"===r.css(c,"position")?b=c.getBoundingClientRect():(a=this.offsetParent(),b=this.offset(),B(a[0],"html")||(d=a.offset()),d={top:d.top+r.css(a[0],"borderTopWidth",!0),left:d.left+r.css(a[0],"borderLeftWidth",!0)}),{top:b.top-d.top-r.css(c,"marginTop",!0),left:b.left-d.left-r.css(c,"marginLeft",!0)}}},offsetParent:function(){return this.map(function(){var a=this.offsetParent;while(a&&"static"===r.css(a,"position"))a=a.offsetParent;return a||ra})}}),r.each({scrollLeft:"pageXOffset",scrollTop:"pageYOffset"},function(a,b){var c="pageYOffset"===b;r.fn[a]=function(d){return T(this,function(a,d,e){var f;return r.isWindow(a)?f=a:9===a.nodeType&&(f=a.defaultView),void 0===e?f?f[b]:a[d]:void(f?f.scrollTo(c?f.pageXOffset:e,c?e:f.pageYOffset):a[d]=e)},a,d,arguments.length)}}),r.each(["top","left"],function(a,b){r.cssHooks[b]=Pa(o.pixelPosition,function(a,c){if(c)return c=Oa(a,b),Ma.test(c)?r(a).position()[b]+"px":c})}),r.each({Height:"height",Width:"width"},function(a,b){r.each({padding:"inner"+a,content:b,"":"outer"+a},function(c,d){r.fn[d]=function(e,f){var g=arguments.length&&(c||"boolean"!=typeof e),h=c||(e===!0||f===!0?"margin":"border");return T(this,function(b,c,e){var f;return r.isWindow(b)?0===d.indexOf("outer")?b["inner"+a]:b.document.documentElement["client"+a]:9===b.nodeType?(f=b.documentElement,Math.max(b.body["scroll"+a],f["scroll"+a],b.body["offset"+a],f["offset"+a],f["client"+a])):void 0===e?r.css(b,c,h):r.style(b,c,e,h)},b,g?e:void 0,g)}})}),r.fn.extend({bind:function(a,b,c){return this.on(a,null,b,c)},unbind:function(a,b){return this.off(a,null,b)},delegate:function(a,b,c,d){return this.on(b,a,c,d)},undelegate:function(a,b,c){return 1===arguments.length?this.off(a,"**"):this.off(b,a||"**",c)}}),r.holdReady=function(a){a?r.readyWait++:r.ready(!0)},r.isArray=Array.isArray,r.parseJSON=JSON.parse,r.nodeName=B,"function"==typeof define&&define.amd&&define("jquery",[],function(){return r});var Vb=a.jQuery,Wb=a.$;return r.noConflict=function(b){return a.$===r&&(a.$=Wb),b&&a.jQuery===r&&(a.jQuery=Vb),r},b||(a.jQuery=a.$=r),r});

/*! jQuery UI - v1.12.1 - 2017-09-16
* http://jqueryui.com
* Includes: widget.js, position.js, data.js, disable-selection.js, focusable.js, form-reset-mixin.js, jquery-1-7.js, keycode.js, labels.js, scroll-parent.js, tabbable.js, unique-id.js, widgets/draggable.js, widgets/droppable.js, widgets/selectable.js, widgets/sortable.js, widgets/mouse.js
* Copyright jQuery Foundation and other contributors; Licensed MIT */
(function(t){"function"==typeof define&&define.amd?define(["jquery"],t):t(jQuery)})(function(t){function e(t){for(var e=t.css("visibility");"inherit"===e;)t=t.parent(),e=t.css("visibility");return"hidden"!==e}t.ui=t.ui||{},t.ui.version="1.12.1";var i=0,s=Array.prototype.slice;t.cleanData=function(e){return function(i){var s,n,o;for(o=0;null!=(n=i[o]);o++)try{s=t._data(n,"events"),s&&s.remove&&t(n).triggerHandler("remove")}catch(a){}e(i)}}(t.cleanData),t.widget=function(e,i,s){var n,o,a,r={},l=e.split(".")[0];e=e.split(".")[1];var h=l+"-"+e;return s||(s=i,i=t.Widget),t.isArray(s)&&(s=t.extend.apply(null,[{}].concat(s))),t.expr[":"][h.toLowerCase()]=function(e){return!!t.data(e,h)},t[l]=t[l]||{},n=t[l][e],o=t[l][e]=function(t,e){return this._createWidget?(arguments.length&&this._createWidget(t,e),void 0):new o(t,e)},t.extend(o,n,{version:s.version,_proto:t.extend({},s),_childConstructors:[]}),a=new i,a.options=t.widget.extend({},a.options),t.each(s,function(e,s){return t.isFunction(s)?(r[e]=function(){function t(){return i.prototype[e].apply(this,arguments)}function n(t){return i.prototype[e].apply(this,t)}return function(){var e,i=this._super,o=this._superApply;return this._super=t,this._superApply=n,e=s.apply(this,arguments),this._super=i,this._superApply=o,e}}(),void 0):(r[e]=s,void 0)}),o.prototype=t.widget.extend(a,{widgetEventPrefix:n?a.widgetEventPrefix||e:e},r,{constructor:o,namespace:l,widgetName:e,widgetFullName:h}),n?(t.each(n._childConstructors,function(e,i){var s=i.prototype;t.widget(s.namespace+"."+s.widgetName,o,i._proto)}),delete n._childConstructors):i._childConstructors.push(o),t.widget.bridge(e,o),o},t.widget.extend=function(e){for(var i,n,o=s.call(arguments,1),a=0,r=o.length;r>a;a++)for(i in o[a])n=o[a][i],o[a].hasOwnProperty(i)&&void 0!==n&&(e[i]=t.isPlainObject(n)?t.isPlainObject(e[i])?t.widget.extend({},e[i],n):t.widget.extend({},n):n);return e},t.widget.bridge=function(e,i){var n=i.prototype.widgetFullName||e;t.fn[e]=function(o){var a="string"==typeof o,r=s.call(arguments,1),l=this;return a?this.length||"instance"!==o?this.each(function(){var i,s=t.data(this,n);return"instance"===o?(l=s,!1):s?t.isFunction(s[o])&&"_"!==o.charAt(0)?(i=s[o].apply(s,r),i!==s&&void 0!==i?(l=i&&i.jquery?l.pushStack(i.get()):i,!1):void 0):t.error("no such method '"+o+"' for "+e+" widget instance"):t.error("cannot call methods on "+e+" prior to initialization; "+"attempted to call method '"+o+"'")}):l=void 0:(r.length&&(o=t.widget.extend.apply(null,[o].concat(r))),this.each(function(){var e=t.data(this,n);e?(e.option(o||{}),e._init&&e._init()):t.data(this,n,new i(o,this))})),l}},t.Widget=function(){},t.Widget._childConstructors=[],t.Widget.prototype={widgetName:"widget",widgetEventPrefix:"",defaultElement:"<div>",options:{classes:{},disabled:!1,create:null},_createWidget:function(e,s){s=t(s||this.defaultElement||this)[0],this.element=t(s),this.uuid=i++,this.eventNamespace="."+this.widgetName+this.uuid,this.bindings=t(),this.hoverable=t(),this.focusable=t(),this.classesElementLookup={},s!==this&&(t.data(s,this.widgetFullName,this),this._on(!0,this.element,{remove:function(t){t.target===s&&this.destroy()}}),this.document=t(s.style?s.ownerDocument:s.document||s),this.window=t(this.document[0].defaultView||this.document[0].parentWindow)),this.options=t.widget.extend({},this.options,this._getCreateOptions(),e),this._create(),this.options.disabled&&this._setOptionDisabled(this.options.disabled),this._trigger("create",null,this._getCreateEventData()),this._init()},_getCreateOptions:function(){return{}},_getCreateEventData:t.noop,_create:t.noop,_init:t.noop,destroy:function(){var e=this;this._destroy(),t.each(this.classesElementLookup,function(t,i){e._removeClass(i,t)}),this.element.off(this.eventNamespace).removeData(this.widgetFullName),this.widget().off(this.eventNamespace).removeAttr("aria-disabled"),this.bindings.off(this.eventNamespace)},_destroy:t.noop,widget:function(){return this.element},option:function(e,i){var s,n,o,a=e;if(0===arguments.length)return t.widget.extend({},this.options);if("string"==typeof e)if(a={},s=e.split("."),e=s.shift(),s.length){for(n=a[e]=t.widget.extend({},this.options[e]),o=0;s.length-1>o;o++)n[s[o]]=n[s[o]]||{},n=n[s[o]];if(e=s.pop(),1===arguments.length)return void 0===n[e]?null:n[e];n[e]=i}else{if(1===arguments.length)return void 0===this.options[e]?null:this.options[e];a[e]=i}return this._setOptions(a),this},_setOptions:function(t){var e;for(e in t)this._setOption(e,t[e]);return this},_setOption:function(t,e){return"classes"===t&&this._setOptionClasses(e),this.options[t]=e,"disabled"===t&&this._setOptionDisabled(e),this},_setOptionClasses:function(e){var i,s,n;for(i in e)n=this.classesElementLookup[i],e[i]!==this.options.classes[i]&&n&&n.length&&(s=t(n.get()),this._removeClass(n,i),s.addClass(this._classes({element:s,keys:i,classes:e,add:!0})))},_setOptionDisabled:function(t){this._toggleClass(this.widget(),this.widgetFullName+"-disabled",null,!!t),t&&(this._removeClass(this.hoverable,null,"ui-state-hover"),this._removeClass(this.focusable,null,"ui-state-focus"))},enable:function(){return this._setOptions({disabled:!1})},disable:function(){return this._setOptions({disabled:!0})},_classes:function(e){function i(i,o){var a,r;for(r=0;i.length>r;r++)a=n.classesElementLookup[i[r]]||t(),a=e.add?t(t.unique(a.get().concat(e.element.get()))):t(a.not(e.element).get()),n.classesElementLookup[i[r]]=a,s.push(i[r]),o&&e.classes[i[r]]&&s.push(e.classes[i[r]])}var s=[],n=this;return e=t.extend({element:this.element,classes:this.options.classes||{}},e),this._on(e.element,{remove:"_untrackClassesElement"}),e.keys&&i(e.keys.match(/\S+/g)||[],!0),e.extra&&i(e.extra.match(/\S+/g)||[]),s.join(" ")},_untrackClassesElement:function(e){var i=this;t.each(i.classesElementLookup,function(s,n){-1!==t.inArray(e.target,n)&&(i.classesElementLookup[s]=t(n.not(e.target).get()))})},_removeClass:function(t,e,i){return this._toggleClass(t,e,i,!1)},_addClass:function(t,e,i){return this._toggleClass(t,e,i,!0)},_toggleClass:function(t,e,i,s){s="boolean"==typeof s?s:i;var n="string"==typeof t||null===t,o={extra:n?e:i,keys:n?t:e,element:n?this.element:t,add:s};return o.element.toggleClass(this._classes(o),s),this},_on:function(e,i,s){var n,o=this;"boolean"!=typeof e&&(s=i,i=e,e=!1),s?(i=n=t(i),this.bindings=this.bindings.add(i)):(s=i,i=this.element,n=this.widget()),t.each(s,function(s,a){function r(){return e||o.options.disabled!==!0&&!t(this).hasClass("ui-state-disabled")?("string"==typeof a?o[a]:a).apply(o,arguments):void 0}"string"!=typeof a&&(r.guid=a.guid=a.guid||r.guid||t.guid++);var l=s.match(/^([\w:-]*)\s*(.*)$/),h=l[1]+o.eventNamespace,c=l[2];c?n.on(h,c,r):i.on(h,r)})},_off:function(e,i){i=(i||"").split(" ").join(this.eventNamespace+" ")+this.eventNamespace,e.off(i).off(i),this.bindings=t(this.bindings.not(e).get()),this.focusable=t(this.focusable.not(e).get()),this.hoverable=t(this.hoverable.not(e).get())},_delay:function(t,e){function i(){return("string"==typeof t?s[t]:t).apply(s,arguments)}var s=this;return setTimeout(i,e||0)},_hoverable:function(e){this.hoverable=this.hoverable.add(e),this._on(e,{mouseenter:function(e){this._addClass(t(e.currentTarget),null,"ui-state-hover")},mouseleave:function(e){this._removeClass(t(e.currentTarget),null,"ui-state-hover")}})},_focusable:function(e){this.focusable=this.focusable.add(e),this._on(e,{focusin:function(e){this._addClass(t(e.currentTarget),null,"ui-state-focus")},focusout:function(e){this._removeClass(t(e.currentTarget),null,"ui-state-focus")}})},_trigger:function(e,i,s){var n,o,a=this.options[e];if(s=s||{},i=t.Event(i),i.type=(e===this.widgetEventPrefix?e:this.widgetEventPrefix+e).toLowerCase(),i.target=this.element[0],o=i.originalEvent)for(n in o)n in i||(i[n]=o[n]);return this.element.trigger(i,s),!(t.isFunction(a)&&a.apply(this.element[0],[i].concat(s))===!1||i.isDefaultPrevented())}},t.each({show:"fadeIn",hide:"fadeOut"},function(e,i){t.Widget.prototype["_"+e]=function(s,n,o){"string"==typeof n&&(n={effect:n});var a,r=n?n===!0||"number"==typeof n?i:n.effect||i:e;n=n||{},"number"==typeof n&&(n={duration:n}),a=!t.isEmptyObject(n),n.complete=o,n.delay&&s.delay(n.delay),a&&t.effects&&t.effects.effect[r]?s[e](n):r!==e&&s[r]?s[r](n.duration,n.easing,o):s.queue(function(i){t(this)[e](),o&&o.call(s[0]),i()})}}),t.widget,function(){function e(t,e,i){return[parseFloat(t[0])*(u.test(t[0])?e/100:1),parseFloat(t[1])*(u.test(t[1])?i/100:1)]}function i(e,i){return parseInt(t.css(e,i),10)||0}function s(e){var i=e[0];return 9===i.nodeType?{width:e.width(),height:e.height(),offset:{top:0,left:0}}:t.isWindow(i)?{width:e.width(),height:e.height(),offset:{top:e.scrollTop(),left:e.scrollLeft()}}:i.preventDefault?{width:0,height:0,offset:{top:i.pageY,left:i.pageX}}:{width:e.outerWidth(),height:e.outerHeight(),offset:e.offset()}}var n,o=Math.max,a=Math.abs,r=/left|center|right/,l=/top|center|bottom/,h=/[\+\-]\d+(\.[\d]+)?%?/,c=/^\w+/,u=/%$/,d=t.fn.position;t.position={scrollbarWidth:function(){if(void 0!==n)return n;var e,i,s=t("<div style='display:block;position:absolute;width:50px;height:50px;overflow:hidden;'><div style='height:100px;width:auto;'></div></div>"),o=s.children()[0];return t("body").append(s),e=o.offsetWidth,s.css("overflow","scroll"),i=o.offsetWidth,e===i&&(i=s[0].clientWidth),s.remove(),n=e-i},getScrollInfo:function(e){var i=e.isWindow||e.isDocument?"":e.element.css("overflow-x"),s=e.isWindow||e.isDocument?"":e.element.css("overflow-y"),n="scroll"===i||"auto"===i&&e.width<e.element[0].scrollWidth,o="scroll"===s||"auto"===s&&e.height<e.element[0].scrollHeight;return{width:o?t.position.scrollbarWidth():0,height:n?t.position.scrollbarWidth():0}},getWithinInfo:function(e){var i=t(e||window),s=t.isWindow(i[0]),n=!!i[0]&&9===i[0].nodeType,o=!s&&!n;return{element:i,isWindow:s,isDocument:n,offset:o?t(e).offset():{left:0,top:0},scrollLeft:i.scrollLeft(),scrollTop:i.scrollTop(),width:i.outerWidth(),height:i.outerHeight()}}},t.fn.position=function(n){if(!n||!n.of)return d.apply(this,arguments);n=t.extend({},n);var u,p,f,g,m,_,v=t(n.of),b=t.position.getWithinInfo(n.within),y=t.position.getScrollInfo(b),w=(n.collision||"flip").split(" "),k={};return _=s(v),v[0].preventDefault&&(n.at="left top"),p=_.width,f=_.height,g=_.offset,m=t.extend({},g),t.each(["my","at"],function(){var t,e,i=(n[this]||"").split(" ");1===i.length&&(i=r.test(i[0])?i.concat(["center"]):l.test(i[0])?["center"].concat(i):["center","center"]),i[0]=r.test(i[0])?i[0]:"center",i[1]=l.test(i[1])?i[1]:"center",t=h.exec(i[0]),e=h.exec(i[1]),k[this]=[t?t[0]:0,e?e[0]:0],n[this]=[c.exec(i[0])[0],c.exec(i[1])[0]]}),1===w.length&&(w[1]=w[0]),"right"===n.at[0]?m.left+=p:"center"===n.at[0]&&(m.left+=p/2),"bottom"===n.at[1]?m.top+=f:"center"===n.at[1]&&(m.top+=f/2),u=e(k.at,p,f),m.left+=u[0],m.top+=u[1],this.each(function(){var s,r,l=t(this),h=l.outerWidth(),c=l.outerHeight(),d=i(this,"marginLeft"),_=i(this,"marginTop"),x=h+d+i(this,"marginRight")+y.width,C=c+_+i(this,"marginBottom")+y.height,D=t.extend({},m),T=e(k.my,l.outerWidth(),l.outerHeight());"right"===n.my[0]?D.left-=h:"center"===n.my[0]&&(D.left-=h/2),"bottom"===n.my[1]?D.top-=c:"center"===n.my[1]&&(D.top-=c/2),D.left+=T[0],D.top+=T[1],s={marginLeft:d,marginTop:_},t.each(["left","top"],function(e,i){t.ui.position[w[e]]&&t.ui.position[w[e]][i](D,{targetWidth:p,targetHeight:f,elemWidth:h,elemHeight:c,collisionPosition:s,collisionWidth:x,collisionHeight:C,offset:[u[0]+T[0],u[1]+T[1]],my:n.my,at:n.at,within:b,elem:l})}),n.using&&(r=function(t){var e=g.left-D.left,i=e+p-h,s=g.top-D.top,r=s+f-c,u={target:{element:v,left:g.left,top:g.top,width:p,height:f},element:{element:l,left:D.left,top:D.top,width:h,height:c},horizontal:0>i?"left":e>0?"right":"center",vertical:0>r?"top":s>0?"bottom":"middle"};h>p&&p>a(e+i)&&(u.horizontal="center"),c>f&&f>a(s+r)&&(u.vertical="middle"),u.important=o(a(e),a(i))>o(a(s),a(r))?"horizontal":"vertical",n.using.call(this,t,u)}),l.offset(t.extend(D,{using:r}))})},t.ui.position={fit:{left:function(t,e){var i,s=e.within,n=s.isWindow?s.scrollLeft:s.offset.left,a=s.width,r=t.left-e.collisionPosition.marginLeft,l=n-r,h=r+e.collisionWidth-a-n;e.collisionWidth>a?l>0&&0>=h?(i=t.left+l+e.collisionWidth-a-n,t.left+=l-i):t.left=h>0&&0>=l?n:l>h?n+a-e.collisionWidth:n:l>0?t.left+=l:h>0?t.left-=h:t.left=o(t.left-r,t.left)},top:function(t,e){var i,s=e.within,n=s.isWindow?s.scrollTop:s.offset.top,a=e.within.height,r=t.top-e.collisionPosition.marginTop,l=n-r,h=r+e.collisionHeight-a-n;e.collisionHeight>a?l>0&&0>=h?(i=t.top+l+e.collisionHeight-a-n,t.top+=l-i):t.top=h>0&&0>=l?n:l>h?n+a-e.collisionHeight:n:l>0?t.top+=l:h>0?t.top-=h:t.top=o(t.top-r,t.top)}},flip:{left:function(t,e){var i,s,n=e.within,o=n.offset.left+n.scrollLeft,r=n.width,l=n.isWindow?n.scrollLeft:n.offset.left,h=t.left-e.collisionPosition.marginLeft,c=h-l,u=h+e.collisionWidth-r-l,d="left"===e.my[0]?-e.elemWidth:"right"===e.my[0]?e.elemWidth:0,p="left"===e.at[0]?e.targetWidth:"right"===e.at[0]?-e.targetWidth:0,f=-2*e.offset[0];0>c?(i=t.left+d+p+f+e.collisionWidth-r-o,(0>i||a(c)>i)&&(t.left+=d+p+f)):u>0&&(s=t.left-e.collisionPosition.marginLeft+d+p+f-l,(s>0||u>a(s))&&(t.left+=d+p+f))},top:function(t,e){var i,s,n=e.within,o=n.offset.top+n.scrollTop,r=n.height,l=n.isWindow?n.scrollTop:n.offset.top,h=t.top-e.collisionPosition.marginTop,c=h-l,u=h+e.collisionHeight-r-l,d="top"===e.my[1],p=d?-e.elemHeight:"bottom"===e.my[1]?e.elemHeight:0,f="top"===e.at[1]?e.targetHeight:"bottom"===e.at[1]?-e.targetHeight:0,g=-2*e.offset[1];0>c?(s=t.top+p+f+g+e.collisionHeight-r-o,(0>s||a(c)>s)&&(t.top+=p+f+g)):u>0&&(i=t.top-e.collisionPosition.marginTop+p+f+g-l,(i>0||u>a(i))&&(t.top+=p+f+g))}},flipfit:{left:function(){t.ui.position.flip.left.apply(this,arguments),t.ui.position.fit.left.apply(this,arguments)},top:function(){t.ui.position.flip.top.apply(this,arguments),t.ui.position.fit.top.apply(this,arguments)}}}}(),t.ui.position,t.extend(t.expr[":"],{data:t.expr.createPseudo?t.expr.createPseudo(function(e){return function(i){return!!t.data(i,e)}}):function(e,i,s){return!!t.data(e,s[3])}}),t.fn.extend({disableSelection:function(){var t="onselectstart"in document.createElement("div")?"selectstart":"mousedown";return function(){return this.on(t+".ui-disableSelection",function(t){t.preventDefault()})}}(),enableSelection:function(){return this.off(".ui-disableSelection")}}),t.ui.focusable=function(i,s){var n,o,a,r,l,h=i.nodeName.toLowerCase();return"area"===h?(n=i.parentNode,o=n.name,i.href&&o&&"map"===n.nodeName.toLowerCase()?(a=t("img[usemap='#"+o+"']"),a.length>0&&a.is(":visible")):!1):(/^(input|select|textarea|button|object)$/.test(h)?(r=!i.disabled,r&&(l=t(i).closest("fieldset")[0],l&&(r=!l.disabled))):r="a"===h?i.href||s:s,r&&t(i).is(":visible")&&e(t(i)))},t.extend(t.expr[":"],{focusable:function(e){return t.ui.focusable(e,null!=t.attr(e,"tabindex"))}}),t.ui.focusable,t.fn.form=function(){return"string"==typeof this[0].form?this.closest("form"):t(this[0].form)},t.ui.formResetMixin={_formResetHandler:function(){var e=t(this);setTimeout(function(){var i=e.data("ui-form-reset-instances");t.each(i,function(){this.refresh()})})},_bindFormResetHandler:function(){if(this.form=this.element.form(),this.form.length){var t=this.form.data("ui-form-reset-instances")||[];t.length||this.form.on("reset.ui-form-reset",this._formResetHandler),t.push(this),this.form.data("ui-form-reset-instances",t)}},_unbindFormResetHandler:function(){if(this.form.length){var e=this.form.data("ui-form-reset-instances");e.splice(t.inArray(this,e),1),e.length?this.form.data("ui-form-reset-instances",e):this.form.removeData("ui-form-reset-instances").off("reset.ui-form-reset")}}},"1.7"===t.fn.jquery.substring(0,3)&&(t.each(["Width","Height"],function(e,i){function s(e,i,s,o){return t.each(n,function(){i-=parseFloat(t.css(e,"padding"+this))||0,s&&(i-=parseFloat(t.css(e,"border"+this+"Width"))||0),o&&(i-=parseFloat(t.css(e,"margin"+this))||0)}),i}var n="Width"===i?["Left","Right"]:["Top","Bottom"],o=i.toLowerCase(),a={innerWidth:t.fn.innerWidth,innerHeight:t.fn.innerHeight,outerWidth:t.fn.outerWidth,outerHeight:t.fn.outerHeight};t.fn["inner"+i]=function(e){return void 0===e?a["inner"+i].call(this):this.each(function(){t(this).css(o,s(this,e)+"px")})},t.fn["outer"+i]=function(e,n){return"number"!=typeof e?a["outer"+i].call(this,e):this.each(function(){t(this).css(o,s(this,e,!0,n)+"px")})}}),t.fn.addBack=function(t){return this.add(null==t?this.prevObject:this.prevObject.filter(t))}),t.ui.keyCode={BACKSPACE:8,COMMA:188,DELETE:46,DOWN:40,END:35,ENTER:13,ESCAPE:27,HOME:36,LEFT:37,PAGE_DOWN:34,PAGE_UP:33,PERIOD:190,RIGHT:39,SPACE:32,TAB:9,UP:38},t.ui.escapeSelector=function(){var t=/([!"#$%&'()*+,./:;<=>?@[\]^`{|}~])/g;return function(e){return e.replace(t,"\\$1")}}(),t.fn.labels=function(){var e,i,s,n,o;return this[0].labels&&this[0].labels.length?this.pushStack(this[0].labels):(n=this.eq(0).parents("label"),s=this.attr("id"),s&&(e=this.eq(0).parents().last(),o=e.add(e.length?e.siblings():this.siblings()),i="label[for='"+t.ui.escapeSelector(s)+"']",n=n.add(o.find(i).addBack(i))),this.pushStack(n))},t.fn.scrollParent=function(e){var i=this.css("position"),s="absolute"===i,n=e?/(auto|scroll|hidden)/:/(auto|scroll)/,o=this.parents().filter(function(){var e=t(this);return s&&"static"===e.css("position")?!1:n.test(e.css("overflow")+e.css("overflow-y")+e.css("overflow-x"))}).eq(0);return"fixed"!==i&&o.length?o:t(this[0].ownerDocument||document)},t.extend(t.expr[":"],{tabbable:function(e){var i=t.attr(e,"tabindex"),s=null!=i;return(!s||i>=0)&&t.ui.focusable(e,s)}}),t.fn.extend({uniqueId:function(){var t=0;return function(){return this.each(function(){this.id||(this.id="ui-id-"+ ++t)})}}(),removeUniqueId:function(){return this.each(function(){/^ui-id-\d+$/.test(this.id)&&t(this).removeAttr("id")})}}),t.ui.ie=!!/msie [\w.]+/.exec(navigator.userAgent.toLowerCase());var n=!1;t(document).on("mouseup",function(){n=!1}),t.widget("ui.mouse",{version:"1.12.1",options:{cancel:"input, textarea, button, select, option",distance:1,delay:0},_mouseInit:function(){var e=this;this.element.on("mousedown."+this.widgetName,function(t){return e._mouseDown(t)}).on("click."+this.widgetName,function(i){return!0===t.data(i.target,e.widgetName+".preventClickEvent")?(t.removeData(i.target,e.widgetName+".preventClickEvent"),i.stopImmediatePropagation(),!1):void 0}),this.started=!1},_mouseDestroy:function(){this.element.off("."+this.widgetName),this._mouseMoveDelegate&&this.document.off("mousemove."+this.widgetName,this._mouseMoveDelegate).off("mouseup."+this.widgetName,this._mouseUpDelegate)},_mouseDown:function(e){if(!n){this._mouseMoved=!1,this._mouseStarted&&this._mouseUp(e),this._mouseDownEvent=e;var i=this,s=1===e.which,o="string"==typeof this.options.cancel&&e.target.nodeName?t(e.target).closest(this.options.cancel).length:!1;return s&&!o&&this._mouseCapture(e)?(this.mouseDelayMet=!this.options.delay,this.mouseDelayMet||(this._mouseDelayTimer=setTimeout(function(){i.mouseDelayMet=!0},this.options.delay)),this._mouseDistanceMet(e)&&this._mouseDelayMet(e)&&(this._mouseStarted=this._mouseStart(e)!==!1,!this._mouseStarted)?(e.preventDefault(),!0):(!0===t.data(e.target,this.widgetName+".preventClickEvent")&&t.removeData(e.target,this.widgetName+".preventClickEvent"),this._mouseMoveDelegate=function(t){return i._mouseMove(t)},this._mouseUpDelegate=function(t){return i._mouseUp(t)},this.document.on("mousemove."+this.widgetName,this._mouseMoveDelegate).on("mouseup."+this.widgetName,this._mouseUpDelegate),e.preventDefault(),n=!0,!0)):!0}},_mouseMove:function(e){if(this._mouseMoved){if(t.ui.ie&&(!document.documentMode||9>document.documentMode)&&!e.button)return this._mouseUp(e);if(!e.which)if(e.originalEvent.altKey||e.originalEvent.ctrlKey||e.originalEvent.metaKey||e.originalEvent.shiftKey)this.ignoreMissingWhich=!0;else if(!this.ignoreMissingWhich)return this._mouseUp(e)}return(e.which||e.button)&&(this._mouseMoved=!0),this._mouseStarted?(this._mouseDrag(e),e.preventDefault()):(this._mouseDistanceMet(e)&&this._mouseDelayMet(e)&&(this._mouseStarted=this._mouseStart(this._mouseDownEvent,e)!==!1,this._mouseStarted?this._mouseDrag(e):this._mouseUp(e)),!this._mouseStarted)},_mouseUp:function(e){this.document.off("mousemove."+this.widgetName,this._mouseMoveDelegate).off("mouseup."+this.widgetName,this._mouseUpDelegate),this._mouseStarted&&(this._mouseStarted=!1,e.target===this._mouseDownEvent.target&&t.data(e.target,this.widgetName+".preventClickEvent",!0),this._mouseStop(e)),this._mouseDelayTimer&&(clearTimeout(this._mouseDelayTimer),delete this._mouseDelayTimer),this.ignoreMissingWhich=!1,n=!1,e.preventDefault()},_mouseDistanceMet:function(t){return Math.max(Math.abs(this._mouseDownEvent.pageX-t.pageX),Math.abs(this._mouseDownEvent.pageY-t.pageY))>=this.options.distance},_mouseDelayMet:function(){return this.mouseDelayMet},_mouseStart:function(){},_mouseDrag:function(){},_mouseStop:function(){},_mouseCapture:function(){return!0}}),t.ui.plugin={add:function(e,i,s){var n,o=t.ui[e].prototype;for(n in s)o.plugins[n]=o.plugins[n]||[],o.plugins[n].push([i,s[n]])},call:function(t,e,i,s){var n,o=t.plugins[e];if(o&&(s||t.element[0].parentNode&&11!==t.element[0].parentNode.nodeType))for(n=0;o.length>n;n++)t.options[o[n][0]]&&o[n][1].apply(t.element,i)}},t.ui.safeActiveElement=function(t){var e;try{e=t.activeElement}catch(i){e=t.body}return e||(e=t.body),e.nodeName||(e=t.body),e},t.ui.safeBlur=function(e){e&&"body"!==e.nodeName.toLowerCase()&&t(e).trigger("blur")},t.widget("ui.draggable",t.ui.mouse,{version:"1.12.1",widgetEventPrefix:"drag",options:{addClasses:!0,appendTo:"parent",axis:!1,connectToSortable:!1,containment:!1,cursor:"auto",cursorAt:!1,grid:!1,handle:!1,helper:"original",iframeFix:!1,opacity:!1,refreshPositions:!1,revert:!1,revertDuration:500,scope:"default",scroll:!0,scrollSensitivity:20,scrollSpeed:20,snap:!1,snapMode:"both",snapTolerance:20,stack:!1,zIndex:!1,drag:null,start:null,stop:null},_create:function(){"original"===this.options.helper&&this._setPositionRelative(),this.options.addClasses&&this._addClass("ui-draggable"),this._setHandleClassName(),this._mouseInit()},_setOption:function(t,e){this._super(t,e),"handle"===t&&(this._removeHandleClassName(),this._setHandleClassName())},_destroy:function(){return(this.helper||this.element).is(".ui-draggable-dragging")?(this.destroyOnClear=!0,void 0):(this._removeHandleClassName(),this._mouseDestroy(),void 0)},_mouseCapture:function(e){var i=this.options;return this.helper||i.disabled||t(e.target).closest(".ui-resizable-handle").length>0?!1:(this.handle=this._getHandle(e),this.handle?(this._blurActiveElement(e),this._blockFrames(i.iframeFix===!0?"iframe":i.iframeFix),!0):!1)},_blockFrames:function(e){this.iframeBlocks=this.document.find(e).map(function(){var e=t(this);return t("<div>").css("position","absolute").appendTo(e.parent()).outerWidth(e.outerWidth()).outerHeight(e.outerHeight()).offset(e.offset())[0]})},_unblockFrames:function(){this.iframeBlocks&&(this.iframeBlocks.remove(),delete this.iframeBlocks)},_blurActiveElement:function(e){var i=t.ui.safeActiveElement(this.document[0]),s=t(e.target);s.closest(i).length||t.ui.safeBlur(i)},_mouseStart:function(e){var i=this.options;return this.helper=this._createHelper(e),this._addClass(this.helper,"ui-draggable-dragging"),this._cacheHelperProportions(),t.ui.ddmanager&&(t.ui.ddmanager.current=this),this._cacheMargins(),this.cssPosition=this.helper.css("position"),this.scrollParent=this.helper.scrollParent(!0),this.offsetParent=this.helper.offsetParent(),this.hasFixedAncestor=this.helper.parents().filter(function(){return"fixed"===t(this).css("position")}).length>0,this.positionAbs=this.element.offset(),this._refreshOffsets(e),this.originalPosition=this.position=this._generatePosition(e,!1),this.originalPageX=e.pageX,this.originalPageY=e.pageY,i.cursorAt&&this._adjustOffsetFromHelper(i.cursorAt),this._setContainment(),this._trigger("start",e)===!1?(this._clear(),!1):(this._cacheHelperProportions(),t.ui.ddmanager&&!i.dropBehaviour&&t.ui.ddmanager.prepareOffsets(this,e),this._mouseDrag(e,!0),t.ui.ddmanager&&t.ui.ddmanager.dragStart(this,e),!0)},_refreshOffsets:function(t){this.offset={top:this.positionAbs.top-this.margins.top,left:this.positionAbs.left-this.margins.left,scroll:!1,parent:this._getParentOffset(),relative:this._getRelativeOffset()},this.offset.click={left:t.pageX-this.offset.left,top:t.pageY-this.offset.top}},_mouseDrag:function(e,i){if(this.hasFixedAncestor&&(this.offset.parent=this._getParentOffset()),this.position=this._generatePosition(e,!0),this.positionAbs=this._convertPositionTo("absolute"),!i){var s=this._uiHash();if(this._trigger("drag",e,s)===!1)return this._mouseUp(new t.Event("mouseup",e)),!1;this.position=s.position}return this.helper[0].style.left=this.position.left+"px",this.helper[0].style.top=this.position.top+"px",t.ui.ddmanager&&t.ui.ddmanager.drag(this,e),!1},_mouseStop:function(e){var i=this,s=!1;return t.ui.ddmanager&&!this.options.dropBehaviour&&(s=t.ui.ddmanager.drop(this,e)),this.dropped&&(s=this.dropped,this.dropped=!1),"invalid"===this.options.revert&&!s||"valid"===this.options.revert&&s||this.options.revert===!0||t.isFunction(this.options.revert)&&this.options.revert.call(this.element,s)?t(this.helper).animate(this.originalPosition,parseInt(this.options.revertDuration,10),function(){i._trigger("stop",e)!==!1&&i._clear()}):this._trigger("stop",e)!==!1&&this._clear(),!1},_mouseUp:function(e){return this._unblockFrames(),t.ui.ddmanager&&t.ui.ddmanager.dragStop(this,e),this.handleElement.is(e.target)&&this.element.trigger("focus"),t.ui.mouse.prototype._mouseUp.call(this,e)},cancel:function(){return this.helper.is(".ui-draggable-dragging")?this._mouseUp(new t.Event("mouseup",{target:this.element[0]})):this._clear(),this},_getHandle:function(e){return this.options.handle?!!t(e.target).closest(this.element.find(this.options.handle)).length:!0},_setHandleClassName:function(){this.handleElement=this.options.handle?this.element.find(this.options.handle):this.element,this._addClass(this.handleElement,"ui-draggable-handle")},_removeHandleClassName:function(){this._removeClass(this.handleElement,"ui-draggable-handle")},_createHelper:function(e){var i=this.options,s=t.isFunction(i.helper),n=s?t(i.helper.apply(this.element[0],[e])):"clone"===i.helper?this.element.clone().removeAttr("id"):this.element;return n.parents("body").length||n.appendTo("parent"===i.appendTo?this.element[0].parentNode:i.appendTo),s&&n[0]===this.element[0]&&this._setPositionRelative(),n[0]===this.element[0]||/(fixed|absolute)/.test(n.css("position"))||n.css("position","absolute"),n},_setPositionRelative:function(){/^(?:r|a|f)/.test(this.element.css("position"))||(this.element[0].style.position="relative")},_adjustOffsetFromHelper:function(e){"string"==typeof e&&(e=e.split(" ")),t.isArray(e)&&(e={left:+e[0],top:+e[1]||0}),"left"in e&&(this.offset.click.left=e.left+this.margins.left),"right"in e&&(this.offset.click.left=this.helperProportions.width-e.right+this.margins.left),"top"in e&&(this.offset.click.top=e.top+this.margins.top),"bottom"in e&&(this.offset.click.top=this.helperProportions.height-e.bottom+this.margins.top)},_isRootNode:function(t){return/(html|body)/i.test(t.tagName)||t===this.document[0]},_getParentOffset:function(){var e=this.offsetParent.offset(),i=this.document[0];return"absolute"===this.cssPosition&&this.scrollParent[0]!==i&&t.contains(this.scrollParent[0],this.offsetParent[0])&&(e.left+=this.scrollParent.scrollLeft(),e.top+=this.scrollParent.scrollTop()),this._isRootNode(this.offsetParent[0])&&(e={top:0,left:0}),{top:e.top+(parseInt(this.offsetParent.css("borderTopWidth"),10)||0),left:e.left+(parseInt(this.offsetParent.css("borderLeftWidth"),10)||0)}},_getRelativeOffset:function(){if("relative"!==this.cssPosition)return{top:0,left:0};var t=this.element.position(),e=this._isRootNode(this.scrollParent[0]);return{top:t.top-(parseInt(this.helper.css("top"),10)||0)+(e?0:this.scrollParent.scrollTop()),left:t.left-(parseInt(this.helper.css("left"),10)||0)+(e?0:this.scrollParent.scrollLeft())}},_cacheMargins:function(){this.margins={left:parseInt(this.element.css("marginLeft"),10)||0,top:parseInt(this.element.css("marginTop"),10)||0,right:parseInt(this.element.css("marginRight"),10)||0,bottom:parseInt(this.element.css("marginBottom"),10)||0}},_cacheHelperProportions:function(){this.helperProportions={width:this.helper.outerWidth(),height:this.helper.outerHeight()}},_setContainment:function(){var e,i,s,n=this.options,o=this.document[0];return this.relativeContainer=null,n.containment?"window"===n.containment?(this.containment=[t(window).scrollLeft()-this.offset.relative.left-this.offset.parent.left,t(window).scrollTop()-this.offset.relative.top-this.offset.parent.top,t(window).scrollLeft()+t(window).width()-this.helperProportions.width-this.margins.left,t(window).scrollTop()+(t(window).height()||o.body.parentNode.scrollHeight)-this.helperProportions.height-this.margins.top],void 0):"document"===n.containment?(this.containment=[0,0,t(o).width()-this.helperProportions.width-this.margins.left,(t(o).height()||o.body.parentNode.scrollHeight)-this.helperProportions.height-this.margins.top],void 0):n.containment.constructor===Array?(this.containment=n.containment,void 0):("parent"===n.containment&&(n.containment=this.helper[0].parentNode),i=t(n.containment),s=i[0],s&&(e=/(scroll|auto)/.test(i.css("overflow")),this.containment=[(parseInt(i.css("borderLeftWidth"),10)||0)+(parseInt(i.css("paddingLeft"),10)||0),(parseInt(i.css("borderTopWidth"),10)||0)+(parseInt(i.css("paddingTop"),10)||0),(e?Math.max(s.scrollWidth,s.offsetWidth):s.offsetWidth)-(parseInt(i.css("borderRightWidth"),10)||0)-(parseInt(i.css("paddingRight"),10)||0)-this.helperProportions.width-this.margins.left-this.margins.right,(e?Math.max(s.scrollHeight,s.offsetHeight):s.offsetHeight)-(parseInt(i.css("borderBottomWidth"),10)||0)-(parseInt(i.css("paddingBottom"),10)||0)-this.helperProportions.height-this.margins.top-this.margins.bottom],this.relativeContainer=i),void 0):(this.containment=null,void 0)},_convertPositionTo:function(t,e){e||(e=this.position);var i="absolute"===t?1:-1,s=this._isRootNode(this.scrollParent[0]);return{top:e.top+this.offset.relative.top*i+this.offset.parent.top*i-("fixed"===this.cssPosition?-this.offset.scroll.top:s?0:this.offset.scroll.top)*i,left:e.left+this.offset.relative.left*i+this.offset.parent.left*i-("fixed"===this.cssPosition?-this.offset.scroll.left:s?0:this.offset.scroll.left)*i}},_generatePosition:function(t,e){var i,s,n,o,a=this.options,r=this._isRootNode(this.scrollParent[0]),l=t.pageX,h=t.pageY;return r&&this.offset.scroll||(this.offset.scroll={top:this.scrollParent.scrollTop(),left:this.scrollParent.scrollLeft()}),e&&(this.containment&&(this.relativeContainer?(s=this.relativeContainer.offset(),i=[this.containment[0]+s.left,this.containment[1]+s.top,this.containment[2]+s.left,this.containment[3]+s.top]):i=this.containment,t.pageX-this.offset.click.left<i[0]&&(l=i[0]+this.offset.click.left),t.pageY-this.offset.click.top<i[1]&&(h=i[1]+this.offset.click.top),t.pageX-this.offset.click.left>i[2]&&(l=i[2]+this.offset.click.left),t.pageY-this.offset.click.top>i[3]&&(h=i[3]+this.offset.click.top)),a.grid&&(n=a.grid[1]?this.originalPageY+Math.round((h-this.originalPageY)/a.grid[1])*a.grid[1]:this.originalPageY,h=i?n-this.offset.click.top>=i[1]||n-this.offset.click.top>i[3]?n:n-this.offset.click.top>=i[1]?n-a.grid[1]:n+a.grid[1]:n,o=a.grid[0]?this.originalPageX+Math.round((l-this.originalPageX)/a.grid[0])*a.grid[0]:this.originalPageX,l=i?o-this.offset.click.left>=i[0]||o-this.offset.click.left>i[2]?o:o-this.offset.click.left>=i[0]?o-a.grid[0]:o+a.grid[0]:o),"y"===a.axis&&(l=this.originalPageX),"x"===a.axis&&(h=this.originalPageY)),{top:h-this.offset.click.top-this.offset.relative.top-this.offset.parent.top+("fixed"===this.cssPosition?-this.offset.scroll.top:r?0:this.offset.scroll.top),left:l-this.offset.click.left-this.offset.relative.left-this.offset.parent.left+("fixed"===this.cssPosition?-this.offset.scroll.left:r?0:this.offset.scroll.left)}
},_clear:function(){this._removeClass(this.helper,"ui-draggable-dragging"),this.helper[0]===this.element[0]||this.cancelHelperRemoval||this.helper.remove(),this.helper=null,this.cancelHelperRemoval=!1,this.destroyOnClear&&this.destroy()},_trigger:function(e,i,s){return s=s||this._uiHash(),t.ui.plugin.call(this,e,[i,s,this],!0),/^(drag|start|stop)/.test(e)&&(this.positionAbs=this._convertPositionTo("absolute"),s.offset=this.positionAbs),t.Widget.prototype._trigger.call(this,e,i,s)},plugins:{},_uiHash:function(){return{helper:this.helper,position:this.position,originalPosition:this.originalPosition,offset:this.positionAbs}}}),t.ui.plugin.add("draggable","connectToSortable",{start:function(e,i,s){var n=t.extend({},i,{item:s.element});s.sortables=[],t(s.options.connectToSortable).each(function(){var i=t(this).sortable("instance");i&&!i.options.disabled&&(s.sortables.push(i),i.refreshPositions(),i._trigger("activate",e,n))})},stop:function(e,i,s){var n=t.extend({},i,{item:s.element});s.cancelHelperRemoval=!1,t.each(s.sortables,function(){var t=this;t.isOver?(t.isOver=0,s.cancelHelperRemoval=!0,t.cancelHelperRemoval=!1,t._storedCSS={position:t.placeholder.css("position"),top:t.placeholder.css("top"),left:t.placeholder.css("left")},t._mouseStop(e),t.options.helper=t.options._helper):(t.cancelHelperRemoval=!0,t._trigger("deactivate",e,n))})},drag:function(e,i,s){t.each(s.sortables,function(){var n=!1,o=this;o.positionAbs=s.positionAbs,o.helperProportions=s.helperProportions,o.offset.click=s.offset.click,o._intersectsWith(o.containerCache)&&(n=!0,t.each(s.sortables,function(){return this.positionAbs=s.positionAbs,this.helperProportions=s.helperProportions,this.offset.click=s.offset.click,this!==o&&this._intersectsWith(this.containerCache)&&t.contains(o.element[0],this.element[0])&&(n=!1),n})),n?(o.isOver||(o.isOver=1,s._parent=i.helper.parent(),o.currentItem=i.helper.appendTo(o.element).data("ui-sortable-item",!0),o.options._helper=o.options.helper,o.options.helper=function(){return i.helper[0]},e.target=o.currentItem[0],o._mouseCapture(e,!0),o._mouseStart(e,!0,!0),o.offset.click.top=s.offset.click.top,o.offset.click.left=s.offset.click.left,o.offset.parent.left-=s.offset.parent.left-o.offset.parent.left,o.offset.parent.top-=s.offset.parent.top-o.offset.parent.top,s._trigger("toSortable",e),s.dropped=o.element,t.each(s.sortables,function(){this.refreshPositions()}),s.currentItem=s.element,o.fromOutside=s),o.currentItem&&(o._mouseDrag(e),i.position=o.position)):o.isOver&&(o.isOver=0,o.cancelHelperRemoval=!0,o.options._revert=o.options.revert,o.options.revert=!1,o._trigger("out",e,o._uiHash(o)),o._mouseStop(e,!0),o.options.revert=o.options._revert,o.options.helper=o.options._helper,o.placeholder&&o.placeholder.remove(),i.helper.appendTo(s._parent),s._refreshOffsets(e),i.position=s._generatePosition(e,!0),s._trigger("fromSortable",e),s.dropped=!1,t.each(s.sortables,function(){this.refreshPositions()}))})}}),t.ui.plugin.add("draggable","cursor",{start:function(e,i,s){var n=t("body"),o=s.options;n.css("cursor")&&(o._cursor=n.css("cursor")),n.css("cursor",o.cursor)},stop:function(e,i,s){var n=s.options;n._cursor&&t("body").css("cursor",n._cursor)}}),t.ui.plugin.add("draggable","opacity",{start:function(e,i,s){var n=t(i.helper),o=s.options;n.css("opacity")&&(o._opacity=n.css("opacity")),n.css("opacity",o.opacity)},stop:function(e,i,s){var n=s.options;n._opacity&&t(i.helper).css("opacity",n._opacity)}}),t.ui.plugin.add("draggable","scroll",{start:function(t,e,i){i.scrollParentNotHidden||(i.scrollParentNotHidden=i.helper.scrollParent(!1)),i.scrollParentNotHidden[0]!==i.document[0]&&"HTML"!==i.scrollParentNotHidden[0].tagName&&(i.overflowOffset=i.scrollParentNotHidden.offset())},drag:function(e,i,s){var n=s.options,o=!1,a=s.scrollParentNotHidden[0],r=s.document[0];a!==r&&"HTML"!==a.tagName?(n.axis&&"x"===n.axis||(s.overflowOffset.top+a.offsetHeight-e.pageY<n.scrollSensitivity?a.scrollTop=o=a.scrollTop+n.scrollSpeed:e.pageY-s.overflowOffset.top<n.scrollSensitivity&&(a.scrollTop=o=a.scrollTop-n.scrollSpeed)),n.axis&&"y"===n.axis||(s.overflowOffset.left+a.offsetWidth-e.pageX<n.scrollSensitivity?a.scrollLeft=o=a.scrollLeft+n.scrollSpeed:e.pageX-s.overflowOffset.left<n.scrollSensitivity&&(a.scrollLeft=o=a.scrollLeft-n.scrollSpeed))):(n.axis&&"x"===n.axis||(e.pageY-t(r).scrollTop()<n.scrollSensitivity?o=t(r).scrollTop(t(r).scrollTop()-n.scrollSpeed):t(window).height()-(e.pageY-t(r).scrollTop())<n.scrollSensitivity&&(o=t(r).scrollTop(t(r).scrollTop()+n.scrollSpeed))),n.axis&&"y"===n.axis||(e.pageX-t(r).scrollLeft()<n.scrollSensitivity?o=t(r).scrollLeft(t(r).scrollLeft()-n.scrollSpeed):t(window).width()-(e.pageX-t(r).scrollLeft())<n.scrollSensitivity&&(o=t(r).scrollLeft(t(r).scrollLeft()+n.scrollSpeed)))),o!==!1&&t.ui.ddmanager&&!n.dropBehaviour&&t.ui.ddmanager.prepareOffsets(s,e)}}),t.ui.plugin.add("draggable","snap",{start:function(e,i,s){var n=s.options;s.snapElements=[],t(n.snap.constructor!==String?n.snap.items||":data(ui-draggable)":n.snap).each(function(){var e=t(this),i=e.offset();this!==s.element[0]&&s.snapElements.push({item:this,width:e.outerWidth(),height:e.outerHeight(),top:i.top,left:i.left})})},drag:function(e,i,s){var n,o,a,r,l,h,c,u,d,p,f=s.options,g=f.snapTolerance,m=i.offset.left,_=m+s.helperProportions.width,v=i.offset.top,b=v+s.helperProportions.height;for(d=s.snapElements.length-1;d>=0;d--)l=s.snapElements[d].left-s.margins.left,h=l+s.snapElements[d].width,c=s.snapElements[d].top-s.margins.top,u=c+s.snapElements[d].height,l-g>_||m>h+g||c-g>b||v>u+g||!t.contains(s.snapElements[d].item.ownerDocument,s.snapElements[d].item)?(s.snapElements[d].snapping&&s.options.snap.release&&s.options.snap.release.call(s.element,e,t.extend(s._uiHash(),{snapItem:s.snapElements[d].item})),s.snapElements[d].snapping=!1):("inner"!==f.snapMode&&(n=g>=Math.abs(c-b),o=g>=Math.abs(u-v),a=g>=Math.abs(l-_),r=g>=Math.abs(h-m),n&&(i.position.top=s._convertPositionTo("relative",{top:c-s.helperProportions.height,left:0}).top),o&&(i.position.top=s._convertPositionTo("relative",{top:u,left:0}).top),a&&(i.position.left=s._convertPositionTo("relative",{top:0,left:l-s.helperProportions.width}).left),r&&(i.position.left=s._convertPositionTo("relative",{top:0,left:h}).left)),p=n||o||a||r,"outer"!==f.snapMode&&(n=g>=Math.abs(c-v),o=g>=Math.abs(u-b),a=g>=Math.abs(l-m),r=g>=Math.abs(h-_),n&&(i.position.top=s._convertPositionTo("relative",{top:c,left:0}).top),o&&(i.position.top=s._convertPositionTo("relative",{top:u-s.helperProportions.height,left:0}).top),a&&(i.position.left=s._convertPositionTo("relative",{top:0,left:l}).left),r&&(i.position.left=s._convertPositionTo("relative",{top:0,left:h-s.helperProportions.width}).left)),!s.snapElements[d].snapping&&(n||o||a||r||p)&&s.options.snap.snap&&s.options.snap.snap.call(s.element,e,t.extend(s._uiHash(),{snapItem:s.snapElements[d].item})),s.snapElements[d].snapping=n||o||a||r||p)}}),t.ui.plugin.add("draggable","stack",{start:function(e,i,s){var n,o=s.options,a=t.makeArray(t(o.stack)).sort(function(e,i){return(parseInt(t(e).css("zIndex"),10)||0)-(parseInt(t(i).css("zIndex"),10)||0)});a.length&&(n=parseInt(t(a[0]).css("zIndex"),10)||0,t(a).each(function(e){t(this).css("zIndex",n+e)}),this.css("zIndex",n+a.length))}}),t.ui.plugin.add("draggable","zIndex",{start:function(e,i,s){var n=t(i.helper),o=s.options;n.css("zIndex")&&(o._zIndex=n.css("zIndex")),n.css("zIndex",o.zIndex)},stop:function(e,i,s){var n=s.options;n._zIndex&&t(i.helper).css("zIndex",n._zIndex)}}),t.ui.draggable,t.widget("ui.droppable",{version:"1.12.1",widgetEventPrefix:"drop",options:{accept:"*",addClasses:!0,greedy:!1,scope:"default",tolerance:"intersect",activate:null,deactivate:null,drop:null,out:null,over:null},_create:function(){var e,i=this.options,s=i.accept;this.isover=!1,this.isout=!0,this.accept=t.isFunction(s)?s:function(t){return t.is(s)},this.proportions=function(){return arguments.length?(e=arguments[0],void 0):e?e:e={width:this.element[0].offsetWidth,height:this.element[0].offsetHeight}},this._addToManager(i.scope),i.addClasses&&this._addClass("ui-droppable")},_addToManager:function(e){t.ui.ddmanager.droppables[e]=t.ui.ddmanager.droppables[e]||[],t.ui.ddmanager.droppables[e].push(this)},_splice:function(t){for(var e=0;t.length>e;e++)t[e]===this&&t.splice(e,1)},_destroy:function(){var e=t.ui.ddmanager.droppables[this.options.scope];this._splice(e)},_setOption:function(e,i){if("accept"===e)this.accept=t.isFunction(i)?i:function(t){return t.is(i)};else if("scope"===e){var s=t.ui.ddmanager.droppables[this.options.scope];this._splice(s),this._addToManager(i)}this._super(e,i)},_activate:function(e){var i=t.ui.ddmanager.current;this._addActiveClass(),i&&this._trigger("activate",e,this.ui(i))},_deactivate:function(e){var i=t.ui.ddmanager.current;this._removeActiveClass(),i&&this._trigger("deactivate",e,this.ui(i))},_over:function(e){var i=t.ui.ddmanager.current;i&&(i.currentItem||i.element)[0]!==this.element[0]&&this.accept.call(this.element[0],i.currentItem||i.element)&&(this._addHoverClass(),this._trigger("over",e,this.ui(i)))},_out:function(e){var i=t.ui.ddmanager.current;i&&(i.currentItem||i.element)[0]!==this.element[0]&&this.accept.call(this.element[0],i.currentItem||i.element)&&(this._removeHoverClass(),this._trigger("out",e,this.ui(i)))},_drop:function(e,i){var s=i||t.ui.ddmanager.current,n=!1;return s&&(s.currentItem||s.element)[0]!==this.element[0]?(this.element.find(":data(ui-droppable)").not(".ui-draggable-dragging").each(function(){var i=t(this).droppable("instance");return i.options.greedy&&!i.options.disabled&&i.options.scope===s.options.scope&&i.accept.call(i.element[0],s.currentItem||s.element)&&o(s,t.extend(i,{offset:i.element.offset()}),i.options.tolerance,e)?(n=!0,!1):void 0}),n?!1:this.accept.call(this.element[0],s.currentItem||s.element)?(this._removeActiveClass(),this._removeHoverClass(),this._trigger("drop",e,this.ui(s)),this.element):!1):!1},ui:function(t){return{draggable:t.currentItem||t.element,helper:t.helper,position:t.position,offset:t.positionAbs}},_addHoverClass:function(){this._addClass("ui-droppable-hover")},_removeHoverClass:function(){this._removeClass("ui-droppable-hover")},_addActiveClass:function(){this._addClass("ui-droppable-active")},_removeActiveClass:function(){this._removeClass("ui-droppable-active")}});var o=t.ui.intersect=function(){function t(t,e,i){return t>=e&&e+i>t}return function(e,i,s,n){if(!i.offset)return!1;var o=(e.positionAbs||e.position.absolute).left+e.margins.left,a=(e.positionAbs||e.position.absolute).top+e.margins.top,r=o+e.helperProportions.width,l=a+e.helperProportions.height,h=i.offset.left,c=i.offset.top,u=h+i.proportions().width,d=c+i.proportions().height;switch(s){case"fit":return o>=h&&u>=r&&a>=c&&d>=l;case"intersect":return o+e.helperProportions.width/2>h&&u>r-e.helperProportions.width/2&&a+e.helperProportions.height/2>c&&d>l-e.helperProportions.height/2;case"pointer":return t(n.pageY,c,i.proportions().height)&&t(n.pageX,h,i.proportions().width);case"touch":return(a>=c&&d>=a||l>=c&&d>=l||c>a&&l>d)&&(o>=h&&u>=o||r>=h&&u>=r||h>o&&r>u);default:return!1}}}();t.ui.ddmanager={current:null,droppables:{"default":[]},prepareOffsets:function(e,i){var s,n,o=t.ui.ddmanager.droppables[e.options.scope]||[],a=i?i.type:null,r=(e.currentItem||e.element).find(":data(ui-droppable)").addBack();t:for(s=0;o.length>s;s++)if(!(o[s].options.disabled||e&&!o[s].accept.call(o[s].element[0],e.currentItem||e.element))){for(n=0;r.length>n;n++)if(r[n]===o[s].element[0]){o[s].proportions().height=0;continue t}o[s].visible="none"!==o[s].element.css("display"),o[s].visible&&("mousedown"===a&&o[s]._activate.call(o[s],i),o[s].offset=o[s].element.offset(),o[s].proportions({width:o[s].element[0].offsetWidth,height:o[s].element[0].offsetHeight}))}},drop:function(e,i){var s=!1;return t.each((t.ui.ddmanager.droppables[e.options.scope]||[]).slice(),function(){this.options&&(!this.options.disabled&&this.visible&&o(e,this,this.options.tolerance,i)&&(s=this._drop.call(this,i)||s),!this.options.disabled&&this.visible&&this.accept.call(this.element[0],e.currentItem||e.element)&&(this.isout=!0,this.isover=!1,this._deactivate.call(this,i)))}),s},dragStart:function(e,i){e.element.parentsUntil("body").on("scroll.droppable",function(){e.options.refreshPositions||t.ui.ddmanager.prepareOffsets(e,i)})},drag:function(e,i){e.options.refreshPositions&&t.ui.ddmanager.prepareOffsets(e,i),t.each(t.ui.ddmanager.droppables[e.options.scope]||[],function(){if(!this.options.disabled&&!this.greedyChild&&this.visible){var s,n,a,r=o(e,this,this.options.tolerance,i),l=!r&&this.isover?"isout":r&&!this.isover?"isover":null;l&&(this.options.greedy&&(n=this.options.scope,a=this.element.parents(":data(ui-droppable)").filter(function(){return t(this).droppable("instance").options.scope===n}),a.length&&(s=t(a[0]).droppable("instance"),s.greedyChild="isover"===l)),s&&"isover"===l&&(s.isover=!1,s.isout=!0,s._out.call(s,i)),this[l]=!0,this["isout"===l?"isover":"isout"]=!1,this["isover"===l?"_over":"_out"].call(this,i),s&&"isout"===l&&(s.isout=!1,s.isover=!0,s._over.call(s,i)))}})},dragStop:function(e,i){e.element.parentsUntil("body").off("scroll.droppable"),e.options.refreshPositions||t.ui.ddmanager.prepareOffsets(e,i)}},t.uiBackCompat!==!1&&t.widget("ui.droppable",t.ui.droppable,{options:{hoverClass:!1,activeClass:!1},_addActiveClass:function(){this._super(),this.options.activeClass&&this.element.addClass(this.options.activeClass)},_removeActiveClass:function(){this._super(),this.options.activeClass&&this.element.removeClass(this.options.activeClass)},_addHoverClass:function(){this._super(),this.options.hoverClass&&this.element.addClass(this.options.hoverClass)},_removeHoverClass:function(){this._super(),this.options.hoverClass&&this.element.removeClass(this.options.hoverClass)}}),t.ui.droppable,t.widget("ui.selectable",t.ui.mouse,{version:"1.12.1",options:{appendTo:"body",autoRefresh:!0,distance:0,filter:"*",tolerance:"touch",selected:null,selecting:null,start:null,stop:null,unselected:null,unselecting:null},_create:function(){var e=this;this._addClass("ui-selectable"),this.dragged=!1,this.refresh=function(){e.elementPos=t(e.element[0]).offset(),e.selectees=t(e.options.filter,e.element[0]),e._addClass(e.selectees,"ui-selectee"),e.selectees.each(function(){var i=t(this),s=i.offset(),n={left:s.left-e.elementPos.left,top:s.top-e.elementPos.top};t.data(this,"selectable-item",{element:this,$element:i,left:n.left,top:n.top,right:n.left+i.outerWidth(),bottom:n.top+i.outerHeight(),startselected:!1,selected:i.hasClass("ui-selected"),selecting:i.hasClass("ui-selecting"),unselecting:i.hasClass("ui-unselecting")})})},this.refresh(),this._mouseInit(),this.helper=t("<div>"),this._addClass(this.helper,"ui-selectable-helper")},_destroy:function(){this.selectees.removeData("selectable-item"),this._mouseDestroy()},_mouseStart:function(e){var i=this,s=this.options;this.opos=[e.pageX,e.pageY],this.elementPos=t(this.element[0]).offset(),this.options.disabled||(this.selectees=t(s.filter,this.element[0]),this._trigger("start",e),t(s.appendTo).append(this.helper),this.helper.css({left:e.pageX,top:e.pageY,width:0,height:0}),s.autoRefresh&&this.refresh(),this.selectees.filter(".ui-selected").each(function(){var s=t.data(this,"selectable-item");s.startselected=!0,e.metaKey||e.ctrlKey||(i._removeClass(s.$element,"ui-selected"),s.selected=!1,i._addClass(s.$element,"ui-unselecting"),s.unselecting=!0,i._trigger("unselecting",e,{unselecting:s.element}))}),t(e.target).parents().addBack().each(function(){var s,n=t.data(this,"selectable-item");return n?(s=!e.metaKey&&!e.ctrlKey||!n.$element.hasClass("ui-selected"),i._removeClass(n.$element,s?"ui-unselecting":"ui-selected")._addClass(n.$element,s?"ui-selecting":"ui-unselecting"),n.unselecting=!s,n.selecting=s,n.selected=s,s?i._trigger("selecting",e,{selecting:n.element}):i._trigger("unselecting",e,{unselecting:n.element}),!1):void 0}))},_mouseDrag:function(e){if(this.dragged=!0,!this.options.disabled){var i,s=this,n=this.options,o=this.opos[0],a=this.opos[1],r=e.pageX,l=e.pageY;return o>r&&(i=r,r=o,o=i),a>l&&(i=l,l=a,a=i),this.helper.css({left:o,top:a,width:r-o,height:l-a}),this.selectees.each(function(){var i=t.data(this,"selectable-item"),h=!1,c={};i&&i.element!==s.element[0]&&(c.left=i.left+s.elementPos.left,c.right=i.right+s.elementPos.left,c.top=i.top+s.elementPos.top,c.bottom=i.bottom+s.elementPos.top,"touch"===n.tolerance?h=!(c.left>r||o>c.right||c.top>l||a>c.bottom):"fit"===n.tolerance&&(h=c.left>o&&r>c.right&&c.top>a&&l>c.bottom),h?(i.selected&&(s._removeClass(i.$element,"ui-selected"),i.selected=!1),i.unselecting&&(s._removeClass(i.$element,"ui-unselecting"),i.unselecting=!1),i.selecting||(s._addClass(i.$element,"ui-selecting"),i.selecting=!0,s._trigger("selecting",e,{selecting:i.element}))):(i.selecting&&((e.metaKey||e.ctrlKey)&&i.startselected?(s._removeClass(i.$element,"ui-selecting"),i.selecting=!1,s._addClass(i.$element,"ui-selected"),i.selected=!0):(s._removeClass(i.$element,"ui-selecting"),i.selecting=!1,i.startselected&&(s._addClass(i.$element,"ui-unselecting"),i.unselecting=!0),s._trigger("unselecting",e,{unselecting:i.element}))),i.selected&&(e.metaKey||e.ctrlKey||i.startselected||(s._removeClass(i.$element,"ui-selected"),i.selected=!1,s._addClass(i.$element,"ui-unselecting"),i.unselecting=!0,s._trigger("unselecting",e,{unselecting:i.element})))))}),!1}},_mouseStop:function(e){var i=this;return this.dragged=!1,t(".ui-unselecting",this.element[0]).each(function(){var s=t.data(this,"selectable-item");i._removeClass(s.$element,"ui-unselecting"),s.unselecting=!1,s.startselected=!1,i._trigger("unselected",e,{unselected:s.element})}),t(".ui-selecting",this.element[0]).each(function(){var s=t.data(this,"selectable-item");i._removeClass(s.$element,"ui-selecting")._addClass(s.$element,"ui-selected"),s.selecting=!1,s.selected=!0,s.startselected=!0,i._trigger("selected",e,{selected:s.element})}),this._trigger("stop",e),this.helper.remove(),!1}}),t.widget("ui.sortable",t.ui.mouse,{version:"1.12.1",widgetEventPrefix:"sort",ready:!1,options:{appendTo:"parent",axis:!1,connectWith:!1,containment:!1,cursor:"auto",cursorAt:!1,dropOnEmpty:!0,forcePlaceholderSize:!1,forceHelperSize:!1,grid:!1,handle:!1,helper:"original",items:"> *",opacity:!1,placeholder:!1,revert:!1,scroll:!0,scrollSensitivity:20,scrollSpeed:20,scope:"default",tolerance:"intersect",zIndex:1e3,activate:null,beforeStop:null,change:null,deactivate:null,out:null,over:null,receive:null,remove:null,sort:null,start:null,stop:null,update:null},_isOverAxis:function(t,e,i){return t>=e&&e+i>t},_isFloating:function(t){return/left|right/.test(t.css("float"))||/inline|table-cell/.test(t.css("display"))},_create:function(){this.containerCache={},this._addClass("ui-sortable"),this.refresh(),this.offset=this.element.offset(),this._mouseInit(),this._setHandleClassName(),this.ready=!0},_setOption:function(t,e){this._super(t,e),"handle"===t&&this._setHandleClassName()},_setHandleClassName:function(){var e=this;this._removeClass(this.element.find(".ui-sortable-handle"),"ui-sortable-handle"),t.each(this.items,function(){e._addClass(this.instance.options.handle?this.item.find(this.instance.options.handle):this.item,"ui-sortable-handle")})},_destroy:function(){this._mouseDestroy();for(var t=this.items.length-1;t>=0;t--)this.items[t].item.removeData(this.widgetName+"-item");return this},_mouseCapture:function(e,i){var s=null,n=!1,o=this;return this.reverting?!1:this.options.disabled||"static"===this.options.type?!1:(this._refreshItems(e),t(e.target).parents().each(function(){return t.data(this,o.widgetName+"-item")===o?(s=t(this),!1):void 0}),t.data(e.target,o.widgetName+"-item")===o&&(s=t(e.target)),s?!this.options.handle||i||(t(this.options.handle,s).find("*").addBack().each(function(){this===e.target&&(n=!0)}),n)?(this.currentItem=s,this._removeCurrentsFromItems(),!0):!1:!1)},_mouseStart:function(e,i,s){var n,o,a=this.options;if(this.currentContainer=this,this.refreshPositions(),this.helper=this._createHelper(e),this._cacheHelperProportions(),this._cacheMargins(),this.scrollParent=this.helper.scrollParent(),this.offset=this.currentItem.offset(),this.offset={top:this.offset.top-this.margins.top,left:this.offset.left-this.margins.left},t.extend(this.offset,{click:{left:e.pageX-this.offset.left,top:e.pageY-this.offset.top},parent:this._getParentOffset(),relative:this._getRelativeOffset()}),this.helper.css("position","absolute"),this.cssPosition=this.helper.css("position"),this.originalPosition=this._generatePosition(e),this.originalPageX=e.pageX,this.originalPageY=e.pageY,a.cursorAt&&this._adjustOffsetFromHelper(a.cursorAt),this.domPosition={prev:this.currentItem.prev()[0],parent:this.currentItem.parent()[0]},this.helper[0]!==this.currentItem[0]&&this.currentItem.hide(),this._createPlaceholder(),a.containment&&this._setContainment(),a.cursor&&"auto"!==a.cursor&&(o=this.document.find("body"),this.storedCursor=o.css("cursor"),o.css("cursor",a.cursor),this.storedStylesheet=t("<style>*{ cursor: "+a.cursor+" !important; }</style>").appendTo(o)),a.opacity&&(this.helper.css("opacity")&&(this._storedOpacity=this.helper.css("opacity")),this.helper.css("opacity",a.opacity)),a.zIndex&&(this.helper.css("zIndex")&&(this._storedZIndex=this.helper.css("zIndex")),this.helper.css("zIndex",a.zIndex)),this.scrollParent[0]!==this.document[0]&&"HTML"!==this.scrollParent[0].tagName&&(this.overflowOffset=this.scrollParent.offset()),this._trigger("start",e,this._uiHash()),this._preserveHelperProportions||this._cacheHelperProportions(),!s)for(n=this.containers.length-1;n>=0;n--)this.containers[n]._trigger("activate",e,this._uiHash(this));return t.ui.ddmanager&&(t.ui.ddmanager.current=this),t.ui.ddmanager&&!a.dropBehaviour&&t.ui.ddmanager.prepareOffsets(this,e),this.dragging=!0,this._addClass(this.helper,"ui-sortable-helper"),this._mouseDrag(e),!0},_mouseDrag:function(e){var i,s,n,o,a=this.options,r=!1;for(this.position=this._generatePosition(e),this.positionAbs=this._convertPositionTo("absolute"),this.lastPositionAbs||(this.lastPositionAbs=this.positionAbs),this.options.scroll&&(this.scrollParent[0]!==this.document[0]&&"HTML"!==this.scrollParent[0].tagName?(this.overflowOffset.top+this.scrollParent[0].offsetHeight-e.pageY<a.scrollSensitivity?this.scrollParent[0].scrollTop=r=this.scrollParent[0].scrollTop+a.scrollSpeed:e.pageY-this.overflowOffset.top<a.scrollSensitivity&&(this.scrollParent[0].scrollTop=r=this.scrollParent[0].scrollTop-a.scrollSpeed),this.overflowOffset.left+this.scrollParent[0].offsetWidth-e.pageX<a.scrollSensitivity?this.scrollParent[0].scrollLeft=r=this.scrollParent[0].scrollLeft+a.scrollSpeed:e.pageX-this.overflowOffset.left<a.scrollSensitivity&&(this.scrollParent[0].scrollLeft=r=this.scrollParent[0].scrollLeft-a.scrollSpeed)):(e.pageY-this.document.scrollTop()<a.scrollSensitivity?r=this.document.scrollTop(this.document.scrollTop()-a.scrollSpeed):this.window.height()-(e.pageY-this.document.scrollTop())<a.scrollSensitivity&&(r=this.document.scrollTop(this.document.scrollTop()+a.scrollSpeed)),e.pageX-this.document.scrollLeft()<a.scrollSensitivity?r=this.document.scrollLeft(this.document.scrollLeft()-a.scrollSpeed):this.window.width()-(e.pageX-this.document.scrollLeft())<a.scrollSensitivity&&(r=this.document.scrollLeft(this.document.scrollLeft()+a.scrollSpeed))),r!==!1&&t.ui.ddmanager&&!a.dropBehaviour&&t.ui.ddmanager.prepareOffsets(this,e)),this.positionAbs=this._convertPositionTo("absolute"),this.options.axis&&"y"===this.options.axis||(this.helper[0].style.left=this.position.left+"px"),this.options.axis&&"x"===this.options.axis||(this.helper[0].style.top=this.position.top+"px"),i=this.items.length-1;i>=0;i--)if(s=this.items[i],n=s.item[0],o=this._intersectsWithPointer(s),o&&s.instance===this.currentContainer&&n!==this.currentItem[0]&&this.placeholder[1===o?"next":"prev"]()[0]!==n&&!t.contains(this.placeholder[0],n)&&("semi-dynamic"===this.options.type?!t.contains(this.element[0],n):!0)){if(this.direction=1===o?"down":"up","pointer"!==this.options.tolerance&&!this._intersectsWithSides(s))break;this._rearrange(e,s),this._trigger("change",e,this._uiHash());break}return this._contactContainers(e),t.ui.ddmanager&&t.ui.ddmanager.drag(this,e),this._trigger("sort",e,this._uiHash()),this.lastPositionAbs=this.positionAbs,!1},_mouseStop:function(e,i){if(e){if(t.ui.ddmanager&&!this.options.dropBehaviour&&t.ui.ddmanager.drop(this,e),this.options.revert){var s=this,n=this.placeholder.offset(),o=this.options.axis,a={};o&&"x"!==o||(a.left=n.left-this.offset.parent.left-this.margins.left+(this.offsetParent[0]===this.document[0].body?0:this.offsetParent[0].scrollLeft)),o&&"y"!==o||(a.top=n.top-this.offset.parent.top-this.margins.top+(this.offsetParent[0]===this.document[0].body?0:this.offsetParent[0].scrollTop)),this.reverting=!0,t(this.helper).animate(a,parseInt(this.options.revert,10)||500,function(){s._clear(e)})}else this._clear(e,i);return!1}},cancel:function(){if(this.dragging){this._mouseUp(new t.Event("mouseup",{target:null})),"original"===this.options.helper?(this.currentItem.css(this._storedCSS),this._removeClass(this.currentItem,"ui-sortable-helper")):this.currentItem.show();for(var e=this.containers.length-1;e>=0;e--)this.containers[e]._trigger("deactivate",null,this._uiHash(this)),this.containers[e].containerCache.over&&(this.containers[e]._trigger("out",null,this._uiHash(this)),this.containers[e].containerCache.over=0)}return this.placeholder&&(this.placeholder[0].parentNode&&this.placeholder[0].parentNode.removeChild(this.placeholder[0]),"original"!==this.options.helper&&this.helper&&this.helper[0].parentNode&&this.helper.remove(),t.extend(this,{helper:null,dragging:!1,reverting:!1,_noFinalSort:null}),this.domPosition.prev?t(this.domPosition.prev).after(this.currentItem):t(this.domPosition.parent).prepend(this.currentItem)),this},serialize:function(e){var i=this._getItemsAsjQuery(e&&e.connected),s=[];return e=e||{},t(i).each(function(){var i=(t(e.item||this).attr(e.attribute||"id")||"").match(e.expression||/(.+)[\-=_](.+)/);i&&s.push((e.key||i[1]+"[]")+"="+(e.key&&e.expression?i[1]:i[2]))}),!s.length&&e.key&&s.push(e.key+"="),s.join("&")},toArray:function(e){var i=this._getItemsAsjQuery(e&&e.connected),s=[];return e=e||{},i.each(function(){s.push(t(e.item||this).attr(e.attribute||"id")||"")}),s},_intersectsWith:function(t){var e=this.positionAbs.left,i=e+this.helperProportions.width,s=this.positionAbs.top,n=s+this.helperProportions.height,o=t.left,a=o+t.width,r=t.top,l=r+t.height,h=this.offset.click.top,c=this.offset.click.left,u="x"===this.options.axis||s+h>r&&l>s+h,d="y"===this.options.axis||e+c>o&&a>e+c,p=u&&d;return"pointer"===this.options.tolerance||this.options.forcePointerForContainers||"pointer"!==this.options.tolerance&&this.helperProportions[this.floating?"width":"height"]>t[this.floating?"width":"height"]?p:e+this.helperProportions.width/2>o&&a>i-this.helperProportions.width/2&&s+this.helperProportions.height/2>r&&l>n-this.helperProportions.height/2},_intersectsWithPointer:function(t){var e,i,s="x"===this.options.axis||this._isOverAxis(this.positionAbs.top+this.offset.click.top,t.top,t.height),n="y"===this.options.axis||this._isOverAxis(this.positionAbs.left+this.offset.click.left,t.left,t.width),o=s&&n;return o?(e=this._getDragVerticalDirection(),i=this._getDragHorizontalDirection(),this.floating?"right"===i||"down"===e?2:1:e&&("down"===e?2:1)):!1},_intersectsWithSides:function(t){var e=this._isOverAxis(this.positionAbs.top+this.offset.click.top,t.top+t.height/2,t.height),i=this._isOverAxis(this.positionAbs.left+this.offset.click.left,t.left+t.width/2,t.width),s=this._getDragVerticalDirection(),n=this._getDragHorizontalDirection();return this.floating&&n?"right"===n&&i||"left"===n&&!i:s&&("down"===s&&e||"up"===s&&!e)},_getDragVerticalDirection:function(){var t=this.positionAbs.top-this.lastPositionAbs.top;return 0!==t&&(t>0?"down":"up")},_getDragHorizontalDirection:function(){var t=this.positionAbs.left-this.lastPositionAbs.left;return 0!==t&&(t>0?"right":"left")},refresh:function(t){return this._refreshItems(t),this._setHandleClassName(),this.refreshPositions(),this},_connectWith:function(){var t=this.options;return t.connectWith.constructor===String?[t.connectWith]:t.connectWith},_getItemsAsjQuery:function(e){function i(){r.push(this)}var s,n,o,a,r=[],l=[],h=this._connectWith();if(h&&e)for(s=h.length-1;s>=0;s--)for(o=t(h[s],this.document[0]),n=o.length-1;n>=0;n--)a=t.data(o[n],this.widgetFullName),a&&a!==this&&!a.options.disabled&&l.push([t.isFunction(a.options.items)?a.options.items.call(a.element):t(a.options.items,a.element).not(".ui-sortable-helper").not(".ui-sortable-placeholder"),a]);for(l.push([t.isFunction(this.options.items)?this.options.items.call(this.element,null,{options:this.options,item:this.currentItem}):t(this.options.items,this.element).not(".ui-sortable-helper").not(".ui-sortable-placeholder"),this]),s=l.length-1;s>=0;s--)l[s][0].each(i);return t(r)},_removeCurrentsFromItems:function(){var e=this.currentItem.find(":data("+this.widgetName+"-item)");this.items=t.grep(this.items,function(t){for(var i=0;e.length>i;i++)if(e[i]===t.item[0])return!1;return!0})},_refreshItems:function(e){this.items=[],this.containers=[this];var i,s,n,o,a,r,l,h,c=this.items,u=[[t.isFunction(this.options.items)?this.options.items.call(this.element[0],e,{item:this.currentItem}):t(this.options.items,this.element),this]],d=this._connectWith();if(d&&this.ready)for(i=d.length-1;i>=0;i--)for(n=t(d[i],this.document[0]),s=n.length-1;s>=0;s--)o=t.data(n[s],this.widgetFullName),o&&o!==this&&!o.options.disabled&&(u.push([t.isFunction(o.options.items)?o.options.items.call(o.element[0],e,{item:this.currentItem}):t(o.options.items,o.element),o]),this.containers.push(o));for(i=u.length-1;i>=0;i--)for(a=u[i][1],r=u[i][0],s=0,h=r.length;h>s;s++)l=t(r[s]),l.data(this.widgetName+"-item",a),c.push({item:l,instance:a,width:0,height:0,left:0,top:0})},refreshPositions:function(e){this.floating=this.items.length?"x"===this.options.axis||this._isFloating(this.items[0].item):!1,this.offsetParent&&this.helper&&(this.offset.parent=this._getParentOffset());var i,s,n,o;for(i=this.items.length-1;i>=0;i--)s=this.items[i],s.instance!==this.currentContainer&&this.currentContainer&&s.item[0]!==this.currentItem[0]||(n=this.options.toleranceElement?t(this.options.toleranceElement,s.item):s.item,e||(s.width=n.outerWidth(),s.height=n.outerHeight()),o=n.offset(),s.left=o.left,s.top=o.top);if(this.options.custom&&this.options.custom.refreshContainers)this.options.custom.refreshContainers.call(this);else for(i=this.containers.length-1;i>=0;i--)o=this.containers[i].element.offset(),this.containers[i].containerCache.left=o.left,this.containers[i].containerCache.top=o.top,this.containers[i].containerCache.width=this.containers[i].element.outerWidth(),this.containers[i].containerCache.height=this.containers[i].element.outerHeight();return this},_createPlaceholder:function(e){e=e||this;var i,s=e.options;s.placeholder&&s.placeholder.constructor!==String||(i=s.placeholder,s.placeholder={element:function(){var s=e.currentItem[0].nodeName.toLowerCase(),n=t("<"+s+">",e.document[0]);return e._addClass(n,"ui-sortable-placeholder",i||e.currentItem[0].className)._removeClass(n,"ui-sortable-helper"),"tbody"===s?e._createTrPlaceholder(e.currentItem.find("tr").eq(0),t("<tr>",e.document[0]).appendTo(n)):"tr"===s?e._createTrPlaceholder(e.currentItem,n):"img"===s&&n.attr("src",e.currentItem.attr("src")),i||n.css("visibility","hidden"),n},update:function(t,n){(!i||s.forcePlaceholderSize)&&(n.height()||n.height(e.currentItem.innerHeight()-parseInt(e.currentItem.css("paddingTop")||0,10)-parseInt(e.currentItem.css("paddingBottom")||0,10)),n.width()||n.width(e.currentItem.innerWidth()-parseInt(e.currentItem.css("paddingLeft")||0,10)-parseInt(e.currentItem.css("paddingRight")||0,10)))}}),e.placeholder=t(s.placeholder.element.call(e.element,e.currentItem)),e.currentItem.after(e.placeholder),s.placeholder.update(e,e.placeholder)},_createTrPlaceholder:function(e,i){var s=this;
e.children().each(function(){t("<td>&#160;</td>",s.document[0]).attr("colspan",t(this).attr("colspan")||1).appendTo(i)})},_contactContainers:function(e){var i,s,n,o,a,r,l,h,c,u,d=null,p=null;for(i=this.containers.length-1;i>=0;i--)if(!t.contains(this.currentItem[0],this.containers[i].element[0]))if(this._intersectsWith(this.containers[i].containerCache)){if(d&&t.contains(this.containers[i].element[0],d.element[0]))continue;d=this.containers[i],p=i}else this.containers[i].containerCache.over&&(this.containers[i]._trigger("out",e,this._uiHash(this)),this.containers[i].containerCache.over=0);if(d)if(1===this.containers.length)this.containers[p].containerCache.over||(this.containers[p]._trigger("over",e,this._uiHash(this)),this.containers[p].containerCache.over=1);else{for(n=1e4,o=null,c=d.floating||this._isFloating(this.currentItem),a=c?"left":"top",r=c?"width":"height",u=c?"pageX":"pageY",s=this.items.length-1;s>=0;s--)t.contains(this.containers[p].element[0],this.items[s].item[0])&&this.items[s].item[0]!==this.currentItem[0]&&(l=this.items[s].item.offset()[a],h=!1,e[u]-l>this.items[s][r]/2&&(h=!0),n>Math.abs(e[u]-l)&&(n=Math.abs(e[u]-l),o=this.items[s],this.direction=h?"up":"down"));if(!o&&!this.options.dropOnEmpty)return;if(this.currentContainer===this.containers[p])return this.currentContainer.containerCache.over||(this.containers[p]._trigger("over",e,this._uiHash()),this.currentContainer.containerCache.over=1),void 0;o?this._rearrange(e,o,null,!0):this._rearrange(e,null,this.containers[p].element,!0),this._trigger("change",e,this._uiHash()),this.containers[p]._trigger("change",e,this._uiHash(this)),this.currentContainer=this.containers[p],this.options.placeholder.update(this.currentContainer,this.placeholder),this.containers[p]._trigger("over",e,this._uiHash(this)),this.containers[p].containerCache.over=1}},_createHelper:function(e){var i=this.options,s=t.isFunction(i.helper)?t(i.helper.apply(this.element[0],[e,this.currentItem])):"clone"===i.helper?this.currentItem.clone():this.currentItem;return s.parents("body").length||t("parent"!==i.appendTo?i.appendTo:this.currentItem[0].parentNode)[0].appendChild(s[0]),s[0]===this.currentItem[0]&&(this._storedCSS={width:this.currentItem[0].style.width,height:this.currentItem[0].style.height,position:this.currentItem.css("position"),top:this.currentItem.css("top"),left:this.currentItem.css("left")}),(!s[0].style.width||i.forceHelperSize)&&s.width(this.currentItem.width()),(!s[0].style.height||i.forceHelperSize)&&s.height(this.currentItem.height()),s},_adjustOffsetFromHelper:function(e){"string"==typeof e&&(e=e.split(" ")),t.isArray(e)&&(e={left:+e[0],top:+e[1]||0}),"left"in e&&(this.offset.click.left=e.left+this.margins.left),"right"in e&&(this.offset.click.left=this.helperProportions.width-e.right+this.margins.left),"top"in e&&(this.offset.click.top=e.top+this.margins.top),"bottom"in e&&(this.offset.click.top=this.helperProportions.height-e.bottom+this.margins.top)},_getParentOffset:function(){this.offsetParent=this.helper.offsetParent();var e=this.offsetParent.offset();return"absolute"===this.cssPosition&&this.scrollParent[0]!==this.document[0]&&t.contains(this.scrollParent[0],this.offsetParent[0])&&(e.left+=this.scrollParent.scrollLeft(),e.top+=this.scrollParent.scrollTop()),(this.offsetParent[0]===this.document[0].body||this.offsetParent[0].tagName&&"html"===this.offsetParent[0].tagName.toLowerCase()&&t.ui.ie)&&(e={top:0,left:0}),{top:e.top+(parseInt(this.offsetParent.css("borderTopWidth"),10)||0),left:e.left+(parseInt(this.offsetParent.css("borderLeftWidth"),10)||0)}},_getRelativeOffset:function(){if("relative"===this.cssPosition){var t=this.currentItem.position();return{top:t.top-(parseInt(this.helper.css("top"),10)||0)+this.scrollParent.scrollTop(),left:t.left-(parseInt(this.helper.css("left"),10)||0)+this.scrollParent.scrollLeft()}}return{top:0,left:0}},_cacheMargins:function(){this.margins={left:parseInt(this.currentItem.css("marginLeft"),10)||0,top:parseInt(this.currentItem.css("marginTop"),10)||0}},_cacheHelperProportions:function(){this.helperProportions={width:this.helper.outerWidth(),height:this.helper.outerHeight()}},_setContainment:function(){var e,i,s,n=this.options;"parent"===n.containment&&(n.containment=this.helper[0].parentNode),("document"===n.containment||"window"===n.containment)&&(this.containment=[0-this.offset.relative.left-this.offset.parent.left,0-this.offset.relative.top-this.offset.parent.top,"document"===n.containment?this.document.width():this.window.width()-this.helperProportions.width-this.margins.left,("document"===n.containment?this.document.height()||document.body.parentNode.scrollHeight:this.window.height()||this.document[0].body.parentNode.scrollHeight)-this.helperProportions.height-this.margins.top]),/^(document|window|parent)$/.test(n.containment)||(e=t(n.containment)[0],i=t(n.containment).offset(),s="hidden"!==t(e).css("overflow"),this.containment=[i.left+(parseInt(t(e).css("borderLeftWidth"),10)||0)+(parseInt(t(e).css("paddingLeft"),10)||0)-this.margins.left,i.top+(parseInt(t(e).css("borderTopWidth"),10)||0)+(parseInt(t(e).css("paddingTop"),10)||0)-this.margins.top,i.left+(s?Math.max(e.scrollWidth,e.offsetWidth):e.offsetWidth)-(parseInt(t(e).css("borderLeftWidth"),10)||0)-(parseInt(t(e).css("paddingRight"),10)||0)-this.helperProportions.width-this.margins.left,i.top+(s?Math.max(e.scrollHeight,e.offsetHeight):e.offsetHeight)-(parseInt(t(e).css("borderTopWidth"),10)||0)-(parseInt(t(e).css("paddingBottom"),10)||0)-this.helperProportions.height-this.margins.top])},_convertPositionTo:function(e,i){i||(i=this.position);var s="absolute"===e?1:-1,n="absolute"!==this.cssPosition||this.scrollParent[0]!==this.document[0]&&t.contains(this.scrollParent[0],this.offsetParent[0])?this.scrollParent:this.offsetParent,o=/(html|body)/i.test(n[0].tagName);return{top:i.top+this.offset.relative.top*s+this.offset.parent.top*s-("fixed"===this.cssPosition?-this.scrollParent.scrollTop():o?0:n.scrollTop())*s,left:i.left+this.offset.relative.left*s+this.offset.parent.left*s-("fixed"===this.cssPosition?-this.scrollParent.scrollLeft():o?0:n.scrollLeft())*s}},_generatePosition:function(e){var i,s,n=this.options,o=e.pageX,a=e.pageY,r="absolute"!==this.cssPosition||this.scrollParent[0]!==this.document[0]&&t.contains(this.scrollParent[0],this.offsetParent[0])?this.scrollParent:this.offsetParent,l=/(html|body)/i.test(r[0].tagName);return"relative"!==this.cssPosition||this.scrollParent[0]!==this.document[0]&&this.scrollParent[0]!==this.offsetParent[0]||(this.offset.relative=this._getRelativeOffset()),this.originalPosition&&(this.containment&&(e.pageX-this.offset.click.left<this.containment[0]&&(o=this.containment[0]+this.offset.click.left),e.pageY-this.offset.click.top<this.containment[1]&&(a=this.containment[1]+this.offset.click.top),e.pageX-this.offset.click.left>this.containment[2]&&(o=this.containment[2]+this.offset.click.left),e.pageY-this.offset.click.top>this.containment[3]&&(a=this.containment[3]+this.offset.click.top)),n.grid&&(i=this.originalPageY+Math.round((a-this.originalPageY)/n.grid[1])*n.grid[1],a=this.containment?i-this.offset.click.top>=this.containment[1]&&i-this.offset.click.top<=this.containment[3]?i:i-this.offset.click.top>=this.containment[1]?i-n.grid[1]:i+n.grid[1]:i,s=this.originalPageX+Math.round((o-this.originalPageX)/n.grid[0])*n.grid[0],o=this.containment?s-this.offset.click.left>=this.containment[0]&&s-this.offset.click.left<=this.containment[2]?s:s-this.offset.click.left>=this.containment[0]?s-n.grid[0]:s+n.grid[0]:s)),{top:a-this.offset.click.top-this.offset.relative.top-this.offset.parent.top+("fixed"===this.cssPosition?-this.scrollParent.scrollTop():l?0:r.scrollTop()),left:o-this.offset.click.left-this.offset.relative.left-this.offset.parent.left+("fixed"===this.cssPosition?-this.scrollParent.scrollLeft():l?0:r.scrollLeft())}},_rearrange:function(t,e,i,s){i?i[0].appendChild(this.placeholder[0]):e.item[0].parentNode.insertBefore(this.placeholder[0],"down"===this.direction?e.item[0]:e.item[0].nextSibling),this.counter=this.counter?++this.counter:1;var n=this.counter;this._delay(function(){n===this.counter&&this.refreshPositions(!s)})},_clear:function(t,e){function i(t,e,i){return function(s){i._trigger(t,s,e._uiHash(e))}}this.reverting=!1;var s,n=[];if(!this._noFinalSort&&this.currentItem.parent().length&&this.placeholder.before(this.currentItem),this._noFinalSort=null,this.helper[0]===this.currentItem[0]){for(s in this._storedCSS)("auto"===this._storedCSS[s]||"static"===this._storedCSS[s])&&(this._storedCSS[s]="");this.currentItem.css(this._storedCSS),this._removeClass(this.currentItem,"ui-sortable-helper")}else this.currentItem.show();for(this.fromOutside&&!e&&n.push(function(t){this._trigger("receive",t,this._uiHash(this.fromOutside))}),!this.fromOutside&&this.domPosition.prev===this.currentItem.prev().not(".ui-sortable-helper")[0]&&this.domPosition.parent===this.currentItem.parent()[0]||e||n.push(function(t){this._trigger("update",t,this._uiHash())}),this!==this.currentContainer&&(e||(n.push(function(t){this._trigger("remove",t,this._uiHash())}),n.push(function(t){return function(e){t._trigger("receive",e,this._uiHash(this))}}.call(this,this.currentContainer)),n.push(function(t){return function(e){t._trigger("update",e,this._uiHash(this))}}.call(this,this.currentContainer)))),s=this.containers.length-1;s>=0;s--)e||n.push(i("deactivate",this,this.containers[s])),this.containers[s].containerCache.over&&(n.push(i("out",this,this.containers[s])),this.containers[s].containerCache.over=0);if(this.storedCursor&&(this.document.find("body").css("cursor",this.storedCursor),this.storedStylesheet.remove()),this._storedOpacity&&this.helper.css("opacity",this._storedOpacity),this._storedZIndex&&this.helper.css("zIndex","auto"===this._storedZIndex?"":this._storedZIndex),this.dragging=!1,e||this._trigger("beforeStop",t,this._uiHash()),this.placeholder[0].parentNode.removeChild(this.placeholder[0]),this.cancelHelperRemoval||(this.helper[0]!==this.currentItem[0]&&this.helper.remove(),this.helper=null),!e){for(s=0;n.length>s;s++)n[s].call(this,t);this._trigger("stop",t,this._uiHash())}return this.fromOutside=!1,!this.cancelHelperRemoval},_trigger:function(){t.Widget.prototype._trigger.apply(this,arguments)===!1&&this.cancel()},_uiHash:function(e){var i=e||this;return{helper:i.helper,placeholder:i.placeholder||t([]),position:i.position,originalPosition:i.originalPosition,offset:i.positionAbs,item:i.currentItem,sender:e?e.element:null}}})});
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
//IniSetari
if(isset($_COOKIE['mysettings'])){
	$SETTINGS=json_decode($_COOKIE['mysettings'],TRUE);
}
else $SETTINGS=$DEFAULTSET;
if(isset($_COOKIE['myencoding'])){
	$CHARSET=$_COOKIE['myencoding'];
}
else $CHARSET=$defaultCharset;
//*IniSetari
//Logout
if ($_GET['act']=='logout'){
	logout();
	echo 1;
	die();
}
if ($_GET['act']=='logoutdb'){
	logout_db();
	echo 1;
	die();
}
//*Logout
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
if ($_GET['act']=='backup'){
	register_shutdown_function(function(){
	if ($err=error_get_last()){
		if ($err['type']==E_ERROR) {
		header("Content-Type: text/html;charset=utf-8");
		echo create_error_page('Backup error');}
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
	$k=($tables===NULL)?generateBackupDb($conn,$_SESSION['actdb']):generateBackupTables($conn,$tables);
	if ($k===FALSE) {
		header("Content-Type: text/html;charset=utf-8");
		echo create_error_page('Backup error');
	}
	else {
	header('Content-Type: application/force-download');
	header('Content-Disposition: attachment; filename="'.(($tables!==NULL)?(urlencode($_SESSION['actdb']).'_tables'):urlencode($_SESSION['actdb'])).'.sql"');
	echo $k;
	}
		}
		else {
		header("Content-Type: text/html;charset=utf-8");
		echo create_error_page('Error loading database');
		}
	}
	else {
		header("Content-Type: text/html;charset=utf-8");
		echo create_error_page('Connection error');
	}
	die();
}
//*BACKUP
header("Content-Type: text/html;charset=utf-8");
//IMPORT
if ($_GET['act']=='import'){
register_shutdown_function(function(){
	if ($err=error_get_last()){
		if ($err['type']==E_ERROR) {
		header("Content-Type: text/html;charset=utf-8");
		echo create_error_page('Import error');}
	}
	});
	if (!isset($_POST['is_upload'])) echo create_error_page('Import error');
	else if (isset($_POST['is_upload']) && !($_FILES['import_file']['size'] > 0)) echo create_error_page('The file could not be uploaded or is too big!');
	else{
		if ($conn=create_connection()){
			if (isset($_SESSION['actdb'])) mysqli_select_db($conn,$_SESSION['actdb']);
			$cont=file_get_contents($_FILES['import_file']['tmp_name']);
			 $bom = pack('H*','EFBBBF');
			$cont = preg_replace("/^$bom/", '', $cont);
			mysqli_multi_query($conn,$cont);
		do{
			if (mysqli_errno($conn)) {echo create_error_page('<span style="color:red">Mysql error: </span>'.htmlspecialchars(mysqli_error($conn)));
			mysqli_close($conn);
			die();
			}
		}while(mysqli_next_result($conn));
		if (mysqli_errno($conn)) echo create_error_page('<span style="color:red">Mysql error: </span>'.htmlspecialchars(mysqli_error($conn)));
		else echo create_info_page('Import done');
		mysqli_close($conn);
		}
		else{
			echo create_error_page('Connection error');
		}
	}
	die();
}
//*IMPORT
//PQUERY
if ($_GET['act']=='pquery'){
	$conn=create_connection();
	$ok=1;
	if(!$conn){
		$res['stat']='con_err';
		$res['con_err']='login';
		$ok=0;
	}
	else if (isset($_SESSION['actdb'])){
		if (!select_database($conn)){
			$res['stat']='con_err';
		$res['con_err']='dbmiss';
		$ok=0;
		}
	}
	if ($ok){
		$res['stat']='success';
		if ($result=mysqli_query($conn,$_POST['query'])){
			if (mysqli_num_fields($result)==0) $res['result']='Query with void result.<br>Affected rows: '.mysqli_affected_rows($conn);
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
if ($_GET['act']=='createdb'){
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
if ($_GET['act']=='dbselectcreate'){
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
if ($_GET['act']=='selectdb'){
	$res=array();
	if ($conn=create_connection()){
		$_SESSION['actdb']=$_POST['db'];
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
if ($_GET['act']=='showactdb'){
	$res=array();
	if (isset($_SESSION['actdb'])){
		$res['stat']='success';
		$res['db']=$_SESSION['actdb'];
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
if ($_GET['act']=='dropdb'&&$_POST['check']=="DA"){
	$res=array();
	if ($conn=create_connection()){
		if (select_database($conn)){
			$SQL='DROP DATABASE '.pname($_SESSION['actdb'],FALSE);
			if (mysqli_query($conn,$SQL)){
				$res['stat']='success';
				$res['db']=htmlspecialchars($_SESSION['actdb']);
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
if ($_GET['act']=='createtbl'){
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
if ($_GET['act']=='tblselectcreate'){
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
if ($_GET['act']=='selecttbl'){
	$res=array();
	if ($conn=create_connection()){
		if (select_database($conn)){
			$_SESSION['acttab']=$_POST['tbl'];
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
if ($_GET['act']=='tables_list'){
	$res=array();
	if ($conn=create_connection()){
		if (select_database($conn)){
		if(isset($GLOBALS['DEFAULTDBS'])&&isset($GLOBALS['DEFAULTDBS']['tables'][$_SESSION['actdb']])&&$GLOBALS['DEFAULTDBS']['tables'][$_SESSION['actdb']]!=NULL){
		if (count($GLOBALS['DEFAULTDBS']['tables'][$_SESSION['actdb']])>0){
			$res['stat']='success';
			$res['cnt']=array();
		foreach ($GLOBALS['DEFAULTDBS']['tables'][$_SESSION['actdb']] as $tbll){
			array_push($res['cnt'],htmlspecialchars($tbll));
		}
		}
		else {
			$res['stat']='fail';
			$res['error']='There is no table!';
		}
	}
	else{
$sql='SHOW tables';
if (($result=mysqli_query($conn,$sql))===FALSE||mysqli_num_rows($result)==0){
	$res['stat']='fail';
	$res['error']='There is no table!';
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
		$res['all']=create_database_select($connver);
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
	echo '
	<style type="text/css">
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
	font-family: "Brush Script MT",cursive;
	font-size:26px;
	color:#0000EE;
}
.brush_mt{
	font-family: "Brush Script MT",cursive;
}
.closing{
	font-family: Arial,"Helvetica Neue",Helvetica,sans-serif;
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
	</style>
	</head>';
	enc_build();
	echo '<body>
	<div id="banner">
	Access MySqli <br>
	Versiunea '.$VERSION.'
	</div>
	<div id="logindiv">';
	if (!$conn){
	echo'<br>
	<span style="font-weight:bold;font-size:20px;padding-left:30px;">Log in</span><br><br><br>
	<div class="input_container">
	<input type="text" class="input_element" id="User" value="User"></input>
	</div><br><br>
	<div class="input_container">
	<input type="text" class="input_element" id="Password" value="Password"></input>
	</div><br>
	<div style="padding-right:25px;"><br>
	<button type="button" onclick="login_attempt()" class="but" style="float:right;">Log in</button></div>
	<div style="color:#FFFFFF;font-size:20px;font-weight:bold;padding-left:25px;" id="error"></div>
	<script>
	function login_attempt(){
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
		$.post("access_mysqli.php?act=checkuser&ajax=true",{usr:us,pwd:pas},function(result){
			var res=JSON.parse(result);
			if (res["stat"]=="fail"){
				document.getElementById("logindiv").removePreloader();
				$("#error").html("Wrong data!");
			}
			else {
				document.getElementById("logindiv").removePreloader();
				$("#logindiv").html(res["all"]);
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
				this.value=this.getAttribute("id");
				this.type="text";
			}
		});
		$(".input_element").keypress(function(e){
				if (e.keyCode==13) login_attempt();
		})
	});
	</script>
	';}
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
	if (!$conn) {
		return FALSE;
	}
	if (mysqli_query($conn,"SET NAMES ".$GLOBALS['CHARSET'])){
		return $conn;
	}
	else return FALSE;

}
function enc_build(){
if (isset($_COOKIE['myencstate'])&&$_COOKIE['myencstate']=="close")
echo '<div id="up_encoding" style="position:fixed;z-index:12;left:50%;width:530px;height:60px;margin-left:-265px;top:-40px;" my_state="close">';
else
echo '<div id="up_encoding" style="position:fixed;z-index:12;left:50%;width:530px;height:60px;margin-left:-265px;top:-10px;" my_state="open">';
echo '<div title="Schimbare codare caractere" style="background-color:#4F4FFF;width:40px;height:30px;margin-left:auto;margin-right:auto;border-radius:4px;position:absolute;top:25px;left:50%;margin-left:-20px;z-index:-1;cursor:pointer;" onclick="switchEncDiv()">
	<div style="height:15px">&nbsp;</div>
	<svg viewBox="0 0 100 50" style="width:30px;height:15px;margin-left:5px">
	<path d="M 10,10 L 50,40 L 90,10 L 80,10 L 50,30 L 20,10 Z" stroke="#FFFFFF" stroke-width="2" fill="#000000"/>
	</svg>
	</div>
	<div style="background-color:#E88435;width:500px;height:40px;margin-left:auto;margin-right:auto;border-radius:5px;z-index:11;color:white;padding-left:10px;padding-right:10px;"><div style="height:15px;"></div>
	&nbsp;&nbsp;&nbsp;&nbsp;Encoding used when comunicatind with MySql:&nbsp;<select id="enc_select" onchange="enc_change()" style="border:solid #999 1px;border-radius:5px;">';
	for ($i=0;$i<count($GLOBALS['encodings']);$i++){
		echo '<option value="'.$GLOBALS['encodings'][$i].'">'.$GLOBALS['encodings'][$i].'</option>';
	}
	echo'</select>
	</div>
	<script>
	var currentEnc=getCookie("myencoding");
	if (currentEnc!=null&&currentEnc!="") $("#enc_select").val(currentEnc);
	else {
		$("#enc_select").val("';
		echo $GLOBALS['defaultCharset'];
	echo'");
	}
	</script>
	</div>';
}
function meta_build(){
	echo '
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8">
<meta name="viewport" content="width=1550,height=872">
<title>Access MySqli v'.$GLOBALS['VERSION'].'</title>
<script>';
echo_jquery();
echo '</script>';
echo <<<'EOT'
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
</script>
<script>
function gen_error(arg){
	var text,cls;
	switch(arg){
		case 'login':
		text='Connection error.';
		cls=0;
		break;
		case 'dbmiss':
		text='Error loading database.';
		cls=0;
		break;
		case 'tblmiss':
		text='Error loading table.';
		cls=0;
		break;
		case 'colmiss':
		text='The table was modified before processing query.';
		cls=0;
		break;
		case 'json_error':
		text='JSON encoding error. Try changing the encoding from the top of the page';
		cls=1;
		break;
		case 'bad_link':
		text='Insert a link address!';
		cls=1;
		break;
		default:
		text=false;
		cls=1;
		break;
		}
		if (text===false) text='<span style="font-weight:bold;color:red">Mysql error:</span><br>'+arg;
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
		<div style="height:50px;">Click OK to close:<button type="button" style="cursor:pointer;position:relative;top:-5px;float:right;margin-right:25px;color:#FFFFFF;background-color:#CC8D00;width:75px;font-size:18px;" onclick="close_error(\''+cls+'\')">OK</button></div>\
		</div>';
		if (document.getElementsByTagName('body')[0].getElementsByClassName('conerdiv').length==0){
			document.getElementsByTagName('body')[0].appendChild(conerdiv);
		}
}
function close_error(arg){
	if (arg!='0') {
		arr=document.getElementsByTagName('body')[0].getElementsByClassName('conerdiv');
		if (arr.length!=0){
			document.getElementsByTagName('body')[0].removeChild(arr[0]);
	}}
	else {
		window.location.href="access_mysqli.php";
		}
	}
function gen_pquery(){
	pqrm=document.createElement('div');
	pqrm.setAttribute('class','pqr');
	pqrm.setAttribute('style','position:fixed;left:0px;top:0px;width:100%;height:100%;background-color:#000000;opacity:0.2;z-index:8;');
	pqr=document.createElement('div');
	pqr.setAttribute('style','text-align:center;background-color:#FFF2A0;width:98%;height:98%;position:fixed;top:1%;left:1%;z-index:9;border-radius:10px;overflow:hidden;');
	pqr.setAttribute('class','pqr');
	var inr='\
	<a href="javascript:close_pquery()" class="closing" style="font-size:26px;position:absolute;right:20px;top:10px;" title="Close">x</a>\
	<div><h3 style="text-align:center">Insert query:</h3></div>\
	<div style="border:solid 1px #999;border-radius:5px;width:1000px;margin-left:auto;margin-right:auto;padding:20px;position:relative;" id="pqueries">\
	<textarea  rows="3" cols="60" style="resize: none;border-radius:5px;" id="pqueryquery"></textarea>&nbsp;\
	<a href="javascript:clear_pquery()" class="closing" style="font-size:26px;position:relative;top:-17px;" title="Empty field">x</a>\
	<button type="button" style="float:right;background-color:#4F4F80;color:#FFFFFF;font-size:16px;border:none;border-radius:5px;height:25px;cursor:pointer;position:relative;left:-200px;top:12px;" onclick="send_pquery()">Send</button></div>\
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
		window.location.href="access_mysqli.php";
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
		$.post('access_mysqli.php?act=pquery&ajax=true',{query:query},function(result){
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
	$.get('access_mysqli.php?act=logout',function(result){
		window.location.href='access_mysqli.php';
	});
}
function ge_cr(arg){
	var cr=document.createElement('div');
	cr.setAttribute('style','position:fixed;left:0px;top:0px;width:100%;height:100%;z-index:9;');
	cr.setAttribute('class','create');
	var inner='<div style="position:absolute;top:0px;left:0px;width:100%;height:100%;background-color:#000000;opacity:0.5;">&nbsp;</div>\
	<div id="create" style="opacity:1;position:absolute;top:50%;left:50%;width:500px;height:400px;padding:20px;margin-left:-270px;margin-top:-220px;background-color:#FFF2A0;border-radius:5px;">\
	<a href="javascript:close_cr(\''+arg+'\')" class="closing" style="font-size:24px;position:absolute;right:20px;top:10px;" title="Close">x</a>';
	if (arg=='db'){
	inner=inner+'<div><h3 style="text-align:center;">Create database</h3></div>\
	<br><br>\
	<div style="padding-left:50px">Insert database name:<br><br>\
	<div style="margin-left:10px;background-color:#FFFFFF;border-radius:5px;width:250px;padding-left:5px;height:25px;"><input type="text" id="newname" style="margin-top:2px;height:19px;border:none;width:245px;"></input></div></div>';
}
if (arg=='tbl1'||arg=='tbl2'){
	inner=inner+'<div><h3 style="text-align:center;">Create table</h3></div>\
	<br id="crbr">\
	<div style="padding-left:50px">Insert table name:<br><br>\
	<div style="margin-left:10px;background-color:#FFFFFF;border-radius:5px;width:250px;padding-left:5px;height:25px;"><input type="text" id="newname" style="margin-top:2px;height:19px;border:none;width:245px;"></input></div></div>\
	<br><div style="padding-left:50px">Insert first column name:<br><br>\
	<div style="margin-left:10px;background-color:#FFFFFF;border-radius:5px;width:250px;padding-left:5px;height:25px;"><input type="text" id="newcolname" style="margin-top:2px;height:19px;border:none;width:245px;"></input></div></div>\
	<br><div style="padding-left:50px">Choose first table data type:<br><br>\
	<select onchange="newdatashow(this)" style="border-radius:5px;color:#FFFFFF;background-color:#CC8D00;font-size:14px;" id="newdatatye"><option value="int unique key auto_increment">Autoincrement</option>\
	<option value="int">int</option>\
	<option value="float">float</option>\
	<option value="text">text</option>\
	<option value="date">date</option>\
	<option value="0">Other</option>\
	</select></div>\
	<br><div style="padding-left:50px;display:none;" id="newdatadiv">Insert data type:<br><br>\
	<div style="margin-left:10px;background-color:#FFFFFF;border-radius:5px;width:250px;padding-left:5px;height:25px;"><input type="text" id="newdatatype2" style="margin-top:2px;height:19px;border:none;width:245px;"></input></div>\
	</div>\
';
}
inner=inner+'<div style="height:50px;position:absolute;bottom:0px;right:10px;width:350px;">Click OK to save:<button type="button" style="cursor:pointer;position:relative;top:-5px;float:right;margin-right:25px;color:#FFFFFF;background-color:#CC8D00;width:75px;font-size:18px;" onclick="send_cr(\''+arg+'\')">OK</button></div>\
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
		$.get('access_mysqli.php?act=dbselectcreate&ajax=true',function(result){
			document.getElementById('logindiv').removePreloader();
			var ree=JSON.parse(result);
			if (ree['stat']=='con_err') gen_error(ree['con_err']);
		if (ree['stat']=='fail') gen_error(ree['error']);
		if(ree['stat']=='success') $('#logindiv').html(ree['all']);
		});
	}
	if (arg=='tbl1'){
		document.getElementById('logindiv').createPreloader();
		$.get('access_mysqli.php?act=tblselectcreate&ajax=true',function(result){
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
		$.post('access_mysqli.php?act=createdb&ajax=true',{newdb:h},function(result){
			document.getElementById('create').removePreloader();
			var ree=JSON.parse(result);
			if (ree['stat']=='con_err') gen_error(ree['con_err']);
			else if (ree['stat']=='fail') gen_error(ree['error']);
			else if (ree['stat']=='success') gen_info('Database '+htmlspecialchars(h)+' has been created.');
		});
	}
	if (arg=='tbl1'||arg=='tbl2'){
		document.getElementById('create').createPreloader();
		var h=$('#newname').val();
		var coln=$('#newcolname').val();
		var dt=$('#newdatatye').val();
		if (dt==0||dt=='0'||dt=='') dt=$('#newdatatype2').val();
		$.post('access_mysqli.php?act=createtbl&ajax=true',{newname:h,newcolname:coln,newdatatype:dt},function(result){
			document.getElementById('create').removePreloader();
			var ree=JSON.parse(result);
			if (ree['stat']=='con_err') gen_error(ree['con_err']);
			else if (ree['stat']=='fail') gen_error(ree['error']);
			else if (ree['stat']=='success') gen_info('Table '+htmlspecialchars(h)+' has been created.');
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
		</svg>&nbsp;&nbsp;&nbsp;<span style="color:blue;font-weight:bold;position:relative;top:-10px">INFO</span>\
		</div><br>\
		<div style="overflow:auto;height:130px">'+text+'</div>\
		<div style="height:50px;">Click OK to close.<button type="button" style="cursor:pointer;position:relative;top:-5px;float:right;margin-right:25px;color:#FFFFFF;background-color:#CC8D00;width:75px;font-size:18px;" onclick="close_info('+closem+')">OK</button></div>\
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
else window.location.href='access_mysqli.php';
}
function selectDb(){
	var db=$('#select_db').val();
	document.getElementById('logindiv').createPreloader();
	$.post('access_mysqli.php?act=selectdb&ajax=true',{db:db},function(result){
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
	$.get('access_mysqli.php?act=showactdb&ajax=true',function(result){
		var ree=JSON.parse(result);
		if (ree['stat']=='con_err') gen_error(ree['con_err']);
		if (ree['stat']=='success'){x=ree['db'];
		gen_prompt('dropdb2()','Do you really want to delete database '+htmlspecialchars(x)+' ?');
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
		</svg>&nbsp;&nbsp;&nbsp;<span style="color:#FFB800;font-weight:bold;position:relative;top:-10px">CONFIRM</span>\
		</div><br>\
		<div style="overflow:auto;height:130px">'+text+'</div>\
		<div style="height:50px;"><button type="button" style="cursor:pointer;position:relative;top:-5px;left:40px;color:#FFFFFF;background-color:#CC8D00;width:75px;font-size:18px;" onclick="'+fun+'">YES</button><button type="button" style="cursor:pointer;position:relative;top:-5px;left:103px;color:#FFFFFF;background-color:#CC8D00;width:75px;font-size:18px;" onclick="close_prompt()">NO</button></div>\
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
	$.post('access_mysqli.php?act=dropdb',{check:'DA'},function(result){
	var ree=JSON.parse(result);
	pr.removePreloader();
	close_prompt();
		if (ree['stat']=='con_err') gen_error(ree['con_err']);
		if (ree['stat']=='fail') gen_error(ree['error']);
		if (ree['stat']=='success') gen_info('Database '+ree['db']+' has been deleted',1);
	});
}
function newdatashow(x){
	var v=x.value;
	if (v==0||v=='0'||v==''){
		$('#crbr').hide();
		$('#newdatadiv').slideDown();
	}
	else {$('#newdatadiv').slideUp();
	$('#crbr').show();
	$('#newdatatype2').val('');
	}
}
function logoutdb(){
	$.get('access_mysqli.php?act=logoutdb',function(result){
		window.location.href='access_mysqli.php';
	})
}
function selectTbl(){
	var t=$('#select_tbl').val();
	document.getElementById('logindiv').createPreloader();
	$.post('access_mysqli.php?act=selecttbl&ajax=true',{tbl:t},function(result){

		var ree=JSON.parse(result);
		if (ree['stat']=='con_err'){
		document.getElementById('logindiv').removePreloader();
		gen_error(ree['con_err']);
		}
		if (ree['stat']=='fail'){ gen_error(ree['error']);
		document.getElementById('logindiv').removePreloader();
		}
		if (ree['stat']=='success'){
			window.location.href="access_mysqli.php";
		}
	});
}
function refreshTableScrollbar(){
	document.getElementById('db_and_table').createPreloader();
	active++;
	$.get('access_mysqli.php?act=refrtblscroll&ajax=true',function(result){
		active--;
		document.getElementById('db_and_table').removePreloader();
		var ree=JSON.parse(result);
		if (ree['stat']=='con_err'){
		gen_error(ree['con_err']);
		}
		if (ree['stat']=='fail')gen_error(ree['error']);
		if (ree['stat']=='success'){
			$('#table_sel').html('The table is: \
			'+ree['all']);
		}
	});
}
function droptbl(){
	gen_prompt('droptbl2()','Do you really want to delete table '+htmlspecialchars($('#tabel_select').val())+' ?');
}
function droptbl2(){
	var pr=document.getElementsByClassName('promptdivcont')[0];
	if (typeof pr !='undefined'&&pr!=null){
		pr.createPreloader();
	}
	$.post('access_mysqli.php?act=droptbl&ajax=true',{confirm:'da'},function(result){
		pr.removePreloader();
		close_prompt();
		var ree=JSON.parse(result);
		if (ree['stat']=='con_err') gen_error(ree['con_err']);
		if (ree['stat']=='fail') gen_error(ree['error']);
		if (ree['stat']=='success'){
			gen_info('Table '+ree['tbl']+' has been deleted.',1);
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
	setCookie('myencoding',newEnc,30);
	window.location.href="access_mysqli.php";});
}
function switchEncDiv(){
	var encDiv=$('#up_encoding');
	if (encDiv.attr('my_state')=='open') {
		encDiv.attr('my_state','close');
		encDiv.animate({
		top:-40
		},500);
		setCookie('myencstate','close',30);
	}
	else if (encDiv.attr('my_state')=='close') {
		encDiv.attr('my_state','open');
		encDiv.animate({
		top:-10
		},500);
		setCookie('myencstate','open',30);
	}
}
//BACKUP
function create_backup(){
	var cr=document.createElement('div');
	cr.setAttribute('style','position:fixed;left:0px;top:0px;width:100%;height:100%;z-index:7;');
	cr.setAttribute('class','backupDiv');
	var inner='<div style="position:absolute;top:0px;left:0px;width:100%;height:100%;background-color:#000000;opacity:0.5;">&nbsp;</div>\
	<div id="backupDivInter" style="opacity:1;position:absolute;top:50%;left:50%;width:500px;height:400px;padding:20px;margin-left:-270px;margin-top:-220px;background-color:#FFF2A0;border-radius:5px;">\
	<form method="post" action="access_mysqli.php?act=backup">\
	<a href="javascript:closeBackupDiv()" class="closing" style="font-size:24px;position:absolute;right:20px;top:10px;" title="Close">x</a>\
	<div><h3 style="text-align:center;">Database/tables backup</h3></div>\
	<br id="crbr">\
	<br><div style="padding-left:50px"><input type="radio" style="cursor:pointer;" name="backupWholeDb" value="yes" id="backupWholeDb1" checked="true" onchange="backupGetTables()">The whole current database (including database creation)</input><br><br>\
	<input type="radio" style="cursor:pointer;" name="backupWholeDb" id="backupWholeDb0" value="no" onchange="backupGetTables()">Only tables:</input><br><br>\
	<table style="display:none;" id="backupTableSelectTable"><tr><td style="vertical-align:text-top;padding-right:10px;text-align:center;"><span style="font-weight:bold">Selectare tabele:<br><br>\
	<button type="button" class="butTables" onclick="allTables()" style="margin-bottom:10px;margin-top:4px;">All tables</button><br>\
	<button type="button" class="butTables" onclick="noTable()">No table</button>\
	</span></td><td><span id="selectTables"></span></td></tr></table>\
	</div>\
	<div style="height:50px;position:absolute;bottom:0px;right:10px;">Click OK to generate backup:&nbsp;&nbsp;&nbsp;<input type="submit" style="cursor:pointer;position:relative;top:-5px;float:right;margin-right:25px;color:#FFFFFF;background-color:#CC8D00;width:75px;font-size:18px;" value="OK"/></div>\
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
			$.get('access_mysqli.php?act=tables_list',function(result){
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
	<form method="post" action="access_mysqli.php?act=import" enctype="multipart/form-data">\
	<a href="javascript:closeUploadDiv()" class="closing" style="font-size:24px;position:absolute;right:20px;top:10px;" title="Close">x</a>\
	<div><h3 style="text-align:center;">Import database and tables (.sql file)</h3></div>\
	<br id="crbr">\
	<br><div style="padding-left:50px" id="upload_dbName"></div><br><br>\
	<div style="padding-left:50px">\
	<input type="hidden" name="is_upload" value="yes"/>\
	<input type="file" name="import_file" id="import_file" accept=".sql"/>\
	</div>\
	<div style="height:50px;position:absolute;bottom:0px;right:10px;">Click OK to import file:&nbsp;&nbsp;&nbsp;<input type="submit" style="cursor:pointer;position:relative;top:-5px;float:right;margin-right:25px;color:#FFFFFF;background-color:#CC8D00;width:75px;font-size:18px;" value="OK"/></div>\
	</form>\
</div>';
cr.innerHTML=inner;
if (document.getElementsByClassName('create').length==0)
	document.getElementsByTagName('body')[0].appendChild(cr);
$('#uploadDivInter').get(0).createPreloader();
			active++;
			$.get('access_mysqli.php?act=showactdb',function(result){
			active--;
			$('#uploadDivInter').get(0).removePreloader();
			var ree=JSON.parse(result);
			if (ree['stat']=='con_err') {
			$('#upload_dbName').html('There is no database selected. Because of that, the file must also specify the database in use.');
			}
			if (ree['stat']=='success'){
			$('#upload_dbName').html('The queries in the file will be implicitly executed on current database: <span style="font-weight:bold">'+ree['db']+'</span>');
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
	$res.= '<span style="font-weight:bold;font-size:20px;padding-left:30px;">Choose database: </span><br><br><br>';
	if (isset($GLOBALS['DEFAULTDBS'])){
		if (count($GLOBALS['DEFAULTDBS']['databases'])>0){
		$res.= '<select class="sldb" id="select_db" style="margin-left:25px;">';
			foreach ($GLOBALS['DEFAULTDBS']['databases'] as $dbss){
			$res.= '<option value="'.htmlspecialchars($dbss).'">'.htmlspecialchars($dbss).'</option>';
			}
			$res.= '</select>';
	$res.='<button class="but" style="font-size:16px;width:50px;height:25px;position:relative;left:10px;" onclick="selectDb()">Choose</button>';
		}
		else $res.='No database';
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
	$res.='<button class="but" style="font-size:16px;width:50px;height:25px;position:relative;left:10px;" onclick="selectDb()">Choose</button>';
	}
	else $res.='No database';
	}
	else
	$res.='<script>gen_error("login")</script>';}
if (isset($GLOBALS['DEFAULTDBS'])) $res.='<div style="margin-top:30px;margin-left:20px;">';
else
$res.='<div style="margin-top:30px;margin-left:20px;"><span title="Create database">'.create_plus_button("ge_cr('db')",'width:40px;height:40px;').'</span>'.str_repeat('&nbsp;',3);
$res.='<span title="Import database">'.create_upload_logo('create_upload()','width:40px;height:40px;cursor:pointer;').'</span>';
	$res.='<div style="margin-top:10px;">'.create_pquery_button().str_repeat('&nbsp;',3).'<span title="Log out">'.create_logout_button(FALSE,'width:40px;height:40px;position:relative;top:10px;cursor:pointer;','logout()').'</span></div></div>';

	return $res;
}
function select_database($conn){
	if (!isset($_SESSION['actdb'])||$conn===FALSE) return FALSE;
	if (mysqli_select_db($conn,$_SESSION['actdb'])) return TRUE;
	else {
		logout_db();
		return FALSE;
	}
}
function create_pquery_button($style='width:50px;height:25px;'){
	$res='<button type="button" onclick="gen_pquery()" style="border-radius:5px;background-color:#FFFFFF;border:solid 1px #0F00CC;cursor:pointer;" title="Create own query">
	<svg viewBox="0 0 1000 500" style="'.$style.'">
	<text x="0" y="400" fill="black" style="font-size:400px;" class="brush_mt">Sql</text>
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
	<text x="26" y="63" fill="#FF4F00" style="font-size:34px;font-weight:bold;" stroke="#FFFFFF" stroke-width="1">DB</text>
	';
	}
	return $res;
}
function prepare($arg){
		return addslashes($arg);
}
function logout(){
	unset($_SESSION['userdb'],$_SESSION['pwddb'],$_SESSION['actdb'],$_SESSION['acttab'],$_SESSION['myorder']);
}
function logout_db(){
	unset($_SESSION['actdb'],$_SESSION['acttab'],$_SESSION['myorder']);
}
function logout_tbl(){
	unset($_SESSION['acttab'],$_SESSION['myorder']);
}
function check_table_exist($conn){

	if (!select_database($conn)||!$conn||!isset($_SESSION['acttab'])) return FALSE;
	$SQL='SHOW TABLES';
	$result=mysqli_query($conn,$SQL);
	if (!$result){ logout_tbl();
	return FALSE;
	}
	$ok=FALSE;
	 while ($row=mysqli_fetch_row($result)){
	 if ($row[0]==$_SESSION['acttab']) $ok=TRUE;}
	if ($ok===FALSE) logout_tbl();
		return $ok;
}
function create_table_select($conn){
		$res='<br>';
	$res.= '<span style="font-weight:bold;font-size:20px;padding-left:30px;">Choose table:</span><br><br>
	<span style="font-weight:bold;font-size:16px;padding-left:30px;" title="'.htmlspecialchars($_SESSION['actdb']).'">Current database: '.htmlspecialchars($_SESSION['actdb']).'</span><br><br>';
	if(isset($GLOBALS['DEFAULTDBS'])&&isset($GLOBALS['DEFAULTDBS']['tables'][$_SESSION['actdb']])&&$GLOBALS['DEFAULTDBS']['tables'][$_SESSION['actdb']]!==NULL){
		if (count($GLOBALS['DEFAULTDBS']['tables'][$_SESSION['actdb']])>0){
			$res.= '<select class="sldb" id="select_tbl" style="margin-left:25px;">';
		foreach ($GLOBALS['DEFAULTDBS']['tables'][$_SESSION['actdb']] as $tbll){
			$res.= '<option value="'.htmlspecialchars($tbll).'">'.htmlspecialchars($tbll).'</option>';
		}
		$res.= '</select>';
		$res.='<button class="but" style="font-size:16px;width:50px;height:25px;position:relative;left:10px;" onclick="selectTbl()">Choose</button>';
		}
		else $res.='Niciun tabel';
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
	$res.='<button class="but" style="font-size:16px;width:50px;height:25px;position:relative;left:10px;" onclick="selectTbl()">Choose</button>';
	}
	else $res.='Niciun tabel';
	}
	else
$res.='<script>gen_error("login")</script>';}
if (isset($GLOBALS['DEFAULTDBS'])&&isset($GLOBALS['DEFAULTDBS']['tables'][$_SESSION['actdb']])&&$GLOBALS['DEFAULTDBS']['tables'][$_SESSION['actdb']]!==NULL) $res.='<div style="margin-top:30px;margin-left:20px;">';
else
$res.='<div style="margin-top:30px;margin-left:20px;"><span title="Create table">'.create_plus_button("ge_cr('tbl1')",'width:40px;height:40px;').'</span>'.str_repeat('&nbsp;',3).'<span title="Delete database">'.create_x_button('dropdb()','width:40px;height:40px;').'</span>'.str_repeat('&nbsp;',3);
$res.='<span title="Backup database/tables">'.create_download_logo('create_backup()','width:40px;height:40px;cursor:pointer;').'</span>'.str_repeat('&nbsp;',3).'<span title="Import database/tables">'.create_upload_logo('create_upload()','width:40px;height:40px;cursor:pointer;').'</span>';
	$res.='<div style="margin-top:10px;">'.create_pquery_button().str_repeat('&nbsp;',3).'<span title="Log out">'.create_logout_button(FALSE,'width:40px;height:40px;position:relative;top:10px;cursor:pointer;','logout()').'</span>'.str_repeat('&nbsp;',5).'<span title="Change database">'.create_logout_button(TRUE,'width:40px;height:40px;position:relative;top:10px;cursor:pointer;','logoutdb()').'</span></div></div>';
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
	if(isset($GLOBALS['DEFAULTDBS'])&&isset($GLOBALS['DEFAULTDBS']['tables'][$_SESSION['actdb']])&&$GLOBALS['DEFAULTDBS']['tables'][$_SESSION['actdb']]!=NULL){
		if (count($GLOBALS['DEFAULTDBS']['tables'][$_SESSION['actdb']])>0){
		foreach ($GLOBALS['DEFAULTDBS']['tables'][$_SESSION['actdb']] as $tbll){
			$re.= '<option value="'.htmlspecialchars($tbll).'">'.htmlspecialchars($tbll).'</option>';
		}
		$re.= '</select>';
		$re.='<script> $("#tabel_select").val(\''.escapenl(prepare($_SESSION['acttab'])).'\');</script>';
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
	$re.='<script> $("#tabel_select").val(\''.escapenl(prepare($_SESSION['acttab'])).'\');</script>';
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
	$sql='SHOW COLUMNS FROM '.pname($_SESSION['acttab'],FALSE);
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
	if (isset($_SESSION['myorder'])) $orderar=$_SESSION['myorder'];
		if (!isset($orderar)||!is_array($orderar)) $orderar=array();
		$ok1=FALSE;
		$orderQ=' ';
		for ($k=0;$k<count($orderar);$k+=2){
			$orderQ.=pname($orderar[$k],FALSE).' '.$orderar[$k+1];
			if ($k<count($orderar)-2) $orderQ.=', ';
			$ok1=TRUE;
		}
		if ($ok1===TRUE) $orderQ=' ORDER BY'.$orderQ;
		$sql="SELECT * FROM ".pname($_SESSION['acttab'],FALSE).$orderQ;
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
	$sql="SHOW FIELDS FROM ".pname($_SESSION['acttab'],FALSE);
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
	$sql='SHOW FIELDS FROM '.pname($_SESSION['acttab'],FALSE)." WHERE `Field`='".$col."'";
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
$res.='<title>Access MySqli v'.$GLOBALS['VERSION'].'</title>';
$res.=<<<'EOT'
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
	<path d="M 34.05,27.75 L 27.75,34.05 L 65.95,72.25 L 72.25,65.95 Z" fill="#FFFFFF"></path></svg>&nbsp;&nbsp;&nbsp;<span style="color:red;font-weight:bold;position:relative;top:-10px">ERROR!</span>
	</div><br>
	<div style="overflow:auto;height:130px">
EOT;
$res.=$error;
$res.=<<<'EOT'
	</div>
	<div style="height:50px;">Click OK to close:<button type="button" style="cursor:pointer;position:relative;top:-5px;float:right;margin-right:25px;color:#FFFFFF;background-color:#CC8D00;width:75px;font-size:18px;" onclick="close_error('0')">OK</button></div>
	</div></div>
	<script>
	function close_error(arg){
		window.location.href="access_mysqli.php";
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
$res.='<title>Access MySqli v'.$GLOBALS['VERSION'].'</title>';
$res.=<<<'EOT'
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
	<path d="M 50,47 L 60,47 L 60,90 L 50,90 Z" fill="#FFFFFF"></path></svg>&nbsp;&nbsp;&nbsp;<span style="color:blue;font-weight:bold;position:relative;top:-10px">INFO</span></div><br>
	<div style="overflow:auto;height:130px">
EOT;
$res.=$text;
$res.=<<<'EOT'
</div>
	<div style="height:50px;">Click OK to close:<button type="button" style="cursor:pointer;position:relative;top:-5px;float:right;margin-right:25px;color:#FFFFFF;background-color:#CC8D00;width:75px;font-size:18px;" onclick="close_info(1)">OK</button></div>
	</div></div>
	<script>
	function close_info(arg){
		window.location.href="access_mysqli.php";
	}
	</script>
</body>
</html>
EOT;
 return $res;
}
//*Functions
//Before output (AJAX)
if ($_GET['act']=='get_contents'){
	$res=array();
	$ok=0;
	if (isset($_SESSION['myorder'])) $orderar=$_SESSION['myorder'];
		if (!isset($orderar)||!is_array($orderar)) $orderar=array();
		$ok1=FALSE;
		$orderQ=' ';
		for ($k=0;$k<count($orderar);$k+=2){
			$orderQ.=pname($orderar[$k],FALSE).' '.$orderar[$k+1];
			if ($k<count($orderar)-2) $orderQ.=', ';
			$ok1=TRUE;
		}
		if ($ok1===TRUE) $orderQ=' ORDER BY'.$orderQ;
		$sql="SELECT * FROM ".pname($_SESSION['acttab'],FALSE).$orderQ;
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
		$sql='SHOW FIELDS FROM '.pname($_SESSION['acttab'],FALSE);
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
	$_SESSION['acttab']=$_POST['tbl'];
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
	$k=htmlspecialchars($_SESSION['acttab']);
	$sql='DROP TABLE '.pname($_SESSION['acttab'],FALSE);
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
	if (!isset($_SESSION['myorder'])||$_SESSION['myorder']==''||$_SESSION['myorder']==0||$_SESSION['myorder']==FALSE){
		$res['all']='nimic';
	}
	else $res['all']=$_SESSION['myorder'];
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
		$_SESSION['myorder']=$ord;
		$res['stat']='success';
	}
	}
	else {
		unset($_SESSION['myorder']);
		$res['stat']='success';
	}
	echo encodeJsonSafe($res);
	die();
}
if ($_GET['act']=='change_columns_order'){
	$res=array();
	$sql='ALTER TABLE '.pname($_SESSION['acttab'],FALSE).' MODIFY '.pname($_POST['cine'],FALSE).' '.$_POST['cumECine'].' ';
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
	$sql='ALTER TABLE '.pname($_SESSION['acttab'],FALSE).' ADD '.pname($_POST['name'],FALSE).' '.$_POST['type'].' ;';
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
		$sql='ALTER TABLE '.pname($_SESSION['acttab'],FALSE).' DROP COLUMN '.pname($_POST['column'],FALSE).' ;';
		if (mysqli_query($conn,$sql)){
			if (isset($_SESSION['myorder'])&&is_array($_SESSION['myorder'])){
			for ($i=0;$i<count($_SESSION['myorder']);$i+=2){
				if ($_SESSION['myorder'][$i]==$_POST['column']){
					array_splice($_SESSION['myorder'],$i,2);
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
	$sql='SHOW FIELDS FROM '.pname($_SESSION['acttab'],FALSE)." WHERE Field='".prepare($_POST['oldName'])."';";
	$result=mysqli_query($conn,$sql);
			if ($result!==FALSE&&mysqli_num_rows($result)>0){
				$row=mysqli_fetch_assoc($result);
				$sql='ALTER TABLE '.pname($_SESSION['acttab'],FALSE).' MODIFY '.pname($_POST['oldName'],FALSE).''.$row['Type'];
				mysqli_query($conn,$sql);
			}
	$sql='SHOW INDEX FROM '.pname($_SESSION['acttab'],FALSE)." WHERE Column_name='".prepare($_POST['oldName'])."';";
			$result=mysqli_query($conn,$sql);
			if ($result!==FALSE&&mysqli_num_rows($result)>0){
				while($row=mysqli_fetch_assoc($result)){
			$sql='ALTER TABLE '.pname($_SESSION['acttab'],FALSE).' DROP INDEX '.pname($row['Key_name']);
			mysqli_query($conn,$sql);}}
	$sql='ALTER TABLE '.pname($_SESSION['acttab'],FALSE).' CHANGE COLUMN '.pname($_POST['oldName'],FALSE).' '.pname($_POST['newName'],FALSE).' '.$_POST['newDataType'].' ;';
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
	$sql='DELETE FROM '.pname($_SESSION['acttab'],FALSE).' WHERE 1=1 ';
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
	$sql="INSERT INTO ".pname($_SESSION['acttab'],FALSE)." () VALUES();";
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
		$sql="SELECT * FROM ".pname($_SESSION['acttab'],FALSE)." WHERE ".pname($primary,FALSE)."=LAST_INSERT_ID()";
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
	$sql="SHOW FIELDS FROM ".pname($_SESSION['acttab'],FALSE);
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
	$sql="INSERT INTO ".pname($_SESSION['acttab'],FALSE)." (".$colCsv.") VALUES(".$valuesCsv.");";
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
		$sql="SELECT * FROM ".pname($_SESSION['acttab'],FALSE)." WHERE ".pname($primary,FALSE)."=LAST_INSERT_ID()";
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
	$sql='UPDATE '.pname($_SESSION['acttab'],FALSE).' SET '.pname($pack['columns'][$pack['column']],FALSE)."=".$newText." WHERE 1=1";
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
				$sql="SELECT * FROM ".pname($_SESSION['acttab'],FALSE)." WHERE CAST(".pname($pack['primary'],FALSE)." AS CHAR CHARACTER SET utf8 ) COLLATE utf8_bin =CAST('".prepare($pack['rowNumber'])."' AS CHAR CHARACTER SET utf8) COLLATE utf8_bin";
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
	$sql="RENAME TABLE ".pname($_SESSION['acttab'],FALSE).' TO '.pname($_POST['newName'],FALSE);
	if (mysqli_query($conn,$sql)===FALSE)
	{
		$res['stat']='fail';
		$res['error']=htmlspecialchars(mysqli_error($conn));
	}
	else{
		$_SESSION['acttab']=$_POST['newName'];
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
	$sql="CREATE TABLE ".$newName." LIKE ".pname($_SESSION['acttab'],FALSE);
	if (mysqli_query($conn,$sql)===FALSE)
	{
		$res['stat']='fail';
		$res['error']=htmlspecialchars(mysqli_error($conn));
	}
	else{
		$sql="INSERT INTO ".$newName." SELECT * FROM ".pname($_SESSION['acttab'],FALSE);
		if (mysqli_query($conn,$sql)===FALSE)
	{
		$res['stat']='fail';
		$res['error']=htmlspecialchars(mysqli_error($conn)).'<br>'.'<span style="color:red">The new table has been created, but the content could not be copied.</span>';
	}
	else{
		$res['stat']='success';
	}
	}
	echo encodeJsonSafe($res);
	die();
}
//*COPY TABLE
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
	width:15%;
	padding-left:15px;
	padding-right:15px;
	vertical-align:middle;
	text-align:center;
	font-family: "Brush Script MT",cursive;
	font-size:20px;
	color:#0000EE;
}
.brush_mt{
	font-family: "Brush Script MT",cursive;
}
#search{
	background-color:#FFFFFF;
	border-radius:5px;
	width:400px;
	height:30px;
	text-align:left;
	padding-left:5px;
	margin:0px;
	position:relative;top:0px;left:0px;
}
#searchbar{
	position:relative;
	top:1px;
	width:360px;
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
	font-family: Arial,"Helvetica Neue",Helvetica,sans-serif;
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
</head>
<body>
<?php enc_build()?>
<div id="top">
<table style="width:100%;height:100%">
<tr style="width:100%">
<td id="banner">
Access MySqli <br>
Version <?php echo $VERSION;?>
</td>
<td style="width:25%;padding-left:10px;padding-right:10px;padding-top:10px;;vertical-align:text-top;" id="search_db_td">
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
<span class="pseudo_link" onclick="advancedSearch(1)" id="advsrclink" style="float:right;">Search settings</span>
</div>
<div id="advsrc" my_state="0">
<div style="position:absolute;right:7px;top:2px;">
<span onclick="advancedSearch(0)" class="pseudo_link closing" title="Close">x</span>
</div>
<span style="font-weight:bold">Match:</span><br>
<input type="radio" class="radI" name="matchcr" id="radExact" value="ex">Exact cell</input><br>
<input type="radio" class="radI" name="matchcr" id="radCnt" value="cnt" checked="true">Contains</input><br>
<input type="radio" class="radI" name="matchcr" id="radBgn" value="bgn">Begins with</input><br>
<input type="radio" class="radI" name="matchcr" id="radEnd" value="end">Ends with</input><br>
<input type="radio" class="radI" name="matchcr" id="radWrd" value="wrd">Word</input><br>
<input type="radio" class="radI" name="matchcr" id="radRg" value="rg">RegEx (only RegEx, without &quot;/&quot; or i,g etc.)</input><br><br>
<span style="font-weight:bold">Show only rows containing results: </span><input type="checkbox" class="chkbox" name="onlyRows" id="onlyRows"><br><br>
<span style="font-weight:bold">Match lower/UPPERcase </span><input type="checkbox" checked="true" class="chkbox" name="minMaj" id="minMaj"><br><br>
<table><tr><td style="vertical-align:text-top;padding-right:10px;text-align:center;"><span style="font-weight:bold">Search on columns:<br>
<button type="button" class="butCols" onclick="allCols()" style="margin-bottom:10px;margin-top:4px;">All columns</button><br>
<button type="button" class="butCols" onclick="noCol()">No column</button>
</span></td><td><span id="selectCols"></span></td></tr></table>
<div style="font-size:14px;"><span style="font-weight:bold">Note:</span> The first three settings are kept until page refresh and the column search options until table edits.</div>
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
<div id="db_and_table" style="border:solid 1px #BDC2CC;border-radius:5px;height:60px;width:400px;"><table><tr><td>
<div style="margin-top:5px;padding-left:20px;width:260px;white-space:nowrap;text-overflow:ellipsis;overflow-x:hidden;">Current database: <span title="<?php echo htmlspecialchars($_SESSION['actdb']);?>" style="font-weight:bold;"><?php echo htmlspecialchars($_SESSION['actdb']);?></span></div>
<div style="padding-left:20px;margin-top:5px;" id="table_sel">Current table:
<?php
echo create_table_scrollbar($conn);
?></div>
</div></td><td style="padding-top:5px;padding-left:12px;"><span title="Change database">
<?php echo create_logout_button(TRUE,'width:40px;height:40px;cursor:pointer;','logoutdb()');?></span>
</td><td style="padding-left:12px;padding-top:5px;"><span title="Log out"><?php echo create_logout_button(FALSE,'width:40px;height:40px;cursor:pointer;','logout()');?></span>
</td></tr></table>
</td>
<td style="width:60%;vertical-align:top;padding-top:3px;padding-left:5px;padding-right:5px;border-radius:10px;" id="table_html_td">
<div style="text-align:center;border:solid 1px #BDC2CC;border-radius:5px;height:60px;">
<div id="act_tabel_buttons">
<div style="font-weight:bold;margin-bottom:2px;">Table actions:</div>
<?php
if(!(isset($GLOBALS['DEFAULTDBS'])&&isset($GLOBALS['DEFAULTDBS']['tables'][$_SESSION['actdb']])&&$GLOBALS['DEFAULTDBS']['tables'][$_SESSION['actdb']]!==NULL)){
 echo '<span title="Create table">'.create_plus_button("ge_cr('tbl2')",'width:35px;height:35px;').'</span>'.str_repeat('&nbsp;',5).'<span title="Delete table">'.create_x_button('droptbl()','width:35px;height:35px;').'</span>'.str_repeat('&nbsp;',5);
 echo '<span title="Rename table">'.create_rename_logo("create_rename_table()",'width:39px;height:35px;cursor:pointer').str_repeat('&nbsp;',5);
echo '<span title="Copy table">'.create_double_table_logo("create_copy_table()",'width:35px;height:35px;cursor:pointer').str_repeat('&nbsp',5);
}
echo '<span title="Order">'.create_order_logo("createOrder()",'width:35px;height:35px;cursor:pointer',TRUE).'</span>'.str_repeat('&nbsp;',5);
echo '<span title="Backup database/tables">'.create_download_logo("create_backup()",'width:35px;height:35px;cursor:pointer').str_repeat('&nbsp;',5);
echo '<span title="Import database/tables">'.create_upload_logo("create_upload()",'width:35px;height:35px;cursor:pointer').str_repeat('&nbsp;',5);
?>
</div>
<div id="act_search_buttons" style="display:none">
<div style="font-weight:bold;margin-bottom:2px;">Search actions:</div>
<?php
echo '<span title="Back">'.create_home_logo("closeSearch()",'width:45px;height:31.5px;cursor:pointer').'</span>'.str_repeat('&nbsp;',2);
echo '<span title="Show only rows containing results" id="eye_button_span">'.create_view_logo("showResults(1)",'width:45px;height:31.5px;cursor:pointer').'</span>'.str_repeat('&nbsp;',2);
echo '<span title="Order">'.create_order_logo("createOrder()",'width:35px;height:35px;cursor:pointer',TRUE).'</span>';?>
</div>
</div>
</div><div style="height:5px;"></div><table style="width:100%"><tr><td style="width:90%">
<!--HTML edit-->
<div style="text-align:center;border:solid 1px #BDC2CC;border-radius:5px;height:53px;position:relative;" tabindex="2" id="editHtmlDiv" onmousedown="htmlEditor.focusedDiv(event)">
<button class="htmlToggle" id="htmlBold" onclick="htmlEditor.bold(this)" style="font-weight:700;" title="Bold">B</button>
<button class="htmlToggle" id="htmlItalic" onclick="htmlEditor.italic(this)" style="font-style:italic;font-weight:bold;" title="Italic">I</button>
<button class="htmlToggle" id="htmlUnder" onclick="htmlEditor.under(this)" style="text-decoration:underline;font-weight:bold;" title="Underline">U</button>
<div style="display:inline;position:relative;"><button class="htmlToggle" onclick="htmlEditor.link()" style="text-decoration:underline;font-weight:bold;" title="Add link">Link</button>
<div id="linkPanel" class="htmlEditPanel" style="height:150px;padding-top:0px;left:-125px;width:300px;"><br>
<div class="input_container"><input type="text" id="htmlLink" myval="Link address" value="Link address" class="input_element"></input></div>
<a href="javascript:htmlEditor.followLink()" style="float:left;margin-left:50px;position:">Follow link</a><br>
<div class="input_container" style="position:relative;top:5px;"><input type="text" id="htmlLinkText" myval="Link text" value="Link text" class="input_element"></input></div>
<button class="htmlToggle" onclick="htmlEditor.linkSave()" style="font-weight:bold;position:relative;top:15px;" title="Add link">Add link</button>
</div></div>
<select onchange="htmlEditor.color()" id="htmlColor" title="Text color" class="htmlSelect"><option value="rgb(0, 0, 0)">Black</option><option value="rgb(255, 0, 0)">Rosu</option><option value="rgb(0, 0, 255)">Blue</option><option value="rgb(0, 255, 0)">Green</option><option value="rgb(255, 255, 0)">Yellow</option><option value="rgb(0, 0, 238)">Link color</option></select>
<select onchange="htmlEditor.dim()" id="htmlDim" title="Text size" class="htmlSelect" value="3"><option value="2">Small</option><option value="3">Normal</option><option value="5">Big</option><option value="7">Huge</option></select>
<div style="display:inline;position:relative;"><button class="htmlToggle" onclick="htmlEditor.list()" style="font-weight:bold;" title="Add list">List</button>
<div id="listPanel" class="htmlEditPanel" ><button class="htmlToggle" id="htmlOl" onclick="htmlEditor.ol()" style="font-weight:bold;" title="Ordered list">Ordered</button><br>
<button class="htmlToggle" id="htmlUl" onclick="htmlEditor.ul()" style="font-weight:bold;" title="Unordered list">Unordered</button></div></div>
<div style="display:inline;position:relative;"><button class="htmlToggle" onclick="htmlEditor.align()" style="font-weight:bold;" title="Align">Align</button>
<div id="alignPanel" class="htmlEditPanel" style="height:100px;padding-top:0px;left:-15px;"><button class="htmlToggle" id="htmlLeft" onclick="htmlEditor.left()" style="font-weight:bold;" title="Left">Left</button><br>
<button class="htmlToggle" id="htmlCenter" onclick="htmlEditor.center()" style="font-weight:bold;" title="Center">Center</button><br>
<button class="htmlToggle" id="htmlRight" onclick="htmlEditor.right()" style="font-weight:bold;" title="Right">Right</button>
</div></div>
<div id="editHTMLMask" style="position:absolute;top:0px;left:0px;width:100%;height:100%;border-radius:inherit;background-color:#FFFFFF;opacity:0.5;" onclick="gen_info('To use this function, activate HTML edit from Settings<br>NOTE: It works only on text columns.')"></div>
</div>
<!-- *HTML edit-->
</td>
<td style="text-align:right;"><?php echo create_pquery_button('height:35px;width:70px;');?></td></tr></table>
</td>
<td id="settings_td" style="border-radius:10px;"><div><span title="Settings"><?php echo create_settings_logo('gen_settings()','width:50px;height:50px;cursor:pointer;',TRUE)?></span></div>
<div style="padding-top:10px;" title="New row">
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
		else alert('Insert a valid link!');
	},
	linkSave:function(){
		var lnk=htmlEditor.buildLink();
		if (lnk.adr!=false){
		var linkHtml='<a href="'+lnk.adr+'">'+lnk.txt+'</a>';
		htmlEditor.restoreSelection();
		document.execCommand('insertHTML',false,linkHtml);
		htmlEditor.link();
		}
		else alert('Insert a valid link!');
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
	var cooky=getCookie('mysettings');
	if (!(typeof cooky =='undefined'||cooky==""||cooky==null)){
	settings=JSON.parse(cooky);
	}
	else settings=JSON.parse('<?php echo escapenl(addslashes(json_encode($DEFAULTSET)));?>');
	getContents();
});
function getContents(){
document.getElementsByTagName('body')[0].createPreloader();
	$.get('access_mysqli.php?act=get_contents&ajax=true',function(result){
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
		cnt+='<th id="col'+i+'" style="cursor:move;"><table border="0" style="margin-left:auto;margin-right:auto;"><td title="Delete column"><svg viewBox="0 0 100 100" style="width:15px;height:15px;cursor:pointer;position:relative;top:2px;" onclick="deleteColumn('+i+')">\
	<path d="M 83.34,93.69 L 50,60.35 L 16.66,93.69 L 6.31,83.34 L 39.65,50 L 6.31,16.66 L 16.66,6.31 L 50,39.65 L 83.34,6.31 L 93.69, 16.66 L 60.35,50 L 93.69,83.34 Z" fill="#FF0000" stroke="#FFFFFF" stroke-width="2" onmouseover="this.setAttribute(\'fill\',\'#FF2423\')" onmouseout="this.setAttribute(\'fill\',\'#FF0000\')" />\
	</svg></td><td>'+htmlspecialchars(tot['columns'][i])+'</td><td title="Edit column"><svg viewBox="0 0 300 500" onclick="createAddChangeColumn(1,'+i+')" style="width:15px;height:25px;cursor:pointer;">\
	<path d="M 27.78,351.26 L 177.78,45.47 L 264.59,88.05 L 114.59,393.84 Z" fill="#FFD753"/>\
	<path d="M 27.78,351.26 L 114.59,393.84 L 59.09,440.48 L 24.86,423.68 Z" fill="#FFEDB8"/>\
	<path d="M 59.09,440.48 L 24.86,423.68 L 22.96,470.84 Z" fill="#000000"/>\
	</svg></td></table></th>';
	}
	cnt+='<td id="addColumnTd" style="vertical-align:middle;"><span title="New column" style="width:30px;height:30px;position:relative;top:1px;"><?php echo escapenl(addslashes(create_plus_button('createAddChangeColumn(0,0)','width:30px;height:30px;'))); ?></span></td>';
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
			cnt+='<td class="tableCell '+tabCellType+'"><div class="cell" my_html="yes" onpaste="pastePaste(this)" '+additionalStyle+contentEditable+' id="cell'+i+';'+j+'"></div></td>';}
			else
				cnt+='<td class="tableCell '+tabCellType+'"><div class="cell" onpaste="pastePaste(this)" '+additionalStyle+contentEditable+' id="cell'+i+';'+j+'"></div></td>';
			}
			else{ if (settings['editHTML']=="1"&&(tot['data-types'][j].toUpperCase()=='TEXT'||tot['data-types'][j].toUpperCase()=='TINYTEXT'||tot['data-types'][j].toUpperCase()=='MEDIUMTEXT'||tot['data-types'][j].toUpperCase()=='LONGTEXT')){
			cnt+='<td class="tableCell '+tabCellType+'"><div class="cell" onpaste="pastePaste(this)" my_html="yes" '+additionalStyle+contentEditable+' id="cell'+i+';'+j+'">'+tot['rows'][i][0][tot['columns'][j]]+'</div></td>';}
			else
			cnt+='<td class="tableCell '+tabCellType+'"><div class="cell" onpaste="pastePaste(this)" '+additionalStyle+contentEditable+' id="cell'+i+';'+j+'">'+prepareToShow(tot['rows'][i][0][tot['columns'][j]])+'</div></td>';}
		}
		cnt+='<td style="vertical-align:middle">&nbsp;<span title="Delete row" style="height:20px;width:20px;position:relative;top:1px;cursor:pointer;" onclick="delRow('+i+')"><?php echo escapenl(addslashes(create_x_button(FALSE,'width:20px;height:20px;'))); ?></span>&nbsp;&nbsp;<span title="Duplicate row" style="height:20px;width:20px;position:relative;top:1px;cursor:pointer;" onclick="doubleRow('+i+')"><?php echo escapenl(addslashes(create_double_row_logo('width:40px;height:20px;'))); ?></span></td></tr>';
	}
	cnt+='</table>';
	$('#main_table').html(cnt);
	$('#rows_counter').html('<span title="Rows count: '+tot['rows'].length+'">Rows count: <span class="row_cnt">'+tot['rows'].length+'</span></span>');
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
		$.post('access_mysqli.php?act=change_columns_order',{cine:tot['columns'][mutat],
		cumECine:tot['data-types'][mutat],primul:primul,dupaCine:tot['columns'][dupaCine]},
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
	$.post('access_mysqli.php?act=set_acttab&ajax=true',{tbl:tb},function(result){
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
		<a href="javascript:closeOrder()" class="closing" style="font-size:26px;position:absolute;right:20px;top:10px;" title="Close">x</a>\
		<div style="height:30px;">\
		<?php echo escapenl(addslashes(create_order_logo(FALSE,'height:50px;width:50px;margin-left:20px;',FALSE)))?>\
		&nbsp;&nbsp;&nbsp;<span style="font-weight:bold;position:relative;top:-13px;font-size:22px;">ORDER</span>\
		</div><br>\
		<div style="padding-left:20px;padding-top:20px;" id="addordercon"><span style="font-size:18px;position:relative;top:-10px;">Add order key: </span><select id="addorder" style="position:relative;top:-10px;border-radius:5px;border:solid #999 1px;max-width:200px;background-color:#FFFFFF;">';
		inne+='</select>&nbsp; <span title="Add key">\
		<?php echo escapenl(addslashes(create_plus_button('addOrderCr()','width:35px;height:35px;'))); ?>\
		</span></div>\
		<ul style="list-style-type:none;overflow:auto;height:420px;margin-bottom:5px;padding:20px;margin-top:0px;" id="orderMain"></ul>\
		<div style="height:50px;padding-left:150px">Click OK to save:<button type="button" style="cursor:pointer;position:relative;top:-5px;float:right;margin-right:25px;color:#FFFFFF;background-color:#CC8D00;width:75px;font-size:18px;" onclick="saveOrder()">OK</button></div>\
		</div>';
		conerdiv.innerHTML=inne;
		if (document.getElementsByTagName('body')[0].getElementsByClassName('orderdiv').length==0){
			document.getElementsByTagName('body')[0].appendChild(conerdiv);
		}
		var ordm=document.getElementById('orderMain');
		ordm.createPreloader();
		$.get('access_mysqli.php?act=getorder&ajax=true',function(result){
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
					<select style="cursor:auto;" id="selectorder'+i+'" class="orderselect" onchange="orderChgVal(this)"><option value="ASC">ASC</option><option value="DESC">DESC</option></select>&nbsp;&nbsp;</td><td>'+'<span style="cursor:pointer;" title="Delete key" onclick="rmOrderCr('+i+')" id="orderspan'+i+'"><?php echo escapenl(prepare(create_x_button(FALSE,'width:30px;height:30px;')));?></span>'+'</td></tr>\
					</table></li>';
				}
				intm+='<br>';
				ordm.innerHTML=intm;
				for (var i=0;i<order.length;i+=2){
					$('#selectorder'+i).val(order[i+1]);
				}
				}
				else{ intm+='No order key.';
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
	gen_prompt('closeOrder2(1)','Do you really want to close?<br>Changes will be lost!');
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
	$.post('access_mysqli.php?act=saveorder&ajax=true',{order:order},function(result){
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
		<a href="javascript:closeSettings()" class="closing" style="font-size:26px;position:absolute;right:20px;top:10px;" title="Close">x</a>\
		<div style="height:30px;">\
		<?php echo escapenl(addslashes(create_settings_logo(FALSE,'height:50px;width:50px;margin-left:20px;',FALSE)))?>\
		&nbsp;&nbsp;&nbsp;<span style="font-weight:bold;position:relative;top:-13px;font-size:22px;">SETTINGS</span>\
		</div><br>\
		<div style="height:470px;padding:20px;padding-left:50px;">\
		<table style="width:100%">\
		<tr><td style="width:75%"><h3>HTML edit</h3></td><td style="width:60px;"><div style="cursor:pointer;background-color:#847AFF;position:relative;width:50px;height:25px;border-radius:5px;border:solid #4D4694 2px;" id="settingsEditHTML" onclick="slideSwitch(this)" value="0"><div id="settingsEditHTMLIn" style="position:absolute;top:0px;left:0px;width:25px;height:25px;border-radius:3px;background-color:#FFFFFF;text-align:center;"><span style="font-size:12px;position:relative;top:2px;left:-1px;color:#4D4694;">OFF</span></div></div></td><td style="text-align:left;"><?php create_info_logo("gen_info(\\'Enables text formating tool, only for &amp;quot;text&amp;quot; columns.\\')",'width:30px;height:30px;cursor:pointer;');?></td></tr>\
		<tr><td style="width:75%"><h3>Advanced edit</h3></td><td style="width:60px;"><div style="cursor:pointer;background-color:#847AFF;position:relative;width:50px;height:25px;border-radius:5px;border:solid #4D4694 2px;" id="settingsEditADV" onclick="slideSwitch(this)" value="0"><div id="settingsEditADVIn" style="position:absolute;top:0px;left:0px;width:25px;height:25px;border-radius:3px;background-color:#FFFFFF;text-align:center;"><span style="font-size:12px;position:relative;top:2px;left:-1px;color:#4D4694;">OFF</span></div></div></td><td style="text-align:left;"><?php create_info_logo("gen_info(\\'For advanced users: you can insert MySql functions; the edited text must be placed between simple quotes &amp;#40;&amp;#39;&amp;#41;.\\')",'width:30px;height:30px;cursor:pointer;');?></td></tr>\
		<tr><td style="width:75%"><h3>Show truncated cell content, except for the current edited cell</h3></td><td style="width:60px;"><div style="cursor:pointer;background-color:#847AFF;position:relative;width:50px;height:25px;border-radius:5px;border:solid #4D4694 2px;" id="settingsEditDimension" onclick="slideSwitch(this)" value="0"><div id="settingsEditDimensionIn" style="position:absolute;top:0px;left:0px;width:25px;height:25px;border-radius:3px;background-color:#FFFFFF;text-align:center;"><span style="font-size:12px;position:relative;top:2px;left:-1px;color:#4D4694;">OFF</span></div></div></td><td style="text-align:left;"><?php create_info_logo("gen_info(\\'The table cells are small when not selected (not clicked inside) for simpler navigation. Some of the text in cells may not be shown.\\')",'width:30px;height:30px;cursor:pointer;');?></td></tr>\
		<tr><td style="width:75%"><h3>Use &quot;&#36;&quot symbol for current date</h3></td><td style="width:60px;"><div style="cursor:pointer;background-color:#847AFF;position:relative;width:50px;height:25px;border-radius:5px;border:solid #4D4694 2px;" id="settingsEditDate" onclick="slideSwitch(this)" value="0"><div id="settingsEditDateIn" style="position:absolute;top:0px;left:0px;width:25px;height:25px;border-radius:3px;background-color:#FFFFFF;text-align:center;"><span style="font-size:12px;position:relative;top:2px;left:-1px;color:#4D4694;">OFF</span></div></div></td><td style="text-align:left;"><?php create_info_logo("gen_info(\\'On &amp;#40;DATE&amp;#41; columns, the &amp;quot;&amp;#36;&amp;quot; character inserted alone in the cell sets its value to current server date.\\')",'width:30px;height:30px;cursor:pointer;');?></td></tr>\
		<tr><td style="width:75%"><h3>Use &quot;&#36;&quot symbol for current time</h3></td><td style="width:60px;"><div style="cursor:pointer;background-color:#847AFF;position:relative;width:50px;height:25px;border-radius:5px;border:solid #4D4694 2px;" id="settingsEditTime" onclick="slideSwitch(this)" value="0"><div id="settingsEditTimeIn" style="position:absolute;top:0px;left:0px;width:25px;height:25px;border-radius:3px;background-color:#FFFFFF;text-align:center;"><span style="font-size:12px;position:relative;top:2px;left:-1px;color:#4D4694;">OFF</span></div></div></td><td style="text-align:left;"><?php create_info_logo("gen_info(\\'On &amp;#40;TIME&amp;#41; columns, the &amp;quot;&amp;#36;&amp;quot; character inserted alone in the cell sets its value to current server time.\\')",'width:30px;height:30px;cursor:pointer;');?></td></tr>\
		<tr><td style="width:75%"><h3>Use &quot;&#36;&quot symbol for current date and time</h3></td><td style="width:60px;"><div style="cursor:pointer;background-color:#847AFF;position:relative;width:50px;height:25px;border-radius:5px;border:solid #4D4694 2px;" id="settingsEditDateTime" onclick="slideSwitch(this)" value="0"><div id="settingsEditDateTimeIn" style="position:absolute;top:0px;left:0px;width:25px;height:25px;border-radius:3px;background-color:#FFFFFF;text-align:center;"><span style="font-size:12px;position:relative;top:2px;left:-1px;color:#4D4694;">OFF</span></div></div></td><td style="text-align:left;"><?php create_info_logo("gen_info(\\'On &amp;#40;DATETIME&amp;#41; columns, the &amp;quot;&amp;#36;&amp;quot; character inserted alone in the cell sets its value to current server date and time.\\')",'width:30px;height:30px;cursor:pointer;');?></td></tr>\
		</table></div>\
		<div style="height:50px;padding-left:150px;font-weight:bold;font-size:18px;">Click OK to save:<button type="button" style="cursor:pointer;position:relative;top:-5px;float:right;margin-right:25px;color:#FFFFFF;background-color:#CC8D00;width:75px;font-size:18px;" onclick="saveSettings()">OK</button></div>\
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
	gen_prompt('closeSettings2(1)','Do you really want to close?<br>Changes will be lost!');
}
function closeSettings2(arg){
	if (arg){ close_prompt();
arr=document.getElementsByTagName('body')[0].getElementsByClassName('settingsdiv');
		if (arr.length!=0){
			document.getElementsByTagName('body')[0].removeChild(arr[0]);
	}}
	else{
	wait(function(){
	window.location.href="access_mysqli.php";});
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
	setCookie('mysettings',setarrTxt,30);
	settings=JSON.parse(setarrTxt);
	closeSettings2(0);
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
	<a href="javascript:closeAddChangeColumn()" class="closing" style="font-size:24px;position:absolute;right:20px;top:10px;" title="Close">x</a>';
var txt;
if (arg1==0) txt='Create column';
else txt='Edit column '+htmlspecialchars(tot['columns'][arg2]);
	inner=inner+'<div><h3 style="text-align:center;">'+txt+'</h3></div>\
	<br id="crbr">\
	<br><div style="padding-left:50px">Insert column name:<br><br>\
	<div style="margin-left:10px;background-color:#FFFFFF;border-radius:5px;width:250px;padding-left:5px;height:25px;"><input type="text" id="newcolname" style="margin-top:2px;height:19px;border:none;width:245px;"></input></div></div>\
	<br><div style="padding-left:50px">Choose column data type:<br><br>\
	<select onchange="newdatashow(this)" style="border-radius:5px;color:#FFFFFF;background-color:#CC8D00;font-size:14px;" id="newdatatye"><option value="int unique key auto_increment">Autoincrement</option>\
	<option value="int">int</option>\
	<option value="float">float</option>\
	<option value="text">text</option>\
	<option value="date">date</option>\
	<option value="0">Other</option>\
	</select></div>\
	<br><div style="padding-left:50px;display:none;" id="newdatadiv">Insert data type:<br><br>\
	<div style="margin-left:10px;background-color:#FFFFFF;border-radius:5px;width:250px;padding-left:5px;height:25px;"><input type="text" id="newdatatype2" style="margin-top:2px;height:19px;border:none;width:245px;"></input></div>\
	</div>\
';

inner=inner+'<div style="height:50px;position:absolute;bottom:0px;right:10px;width:350px;">Click OK to save:<button type="button" style="cursor:pointer;position:relative;top:-5px;float:right;margin-right:25px;color:#FFFFFF;background-color:#CC8D00;width:75px;font-size:18px;" onclick="sendAddChangeColumn('+arg1+','+arg2+')">OK</button></div>\
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
		$.post('access_mysqli.php?act=addCol&ajax=true',{name:coln,type:dt},function(result){
			active--;
			document.getElementById('addChangeColumnInter').removePreloader();
			var ree=JSON.parse(result);
			if (ree['stat']=='con_err') gen_error(ree['con_err']);
			if (ree['stat']=='fail') gen_error(ree['error']);
			if (ree['stat']=='success') gen_info('Column '+htmlspecialchars(coln)+' has been created.',0);
		});
	}
	if (arg1==1){
		$.post('access_mysqli.php?act=editCol&ajax=true',{oldName:tot['columns'][arg2],newName:coln,newDataType:dt},
		function(result){
			active--;
			document.getElementById('addChangeColumnInter').removePreloader();
			var ree=JSON.parse(result);
			if (ree['stat']=='con_err') gen_error(ree['con_err']);
			if (ree['stat']=='fail') gen_error(ree['error']);
			if (ree['stat']=='success'){
				closeAddChangeColumn();
				gen_info('Edit done.',0);
			}
		});
	}
	});
}
function deleteColumn(arg){
	gen_prompt('deleteColumn2('+arg+')','Do you really want to delete column '+htmlspecialchars(tot['columns'][arg])+'?');
}
function deleteColumn2(arg){
	wait(function(){
		document.getElementsByClassName('promptdivcont')[0].createPreloader();
		$('#act_tabel_buttons').css('display','');
		$('#act_search_buttons').css('display','none');
		pendingSearch=null;
		active++;
			$.post('access_mysqli.php?act=drop_column&ajax=true',{column:tot['columns'][arg],check:'DA'},function(result){
				active--;
				document.getElementsByClassName('promptdivcont')[0].removePreloader();
				close_prompt();
				var ree=JSON.parse(result);
				if (ree['stat']=='con_err') gen_error(ree['con_err']);
				if (ree['stat']=='fail') gen_error(ree['error']);
				if (ree['stat']=='success'){ gen_info('Column '+htmlspecialchars(tot['columns'][arg])+' has been removed.',0);
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
	$.post('access_mysqli.php?act=delete_row&ajax=true',{check:'DA',packet:packedPacket},function(result){
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
		</svg>&nbsp;&nbsp;&nbsp;<span style="color:#FFB800;font-weight:bold;position:relative;top:-10px">CONFIRM</span>\
		</div><br>\
		<div style="overflow:auto;height:130px">Do you really want to delete the selected row?</div>\
		<div style="height:50px;"><button type="button" style="cursor:pointer;position:relative;top:-5px;left:40px;color:#FFFFFF;background-color:#CC8D00;width:75px;font-size:18px;" onclick="delRow2('+row+')">YES</button><button type="button" style="cursor:pointer;position:relative;top:-5px;left:103px;color:#FFFFFF;background-color:#CC8D00;width:75px;font-size:18px;" onclick="close_del_prompt('+row+')">NO</button></div>\
		</div>';
		if (document.getElementsByTagName('body')[0].getElementsByClassName('promptdiv').length==0){TERGERE_RAND
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
	$.post('access_mysqli.php?act=new_row&ajax=true',{columns: JSON.stringify(tot['columns'])},function(result){
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
		$.post('access_mysqli.php?act=double_row&ajax=true',{packet: JSON.stringify(packet)},function(result){
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
txt=txt.replace(/\n/ig,'<br>');
txt=txt.replace(/\040\040/ig,function(match){
	return ' &nbsp';
});
txt=txt+'<br type="_moz">';
return txt;
}
function pastePaste(div){
setTimeout(function(){
div.innerHTML=textToHtml(htmlToText(div.innerHTML));
},1);
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
	$.post('access_mysqli.php?act=updateCell&ajax=true',{packet:packedPacket},function(result){
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
  if (currentFocusedCell!=null||active!=0) return 'Some changes are not saved. Do you really want to leave?';
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
$('#eye_button_span').attr('title',"Show only rows containing results");
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
	$('#rows_counter').html('<span title="'+countRes+' results on '+countRow+' rows"><span class="row_cnt">'+countRes+'</span> results on <span class="row_cnt">'+countRow+'</span> rows</span>');
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
	$('#rows_counter').html('<span title="Rows count: '+tot['rows'].length+'">Rows count: <span class="row_cnt">'+tot['rows'].length+'</span></span>');
	pendingSearch=null;
	});
}
function showResults(arg){
	shaddowRun(document.getElementsByTagName('body')[0],function(){
if (arg){ $('tr[my_row_searched=NU]').css('display','none');
$('#eye_button').attr('onclick','showResults(0)');
$('#eye_button_span').attr('title',"Show all rows");
$('#eye_bar').css('display','none');
pendingSearch.rowsOnly=true;
}
else {
$('tr[my_row_searched=NU]').css('display','');
$('#eye_button').attr('onclick','showResults(1)');
$('#eye_button_span').attr('title',"Show only rows containing results");
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
	<a href="javascript:closeRenameTable()" class="closing" style="font-size:24px;position:absolute;right:20px;top:10px;" title="Close">x</a>\
	<div><h3 style="text-align:center;">Rename table '+htmlspecialchars($('#tabel_select').val())+'</h3></div>\
	<br id="crbr">\
	<br><div style="padding-left:50px">Insert new name:<br><br>\
	<div style="margin-left:10px;background-color:#FFFFFF;border-radius:5px;width:250px;padding-left:5px;height:25px;"><input type="text" id="renameTableNewName" style="margin-top:2px;height:19px;border:none;width:245px;"></input></div></div>\
	<div style="height:50px;position:absolute;bottom:0px;right:10px;width:350px;">Click OK to save:<button type="button" style="cursor:pointer;position:relative;top:-5px;float:right;margin-right:25px;color:#FFFFFF;background-color:#CC8D00;width:75px;font-size:18px;" onclick="sendRenameTable()">OK</button></div>\
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
	$.post('access_mysqli.php?act=rename_table&ajax=true',{newName: newName},function(result){
		active--;
		$('#renameTableInter').get(0).removePreloader();
		var ree=JSON.parse(result);
		if (ree['stat']=='con_err') gen_error(ree['con_err']);
		if (ree['stat']=='fail') gen_error(ree['error']);
		if (ree['stat']=='success'){
			gen_info('Rename done!',1);
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
	<a href="javascript:closeCopyTable()" class="closing" style="font-size:24px;position:absolute;right:20px;top:10px;" title="Close">x</a>\
	<div><h3 style="text-align:center;">Copy table '+htmlspecialchars($('#tabel_select').val())+'</h3></div>\
	<br id="crbr">\
	<br><div style="padding-left:50px">Insert new name:<br><br>\
	<div style="margin-left:10px;background-color:#FFFFFF;border-radius:5px;width:250px;padding-left:5px;height:25px;"><input type="text" id="copyTableNewName" style="margin-top:2px;height:19px;border:none;width:245px;"></input></div></div>\
	<br><div style="padding-left:50px"><input type="radio" style="cursor:pointer;" name="copyWhatDb" value="0" id="copyWhatDb0" checked="true" onchange="copyTableGetDbs()">In this database</input><br><br>\
	<input type="radio" style="cursor:pointer;" name="copyWhatDb" id="copyWhatDb1" value="1" onchange="copyTableGetDbs()">In other database</input><br><br>\
	<select id="copyWhatDbExact" style="border-radius:5px;color:#FFFFFF;background-color:#CC8D00;font-size:14px;display:none"></select>\
	</div>\
	<div style="height:50px;position:absolute;bottom:0px;right:10px;width:350px;">Click OK to save:<button type="button" style="cursor:pointer;position:relative;top:-5px;float:right;margin-right:25px;color:#FFFFFF;background-color:#CC8D00;width:75px;font-size:18px;" onclick="sendCopyTable()">OK</button></div>\
</div>';
cr.innerHTML=inner;
if (document.getElementsByClassName('create').length==0)
	document.getElementsByTagName('body')[0].appendChild(cr);
}
function copyTableGetDbs(){
	if ($('#copyWhatDb1').get(0).checked){
		$('#copyTableInter').get(0).createPreloader();
		active++;
		$.get('access_mysqli.php?act=db_option_list&ajax=true',function(result){
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
		$.post('access_mysqli.php?act=copy_table&ajax=true',{newName: newName,thisDb: isThisDb,dbName: dbName},function(result){
			active--;
			$('#copyTableInter').get(0).removePreloader();
			var ree=JSON.parse(result);
			if (ree['stat']=='con_err') gen_error(ree['con_err']);
			if (ree['stat']=='fail') gen_error(ree['error']);
			if (ree['stat']=='success'){
			gen_info('Copy done!',0);
		}
		});
	});
}
//*COPY TABLE
</script>
</body>
</html>
