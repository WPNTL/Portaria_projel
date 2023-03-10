/* http://keith-wood.name/keypad.html
   brazilian portuguese initialisation for the jQuery keypad extension
   Written by Israel Rodriguez (yzraeu{at}gmail.com) July 2009. */
(function($) { // hide the namespace
    $.keypad.regional['pt_BR'] = {
        buttonText: '...', buttonStatus: 'Abrir o teclado',
        closeText: 'Fechar', closeStatus: 'Fechar o teclado',
        clearText: 'Login', clearStatus: 'Login webmail',
        backText: 'Apagar', backStatus: 'Apagar o caractere anterior',
        shiftText: 'Shift', shiftStatus: 'Ativar maiúsculas/minusculas',
        alphabeticLayout: $.keypad.qwertyAlphabetic,
        fullLayout: $.keypad.qwertyLayout,
        isAlphabetic: $.keypad.isAlphabetic,
        isNumeric: $.keypad.isNumeric,
        isRTL: false
    };
    $.keypad.setDefaults($.keypad.regional['pt_BR']);
})(jQuery);
