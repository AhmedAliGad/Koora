!function(e,a){"object"==typeof exports&&"undefined"!=typeof module?module.exports=a():"function"==typeof define&&define.amd?define(a):(e.__vee_validate_locale__et=e.__vee_validate_locale__et||{},e.__vee_validate_locale__et.js=a())}(this,function(){"use strict";var e;function u(e){return e.charAt(0).toUpperCase()+e.slice(1)}var a={name:"et",messages:{_default:function(e){return u(e)+" ei oma sobivat väärtust."},after:function(e,a){var t=a[0];return u(e)+" peab olema hiljem kui "+t+"."},alpha:function(e){return u(e)+" võib sisaldada ainult tähti."},alpha_dash:function(e){return u(e)+" võib sisaldada ainult tähti, numbreid, kriipse ja alakriipse."},alpha_num:function(e){return u(e)+" võib sisaldada ainult tähti ja numbreid."},alpha_spaces:function(e){return u(e)+" võib sisaldada ainult tähti ja tühikuid."},before:function(e,a){var t=a[0];return u(e)+" peab olema varem kui "+t+"."},between:function(e,a){var t=a[0],i=a[1];return u(e)+" peab jääma vahemikku "+t+" kuni "+i+"."},confirmed:function(e){return u(e)+" on kontrollist erinev."},credit_card:function(e){return u(e)+" ei oma sobivat väärtust."},date_between:function(e,a){var t=a[0],i=a[1];return u(e)+" peab olema vahemikus "+t+" kuni "+i+"."},date_format:function(e,a){var t=a[0];return u(e)+" peab olema kujul "+t+"."},decimal:function(e,a){void 0===a&&(a=[]);var t=a[0];return void 0===t&&(t="*"),u(e)+" peab olema number ja võib sisaldada "+("*"===t?"komakohta":t+" numbrit pärast koma")+"."},digits:function(e,a){var t=a[0];return u(e)+" peab koosnema täpselt "+t+"-st numbrist."},dimensions:function(e,a){var t=a[0],i=a[1];return u(e)+" peab olema "+t+" korda "+i+" pikslit suur."},email:function(e){return u(e)+" peab olema e-maili aadress."},excluded:function(e){return u(e)+" ei oma sobivat väärtust."},ext:function(e){return u(e)+" peab olema sobiv fail."},image:function(e){return u(e)+" peab olema pilt."},included:function(e){return u(e)+" ei oma sobivat väärtust."},ip:function(e){return u(e)+" peab olema IP-aadress."},max:function(e,a){var t=a[0];return u(e)+" ei tohi olla pikem kui "+t+" tähemärki."},max_value:function(e,a){var t=a[0];return u(e)+" peab olema "+t+" või väisem."},mimes:function(e){return u(e)+" peab olema sobivat tüüpi fail."},min:function(e,a){var t=a[0];return u(e)+" peab olema vähemalt "+t+" tähemärki pikk."},min_value:function(e,a){var t=a[0];return u(e)+" peab olema "+t+" või suurem."},numeric:function(e){return u(e)+" võib sisaldada ainult numbreid."},regex:function(e){return u(e)+" pole sobival kujul."},required:function(e){return u(e)+" on nõutud väli."},size:function(e,a){var t,i,n,r=a[0];return u(e)+" peab olema väiksem kui "+(t=r,i=1024,n=0==(t=Number(t)*i)?0:Math.floor(Math.log(t)/Math.log(i)),1*(t/Math.pow(i,n)).toFixed(2)+" "+["Byte","KB","MB","GB","TB","PB","EB","ZB","YB"][n])+"."},url:function(e){return u(e)+" peab olema URL."}},attributes:{}};return"undefined"!=typeof VeeValidate&&VeeValidate.Validator.localize(((e={})[a.name]=a,e)),a});