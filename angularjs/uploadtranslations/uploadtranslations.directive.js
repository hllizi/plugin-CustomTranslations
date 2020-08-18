(function () {
    angular.module('piwikApp').directive('matomoUploadCustomTranslations', matomoUploadCustomTranslations);

    matomoUploadCustomTranslations.$inject = ['piwik'];

    function matomoUploadCustomTranslations(piwik) {
        return {
            restrict: 'A',
            scope: {},
            templateUrl: 'plugins/CustomTranslations/angularjs/uploadtranslations/uploadtranslations.directive.html',
            controller: 'CustomTranslationsUpload',
            controllerAs: 'uploadTranslations'
        }
    }
})();