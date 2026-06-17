<?php

if (!function_exists('showValidationError')) {
    function showValidationError($fieldName, $validationErros) {
        if ($validationErros->has($fieldName)) {
            return '<div class="text-sm bold text-red-500">' .$validationErros->first($fieldName). '</div>';
        } else {
            return '';
        }
    };
}

if (!function_exists('showserverError')) {
    function showServerError() {
        if (session()->has('server_error')) {
            return '<div class="text-sm bold text-red-500">' .session()->get('server_error'). '</div>';
        } else {
            return '';
        }
    };
}