/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

var $jq = jQuery.noConflict();

$jq(document).ready(function () {
    $jq('#verpass').on('click', function () {
        if ($jq('#verpass').is(':checked')) {
            $jq('#AutoPass1').attr('type', 'text');
            $jq('#AutoPass2').attr('type', 'text');
        } else {
            $jq('#AutoPass1').attr('type', 'password');
            $jq('#AutoPass2').attr('type', 'password');
        }
    });
});