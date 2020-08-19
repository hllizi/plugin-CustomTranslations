<?php
/**
 * InnoCraft - the company of the makers of Matomo Analytics, the free/libre analytics platform
 *
 * @link https://www.innocraft.com
 * @license http://www.gnu.org/licenses/gpl-3.0.html GPL v3 or later
 */

namespace Piwik\Plugins\CustomTranslations;

use Piwik\Piwik;

class Controller extends \Piwik\Plugin\ControllerAdmin
{
    public function manage()
    {
        Piwik::checkUserHasSuperUserAccess();
        return $this->renderTemplate('manage');
    }

    public function upload()
    {
        Piwik::checkUserHasSuperUserAccess();
        $api = API::getInstance();

        $types=array_map(function($array) {return $array['id'];} , $api->getTranslatableTypes());

        if(isset($_POST["submit"])) {
            $fileContent = file_get_contents($_FILES["translationFile"]["tmp_name"]);
            $data = json_decode($fileContent,true);
        }

        foreach($data as $language => $languageData) {
            foreach ($types as $type) {
                if (isset($languageData[$type])) {
                    echo "Language: $language\n";
                    echo "Type: $type\n";
                    echo var_dump($languageData[$type]);
                    $api->setTranslations($type, $language, $languageData[$type]);
                }
            }
        }
    }
}
