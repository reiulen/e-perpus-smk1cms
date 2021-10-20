"use strict";
var options = {};
    options.rules = {
        activated: {
            wordMaxLength: true,
            wordInvalidChar: true
        }
    };
    $(".pwstrength").pwstrength(options);