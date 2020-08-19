(function() {
        angular.module('piwikApp').controller('CustomTranslationsUpload', CustomTranslationsUpload);

        CustomTranslationsUpload.$inject = ['piwikApi', 'piwik', '$filter'];

        function readFilePromise(filename)
        {
            const reader = new FileReader();
            return new Promise(
                (success, failure) =>
                {
                    reader.onerror =
                        () => {
                            reader.abort();
                            failure(new DOMException("Could not read file " + filename));
                        };

                    reader.onload =
                        () => {
                            success(reader.result);
                        };
                    reader.readAsText(filename);
                }
            )
        }

        function CustomTranslationsUpload(piwikApi, piwik, $filter) {
        }
    }
)();