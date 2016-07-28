/**
 * Created by vasiltsigov on 13.06.16 г..
 */

window.$ = window.jQuery = require('jquery')
require('bootstrap-sass');

$( document ).ready(function() {
    console.log($.fn.tooltip.Constructor.VERSION);
});