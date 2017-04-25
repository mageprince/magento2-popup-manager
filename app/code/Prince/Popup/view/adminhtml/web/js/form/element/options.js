define([
    'underscore',
    'uiRegistry',
    'Magento_Ui/js/form/element/multiselect',
    'Magento_Ui/js/modal/modal'
], function (_, uiRegistry, select, modal) {
    'use strict';

    return select.extend({

        initialize: function () {
            this._super();

            //this.onUpdate(this.value());

            return this;
        },


        /**
         * On value change handler.
         *
         * @param {String} value
         */
        onUpdate: function (value) {
            // console.log(value);
            // console.log('Selected Value: ' + value);

            var field1 = uiRegistry.get('index = catalog');
            if (field1.visibleValue == value) {
                field1.show();
            } else {
                field1.hide();
            }

            var field2 = uiRegistry.get('index = product');
            if (field2.visibleValue == value) {
                field2.show();
            } else {
                field2.hide();
            }

            return this._super();
        },
    });
});